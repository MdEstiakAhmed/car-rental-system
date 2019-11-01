<!DOCTYPE html>
<html>
	<head>
		<title>Borrow Request</title>
	</head>
	<body>
		<?php
			session_start();
			$carId = $_SESSION["vehicleID"];
		?>
		<h1>Rent Vehicle</h1>
		<form action="..\..\project\validationFiles\checkBorrowRequest.php" method="post">
			<span>destination:</span>
			<input type="radio" name="destination" value="insideDhaka"/>
			<span>Inside Dhaka</span>
			<input type="radio" name="destination" value="outsideDhaka"/>
			<span>Outside Dhaka</span>
			<br><br>
			<span>driving option:</span>
			<input type="radio" name="drivingOption" value="selfDriving"/>
			<span>Self Drive</span>
			<input type="radio" name="drivingOption" value="withDriver"/>
			<span>With Driver</span>
			<br><br>
			<span>driving liciense number(if choose self-driving):</span>
			<input type="text" name="drivingLicense"/>
			<br><br>
			<span>starting date:</span>
			<input type="date" name="staringDate"/>
			<br><br>
			<span>ending date:</span>
			<input type="date" name="endingDate"/>
			<br><br>
			<input type="submit" name="sbt" value="Request"/>
		</form>
		<?php
			if(isset($_SESSION["vehicleRegistrationError"])){
				echo $_SESSION["vehicleRegistrationError"];
				unset($_SESSION["vehicleRegistrationError"]);
            }
		?>
		
	</body>
</html>