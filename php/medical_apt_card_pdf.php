<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';

//$mpdf = new \Mpdf\Mpdf();
include_once 'api_path.php';
$Appt_id  = $_POST["Appt_id"];
$token =$_POST["token"];
$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_apt_by_aptid.php';

$post = array('token' => $token,'Appt_id'=>$Appt_id);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$rsl=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$data_arr = json_decode($rsl,true);
//print_r($data_arr);die();
$apt = $data_arr['apt'];

$display_name = "";
$name_temp = '';
if ($apt['u_p_display_name'] !=null){
    $display_name = $apt["u_p_display_name"];
    $name_temp = $display_name;
}else{
    if ($apt['u_p_family_name'] !=null){
        $display_name = $apt["u_p_family_name"];
        $name_temp =$display_name;
    }
    if ($apt['u_p_middle_name'] !=null){
        $display_name = $display_name.' '.$apt["u_p_middle_name"];
        $name_temp =$display_name.'_'.$apt["u_p_middle_name"];
    }
    if ($apt['u_p_first_name'] !=null){
        $display_name = $display_name.' '.$apt["u_p_first_name"];
        $name_temp =$display_name.'_'.$apt["u_p_first_name"];
    }
}

///
$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$fileName = 'apt_registration'.$Appt_id.'_'.$name_temp.'.pdf';

//user
$birth_date_date=''; $year_old =0;
if ($apt['u_p_birth_date_date'] !=null){
    $date=date_create($apt["u_p_birth_date_date"]);
    $birth_date_date = date_format($date,"Y/m/d");
    $birth_temp = explode('/',$birth_date_date);

    $birth_temp_y = $birth_temp[0];
    $year_old = $birth_temp_y - $date_ex[0];
}

$sex_option='';
if ($apt["u_p_sex_option_sex"] !=null){
    $sex_option =$apt["u_p_sex_option_sex"];
    $sex_option = ($sex_option=='Male')?'Nam':'Nữ';
}

$addr ='';
if ($apt["u_p_PatientAddress"] !=null){
    $addr =$apt["u_p_PatientAddress"];
}

$insurance_number='';
if ($apt["u_p_insurance_number_text"] !=null){
    $insurance_number = $apt["u_p_insurance_number_text"];
}

$phone='';
if ($apt["u_p_primary_phone_number_text"] !=null){
    $phone =$apt["u_p_primary_phone_number_text"];
}
//print_r('--');

//die();
$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title>Appointment Registration</title>
        <style>
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }

        table tfoot td{
            border: none;
        }

        .m_b7{margin-bottom: 7px;}
        .m_b15{margin-bottom: 15px;}
        .f_b{font-weight: bold;}
        .f_z18{font-size:18px}
        .f_z16{font-size:16px}
        .text_c{text-align:center}
        .text_r{text-align:right}
        .m_r15{margin-right:15px}
        .m_l5{margin-left:5px}
        .p_r15{padding-right:15px}
        .p_l5{padding-left:15px}
        .middle-text{display: flex;
                    align-items: center;
                    justify-content: center;}
        .w100 {width:100%}
        </style>
      </head>

      <body>
      <div class=" text_c f_z18 w100">SỞ Y TẾ ĐĂKLĂK</div>
      <div class=" text_c f_z16 w100">PHÒNG KHÁM ĐA KHOA CHẤT LƯỢNG CAO SÀI GÒN</div>
      <div class=" text_c f_z16 w100">Trụ sở:55-57 Ngô Quyền, Tp Buôn Mê THuột, Tỉnh ĐăkLăk</div>
      <div class=" text_c f_z16 w100">ĐT:0262.3 724567 Fax:0262.3 715 678</div>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">PHIẾU ĐĂNG KÝ KHÁM BỆNH '.$apt['aptid_text'].'</h1>
      <div style="width: 100%" class="m_b7">
        <div style="width: 50%; float: left">Họ và Tên: '.$display_name.'</div>
        <div style="width: 25%; float: left">Tuổi: '.$year_old.'</div>
        <div style="width: 25%; float: left;">Giới tính: '.$sex_option.'</div>
      </div>
      <div style="width: 100%" class="m_b7">
        <div style="width: 50%; float: left">Ngày sinh: '.$birth_date_date.'</div>
        <div style="width: 50%; float: left">Điện thoại: '.$phone.'</div>
      </div>
      <div class="m_b7" style="clear:both">Mã số thẻ BHYT: '.$insurance_number.'</div>
      <div class="m_b7">Địa chỉ: '.$addr.'</div>
      <div class="m_b15">Nghề nghiệp: </div>
      <div class="m_b15">Lý do đăng ký: Khám bệnh</div>
      <div class="m_b7">Yêu cầu khám: </div>
      <div style="width: 100%" class="m_b15">
        <div style="width: 50%; float: left">Phòng khám: </div>
        <div style="width: 50%; float: left">Thời gian tiếp nhận: </div>
      </div>
      <div class="m_b7" style="clear:both">Số tiền bệnh nhân phải đóng: '.number_format($apt["invoice_total_number"], 0, '.', ',').'VNĐ</div>
      <div class="m_b7 w100 f_b">Sinh hiệu: </div>
      <div style="width: 100%" class="m_b7">
        <div style="width: 25%; float: left">Cân nặng:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kg</div>
        <div style="width: 25%; float: left">Mạch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lp</div>
      </div>
      <div style="width: 100%;clear both" class="m_b7">
        <div style="width: 25%; float: left">Chiều cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cm</div>
        <div style="width: 25%; float: left">Huyết áp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mmhg</div>
      </div>
      <div style="width: 100%;clear both" class="m_b7">
        <div style="width: 25%; float: left">Nhiệt độ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C</div>
        <div style="width: 25%; float: left">Spo2:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</div>
      </div>

      <div style="width: 100%!important;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">Ngày tháng năm 20</div>
      </div>
    </body>

</html>';

$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);
$mpdf->SetHTMLHeader('<div style="width: 100%">
        <div style="width: 50%; float: left">https://xinchaobacsi.vn/</div>
        <div style="width: 50%; float: left; text-align: right;">'.$apt['aptid_text'].'</div>
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
    $email = $apt['u_p_Email'];
    if($apt['u_guardian_Email'] !='' && $apt['u_guardian_Email'] !=null){
        $email = $apt['u_guardian_Email'];
    }

    $subject ="PHIẾU ĐĂNG KÝ KHÁM BỆNH";

    $body ='<p>Chào bạn</p>';
    $body .='<p><a href="'.$url_download_file.'">Click vào đây để xem chi tiết phiếu khám bệnh</a></p>';

    //$cFile = curl_file_create($pdfPathTemp);
    $post = array('token'=>$token,'to_name'=>$display_name,'to_email'=>$email,'subject'=>$subject,'body'=>$body);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$api_path);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result1=curl_exec ($ch);
    curl_close ($ch);
    $result = json_decode($result1,true);
    echo json_encode(array("email_sent"=>$result["email_sent"]));
}else{
    echo json_encode(array("filename"=>$fileName,"url_download_file"=>$url_download_file));
}






