<?php 
if($_POST['file']){
    $filename = !empty($_POST['file']) ? $_POST['file'] : $_FILES['file']['name'];
    if (!is_array($filename)) {
        $filename = explode('.', $filename);
    }
    // die("try!!!");
    var_dump($filename);
    $ext = end($filename);
    echo $ext;
    if($ext==$filename[count($filename) - 1]){
        die("try again!!!");
    }
    $new_name = (string)rand(100,999).".".$ext;
    echo $new_name;
    // move_uploaded_file($_FILES ['file']['tmp_name'],$new_name);
    $_ = $_POST['hello'];
    echo $_POST['hello'];
    if(@substr(file($_)[0],0,6)==='@<?php'){
        if(strpos($_,$new_name)===false) {
            include($_);
        } else {
            echo "you can do it!";
        }
    }
    unlink($new_name);
}
else{
    // highlight_file(__FILE__);
    var_dump($_POST);
    echo(2);
}