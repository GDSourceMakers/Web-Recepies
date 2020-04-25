<link rel="stylesheet" type="text/css" href="static/css/addRecipe.css">

<div class="card content">

    <fieldset class="card_form">
        <legend>Add recipe from URL</legend>
        <div class="card_form__content">
            <form method="POST" enctype="multipart/form-data" action="add_recipe.php">
                <div class="flex_boxing flex_row flex_row__center">
                    <label class="form_label" for="recipeURL">Recipe's URL: </label>
                    <input name="url_text" class="input-box" type="url" id="recipeURL" placeholder="https://www.yummly.com/recipe/Vegan-Chickpea-_Meatloaf_-9083673">
                    <input name="url_button" type="submit" class="button form_button">
                </div>
            </form>
        </div>
    </fieldset>

    <fieldset class="card_form secondFieldset">
        <legend>Add recipe manually</legend>

        <div class="card_form__content">
            <form method="POST" enctype="multipart/form-data" action="add_recipe.php">
                <div class="flex_boxing flex_row">
                    <label class="form_label" for="recipeName">Recipe's name: </label>
                    <input class="input-box" type="text" id="recipeName" name="recipeName" placeholder="Vegan Chickpea">
                </div>
                <?php
                    if (isset($data["errors"]["recipeName"])) {
                        $template = <<<EOT
                            <div class="error">Recipe's name is missing!</div>
                        EOT;
                        echo $template; //echo here
                    }
                ?>

                <div class="flex_boxing flex_col">
                    <div class="flex_row">
                        <label class="form_label" for="recipeDescription">Description: </label>
                        <div class="textarea_border input-box">
                            <textarea class="input-box" id="recipeDescription" name="recipeDescription" placeholder="Try this chickpea-based vegan loaf as a delicious..."></textarea>
                        </div>
                    </div>
                    <?php
                        if (isset($data["errors"]["recipeDescription"])) {
                                $template = <<<EOT
                                <div class="error">Recipe's description is missing!</div>
                            EOT;
                            echo $template; //echo here
                        }
                    ?>

                    <div class="flex_row">
                        <label class="form_label" for="recipeIngredients">Ingredients: </label>
                        <div class="textarea_border input-box">
                            <textarea class="input-box plus-space" id="recipeIngredients" name="recipeIngredients" 
placeholder="- 2 cans garbanzo beans
- 2 tablespoons ground flaxseeds
- ..."></textarea> <!--don't fix this, placeholder needs this to show these each other!!!-->
                        </div>
                    </div>
                    <?php
                        if (isset($data["errors"]["recipeIngredients"])) {
                                $template = <<<EOT
                                <div class="error">Recipe's ingredients are missing!</div>
                            EOT;
                            echo $template; //echo here
                        }
                    ?>

                    <div class="flex_row">
                        <label class="form_label" for="recipeDirections">Directions: </label>
                        <div class="textarea_border input-box">
                            <textarea class="input-box" id="recipeDirections" name="recipeDirections" placeholder="Preheat oven to 375°F. Spray a 9x5-inch loaf pan..."></textarea>
                        </div>
                    </div>
                    <?php
                        if (isset($data["errors"]["recipeDirections"])) {
                            $template = <<<EOT
                                <div class="error">Recipe's name is empty!</div>
                            EOT;
                            echo $template; //echo here
                        }
                    ?>

                    <div class="flex_row">
                        <label class="form_label" for="img_browse">Image: </label>
                        <input id="img_browse" name="img_browse" type="file">
                        <label for="img_browse" class="card list_button browse_img_button"><i class="far fa-folder-open"></i></label>
                    </div>

                    <div class="flex_row flex_row__end">
                        <input type="submit" class="button form_button" name="add" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
</div>