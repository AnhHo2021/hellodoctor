<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : $_SERVER['HTTP_HOST'];
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: POST, OPTIONS, GET, PUT');
header('Access-Control-Allow-Credentials: true');

        $url = 'https://xinchaobacsi.vn/api/1.1/obj/user/1626226580288x677516401460215300?api_token=2ef81a99b1a65ab5c15c42e464ebbdd2';

        $postData = array(
                "city_text" => "Sai gon",
                "display_name_text" => "Anh Ho Xuan",
                "family_name_text" => "Ho",
                "first_name_text" => "Anh",
                "identification_number_text"=> "12345678",
                "insurance_number_text" => "123456",
                "language_text" => "vi_vn",
                "meeting_link_text"=>"test",
                "middle_name_text"=> "Xuan"
                );
        $postData= json_encode($postData);
        $handler = curl_init();
        $access_token = "2ef81a99b1a65ab5c15c42e464ebbdd2";
        //$headers[] = 'Authorization: bearer '.$access_token;
       $headers[] = 'Content-Type: application/json';
        $headers[] = 'accept: application/json';
        
        curl_setopt($handler, CURLOPT_URL, $url);
        //curl_setopt($handler, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($handler, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($handler, CURLOPT_PUT, true);
        curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($handler);
        curl_close($handler);
        print_r($response);
        die();
        if($response !==false)
        {
         // var_dump($response);
        }
        else {
          print "Could not get a response";
        }


?>
