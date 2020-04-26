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
	$passwordAgain = $_POST["user_password_again"];
	$telNum = $_POST["user_tel"];
	
	$isCorrect = true;
	
	$DH_user = new DH_user();
	$id = $DH_user->getNewId();
	
	$accounts = $DH_user->getAllUsers();
	$usernameError = false;
	
//this checks if the username is already used
//has to be fixed !!!	
    foreach ($accounts as $acc) {
        if ($acc->name ==  $name) {
            $usernameError = true;
			break;
        }
    }
	
//username checker
	if($name == "") {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The username is required!";
	} else if ($usernameError) {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The username is already being used! Please select a different one!";
	}
//birthdate checker
	else if($birthDate == "") {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The birthdate is required!";
	}
//email checker
	else if($birthDate == "") {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The email is required!";
	}
//password checker	
	else if ($password == "") {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The password is required!";
	} else if (strlen($password) < 5) {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The password is too short! Please write a longer one!";
	} else if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The password must contain letters (lower AND uppercase) and numbers!";
	} else if ($passwordAgain == "") {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The  confirmation password is required!";
	} else if ($password != $passwordAgain) {
		$isCorrect = false;
		$error = "<b>ERROR</b>: The password and the confirmation password do not match!";
	}	
	
	if ($isCorrect) {
		$user = new User($id, $name, $birthDate, $email, $password, $telNum);
		$DH_user->addUser($user);
	} else {
		die($error);
	}
	
}


//test user
//$user = new User(0, "aladni", "01/JAN/1990", "ali@jamba.hu", "bumbum", "123456722");

//this adds the user to the file, also for test purposes as this file made
//didnt want to manually write down the user's data into the file (+it shows the functions are working)
//$DH_user->addUser($user);



$generator = new ViewGenerator();
$generator->generate("register_view", $_SESSION["username"]);
