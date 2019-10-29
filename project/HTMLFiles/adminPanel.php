<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
	</head>
	<body>
		<?php
			session_start();
			$_SESSION["adminlogin"]="yes";
			if(isset($_SESSION["loginStatus"])){?>
				<?php
					echo "<h1>"."welcome ".$_SESSION["name"]." to admin panel"."</h1>"."<br>";
				?>
				<a href="addVehicle.php">Add Vehicle</a><br/>
				<a href="registrationPage.php">Add User</a><br/>
				<a href="logoutAction.php">Add vehicle Category</a><br/>
				<a href="logoutAction.php">Manege Vehicle</a><br/>
				<a href="logoutAction.php">Manege User</a><br/>
				<a href="logoutAction.php">Manege Vehicle Category</a><br/>
				<a href="logoutAction.php">Vehicle Borrow Request</a><br/>
				<a href="logoutAction.php">Log Out</a><br/>
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