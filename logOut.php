<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();

//logout on button click

session_destroy();

//directs back the user to the welcoming page, after login
header("Location: index.php");