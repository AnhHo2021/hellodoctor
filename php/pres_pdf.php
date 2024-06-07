<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

include_once 'api_path.php';
$PrescriptionID =$_POST["PrescriptionID"];
$token =$_POST["token"];
$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_pres_by_id.php';

$post = array('token' => $token,'PrescriptionID'=>$PrescriptionID);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$pres_rsl=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($pres_rsl);

$pres_info = json_decode($pres_rsl,true);
//print_r($pres_info);
//die();
$data = $pres_info["pres"];

$doctor_name = $data['orderedBy_display_name'];
$appt_text = $data['aptid_text'];
$pres_time = $data['CreatedDate'];
//$instructions = $_POST['instructions'];
$note = $data['notes_text'];
$pres_location = $data['location_name_text'];
$diagnostic = '';
if(count($data['diagnostic_list_custom_diagnostic'])>0){
    foreach($data['diagnostic_list_custom_diagnostic'] as $item){
        $diagnostic =($diagnostic=='')?$item["name_text"]: $diagnostic.', '.$item["name_text"];
    }
}

$medicine_list=$data['pres_line'];

//print_r($rx_usage_arr);die();

$display_name =$data['patient_display_name'];

$name_temp = preg_replace('/\s+/', '', $data['patient_display_name']);
///
$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$PrescriptionID=$data['PrescriptionID'];
$fileName = 'Prescription_'.$PrescriptionID.'_'.$name_temp.'.pdf';

//user
$birth_date_date=''; $year_old =0;


$date=date_create($data['patient_birth_date']);
$birth_date_date = date_format($date,"Y/m/d");
$birth_temp = explode('/',$birth_date_date);

$birth_temp_y = $birth_temp[0];
$year_old = $birth_temp_y - $date_ex[0];

$sex_option =$data['patient_sex_option'];
$sex_option = ($sex_option=='Male')?'Nam':'Nữ';

$addr =$data['patient_address'];
$insurance_number =$data['patient_insurance_number'];

//product
$tr ='';
$i=0;
foreach($medicine_list as $item){
    $i++;

   $tr .='<div class="w m_b7">
   <div class="w">
        <div style="width: 10%; float: left;" class="f_b">'.$i.'.</div>
        <div style="width: 80%; float: left" class="p_l15"><strong>'.$item["m_name_text"].'</strong>('.$item["m_active_ingredients_text"].')</div>
   </div>
   <div class="w" style="clear:both">
        <div style="width: 12%; float: left" class="">Sáng:  <span class ="f_b">'.$item["morning_amount_number"].'</span></div>
        <div style="width: 12%; float: left" class="">Trưa:  <span class ="f_b">'.$item["noon_amount_number"].'</span></div>
        <div style="width: 12%; float: left" class="">Chiều:  <span class ="f_b">'.$item["afternoon_amount_number"].'</span></div>
        <div style="width: 12%; float: left" class="">Tối:  <span class ="f_b">'.$item["evening_amount_number"].'</span></div>
        <div style="width: 20%; float: left" class="f_b">'.$item["usage_text"].'</div>
        <div style="width: 32%; float: left" class="">
            <div class="w">
                <div style="width: 15%;float: left">SL</div>
                <div style="width: 25%;float: left">'.$item["total_number"].'</div>
                <div style="width: 55%;float: left">'.$item["unit_text"].'</div>
            </div>
        </div>
   </div>
   <div class="w" style="clear:both">'.$item["instructions_text"].'</div>
</div>';

}

//
$pres_date_temp = explode(" ",$data['CreatedDate']);
$pres_date_temp = explode("-",$pres_date_temp[0]);
$pres_date = "Ngày ".$pres_date_temp[2].'-'.$pres_date_temp[1].'-'.$pres_date_temp[0];
$signature='';
if ($data['signature_url_text'] !=null && $data['signature_url_text'] !=''){
    $signature =$data['signature_url_display'];
}

//print_r('--');

//die();
$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title>Toa thuốc</title>
        <style>
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }

        table tfoot td{
            border: none;
        }
        .w{width: 100%;}
        .m_b7{margin-bottom: 7px;}
        .f_b{font-weight: bold;}
        .text_c{text-align:center}
        .text_r{text-align:right}
        .m_r15{margin-right:15px}
        .m_l5{margin-left:5px}
        .p_r15{padding-right:15px}
        .p_15{padding-left:5px}
        .p_l15{padding-left:15px}
        .middle-text{display: flex;
                    align-items: center;
                    justify-content: center;}
        </style>
      </head>

      <body>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">THÔNG TIN TOA THUỐC</h1>
      <div style="width: 100%" class="m_b7">
        <div style="width: 50%; float: left">Họ và Tên: '.$display_name.'</div>
        <div style="width: 25%; float: left">Tuổi: '.$year_old.'</div>
        <div style="width: 25%; float: left;">Giới tính: '.$sex_option.'</div>
      </div>
      <div class="m_b7">Mã số thẻ BHYT: '.$insurance_number.'</div>
      <div class="m_b7">Ngày sinh: '.$birth_date_date.'</div>
      <div class="m_b7">Địa chỉ: '.$addr.'</div>
      <div class="m_b7">Sinh hiệu: </div>
      <div class="m_b7">Nơi chỉ định: '.$pres_location.'</div>
      <div style="margin-bottom: 15px;">Chẩn đoán: <span class="f_b">'.$diagnostic.'</span></div>
      <div class="f_b" style="margin-bottom: 10px;">Thuốc điều trị:</div>
      ' . $tr .'
      <div style="margin-top:8px">Tổng loại thuốc: '.$i.'</div>
      <div style="margin-bottom: 15px;margin-top:7px">Lưu ý: '.$note.'</div>

      <div style="width: 100%!important;clear: both;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">'.$pres_date.'</div>
      </div>

       <div style="width: 100%!important; clear: both;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">Bác sĩ chỉ định</div>
      </div>

      <div style="width: 100%!important; clear: both;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">
            <img src="'.$signature.'" style="height: 40px" />
         </div>
      </div>

      <div style="width: 100%!important; clear: both;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c f_b">'.$doctor_name.'</div>
      </div>

    </body>

</html>';

//print_r($html); die();

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

$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;

$is_send_email = '';
if(isset($_POST["is_send_email"])){
    $is_send_email = $_POST["is_send_email"];
}

if($is_send_email=='is_send_email'){
    $api_path = $ob_api_path->api_path_dev.'_send_email.php';
    $email = $data['patient_Email'];
    if($data['u_guardian_Email'] !='' && $data['u_guardian_Email'] !=null){
        $email = $data['u_guardian_Email'];
    }

    $subject ="Đơn thuốc";

    $body ='<p class="w100">Chào bạn</p>';
    $body .='<p><a href="'.$url_download_file.'">Click vào đây để tải đơn thuốc</a></p>';
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




