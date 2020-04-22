<?php
session_start();

//logout on button click

session_destroy();

//directs back the user to the welcoming page, after login
header("Location: index.php");