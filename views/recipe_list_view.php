<link rel="stylesheet" type="text/css" href="static/css/recipeSum.css">

<button type="button" onclick="topFunction()" id="myBtn" title="Go to top" class="addNew_button floating_button"><i class="fas fa-chevron-up"></i></button>

<script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
            //document.getElementById("navbar").style.opacity = "0";
            document.getElementById("navbar").style.top = "-110px";
            mybutton.style.display = "block";
        } else {
            document.getElementById("navbar").style.top = "0px";
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script> <!-- script for scrolling to the top function -->

<div class="card content">
    <div class="flex_row page_title">
        <div class="recipes_title">Recipes</div>

        <a href="add_recipe.php" class="recipeSum_button addNew_button button"><i class="fas fa-plus"></i></a>
    </div>

    <div class="recipe_sum_row">

        <?php
        if(empty($data)){
            echo <<<_HTML
                <p>You don't have any recipe yet :( </p>
            _HTML;
        }
        foreach($data as $rec){
            $res = <<<_HTML
                <div class="recipe_element">
                    <a href="recipe.php?id=$rec->id" class="recipe_element_content">
                        <img class="recipe_element_img" src="$rec->picture" alt="recipe picture">
                        <div class="recipe_element_title">$rec->title</div>
                        <div class="recipe_description">$rec->description</div>
                    </a>
                </div>
            _HTML;
            echo $res;
        }
        ?>


    </div>

</div>