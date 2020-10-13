<?php
// $query = ["1",2];
// echo substr_count($query, '_');
// echo substr_count($query, '%5f');
// echo "\n".urldecode("%5f")."\n";
// if( substr_count($query, '_') !== 0 || substr_count($query, '%5f') != 0 ){
//     die('Y0u are So cutE!');
// }
// echo urlencode("\n");
function change($v){ 
    $v = base64_decode($v); 
    $re = ''; 
    for($i=0;$i<strlen($v);$i++){ 
        $re .= chr ( ord ($v[$i]) + $i*2 ); 
    } 
    return $re; 
}

function convert($v){ 
    $re = ''; 
    for($i=0;$i<strlen($v);$i++){ 
        $re .= chr ( ord ($v[$i]) - $i*2 ); 
    } 
    $re = base64_encode($re);
    return $re; 
}
echo convert("takeip.php");
// echo change(convert("flag.php"));