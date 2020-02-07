<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <ul>
            <li><a href="adminPanel.php">Home</a></li>
            <li><a href="addVehicle.php">Add Vehicle</a></li>
            <li><a href="registrationPage.php">Add User</a></li>
            <li><a href="vehicleDisplay.php">show vehicle</a></li>
            <li><a href="showUser.php">user details</a></li>
            <li><a href="showBorrowRequest.php">Vehicle Borrow Request</a></li>
            <li style="float:right"><a href="logoutAction.php">Log Out</a></li>
            <li style="float:right"><a href="userAccount.php"><?php echo $_COOKIE["userName"]; ?></a></li>
        </ul>
    </div>
    <div class="welcome">
        <span>Welcome to admin Panel</span>
    </div>
</body>
</html>