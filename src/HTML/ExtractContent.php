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

    private function __stripTags($html){
        $str = preg_replace('/<.+?>/', '', $html); 
        $str = mb_convert_kana($str, 'asK'); 
        return htmlspecialchars_decode($str);
    }

    public function title(){
        return preg_match('/<title[^>]*>\s*(.*?)\s*<\/title\s*>/i', $this -> __html, $matches) ? $this -> __stripTags($matches[1]) : "";
    }
}
