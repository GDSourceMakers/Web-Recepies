<?php
session_start();
//this is the connector to the index_view.php

//readfile('views/template.html');

require_once('src/templating/ViewGenerator.php');

$generator = new ViewGenerator();

$generator->generate("welcome_view", $_SESSION["username"]);
//echo __DIR__;
?>
