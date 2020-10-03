

# 反序列化漏洞

## 考点

* [PHP反序列化漏洞](https://www.cnblogs.com/wushangguo/p/9523849.html)

* 弱口令

## 解题过程

开头看到这个，爆破。

![1](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\1.png)

用户名admin，密码admin888

![2](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\2.png)

![3](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\3.png)

获得一个照片地址，但没啥用，点help，发现请求不了，连刚才给的照片地址都请求不了。

![4](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\4.png)

![5](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\5.png)

看了大佬wr，发现把请求改成post可以访问

![6](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\6.png)

之后访问WEB-INF/web.xml

![7](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\7.png)

根据com.wm.ctf.FlagController可以访问flag

![8](D:\CTF\ctf\web\buuctf\[RoarCTF 2019]Easy Java\图片\8.png)

把这一段base64解密可得flag

