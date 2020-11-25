弱密码爆破，后缀666

接着git源码泄露，用githacker，git reset。读到所有代码

CATEGORY处`',content=(select hex(load_file("/tmp/html/.DS_Store"))),/*`，对应的留言处加上`*/#`可以构成二次注入

解码得到flag_8946e1ff1ee3e40f.php。再次读flag_8946e1ff1ee3e40f.php，即可得到flag