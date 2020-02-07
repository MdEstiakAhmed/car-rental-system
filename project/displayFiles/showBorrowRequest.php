<!DOCTYPE html>
<html lang="en">
<head>
    <title>borrow request display</title>
    <link rel="stylesheet" href="../design/adminPageDesign.css">
    <link rel="stylesheet" href="../design/borrowTableDesign.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "admin"){
            include("adminHeader.php");
            $outerArray=array();
            include("../databaseConnection/getData/getBorrowData.php");
            $sqlQuery="select * from borrow_information";
            getBorrowData($sqlQuery);
    ?>
        <table id="borrow-request">
            <tr>
                <th>borrow id</th>
                <th>vehicle id</th>
                <th>user id</th>
                <th>borrow status</th>
                <th>details</th>
            </tr>
    <?php
                    foreach ($outerArray as $key) {?>
                        <tr>
                            <td><?php echo $key["borrow_id"] ?></td>
                            <td><?php echo $key["vehicle_id"] ?></td>
                            <td><?php echo $key["user_id"] ?></td>
                            <td><?php echo $key["borrow_status"] ?></td>
                            <td><button><a href="showBorrowDetails.php?varname=<?php echo $key["borrow_id"] ?>">details</a></button></td>
                        </tr>
    <?php
                    }
            }
            else{
                header("Location: ../displayFiles/landingPage.php");
            }
    ?>
        
    </table>
</body>
</html>