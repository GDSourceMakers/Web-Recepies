<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();


require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');
require_once('src/model/user.php');

$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);


//after clicking on add new item to the list function
if (isset($_POST["add"])) {

    $allowed_extensions = ["jpg", "jpeg", "png"];
    $extension = pathinfo($_FILES["img_browse"]["name"], PATHINFO_EXTENSION);

    if (in_array($extension, $allowed_extensions)) {

        if ($_FILES["img_browse"]["error"] === 0) {
            if ($_FILES["img_browse"]["size"] < 100000000) {
                $dest = "static/img/uploaded/" . $_FILES["img_browse"]["name"];
                move_uploaded_file($_FILES["img_browse"]["tmp_name"], $dest);
                echo "Successful file upload! <br/>";
            } else {
                echo "The file is too big! <br/>";
            }
        } else {
            echo "Error during upload! <br/>";
        }
    } else {
        echo "Not the one of the possible extensions! <br/>";
    }
    $dest = "static/img/uploaded/" . $_FILES["img_browse"]["name"];

    $item = new FoodListItem();
    $item->picture = $dest;
    $item->name = $_POST["name"];
    $item->amount = $_POST["qty"];
    $user->addItem(0, $item);

    $DH->updateUser($user);
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
if (isset($_POST["addToStock"])) {
    //TODO
}

/*
$item = new FoodListItem();
$item->id = 0;
$item->picture = "static/img/list_img/apple.jpg";
$item->name = "chocolate";
$item->amount = "2 pieces";
*/

$items = $user->shopping_list;
//$items[] = $item;


$generator = new ViewGenerator();
$generator->generate("shopping_list_view", $user->shopping_list);