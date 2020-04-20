<?php

require_once ("./Config.php");

class ViewGenerator
{
    public $viewFolder = '/views/';
    public $defaultTemplate;

    function __construct()
    {
        $this->viewFolder = Config::$rootDir . "/views/";
        $this->defaultTemplate = Config::$rootDir .  '/views/template.html';
    }

    function insertContentIntoTemplate($content, $data) {
        require_once($this->defaultTemplate);
    }

    function generate($view, $data) {
       $this->insertContentIntoTemplate( $this->viewFolder . $view . ".php", $data);
    }


}