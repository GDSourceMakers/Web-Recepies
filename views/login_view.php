<link rel="stylesheet" type="text/css" href="static/css/sign_up.css">

<?php
	
?>

<!--coped the content of "sign_in.html" here-->
<div class="sign_content">
	<h1>Sign in</h1>
	<!--added "method=POST"-->
	<form id="sign_up_form" enctype="multipart/form-data" autocomplete="off" method="POST">
		<label for="user_email">E-mail: </label><input id="user_email" type="email" name="username"><br>
		<label for="user_password">Password: </label><input type="password" id="user_password" name="pwd"><br>

		<?php
			//checking if the login was success + first visit of the page
			if ($data->visiter == true) {}
			else if ($data->showBadLogin == true) {
				$template = <<<EOT
				<div class="error">Login unsuccessful! Wrong e-mail or password.</div>
				EOT;
				echo $template; //echo here
			}
			else if($data->successfulLogin == true){
				echo "you are logged in";
			}
		?>
		<input id="sign_up_button" type="submit" value="Log in" name="login-btn"><br>
	</form>
	<div class="goto_sign_up">
		Don't have an account yet?
		<a href="register.php">Sign up here!</a>
	</div>
</div>
