<?php
session_start();
//this is the connector to the index_view.php

//readfile('views/template.html');

require_once('src/templating/ViewGenerator.php');

$generator = new ViewGenerator();

$generator->generate("welcome_view", null);
//echo __DIR__;
?>
