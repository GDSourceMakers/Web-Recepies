<?php

require_once('src/database_handler/DH_user.php');

function requiresLogin(){
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        return null;
    }

    $DH = new DH_user();
    $user = $DH->getUser($_SESSION["user_id"]);

    return $user;
}