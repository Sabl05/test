<?php

function exec_request($url, $data="no", $post=false){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "accept: application/json",
        "Authorization: Bearer =",
        "Content-Type: application/json-patch+json",
    );
    //Pov0zlCfbS1GoxKJ6scWgHxdpcw45ApCt9hmVqwl/cw=   kz1vFbPoI5jTxpia8VIKMGK0ff9TjwnYPBC5TGRb91o=
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    if($post) {
        curl_setopt($curl, CURLOPT_POST, true);
    }
    else{
        curl_setopt($curl, CURLOPT_POST, false);
    }

    if($data != "no")
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


//for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    return json_decode($resp, true);
}

if (empty($_POST["id"]) or empty($_POST["first_name"]) or empty($_POST["last_name"]) or empty($_POST["tel"])) {
  echo "error";
}else {
  $url = "";
  $VacancyId = "\"{$_POST["id"]}\"";
  $FirstName = "\"{$_POST["first_name"]}\"";
  $LastName = "\"{$_POST["last_name"]}\"";
  $Email = "\"{$_POST["email"]}\"";
  $PhoneNumber = "\"{$_POST["tel"]}\"";


  $data = '{
    "VacancyId": '.$VacancyId.',
    "FirstName":'.$FirstName.',
    "LastName": '.$LastName.',
    "Email": '.$Email.',
    "PhoneNumber": '.$PhoneNumber.'
  }';
  $decoded_resp = exec_request($url, $data, true);
  print_r($decoded_resp, true);

}
