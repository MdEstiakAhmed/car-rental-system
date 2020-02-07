<!DOCTYPE html>
<html>
	<head>
		<title>User Account</title>
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/userAccountDesign.css">
		<script>
			function confirmDelete(){
				return confirm("Do you want to delete???");
			}
		</script>
	</head>
	<body>
		<?php
			session_start();
			
			if(isset($_SESSION["loginStatus"]) && isset($_COOKIE["loginStatus"])){
				if($_SESSION["loginStatus"]=="admin"){
					if(isset($_REQUEST["userUpdateId"])){
						$_SESSION["updateId"] = $_REQUEST["userUpdateId"];
					}
					else{
						$_SESSION["updateId"] = $_SESSION["userId"];
					}
					include("adminHeader.php");
				}
				if($_SESSION["loginStatus"]=="customer"){
					$_SESSION["updateId"] = $_SESSION["userId"];
					include("header.php");
				}
				if($_SESSION["loginStatus"]=="client"){
					$_SESSION["updateId"] = $_SESSION["userId"];
					include("clientPanelHeader.php");
				}
				
				$outerArray=array();
				include("../databaseConnection/getData/getUserData.php");
				$sqlQuery="select * from user_information where id='".$_SESSION["updateId"]."'";
				getData($sqlQuery);
				
				if(isset($_SESSION["userIdForAdmin"])){
					echo $_SESSION["userIdForAdmin"];
					unset($_SESSION["userIdForAdmin"]);
				}

				foreach($outerArray as $v){ 
					if($v["id"]==$_SESSION["updateId"]){?>
						<img src="<?php echo "../".$v["image_URL"] ?>" alt="user Image" height="200" width="200"><br/>
						<div class="details">
							<b>id: </b><span><?php echo $v["id"]; ?></span><br/>
							<b>name: </b><span><?php echo $v["name"];?></span><br/>
							<b>email: </b><span><?php echo $v["email"]; ?></span><br/>
							<b>phone_number: </b><span><?php echo $v["phone_number"]; ?></span><br/>
							<b>usertype: </b><span><?php echo $v["type"]; ?></span><br/>
							<b>birthdate: </b><span><?php echo $v["birthdate"]; ?></span><br/>
							<b>grnder: </b><span><?php echo $v["gender"]; ?></span><br/>
						</div>
						<button class="button"><a href="manegeUser.php" >update</a></button>
						<?php
							if($_SESSION["loginStatus"]!="admin"){?>
								<button class="button" onclick="return confirmDelete()"><a href="..\validationFiles\checkUserDelete.php" >delete</a></button>
				<?php
							}
						if(isset($_SESSION["deleteError"])){
							echo "<h3 style='color:red'>".$_SESSION["deleteError"]."<h3>"."<br>";
							unset($_SESSION["deleteError"]);
						}
					}
				}
				if(isset($_SESSION["userupdate"])){
					echo "<p>".$_SESSION["userupdate"]."<p>"."<br>";
					unset($_SESSION["userupdate"]);
				}
				include("footer.html");
			}
			else{
				header("Location: landingPage.php");
			}
			
		?>		
	</body>
</html>