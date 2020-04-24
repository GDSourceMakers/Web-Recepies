<?php

function requiresLogin(){
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php");
    
    }
}