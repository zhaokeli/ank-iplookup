<?php
namespace ank;

use Ip2Region;
use Zhuzhichao\IpLocationZh\Ip;

class IpLookup
{
    public function getInfo($ip = '', $type = 0)
    {
        $data = [
            'country'  => '',
            'province' => '',
            'city'     => '',
            'area'     => '',
            'isp'      => '',
        ];
        if ($type === 0) {
            $ip2region        = new Ip2Region();
            $info             = $ip2region->btreeSearch($ip);
            $info             = explode('|', $info['region']);
            $data['country']  = $info[0];
            $data['province'] = $info[2] ?: $info[0];
            $data['city']     = $info[3] ?: '';
            $data['isp']      = $info[4] ?: '';
            // var_dump($info, true);
        } else {
            $info = Ip::find($ip);
            // var_dump($info);
            // $iplocation       = new IpLocation();
            // $info             = $iplocation->getlocation($ip);
            $data['country']  = $info[0];
            $data['province'] = $info[1] ?: $info[0];
            $data['city']     = $info[2] ?: '';
            $data['isp']      = $info[3] ?: '';
        }

        return $data;
    }
}
