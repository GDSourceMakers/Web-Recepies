<?php

//gonna use this for shopping list and in stock as well (=> hence the weird name)
class FoodListItem{
    public $id = 0;
    public $picture = "";
    public $name = "";
    public $amount = "";

    public static $baseImage="static/img/list_img/flour.jpg";

    function __construct()
    {
        $picture = FoodListItem::$baseImage;
    }
}