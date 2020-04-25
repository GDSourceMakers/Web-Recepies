<?php
session_start();

require_once('src/templating/ViewGenerator.php');
//require_once('src/database_handler/DH_user.php');
//require_once("src/model/user.php");

//$DH_user = new DH_user();

//test user
//$user = new User(0, "aladni", "01/JAN/1990", "ali@jamba.hu", "bumbum", "123456722");

//this function checks if the given informations are correct



//this adds the user to the file, also for test purposes as this file made
//didnt want to manually write down the user's data into the file (+it shows the functions are working)
//$DH_user->addUser($user);



$generator = new ViewGenerator();

$generator->generate("register_view", $_SESSION["username"]);
//echo __DIR__;
