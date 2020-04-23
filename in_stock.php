<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');
require_once('src/model/user.php');

$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);



//after clicking on add new item to the list function
if (isset($_POST["add"])) {
    print_r($_FILES);

    $allowed_extensions = ["jpg", "jpeg", "png"];
    $extension = pathinfo($_FILES["img_browse"]["name"], PATHINFO_EXTENSION);

    if (in_array($extension, $allowed_extensions)) {
       
        if ($_FILES["img_browse"]["error"] === 0) {
        if ($_FILES["img_browse"]["size"] < 100000000) {
        $dest = "images/" . $_FILES["img_browse"]["name"];
        move_uploaded_file($_FILES["img_browse"]["tmp_name"], $dest);
        echo "Sikeres fájlfeltöltés <br/>";
        } else {
        echo "A fájlméret túl nagy! <br/>";
        }
        } else {
        echo "Hiba történt a fájl feltöltése közben! <br/>";
        }
        } else {
        echo "Nem megfelelő kiterjesztés! <br/>";
        }
       


    $item = new FoodListItem();
    $item->picture = "static/img/list_img/apple.jpg";
    $item->name = $_POST["name"];
    $item->amount = $_POST["qty"];
    $user->addItem(1, $item);

    $DH->updateUser($user);
}

//after clicking on remove button function
if (isset($_POST["inStockDeleteButton"])) {
    
}

//after clicking on modify button function
if (isset($_POST["inStockEditButton"])) {
    //TODO
}

//giving the test item to the array
$items = $user->stock;
//$items[] = $item;

//generates the view page with this data
$generator = new ViewGenerator();
$generator->generate("inStock_view", $user->stock); //$items