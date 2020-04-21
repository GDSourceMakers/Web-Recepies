<?php

require_once('src/templating/ViewGenerator.php');
require_once('src/model/recipe.php');
require_once('src/database_handler/DH_recipe.php');

$database_handler = new DH_recipe();

$recipe = new Recipe();
$recipe->title = "labddae" . $_GET["id"];
$recipe->description = "lorem ipsun ...";
$recipe->ingredients = ["200g sajt", "2 dl víz", "3db alma"];
$recipe->picture = "static/img/recipe_img/goulash.jpg";
$recipe->steps = ["fogsz egy nagy kanalat", "belerakod a vízbe", "boldog vagy, hogy a vízbe raktad a kanalat"];

$recipe = $database_handler->getRecipe($_GET["id"]);


$generator = new ViewGenerator();
$generator->generate("recipe_view", $recipe);