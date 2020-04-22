<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');

if (isset($_POST["inStockAddNewButton"])) {
    $user = 
}

if (isset($_POST["stockRemoveButton"])) {
    
}

if (isset($_POST["stockmodifyButton"])) {
    //TODO
}

$item = new FoodListItem();
$item->picture = "static/img/list_img/apple.jpg";
$item->name = "chocolate";
$item->amount = "2 pieces";

$items = [];
$items[] = $item;


$generator = new ViewGenerator();
$generator->generate("inStock_view", $items);