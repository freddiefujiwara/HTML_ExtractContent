<?php
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
