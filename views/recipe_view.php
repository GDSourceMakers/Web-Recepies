<?php

?>

<link rel="stylesheet" type="text/css" href="static/css/recipe.css">

<!--coped the content of "recipe().html" here-->
<div class="card content">
    <div class="content_column content_first_column">
        <div class="recipe_title">
            <?php echo $data->title ?>
        </div>
        <div class="recipe_description_title">Description</div>
        <div class="recipe_description">
            <?php echo $data->description ?>
        </div>
        <div class="recipe_description_title">Ingredients</div>
        <div>
            <ul class="recipe_ingredients_list">
                <?php
                foreach ($data->ingredients as $i) {
                    $template = <<<EOT
                        <li><i class="fas fa-plus"></i>$i</li>
                        EOT;
                    echo $template;
                }
                ?>
            </ul>
        </div>

        <form method="POST">
            <button type="submit" class="button button add_all_ingredients_button button_noStyle" name="addAll" value="addAll">Add all to Shopping list</button>
        </form>

        <form method="POST">
            <button type="submit" class="button button add_all_ingredients_button button_noStyle" name="delete" value="delete">Delete recipe</button>
        </form>

    </div>

    <div class="content_column content_second_column">
        <?php
        $template = <<<EOT
            <img class="img_recipe" src="$data->picture" alt="recipe picture">
            EOT;
        echo $template;
        ?>


        <div class="recipe_direction_list">
            <ol>
                <?php
                foreach ($data->steps as $s) {
                    $template = <<<EOT
                        <li class="recipe_direction_list_element">$s</li>
                        EOT;
                    echo $template;
                }
                ?>

            </ol>
        </div>
    </div>
</div>

<div class="carrot_easter_egg">
    <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <g class="fa-group">
            <path fill="currentColor" d="M298.15 156.6c-52.7-25.7-114.5-10.5-150.2 32.8l55.2 55.2a16 16 0 1 1-22.6 22.6l-50.2-50.2L2.25 479.7a22.68 22.68 0 0 0 0 19.7 22.48 22.48 0 0 0 30 10.3l133.6-65.2-49.2-49.2a15.87 15.87 0 0 1 0-22.6 16.06 16.06 0 0 1 22.6 0l57 57 102-49.8a124.23 124.23 0 0 0-.1-223.3z" class="fa-secondary"></path>
            <path fill="currentColor" d="M390.25 121.7c40.7-19.5 88.8-9.4 121.7 30.3-41.6 50.3-107.5 52.5-151.9 7.9l-8-8C307.45 107.5 309.65 41.7 360 0c39.7 32.9 49.8 81 30.3 121.7z" class="fa-primary"></path>
        </g>
    </svg>
</div>