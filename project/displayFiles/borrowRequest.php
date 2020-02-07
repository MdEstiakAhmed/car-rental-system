<!DOCTYPE html>
<html>
	<head>
		<title>Borrow Request</title>
	</head>
	<body>
		<?php
			session_start();
			$carId = $_SESSION["vehicleID"];
			if(isset($_SESSION["loginStatus"])){
				include("header.php");
			?>
				<h1>Rent Vehicle</h1>
				<form action="..\validationFiles\checkBorrowRequest.php" method="post" name="borrowRegisterForm">
					<span>destination:</span>
					<input type="radio" name="destination" value="insideDhaka" required/>
					<span>Inside Dhaka</span>
					<input type="radio" name="destination" value="outsideDhaka" required/>
					<span>Outside Dhaka</span>
					<span id="errorDestination"></span>
					<br><br>

					<span>driving option:</span>
					<input type="radio" name="drivingOption" value="selfDriving" required/>
					<span>Self Drive</span>
					<input type="radio" name="drivingOption" value="withDriver" required/>
					<span>With Driver</span>
					<span id="errorDriver"></span>
					<br><br>

					<span>driving liciense number(if choose self-driving):</span>
					<input type="text" name="drivingLicense" id="drivingLicense" onkeyup="checkDrivingLicense()"/>
					<span id="errorDrivingLicense"></span>
					<br><br>

					<span>starting date:</span>
					<input type="date" name="staringDate" id="staringDate" onchange="checkStartingDate(); checkEndingDate();" required/>
					<span id="errorStaringDate"></span>
					<br><br>

					<span>ending date:</span>
					<input type="date" name="endingDate" id="endingDate" onchange="checkEndingDate()" required/>
					<span id="errorEndingDate"></span>
					<br><br>

					<input type="submit" name="sbt" value="Request" onclick="return check()"/>
					<span id="all"></span>
				</form>
		<?php
			if(isset($_SESSION["vehicleRegistrationError"])){
				echo $_SESSION["vehicleRegistrationError"];
				unset($_SESSION["vehicleRegistrationError"]);
			}
			if(isset($_SESSION["sqlError"])){
				echo $_SESSION["sqlError"];
				unset($_SESSION["sqlError"]);
			}
		}
		else {
			header("Location: ../displayFiles/landingPage.php");
		}
		?>
		<div>
			<?php
				include("footer.html");
			?>
		</div>
		<script type="text/javascript" src="../javaScript/borrowRequestCheck.js"></script>
	</body>
</html>