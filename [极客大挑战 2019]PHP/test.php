<?php 
include "./www/class.php";
// $auser = new Name("admin",100);
// echo serialize($auser);
echo "\n";
$a = 'O:4:"Name":2:{s:14:" Name username";s:5:"admin";s:14:" Name password";i:100;}';
$buser = unserialize($a);
echo "\n"

?>