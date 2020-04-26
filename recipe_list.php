<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();


require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');
require_once('src/database_handler/DH_recipe.php');
require_once('src/model/user.php');
require_once('src/util/FileUploadHandler.php');
require_once('src/model/recipe.php');

$DH = new DH_user();
$user = $DH->getUser($_SESSION["user_id"]);



$recipes = [];

$DH_recipe = new DH_recipe();
foreach($user->recipes as $r){
    $recipes[] = $DH_recipe->getRecipe($r);
}

$generator = new ViewGenerator();
$generator->generate("recipe_list_view", $recipes);