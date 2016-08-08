<?php
namespace App\Libraries;
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 5/08/2016
 * Time: 10:12 PM
 */
trait CommonFunctions
{
    public function sendCurl($url, $cookie = array(), $ips = array())
    {
        $ch = curl_init();
        $curlHeaders = array(
            'Accept-Language: en-us',
            'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.15) Gecko/20110303 Firefox/3.6.15',
            'Connection: Keep-Alive',
            'Cache-Control: no-cache',
        );
        if (is_array($cookie) && isset($cookie['header'])) {
            $curlHeaders[] = $cookie['header'];
        }
        curl_setopt($ch, CURLOPT_URL, $url);

        if (is_array($ips) && count($ips) > 0) {
            $ipRandKey = array_rand($ips, 1);
            curl_setopt($ch, CURLOPT_INTERFACE, $ips[$ipRandKey]);
        }

        if (is_array($cookie) && isset($cookie['file'])) {
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie['file']);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie['file']);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeaders);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);

        /*disable this before push to live*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $buffer = curl_exec($ch);
        curl_close($ch);
        unset($ch);
        return $buffer;
    }
}