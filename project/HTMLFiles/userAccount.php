<!DOCTYPE html>
<html>
	<head>
		<title>User Account</title>
	</head>
	<body>
		<?php
			session_start();
			$username = $_SESSION["name"];
		?>
		<button><a href="manegeUser.php">update account</a></button>
		<button><a href="userAccount.php">delete account</a></button>
		<button><a href="borrowDetails.php">borrow vehicle details</a></button>
		<button><a href="landingPage.php">Home</a></button>
		<button><a href="logoutAction.php">Log Out</a></button><br/><br/>
		
		<?php
			if(isset($_SESSION["userupdate"])){
				echo "<h2>".$_SESSION["userupdate"]."<h2>"."<br>";
				unset($_SESSION["userupdate"]);
			}
			$file=fopen("..\..\project\dataSet\userRegistrationData.txt","r") or die("file error");
			$data=array();
			while($c=fgets($file)){
				if($c!="\r\n"){
					$ar=explode("-",$c);
					$dar["name"]=$ar[1];
					$dar["pass"]=$ar[4];
					$dar["email"]=$ar[0];
					$dar["birthdate"]=$ar[2];
					$dar["gender"]=$ar[3];
					$dar["usertype"]=$ar[5];
					$dar["userimagelink"]=$ar[6];
					$data[]=$dar;
				}
			}
			foreach($data as $v){ 
				if($v["email"]==$_SESSION["useremail"]){?>
					<img src=<?php echo "../".$v["userimagelink"] ?> alt="user Image" height="200" width="200"><br/>
					<b>name:</b><span><?php echo $v["name"];?></span><br/>
					<b>email:</b><span><?php echo $v["email"]; ?></span><br/>
					<b>birthdate:</b><span><?php echo $v["birthdate"]; ?></span><br/>
					<b>grnder:</b><span><?php echo $v["gender"]; ?></span><br/>
					<b>usertype:</b><span><?php echo $v["usertype"]; ?></span><br/>
		<?php
				}
			}
		?>		
		<?php
			if(isset($_SESSION["userUpdateError"])){
				echo $_SESSION["userUpdateError"];
				unset($_SESSION["userUpdateError"]);
			}
		?>
	</body>
</html>