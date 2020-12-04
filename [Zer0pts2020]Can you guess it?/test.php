<?php
$secret = bin2hex(random_bytes(64));
echo $secret;
// $a="config.php"
var_dump(basename("\x1aconfig.php/"));
echo "\x93";
highlight_file(basename("\xffindex.php/"));