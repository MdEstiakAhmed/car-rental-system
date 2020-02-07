<?php
    echo "hello";
    session_start();
    if(isset($_SESSION["loginStatus"])){
        if($_SESSION["loginStatus"]=="customer"){
            $outerArray=array();
            $sqlQuery = "SELECT * FROM `borrow_information` WHERE user_id = '".$_SESSION["userId"]."'";
            include("../databaseConnection/getData/getBorrowData.php");
            getBorrowData($sqlQuery);
            $flag=1;
            foreach($outerArray as $v){
                if($v["borrow_status"]=="complete" || $v["borrow_status"]=="reject"){
                    $flag=0;
                }
            }
            if($flag==1){
                $_SESSION["deleteError"]="Cannot Delete due to borrow request.";
                header("Location: ../displayFiles/userAccount.php");
            }
            elseif ($flag==0) {
                $sqlQuery = "DELETE FROM user_information WHERE id = '".$_SESSION["userId"]."'";
                include("../databaseConnection/setData/setData.php");
                setData($sqlQuery);
                header("Location: ../displayFiles/logoutAction.php");
            }
        }
        if($_SESSION["loginStatus"]=="client"){
            $outerArray=array();
            $sqlQuery = "SELECT * FROM `user_information` WHERE id = '".$_SESSION["userId"]."'";
            include("../databaseConnection/getData/getUserData.php");
            getData($sqlQuery);
            foreach($outerArray as $v){
                $email = $v["email"];
            }

            $outerArray=array();
            $sqlQuery = "SELECT * FROM `vehicle_information` WHERE owner_email = '".$email."'";
            include("../databaseConnection/getData/getVehicleData.php");
            getVehicleData($sqlQuery);
            if(sizeof($outerArray)==0){
                echo "ok";
                $sqlQuery = "DELETE FROM user_information WHERE id = '".$_SESSION["userId"]."'";
                include("../databaseConnection/setData/setData.php");
                setData($sqlQuery);
                header("Location: ../displayFiles/logoutAction.php");
            }
            else {
                $_SESSION["deleteError"]="Your car is not available. So you cannot delete your account.";
                header("Location: ../displayFiles/userAccount.php");
                
            }
        }
    }
    else{
        header("Location: landingPage.php");
    }
?>