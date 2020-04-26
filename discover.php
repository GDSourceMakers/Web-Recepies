<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/recipe.php');
require_once('src/database_handler/DH_recipe.php');
require_once('src/database_handler/DH_user.php');
require_once('src/model/user.php');
require_once('src/model/foodListItem.php');

$DH = new DH_user();
$database_handler = new DH_recipe();
$user = $DH->getUser($_SESSION["user_id"]);


$recipeCount = sizeof($user->recipes);
$array = [];

//User:
//    Recipes (size = 4)
//      0 -> 123
//      1 -> 345
//      2 -> 76
//      3 -> 666

//randomizing the recipes appearances, and controlling it
if($recipeCount > 2){
    $randNumArray = [];
    for ($i=0; $i < 3; $i++) { 
        $idNum = rand (0, $recipeCount-1);
        $randNumArray[$i] = $idNum;
        while (in_array($idNum, $randNumArray)) {
            $idNum = rand (0, $recipeCount-1);
        }
        $randNumArray[$i] = $idNum;

        $id = $user->recipes[$idNum];
        $recipe = $database_handler->getRecipe($id);
        $array[$i] = $recipe;
    }
}
else{
}

$generator = new ViewGenerator();
$generator->generate("discover_view", $array);