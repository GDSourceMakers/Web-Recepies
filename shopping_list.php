<?php
session_start();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');

$item = new FoodListItem();
$item->picture = "static/img/list_img/apple.jpg";
$item->name = "chocolate";
$item->amount = "2 pieces";

$items = [];
$items[] = $item;


$generator = new ViewGenerator();
$generator->generate("shopping_list_view", $items);