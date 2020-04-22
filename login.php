<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/database_handler/DH_user.php');
require_once("src/model/user.php");

class viewData{
    public $showBadLogin = false;
    public $successfulLogin = false;

    //FIXME: the two above don't seem to cover the neutral state
    public $visiter = true;
}

$viewData = new viewData();

if (isset($_POST["login-btn"])) {

    $viewData->visiter = false;
    $success = authenticateUser($_POST["username"], $_POST["pwd"]);
    if ($success) {
        $viewData->successfulLogin = true;
        header("Location: index.php");
    }else{
        $viewData->showBadLogin = true;
    }
}

function authenticateUser($username, $password)
{
    $DH_user = new DH_user();
    $accounts = $DH_user->getAllUsers();

    foreach ($accounts as $acc) {
        if ($acc->email == $username && $acc->password == $password) {
            $_SESSION["username"] = $username;
                return true;
            break;
        }
    }
}


$generator = new ViewGenerator();
$generator->generate("login_view", $viewData);

