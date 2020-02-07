<?php
    session_start();
    if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == "admin"){
        $var_value = $_REQUEST['varname'];
        if($var_value == "accept"){
            $outerArray=array();
            include("../databaseConnection/setData/setData.php");
            $sqlQuery="UPDATE `borrow_information` SET `borrow_status` = 'accept' WHERE `borrow_information`.`borrow_id` = '".$_SESSION["checkBorrowID"]."';";
            setData($sqlQuery);
            header("Location: ../displayFiles/showBorrowRequest.php");
        }
        if($var_value == "reject"){
            $outerArray=array();
            include("../databaseConnection/setData/setData.php");
            $sqlQuery="UPDATE `borrow_information` SET `borrow_status` = 'reject' WHERE `borrow_information`.`borrow_id` = '".$_SESSION["checkBorrowID"]."';";
            setData($sqlQuery);
            header("Location: ../displayFiles/showBorrowRequest.php");
        }
        if($var_value == "complete"){
            $outerArray=array();
            include("../databaseConnection/setData/setData.php");
            $sqlQuery="UPDATE `borrow_information` SET `borrow_status` = 'complete' WHERE `borrow_information`.`borrow_id` = '".$_SESSION["checkBorrowID"]."';";
            setData($sqlQuery);

            $outerArray=array();
            include("../databaseConnection/getData/getVehicleData.php");
            $sqlQuery="SELECT borrow_count FROM vehicle_information WHERE id = '".$_SESSION["ckeckVehicleId"]."';";
            getVehicleData($sqlQuery);
            foreach($outerArray as $v){ 
                $count = $v["borrow_count"]+1;
            }

            $sqlQuery="UPDATE `vehicle_information` SET `borrow_count` = '".$count."', `status` = 'available' WHERE `vehicle_information`.`id` = '".$_SESSION["ckeckVehicleId"]."'";
            setData($sqlQuery);
            header("Location: ../displayFiles/showBorrowRequest.php");
        }
    }
    else{
        header("Location: ../displayFiles/landingPage.php");
    }
?>