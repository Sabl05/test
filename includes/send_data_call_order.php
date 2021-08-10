<?php

if (empty($_POST["first_name"]) or empty($_POST["last_name"]) or empty($_POST["tel"])) {
  echo('error');
} else {
  $queryUrl = 'https://api.skillaz.ru/open-api/objects/candidate';
     $queryData = http_build_query(array(
         'fields' => array(
             "TITLE"=> "Заказ обратного звонка" .' JumisBar',
             'NAME' => isset($_POST["first_name"]) ? $_POST["first_name"] : $_POST["first_name"],
             'LAST_NAME' =>  isset($_POST["last_name"]) ? $_POST["last_name"] : $_POST["last_name"],
             //'ADDRESS' => $theOrder["order"]["delivery_address"],
             'PHONE' => Array(
                 "n0" => Array(
                     "VALUE" => isset($_POST["tel"]) ? $_POST["tel"] : $_POST["tel"],
                     "VALUE_TYPE" => "WORK",
                 ),
             ),
         ),
         'params' => array("REGISTER_SONET_EVENT" => "Y")
     ));

     $curl = curl_init();
     curl_setopt_array($curl, array(
         CURLOPT_SSL_VERIFYPEER => 0,
         CURLOPT_POST => 1,
         CURLOPT_HEADER => 0,
         CURLOPT_RETURNTRANSFER => 1,
         CURLOPT_URL => $queryUrl,
         CURLOPT_POSTFIELDS => $queryData,
     ));
     $result = curl_exec($curl);
     curl_close($curl);
     $result = json_decode($result, 1);
}
