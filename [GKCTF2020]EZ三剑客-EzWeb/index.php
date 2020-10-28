<?php
function curl($url){  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    echo curl_exec($ch);
    curl_close($ch);
}

if(isset($_GET['submit'])){
		$url = $_GET['url'];
		//echo $url."\n";
		if(preg_match('/file\:\/\/|dict|\.\.\/|127.0.0.1|localhost/is', $url,$match))
		{
			//var_dump($match);
			die('别这样');
		}
		curl($url);
}
if(isset($_GET['secret'])){
	system('ifconfig');
}
?>