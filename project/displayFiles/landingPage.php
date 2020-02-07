<!DOCTYPE html>
<html>
	<head>
		<title>Langing Page</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/landingDesign.css">
	</head>
	<body>
		<div>
			<?php
				session_start();
				// setcookie("hello","hello world",time()+50000);
				// if(isset($_COOKIE["hello"])){
				// 	echo "<h2>".$_COOKIE["hello"]."</h2><br>";
				// 	setcookie("hello", "", time()-3600);
				// }
				include("header.php");
			?>
		</div>
		<section>
			<!-- <img src="../uploadImage/background.jpg"> -->
		</section>
		
		<div>
			<?php
				include("footer.html");
			?>
		</div>
	</body>
</html>