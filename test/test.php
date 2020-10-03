<?php
define("METHOD", "aes-128-cbc");  //定义加密方式
define("SECRET_KEY", "123");    //定义密钥
define("IV","6666666666666666");    //定义初始向量 16个6
define("BR",'<br>');
$iv = IV;
$data = "1234";
echo base64_encode(openssl_encrypt($data, METHOD, SECRET_KEY, OPENSSL_RAW_DATA, $iv)).BR;
// openssl_decrypt(base64_decode($data),METHOD,SECRET_KEY,OPENSSL_RAW_DATA,$iv) or die('False');