<!DOCTYPE html>
<html>
	<head>
		<title>Add Vehicle</title>
	</head>
	<body>
	<?php
		session_start();
	?>
	<h1>Enter Your Vehicle Information</h1>
	<form action="..\..\project\validationFiles\checkVehicleRegistration.php" method="post" enctype="multipart/form-data">
		<strong>Vehicle Category:</strong>
		<select name="categorytype">
			<option value="" name="">---Category---</option>
			<option value="standard" name="standard">Standard</option>
			<option value="suv" name="suv">SUV</option>
			<option value="compact" name="compact">Compact</option>
			<option value="minivan" name="minivan">MIni Van</option>
			<option value="microvan" name="microvan">Micro Van</option>
		</select>
		<br/><br/>
		<strong>Vehicle Company:</strong>
		<select name="company">
			<option value="" name="">---company---</option>
			<option value="toyota" name="toyota">Toyota</option>
			<option value="honda" name="honda">Honda</option>
			<option value="mitsubishi" name="mitsubishi">Mitsubishi</option>
			<option value="nissan" name="nissan">Nissan</option>
		</select>
		<br/><br/>
		<strong>Vehicle Number:</strong>
		<select name="city">
			<option value="" name="">---city---</option>
			<option value="dhaka" name="dhaka">DHAKA</option>
			<option value="chittagong" name="chittagong">CHITTAGONG</option>
			<option value="rajshahi" name="rajshahi">RAJSHAHI</option>
		</select>
		<select name="category">
			<option value="" name="">---category---</option>
			<option value="ka" name="ka">KA</option>
			<option value="kha" name="kha">KHA</option>
			<option value="ga" name="ga">GA</option>
			<option value="gha" name="gha">GHA</option>
		</select>
		<input type="text" name="first2number" placeholder="Enter first two number"/>
		<input type="text" name="last4number" placeholder="Enter last four number"/>
		<br/><br/>
		<strong>Vehilce License expired date:</strong>
		<select name="licenseday">
			<option value="" name="">day</option>
			<option value="1" name="1">1</option>
			<option value="2" name="2">2</option>
			<option value="3" name="3">3</option>
			<option value="4" name="4">4</option>
			<option value="5" name="5">5</option>
		</select>
		<select name="licensemonth">
			<option value="" name="">month</option>
			<option value="january" name="january">January</option>
			<option value="february" name="february">February</option>
			<option value="march" name="march">March</option>
			<option value="april" name="april">April</option>
			<option value="may" name="may">May</option>
			<option value="june" name="june">June</option>
		</select>
		<select name="licenseyear">
			<option value="" name="">year</option>
			<option value="2020" name="2020">2020</option>
			<option value="2021" name="2021">2021</option>
			<option value="2022" name="2022">2022</option>
			<option value="2023" name="2023">2023</option>
			<option value="2024" name="2024">2024</option>
			<option value="2025" name="2025">2025</option>
		</select>
		<br/><br/>
		<strong>Vehile Seat (In number):</strong>
		<input type="text" name="seatnumber" placeholder="Enter total seat"/>
		<br/><br/>
		<strong>Vehilce Color:</strong>
		<select name="color">
			<option value="" name="">---color---</option>
			<option value="black" name="black">Black</option>
			<option value="white" name="white">White</option>
			<option value="silver" name="silver">Silver</option>
			<option value="blue" name="blue">BLue</option>
		</select>
		<br/><br/>
		<strong>Engine Power (In HP):</strong>
		<select name="power">
			<option value="" name="">---hoursepower---</option>
			<option value="1000 to 1500" name="range1">1000 to 1500</option>
			<option value="1501 to 2000" name="range2">1501 to 2000</option>
			<option value="2001 to 2500" name="range3">2001 to 2500</option>
		</select>
		<br/><br/>
		<strong>Select file to upload :</strong> 
		<input type="file" name="fileToUpload">
		<br/><br/>
		<?php
			if(isset($_SESSION["adminlogin"])){?>
				<button><a href="adminPanel.php">back</a></button>
			<?php
			}
			elseif(isset($_SESSION["clientlogin"])){?>
				<button><a href="clientPanel.php">back</a></button>
			<?php
			}
		?>
		<input type="submit" name="sbt" value="register"/>
	</form>
	<?php
		if(isset($_SESSION["vehicleRegistrationError"])){
			echo $_SESSION["vehicleRegistrationError"];
			unset($_SESSION["vehicleRegistrationError"]);
		}
		?>
	</body>
</html>