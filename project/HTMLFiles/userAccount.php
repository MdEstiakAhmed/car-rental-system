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
		<table border="1px">
			<tr>
			<th>Name</th><th>email</th><th>pass</th><th>birthdate</th><th>gender</th><th>user type</th>
			</tr>
			<?php
				$file=fopen("..\..\project\dataSet\userRegistrationData.txt","r") or die("file error");
				$data=array();
				while($c=fgets($file)){
					$ar=explode("-",$c);
					$dar["name"]=$ar[1];
					$dar["pass"]=$ar[4];
					$dar["email"]=$ar[0];
					$dar["birthdate"]=$ar[2];
					$dar["gender"]=$ar[3];
					$dar["usertype"]=$ar[5];
					$data[]=$dar;
				}
				foreach($data as $v){ 
					if($v["name"]==$_SESSION["name"]){?>
						<tr>
							<td><?php echo $v["name"];?></td>
							<td><?php echo $v["email"]; ?></td>
							<td><?php echo $v["pass"]; ?></td>
							<td><?php echo $v["birthdate"]; ?></td>
							<td><?php echo $v["gender"]; ?></td>
							<td><?php echo $v["usertype"]; ?></td>
						</tr>
			<?php
					}
				}
			?>
		</table>
		<a href="landingPage.php">back</a>
		<a href="logoutAction.php">Log Out</a>
	</body>
</html>