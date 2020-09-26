<?php 
$wwc="0x1";

if (strpos($wwc, 'e') !== False)
{
    echo('也许?吃饭的时候不要讨论科学?');
}
if(intval($wwc) == 0){
    echo 1;
}
if(floatval($wwc) == 0){
    echo 2;
}
echo intval($wwc);
if($wwc > 0){
    echo 3;
}
?>