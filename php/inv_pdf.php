<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';

include_once 'api_path.php';
$Inv_id  = $_POST["Inv_id"];
$token =$_POST["token"];
$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_inv_by_id.php';

$post = array('token' => $token,'Inv_id'=>$Inv_id);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$inv_rsl=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$data_arr = json_decode($inv_rsl,true);
//print_r($data_arr);die();
$data = $data_arr['inv'];

$display_name = $data['display_name_text'];
$phone = $data['primary_phone_number_text'];
$email = $data['Email'];
$addr = $data['address_geographic_address'];
$inv_code = $data['inv_text'];
$inv_total = $data['invoice_total_number'];
$inv_balance = $data['balance_number'];
$paid = $inv_total - $inv_balance;

$payment = array();
if(isset($data['payment'])){
    $payment = $data['payment'];
}

$invlines = $data['invoiceLine'];


$tr ='';
//print_r($payment);
//payment
foreach($payment as $payment_arr){
    $date=date_create($payment_arr["CreatedDate"]);
    $date_n = date_format($date,"Y/m/d H:m");
    $type = $payment_arr["payment_type_vi_vn"];
    $notes = $payment_arr["notes_text"];

    $tr .='<tr>
        <td style="">'.$date_n.'</td>
        <td style="">'.$payment_arr["transaction_id_text"].'</td>
        <td style="">'.$type.'</td>
        <td style="">'.$payment_arr["refund_boolean"].'</td>
        <td style="">'.$notes.'</td>
        <td style="" class="p_r5 txt_r">'.number_format($payment_arr["amount_number"], 0, '.', ',').'VNĐ</td>
        <td style="">'.$payment_arr["creator_display_name"].'</td>
    </tr>';
}

$table_payment =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 120px;">Ngày tạo</th>
            <th style="width: 90px;">Mã Giao dịch</th>
            <th style="width: 50px;">Loại Thanh toán</th>
            <th style="width: 50px;">Hoàn tiền</th>
            <th style="width: 150px;">Ghi chú</th>
            <th style="width: 100px;">Số tiền</th>
            <th style="width: 80px;">Ngườitạo</th>
        </tr>
    </thead>
    <tbody>'.$tr.'</tbody>
</table>';

//Invoice line
$tr ='';
foreach($invlines as $item){
    $tr .='<tr>
        <td style="">'.$item['name_text'].'</td>
        <td style="" class="txt_c">'.$item["qty_number"].'</td>
        <td style="" class="p_r5 txt_r">'.number_format($item["retail_price_number"], 0, '.', ',').'VNĐ</td>
        <td style="" class="p_r5 txt_r">'.number_format($item["price_number"], 0, '.', ',').'VNĐ</td>
        <td style="" class="p_r5 txt_r">'.$item["line_total_number"].'</td>
    </tr>';
}

$table_invLine =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 120px;">Tên sản phẩm</th>
            <th style="width: 50px;">Số lượng</th>
            <th style="width: 100px;">Giá bán lẻ</th>
            <th style="width: 100px;">Đơn giá</th>
            <th style="width: 120px;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>'.$tr.'

    </tbody>
     <tfoot>
        <tr>
            <td  colspan="4" style="text-align:right;margin-right:10px;" class ="">Thành tiền: </td>
            <td style="width: 120px;" class ="f_b txt_r p_r5"> '.number_format($inv_total, 0, '.', ',').'VNĐ</td>
        </tr>
        <tr>
            <td  colspan="4" style="text-align:right; margin-right:10px;" class ="">Đã thanh toán: </td>
            <td style="width: 120px;color:#0000ff" class ="f_b txt_r p_r5">'.number_format($paid, 0, '.', ',').'VNĐ</td>
        </tr>
        <tr>
            <td  colspan="4" style="text-align:right;margin-right:10px;" class ="">Còn lại: </td>
            <td style="width: 120px; color:#c80000" class ="f_b txt_r p_r5">'.number_format($inv_balance, 0, '.', ',').'VNĐ</td>
        </tr>
    </tfoot>

</table>';

//print_r($invlines);
//print_r(number_format($pr_item["retail_price_number"], 0, '.', ','));


$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title> Invoice</title>
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
        <div style="width: 50%; float: left; text-align: right;">'.$inv_code.'</div>
      </div>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">HÓA ĐƠN</h1>
      <div class="m_b7">Họ và Tên: '.$display_name.'</div>
      <div class="m_b7">Số điện thoại: '.$phone.'</div>
      <div class="m_b7">Email: '.$email.'</div>
      <div style="margin-bottom: 15px;"Địa chỉ: '.$addr.'></div>
      <div class="m_b7 f_b">Chi tiết hóa đơn: </div>
      ' . $table_invLine .'
      <div  style="margin-bottom: 15px;"></div>

      <div class="m_b7 f_b">Lịch sử Thanh toán: </div>
      ' . $table_payment .'


    </body>

</html>';

//print_r($html);
//die();

$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);
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
$fileName = 'IVN_'.$Inv_id.'_'.$name_temp.'.pdf';
$pathname ="download_file/";
$pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;
//$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;


$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;

$is_send_email = '';
if(isset($_POST['is_send_email'])){
    $is_send_email = $_POST['is_send_email'];
}

if($is_send_email=='is_send_email'){
    $api_path = $ob_api_path->api_path_dev.'_send_email.php';
    $email = $data['Email'];
    if($data['u_guardian_Email'] !='' && $data['u_guardian_Email'] !=null){
        $email = $data['u_guardian_Email'];
    }

    $subject ="Hóa đơn thanh toán";

    $body ='';

    $new_type_payment ='';
    $new_amount_number = '';
    if(count($payment) > 0){
        $new_type_payment =$payment[0]['type_option_payment_type'];
        if($new_type_payment =='Bank Transfer'){
            $body .='<p class="w100">Quý khách vừa thanh toán '.number_format($payment[0]["amount_number"], 0, '.', ',').'VNĐ tới tài khoản sau với nội dung chuyển khoản</p> ';
            $body .='<p class="w100">Chuyển khoản cho Hóa đơn '.$inv_code.'</p> ';

            $body .='<p class="w100">Chủ tài khoản: CTCP Dich Vu Y Te Chat Luong Cao Sai Gon </p> ';
            $body .='<p class="w100">Số tài khoản: 23001011937199 </p> ';
            $body .='<p class="w100">Chủ tài khoản: Ngân hàng: TMCP Hang Hai Viet Nam (Maritime Bank)</p> ';

        }else{
            $body .='<p class="w100">Quý khách vừa thanh toán '.number_format($payment[0]["amount_number"], 0, '.', ',').' VNĐ cho hóa đơn '.$inv_code.'</p>';
        }
    }


    $body .='<p><a href="'.$url_download_file.'">Click vào đây để xem chi tiết </a></p>';

    //$cFile = curl_file_create($pdfPathTemp);
    $post = array('token'=>$token,'to_name'=>$display_name,'to_email'=>$email,'subject'=>$subject,'body'=>$body);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$api_path);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec ($ch);
    curl_close ($ch);
    $result = json_decode($result,true);
    echo json_encode(array("email_sent"=>$result["email_sent"]));
}else{
    echo json_encode(array("filename"=>$fileName,"url_download_file"=>$url_download_file));
}

