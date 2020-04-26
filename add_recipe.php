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
        //$parsedDescription = str_replace('/\n/', '<br>', $_POST["recipeDescription"]);
        $parsedDescription = nl2br($_POST["recipeDescription"]);
        $parsedDescription = str_replace("\n", '', $parsedDescription);
        $recipe->description = $parsedDescription;
    }


    if(!isset($_POST["recipeIngredients"]) ||$_POST["recipeIngredients"] == ""){
        $data["errors"]["recipeIngredients"] = TRUE;
        $hasError = TRUE;
    }
    else{
        //$ingredients = explode("\n-", $_POST["recipeIngredients"]);
        //print_r($ingredients);

        $str = $_POST["recipeIngredients"];
        //$str = preg_split('/\n/',$str);
        $str = explode("\r\n",$str);
        //$str = str_replace("\n", '', $str);
        $recipe->ingredients = $str;
    }


    if(!isset($_POST["recipeDirections"]) ||$_POST["recipeDirections"] == ""){
        $data["errors"]["recipeDirections"] = TRUE;
        $hasError = TRUE;
    }
    else{
        $str = $_POST["recipeDirections"];
        $str = explode("\r\n",$str);
        $recipe->steps = $str;
    }
    
    if(isset($_FILES["img_browse"]) && $hasError == False ){
        $uploadHelper = new FileUploadHandler();
        $pic = $uploadHelper->handleFile($_FILES["img_browse"],"static/img/uploaded/"); //"static/img/uploaded/" . $_FILES["img_browse"]["name"];
        $recipe->picture = $pic;
    }
    else{
        $recipe->picture = "";
    }

    if($hasError == 0){        
        $recipe->id = $RecepieDatabBase->getNewId();

        print_r($recipe);

        $RecepieDatabBase->addRecipe($recipe);

        $user->recipes[] = $recipe->id;
        $UserDatabBase->updateUser($user);
        
        header("Location: recipe_list.php");
    }
}

$generator = new ViewGenerator();
$generator->generate("add_recipe_view", $data);