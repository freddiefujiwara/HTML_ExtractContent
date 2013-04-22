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
    private $__originalHtml = "";
    private $__html = "";
    public function __construct($html){
        $this -> __originalHtml = $html;
        $this -> __html         = $html;
    }

    public function originalHtml(){
        return $this -> __originalHtml;
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

    public function eliminateGoogleAdSectionIgnore(){
        $this -> __html = 
            preg_replace('/<!--\s*google_ad_section_start\(weight=ignore\)\s*-->.*?<!--\s*google_ad_section_end.*?-->/ms', '', $this -> __html);
    }

    public function extractGoogleAdSection(){
        if (preg_match('/<!--\s*google_ad_section_start[^>]*-->/', $this -> __html)) { 
            preg_match_all('/<!--\s*google_ad_section_start[^>]*-->.*?<!--\s*google_ad_section_end.*?-->/ms', $this -> __html, $matches); 
            return implode("\n", $matches[0]); 
        }
        return $this -> __html;
    }
}
