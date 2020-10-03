<?php
$sandbox = '/var/sandbox/' . md5("prefix" . $_SERVER['REMOTE_ADDR']);
@mkdir($sandbox);
@chdir($sandbox);
var_dump($_FILES);
if($_FILES['file']['name']){
    $filename = !empty($_POST['file']) ? $_POST['file'] : $_FILES['file']['name'];
    if (!is_array($filename)) {
        $filename = explode('.', $filename);
    }
    // var_dump($filename);
    $ext = end($filename);
    echo $ext."\n";
    echo "split"."\n";
    echo $filename[count($filename) - 1]."\n";
    if($ext==$filename[count($filename) - 1]){
        die("try again!!!");
    }
    $new_name = (string)rand(100,999).".".$ext;
    move_uploaded_file($_FILES ['file']['tmp_name'],$new_name);
    echo "newname:$new_name\n";
    echo "file:".substr(file($new_name)[0],0,6)."\n";
    $_ = $_POST['hello'];
    echo "\$_:$_";
    if(@substr(file($_)[0],0,6)==='@<?php'){
        echo "a\n";
        if(strpos($_,$new_name)===false) {
            echo "b\n";
            include($_);
        } else {
            echo "you can do it!";
        }
    }
    unlink($new_name);
}
else{
    // highlight_file(__FILE__);
    echo("NO!!");
}