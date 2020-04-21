<?php

require_once("./Config.php");

class DH_recipe
{
    public $database_folder;

    function __construct()
    {
        $this->database_folder = Config::$rootDir . "/database/recipes/";
    }

    function getRecipe($id)
    {
        $recipe = [];
        $file = fopen($this->database_folder . "recipe" . $id . ".txt", "r");
        while (($line = fgets($file)) !== false) {
            $recipe = unserialize($line);
        }
        fclose($file);

        return $recipe;
    }

    function getNewId(){

        $lastId = 0;
        try{
            $file = fopen($this->database_folder . "recipe_index.txt", "w+");
            $lastId = unserialize(fgets($file));
        } catch(Exception $e){
            
        }
        
        $nextId = $lastId + 1;

        fseek($file,0);
        fwrite($file,serialize($nextId));

        fclose($file);

        return $nextId;
    }

    function addRecipe($recipe){
        $file = fopen($this->database_folder . "recipe" . $recipe->id . ".txt", "w");
        fwrite($file, serialize($recipe));
        fclose($file);
    }
}
