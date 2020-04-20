<?php
	//print_r($data);

	if ($data->visiter == true) {
		
	}
	else if ($data->showBadLogin == true) {
		echo "bad login";
	}
	else if($data->successfulLogin == true){
		echo "you are logged in";
	}
?>
<div class="sign_content">
	<h1>Sign in</h1>
	<form id="sign_up_form" enctype="multipart/form-data" autocomplete="off" method="POST">
		<label for="user_email">E-mail: </label><input id="user_email" name="username"><br>
		<label for="user_password">Password: </label><input type="password" id="user_password" name="pwd"><br>

		<input id="sign_up_button" type="submit" value="Log in" name="login-btn"><br>
	</form>
	<div class="goto_sign_up">
		Don't have an account yet?
		<a href="sign_up.html">Sign up here!</a>
	</div>
</div>