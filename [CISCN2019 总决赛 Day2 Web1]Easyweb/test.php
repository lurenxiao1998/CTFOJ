<?php
// include "config.php";

// $id=isset($_GET["id"])?$_GET["id"]:"1";
// $path=isset($_GET["path"])?$_GET["path"]:"";
$id = "1\\0";
// $path =

$id=addslashes($id);
// $path=addslashes($path);
echo $id."\n";
$id=str_replace(array("\\0","%00","\\'","'"),"",$id);
echo $id."\n";
// $path=str_replace(array("\\0","%00","\\'","'"),"",$path);

// $result=mysqli_query($con,"select * from images where id='{$id}' or path='{$path}'");
// $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

// $path="./" . $row["path"];
// header("Content-Type: image/jpeg");
// readfile($path);