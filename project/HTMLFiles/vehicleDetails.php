<!DOCTYPE html>
<html>
	<head>
		<title>Vehicle Details</title>
	</head>
	<body>
		<h1>Vehicle Information</h1>
		<?php
			session_start();
			$var_value = $_REQUEST['varname'];
		?>
		<?php
			$file=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
			$data=array();
			$status="";
			while($c=fgets($file)){
				if($c!="\r\n"){
					$ar=explode("-",$c);
					$dar["vehicleID"]=$ar[0];
					$dar["vehicleCategory"]=$ar[2];
					$dar["company"]=$ar[3];
					$dar["vehicleLicense"]=$ar[4];
					$dar["vehicleLicenseDate"]=$ar[5];
					$dar["seat"]=$ar[6];
					$dar["color"]=$ar[7];
					$dar["power"]=$ar[8];
					$dar["vehicleImageLink"]=$ar[9];
					if($var_value==$ar[0]){
						$status=trim($ar[10]);
					}
					$data[]=$dar;
				}
			}
			foreach($data as $v){ 
				if($v["vehicleID"]==$var_value){?>
					<img src=<?php echo "../".$v["vehicleImageLink"] ?> alt="Vehicle Image" height="200" width="200"><br/>
					<span><strong>ID:</strong></span><span><?php echo $v["vehicleID"] ?></span><br/>
					<span><strong>Category:</strong></span><span><?php echo $v["vehicleCategory"] ?></span><br/>
					<span><strong>Company Name:</strong></span><span><?php echo $v["company"] ?></span><br/>
					<span><strong>Vehicle Number:</strong></span><span><?php echo $v["vehicleLicense"] ?></span><br/>
					<span><strong>license Expire Date:</strong></span><span><?php echo $v["vehicleLicenseDate"] ?></span><br/>
					<span><strong>seat:</strong></span><span><?php echo $v["seat"] ?></span><br/>
					<span><strong>color:</strong></span><span><?php echo $v["color"] ?></span><br/>
					<span><strong>Engine Power:</strong></span><span><?php echo $v["power"] ?></span><br/>
				<?php
					if(isset($_SESSION["loginStatus"])){
						$_SESSION["vehicleID"]=$v["vehicleID"];
						$_SESSION["vehicleCategory"]=$v["vehicleCategory"];
						if($status=="available"){
							if(!isset($_SESSION["clientlogin"]) && !isset($_SESSION["adminlogin"])){?>
								<br/><button><a href="borrowRequest.php">Borrow Car</a></button>
				<?php
							}
							elseif(isset($_SESSION["clientlogin"]) || isset($_SESSION["adminlogin"])){?>
								<br/><button><a href="manegeVehicle.php">manage Car</a></button>
				<?php
							}
						}
						elseif($status=="unavailable"){
							echo "<h2>"."this car is not available right now"."</h2>";
						}
						?>
						<br/>
						<button><a href="landingPage.php">Home</a></button>
                        <button><a href="logoutAction.php">logout</a></button>
				<?php
					}
				}
			}
				?>
	</body>
</html>