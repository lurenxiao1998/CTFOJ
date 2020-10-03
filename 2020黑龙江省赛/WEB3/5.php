<?php
// highlight_file(__FILE__);

class Fatcowroll{
    public $answer=123;
    private $serect=$$answer;
    function __construct(){
        // $this->serect = "try to eat me!!!";
    }
    function __destruct(){
        global $real_serect;
        if ($this->answer === $this->serect){
            global $e_flag;
            print("<br>吃了肥牛卷心满意足!来杯饮料吧!");
            print ("<br>Fifth flag: ".$e_flag);
        }
        else{
            print("不答对问题不给吃肥牛卷");
        }
    }
}
$a= new Fatcowroll();

echo serialize($a)."\n";
?>