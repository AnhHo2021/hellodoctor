<?php
class HTTPMethod{
    public static function httpGet($url)
    {
        $swagger_token = '2ef81a99b1a65ab5c15c42e464ebbdd2';
        $swagger_host='https://xinchaobacsi.vn/api/1.1/'.$url;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $swagger_host);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

        //Set your auth headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $swagger_token
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);
        // echo($response);
        // echo '<br>';
        return json_decode($response);
    }
}

