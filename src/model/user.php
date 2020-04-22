<?php

class User{
    public $id = 0;
    public $name = "";
    public $birthDate = "";
    public $email = "";
    public $password = "";
    public $telNum = "";

    public $shopping_list = [];
    public $stock = [];

    function __construct($id, $name, $birthDate, $email, $password, $telNum)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->password = $password;
        $this->telNum = $telNum;
    }

    

    function addItem($id, $item){
        if ($id == 0) {
            $shopping_list[] = $item;
        }else{
            $stock[] = $item;
        }
    }

    function removeItem($id, $orderNumber){
        if ($id == 0) {
            \array_splice($this->shopping_list, $orderNumber, 1);
        }else{
            \array_splice($this->stock, $orderNumber, 1);
        }
    }
}