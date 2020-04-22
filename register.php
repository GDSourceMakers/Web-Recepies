<?php

require_once('src/database_handler/DH_user.php');
require_once("src/model/user.php");

$DH_user = new DH_user();

$user = new User(0, "aladni", "01/JAN/1990", "ali@jamba.hu", "bumbum", "123456722");

$DH_user->addUser($user);