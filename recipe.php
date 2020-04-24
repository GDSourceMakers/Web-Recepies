<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
requiresLogin();

require_once('src/templating/ViewGenerator.php');
require_once('src/model/recipe.php');
require_once('src/database_handler/DH_recipe.php');

$database_handler = new DH_recipe();

//test recipe
$recipe = new Recipe();
$recipe->title = "labddae" . $_GET["id"];
$recipe->description = "lorem ipsun ...";
$recipe->ingredients = ["200g sajt", "2 dl víz", "3db alma"];
$recipe->picture = "static/img/recipe_img/goulash.jpg";
$recipe->steps = ["fogsz egy nagy kanalat", "belerakod a vízbe", "boldog vagy, hogy a vízbe raktad a kanalat"];

//this using the DH_recipe puts the recipe into the recipe(id) file
$recipe = $database_handler->getRecipe($_GET["id"]);

//generates the recipe().php missing parts of the page, this file is the controller for the recipe_view
$generator = new ViewGenerator();
$generator->generate("recipe_view", $recipe);