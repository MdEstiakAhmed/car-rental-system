<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
		
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		<link rel="stylesheet" href="../design/footerDesign.css">
	</head>
	<body>
	<?php
		session_start();
		if(isset($_SESSION["loginStatus"])){
			if($_SESSION["loginStatus"]=="admin"){
				include("adminHeader.php");
			}
		}
		else {?>
			<div>
				<?php include("header.php"); ?>
			</div>	
		<?php
		}
		
	?>
		<h1>Enter Your Information</h1>
		<form action="..\validationFiles\checkRegistration.php" method="post" name="registerForm" enctype="multipart/form-data">
			<strong>User-name:</strong>
			<input type="text" name="userName" onkeyup="checkName()" placeholder="Enter username" id="username" required/>
			<span id="errorName"></span>
			<br/><br/>
			<strong>E-mail:</strong>
			<input type="text" name="userEmail" onkeyup="checkEmail();emailExist();" placeholder="Enter email" id="email" required/>
			<span id="errorEmail"></span>
			<br/><br/>
			<strong>Phone NUmber:</strong>
			<input type="text" name="userPhoneNumber" onkeyup="checkNumber()" placeholder="Enter phone number" id="number" required/>
			<span id="errorNumber"></span>
			<br/><br/>
			<strong>Category:</strong>
			<select name="category" id="category" onchange="checkCategory()" required>
				<option value="" name="">---Category---</option>
				<option value="customer" name="customer">Customer</option>
				<option value="client" name="client">Client</option>
				<?php
					if(isset($_SESSION["userType"]) && $_SESSION["userType"]=="admin"){?>
						<option value="admin" name="admin">Admin</option>
				<?php
					}
				?>
			</select>
			<span id="errorCategory"></span>
			<br/><br/>
			<strong>Birthdate:</strong>
			<input type="date" name="birthdate" placeholder="Select your birthdate" id="birthdate"/>
			<span id="errorBirthdate"></span>
			<br/><br/>
			<strong>Gender: </strong>
			<input type="radio" name="gender" value="Male" required>
			<strong>Male</strong>
			<input type="radio" name="gender" value="Female" required>
			<strong>Female</strong>
			<input type="radio" name="gender" value="Other" required> 
			<strong>Other</strong>
			<span id="errorGender"></span>
			<br/><br/>
			<strong>Select phpto to upload :</strong> 
			<input type="file" name="fileToUpload" required>
			<span id="errorFile"></span>
			<br/><br/>
			<strong>Password:</strong>
			<input type="password" name="userPassword" placeholder="Enter password" id="password" onkeyup="checkPassword()" required/>
			<span id="errorPassword"></span>
			<br/><br/>
			<strong>Confirm Password:</strong>
			<input type="password" name="checkUserPassword" placeholder="Enter password again" id="confirmPassword" onkeyup="checkConfirmPassword()" required/>
			<span id="errorConfirmPassowrd"></span>
			<br/><br/>
			
			<input type="submit" onclick= "return check()" name="submit" value="signup" style="height:30px; width:60px"/>
		</form>
		<?php
			if(isset($_SESSION["registrationError"])){
				echo $_SESSION["registrationError"];
				unset($_SESSION["registrationError"]);
			}
			if(isset($_SESSION["sqlError"])){
				echo $_SESSION["sqlError"];
				unset($_SESSION["sqlError"]);
			}
			include("footer.html");
		?>
		<script type="text/javascript" src="../javaScript/userRegistrationCheck.js"></script>
	</body>
</html>