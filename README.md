# iplocation
```
//使用方法
//默认有个数据库文件,也可以自己下载一个传入路径就可以下载ip UTFWry.dat 数据库文件在当前目录
$iplocation = new \ank\IpLocation();
$res        = $iplocation->getlocation('1.80.2.152');
var_dump($res);
```