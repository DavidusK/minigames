<?php
define("APP_URL","https://minigames.piratepets.io");
// define("APP_URL","http://localhost/minigames");
define("API_BASE_URL","https://api.piratepets.io/api/v1/");
define("ROOT_DIR",__DIR__);
if(isset($_COOKIE['userLogin']) && $_COOKIE['userLogin'] != ""){
    $Url = API_BASE_URL."user/profile";
    $headers = ["Authorization: Bearer ".$_COOKIE['userLogin']];
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 180);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    $response=curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        $error_no = curl_errno($ch);
        print_r($http_status); die($error_no." :: ".$error_msg);
    }
    curl_close($ch);
    $response = json_decode($response,TRUE);
    $userInfo = [];
    if($response['status'] == "success")
        $userInfo = $response['data'];
    // echo "<pre>"; print_r($userInfo); die;
}