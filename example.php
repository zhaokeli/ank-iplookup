<?php
$loader = require __DIR__ . '/vendor/autoload.php';
$ip     = new \ank\IpLookup();
$info   = $ip->getInfo('47.56.171.51', 0);
var_dump($info);
