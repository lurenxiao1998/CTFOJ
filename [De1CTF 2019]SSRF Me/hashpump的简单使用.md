## 介绍


* hashpump是一个由$hash(key+data)$、$len(key+data)$和消息$m$，计算出$hash(key+data+padding0+m)$结果，和 $data+padding0+m$ 的工具
* 其中

  * key是一个不变的值
  * hash(key)为key的hash值
  * len(key)为key的长度
  * m由你指定
  * padding由key和你指定的m确定
  * data是一个已知的值，理论上可以为空，但是hashpump好像不支持
* 目前最新版本hashpump（v1.2.0）已经支持 CRC32, MD5, SHA1, SHA256 和 SHA512

## 安装

我安装系统为kali（debian系）

```shell
git clone https://github.com/bwall/HashPump
apt-get install g++ libssl-dev
apt-get install gcc automake autoconf libtool make
cd HashPump
make
make install
```

## 基本使用

举个例

```powershell
root@DESKTOP-71UIJUJ:/home/lurenxiao/webCTF/HashPump# hashpump 
Input Signature: 6c11de60d6c16a5eafd11a043dab6469
Input Data: scan
Input Key Length: 24
Input Data to Add: read
0b78be0ecb77afd83c52222232f4dea5
scan\x80\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\xe0\x00\x00\x00\x00\x00\x00\x00read
```

分别输入已知hash、数据、长度、以及追加数据可得

$hash(key+data+padding0+m)$

$data+padding0+m$ 

也可以直接命令行

```powershell
lurenxiao@DESKTOP-71UIJUJ:~$ hashpump -s '6c11de60d6c16a5eafd11a043dab6469' --data 'scan' -a 'read' -k 24
0b78be0ecb77afd83c52222232f4dea5
scan\x80\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\xe0\x00\x00\x00\x00\x00\x00\x00read
```

## 所有参数

```powershell
HashPump [-h help] [-t test] [-s signature] [-d data] [-a additional] [-k keylength]
    HashPump generates strings to exploit signatures vulnerable to the Hash Length Extension Attack.
    -h --help          Display this message.
    -t --test          Run tests to verify each algorithm is operating properly.
    -s --signature     The signature from known message.
    -d --data          The data from the known message.
    -a --additional    The information you would like to add to the known message.
    -k --keylength     The length in bytes of the key being used to sign the original message with.
    Version 1.2.0 with CRC32, MD5, SHA1, SHA256 and SHA512 support.
    <Developed by bwall(@botnet_hunter)>
```

