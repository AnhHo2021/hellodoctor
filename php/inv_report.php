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
$to_date  = '';
if(isset($_POST["date_to"])){
    $to_date  = $_POST["date_to"];
}
$from_date_paid  = '';
if(isset($_POST["date_from_paid"])){
    $from_date_paid  = $_POST["date_from_paid"];
}
$to_date_paid  = '';
if(isset($_POST["date_to_paid"])){
    $to_date_paid  = $_POST["date_to_paid"];
}
$inv_paid  = '';
if(isset($_POST["inv_paid"])){
    $inv_paid  = $_POST["inv_paid"];
}

$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_history_invs.php';

$post = array('token' => $token,'text_search'=>$text_search,
    'date_from'=>$from_date,'date_to'=>$to_date,
    'date_from_paid'=>$from_date_paid,'date_to_paid'=>$to_date_paid,
    'inv_paid'=>$inv_paid);

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
$result = $data_arr['invs'];
$tr ='';
if($result['row_cnt'] > 0 ){
    $i=0;
    foreach($result['results'] as $item){
        $i++;
        $inv_text =$item["inv_text"];
        $aptid_text =$item["aptid_text"];
        $total =number_format($item["invoice_total_number"], 0, '.', ',').'VNĐ';
        $remaining =0;
        $inv_balance_text ="";
        if($item['balance_number'] !=null && $item['balance_number'] !=''){
            $remaining = number_format($item["balance_number"], 0, '.', ',').'VNĐ';
            if( $item["balance_number"] <=0){
                $inv_balance_text ='<span class="color_green">Đã thanh toán</span>';
            }else{
                $inv_balance_text ='<span class="color-alert">Chưa thanh toán</span>';
            }
        }

        $date_temp = explode(" ",$item['CreatedDate']);
        $date_temp = explode("-",$date_temp[0]);
        $create_date = $date_temp[2].'-'.$date_temp[1].'-'.$date_temp[0];
        $tr .='<tr>
        <td>'.$i.'</td>
        <td>'.$inv_text.'</td>
        <td>'.$aptid_text.'</td>
        <td>'.$total.'</td>
        <td>'.$remaining.'</td>
        <td>'.$inv_balance_text.'</td>
        <td style="text-align:center">'.$create_date.'</td>
    </tr>';
    }
}

$table =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 20px;">STT</th>
            <th style="width: 120px;">Invoice</th>
            <th style="width: 50px;">Appointment</th>
            <th style="width: 50px;">Số tiền</th>
            <th style="width: 90px;">Còn lại</th>
            <th style="width: 90px;">Đã thanh toán</th>
            <th style="width: 90px;">Ngày tạo</th>
        </tr>
    </thead>
    <tbody>'.$tr.'</tbody>
</table>';

$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title> Invoice Report</title>
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
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">Invoice Report</h1>
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
$fileName = 'Inv_report'.$name_temp.'_'.$current_time.'.pdf';
$pathname ="download_file/";
$pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;
//$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;
//print_r($pdfPathTemp); die();

$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;
echo json_encode(array("filename"=>$fileName,"url_download_file"=>$url_download_file));
