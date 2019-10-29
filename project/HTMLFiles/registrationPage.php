<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
	</head>
	<body>
	<?php
		session_start();
	?>
		<h1>Enter Your Information</h1>
		<form action="..\..\project\validationFiles\checkRegistration.php" method="post">
			<strong>User-name:</strong>
			<input type="text" name="uname" placeholder="Enter username"/>
			<br/><br/>
			<strong>E-mail:</strong>
			<input type="text" name="email" placeholder="Enter email"/>
			<br/><br/>
			<strong>Category:</strong>
			<select name="category">
				<option value="" name="">---Category---</option>
				<option value="customer" name="customer">Customer</option>
				<option value="client" name="client">Client</option>
				<?php
					if(isset($_SESSION["adminlogin"])){?>
						<option value="admin" name="admin">admin</option>
				<?php
					}
				?>
			</select>
			<br/><br/>
			<strong>Birthdate:</strong>
			<select name="day">
				<option value="" name="">day</option>
				<option value="1" name="1">1</option>
				<option value="2" name="2">2</option>
				<option value="3" name="3">3</option>
				<option value="4" name="4">4</option>
				<option value="5" name="5">5</option>
			</select>
			<select name="month">
				<option value="" name="">month</option>
				<option value="january" name="january">January</option>
				<option value="february" name="february">February</option>
				<option value="march" name="march">March</option>
				<option value="april" name="april">April</option>
				<option value="may" name="may">May</option>
				<option value="june" name="june">June</option>
			</select>
			<select name="year">
				<option value="" name="">year</option>
				<option value="1995" name="1995">1995</option>
				<option value="1996" name="1996">1996</option>
				<option value="1997" name="1997">1997</option>
				<option value="1998" name="1998">1998</option>
				<option value="1999" name="1999">1999</option>
				<option value="2000" name="2000">2000</option>
			</select>
			<br/><br/>
			<strong>Gender: </strong>
			<input type="radio" name="gender" value="Male">
			<strong>Male</strong>
			<input type="radio" name="gender" value="Female">
			<strong>Female</strong>
			<input type="radio" name="gender" value="Other"> 
			<strong>Other</strong>
			<br/><br/>
			<strong>Password:</strong>
			<input type="password" name="pass" placeholder="Enter password" />
			<br/><br/>
			<strong>Confirm Password:</strong>
			<input type="password" name="conpass" placeholder="Enter password again" />
			<br/><br/>
			<?php
			if(isset($_SESSION["adminlogin"])){?>
				<button><a href="adminPanel.php">back</a></button>
			<?php
			}
			else{?>
				<button><a href="landingPage.php">back</a></button>
			<?php
			}
			?>
			
			<input type="submit" name="sbt" value="signup"/>
		</form>
		<?php
			if(isset($_SESSION["registrationError"])){
				echo $_SESSION["registrationError"];
				unset($_SESSION["registrationError"]);
			}
		?>
	</body>
</html>