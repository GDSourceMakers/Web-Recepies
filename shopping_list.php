<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();


require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');
require_once('src/model/user.php');
require_once('src/util/FileUploadHandler.php');

$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);


//after clicking on add new item to the list function
if (isset($_POST["add"])) {

    if($_POST["name"] != "" && $_POST["qty"] != ""){
        $dest = "";

        if(isset($_FILES["img_browse"])){
            $uploadHelper = new FileUploadHandler();
            $dest = $uploadHelper->handleFile($_FILES["img_browse"],"static/img/uploaded/"); //"static/img/uploaded/" . $_FILES["img_browse"]["name"];
        }
        
        $item = new FoodListItem();
        $item->picture = $dest;
        $item->name = $_POST["name"];
        $item->amount = $_POST["qty"];
        $user->addItem(0, $item);

        $DH->updateUser($user);
    }   
}

//after clicking on remove button function
if (isset($_POST["delete"])) {
    $user->removeItem(0, $_POST["delete"]);

    $DH->updateUser($user);
}

//after clicking on modify button function
if (isset($_POST["edit"])) {
    //TODO
}

//after clicking on modify button function
if (isset($_POST["toStock"])) {
    $movingItem = new FoodListItem();

    $movingItem = $user->getItem(0, $_POST["toStock"]);

    $user->addItem(1, $movingItem);
    $user->removeItem(0, $_POST["toStock"]);

    $DH->updateUser($user);
}

if(!empty($_POST)){
    header("Location: shopping_list.php");
}


$items = $user->shopping_list;


$generator = new ViewGenerator();
$generator->generate("shopping_list_view", $user->shopping_list);