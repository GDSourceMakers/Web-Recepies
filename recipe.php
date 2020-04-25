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

$database_handler = new DH_recipe();
$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);

//Here we check if the user owns the recipe if so we load it form the database
$id = $_GET["id"];
if(in_array($id, $user->recipes)){
    $recipe = $database_handler->getRecipe($id);
}
else{
    //this recipe is not yours.
    //TODO: ReMOVe!!
    $recipe = $database_handler->getRecipe($id);
}

if (isset($_POST["addAll"])) {
    //get a list of all the ingredients
    //add them one by one
    foreach($recipe->ingredients as $i){
        $movingItem = new FoodListItem();
        //$movingItem->picture = "static/img/list_img/recipe.jpg";

        $spaceCount = substr_count($i, ' ');

        if ($spaceCount == 0) {
            $movingItem->name = "";
            $movingItem->amount = $i;
        }else if($spaceCount == 1){
            $strings = explode(" ",$i);
            $movingItem->name = $strings[1];
            $movingItem->amount = $strings[0];
        }else if($spaceCount == 2){
            $strings = preg_split('/ /',$i);
            
            $movingItem->name = $strings[2] . " " . $strings[3];
            $movingItem->amount = $strings[0] . " " . $strings[1];
        }else if($spaceCount == 3){
            $strings = preg_split('/ /',$i);
            
            $movingItem->name = $strings[2] . " " . $strings[3] . " " . $strings[4];
            $movingItem->amount = $strings[0] . " " . $strings[1];
        }

        $user->addItem(0,$movingItem);
    }

    $DH->updateUser($user);

    header("Location: shopping_list.php");
}

//generates the recipe().php missing parts of the page, this file is the controller for the recipe_view
$generator = new ViewGenerator();
$generator->generate("recipe_view", $recipe);