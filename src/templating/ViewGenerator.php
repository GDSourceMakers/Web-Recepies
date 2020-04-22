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

    //function to help check if the user is logged in or not
    function getContext(){
        $context = [];
        $context["loggedIn"] = isset($_SESSION['username']);
        if ($context["loggedIn"]) {
            $context["username"] = $_SESSION['username'];
        }
        
        return $context;
    }

    //this function insters the incoming "$content" into the template and adds the "$data" away further
    function insertContentIntoTemplate($content, $data, $context) {
        require_once($this->defaultTemplate);
    }

    /*
    **this function gets a $view from the views folder, and $data, to put into the page
    **it uses the function above, to put the $content into the template
    */
    function generate($view, $data) {

        $context = $this->getContext();

        $this->insertContentIntoTemplate( $this->viewFolder . $view . ".php", $data, $context);
    }


}