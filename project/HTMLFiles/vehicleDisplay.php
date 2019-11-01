<!DOCTYPE html>
<html>
	<head>
		<title>Vihicle Display</title>
	</head>
	<body>
		<h1>Vehicle Showcase</h1>
		<?php
			session_start();
			$file=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
			$data=array();
			while($c=fgets($file)){
				if($c!="\r\n"){
					$ar=explode("-",$c);
					$dar["vehicleID"]=$ar[0];
					$dar["ownermail"]=$ar[1];
					$dar["vehicleCompany"]=$ar[3];
					$dar["color"]=$ar[7];
					$dar["vehicleCategory"]=$ar[2];
					$dar["vehicleImageLink"]=$ar[9];
					$data[]=$dar;
				}	
			}
			if(isset($_SESSION["clientlogin"])){
				foreach($data as $v){ 
					if($_SESSION["useremail"]==$v["ownermail"]){?>
						<img src=<?php echo "../".$v["vehicleImageLink"] ?> alt="Vehicle Image" height="200" width="200"><br/>
						<span><strong>Name:</strong></span><span><?php echo $v["vehicleCompany"] ?></span><br/>
						<span><strong>Category:</strong></span><span><?php echo $v["vehicleCategory"] ?></span><br/>
						<span><strong>Color:</strong></span><span><?php echo $v["color"] ?></span><br/>
						<button><a href="vehicleDetails.php?varname=<?php echo $v["vehicleID"] ?>">Details</a></button>
						<hr/>
			<?php
					}
				}
			}
			else{
				foreach($data as $v){ ?>
					<img src=<?php echo "../".$v["vehicleImageLink"] ?> alt="Vehicle Image" height="200" width="200"><br/>
					<span><strong>Name:</strong></span><span><?php echo $v["vehicleCompany"] ?></span><br/>
					<span><strong>Category:</strong></span><span><?php echo $v["vehicleCategory"] ?></span><br/>
					<span><strong>Color:</strong></span><span><?php echo $v["color"] ?></span><br/>
					<button><a href="vehicleDetails.php?varname=<?php echo $v["vehicleID"] ?>">Details</a></button>
					<hr/>
			<?php
				}
			}
			?>
	</body>
</html>