<!DOCTYPE html>
<html>
	<head>
		<title>About Us</title>
	</head>
	<body>
		<div>
			<?php
				session_start();
				include("header.php");
				$data=array();
				include("../databaseConnection/getData/getXMLData.php");
				loadFromXML();
			?>
		</div>
		<?php
			foreach($data as $v){?>
				<p style="text-align:center"><span style="font-size:90px"><?php echo $v["companyName"] ?></span><span style="font-size:20px"><?php echo $v["moto"] ?></span></p>
				<p style="text-align:center"><?php echo $v["details"] ?></p>
				<p style="text-align:center;"><img src="../uploadImage/icon/email.png" alt="car Image"  style="height:20px; width:20px;"> <b><?php echo $v["email"] ?></b></p>
				<p style="text-align:center"><img src="../uploadImage/icon/phone.png" alt="car Image" style="height:20px; width:20px;"> <b><?php echo $v["phoneNumber"] ?></b></p>
				<p style="text-align:center"><img src="../uploadImage/icon/location.png" alt="car Image" style="height:20px; width:20px;"> <b><?php echo $v["address"] ?></b></p>
		<?php
			}
			if(sizeof($data)==0)
				echo "Not found";
		?>
		<!-- <h1>XYZ</h1>
		<b>contact number: 01758725336</b><br/>
		<b>Email: xyz@gmail.com</b><br/>
		<b><a href="https://www.facebook.com/">Facebook</a></b><br/>
		<b><a href="https://www.instagram.com/">Instagram</a></b><br/>
		<b></b> -->
		<div>
			<?php
				include("footer.html");
			?>
		</div>
	</body>
</html>