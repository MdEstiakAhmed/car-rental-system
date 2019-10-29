<!DOCTYPE html>
<html>
	<head>
		<title>Client Panel</title>
	</head>
	<body>
	<?php
		session_start();
		$_SESSION["clientlogin"]="yes";
			if(isset($_SESSION["loginStatus"])){?>
				<?php
					echo "<h1>"."welcome ".$_SESSION["name"]." to client panel"."</h1>"."<br>";
				?>
				<a href="addVehicle.php">Add Vehicle</a><br/>
				<a href="logoutAction.php">Manege Vehicle</a><br/>
				<a href="logoutAction.php">Log Out</a>
			<?php
			}
		?>
		<?php
			if(!isset($_SESSION["loginStatus"])){?>
				
				<a href="loginPage.php">login</a><br>
				<a href="registrationPage.php">signup</a>
			<?php
			}
		?>
	</body>
</html>