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

    public function testHtml()
    {
        $this -> assertEquals("<html><body></body></html>",$this -> __obj -> html());
    }
}
