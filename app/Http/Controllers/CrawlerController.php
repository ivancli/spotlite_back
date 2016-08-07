<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 5/08/2016
 * Time: 10:06 PM
 */

namespace App\Http\Controllers;


use App\Libraries\CommonFunctions;

class CrawlerController extends Controller
{
    use CommonFunctions;

    public function crawl()
    {
        $output = $this->sendCurl("https://www.jbhifi.com.au/computers-tablets/tablets/samsung/samsung-galaxy-tabpro-s-12-windows-10-home-wi-fi-tablet/943115/");
//        $output = $this->sendCurl("https://www.binglee.com.au/rinnai-av25sn3-avenger-25-convector");
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($output);
        $xpath = new \DOMXPath($dom);
        $result = $xpath->query('//*[@id="main"]/div[1]/div[2]/div[2]/div/p/span[1]/span[1]/text()');
//        $result = $xpath->query('//*[@id="product-price-40857"]/span');
        echo "<pre>";
//        print_r(preg_replace('/\s+/', ' ', $dom->saveHTML($result[1])));
        print_r($result);
        echo "</pre>";


//        foreach($result as $tag){
//            echo "<pre>";
//            print_r($tag);
//            echo "</pre>";
//        }
    }
}