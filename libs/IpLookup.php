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

    public function getLocation($ip, $type = 0, $fenge = ' ', $num = 5)
    {
        $info = $this->getInfo($ip, $type);

        $num = $num > 5 ? 5 : $num;
        $str = '';
        foreach ($info as $key => $value) {
            if ($num == 0) {
                break;
            }
            $str .= $fenge . ($value ?: '');
            $num--;
        }

        return trim(preg_replace('/' . $fenge . '+/i', $fenge, $str), $fenge);
    }
}
