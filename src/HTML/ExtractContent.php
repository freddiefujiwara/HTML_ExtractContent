<?php
/** 
 * HTML_ExtractContent extract the text from web page(html). 
 * fork from "Extract Content Module for html" 
 * @link http://www.systemfriend.co.jp/node/326 
 * @link http://hakaselab.sakura.ne.jp/make/extractcontent/extractcontent.phps 
 * @link http://openpear.org/package/HTML_ExtractContent
 * PHP-version author is Junichi Takahashi 
 * @license BSD 
 * */
namespace HTML;

class ExtractContent
{
    private $__html = "";
    public function __construct($html){
        $this -> __html = $html;
    }

    public function html(){
        return $this -> __html;
    }
}
