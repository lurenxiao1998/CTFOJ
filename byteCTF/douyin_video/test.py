import hashlib

def md5(key):
    m = hashlib.md5()
    m.update(key.encode('utf-8'))
    return m.hexdigest()

ans=input("code:")
for i in range(1000000000):
    code=md5(str(i))
    if code[0:6] == ans:
        print(i)
        break