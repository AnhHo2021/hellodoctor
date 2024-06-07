<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

include_once 'api_path.php';
$disposition_option_apt_disposition  = '';
if(isset($_POST["disposition_option_apt_disposition"])) $disposition_option_apt_disposition  =$_POST["disposition_option_apt_disposition"];
$text_search  = '';
if(isset($_POST["text_search"])) $text_search  =$_POST["text_search"];
$doctor_name  = '';
if(isset($_POST["doctor_name"])) $doctor_name  =$_POST["doctor_name"];
$patient_name  = '';
if(isset($_POST["patient_name"])) $patient_name  =$_POST["patient_name"];
$date_from  = '';
if(isset($_POST["date_from"])) $date_from  =$_POST["date_from"];
$date_to  = '';
if(isset($_POST["date_to"])) $date_to  =$_POST["date_to"];
$token =$_POST["token"];

$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_history_apts.php';

$post = array('token' => $token,'disposition_option_apt_disposition'=>$disposition_option_apt_disposition,
'doctor_name'=>$doctor_name,'patient_name'=>$patient_name,
'date_from'=>$date_from,'date_to'=>$date_to,
'text_search'=>$text_search);

//print_r($post);die();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$rsl=curl_exec ($ch);
curl_close ($ch);
//$lab_info =print_r($lab_info);

$data_arr = json_decode($rsl,true);
//print_r($data_arr);//die();
$data_temp = $data_arr['apts'];
$tr ='';
if($data_temp["row_cnt"] > 0 ){
    $data = $data_temp['results'];

    $i=1;

    foreach($data as $appt){
        $date_temp = explode(" ",$appt['apt_date_date']);
        $date_temp = explode("-",$date_temp[0]);
        $apt_date = $date_temp[2].'-'.$date_temp[1].'-'.$date_temp[0];
        $aptid_text  =$appt['aptid_text'];
        $disposition  =$appt['disposition_option_apt_disposition_vi_vn'];
        $aptid_text  =$appt['aptid_text'];
        $asg_d_display_name = '';
        if($appt['asg_d_display_name'] !=''){
            $asg_d_display_name =$appt['asg_d_display_name'];
        }

        $chief_complaint_option_chief_complaint_vi_vn  =$appt['chief_complaint_option_chief_complaint_vi_vn'];

        $u_p_display_name = ($appt['u_p_display_name'] =='' || $appt['u_p_display_name'] =="null")?'':$appt['u_p_display_name'];


        $tr .='<tr>
        <td >'.$i.'</td>
        <td >'.$aptid_text.'</td>
        <td >'.$disposition.'</td>
        <td >'.$asg_d_display_name.'</td>
        <td >'.$u_p_display_name.'</td>
        <td >'.$chief_complaint_option_chief_complaint_vi_vn.'</td>
        <td >'.$apt_date.'</td>
    </tr>';

        $i++;
    }
}

$table =' <table style="width:100%;">
    <thead>
        <tr>
            <th style="width: 20px;">STT</th>
            <th style="width: 90px;">Cuộc hẹn</th>
            <th style="width: 50px;">Trạng thái cuộc hẹn</th>
            <th style="width: 50px;">Bác sĩ</th>
            <th style="width: 150px;">Bệnh nhân</th>
            <th style="width: 100px;">Khám bệnh</th>
            <th style="width: 80px;">Ngày </th>
        </tr>
    </thead>
    <tbody>'.$tr.'</tbody>
</table>';

//print_r($invlines);
//print_r(number_format($pr_item["retail_price_number"], 0, '.', ','));
$html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title> Appointment Report</title>
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
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">Appointment Report</h1>
      ' . $table .'


    </body>

</html>';

//print_r($html);
//die();

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

$fileName = 'apt_report_'.$current_time.'.pdf';
$pathname ="download_file/";
$pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;
//$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;
//print_r($pdfPathTemp); die();

$mpdf->Output($pdfPathTemp,'F');

$url_download_file = $ob_api_path->pdf_path.$fileName;
echo json_encode(array("filename"=>$fileName,"url_download_file"=>$url_download_file));
