<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');

//after clicking on add new button function
if (isset($_POST["inStockAddNewButton"])) {
    
}

//after clicking on remove button function
if (isset($_POST["stockRemoveButton"])) {
    
}

//after clicking on modify button function
if (isset($_POST["stockmodifyButton"])) {
    //TODO
}

//test
$item = new FoodListItem();
$item->picture = "static/img/list_img/apple.jpg";
$item->name = "chocolate";
$item->amount = "2 pieces";

//giving the test item to the array
$items = [];
$items[] = $item;

//generates the view page with this data
$generator = new ViewGenerator();
$generator->generate("inStock_view", $items);