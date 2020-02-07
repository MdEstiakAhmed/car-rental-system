<?php
    session_start();
    $carId = $_REQUEST['carId'];

    $outerArray=array();
    $sqlQuery = "SELECT * FROM `vehicle_information` WHERE id = '".$carId."'";
    include("../databaseConnection/getData/getVehicleData.php");
    getVehicleData($sqlQuery);

    foreach($outerArray as $v){
        $status = $v["status"];
    }

    if($status=="available"){
        $sqlQuery = "DELETE FROM vehicle_information WHERE id = '".$carId."'";
        include("../databaseConnection/setData/setData.php");
        setData($sqlQuery);
        header("Location: ../displayFiles/vehicleDisplay.php");
        echo "delete";
        setcookie("deleteCar","successfully delete",time()+50000, "/");
    }
    else {
        $_SESSION["deleteError"]="Your car is not available. So you cannot delete.";
        header("Location: ../displayFiles/vehicleDetails.php");
    }

    
?>