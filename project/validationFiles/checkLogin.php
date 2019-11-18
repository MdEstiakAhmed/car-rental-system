<?php
    session_start();
    $outerArray=array();
    $checkLoginStatus=0;
    include("../databaseConnection/getData/getUserData.php");
    $sqlQuery="select * from user_information where email='".$_REQUEST["userEmail"]."'";
    getData($sqlQuery);
    foreach($outerArray as $key){
        if($_REQUEST["userEmail"]==$key["email"] && md5($_REQUEST["userPassword"])==$key["password"]){
            $_SESSION["valid"]="yes";
            $_SESSION["userName"]=$key["name"];
            $_SESSION["userEmail"]=$key["email"];
            $_SESSION["userId"]=$key["id"];
            $_SESSION["userType"]=$key["type"];
            $checkLoginStatus = 1;
            break;
        }
    }

    if($checkLoginStatus==0){
        $_SESSION["loginError"]="worng password or username";
        header("Location: ..\displayFiles\loginPage.php");
    }
    elseif($checkLoginStatus==1){
        if(strcmp($_SESSION["userType"], "admin")==0){
            $_SESSION["loginStatus"]="admin";
            $_SESSION["adminlogin"]="yes";
            header("Location: ..\displayFiles\adminPanel.php");
        }
        elseif(strcmp($_SESSION["userType"], "customer")==0){
            $_SESSION["loginStatus"]="customer";
            header("Location: ..\displayFiles\landingPage.php");
        }
        elseif(strcmp($_SESSION["userType"], "client")==0){
            $_SESSION["loginStatus"]="client";
                $_SESSION["clientlogin"]="yes";
            header("Location: ..\displayFiles\clientPanel.php");
        }
    }    
?>