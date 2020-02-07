<!DOCTYPE html>
<html>
	<head>
		<title>Manege Vehicle</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION["loginStatus"])){
				if(isset($_SESSION["adminlogin"])){?>
					<button><a href="adminPanel.php">Home page</a></button>
			<?php
				}
				elseif(isset($_SESSION["clientlogin"])){?>
					<button><a href="clientPanel.php">Home page</a></button>
			<?php
				}
			?>
			<button><a href="logoutAction.php">logout</a></button><br/>
			<h1>vehicle details</h1>
			<?php
				if(isset($_SESSION["vehicleupdate"])){
					echo "<h2>".$_SESSION["vehicleupdate"]."<h2>"."<br>";
					unset($_SESSION["vehicleupdate"]);
				}
				$file=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
				$data=array();
				$status="";
				while($c=fgets($file)){
					if($c!="\r\n"){
						$ar=explode("-",$c);
						$dar["vehicleID"]=$ar[0];
						$dar["ownermail"]=$ar[1];
						$dar["vehicleCategory"]=$ar[2];
						$dar["company"]=$ar[3];
						$dar["vehicleLicense"]=$ar[4];
						$dar["vehicleLicenseDate"]=$ar[5];
						$dar["seat"]=$ar[6];
						$dar["color"]=$ar[7];
						$dar["power"]=$ar[8];
						$dar["vehicleImageLink"]=$ar[9];
						$dar["status"]=$ar[10];
						$data[]=$dar;
					}
				}
				foreach($data as $v){ 
					if($v["vehicleID"]==$_SESSION["vehicleID"]){?>
						<img src=<?php echo "../".$v["vehicleImageLink"] ?> alt="Vehicle Image" height="200" width="300"><br/>
						<span><strong>vehicle ID:</strong></span><span><?php echo $v["vehicleID"] ?></span><br/>
						<span><strong>ownermail:</strong></span><span><?php echo $v["ownermail"] ?></span><br/>
						<span><strong>vehicle Category</strong></span><span><?php echo $v["vehicleCategory"] ?></span><br/>
						<span><strong>company:</strong></span><span><?php echo $v["company"] ?></span><br/>
						<span><strong>vehicle License:</strong></span><span><?php echo $v["vehicleLicense"] ?></span><br/>
						<span><strong>vehicle License expire Date:</strong></span><span><?php echo $v["vehicleLicenseDate"] ?></span><br/>
						<span><strong>seat:</strong></span><span><?php echo $v["seat"] ?></span><br/>
						<span><strong>color:</strong></span><span><?php echo $v["color"] ?></span><br/>
						<span><strong>power:</strong></span><span><?php echo $v["power"] ?></span><br/>
						<span><strong>status:</strong></span><span><?php echo $v["status"] ?></span><br/>
			<?php
					}
				}
			?>
			<!-- <br/><button>delete this vehicle</button> -->
			<h1>update information</h1>
			<form action="..\..\project\validationFiles\updateVehicle.php" method="post">
				<strong>change Vehilce License expired date:</strong>
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
				<strong>change Vehilce Color:</strong>
				<select name="color">
					<option value="" name="">---color---</option>
					<option value="black" name="black">Black</option>
					<option value="white" name="white">White</option>
					<option value="silver" name="silver">Silver</option>
					<option value="blue" name="blue">BLue</option>
				</select>
				<br/><br/>
				<strong>change Vehilce status:</strong>
				<select name="status">
					<option value="" name="">---status---</option>
					<option value="available" name="available">available</option>
					<option value="unavailable" name="unavailable">unavailable</option>
				</select>
				<br/><br/>
				<input type="submit" name="sbt" value="update information"/>
			</form>
			<?php
				include("footer.html");
			}
			else {
				header("Location: landingPage.php");
			}
		?>
	</body>
</html>