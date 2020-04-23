<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/database_handler/DH_user.php');
require_once("src/model/user.php");

//class for cases in which the used could get cases back
class viewData{
    public $showBadLogin = false;
    public $successfulLogin = false;

    //FIXME: the two above don't seem to cover the neutral state
    public $visiter = true;
}

$viewData = new viewData();

//if sign-in button on page sign in is ushed, the function decides, if the login is correct or not
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

//this function checks if the given data int the logi fields are matching with the ones in out "database" file
function authenticateUser($username, $password)
{
    $DH_user = new DH_user();
    $accounts = $DH_user->getAllUsers();

    foreach ($accounts as $acc) {
        if ($acc->email == $username && $acc->password == $password) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $acc->id;
                return true;
            break;
        }
    }
}

//generates the login_view, this file is the controller for the login_view
$generator = new ViewGenerator();
$generator->generate("login_view", $viewData);

