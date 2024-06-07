<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

require_once __DIR__ . '/../../vendor/autoload.php';

include_once 'api_path.php';

$token =$_POST["token"];
$Vital_ID  = $_POST["Vital_ID"];
$what_do = $_POST['what_do'];

$ob_api_path = new Api_Path();
$api_path_dev = $ob_api_path->api_path_dev.'_vitals_id.php';

$post = array('token' => $token,'Vital_ID'=>$Vital_ID);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$api_path_dev);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$rsl=curl_exec ($ch);
curl_close ($ch);

$data_arr = json_decode($rsl,true);
$data = $data_arr['vital'];
//print_r($data); die();
$tr ='';
if(count($data) > 0 ){
    $Vital_ID = $data["Vital_ID"];
  //A.PROFILE
    $display_name_text = $data["display_name_text"];
    $sex_option_vi_vn = $data["sex_option_vi_vn"];
    $birth_date_date = '';
    if($data["birth_date_date"] !='' && $data["birth_date_date"] !=null){
        $birth_date_date_t = explode(" ",$data["birth_date_date"]);
        $birth_date_date = $birth_date_date_t[0][2] ."-".$birth_date_date_t[0][1]."-".$birth_date_date_t[0][0];
    }

    $address_geographic_address = $data["address_geographic_address"];
    $identification_number_text = $data["identification_number_text"];
    $insurance_number_text = $data["insurance_number_text"];

    $profile =
     '<div style="width: 100%" class="m_b15 f_b f_z20">A.THÔNG TIN CÁ NHÂN</div>
      <div style="width: 100%" class="m_b7">
        <div style="float: left" class="w20">Họ và Tên: </div>
        <div style="float: left" class="w30">'.$display_name_text.'</div>
        <div style="float: left;" class="w50">Quan hệ với chủ hộ: </div>
      </div>
      <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Giới tính: </div>
        <div style="float: left" class="w30">'.$sex_option_vi_vn.'</div>
        <div style="float: left;" class="w50">Nhóm máu: </div>
      </div>
      <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Ngày sinh: </div>
        <div style="float: left" class="w30">'.$birth_date_date.'</div>
        <div style="float: left;" class="w50">Tỉnh: </div>
      </div>
       <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Số chứng minh thư: </div>
        <div style="float: left" class="w80">'.$identification_number_text.'</div>
      </div>
      <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Mã số thẻ BHYT: </div>
        <div style="float: left" class="w80">'.$insurance_number_text.'</div>
      </div>
      <div style="width: 100%" class="m_b15 clear">
        <div style="float: left" class="w20">Địa chỉ: </div>
        <div style="float: left" class="w80">'.$address_geographic_address.'</div>
      </div>';
    //B.HISTORY AND HEALTH-RELATED FACTORS
    $history = $data["history"];
    //1.Condition at birth
    $condition_normal_birth_boolean = ($history["condition_normal_birth_boolean"] !=1)? "Không":"Có";
    $condition_surgery_boolean = ($history["condition_surgery_boolean"] !=1)? "Không":"Có";
    $condition_suffocation_at_birth_boolean = ($history["condition_suffocation_at_birth_boolean"] !=1)? "Không":"Có";
    $condition_premature_birth_boolean = ($history["condition_premature_birth_boolean"] !=1)? "Không":"Có";
    $condition_weight_text = ($history["condition_weight_text"] !=null)?$history["condition_weight_text"]:'';
    $condition_length_text = ($history["condition_length_text"] !=null)?$history["condition_length_text"]:'';
    $condition_birth_defects_text = ($history["condition_birth_defects_text"] !=null)?$history["condition_birth_defects_text"]:'';
    $condition_others_text = ($history["condition_others_text"] !=null)?$history["condition_others_text"]:'';

    $condition_birth =
        '<div style="width: 100%" class="m_b15 f_b f_z20">B.THÔNG TIN TIỀN SỬ VÀ CÁC YẾU TỐ LIÊN QUAN SỨC KHỎE</div>
         <div style="width: 100%" class=" f_b c_bb2020">1.Tình trạng lúc sinh</div>
         <div style="width: 100%" class="m_b7">
            <div style="width: 25%; float: left">Sinh thường: '.$condition_normal_birth_boolean.'</div>
            <div style="width: 25%; float: left;">Đẻ mổ: '.$condition_surgery_boolean.'</div>
            <div style="width: 25%; float: left">Đẻ thiếu tháng: '.$condition_premature_birth_boolean.'</div>
            <div style="width: 25%; float: left;">Bị ngạt lúc đẻ: '.$condition_suffocation_at_birth_boolean.'</div>
        </div>
        <div style="width: 100%" class="m_b7 clear">
            <div style="width: 25%; float: left">Cân nặng: '.$condition_weight_text.' gr</div>
            <div style="width: 25%; float: left;">Chiều dài: '.$condition_length_text.' cm</div>
        </div>
         <div class="w100 clear" style="float: left">Dị tật bẩm sinh(ghi rõ nếu có: '.$condition_birth_defects_text.'</div>
         <div class="w100 m_b10 clear" style="float: left;">Khác(ghi rõ nếu có): '.$condition_others_text.'</div>
        ';

    //2.Risk factors for personal health
    $risk_smoking_list_option_personal_habits = $history["risk_smoking_list_option_personal_habits"];
    $risk_smoking_no=($risk_smoking_list_option_personal_habits["no"]==1)? "Không hút":"";
    $risk_smoking_yes=($risk_smoking_list_option_personal_habits["yes"]==1)? "Có hút":"";
    $risk_smoking_regular=($risk_smoking_list_option_personal_habits["regular"]==1)? "Hút thường xuyên":"";
    $risk_smoking_gaveup=($risk_smoking_list_option_personal_habits["gaveup"]==1)? "Đã bỏ":"";

    $risk_smoking_list='';
    if($risk_smoking_no !='') $risk_smoking_list =$risk_smoking_no;
    if($risk_smoking_yes !='') {
        $risk_smoking_list = ($risk_smoking_list =="")?$risk_smoking_yes:$risk_smoking_list.", ".$risk_smoking_yes;
    }

    if($risk_smoking_regular !='') {
        $risk_smoking_list = ($risk_smoking_list =="")?$risk_smoking_regular:$risk_smoking_list.", ".$risk_smoking_regular;
    }

    if($risk_smoking_gaveup !='') {
        $risk_smoking_list = ($risk_smoking_list =="")?$risk_smoking_gaveup:$risk_smoking_list.", ".$risk_smoking_gaveup;
    }

    $risk_consume_alcohol_list_option_personal_habits = $history["risk_consume_alcohol_list_option_personal_habits"];
    $risk_alcohol_no=($risk_consume_alcohol_list_option_personal_habits["no"]==1)? "Không uống":"";
    $risk_alcohol_yes=($risk_consume_alcohol_list_option_personal_habits["yes"]==1)? "Có uống":"";
    $risk_alcohol_gaveup=($risk_consume_alcohol_list_option_personal_habits["gaveup"]==1)? "Đã bỏ":"";

    $risk_consume_alcohol_list ='';
    if($risk_alcohol_no !='') $risk_consume_alcohol_list =$risk_alcohol_no;
    if($risk_alcohol_yes !='') {
        $risk_consume_alcohol_list = ($risk_consume_alcohol_list =="")?$risk_alcohol_yes:$risk_consume_alcohol_list.", ".$risk_alcohol_yes;
    }

    if($risk_alcohol_gaveup !='') {
        $risk_consume_alcohol_list = ($risk_consume_alcohol_list =="")?$risk_alcohol_gaveup:$risk_consume_alcohol_list.", ".$risk_alcohol_gaveup;
    }

    $risk_use_narcotic_list_option_personal_habits = $history["risk_use_narcotic_list_option_personal_habits"];
    $risk_narcotic_no=($risk_use_narcotic_list_option_personal_habits["no"]==1)? "Không dùng":"";
    $risk_narcotic_yes=($risk_use_narcotic_list_option_personal_habits["yes"]==1)? "Có dùng":"";
    $risk_narcotic_regular=($risk_use_narcotic_list_option_personal_habits["regular"]==1)? "Dùng thường xuyên":"";
    $risk_narcotic_gaveup=($risk_use_narcotic_list_option_personal_habits["gaveup"]==1)? "Đã bỏ":"";

    $risk_use_narcotic_list ='';
    if($risk_narcotic_no !='') $risk_use_narcotic_list =$risk_narcotic_no;
    if($risk_narcotic_yes !='') {
        $risk_use_narcotic_list = ($risk_use_narcotic_list =="")?$risk_narcotic_yes:$risk_use_narcotic_list.", ".$risk_narcotic_yes;
    }

    if($risk_narcotic_regular !='') {
        $risk_use_narcotic_list = ($risk_use_narcotic_list =="")?$risk_narcotic_regular:$risk_use_narcotic_list.", ".$risk_narcotic_regular;
    }

    if($risk_narcotic_gaveup !='') {
        $risk_use_narcotic_list = ($risk_use_narcotic_list =="")?$risk_narcotic_gaveup:$risk_use_narcotic_list.", ".$risk_narcotic_gaveup;
    }

    $risk_physical_activity_list_option_personal_habits = $history["risk_physical_activity_list_option_personal_habits"];
    $risk_physical_no=($risk_physical_activity_list_option_personal_habits["no"]==1)? "Không vận động":"";
    $risk_physical_yes=($risk_physical_activity_list_option_personal_habits["yes"]==1)? "Có vận động":"";
    $risk_physical_regular=($risk_physical_activity_list_option_personal_habits["regular"]==1)? "Thường xuyên":"";

    $risk_physical_activity_list ='';
    if($risk_physical_no !='') $risk_physical_activity_list =$risk_physical_no;
    if($risk_physical_yes !='') {
        $risk_physical_activity_list = ($risk_physical_activity_list =="")?$risk_physical_yes:$risk_physical_activity_list.", ".$risk_physical_yes;
    }

    if($risk_physical_regular !='') {
        $risk_physical_activity_list = ($risk_physical_activity_list =="")?$risk_physical_regular:$risk_physical_activity_list.", ".$risk_physical_regular;
    }

    $risk_occupational_exposure_text = ($history["risk_occupational_exposure_text"] !=null)?$history["risk_occupational_exposure_text"]:'';
    $risk_toilet_type_text =($history["risk_toilet_type_text"] !=null)?$history["risk_toilet_type_text"]:'';
    $risk_others_text = ($history["risk_others_text"] !=null)?$history["risk_others_text"]:'';

    $number_of_cups_per_day_text= $history["number_of_cups_per_day_text"];

    $risk_factors_personal_health='
    <div style="width: 100%" class="m_b10 f_b c_bb2020">2.Yếu tố nguy cơ đối với sức khỏe cá nhân</div>
    <div style="width: 100%" class="">Hút thuốc lá, lào: '.$risk_smoking_list.'</div>
    <div style="width: 100%" class="">
        <div style="width: 70%; float: left;">Uống rượu bia thường xuyên: '.$risk_consume_alcohol_list.'</div>
        <div style="width: 30%; float: left;">Số ly cốc uống/ngày: '.$risk_consume_alcohol_list_option_personal_habits["numberofcupperday"].'</div>
    </div>
    <div style="width: 100%" class=" clear">Sử dụng ma túy: '.$risk_use_narcotic_list.'</div>
    <div style="width: 100%" class=" clear">Hoạt động thể lực: '.$risk_physical_activity_list.'</div>
    <div style="width: 100%" class=" clear">Yếu tố tiếp xúc nghề nghiệp/Môi trường sống(Hóa chất, bụi, ồn, virút) ghi rõ yếu tố tiếp xúc: '.$risk_occupational_exposure_text.'</div>
    <div style="width: 100%" class=" clear">Loại hố xí của gia đình(xả nước/ hai ngăn/hố xí thùng/ không có hố xí): '.$risk_toilet_type_text.'</div>
    <div style="width: 100%" class="m_b10 clear">Nguy cơ khác (ghi rõ): '.$risk_others_text.'</div>
    ';

    //3.History of diseases, allergies
    //3.1.Allergies
    $history_allergies_medicine_text = ($history["history_allergies_medicine_text"] !=null)?$history["history_allergies_medicine_text"]:'';
    $history_allergies_chemicals_text = ($history["history_allergies_chemicals_text"] !=null)?$history["history_allergies_chemicals_text"]:'';
    $history_allergies_food_text = ($history["history_allergies_food_text"] !=null)?$history["history_allergies_food_text"]:'';
    $history_allergies_others_text = ($history["history_allergies_others_text"] !=null)?$history["history_allergies_others_text"]:'';

    $History_allergies='
    <div style="width: 100%" class="m_b10 f_b c_bb2020">3.Tiền sử bệnh tật, dị ứng</div>
    <div style="width: 100%" class=" f_b ">3.1.Dị ứng</div>
    <div style="width: 100%" class=" ">Thuốc: '.$history_allergies_medicine_text.'</div>
    <div style="width: 100%" class=" ">Hóa chất/ mỹ phẩm: '.$history_allergies_chemicals_text.'</div>
    <div style="width: 100%" class=" ">Thực phẩm: '.$history_allergies_food_text.'</div>
    <div style="width: 100%" class="m_b10 ">Khác:  '.$history_allergies_others_text.'</div>
    ';
    //3.2.Diseases
    $history_diseases_heart_boolean = ($history["history_diseases_heart_boolean"] !=1)? "Không":"Có";
    $history_diseases_hypertension__boolean = ($history["history_diseases_hypertension__boolean"] !=1)? "Không":"Có";
    $history_diseases_diabetes_boolean = ($history["history_diseases_diabetes_boolean"] !=1)? "Không":"Có";
    $history_diseases_stomach_ache_boolean = ($history["history_diseases_stomach_ache_boolean"] !=1)? "Không":"Có";
    $history_diseases_chronic_lung_boolean = ($history["history_diseases_chronic_lung_boolean"] !=1)? "Không":"Có";
    $history_diseases_asthma_boolean = ($history["history_diseases_asthma_boolean"] !=1)? "Không":"Có";
    $history_diseases_goitre_boolean = ($history["history_diseases_goitre_boolean"] !=1)? "Không":"Có";
    $history_diseases_hepatitis_boolean = ($history["history_diseases_hepatitis_boolean"] !=1)? "Không":"Có";
    $history_diseases_congenital_heart_boolean =($history["history_diseases_congenital_heart_boolean"] !=1)? "Không":"Có";
    $history_diseases_heart_boolean = ($history["history_diseases_heart_boolean"] !=1)? "Không":"Có";
    $history_diseases_mental_boolean = ($history["history_diseases_mental_boolean"] !=1)? "Không":"Có";
    $history_diseases_autism_boolean = ($history["history_diseases_autism_boolean"] !=1)? "Không":"Có";
    $history_diseases_epileptic_boolean = ($history["history_diseases_epileptic_boolean"] !=1)? "Không":"Có";
    $history_diseases_autism_boolean = ($history["history_diseases_autism_boolean"] !=1)? "Không":"Có";
    $history_diseases_cancer_text = ($history["history_diseases_cancer_text"] !=null)?$history["history_diseases_cancer_text"]:'';
    $history_diseases_tuberculosis_text = ($history["history_diseases_tuberculosis_text"] !=null)?$history["history_diseases_tuberculosis_text"]:'';
    $history_diseases_others_text = ($history["history_diseases_others_text"] !=null)?$history["history_diseases_others_text"]:'';

    $diseases='
    <div style="width: 100%" class="m_b10 f_b c_bb2020">3.2.Bệnh tật</div>
    <div style="width: 100%" class="">
        <div style="width: 25%; float: left">Bệnh tim mạch: '.$history_diseases_heart_boolean.'</div>
        <div style="width: 25%; float: left;">Tăng huyết áp: '.$history_diseases_hypertension__boolean.'</div>
        <div style="width: 25%; float: left">Đái tháo đường: '.$history_diseases_diabetes_boolean.'</div>
        <div style="width: 25%; float: left;">Bệnh dạ dày: '.$history_diseases_stomach_ache_boolean.'</div>
    </div>
    <div style="width: 100%" class="">
        <div style="width: 25%; float: left">Bệnh phổi mản tính: '.$history_diseases_chronic_lung_boolean.'</div>
        <div style="width: 25%; float: left;">Hen suyễn: '.$history_diseases_asthma_boolean.'</div>
        <div style="width: 25%; float: left">Bệnh bướu cổ: '.$history_diseases_goitre_boolean.'</div>
        <div style="width: 25%; float: left;">Viêm gan: '.$history_diseases_hepatitis_boolean.'</div>
    </div>
     <div style="width: 100%" class="">
        <div style="width: 25%; float: left">Tim bẩm sinh: '.$history_diseases_congenital_heart_boolean.'</div>
        <div style="width: 25%; float: left;">Tâm thần: '.$history_diseases_mental_boolean.'</div>
        <div style="width: 25%; float: left">Tự kỷ: '.$history_diseases_autism_boolean.'</div>
        <div style="width: 25%; float: left;">Động kinh: '.$history_diseases_epileptic_boolean.'</div>
    </div>
     <div style="width: 100%" class=" clear">Ung thư (ghi rõ loại ung thư): '.$history_diseases_cancer_text.'</div>
    <div style="width: 100%" class=" ">Lao (ghi rõ loại lao): '.$history_diseases_tuberculosis_text.'</div>
    <div style="width: 100%" class="m_b10 ">Khác:  '.$history_diseases_others_text.'</div>
    ';
    //4.Defects
    $defects_hearing_text= ($history["defects_hearing_text"] !=null)?$history["defects_hearing_text"]:'';
    $defects_eye_sight_text= ($history["defects_eye_sight_text"] !=null)?$history["defects_eye_sight_text"]:'';
    $defects_hand_text= ($history["defects_hand_text"] !=null)?$history["defects_hand_text"]:'';
    $defects_foot_text= ($history["defects_foot_text"] !='')?$history["defects_foot_text"] : '';
    $defects_scoliosis_curvature_text= ($history["defects_scoliosis_curvature_text"] !=null)?$history["defects_scoliosis_curvature_text"]:'';
    $defects_lip_cleft_palate_text= ($history["defects_lip_cleft_palate_text"] !=null)?$history["defects_lip_cleft_palate_text"]:'';
    $defects_others_text= ($history["defects_others_text"] !=null)?$history["defects_others_text"]:'';

    $defects='
    <div style="width: 100%" class="m_b10 f_b c_bb2020">4.Khuyết tật</div>
    <div style="width: 100%" class=" ">Thính lực: '.$defects_hearing_text.'</div>
    <div style="width: 100%" class=" ">Thị lực: '.$defects_eye_sight_text.'</div>
    <div style="width: 100%" class=" ">Tay: '.$defects_hand_text.'</div>
    <div style="width: 100%" class=" ">Chân: '.$defects_foot_text.'</div>
    <div style="width: 100%" class=" ">Cong vẹo cột sống: '.$defects_lip_cleft_palate_text.'</div>
    <div style="width: 100%" class=" ">Khe hở môi, vòm miệng: '.$defects_lip_cleft_palate_text.'</div>
    <div style="width: 100%" class="m_b10 ">Khác: '.$defects_others_text.'</div>
    ';
    //5.History of surgery
    $surgery_notes_text= ($history["surgery_notes_text"] !=null)?$history["surgery_notes_text"]:'';
    $_history_surgery='
    <div style="width: 100%" class="m_b10 f_b c_bb2020">5.Tiền sử phẫu thuật (ghi rõ bộ phận cơ thể đã phẫu thuật và năm phẫu thuật)</div>
    <div style="width: 100%" class="m_b10 ">'.$surgery_notes_text.'</div>
    ';
    //6..Family history
    //6.1.Allergies
    $family_allergies_medicine_text= ($history["family_allergies_medicine_text"] !=null)?$history["family_allergies_medicine_text"]:'';
    $family_allergies_chemicals_text= ($history["family_allergies_chemicals_text"] !=null)?$history["family_allergies_chemicals_text"]:'';
    $family_allergies_food_text= ($history["family_allergies_food_text"] !=null)?$history["family_allergies_food_text"]:'';
    $family_allergies_others_text= ($history["family_allergies_others_text"] !=null)?$history["family_allergies_others_text"]:'';

    $FamilyAllergiesMedicinePatient= ($history["FamilyAllergiesMedicinePatient"] !=null)?$history["FamilyAllergiesMedicinePatient"]:'';
    $family_allergies_chemicals_patient_text= ($history["family_allergies_chemicals_patient_text"] !=null)?$history["family_allergies_chemicals_patient_text"]:'';
    $family_allergies_food_patient_text= ($history["family_allergies_food_patient_text"] !=null)?$history["family_allergies_food_patient_text"]:'';
    $family_allergies_others_patient_text= ($history["family_allergies_others_patient_text"] !=null)?$history["family_allergies_others_patient_text"]:'';

    $allergies = '<div style="width: 100%" class="m_b7 f_b c_bb2020">6.Tiền sử gia đình</div>
    <div style="width: 100%" class="m_b10 f_b">6.1.Dị ứng</div>
    <div class = "w100 clear">
        <div class="w60" type="float:left">Thuốc: '.$family_allergies_medicine_text.'</div>
        <div class="w40" type="float:left">'.$FamilyAllergiesMedicinePatient.'</div>
    </div>
    <div class = "w100 clear">
        <div class="w60" type="float:left">Hóa chất/ mỹ phẩm: '.$family_allergies_chemicals_text.'</div>
        <div class="w40" type="float:left">'.$family_allergies_chemicals_patient_text.'</div>
    </div>
    <div class = "w100 clear">
        <div class="w60" type="float:left">Thực phẩm: '.$family_allergies_food_text.'</div>
        <div class="w40" type="float:left">'.$family_allergies_food_patient_text.'</div>
    </div>
    <div class = "w100 m_b10 clear">
        <div class="w60" type="float:left">Khác: '.$family_allergies_others_text.'</div>
        <div class="w40" type="float:left">'.$family_allergies_others_patient_text.'</div>
    </div>
    ';

    //6.2.Diseases
    $family_diseases_heart_boolean= ($history["family_diseases_heart_boolean"] !=1)? "Không":"Có";
    $family_diseases_hypertension_boolean= ($history["family_diseases_hypertension_boolean"] !=1)? "Không":"Có";
    $family_diseases_mental_boolean= ($history["family_diseases_mental_boolean"] !=1)? "Không":"Có";
    $family_diseases_asthma_boolean= ($history["family_diseases_asthma_boolean"] !=1)? "Không":"Có";
    $family_diseases_diabetes_boolean= ($history["family_diseases_diabetes_boolean"] !=1)? "Không":"Có";
    $family_diseases_epileptic_boolean= ($history["family_diseases_epileptic_boolean"] !=1)? "Không":"Có";

    $family_diseases_cancer_text = ($history["family_diseases_cancer_text"] !=null)?$history["family_diseases_cancer_text"] : '';
    $family_diseases_asthma_notes_text = ($history["family_diseases_asthma_notes_text"] !=null)?$history["family_diseases_asthma_notes_text"] : '';
    $family_diseases_diabetes_notes_text = ($history["family_diseases_diabetes_notes_text"] !=null)? $history["family_diseases_diabetes_notes_text"]: '';
    $family_diseases_epileptic_notes_text = ($history["family_diseases_epileptic_notes_text"] !=null)? $history["family_diseases_epileptic_notes_text"]: '';
    $family_diseases_heart_notes_text = ($history["family_diseases_heart_notes_text"] !=null)? $history["family_diseases_heart_notes_text"] : '';
    $family_diseases_hypertension_notes_text = ($history["family_diseases_hypertension_notes_text"] !=null)? $history["family_diseases_hypertension_notes_text"] : '';
    $family_diseases_mental_notes_text = ($history["family_diseases_mental_notes_text"] !=null)? $history["family_diseases_mental_notes_text"] : '';
    $family_diseases_others_text = ($history["family_diseases_others_text"] !=null)? $history["family_diseases_others_text"] : '';
    $family_diseases_tuberculosis_text = ($history["family_diseases_tuberculosis_text"] !=null)? $history["family_diseases_tuberculosis_text"] : '';

    $familydiseases = '<div style="width: 100%" class="m_b10 f_b clear">6.2.Bệnh tật</div>
    <div style="width: 100%" class="m_b7 ">
        <div style="float: left" class="w20">Bệnh tim mạch: </div>
        <div style="float: left;" class="w20">'.$family_diseases_heart_boolean.'</div>
        <div style="float: left;" class="w20">'.$family_diseases_heart_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_heart_notes_text.'</div>
    </div>
     <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Tăng huyết áp: </div>
        <div style="float: left" class="w20">'.$family_diseases_hypertension_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_hypertension_notes_text.'</div>
    </div>
     <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Tâm thần: </div>
        <div style="float: left" class="w20">'.$family_diseases_mental_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_mental_notes_text.'</div>
    </div>
    <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Hen suyễn: </div>
        <div style="float: left" class="w20">'.$family_diseases_asthma_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_asthma_notes_text.'</div>
    </div>
     <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Đái tháo đường: </div>
        <div style="float: left" class="w20">'.$family_diseases_diabetes_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_diabetes_notes_text.'</div>
    </div>
    <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20">Động kinh: </div>
        <div style="float: left" class="w20">'.$family_diseases_epileptic_boolean.'</div>
        <div style="float: left;" class="w60 p_l15">'.$family_diseases_epileptic_notes_text.'</div>
    </div>
     <div style="width: 100%" class="m_b7 clear">
        <div style="width: 30%; float: left">Ung thư (ghi rõ loại ung thư): </div>
        <div style="width: 70%; float: left;">'.$family_diseases_cancer_text.'</div>
    </div>
     <div style="width: 100%" class="m_b7 clear">
        <div style="width: 30%; float: left">Lao (ghi rõ loại lao): </div>
        <div style="width: 70%; float: left;">'.$family_diseases_tuberculosis_text.'</div>
    </div>
    <div style="width: 100%" class="m_b10 clear">
        <div style="width: 30%; float: left">Khác: </div>
        <div style="width: 70%; float: left;">'.$family_diseases_others_text.'</div>
    </div>
    ';

    //7.Reproductive health and family planning
    $reproductive_contraceptive_methods_text = ($history["reproductive_contraceptive_methods_text"] !=null)? $history["reproductive_contraceptive_methods_text"] : '';
    $reproductive_last_pregnancy_text=  ($history["reproductive_last_pregnancy_text"] !=null)? $history["reproductive_last_pregnancy_text"] : '';
    $reproductive_number_of_pregnancies_number= ($history["reproductive_number_of_pregnancies_number"] !=null)? $history["reproductive_number_of_pregnancies_number"] : '';
    $reproductive_number_of_births_number= ($history["reproductive_number_of_births_number"] !=null)? $history["reproductive_number_of_births_number"] : '';
    $reproductive_term_births_number= ($history["reproductive_term_births_number"] !=null)? $history["reproductive_term_births_number"] : '';

    $reproductive_number_of_miscarriages_number= ($history["reproductive_number_of_miscarriages_number"] !=null)? $history["reproductive_number_of_miscarriages_number"] : '';
    $reproductive_normal_birth_number= ($history["reproductive_normal_birth_number"] !=null)? $history["reproductive_normal_birth_number"] : '';
    $reproductive_preterm_births_number= ($history["reproductive_preterm_births_number"] !=null)? $history["reproductive_preterm_births_number"] : '';

    $reproductive_number_of_abortions_number= ($history["reproductive_number_of_abortions_number"] !=null)? $history["reproductive_number_of_abortions_number"] : '';
    $reproductive_surgery_number= ($history["reproductive_surgery_number"] !=null)? $history["reproductive_surgery_number"] : '';
    $reproductive_breech_birth_number= ($history["reproductive_breech_birth_number"] !=null)? $history["reproductive_breech_birth_number"] : '';
    $reproductive_living_children_number= ($history["reproductive_living_children_number"] !=null)? $history["reproductive_living_children_number"] : '';

    $reproductive_gynaecological_disease_text= ($history["reproductive_gynaecological_disease_text"] !=null)? $history["reproductive_gynaecological_disease_text"] : '';

    $reproductive_health = '<div style="width: 100%" class="m_b10 f_b c_bb2020 clear">7.Sức khỏe sinh sản và kế hoạch hóa gia đình</div>
        <div style="width: 100%" class="  ">Biện pháp tránh thai đang dùng: '.$reproductive_contraceptive_methods_text.'</div>
        <div style="width: 100%" class="  ">Kỳ có thai cuối cùng: : '.$reproductive_last_pregnancy_text.'</div>
        <div style="width: 100%" class=" clear">
            <div style="float: left" class="w25">Số lần có thai: '.$reproductive_number_of_pregnancies_number.'</div>
            <div style="float: left" class="w25">Số lần sảy thai:'.$reproductive_number_of_miscarriages_number.'</div>
            <div style="float: left;" class="w25 ">Số lần phá thai: '.$reproductive_number_of_abortions_number.'</div>
        </div>
        <div style="width: 100%" class=" clear">
            <div style="float: left" class="w25">Số lần sinh con: '.$reproductive_number_of_births_number.'</div>
            <div style="float: left" class="w25">Sinh thường: '.$reproductive_normal_birth_number.'</div>
            <div style="float: left" class="w25">Đẻ mổ: '.$reproductive_surgery_number.'</div>
            <div style="float: left;" class="w25 ">Đẻ khó: '.$reproductive_breech_birth_number.'</div>
        </div>
         <div style="width: 100%" class=" clear">
            <div style="float: left" class="w25">Đẻ đủ tháng: '.$reproductive_term_births_number.'</div>
            <div style="float: left" class="w25">Sinh non: '.$reproductive_preterm_births_number.'</div>
            <div style="float: left;" class="w25 ">Số con hiện sống:  '.$reproductive_living_children_number.'</div>
        </div>
         <div style="width: 100%" class="m_b10 ">Bệnh phụ khoa: '.$reproductive_gynaecological_disease_text.'</div>
    ';
    //8.Others
    $other_notes_text= $history["other_notes_text"];
    $reproductive = '<div style="width: 100%" class="m_b10 f_b c_bb2020 clear">8.Khác</div>
    <div style="width: 100%" class="m_b10  clear">'.$other_notes_text.'</div>
    ';

    //D.CLINICAL & PARACLINICAL MEDICINE
    //1.History
    //search vital where appointment = current appointment
    $HistoryDescription_list = ($data["HistoryDescription_list"])?$data["HistoryDescription_list"]:'';
    $history_des =
        '<div style="width: 100%" class="m_b15 f_b f_z20 clear">D.KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN</div>
         <div style="width: 100%" class="m_b10 f_b c_bb2020">1.Tiền sử</div>
         <div style="width: 100%" class="m_b10 ">'.$HistoryDescription_list.'</div>

         ';
    //2.Clinical Examination
    //2.1.Vital signs & Anthropometric indicators
    //table
    $pulse_text= ($data["pulse_text"] !=null)?$data["pulse_text"]:'';
    $blood_pressure___systolic_number= ($data["blood_pressure___systolic_number"] !=null)?$data["blood_pressure___systolic_number"]:'';
    $blood_pressure___diastolic_number= ($data["blood_pressure___diastolic_number"] !=null)?$data["blood_pressure___diastolic_number"]:'';
    $temperature_number= ($data["temperature_number"] !=null)?$data["temperature_number"]:'';
    $respiratory_rate_number= ($data["respiratory_rate_number"] !=null)?$data["respiratory_rate_number"]:'';
    $weight_number= ($data["weight_number"] !=null)?$data["weight_number"]:'';
    $height_number= ($data["height_number"] !=null)?$data["height_number"]:'';
    $bmi_number= ($data["bmi_number"] !=null)?$data["bmi_number"]:'';
    $WaistCircumference= ($data["WaistCircumference"] !=null)?$data["WaistCircumference"]:'';

    $signs ='
         <div style="width: 100%" class="m_b10 f_b c_bb2020 clear">2.Thăm khám lâm sàng</div>
         <div style="width: 100%" class="m_b7 f_b">2.1.Dấu hiệu sinh tồn, chỉ số nhân trắc học</div>
           <table style="width:100%;" class="m_b10">
                <thead>
                    <tr>
                        <th class="w10">Mạch</th>
                        <th class="w15">Nhiệt độ</th>
                        <th class="w15">Huyết áp</th>
                        <th class="w15">Nhịp thở</th>
                        <th class="w15">Cân nặng</th>
                        <th class="w15">Chiều cao</th>
                        <th class="w15">BMI</th>
                        <th class="w20">Vòng bụng</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td class="text_c">'.$pulse_text.'</td>
                        <td class="text_c">'.$temperature_number.'</td>
                        <td class="text_c">'.$blood_pressure___systolic_number.'/'.$blood_pressure___diastolic_number.'</td>
                        <td class="text_c">'.$respiratory_rate_number.'</td>
                        <td class="text_c">'.$weight_number.'</td>
                        <td class="text_c">'.$height_number.'</td>
                        <td class="text_c">'.$bmi_number.'</td>
                        <td class="text_c">'.$WaistCircumference.'</td>
                    </tr>
                </tbody>
           </table>
         ';
    //2.2.Eye Vision
    $left_eye___not_glasses_text= ($data["left_eye___not_glasses_text"] !=null)?$data["left_eye___not_glasses_text"]:'';
    $right_eye___not_glasses_text= ($data["right_eye___not_glasses_text"] !=null)?$data["right_eye___not_glasses_text"]:'';
    $right_eye___glasses_text= ($data["right_eye___glasses_text"] !=null)?$data["right_eye___glasses_text"]:'';
    $left_eye___glasses_text= ($data["left_eye___glasses_text"] !=null)?$data["left_eye___glasses_text"]:'';

    $eye ='<div style="width: 100%" class="m_b10 f_b clear">2.2. Thị lực:</div>
    <div style="width: 100%" class="m_b7 clear">
        <div style="float: left" class="w20"><u>Không kính:</u></div>
        <div style="float: left;" class="w20 ">Mắt phải: </div>
        <div style="float: left" class="w20">'.$right_eye___not_glasses_text.'</div>
        <div style="float: left" class="w20">Mắt trái: </div>
        <div style="float: left;" class="w20 ">'.$left_eye___not_glasses_text.'</div>
    </div>
      <div style="width: 100%" class="m_b10 clear">
        <div style="float: left" class="w20"><u>Có kính:</u></div>
        <div style="float: left;" class="w20 ">Mắt phải: </div>
        <div style="float: left" class="w20">'.$right_eye___glasses_text.'</div>
        <div style="float: left" class="w20">Mắt trái: </div>
        <div style="float: left;" class="w20 ">'.$left_eye___glasses_text.'</div>
    </div>
    ';

    //2.3.Clinical Examination
    //2.3.1.Full-body
    $fullbody___skin_mucosa_text= ($data["fullbody___skin_mucosa_text"] !=null)?$data["fullbody___skin_mucosa_text"]:'';
    $fullbody___others_text= ($data["fullbody___others_text"] !=null)?$data["fullbody___others_text"]:'';

    $fullbody ='<div style="width: 100%" class=" f_b clear">2.3.Thăm khám lâm sàng</div>
    <div style="width: 100%" class="m_b10 f_b clear">2.3.1.Toàn thân</div>
    <div style="width: 100%" class=" clear">Da, niêm mạc: '.$fullbody___skin_mucosa_text.'</div>
    <div style="width: 100%" class="m_b10 clear">Khác:  '.$fullbody___others_text.'</div>
    ';

    //2.3.2.Organs
    $organs___cardiology_text= ($data["organs___cardiology_text"] !=null)?$data["organs___cardiology_text"]:'';
    $organs___respiratory_system_text= ($data["organs___respiratory_system_text"] !=null)?$data["organs___respiratory_system_text"]:'';
    $organs___digestive_system_text= ($data["organs___digestive_system_text"] !=null)?$data["organs___digestive_system_text"]:'';
    $organs___urinary_tract_text= ($data["organs___urinary_tract_text"] !=null)?$data["organs___urinary_tract_text"]:'';
    $organs___musculoskeletal_system_text= ($data["organs___musculoskeletal_system_text"] !=null)?$data["organs___musculoskeletal_system_text"]:'';
    $organs___endocrine_system_text= ($data["organs___endocrine_system_text"] !=null)?$data["organs___endocrine_system_text"]:'';
    $organs___nervous_system_text= ($data["organs___nervous_system_text"] !=null)?$data["organs___nervous_system_text"]:'';
    $organs___mental_text= ($data["organs___mental_text"] !=null)?$data["organs___mental_text"]:'';
    $organs___surgical_system_text=($data["organs___surgical_system_text"] !=null)?$data["organs___surgical_system_text"]:'';
    $organs___obstetricians_and_gynecologists_text= ($data["organs___obstetricians_and_gynecologists_text"] !=null)?$data["organs___obstetricians_and_gynecologists_text"]:'';
    $organs___ears_nose_throat_text= ($data["organs___ears_nose_throat_text"] !=null)?$data["organs___ears_nose_throat_text"]:'';
    $organs___eyes_text= ($data["organs___eyes_text"] !=null)?$data["organs___eyes_text"]:'';
    $organs___dermatology_text= ($data["organs___dermatology_text"] !=null)?$data["organs___dermatology_text"]:'';
    $organs___nutrition_text= ($data["organs___nutrition_text"] !=null)?$data["organs___nutrition_text"]:'';
    $organs___physical_system_text= ($data["organs___physical_system_text"] !=null)?$data["organs___physical_system_text"]:'';
    $organs___others_text= ($data["organs___others_text"] !=null)?$data["organs___others_text"]:'';
    $organs___evaluation_of_physical_text= ($data["organs___evaluation_of_physical_text"] !=null)?$data["organs___evaluation_of_physical_text"]:'';

    $organs ='<div style="width: 100%" class="m_b10 f_b clear">2.3.2.Nội tạng</div>
    <div style="width: 100%" class="  clear">Tim mạch: '.$organs___cardiology_text.'</div>
    <div style="width: 100%" class=" clear">Hô hấp: '.$organs___respiratory_system_text.'</div>
    <div style="width: 100%" class=" clear">Tiêu hóa: '.$organs___digestive_system_text.'</div>
    <div style="width: 100%" class=" clear">Tiết niệu: '.$organs___urinary_tract_text.'</div>
    <div style="width: 100%" class=" clear">Cơ xương khớp: '.$organs___musculoskeletal_system_text.'</div>
    <div style="width: 100%" class=" clear">Nội tiết: '.$organs___endocrine_system_text.'</div>
    <div style="width: 100%" class=" clear">Thần kinh: '.$organs___nervous_system_text.'</div>
    <div style="width: 100%" class="m_b7 clear">Tâm thần: '.$organs___mental_text.'</div>
    <div style="width: 100%" class=" clear">Ngoại khoa:  '.$organs___surgical_system_text.'</div>
    <div style="width: 100%" class=" clear">Sản phụ khoa:  '.$organs___obstetricians_and_gynecologists_text.'</div>
    <div style="width: 100%" class=" clear">Tai mũi họng: '.$organs___ears_nose_throat_text.'</div>
    <div style="width: 100%" class=" clear">Mắt: '.$organs___eyes_text.'</div>
    <div style="width: 100%" class=" clear">Da liễu: '.$organs___dermatology_text.'</div>
    <div style="width: 100%" class=" clear">Dinh dưỡng: '.$organs___nutrition_text.'</div>
    <div style="width: 100%" class=" clear">Vận động: '.$organs___physical_system_text.'</div>
    <div style="width: 100%" class=" clear">Khác: '.$organs___others_text.'</div>
    <div style="width: 100%" class="m_b10 clear">Đánh giá phát triển thể chất, tinh thần, vận động: '.$organs___evaluation_of_physical_text.'</div>
    ';
    //3.Paraclinical Results
    $hematolofy_result_text = ($data["hematolofy_result_text"] !=null)?$data["hematolofy_result_text"]:'';
    $serum_biochemistry_result_text = ($data["serum_biochemistry_result_text"] !=null)?$data["serum_biochemistry_result_text"]:'';
    $urine_biochemistry_result_text = ($data["urine_biochemistry_result_text"] !=null)?$data["urine_biochemistry_result_text"]:'';
    $abdominal_ultrasound_result_text = ($data["abdominal_ultrasound_result_text"] !=null)?$data["abdominal_ultrasound_result_text"]:'';

    $Paraclinical = '<div style="width: 100%" class="m_b7 f_b clear">3.Kết quả cận lâm sàng</div>
           <table style="width:100%;" class="m_b10">
                <thead>
                    <tr>
                        <th style="width:30px" >STT</th>
                        <th class="w30">Tên Xét nghiệm</th>
                        <th class="w50">Kết quả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text_c">1</td>
                        <td class="p_l15">Huyết học</td>
                        <td class="p_l15">'.$hematolofy_result_text.'</td>
                    </tr>
                    <tr>
                        <td class="text_c">2</td>
                        <td class="p_l15">Sinh hóa máu</td>
                        <td class="p_l15">'.$serum_biochemistry_result_text.'</td>
                    </tr>
                    <tr>
                        <td class="text_c">3</td>
                        <td class="p_l15">Sinh hóa nước tiểu</td>
                        <td class="p_l15">'.$urine_biochemistry_result_text.'</td>
                    </tr>
                    <tr>
                        <td class="text_c">4</td>
                        <td class="p_l15">Siêu âm vùng bụng</td>
                        <td class="p_l15">'.$abdominal_ultrasound_result_text.'</td>
                    </tr>
                </tbody>
           </table>
    ';
//4.Diagnosis/ Conclusion
    //diagnostics
    $diagnostic = '';
    if(count($data['diagnostic_list_custom_diagnostic'])>0){
        foreach($data['diagnostic_list_custom_diagnostic'] as $item){
            $diagnostic =($diagnostic=='')?$item["name_text"]: $diagnostic.', '.$item["name_text"];
        }
    }
    $diagnostics = '<div style="width: 100%" class="m_b7 f_b clear">4.Chẩn đoán/ Kết luận</div>
 <div style="width: 100%" class="m_b10  clear">'.$diagnostic.'</div>
 ';

//5.Consultation
     $notes_text = ($data["notes_text"] !=null)?$data["notes_text"]:'';

    $Consultation = '<div style="width: 100%" class="m_b7 f_b clear">5.Tư vấn</div>
          <div style="width: 100%" class="m_b10  clear">'.$notes_text.'</div>
     ';

    $html = '<html lang="en">
      <head>
        <meta charset="UTF-8">
        <title> KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN</title>
          <style type="text/css" media="print">
         @media print {
               @page {
                  margin-top: 0;
                  margin-bottom: 0;
               }
               body {
                  padding-top: 25px;
                  padding-bottom: 25px ;
               }
         }
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }

        table tfoot td{
            border: none;
        }

        .m_b7{margin-bottom: 7px;}
        .m_b10{margin-bottom: 10px;}
        .m_b15{margin-bottom: 15px;}
        .f_b{font-weight: bold;}
        .f_z16{font-size:16px}
        .f_z18{font-size:18px}
        .f_z20{font-size:20px}
        .text_c{text-align:center}
        .text_r{text-align:right}
        .m_r15{margin-right:15px}
        .m_l5{margin-left:5px}
        .p_r15{padding-right:15px}
        .p_l15{padding-left:15px}
        .middle-text{display: flex;
                    align-items: center;
                    justify-content: center;}
        .w10 {width:10%}
        .w15 {width:15%}
        .w20 {width:20%}
        .w25 {width:25%}
        .w30 {width:30%}
        .w40 {width:40%}
        .w50 {width:50%}
        .w60 {width:60%}
        .w70 {width:70%}
        .w80 {width:80%}
        .w100 {width:100%}
        .c_bb2020{color:#bb2020;}
        .clear{clear:both}
        </style>
      </head>

      <body>
      <div style="width: 100%">
        <div style="width: 50%; float: left">
            <img src="https://s3.amazonaws.com/appforest_uf/f1597291259978x729090411498556500/111111111111.jpg" style="height: 40px" />
        </div>
      </div>
      <h1 style="width: 100%; text-align: center; margin-bottom: 15px;font-size: 20px; color: #6676f2; ;clear: both">KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN</h1>
        '   .$profile.
        $condition_birth.
        $risk_factors_personal_health.
        $History_allergies.
        $diseases.

        $defects.
        $_history_surgery.
        $allergies.
        $familydiseases.
        $reproductive_health.
        $reproductive.
        $history_des.
        $signs.
        $eye.
        $fullbody.
        $organs.
        $Paraclinical.
        $diagnostics.
        $Consultation.
        '
    </body>

</html>';

    //print_r($html); die();
    if($what_do =="print"){
        echo $html;
    }else{
        $mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor/mpdf/mpdf/tmp']);
        $mpdf->SetHTMLFooter('<div style="width: 100%">
        <div style="width: 50%; float: left">https://xinchaobacsi.vn/</div>
        <div style="width: 50%; float: left; text-align: right;">{PAGENO}</div>
      </div>');

        $mpdf->WriteHTML($html);

        $fileName = 'paraclinical_'.$Vital_ID.'_'.$display_name_text.'.pdf';

        $pathname ="download_file/";
        $pdfPathTemp = $_SERVER["DOCUMENT_ROOT"].$pathname.$fileName;

        //$pdfPathTemp ='C:/xampp/htdocs/bacsi/public/download_file/'.$fileName;
        //print_r($pdfPathTemp); die();

        $mpdf->Output($pdfPathTemp,'F');
        $url_download_file = $ob_api_path->pdf_path.$fileName;
        if($what_do =="send_email"){
            $api_path = $ob_api_path->api_path_dev.'_send_email.php';
            $email = $data['Email'];
            if($data['u_guardian_Email'] !='' && $data['u_guardian_Email'] !=null){
                $email = $data['u_guardian_Email'];
            }

            $subject ="KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN";

            $body ='<p class="w100">Chào bạn</p>';
            $body .='<p><a href="'.$url_download_file.'">Click vào đây để tải KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN</a></p>';
            $body .='<p class="w100 m-t20">Cám ơn</p>';
            $post = array('token'=>$token,'to_name'=>$display_name_text,'to_email'=>$email,'subject'=>$subject,'body'=>$body);

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
    }

}else{
    if($what_do =="print"){
        echo '';
    }else{
        if($what_do =="send_email"){
            echo json_encode(array("email_sent"=>"Can not send"));
        }else{
            echo json_encode(array("filename"=>"","url_download_file"=>""));
        }
    }
}






