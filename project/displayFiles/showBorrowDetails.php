<!DOCTYPE html>
<html lang="en">
    <head>
        <title>borrow request display</title>
        <link rel="stylesheet" href="../design/adminPageDesign.css">
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "admin"){
                include("adminHeader.php");
                $_SESSION["checkBorrowID"] = $_REQUEST['varname'];
                $outerArray=array();
                include("../databaseConnection/getData/getBorrowData.php");
                $sqlQuery="select * from borrow_information";
                getBorrowData($sqlQuery);
        ?>

        <?php
                foreach ($outerArray as $key) {
                    if($_SESSION["checkBorrowID"] == $key["borrow_id"]){?>
                        <p><b>borrow id: </b><?php echo $key["borrow_id"] ?></p>
                        <p><b>user id: </b><?php echo $key["user_id"] ?></p>
                        <p><b>vehicle_id: </b><?php echo $key["vehicle_id"] ?></p>
                        <p><b>vehicle_category: </b><?php echo $key["vehicle_category"] ?></p>
                        <p><b>destination: </b><?php echo $key["destination"] ?></p>
                        <p><b>driving_option: </b><?php echo $key["driving_option"] ?></p>
                        <p><b>user_license_number: </b><?php echo $key["user_license_number"] ?></p>
                        <p><b>travel_start_date: </b><?php echo $key["travel_start_date"] ?></p>
                        <p><b>travel_end_date: </b><?php echo $key["travel_end_date"] ?></p>
                        <p><b>total_cost: </b><?php echo $key["total_cost"] ?></p>
                        <p><b>borrow_status: </b><?php echo $key["borrow_status"] ?></p>
        <?php
                        $_SESSION["ckeckVehicleId"]=$key["vehicle_id"];
                        $borrow_staus=$key["borrow_status"];
                    }
                }
        ?>

        <?php
            if($borrow_staus=="pending"){?>
                <a href="../validationFiles/borrowRequestChecking.php?varname=<?php echo "accept" ?>">accept</a>
                <a href="../validationFiles/borrowRequestChecking.php?varname=<?php echo "reject" ?>">reject</a>
        <?php
            }
            elseif($borrow_staus=="accept"){?>
                <a href="../validationFiles/borrowRequestChecking.php?varname=<?php echo "complete" ?>">complete</a>
        <?php
            }
        
            }
            else{
                header("Location: ../displayFiles/landingPage.php");
            }
        ?>
    </body>
</html>