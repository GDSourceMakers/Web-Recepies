<?php
session_start();

require_once('src/templating/ViewGenerator.php');

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
    $accounts = [];
    $file = fopen("database/accounts.txt", "r");
    while (($line = fgets($file)) !== false) {
        $accounts[] = unserialize($line);
    }
    fclose($file);

    foreach ($accounts as $acc) {
        if ($acc["username"] == $username && $acc["password"] == $password) {
            $_SESSION["username"] = $username;
                return true;
            break;
        }
    }
}


$generator = new ViewGenerator();
$generator->generate("login_view", $viewData);
