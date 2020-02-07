<!DOCTYPE html>
<html>
	<head>
		<title>Add Vehicle</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		
		
	</head>
	<body>
	<?php
		session_start();
		if(isset($_SESSION["loginStatus"]) && ($_SESSION["loginStatus"]=="admin" || $_SESSION["loginStatus"]=="client")){
			if($_SESSION["loginStatus"]=="admin"){
				include("adminHeader.php");
			}
			if($_SESSION["loginStatus"]=="client"){
				include("clientPanelHeader.php");
			}
			?>
			<div class="addVehicleForm">
				<h1>Enter Your Vehicle Information</h1>
				<form action="..\validationFiles\checkVehicleRegistration.php" method="post" enctype="multipart/form-data">
					<strong>Vehicle Category:</strong>
					<select name="categorytype" id="category" onchange="checkseat()" required>
						<option value="" name="">---Category---</option>
						<option value="standard" name="standard">Standard</option>
						<option value="suv" name="suv">SUV</option>
						<option value="compact" name="compact">Compact</option>
						<option value="minivan" name="minivan">MIni Van</option>
						<option value="microvan" name="microvan">Micro Van</option>
					</select>
					<span id="errorcategory"></span>
					<br/><br/>

					<strong>Vehicle Company:</strong>
					<select name="company" id="company" required>
						<option value="" name="">---company---</option>
						<option value="toyota" name="toyota">Toyota</option>
						<option value="honda" name="honda">Honda</option>
						<option value="mitsubishi" name="mitsubishi">Mitsubishi</option>
						<option value="nissan" name="nissan">Nissan</option>
					</select>
					<span id="errorcompany"></span>
					<br/><br/>

					<strong>Vehicle Number:</strong>
					<select name="city" id="numcity" required>
						<option value="" name="">---city---</option>
						<option value="dhaka" name="dhaka">DHAKA</option>
						<option value="chittagong" name="chittagong">CHITTAGONG</option>
						<option value="rajshahi" name="rajshahi">RAJSHAHI</option>
					</select>
					<select name="category" id="numcategory" required>
						<option value="" name="">---category---</option>
						<option value="ka" name="ka">KA</option>
						<option value="kha" name="kha">KHA</option>
						<option value="ga" name="ga">GA</option>
						<option value="gha" name="gha">GHA</option>
					</select>
					<input type="text" name="first2number" id="numfirst" onkeyup="checkFirstTwo()" placeholder="Enter first two number" required/>
					<input type="text" name="last4number" id="numlast" onkeyup="checkLastFour()" placeholder="Enter last four number" required/>
					<span id="errornumber"></span>
					<br/><br/>

					<strong>Vehilce License expired date:</strong>
					<input type="date" name="licensedate" id="date" onchange="checkdate()" placeholder="Enter car license date" required/>
					<span id="errorlicensedate"></span>
					<br/><br/>

					<strong>Vehile Seat (In number):</strong>
					<input type="text" name="seatnumber" id="seat" placeholder="Enter total seat" required/>
					<span id="errorseat"></span>
					<br/><br/>

					<strong>Vehilce Color:</strong>
					<select name="color" id="color" required>
						<option value="" name="">---color---</option>
						<option value="black" name="black">Black</option>
						<option value="white" name="white">White</option>
						<option value="silver" name="silver">Silver</option>
						<option value="blue" name="blue">BLue</option>
					</select>
					<span id="errorcolor"></span>
					<br/><br/>

					<strong>Engine Power (In HP):</strong>
					<select name="power" id="power" required>
						<option value="" name="">---hoursepower---</option>
						<option value="1000 to 1500" name="range1">1000 to 1500</option>
						<option value="1501 to 2000" name="range2">1501 to 2000</option>
						<option value="2001 to 2500" name="range3">2001 to 2500</option>
					</select>
					<span id="errorpower"></span>
					<br/><br/>

					<strong>Select file to upload :</strong> 
					<input type="file" name="fileToUpload" id="file" required>
					<span id="errorfile"></span>
					<br/><br/>

					<?php
						if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "admin"){?>
							<button><a href="adminPanel.php">Back</a></button>
						<?php
						}
						elseif(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "client"){?>
							<button><a href="clientPanel.php">Back</a></button>
						<?php
						}
					?>
					<input type="submit" name="submit" onclick= "return check()" value="register"/>
				</form>
		<?php
				if(isset($_SESSION["vehicleRegistrationError"]) || isset($_SESSION["sqlError"])){
					echo $_SESSION["vehicleRegistrationError"];
					echo $_SESSION["sqlError"];
					unset($_SESSION["vehicleRegistrationError"]);
					unset($_SESSION["sqlError"]);
				}
				include("footer.html");
			}
			else{
					header("Location: ..\displayFiles\landingPage.php");
			}
			
		?>
			</div>
			<script type="text/javascript" src="../javaScript/vehicleRegistrationCheck.js"></script>
	</body>
</html>