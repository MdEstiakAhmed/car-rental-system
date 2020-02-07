<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
    <ul>
        <li><a href="clientPanel.php">Home</a></li>
        <li><a href="addVehicle.php">Add Vehicle</a></li>
        <li><a href="vehicleDisplay.php">Show My Vehicle</a></li>		
        <li style="float:right"><a href="logoutAction.php">Logout</a></li>
        <li style="float:right"><a href="userAccount.php"><?php echo $_SESSION["userName"]; ?></a></li>
    </ul>
    <div>
        <h1 class="welcome">welcome  to client panel</h1>
    </div>
</body>
</html>