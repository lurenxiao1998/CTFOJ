
import socket 
import urllib 
def scan(param): 
    socket.setdefaulttimeout(10) 
    # try: 
    return urllib.urlopen(param).read()[:100] 
    # except: 
    #     return "Connection Timeout" 

if __name__ == "__main__":
    print(scan("a.py"))