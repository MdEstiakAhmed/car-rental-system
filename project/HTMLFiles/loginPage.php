<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<form action="..\..\project\validationFiles\checklogin.php" method="post">
			<strong>E-mail:</strong>
			<input type="text" name="email" placeholder="Enter Email"/>
			<br><br>
			<strong>Password:</strong>
			<input type="password" name="pass" placeholder="Enter password"/>
			<br><br>
			<button><a href="landingPage.php">back</a></button>
			<input type="submit" name="sbt" value="Login"/>
		</form>
		<?php
			session_start();
			if(isset($_SESSION["msg"])){
				echo $_SESSION["msg"];
				unset($_SESSION["msg"]);
			}
			if(isset($_SESSION["worng"])){
				echo $_SESSION["worng"];
				unset($_SESSION["worng"]);
			}
		?>
	</body>
</html>