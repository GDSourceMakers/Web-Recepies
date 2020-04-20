<?php
//readfile('views/template.html');

require_once('src/templating/ViewGenerator.php');

$generator = new ViewGenerator();

$generator->generate("login_view",null);
//echo __DIR__;
?>
