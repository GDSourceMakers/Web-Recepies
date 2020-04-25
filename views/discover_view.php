<?php
//since it's a php file, it needs a php tag in the beginning 
?>
<!-- each php site can get their individual css like this, checked!, this is valid-->
<link rel="stylesheet" type="text/css" href="static/css/discover.css">

<div class="card content">
    <div class="page_title">Discover existing recipes</div>
    <div class="big_recipe">

    <?php
        //big recipe
    $rec = $data[0];

    $template = <<<EOT
        <a href="recipe.php?id=$rec->id">
            <div class="big_img_div crop_big"><img class="big_img" src="$rec->picture" alt="recipe picture"></div>
        </a>
        <div class="flex_col justify_content__end">
            <a href="recipe.php?id=$rec->id">
                <div class="title align">$rec->title</div>
            </a>
            <div class="description align">
                $rec->description
            </div>
        </div>
        EOT;
        echo $template; //echo here
    ?>
        
    </div>
    <div class="small_recipes">
        <div class="space_evenly">
        <?php
            //small recipe left
            $rec = $data[1];
        $template = <<<EOT
            <a href="recipe.php?id=$rec->id">
                <div class="centered crop_small"><img src="$rec->picture" alt="recipe picture"></div>
            </a>
            <a href="recipe.php?id=$rec->id">
                <div class="title title_small centered">$rec->title</div>
            </a>
            EOT;
            echo $template; //echo here
        ?>
        </div>

        <div class="space_evenly">
        <?php
            //small recipe right
            $rec = $data[2];
        $template = <<<EOT
            <a href="recipe.php?id=$rec->id">
                <div class="centered crop_small"><img src="$rec->picture" alt="recipe picture"></div>
            </a>
            <a href="recipe.php?id=$rec->id">
                <div class="title title_small centered">$rec->title</div>
            </a>
            EOT;
            echo $template; //echo here
        ?>
        </div>
    </div>
</div>