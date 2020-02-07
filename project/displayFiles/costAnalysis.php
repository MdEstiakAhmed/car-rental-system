<!DOCTYPE html>
<html>
	<head>
		<title>Cost Analysis</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<!-- <script type="text/javascript" src="../javaScript/costCheck.js"></script> -->
	</head>
	<body>
		<div>
			<?php
				session_start();
				include("header.php");
			?>
		</div>
		<h2>Calculate Your Tour Cost</h2>
		<form action="..\validationFiles\checkCost.php" method="post" name="costAnalysisForm">
			<span>Vehicle Category:</span>
			<select name="vehicleCategory" id="vehicleCategory">
				<option value="" name="">---Category---</option>
				<option value="standard" name="standard">Standard</option>
				<option value="suv" name="suv">SUV</option>
				<option value="compact" name="compact">Compact</option>
				<option value="minivan" name="minivan">MIni Van</option>
				<option value="microvan" name="microvan">Micro Van</option>
			</select>
			<span id="errorVehicleCategory"></span>
			<br><br>

			<span>destination:</span>
			<input type="radio" name="destination" value="inside-Dhaka"/>
			<span>Inside Dhaka</span>
			<input type="radio" name="destination" value="outside-Dhaka"/>
			<span>Outside Dhaka</span>
			<span id="errorDestination"></span>
			<br><br>

			<span>driving option:</span>
			<input type="radio" name="drivingOption" value="self-Driving" onchange="ckeckDrivingOption()"/>
			<span>Self Drive</span>
			<input type="radio" name="drivingOption" value="with-Driver" onchange="ckeckDrivingOption()"/>
			<span>With Driver</span>
			<span id="errorDrivingOption"></span>
			<br><br>

			<span>driving liciense number(if choose self-driving):</span>
			<input type="text" name="drivingLicense" id="drivingLicense" onkeyup="checkDrivingLicense()"/>
			<span id="errorDrivingLicense"></span>
			<br><br>

			<span>starting date:</span>
			<input type="date" name="staringDate" id="staringDate" onchange="checkStartingDate()" />
			<span id="errorStaringDate"></span>
			<br><br>

			<span>ending date:</span>
			<input type="date" name="endingDate" id="endingDate" onchange="checkEndingDate()"/>
			<span id="errorEndingDate"></span>
			<br><br>
			<input type="submit" name="sbt" value="Request" onclick="return check()"/>
			<button><a href="costAnalysis.php">refresh</a></button>
		</form> 
			
		<?php
			if(isset($_SESSION["costerror"])){
				echo $_SESSION["costerror"];
				unset($_SESSION["costerror"]);
			}
			if(isset($_SESSION["temporaryCostSHow"])){
				echo "<h2>Check your rent cost</h2>";
				echo "Category: ".$_SESSION["temporaryCategory"]."<br/>";
				echo "Driving Option: ".$_SESSION["temporaryDrivingOption"]."<br/>";
				echo "staring Date: ".$_SESSION["temporaryStartDate"]."<br/>";
				echo "ending Date: ".$_SESSION["temporaryEndDate"]."<br/>";
				echo "destination: ".$_SESSION["temporaryDestination"]."<br/>";
				echo "Total Cost: ".$_SESSION["temporaryCost"]."<br/>";
				unset($_SESSION["temporaryCostSHow"]);
				unset($_SESSION["temporaryCategory"]);
				unset($_SESSION["temporaryDrivingOption"]);
				unset($_SESSION["temporaryStartDate"]);
				unset($_SESSION["temporaryEndDate"]);
				unset($_SESSION["temporaryDestination"]);
				unset($_SESSION["temporaryCost"]);
			}
			include("footer.html");
		?>
		<script type="text/javascript" src="../javaScript/costCheck.js"></script>
	</body>
</html>