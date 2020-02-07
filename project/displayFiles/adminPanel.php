<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../design/footerDesign.css">
		<link rel="stylesheet" href="../design/adminPageDesign.css">
		
	</head>
	<body>
		<?php
			session_start();
			$_SESSION["adminlogin"]="yes";
			if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "admin"){
				include("adminHeader.php");
				?>
				<div class="dashboard">
					<div class="user">
						<?php
							$outerArray=array();
							include("../databaseConnection/getData/getCount.php");
							$sqlQuery="select COUNT(*) from user_information";
							$totalUser=getData($sqlQuery);
						?>
						<div class="total-user">
							<h2>total user:<br><span class="value"><?php echo $totalUser ?></span></h2>
						</div>
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from user_information WHERE type = 'admin'";
							$totalAdmin=getData($sqlQuery);
						?>
						<div class="total-admin">
							<h2>total admin:<br><span class="value"><?php echo $totalAdmin ?></span></h2>
						</div>
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from user_information WHERE type = 'customer'";
							$totalCustomer=getData($sqlQuery);
						?>
						<div class="total-customer">
							<h2>total customer:<br><span class="value"><?php echo $totalCustomer ?></span></h2>
						</div>
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from user_information WHERE type = 'client'";
							$totalClient=getData($sqlQuery);
						?>
						<div class="total-client">
							<h2>total client:<br><span class="value"><?php echo $totalClient ?></span></h2>
						</div>
					</div>
					
					<div class="borrow">
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from borrow_information";
							$totalBorrow=getData($sqlQuery);
						?>
						<div class="total-borrow">
							<h2>total borrow:<br><span class="value"><?php echo $totalBorrow ?></span></h2>
						</div>

						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from borrow_information WHERE borrow_status = 'complete'";
							$totalBorrowComplete=getData($sqlQuery);
						?>
						<div class="total-borrow-complete">
							<h2>borrow complete:<br><span class="value"><?php echo $totalBorrowComplete ?></span></h2>
						</div>

						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from borrow_information WHERE borrow_status = 'pending'";
							$totalBorrowPending=getData($sqlQuery);
						?>
						<div class="total-borrow-pending">
							<h2>borrow pending:<br><span class="value"><?php echo $totalBorrowPending ?></span></h2>
						</div>
						
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from borrow_information WHERE borrow_status = 'accept'";
							$totalBorrowAccept=getData($sqlQuery);
						?>
						<div class="total-borrow-accept">
							<h2>borrow accept:<br><span class="value"><?php echo $totalBorrowAccept ?></span></h2>
						</div>

						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from borrow_information WHERE borrow_status = 'reject'";
							$totalBorrowReject=getData($sqlQuery);
						?>
						<div class="total-borrow-reject">
							<h2>borrow reject:<br><span class="value"><?php echo $totalBorrowReject ?></span></h2>
						</div>
					</div>

					<div class="car">
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from vehicle_information";
							$totalCar=getData($sqlQuery);
						?>
						<div class="total-vehicle">
							<h2>total vehicle:<br><span class="value"><?php echo $totalCar ?></span></h2>
						</div>

						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from vehicle_information WHERE status = 'available'";
							$totalCarAvailable=getData($sqlQuery);
						?>
						<div class="total-vehicle-available">
							<h2>vehicle available:<br><span class="value"><?php echo $totalCarAvailable ?></span></h2>
						</div>
						<?php
							$outerArray=array();
							$sqlQuery="select COUNT(*) from vehicle_information WHERE status = 'unavailable'";
							$totalCartotalCarUnavailable=getData($sqlQuery);
						?>
						<div class="total-vehicle-unavailable">
							<h2>vehicle unavailable:<br><span class="value"><?php echo $totalCartotalCarUnavailable ?></span></h2>
						</div>
					</div>
					
					<!-- <div class="total-vehicle">
						<h2>total vehicle:</h2>
					</div> -->
					
				</div>
			<?php
				include("footer.html");
			}
			else{
				header("Location: landingPage.php");
			}
			
		?>
	</body>
</html>