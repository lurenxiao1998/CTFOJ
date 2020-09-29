from urllib import parse
from urllib.parse import urlsplit, urlparse, urlunsplit
import urllib
def getUrl(url): 
    # host = parse.urlparse(url).hostname 
    # print("urlparse:")
    # print(parse.urlparse(url))
    # if host == 'suctf.cc': 
    #     return "我扌 your problem? 111" 
    parts = list(urlsplit(url))

    print("urlsplit:")
    print(urlsplit(url)) 
    host = parts[1] 
    if host == 'suctf.cc': 
        return "我扌 your problem? 222 " + host 
    newhost = [] 
    for h in host.split('.'): 
        newhost.append(h.encode('idna').decode('utf-8')) 
    parts[1] = '.'.join(newhost) #去掉 url 中的空格 
    finalUrl = urlunsplit(parts).split(' ')[0] 
    
    print("urlparse:")
    print(parse.urlparse(finalUrl).hostname) 
    host = parse.urlparse(finalUrl).hostname 
    # print(parse.urlparse(finalUrl).hostname) 
    if host == 'suctf.cc': 
        return urllib.request.urlopen(finalUrl).read() 
    else: 
        return "我扌 your problem? 333"
print(getUrl("file://suctf.cℂ/../"))
# print(getUrl("https://username:password@www.baidu.com:80/index.html;parameters?name=tom#example"))