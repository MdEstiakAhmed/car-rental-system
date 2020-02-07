<!DOCTYPE html>
<html>
	<head>
		<title>Vehicle Details</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		<link rel="stylesheet" href="../design/clientPanelHeaderDesign.css">
	</head>
	<body>
		<?php
			session_start();
			// print_r($_REQUEST);
			// echo $_REQUEST['varname'];
			if(isset($_REQUEST['varname'])){
				setcookie("carId", $_REQUEST['varname'], time() + (86400 * 30), "/");
				$_SESSION["id"]=$_REQUEST['varname'];
			}
			
			
			
			
			if(isset($_SESSION["loginStatus"])){
				if($_SESSION["loginStatus"]=="admin"){
					include("adminHeader.php");
				}
				if ($_SESSION["loginStatus"]=="customer") {
					include("header.php");
				}
				if($_SESSION["loginStatus"]=="client"){
					include("clientPanelHeader.php");
				}
	
				$outerArray=array();
				$myBorrowStatus="complete";
				include("../databaseConnection/getData/getBorrowData.php");
				$sqlQuery="select * from borrow_information where user_id='".$_SESSION["userId"]."'";
				getBorrowData($sqlQuery);
	
				foreach($outerArray as $v){ 
					if($v["user_id"]==$_SESSION["userId"]){
						$myBorrowStatus=$v["borrow_status"];
					}
				}
			}
			else{?>
				<div>
					<?php include("header.php"); ?>
				</div>
		<?php
			}
			

			// $outerArray=array();
			// include("../databaseConnection/getData/getVehicleData.php");
			include("../databaseConnection/getData/getVehicleDataFromJSON.php");
			$sqlQuery="select * from vehicle_information";
			// getVehicleData($sqlQuery);
			$jJSONData = getJSONData($sqlQuery);
			$JSONDecode=json_decode($jJSONData);

			foreach($JSONDecode as $v){ 
				if($v->id == $_SESSION["id"]){?>
					<div style="font-size:20px;">
						<img src=<?php echo "../".$v->image_URL ?> alt="Vehicle Image" height="200" width="350"><br/>
						<span><strong>ID:</strong></span><span><?php echo $v->id ?></span><br/>
						<span><strong>Category:</strong></span><span><?php echo $v->vehicle_type ?></span><br/>
						<span><strong>Company Name:</strong></span><span><?php echo $v->company ?></span><br/>
						<span><strong>Vehicle Number:</strong></span><span><?php echo $v->license_number ?></span><br/>
						<span><strong>license Expire Date:</strong></span><span><?php echo $v->license_expiry_date ?></span><br/>
						<span><strong>seat:</strong></span><span><?php echo $v->seat_number ?></span><br/>
						<span><strong>color:</strong></span><span><?php echo $v->color ?></span><br/>
						<span><strong>Engine Power:</strong></span><span><?php echo $v->hoursepower ?></span><br/>
						<span><strong>Status:</strong></span><span><?php echo $v->status ?></span><br/>
					</div>
					
				<?php
					if(isset($_SESSION["loginStatus"])){
						$_SESSION["vehicleID"]=$v->id;
						$_SESSION["vehicleCategory"]=$v->vehicle_type;

						if($_SESSION["loginStatus"]=="client" || $_SESSION["loginStatus"]=="admin"){?>
							<button><a href="manegeVehicle.php">manage Car</a></button>
							<button><a href="../validationFiles/checkVehicleDelete.php?carId=<?php echo $_SESSION["id"] ?>">Delete Car</a></button>
				<?php
						}
						elseif($_SESSION["loginStatus"]=="customer"){
							if($myBorrowStatus=="complete"){
								if($v->status=="available"){?>
									<br/><button style="color: black;"><a href="borrowRequest.php" style="text-decoration: none;">Borrow Car</a></button>
				<?php
								}
								elseif($v["status"]=="unavailable"){
									echo "<h2>"."this car is not available right now"."</h2><br/>";
								}
							}
							else{
								echo "<h2>"."you already borrow a car"."</h2><br/>";
							}
						}
					}
				}
			}
			if(isset($_SESSION["deleteError"])){
				echo "<h3 style='color:red'>".$_SESSION["deleteError"]."<h3>"."<br>";
				unset($_SESSION["deleteError"]);
			}

			include("footer.html");
		?>
	</body>
</html>