<?php

namespace App\helpers\utils;

use App\helpers\utils\session as session;

class security
{
    static function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    static function getOS()
    {
        $os_platform = "Bilinmeyen İşletim Sistemi";
        $os_array = array('/windows nt 10/i' => 'Windows 10', '/windows nt 6.3/i' => 'Windows 8.1', '/windows nt 6.2/i' => 'Windows 8', '/windows nt 6.1/i' => 'Windows 7', '/windows nt 6.0/i' => 'Windows Vista', '/windows nt 5.2/i' => 'Windows Server 2003/XP x64', '/windows nt 5.1/i' => 'Windows XP', '/windows xp/i' => 'Windows XP', '/windows nt 5.0/i' => 'Windows 2000', '/windows me/i' => 'Windows ME', '/win98/i' => 'Windows 98', '/win95/i' => 'Windows 95', '/win16/i' => 'Windows 3.11', '/macintosh|mac os x/i' => 'Mac OS X', '/mac_powerpc/i' => 'Mac OS 9', '/linux/i' => 'Linux', '/ubuntu/i' => 'Ubuntu', '/iphone/i' => 'iPhone', '/ipod/i' => 'iPod', '/ipad/i' => 'iPad', '/android 1/i' => 'Android 1', '/android 10/i' => 'Android 10', '/android 9/i' => 'Android 9', '/android 8/i' => 'Android 8', '/android 7/i' => 'Android 7', '/android 6/i' => 'Android 6', '/android 5/i' => 'Android 5', '/android 4/i' => 'Android 4', '/android 3/i' => 'Android 3', '/android 2/i' => 'Android 2', '/blackberry/i' => 'BlackBerry', '/webos/i' => 'Mobile');
        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
                $os_platform = $value;
        return $os_platform;
    }

    static function getBrowser()
    {
        $browser = "Bilinmeyen Tarayıcı";
        $browser_array = array('/msie/i' => 'Internet Explorer', '/firefox/i' => 'Firefox', '/safari/i' => 'Safari', '/chrome/i' => 'Chrome', '/edge/i' => 'Edge', '/opera/i' => 'Opera', '/opr/i' => 'Opera', '/netscape/i' => 'Netscape', '/maxthon/i' => 'Maxthon', '/konqueror/i' => 'Konqueror', '/huaweibrowser/i' => 'Huawei Browser');
        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
                $browser = $value;
        return $browser;
    }

    static function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    static function getLang()
    {
        $dil = substr(mb_strtoupper($_SERVER['HTTP_ACCEPT_LANGUAGE'], "UTF-8"), 0, 2);
        return $dil;
    }
    public function visitorLocation()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/" . $this->getIP() . "?fields=66846719");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        if ($data['status'] == 'fail') {
            $data = '-';
        }
        return $data;
    }

    static function filter($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

    static function emptyRequestCheck($post)
    {
        foreach ($post as $key => $value) {
            if (strpos($key, '_required') !== false) {
                if (empty($value)) {
                    return false;
                }
            }
        }
        return true;
    }
    
    static function clearRequest($post)
    {
        foreach ($post as $key => $value) {
            if (strpos($key, '_required') !== false) {
                $key = str_replace('_required', '', $key);
                $post[$key] = $value;
            }
        }
        return $post;
    }
    

    static function formTokenCheck($token)
    {
        $session = new session();
        if (isset($token) && !empty($token)) {
            if ($session->getSession(TOKENIZER) == $token) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
