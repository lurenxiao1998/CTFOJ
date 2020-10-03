## 知识点

* http请求头

## 解题过程

访问题目，F12查看源码

![QQ截图20200129121922](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\QQ截图20200129121922.png)

发现有个Secret.php，访问

![image-20200129122252423](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\image-20200129122252423.png)

看到这个应该就知道是要修改请求头了，可以用**Modify Headers**这个插件，或者直接**burp suit**。添加referer，这个项表示从哪个网页所属的域名跳转过来的（比如从百度点进来就是www.baidu.com）

![image-20200129122520096](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\image-20200129122520096.png)

![image-20200129122828973](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\image-20200129122828973.png)

接着修改user-agent请求头

![QQ截图20200129123027](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\QQ截图20200129123027.png)

![QQ截图20200129123056](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\QQ截图20200129123056.png)

接着修改X-Forwarded-For请求头，表示请求从哪个用户发出的。改为127.0.0.1

![QQ截图20200129123204](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\QQ截图20200129123204.png)

![QQ截图20200129123208](D:\CTF\ctf\web\buuctf\[极客大挑战 2019]Http\screen_shot\QQ截图20200129123208.png)

获取flag

## reference

[关于HTTP_CLIENT_IP,HTTP_X_FORWAR](https://www.cnblogs.com/XACOOL/p/5475703.html)

[http请求头中Referer的含义和作用](https://www.sojson.com/blog/58.html)