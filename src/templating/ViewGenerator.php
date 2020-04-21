<?php

require_once ("./Config.php");

//this class helps generating html pages
class ViewGenerator
{
    //
    public $viewFolder = '/views/';
    public $defaultTemplate;

    //constructor
    function __construct()
    {
        $this->viewFolder = Config::$rootDir . "/views/";
        $this->defaultTemplate = Config::$rootDir .  '/views/template.php';
    }

    //this function insters the incoming "$content" into the template and adds the "$data" away further
    function insertContentIntoTemplate($content, $data) {
        require_once($this->defaultTemplate);
    }

    /*this function gets a $view from the views folder, and $data, to put into the page
    *it uses the function above, to put the $content into the template,
    *then gets the $data from the forms (POST/GET methods)
    */
    function generate($view, $data) {
       $this->insertContentIntoTemplate( $this->viewFolder . $view . ".php", $data);
    }


}