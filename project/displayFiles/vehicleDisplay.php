<!DOCTYPE html>
<html>
	<head>
		<title>Vehicle Display</title>
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/vehicleDisplayDesign.css">
		
	</head>
	<body>
		<div>
			<?php
				session_start();
				setcookie("carId","",time()-20, "/");
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
				}
				elseif (!isset($_SESSION["loginStatus"])) {
					include("header.php");
				}

				if(isset($_COOKIE["insertCar"])){
					echo "<h2 style='text-align:center;'>".$_COOKIE["insertCar"]."</h2><br>";
					setcookie("insertCar", "", time()-3600, "/");
				}
				if(isset($_COOKIE["deleteCar"])){
					echo "<h2 style='text-align:center;'>".$_COOKIE["deleteCar"]."</h2><br>";
					setcookie("deleteCar", "", time()-3600, "/");
				}
						
			?>
			</div>
			<h1>Vehicle Showcase</h1>
			<?php
				function showCar($v){?>
					<div class="car-show">
						<img src="<?php echo "../".$v["image_URL"] ?>" alt="car Image" height="100" width="100"><br/>
						<span><strong>Id:</strong></span><span><?php echo $v["id"] ?></span><br/>
						<span><strong>Name:</strong></span><span><?php echo $v["company"] ?></span><br/>
						<span><strong>Category:</strong></span><span><?php echo $v["vehicle_type"] ?></span><br/>
						<span><strong>Color:</strong></span><span><?php echo $v["color"] ?></span><br/>
						<button><a href="vehicleDetails.php?varname=<?php echo $v['id'] ?>">Details</a></button>
					</div>
			<?php
				}
				$outerArray=array();
				include("../databaseConnection/getData/getVehicleData.php");
				$sqlQuery="select * from vehicle_information";
				getVehicleData($sqlQuery);

				if(isset($_SESSION["clientlogin"])){
					foreach($outerArray as $v){ 
						if($_SESSION["userEmail"]==$v["owner_email"]){
							showCar($v);
						}
					}
				}
				else{
					foreach($outerArray as $v){
						showCar($v);
					}
				}
			?>
			<div>
				<?php
					include("footer.html");
				
			?>
		</div>
	</body>
</html>