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
require_once('src/model/foodListItem.php');

$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);



//after clicking on add new item to the list function
if (isset($_POST["add"])) {

    if($_POST["name"] != "" && $_POST["qty"] != ""){
        
        $pic = "static/img/list_img/ingredient.jpg";

        if(isset($_FILES["img_browse"])){
            $uploadHelper = new FileUploadHandler();
            $pic = $uploadHelper->handleFile($_FILES["img_browse"],"static/img/uploaded/"); //"static/img/uploaded/" . $_FILES["img_browse"]["name"];
        }
        if($pic == "" || !isset($pic))
        {
            $pic = FoodListItem::$baseImage;
        }
        
        $item = new FoodListItem();
        $item->picture = $pic;
        $item->name = $_POST["name"];
        $item->amount = $_POST["qty"];
        $user->addItem(1, $item);

        $DH->updateUser($user);
    }   
}

//after clicking on remove button function
if (isset($_POST["delete"])) {
    $user->removeItem(1, $_POST["delete"]);

    $DH->updateUser($user);
}

//after clicking on modify button function
if (isset($_POST["edit"])) {
    //TODO
}

if(!empty($_POST)){
    header("Location: in_stock.php");
}

//giving the test item to the array
$items = $user->stock;
//$items[] = $item;

//generates the view page with this data
$generator = new ViewGenerator();
$generator->generate("inStock_view", $user->stock); //$items
