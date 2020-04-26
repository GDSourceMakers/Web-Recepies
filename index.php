<?php
session_start();
//this is the connector to the index_view.php

//readfile('views/template.html');

require_once('src/templating/ViewGenerator.php');

$feedbackCounter = 0;

if (isset($_POST["contact_btn"])) {
	
	
	$file = fopen("database/feedback/" . "feedback" . $feedbackCounter . ".txt", "w");
	fwrite($file, $_POST["contact_us"]);
	fclose($file);
	
	$feedbackCounter++;
	
}


$generator = new ViewGenerator();

$generator->generate("welcome_view", null);
//echo __DIR__;
?>
