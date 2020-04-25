<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/database_handler/DH_user.php');
require_once("src/model/user.php");

if (isset($_POST["sign_up_button"])) {
	
	$name = $_POST["user_name"];
	$birthDate = $_POST["user_birth"];
	$email = $_POST["user_email"];
	$password = $_POST["user_password"];
	$telNum = $_POST["user_tel"];
	
	$DH_user = new DH_user();
	$id = $DH_user->getNewId();
	
	$isCorrect = correctionCheck($password, $telNum);
	
	if ($isCorrect) {
		$user = new User($id, $name, $birthDate, $email, $password, $telNum);
		$DH_user->addUser($user);
	}
}

function correctionCheck($password, $telNum) {
	if(strlen($password) < 6 || !preg_match('/[A-Za-Z-z]/', $password) || !preg_match('/[0-9]/', $password)) {
		return false;
	} else if (strlen($telnum) < 0 || strlen($telnum) > 10 || !preg_match('/[0-9]/', $password) || preg_match('/[A-Za-Z-z]/', $password))  {
		return false;
	} else {
		return true;
	}
}



//test user
//$user = new User(0, "aladni", "01/JAN/1990", "ali@jamba.hu", "bumbum", "123456722");


//this adds the user to the file, also for test purposes as this file made
//didnt want to manually write down the user's data into the file (+it shows the functions are working)
//$DH_user->addUser($user);



$generator = new ViewGenerator();
$generator->generate("register_view", $_SESSION["username"]);
