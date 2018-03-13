<?php
    function get_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    function get_ip_details(Request $request)
    {
        $ip = $request->ip();
        $x ="Country:" . geoip($ip)->country .
            " ip:" .geoip($ip)->ip.
            " State :" . geoip($ip)->state;
            " City :" . geoip($ip)->city;
            " Region :" . geoip($ip)->region;
            /*
                |
                |
            */
        return  $x ;
        dd(geoip()->getLocation($ip));
        dd(geoip($ip)->ip);
    }