
	结果 ： from flask import Flask,render_template_string
from flask import render_template,request,flash,redirect,url_for
from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField
from wtforms.validators import DataRequired
from flask_bootstrap import Bootstrap
import base64

app = Flask(__name__)
app.config[&#39;SECRET_KEY&#39;] = &#39;s_e_c_r_e_t_k_e_y&#39;
bootstrap = Bootstrap(app)

class NameForm(FlaskForm):
    text = StringField(&#39;BASE64加密&#39;,validators= [DataRequired()])
    submit = SubmitField(&#39;提交&#39;)
class NameForm1(FlaskForm):
    text = StringField(&#39;BASE64解密&#39;,validators= [DataRequired()])
    submit = SubmitField(&#39;提交&#39;)

def waf(str):
    black_list = [&#34;flag&#34;,&#34;os&#34;,&#34;system&#34;,&#34;popen&#34;,&#34;import&#34;,&#34;eval&#34;,&#34;chr&#34;,&#34;request&#34;,
                  &#34;subprocess&#34;,&#34;commands&#34;,&#34;socket&#34;,&#34;hex&#34;,&#34;base64&#34;,&#34;*&#34;,&#34;?&#34;]
    for x in black_list :
        if x in str.lower() :
            return 1


@app.route(&#39;/hint&#39;,methods=[&#39;GET&#39;])
def hint():
    txt = &#34;失败乃成功之母！！&#34;
    return render_template(&#34;hint.html&#34;,txt = txt)


@app.route(&#39;/&#39;,methods=[&#39;POST&#39;,&#39;GET&#39;])
def encode():
    if request.values.get(&#39;text&#39;) :
        text = request.values.get(&#34;text&#34;)
        text_decode = base64.b64encode(text.encode())
        tmp = &#34;结果  :{0}&#34;.format(str(text_decode.decode()))
        res =  render_template_string(tmp)
        flash(tmp)
        return redirect(url_for(&#39;encode&#39;))

    else :
        text = &#34;&#34;
        form = NameForm(text)
        return render_template(&#34;index.html&#34;,form = form ,method = &#34;加密&#34; ,img = &#34;flask.png&#34;)

@app.route(&#39;/decode&#39;,methods=[&#39;POST&#39;,&#39;GET&#39;])
def decode():
    if request.values.get(&#39;text&#39;) :
        text = request.values.get(&#34;text&#34;)
        text_decode = base64.b64decode(text.encode())
        tmp = &#34;结果 ： {0}&#34;.format(text_decode.decode())
        if waf(tmp) :
            flash(&#34;no no no !!&#34;)
            return redirect(url_for(&#39;decode&#39;))
        res =  render_template_string(tmp)
        flash( res )
        return redirect(url_for(&#39;decode&#39;))

    else :
        text = &#34;&#34;
        form = NameForm1(text)
        return render_template(&#34;index.html&#34;,form = form, method = &#34;解密&#34; , img = &#34;flask1.png&#34;)


@app.route(&#39;/&lt;name&gt;&#39;,methods=[&#39;GET&#39;])
def not_found(name):
    return render_template(&#34;404.html&#34;,name = name)

if __name__ == &#39;__main__&#39;:
    app.run(host=&#34;0.0.0.0&#34;, port=5000, debug=True)
