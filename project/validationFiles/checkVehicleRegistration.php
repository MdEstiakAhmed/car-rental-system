<?php
    session_start();

    if(strlen($_REQUEST["first2number"])==2){
        if(strlen($_REQUEST["last4number"])==4){
            if($_REQUEST["seatnumber"]<12){
                echo "varification done";

                $source=$_FILES['fileToUpload']['tmp_name'];
                $imageLocation="uploadImage/uploadImageOfVehicle/".$_FILES['fileToUpload']['name'];
                $target="../uploadImage/uploadImageOfVehicle/".$_FILES['fileToUpload']['name'];
                move_uploaded_file($source,$target);
                echo "photo upload done";
                
                include("../databaseConnection/setData/setData.php");
                $licenseNumber = $_REQUEST["city"]." metro ".$_REQUEST["category"]." ".$_REQUEST["first2number"]."-".$_REQUEST["last4number"];
                $formatedDate=date_create($_REQUEST["licensedate"]);
                $formatedDate= date_format($formatedDate,"d-M-Y");

                $sqlQuery = "INSERT INTO `vehicle_information` (`owner_email`, `vehicle_type`, `company`, `license_number`, `license_expiry_date`, `seat_number`, `color`, `hoursepower`, `image_URL`, `status`, `borrow_count`) VALUES ('".$_SESSION["userEmail"]."', '".$_REQUEST["categorytype"]."', '".$_REQUEST["company"]."', '".$licenseNumber."', '".$formatedDate."', '".$_REQUEST["seatnumber"]."', '".$_REQUEST["color"]."', '".$_REQUEST["power"]."', '".$imageLocation."', 'available', '0')";
                
                setData($sqlQuery);
                echo "database done";

                setcookie("insertCar","successfully Added to showcase",time()+50000, "/");

                if(isset($_SESSION["userType"]) && $_SESSION["userType"]=="admin"){
                    header("Location: ../../project/displayFiles/vehicleDisplay.php");
                }
                elseif(isset($_SESSION["userType"]) && $_SESSION["userType"]=="client"){
                    header("Location: ../../project/displayFiles/vehicleDisplay.php");
                }
            }
            else{
                $msg="vehile seat limit over";
                $_SESSION["vehicleRegistrationError"]=$msg;
            }
        }
        else{
            $msg="vehicle last four digit error";
            $_SESSION["vehicleRegistrationError"]=$msg;
        }
    }
    else{
        $msg="vehicle last two digit error";
        $_SESSION["vehicleRegistrationError"]=$msg;
    }
    if(isset($_SESSION["vehicleRegistrationError"]) || isset($_SESSION["sqlError"])){
        header("Location: ../displayFiles/addVehicle.php");
    }
?>