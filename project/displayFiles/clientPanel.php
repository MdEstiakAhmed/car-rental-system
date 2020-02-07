<!DOCTYPE html>
<html>
	<head>
		<title>Client Panel</title>
		<link rel="stylesheet" href="../design/clientPanelHeaderDesign.css">
		<link rel="stylesheet" href="../design/footerDesign.css">
	</head>
	<body>
	<?php
		session_start();
		if(isset($_SESSION["loginStatus"])){
			$_SESSION["clientlogin"]="yes";
				if(isset($_SESSION["loginStatus"])){
					include("clientPanelHeader.php");
				}
				if(!isset($_SESSION["loginStatus"])){?>
					
					<a href="loginPage.php">login</a><br>
					<a href="registrationPage.php">signup</a>
				<?php
			}
			include("footer.html");
		}
		else{
			header("Location: landingPage.php");
		}
		
		?>
	</body>
</html>