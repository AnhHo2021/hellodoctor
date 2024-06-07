<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

include_once 'api_path.php';

$token =$_POST["token"];
$text_search  = '';
if(isset($_POST["text_search"])){
    $text_search  = $_POST["text_search"];
}
$from_date  = '';
if(isset($_POST["date_from"])){
    $from_date  = $_POST["date_from"];
}
$date_to  = '';
if(isset($_POST["date_to"])){
    $date_to  = $_POST["date_to"];
}
$status_option_payment_status  = '';
if(isset($_POST["status_option_payment_status"])){
    $status_option_payment_status  = $_POST["status_option_payment_status"];
}

$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_paymentList.php';

$post = array('token' => $token,'text_search'=>$text_search,
    'date_from'=>$from_date,'date_to'=>$date_to,
    'status_option_payment_status'=>$status_option_payment_status);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$inv_rsl=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$data_arr = json_decode($inv_rsl,true);
//print_r($data_arr);die(); invs
$result = $data_arr['payments'];
$tr ='';
if($result['row_cnt'] > 0 ){
    $i=0;
    foreach($result['results'] as $item){
        $i++;
        $transaction_id_text =$item["transaction_id_text"];
        $inv_text =$item["inv_text"];
        $amount_number =0;
        if($item["amount_number"] !='' && $item["amount_number"] != null) $amount_number = $item["amount_number"];
        $amount_number =number_format($amount_number, 0, '.', ',').'VNĐ';

        $payment_type ='';
        if($item['type_option_payment_type'] !='' && $item['type_option_payment_type'] !=null) $payment_type = $item['payment_type_vi_vn'];

        $status ='';
        if($item['payment_status_vi_vn'] !='' && $item['payment_status_vi_vn'] !=null) $status = $item['payment_status_vi_vn'];

        $create_date ='';
        if($item['CreatedDate'] !='' && $item['CreatedDate'] !=null) $create_date = $item['CreatedDate'];

        $tr .='<tr>
        <td>'.$i.'</td>
        <td>'.$transaction_id_text.'</td>
        <td>'.$inv_text.'</td>
        <td>'.$amount_number.'</td>
        <td>'.$payment_type.'</td>
        <td>'.$status.'</td>
        <td style="text-align:center">'.$create_date.'</td>
    </tr>';
    }
}
$table =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 20px;">STT</th>
            <th style="width: 120px;">Mã giao dịch</th>
            <th style="width: 50px;">Mã invoice</th>
            <th style="width: 50px;">Số tiền đã trả</th>
            <th style="width: 90px;">Phương thức thanh toán</th>
            <th style="width: 90px;">Trạng thái</th>
            <th style="width: 90px;">Ngày tạo</th>
        </tr>
    </thead>
    <tbody>'.$tr.'</tbody>
</table>';

$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title> Payment Report</title>
        <style>
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }

        table tfoot td{
            border: none;
        }

        .m_b7{margin-bottom: 7px;}
        .f_b{font-weight: bold;}
        .p_r5{padding-right:5px}
        .txt_r{text-align:right}
        .txt_c{text-align:center}
        </style>
      </head>

      <body>
      <div style="width: 100%">
        <div style="width: 50%; float: left">
            <img src="https://s3.amazonaws.com/appforest_uf/f1597291259978x729090411498556500/111111111111.jpg" style="height: 40px" />
        </div>
      </div>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">Payment Report</h1>
      ' . $table .'

    </body>

</html>';
//print_r($html); die();
$mpdf->SetHTMLFooter('<div style="width: 100%">
        <div style="width: 50%; float: left">https://xinchaobacsi.vn/</div>
        <div style="width: 50%; float: left; text-align: right;">{PAGENO}</div>
      </div>');

$mpdf->WriteHTML($html);

$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$name_temp = str_replace(' ','',$display_name);
$fileName = 'Payment_report'.$name_temp.'_'.$current_time.'.pdf';
$pathname ="download_file/";
$pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;
//$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;
//print_r($pdfPathTemp); die();

$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;
echo json_encode(array("filename"=>$fileName,"url_download_file"=>$url_download_file));
