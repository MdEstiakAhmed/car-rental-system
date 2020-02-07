<!DOCTYPE html>
<html>
	<head>
		<title>Langing Page</title>
		<link rel="stylesheet" href="../design/landingPageDesign.css">
		<link rel="stylesheet" href="../design/footerDesign.css">
	</head>
	<body>
		<ul>
			<li><a href="landingPage.php">Home</a></li>
			<li><a href="vehicleDisplay.php">Vehicle</a></li>
			<?php
				if(isset($_SESSION["loginStatus"]) && isset($_COOKIE["loginStatus"])){
					if($_SESSION["loginStatus"]=="customer" && $_COOKIE["loginStatus"]=="customer" ){?>
						<li><a href="borrowDetails.php">borrow vehicle details</a></li>
				<?php
					}
				}
			?>
			<li><a href="costAnalysis.php">Cost</a></li>
			<li><a href="aboutUs.php">About</a></li>

			<?php
				if(!isset($_SESSION["loginStatus"])){?>
					<li style="float:right"><a class="active" href="registrationPage.php">signup</a></li>
					<li style="float:right"><a class="active" href="loginPage.php">login</a></li>
				<?php
				}
			?>
			
			<?php
				if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"]=="customer"){?>
					<div>
						<li style="float:right"><a class="active" href="logoutAction.php">Logout</a></li>
						<li style="float:right"><a class="active" href="userAccount.php"><?php echo $_SESSION["userName"]; ?></a></li>
						<!-- <li style="float:right"><a class="user" href="userAccount.php"></a></li> -->
					</div>			
		</ul>
			<?php
				}
			?>
	</body>
</html>