<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

include_once 'api_path.php';

$lad_id = $_POST["Lab_id"];
$token =$_POST["token"];
$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_lab_by_id.php';

$post = array('token' => $token,'Lab_id'=>$lad_id);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$lab_info1=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$lab_info = json_decode($lab_info1,true);

//echo json_encode($lab_info);

$data = $lab_info['lab'];

$doctor_name = $data['orderedBy_display_name'];

$appt_text = $data['aptid_text'];

$instructions = $data['notes_text'];
$lab_location = $data['location_name_text'];
$diagnostic = '';
if(count($data['diagnostic_list_custom_diagnostic'])>0){
    foreach($data['diagnostic_list_custom_diagnostic'] as $item){
        $diagnostic =($diagnostic=='')?$item["name_text"]: $diagnostic.', '.$item["name_text"];
    }
}

$display_name =$data["patient_display_name"];
$name_temp = preg_replace('/\s+/', '', $data['patient_display_name']);
///
$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$Lab_id=$data['Lab_id'];
$fileName = 'lab_'.$Lab_id.'_'.$name_temp.'.pdf';

//user
$birth_date_date=''; $year_old =0;
$date=date_create($data["patient_birth_date"]);
$birth_date_date = date_format($date,"Y/m/d");
$birth_temp = explode('/',$birth_date_date);

$birth_temp_y = $birth_temp[0];
$year_old = $birth_temp_y - $date_ex[0];

$sex_option = ($data['patient_sex_option']=='Male')?'Nam':'Nữ';

$addr =$data['patient_Address'];

$insurance_number =$data['patient_insurance_number'];

//product
$tr ='';
$i=0;
foreach($data['product_list_custom_product'] as $item){
    $i++;
      $tr .='<tr>
        <td class="text_c">'.$i.'</td>
        <td class="p_l5">'.$item["name_text"].'</td>
        <td class="p_r15 text_r">'.$item["sales_price_number"].'</td>
        <td class="p_l5">'.$item["sku_text"].'</td>
    </tr>';

}

$table_products =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 30px;">#</th>
            <th style="width: 120px;">Danh sách xét nghiệm</th>
            <th style="width: 100px;">Đơn giá</th>
            <th style="width: 100px;">SKU</th>
        </tr>
    </thead>
    <tbody>'.$tr.'</tbody>
</table>';
//

$lab_date_temp = explode(" ",$data['CreatedDate']);
$lab_date_temp = explode("-",$lab_date_temp[0]);
$lab_date = "Ngày ".$lab_date_temp[2].'-'.$lab_date_temp[1].'-'.$lab_date_temp[0];

$signature=$data['signature_url_display'];

$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title>LAB TEST</title>
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
        .text_c{text-align:center}
        .text_r{text-align:right}
        .m_r15{margin-right:15px}
        .m_l5{margin-left:5px}
        .p_r15{padding-right:15px}
        .p_l5{padding-left:15px}
        .middle-text{display: flex;
                    align-items: center;
                    justify-content: center;}
        </style>
      </head>

      <body>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">YÊU CẦU XÉT NGHIỆM</h1>
      <div style="width: 100%" class="m_b7">
        <div style="width: 50%; float: left">Họ và Tên: '.$display_name.'</div>
        <div style="width: 25%; float: left">Tuổi: '.$year_old.'</div>
        <div style="width: 25%; float: left;">Giới tính: '.$sex_option.'</div>
      </div>
      <div class="m_b7">Mã số thẻ BHYT: '.$insurance_number.'</div>
      <div class="m_b7">Ngày sinh: '.$birth_date_date.'</div>
      <div class="m_b7">Địa chỉ: '.$addr.'</div>
      <div class="m_b7">Sinh hiệu: </div>
      <div class="m_b7">Nơi chỉ định: '.$lab_location.'</div>
      <div style="margin-bottom: 15px;">Chẩn đoán: '.$diagnostic.'</div>
      <div class="f_b" style="margin-bottom: 15px;">Yêu cầu Xét nghiệm: </div>
      ' . $table_products .'

      <div style="margin-bottom: 15px;margin-top:15px">Hướng dẫn: '.$instructions.'</div>


      <div style="width: 100%!important; clear: both" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">'.$lab_date.'</div>
      </div>

      <div style="width: 100%!important; clear: both" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">Bác sĩ chỉ định</div>
      </div>

    <div style="width: 100%!important;clear:both;height: 40px" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">
            <img src="'.$signature.'" style="height: 40px" />
         </div>
      </div>
      <div style="width: 100%!important; clear:both" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">'.$doctor_name.'</div>
      </div>

    </body>

</html>';
//print_r($html);
//die();
$mpdf->SetHTMLHeader('<div style="width: 100%">
        <div style="width: 50%; float: left">https://xinchaobacsi.vn/</div>
        <div style="width: 50%; float: left; text-align: right;">'.$appt_text.'</div>
      </div>');

$mpdf->SetHTMLFooter('<div style="width: 100%">
        <div style="width: 50%; float: left">Email: help@xinchaobacsi.vn</div>
        <div style="width: 50%; float: left; text-align: right;">{PAGENO}</div>
      </div>');

$mpdf->WriteHTML($html);
$pathname ="download_file/";
$pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;
//$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;
//print_r($pdfPathTemp); die();
$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;

$is_send_email = '';
if(isset($_POST['is_send_email'])){
    $is_send_email = $_POST['is_send_email'];
}

if($is_send_email=='is_send_email'){
    $api_path = $ob_api_path->api_path_dev.'_send_email.php';
    $email = $data['patient_Email'];
    if($data['u_guardian_Email'] !='' && $data['u_guardian_Email'] !=null){
        $email = $data['u_guardian_Email'];
    }

    $subject ="Xét nghiệm";

    $body ='<p class="w100">Chào bạn</p>';
    $body .='<p><a href="'.$url_download_file.'">Click vào đây để tải xét nghiệm</a></p>';
    $body .='<p class="w100 m-t20">Cám ơn</p>';
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



