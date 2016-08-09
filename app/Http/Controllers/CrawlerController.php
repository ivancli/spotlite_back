<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 5/08/2016
 * Time: 10:06 PM
 */

namespace App\Http\Controllers;


use App\Libraries\CommonFunctions;
use Illuminate\Http\Request;
use Validator;

class CrawlerController extends Controller
{
    use CommonFunctions;

    public function crawl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|max:2083',
            'xpath' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $output = $this->sendCurl($request->get('url'));
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            if ($dom->loadHTML($output)) {
                $xpath = new \DOMXPath($dom);
                $result = $xpath->query($request->get('xpath'));
                if ($result->length > 0) {
                    foreach ($result as $tag) {
                        if (trim($tag->nodeValue) != "") {
                            echo $tag->nodeValue;
                        } else {
                            echo($dom->saveHTML($tag));
                        }
                    }
                } else {
                    echo "No data crawled";
                }
            }
        }

        exit();

        /*Bunning*/
        $output = $this->sendCurl("https://www.bunnings.com.au/marquee-2400-x-600-x-25mm-white-laminate-bench-top_p2660665");
        /*Dick Smith*/
//        $output = $this->sendCurl("https://www.dicksmith.com.au/da/buy/kogan-1500w-portable-electric-panel-heater/");
        /*JB HI FI*/
//        $output = $this->sendCurl("https://www.jbhifi.com.au/computers-tablets/tablets/samsung/samsung-galaxy-tabpro-s-12-windows-10-home-wi-fi-tablet/943115/");
        /*BIG W*/
//        $output = $this->sendCurl("https://www.bigw.com.au/product/closer-to-nature-essentials-kit/p/WCC100000000005701/");
        /*BING LEE*/
        $output = $this->sendCurl("https://www.binglee.com.au/fisher-paykel-de4060m1-4kg-front-load-vented-dryer");

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        if ($dom->loadHTML($output)) {
            $xpath = new \DOMXPath($dom);
            /*Bunning*/
//        $result = $xpath->query('//*[@id="content-layout_inside-anchor"]/section/div[1]/div[1]/div[1]/div[2]');
            /*Dick Smith*/
//        $result = $xpath->query('//*[@id="page-content"]/div/div[2]/div[1]/div[4]/div/h3/span');
            /*JB HI FI*/
            /*TODO not working*/
//        $result = $xpath->query('//*[@id="main"]/div[1]/div[2]/div[2]/div/p/span[2]');
            /*BIG W*/
//        $result = $xpath->query('//*[@id="content"]/div[3]/div/div[1]/div[2]/div[3]/div/span[3]');
            /*BING LEE*/
            $result = $xpath->query('//*[@id="product-price-43773"]/span');

            echo "<pre>";
//        print_r(preg_replace('/\s+/', ' ', $dom->saveHTML($result[1])));
            print_r($result->item(0)->nodeValue);
            echo "</pre>";

//        echo "<pre>";
//        print_r($result[0]);
//
//        echo "</pre>";
//        exit();
//            echo "<pre>";
//            print_r($result->item(0));
//            echo "</pre>";
//            $nodeValue = trim((string)$result->item(0)->nodeValue);
//            echo "<pre>";
//            print_r($nodeValue);
//            echo "</pre>";
        }
    }
}
