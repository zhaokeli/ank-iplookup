<?php
$loader = require __DIR__ . '/vendor/autoload.php';
$ip     = new \ank\IpLookup();
$info   = $ip->getInfo('116.66.184.184', 0);
var_dump($info);
