<!DOCTYPE html>
<html>
	<head>
		<title>Manage User</title>
	</head>
	<body>
		<?php
			session_start();
			echo "<h2>"."welcome ".$_SESSION["name"]."<h2>";
		?>
		<form action="..\..\project\validationFiles\updateUser.php" method="post">
			<strong>Change User-name:</strong>
			<input type="text" name="uname" placeholder="Enter username"/>
			<br/><br/>
			<strong>Change Password:</strong>
			<input type="password" name="pass" placeholder="Enter password" />
			<br/><br/>
			<strong>Confirm Password:</strong>
			<input type="password" name="conpass" placeholder="Enter password again" />
			<br/><br/>
			<input type="submit" name="sbt" value="update"/>
		</form>
	</body>
</html>