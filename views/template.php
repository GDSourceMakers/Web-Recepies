<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script%7CRoboto&display=swap" rel="stylesheet">
    <link href="static/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="static/css/base/common.css">
    <!--include the proper css-->

    <link rel="apple-touch-icon" sizes="180x180" href="static/img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="static/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="static/img/icon/favicon-16x16.png">
    <link rel="manifest" href="static/img/icon/site.webmanifest">
    <title>Recipe Horder</title>

</head>

<body>
    <div id="header">

        <header id="navbar" class="app_header">
            <div class="top_bar">
                <a href="index.php">
                    <div class="site_name"><img src="static/img/logo_full.png" alt="website logo"></div>
                </a>
                <div class="top_bar__right">
                    <?php
                    if ($context["loggedIn"] == false) {
                        $template = <<<_HTML
                            <a href="login.php" class="button header-button">Sign In</a>
                            <a href="register.php" class="button header-button">Sign Up</a>
                        _HTML;
                        echo $template;
                    } else {
                        $profile = $context["username"];
                        $template = <<<_HTML
                            <span style = "background-color: var(--secondary-dark-color)" class="button header-button">$profile</span>
                            <a href="logOut.php" class="button header-button">Sign Out</a>
                        _HTML;
                        echo $template;
                    }
                    ?>

                </div>
            </div>
            <nav class="main_menu">
                <ul>
                    <li><a href="recipeSum.html"><i class="fas fa-pizza-slice"></i> Recipes</a></li>
                    <li><a href="in_stock.php"><i class="fas fa-carrot"></i> In stock</a></li>
                    <li><a href="shopping_list.php"><i class="fas fa-list"></i> Shopping list</a></li>
                    <li><a href="discover.html"><i class="fas fa-globe"></i> Discover</a></li>
                </ul>
            </nav>
        </header>

        <script>
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                //console.log("asd");
                if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
                    //document.getElementById("navbar").style.opacity = "0";
                    document.getElementById("navbar").style.top = "-110px";
                } else {
                    document.getElementById("navbar").style.top = "0px";
                }
            }
        </script>

    </div>
    <main class="top-app-bar--height-fix">
        <!--the order changed a bit, now we put the header, 
        footer and the common setting into the template, and every other cntent is stored individually 
        and put here and generrated through the ViewGenerator.php
        the only other thing we change on this site, is once we finish a menu option's page, 
        the href has to be corrected-->
        <?php
        //this is where the content of each individual html page is being generated
        require_once($content);

        ?>
    </main>
    <div id="footer"></div>
</body>

</html>
