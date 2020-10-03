## 知识点

* Unicode安全问题

## 过程

这题buuctf环境没搭好？前三个正常字符也买不了，最后一个我试了其他的一万字符出错了。

`0xF0 0x90 0xA7 0xA4`

这题编码为utf-8，去https://www.compart.com/en/unicode/找一个unicode字符在用unicodedata.numeric转的时候大于1337。

## payload

`id=4&price=%E1%8D%BC`

## 参考

[[ASIS 2019\]Unicorn shop](https://www.cnblogs.com/Cl0ud/p/12221360.html)

[**2019-asis**](https://github.com/hyperreality/ctf-writeups/tree/master/2019-asis)

