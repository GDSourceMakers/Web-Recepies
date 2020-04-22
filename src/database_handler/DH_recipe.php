<?php

require_once("./Config.php");

class DH_recipe
{
    public $database_folder;

    //constructor
    function __construct()
    {
        $this->database_folder = Config::$rootDir . "/database/recipes/";
    }

    //get recipe from file function, each recipe is stored in individual files (=> reason for the id)
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

    //function to keep track of the id count, even after changes as well
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

    //add recipe function to file
    function addRecipe($recipe){
        $file = fopen($this->database_folder . "recipe" . $recipe->id . ".txt", "w");
        fwrite($file, serialize($recipe));
        fclose($file);
    }
}
