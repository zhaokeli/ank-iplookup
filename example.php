<?php
$loader = require __DIR__ . '/vendor/autoload.php';
$ip     = new \ank\IpLookup();
$info   = $ip->getInfo('223.74.181.86', 1);
var_dump($info);
