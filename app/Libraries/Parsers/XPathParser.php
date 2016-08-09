<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/9/2016
 * Time: 4:18 PM
 */

namespace App\Libraries\Parsers;


class XPathParser extends Parser
{
    var $dom = null;
    var $xpathDom = null;
    var $xpath = "";

    public function __construct($options)
    {
        parent::__construct($options);
        libxml_use_internal_errors(true);
        $this->dom = new \DOMDocument();
        $this->dom->loadHTML($this->pageHTML);
        $this->xpathDom = new \DOMXPath($this->dom);
        if(is_array($options) && isset($options['xpath']))
        $this->xpath = $options['xpath'];
    }

    public function parse()
    {
        $result = $this->xpathDom->query($this->xpath);
        if ($result->length > 0) {
            foreach ($result as $tag) {
                if (trim($tag->nodeValue) != "") {
                    return $tag->nodeValue;
                } else {
                    return $this->dom->saveHTML($tag);
                }
            }
        } else {
            return "No data crawled";
        }
        return null;
    }
}