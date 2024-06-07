<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

include_once 'api_path.php';

$id = $_POST["id"];
$token =$_POST["token"];
$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_notes_by_id.php';

$post = array('token' => $token,'id'=>$id);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$info=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$info_decode = json_decode($info,true);
//print_r($info_decode); die();
//echo json_encode($lab_info);

$data = $info_decode['note'];

$crt_date = $data['CreatedDate'];
$profile_name = $data['display_name_text'];
$create_by_name = $data['create_by_display_name_text'];
$appt_text = '';
if(isset($data['attachment_info']['aptid_text'])) $appt_text = $data['attachment_info']['aptid_text'];

$description_text = $data['description_text'];
$note_text = $data['note_text'];
$noteType_vi_vn = $data['noteType_vi_vn'];

$name_temp = preg_replace('/\s+/', '', $data['display_name_text']);
///
$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$fileName = 'note_'.$id.'_'.$name_temp.'.pdf';
//

$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title>Note</title>
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
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">Ghi Chú</h1>
       <div style="width: 100%" class="m_b7">
        <div style="width: 100%; float: left">Ngày tạo: '.$crt_date.'</div>
      </div>
      <div style="width: 100%" class="m_b7">
        <div style="width: 100%; float: left">Mã cuộc hẹn: '.$appt_text.'</div>
      </div>
      <div style="width: 100%" class="m_b7">
        Họ và Tên: '.$profile_name.'
      </div>
      <div style="width: 100%" class="m_b7">
        Họ và Tên Người tạo: '.$create_by_name.'
      </div>
      <div style="width: 100%" class="m_b7">
        Mô tả: '.$description_text.'
      </div>
       <div style="width: 100%" class="m_b7">
        Lưu ý: '.$note_text.'
      </div>
       <div style="width: 100%" class="m_b7">
        Phân loại: '.$noteType_vi_vn.'
      </div>
    </body>
</html>';
//print_r($html);die();
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
    $email = $data['Email'];
    if($data['u_guardian_Email'] !='' && $data['u_guardian_Email'] !=null){
        $email = $data['u_guardian_Email'];
    }

    $subject ="Ghi Chú";

    $body ='<p class="w100">Chào bạn</p>';
    $body .='<p><a href="'.$url_download_file.'">Click vào đây để tải Ghi Chú</a></p>';
    $body .='<p class="w100 m-t20">Cám ơn</p>';
    //$cFile = curl_file_create($pdfPathTemp);
    $post = array('token'=>$token,'to_name'=>$profile_name,'to_email'=>$email,'subject'=>$subject,'body'=>$body);

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






