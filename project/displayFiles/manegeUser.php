<!DOCTYPE html>
<html>
	<head>
		<title>Manage User</title>
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
				if($_SESSION["loginStatus"]=="customer"){
					include("header.php");
				}
				if($_SESSION["loginStatus"]=="client"){
					include("clientPanelHeader.php");
				}
				$outerArray=array();
				include("../databaseConnection/getData/getUserData.php");
				$sqlQuery="SELECT * FROM user_information WHERE id = '".$_SESSION["updateId"]."';";
				getData($sqlQuery);
				foreach($outerArray as $v){ 
					$number = $v["phone_number"];
					$name = $v["name"];
				}
		?>
				<form action="..\..\project\validationFiles\updateUser.php" method="post">
					<h2>update your user information</h2>
					<span>Change User-name:</span>
					<input type="text" name="uname" placeholder="Enter username" value="<?php echo $name ?>"/>
					<br/><br/>
					<span>Change phone number:</span>
					<input type="text" name="userPhoneNumber" placeholder="Enter phone number" value="<?php echo $number	 ?>"/>
					<br/><br/>
					<span>Change or old Password:</span>
					<input type="password" name="pass" placeholder="Enter password" />
					<br/><br/>
					<span>Confirm Password:</span>
					<input type="password" name="conpass" placeholder="Enter password again" />
					<br/><br/>
					<input type="submit" name="sbt" value="update"/>
				</form>
				<?php
					if(isset($_SESSION["userUpdateError"])){
						echo $_SESSION["userUpdateError"];
						unset($_SESSION["userUpdateError"]);
					}
					include("footer.html");
				}
			else{
				header("Location: landingPage.php");
			}
		?>
	</body>
</html>