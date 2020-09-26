import base64

a=base64.b64decode(base64.b64decode("TXpVek5UTTFNbVUzTURabE5qYz0="))
a=a.decode()
print(a)
# print(a[1:len(a)-1])
for i in range(int(len(a)/2)):
    # print(a[2*i:2*i+2])
    print(chr(int(a[2*i:2*i+2],base=16)),end='')