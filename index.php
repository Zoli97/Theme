<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!--checking if the form has been submitted and we have the data-->

<!--if the input is initialized if i click this send the data to the server and then submits value right in the get array-->
<!--store the error in the form, in the array update values of these position in the key/values array and output to the form-->
<!--when the user submit the form the code runs then check are there any errors if there is no errors it means the form is valid and redirect-->
<?php

require_once('./assets/config/db_config.php');
//use regular expression for validation on the server


$errors = array('name' => '', 'email' => '', 'message' => '');


//initialize vars to be empty
$name = $email = $message = '';

if(isset($_POST['submit'])){
	

	//<!--chck name if it empty-->
	if(empty($_POST['name']))
	{

		echo "<script type=\"text/javascript\">
		var prop = document.getElementById('contact-name').style.border ='1px solid red';
		console.log(prop);
		

	   </script>";

		$errors['name'] =  "A name is required <br/>";

	

		
	}
	else{

		//send it
		//echo htmlspecialchars($_POST['name']);
		//from the start to the end, lower case upper case all spaces as many times as the user 1 do it any length at least one char long
		$name = $_POST['name'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $name)){

			$errors['name'] = ' Must be letters and spaces only. <br/>';

		}

	}


	//<!--check email if it empty-->

	if(empty($_POST['email']))
	{
		$errors['email'] = 'An email is required  <br/>';
	}
	else{

		//send it
		//echo htmlspecialchars($_POST['email']);
		//grab the value from the post array the value that was submitted, reverse whatever comes after
		$email = $_POST['email'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

          $errors['email'] = " Must be a valid email adress. <br/>";

		}

	}

	
//check message if it empty-->
	if(empty($_POST['message']))
	{
		$errors['message'] = "A message is required <br/>";
	}
	else{

		//send it
		//echo htmlspecialchars($_POST['message']);
		$message = $_POST['message'];
		if(!preg_match('/^[a-zA-Z0-9\s]+$/', $message)){

			$errors['message'] = ' Must be letters and digits with spaces only. <br/>';
		}

	}


	// performs some kind of callback function on each one error.
//if i don t define a callback function it still cicle through the array and all the position in that array are empty or evaluate to false then this tatemenet need self will evaluate to false
//true have an error false we dont have

if(array_filter($errors)){

	//echo 'Errors in the form.';

}

else{

	

	//redirect 
	//echo 'Form is valid!';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$query = "INSERT INTO users (name, email, message) values('$name','$email', '$message')";
	$result_query = mysqli_query($connection,$query);

	if($result_query){

		header('Location: output.php');
	}

	else{

		echo "Please check your query! ";
	}
 
}


}

?>

<html>
	<head>
		<title>Escape Velocity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">


			<!-- Header -->
				<section id="header" class="wrapper">
				<div class="cursor"></div>
					
					<!-- Logo -->

					
						<div id="logo" class="mylogo">	
								<div class="cursor2"></div>
							<h1 class="h1-title"><a href="index.html">Hi, I'm Zoli</a></h1>
							<p class="parag">  Frontend & Backend web developer</p>

						</div>

					
						
					
					<!-- Nav -->
						<nav id="nav">
							<ul class="nav-link">
								<li class="current"><a href="index.php">Home</a></li>
								<li>
								</li>
								<li><a href="#">About</a></li>
								<li><a href="#">Details</a></li>
								<li><a href="#">Projects</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</nav>

				</section>

				

			<!-- Intro -->
				<section id="intro" class="wrapper style1">

			
					<div class="title">The Introduction</div>
					<div class="container">
						<p class="style1">So in case you were wondering what this is all about ...</p>
						<p class="style2">
							About Me <br class="mobile-hide" />
							 <a href="http://html5up.net" class="nobr">Sensible to Backend</a>
						</p>
						<p class="style3">I'm 23 <strong>years old</strong>, based in <strong> Arad Romania</strong>, and I hold a
						 <a href="http://html5up.net/license">bachelor degree and licensed in Computer Science</a>,
						   &ndash; from the Aurel Vlaicu University.</p>
						<ul class="actions">
							<li><a href="#" class="button style3 large">Proceed</a></li>
						</ul>
					</div>
				</section>

			<!-- Main -->
				<section id="main" class="wrapper style2">
					<div class="title">The Details</div>
					<div class="container">

						<!-- Image -->
						<div class="prt-featured" style="  display:flex; justify-content:center; align-items:center">
							<a href="#" class="image featured">
								<!-- <img src="images/pic01.jpg" alt="" /> -->
							</a>
						</div>

						<!-- Features -->
							<section id="features">
								<header class="style1">
									<h2>I do things with love </h2>
									<p>I developed some web pages with HTML CSS and JavaScript</p>
								</header>
								<div class="feature-list">
									<div class="row">
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="fab fa-linux">Linux Mint</h3>
												<p>I like to use the Linux Mint distribution, already i have been using for about 1 years .</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="fas solid  fa-desktop">Programing</h3>
												<p> It's a good field to open your mind and thinking about the real problems and solve that single or with the team work.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="fab fa-leanpub">Learning</h3>
												<p>In this field every time you need to learn about something new, unprecedented to handle the real problem.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="far solid fa-clock">Time</h3>
												<p>The time it's very important to all of us in our life because it's the most precious resources.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
										
											<section>
												<h3 class="fas fa-running">Sport</h3>
												<p>It's very important to do some workout exercises in the gym or outdoor and to have a good nutrition and healthy life. </p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="fas solid fa-bed">Sleep</h3>
												<p>It's important to have a good sleep because connect to better cognitive function and emotional health, so last but not least 7-8 hours of sleep is sufficient to a healthy life  </p>
											</section>
										</div>
									</div>
								</div>
								<ul class="actions special">
									<li><a href="#" class="button style1 large">Get Started</a></li>
									<li><a href="#" class="button style2 large">More Info</a></li>
								</ul>
							</section>

					</div>
				</section>

			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title">The Projects</div>
					<div class="container">
						<div class="row aln-center">
							<div class="col-4 col-12-medium">
								<section class="highlight">
									<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
									<h3><a href="#">Meditation App</a></h3>
									<p>The meditation app is built in HTML CSS and JavaScript. In this meditation app i have a list of nature songs, 3 main buttons that change the time of songs (2,5,10), play and stop buttons and last 2 buttons "rain and sun" that change the background of the app and play the coresponding nature song. </p>
									<ul class="actions">
										<li><a href="#" class="button style1">Learn More</a></li>
									</ul>
								</section>
							</div>
							<div class="col-4 col-12-medium">
								<section class="highlight">
									<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
									<h3><a href="#">Music App</a></h3>
									<p>The music app is built in HTML CSS and JavaScript and this is a simple tap music block that make different sound and I make a simple ball that jump on top to bottom on different sound and color block.</p>
									<ul class="actions">
										<li><a href="#" class="button style1">Learn More</a></li>
									</ul>
								</section>
							</div>

						</div>
					</div>
				</section>

			<!-- Footer -->
				<section id="footer" class="wrapper">
					<div class="title">The Rest Of It</div>
					<div class="container">
						<header class="style1">
							<h2>You can find me at</h2>
							<p>
								
							</p>
						</header>
						<div class="row">
							 <div class="col-6 col-12-medium">



								<!-- Contact Form -->
								<!--output the value shouldn't be empty-->
									 <section>
										<form method="post" action="index.php">
											<div class="row gtr-50">
												<div class="col-6 col-12-small">
													<input type="text" name="name"  class="name-contact"  id="contact-name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>" />
													
													<div class="invalid-feedback">
                                                      <?php echo $errors['name']; ?>
                                                     </div>

												</div>
												<div class="col-6 col-12-small">
													<input  type="text" name="email" id="contact-email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" />
													<div class="invalid-feedback">
                                                      <?php echo $errors['email']; ?>
                                                     </div>
												</div>
												<div class="col-12">
													<textarea name="message" id="contact-message" placeholder="Message" value="<?php echo htmlspecialchars($message); ?>" rows="4"></textarea>
													<div class="invalid-feedback" >
                                                      <?php echo $errors['message']; ?>
                                                     </div>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" class="style1" value="Send" /></li>
														<li><input type="reset" name="reset" class="style2"  value="Reset" /></li>
													</ul>
												</div>
											</div>
										</form>
									</section> 

							 </div> 
							<div class="col-6 col-12-medium">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-home">Mailing Address</h3>
													<p>
														Romania Arad <br />
														Str.DM, cod postal:1234 <br />
														Arad, TN 00000
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-comment">Social</h3>
													<p>
														<a href="https://www.instagram.com/tazlo_zoli/">instagram.com</a><br />
														<a href="https://www.linkedin.com/in/tazlo-zoli-7021b1195/">linkedin.com/untitled</a><br />
														<a href="https://www.facebook.com/zoli.tazlo/">facebook.com/untitled</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-envelope">Email</h3>
													<p>
														<a href="#">info@untitled.com</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="fab solid fa-youtube ">Youtube</h3>
	
													<p>
														<a href="https://www.youtube.com/">youtube.com</a>
													</p>
												</section>
											</div>

											
										</div>
									</section>

							</div>
						</div>
						<div id="copyright">
							<ul>
								<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
		    <script src="assets/js/app.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/hmongouachon/mgGlitch/src/mgGlitch.min.js"></script>

	</body>
</html>