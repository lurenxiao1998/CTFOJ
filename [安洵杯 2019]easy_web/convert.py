import base64

s="flag.php"
c=''
for i in s:
    c+=hex(ord(i))[2:]
print(c)
c=base64.b64encode(base64.b64encode(c.encode("utf-8")))
print(c)
