# iplocation
//使用方法
依赖这两个包来查询ip,0为ip2region 1为ip-location-zh
"zhuzhichao/ip-location-zh": "dev-master",
"zoujingli/ip2region": "dev-master"
```
//默认
$ip     = new \ank\IpLookup();
$info   = $ip->getInfo('47.56.171.51', 0);
var_dump($info);
```