<?php
namespace App\Libraries\Parsers;
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/9/2016
 * Time: 4:09 PM
 */
abstract class Parser
{
    var $pageHTML = "";

    public function __construct($options)
    {
        if (is_array($options) && isset($options['html'])){
            $this->pageHTML = $options['html'];
        }
    }

    abstract function parse();
}