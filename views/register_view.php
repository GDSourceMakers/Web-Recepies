<?php

?>

<link rel="stylesheet" type="text/css" href="static/css/sign_up.css">

<main>
   <div class="sign_content">
	<h1>Sign up</h1>
		<form action="register.php" id ="sign_up_form" enctype = "multipart/form-data" autocomplete = "off" method="POST">
			<label for = "user_name">Name: </label><input type = "text" id = "user_name" name = "user_name" size = "30" tabindex = "1"><br> 
			<label for = "user_birth">Birth date: </label><input type = "date" id="user_birth" name="user_birth"><br>
			<label for = "user_email">E-mail: </label><input type = "email"  id = "user_email" name="user_email"><br>
			<label for = "user_password">Password:  </label><input type = "password" id = "user_password" name="user_password"><br>
			<label for = "user_tel">Telephone number: </label><input type = "tel"  id="user_tel" name="user_tel"><br>
			<input id="sign_up_button" name="sign_up_button" type = "submit" value="Sign up"><br>
		</form>
	   	<div class="goto_sign_up"> 
			Already has an account?
			<a href="login.php">Sign in here!</a>
	 	  </div>
    </div>
</main>
