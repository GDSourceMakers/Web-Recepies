<?php
//this is just a test, which shows the username of the user, on the main page, once its logged in
?>

<link rel="stylesheet" type="text/css" href="static/css/welcome.css">


<div class="container">
	
	<div class="flex-grid">
		
		<main class="col main">
			<div class="main_element description">
				<h2>What can we offer?</h2>
					<div class="flex_row">
						<div class="main_box description_box">
							We give you a place to keep all your recipes wherever you go!
						</div>
						<div class="main_box description_box">
							We help you during shopping, with the help of your own online shopping list!
						</div>
						<div class="main_box description_box">
							We introduce you the real joy of how easily you can add new recipes!
						</div>
					</div>
			</div>
			
			<div class="main_element instruction">
				<h2>How to use the Recipe Horder?</h2>
					<div class="flex_row instruction_row">
						<div class="instruction_box">
							<h3>Share your own recipes with the community!</h3>
							Do that by writing it manually or by giving the URL that goes to the selected recipe.
						</div>
						<i class="fas fa-cloud-upload-alt  fa-5x instruction_box  instruction_img"></i>
					</div>
					<div class="flex_row instruction_row">
						<div class="instruction_box">
							<h3>Discover recipes!</h3>
							Here you can find amazing recipes made by other cooking-enthusiasts! Be open to learn!
						</div>
						<i class="fas fa-search  fa-5x instruction_box  instruction_img"></i>
					</div>
					<div class="flex_row instruction_row">
						<div class="instruction_box ">
							<h3>Buy the ingreditents!</h3>
							We will bring to you the needed ingredients, so the only thing you have to do is just start cooking those delicious meals!
						</div>
						<i class="fas fa-shopping-cart  fa-5x instruction_box  instruction_img"></i>
					</div>
			</div>
				
			<div class="main_element opinion">
				<h2>What do our members say about Recipe Horder?</h2>
					<div class="flex_row">
						<div class="main_box opinion_box">
							<i>An inspirational forum meant to give people a place to read some positive daily content, to cheer them up or possibly inspire in some way.</i><br><br>
							- Monica
						</div>
						<div class="main_box opinion_box">
							<i>Do you have a recipe that you have made from this site that you think is extra special and deserves some extra exposure, then post it here and tell everyone why!</i><br><br>
							- Alice
						</div>
						<div class="main_box opinion_box">
							<i>Not sure what to make for dinner? Find out what member's have on their menu for tonight, it's a great way to pick up meal ideas!</i><br><br>
							- George
						</div>
					</div>
				</div>
				
				<div class="main_element motivation">
					<h2>And last but not least, remember the community's simple truth:</h2>
					<div class="motivation_quote">
							A recipe has no soul. You as the cook must bring soul to the recipe!
							<img class="img_logo" src="static/img/logo_full.png" alt="recipe horder logo">
					</div>
				</div>

				
		</main>
		
		<aside class="col sidebar">
			<div class="contact">
				<h2>Feedback</h2>
					<form action="index.php" id="feedback_form" enctype="multipart/form-data" autocomplete="off" method="POST">
						<label for = "contact_us">Feel free to share your ideas with us! </label><br>
						<textarea id="contact_us" rows="4" cols="50"></textarea>
						<input id="contact_us_btn" class="button contact_button" type="submit" value="Send" name="contact-btn">
					</form>
			</div>
			<div class="join_us">
				<h2>Join us!</h2>
					<div class="button_holder">
						<a href="register.php" class="button welcome-button">Sign up</a>
						<a href="login.php" class="button welcome-button">Sign in</a>
					</div>
			</div>
		</aside>
		
	  </div>
