#!/usr/bin/env python
#coding:utf8
from urllib import request,parse

url='http://127.0.0.1/test.php'
# headers={
#     'User-Agent':'Mozilla/5.0 (compatible; MSIE 5.5; Windows NT)',
#     'Host':'httpbin.org'
# }  #定义头信息

dict={'file[germey]':'1'}
data = bytes(parse.urlencode(dict),encoding='utf-8')
req = request.Request(url=url,data=data,method='POST')
#req.add_header('User-Agent','Mozilla/5.0 (compatible; MSIE 8.4; Windows NT') #也可以request的方法来添加
response = request.urlopen(req) 
print(response.read().decode())