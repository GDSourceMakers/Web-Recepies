<?php

class User{
    public $id = 0;
    public $name = "";
    public $birthDate = "";
    public $email = "";
    public $password = "";
    public $telNum = "";

    //shopping and in stock list is gonna be an array to make our work easier
    public $shopping_list = [];
    public $stock = [];
    public $recipes = [];

    //constructor
    function __construct($id, $name, $birthDate, $email, $password, $telNum)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->password = $password;
        $this->telNum = $telNum;
    }

    //adds item to the arrays, after checking which id(array) that ite belongs to
    // 0 = shopping list, 1 = in stock
    function addItem($listType, $item){
        if ($listType == 0) {
            $this->shopping_list[] = $item;
        }else if($listType == 1){
            $this->stock[] = $item;
        }
    }

    //removes item to the arrays, after checking which id(array) that ite belongs to
    // 0 = shopping list, 1 = in stock
    function removeItem($listType, $orderNumber){
        if ($listType == 0) {
            if($this->shopping_list[$orderNumber]->picture !== FoodListItem::$baseImage){
                unlink($this->shopping_list[$orderNumber]->picture);
            }
            \array_splice($this->shopping_list, $orderNumber, 1);
        }else if($listType == 1){
            if($this->stock[$orderNumber]->picture !== FoodListItem::$baseImage){
                unlink($this->stock[$orderNumber]->picture);
            }
            \array_splice($this->stock, $orderNumber, 1);
        }
    }

    // 0 = shopping list, 1 = in stock
    function getItem($listType, $orderNumber){
        if ($listType == 0) {
            return $this->shopping_list[$orderNumber];
        }else if($listType == 1){
            return $this->stock[$orderNumber];
        }
    }
}