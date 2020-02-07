<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" type="text/css" href="../design/loginPageDesign.css">
	</head>
	<body>
		<header>
			<?php include("header.php"); ?>
		</header>
			<section>
				<h1>LOGIN</h1>
				<form action="..\validationFiles\checklogin.php" method="post">
					<div class="email">
						<p>E-mail:</p>
						<input type="text" name="userEmail" placeholder="Enter Your Email Address" required/>
					</div>
					<div class="password">
						<p>Password:</p>
						<input type="password" name="userPassword" placeholder="Enter Your Password" required/>
					</div>
					
					
					<div class="button">
						<button><a class="back-button" href="landingPage.php">Back</a></button>
						<input class="login-button" type="submit" name="submitForm" value="Login"/>
					</div>
					<div class="error">
						<p>    
							<?php
								session_start();
								if(isset($_SESSION["loginError"])){
									echo $_SESSION["loginError"];
									unset($_SESSION["loginError"]);
								}
							?>
						</p>	
					</div>
					<div class="register">
						<p>New in this site? Just <a href="registrationPage.php">REGISTER</a></p>
						
					</div>
				</form>
				
			</section>
		<footer>
			
		</footer>
		
		<?php
			include("footer.html");
		?>
	</body>
</html>