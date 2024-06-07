<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';
include_once 'api_path.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);

$doctor_name = $_POST['doctor_name'];
$appt_text = $_POST['appt_text'];
$lab_time = $_POST['lab_time'];
$instructions = $_POST['instructions'];
$lab_location = $_POST['lab_location'];
$diagnostic = $_POST['diagnostic'];

$product_list =array();
if(isset($_POST['product_list'])){
    $product_list = $_POST['product_list'];
}

$user = $_POST['user'];
$lab = $_POST['lab'];

$display_name ='';

if (array_key_exists('display_name_text', $user)){
    $display_name = $user["display_name_text"];
}else{
    if (array_key_exists('family_name_text', $user)){
        $display_name = $user["family_name_text"];
    }
    if (array_key_exists('middle_name_text', $user)){
        $display_name = $display_name.' '.$user["middle_name_text"];
    }
    if (array_key_exists('first_name_text', $user)){
        $display_name = $display_name.' '.$user["first_name_text"];
    }
}

$name_temp = '';
if (array_key_exists('family_name_text', $user)){
    $name_temp = $user["family_name_text"];
}
if (array_key_exists('middle_name_text', $user)){
    $name_temp = $name_temp.'_'.$user["middle_name_text"];
}
if (array_key_exists('first_name_text', $user)){
    $name_temp = $name_temp.'_'.$user["first_name_text"];
}
///
$date = date("Y/m/d h:m:s");
$date_arr = explode(' ',$date);
$date_ex = explode('/',$date_arr[0]);
$dmy = $date_ex[2].'_'.$date_ex[1].'_'.$date_ex[0];
$hour_ex = explode(':',$date_arr[1]);
$hms = $hour_ex[0].'_'.$hour_ex[1].'_'.$hour_ex[2];
$current_time = $dmy.'_'.$hms;

$fileName = 'lab_'.$name_temp.'_'.$current_time.'.pdf';

//user
$birth_date_date=''; $year_old =0;
if (array_key_exists('birth_date_date', $user)){
    $date=date_create($user["birth_date_date"]);
    $birth_date_date = date_format($date,"Y/m/d");
    $birth_temp = explode('/',$birth_date_date);

    $birth_temp_y = $birth_temp[0];
    $year_old = $birth_temp_y - $date_ex[0];
}

$sex_option='';
if (array_key_exists('sex_option_sex', $user)){
    $sex_option =$user['sex_option_sex'];
    $sex_option = ($sex_option=='Male')?'Nam':'Nữ';
}

$addr ='';
if (array_key_exists('address_geographic_address', $user)){
    if (array_key_exists('address', $user['address_geographic_address'])){
        $arr_t = $user['address_geographic_address'];
        $addr =$arr_t['address'];
    }
}

$insurance_number='';
if (array_key_exists('insurance_number_text', $user)){
    $insurance_number =$user['insurance_number_text'];
}

//product
$tr ='';
$i=0;
foreach($product_list as $item){
    $i++;
    $tr .='<tr>
        <td class="text_c">'.$i.'</td>
        <td class="p_l5">'.$item["prduct_name"].'</td>
        <td class="p_r15 text_r">'.$item["prduct_price"].'</td>
        <td class="p_l5">'.$item["prduct_sku"].'</td>
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
$lab_date_t =date_create($lab["Created Date"]);
$lab_date = date_format($lab_date_t,"Y/m/d");
$signature='';
if (array_key_exists('signature_image', $lab)){
    $signature ='https:'.$lab['signature_image'];
}

//print_r('--');

//die();
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


      <div style="width: 100%!important;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">'.$lab_date.'</div>
      </div>
      <div style="width: 100%!important;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">
            <img src="'.$signature.'" style="height: 40px" />
         </div>
      </div>
      <div style="width: 100%!important;" class="m_b7">
         <div style="width: 70%!important; float: left"></div>
         <div style="width: 30%; float: right" class="text_c">'.$doctor_name.'</div>
      </div>

    </body>

</html>';

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

$mpdf->Output($pdfPathTemp,'F');

//////////////////

$lad_id = $lab['_id'];
$ob_api_path = new Api_Path();
$api_path_lab_email = $ob_api_path->api_path.'wf/lab_send_email';
$path_file = $ob_api_path->domain_path.$ob_api_path->download.$fileName;

$cFile = curl_file_create($pdfPathTemp);

$post = array('lad_id' => $lad_id,'link_file'=>$fileName,'key_file'=>$cFile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_lab_email);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result=curl_exec ($ch);
curl_close ($ch);

echo json_encode($result);
