<!DOCTYPE html>
<html>
	<head>
		<title>Langing Page</title>
	</head>
	<body>
		<a href="vehicleDisplay.php">Vehicle</a><br/>
		<a href="categoryShow.php">Category</a><br/>
		<a href="costAnalysis.php">Cost</a><br/>
		<a href="aboutUs.php">About</a><br/>
		<?php
			session_start();
			if(!isset($_SESSION["loginStatus"])){?>
				
				<a href="loginPage.php">login</a><br>
				<a href="registrationPage.php">signup</a>
			<?php
			}
		?>
		<?php
			if(isset($_SESSION["loginStatus"])){?>
				<h1>welcome customer</h1>
				<?php
				?>
				<a href="userAccount.php"><?php echo $_SESSION["name"]; ?></a>
				<a href="logoutAction.php">Log Out</a>
			<?php
			}
		?>
		
	</body>
</html>