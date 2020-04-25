<?php
//this is a function to check if the user is an actual user or a visitor 
require_once('src/authenticate/requiresLogin.php');
//it can relocate the user if they aren't signed in yet
$user = requiresLogin(); //<<----- WE GET THE USER HERE


require_once('src/templating/ViewGenerator.php');
require_once('src/model/foodListItem.php');
require_once('src/database_handler/DH_user.php');
require_once('src/database_handler/DH_recipe.php');
require_once('src/model/user.php');
require_once('src/util/FileUploadHandler.php');
require_once('src/model/recipe.php');

$data = [];
$data["errors"] = [];

$RecepieDatabBase = new DH_recipe();
$UserDatabBase = new DH_user();


if(isset($_POST["add"])){

    $recipe = new Recipe();
    $hasError = FALSE;

    if(!isset($_POST["recipeName"]) ||$_POST["recipeName"] == ""){
        $data["errors"]["recipeName"] = TRUE;
        $hasError = TRUE;
    }
    else{
        $recipe->title = $_POST["recipeName"];
    }

    if(!isset($_POST["recipeDescription"]) ||$_POST["recipeDescription"] == ""){
        $data["errors"]["recipeDescription"] = TRUE;
        $hasError = TRUE;
    }
    else{
        $recipe->description = $_POST["recipeDescription"];
    }


    if(!isset($_POST["recipeIngredients"]) ||$_POST["recipeIngredients"] == ""){
        $data["errors"]["recipeIngredients"] = TRUE;
        $hasError = TRUE;
    }
    else{
        $ingredients = explode("\n-", $_POST["recipeIngredients"]);

        foreach($ingredients as $i)
        {
            $in = new FoodListItem();
            $in->name = $i;

            $recipe->ingredients = $in;
        }
    }


    if(!isset($_POST["recipeDirections"]) ||$_POST["recipeDirections"] == ""){
        $data["errors"]["recipeDirections"] = TRUE;
        $hasError = TRUE;
    }
    
    print_r($_FILES);
    if(isset($_FILES["img_browse"]) && $hasError == False ){
        $uploadHelper = new FileUploadHandler();
        $pic = $uploadHelper->handleFile($_FILES["img_browse"],"static/img/uploaded/"); //"static/img/uploaded/" . $_FILES["img_browse"]["name"];
        $recipe->picture = $pic;
    }
    else{
        $recipe->picture = "";
    }

    if($hasError == 0){

        $recipe->steps = $_POST["recipeDirections"];
        
        $recipe->id = $RecepieDatabBase->getNewId();

        print_r($recipe);

        $RecepieDatabBase->addRecipe($recipe);

        $user->recipes[] = $recipe->id;
        $UserDatabBase->updateUser($user);

    }
}

$generator = new ViewGenerator();
$generator->generate("add_recipe_view", $data);