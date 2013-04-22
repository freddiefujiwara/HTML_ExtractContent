<?php

namespace HTML\ExtractContent\Tests;

class ExtractContentTest extends \PHPUnit_Framework_TestCase
{
    private $__obj = null;
    public function setUp(){
        $this -> __obj = new \HTML\ExtractContent("<html><body></body></html>");
    }
    public function testNew()
    {
        $this -> assertEquals('HTML\ExtractContent',get_class($this -> __obj));
    }

    public function testOriginalHtml()
    {
        $this -> assertEquals("<html><body></body></html>",$this -> __obj -> originalHtml());
    }
    public function testHtml()
    {
        $this -> assertEquals("<html><body></body></html>",$this -> __obj -> html());
    }

    public function testTitle()
    {
        $this -> assertEquals($this -> __obj -> title(),"");
        $this -> __obj = new \HTML\ExtractContent("<html><head><title>藤原史和:freddiefuji&amp;wara</title></head><body></body></htm>");
        $this -> assertEquals($this -> __obj -> title(),"藤原史和:freddiefuji&wara");
        $this -> __obj = new \HTML\ExtractContent("<html><body></body></html>");
    }

    public function testEliminateGoogleAdSectionIgnore(){
        $this -> __obj = new \HTML\ExtractContent("<html><body><!-- google_ad_section_start(weight=ignore) -->Sidebar or etc...<!-- google_ad_section_end --><div><!-- google_ad_section_start -->body body important part<!-- google_ad_section_end --></div></body></html>");
        $this -> __obj -> eliminateGoogleAdSectionIgnore();
        $this -> assertEquals($this -> __obj -> html(),
        "<html><body><div><!-- google_ad_section_start -->body body important part<!-- google_ad_section_end --></div></body></html>"
        );
        $this -> __obj = new \HTML\ExtractContent("<html><body></body></html>");
    }

    public function testExtractGoogleAdSection(){
        $this -> __obj = new \HTML\ExtractContent("<html><body><!-- google_ad_section_start(weight=ignore) -->Sidebar or etc...<!-- google_ad_section_end --><div><!-- google_ad_section_start -->body body important part<!-- google_ad_section_end --></div></body></html>");
        $this -> __obj -> eliminateGoogleAdSectionIgnore();
        $this -> assertEquals($this -> __obj -> extractGoogleAdSection(),
        "<!-- google_ad_section_start -->body body important part<!-- google_ad_section_end -->"
        );
        $this -> __obj = new \HTML\ExtractContent("<html><body></body></html>");
    }
}
