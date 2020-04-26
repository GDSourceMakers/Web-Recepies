<?php
session_start();
//this is the connector to the index_view.php

//readfile('views/template.html');

require_once('src/templating/ViewGenerator.php');



if (isset($_POST["contact_btn"])) {
	
	$feedbackCounter = 0;
	
	try{
            $file = fopen("database/feedback/" . "feedback_index.txt", "r");
            $feedbackCounter = fgets($file);
            fclose($file);
        } catch(Exception $e){
            
        }
		
	
	$nextfeedback = $feedbackCounter + 1;
	
	$file = fopen("database/feedback/" . "feedback" . $feedbackCounter . ".txt", "w");
	fwrite($file, $_POST["contact_us"]);
	fclose($file);
	
	$file = fopen("database/feedback/" . "feedback_index.txt", "w");
        fseek($file,0);
        fwrite($file, $nextfeedback);

        fclose($file);
		
}


$generator = new ViewGenerator();

$generator->generate("welcome_view", null);
//echo __DIR__;
?>
