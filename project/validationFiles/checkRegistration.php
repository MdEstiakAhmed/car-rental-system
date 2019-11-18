<?php
    session_start();
    
    $name = $_REQUEST["userName"];
    if (preg_match("/^[a-zA-Z ]*$/",$name)){
        $email =$_REQUEST["userEmail"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $phone =$_REQUEST["userPhoneNumber"];
            $first3Digit = substr($phone,0,3);
            $length = strlen($phone);
            if ($length == 11 && ($first3Digit =="017" || $first3Digit =="019" || $first3Digit =="015" || $first3Digit =="016")){
                $passwordLength = strlen($_REQUEST["userPassword"]);
                if($passwordLength >= 5){
                    if($_REQUEST["userPassword"]==$_REQUEST["checkUserPassword"]){
                        echo "varification done";

                        $source=$_FILES['fileToUpload']['tmp_name'];
                        $imageLocation="uploadImage/uploadImageOfUser/".$_FILES['fileToUpload']['name'];
                        $target="../uploadImage/uploadImageOfUser/".$_FILES['fileToUpload']['name'];
                        move_uploaded_file($source,$target);
                        echo "photo upload done";

                        include("../databaseConnection/setData/setData.php");
                        $encriptedPassword = md5($_REQUEST["userPassword"]);
                        $formatedDate=date_create($_REQUEST["birthdate"]);
                        $formatedDate= date_format($formatedDate,"d/M/Y");
                        $sqlQuery = "INSERT INTO `user_information` (`email`, `name`, `type`, `password`, `phone_number`, `birthdate`, `gender`, `image_URL`) VALUES ('".$_REQUEST["userEmail"]."', '".$_REQUEST["userName"]."', '".$_REQUEST["category"]."', '".$encriptedPassword."', '".$_REQUEST["userPhoneNumber"]."', '".$formatedDate."', '".$_REQUEST["gender"]."', '".$imageLocation."')";
                        setData($sqlQuery);
                        echo "database done";

                        if(!isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"]!="admin"){
                            if($_REQUEST["category"]=="customer"){
                                $_SESSION["loginStatus"]="customer";
                                header("Location: ..\displayFiles\landingPage.php");
                            }
                            elseif($_REQUEST["category"]=="client"){
                                $_SESSION["loginStatus"]="client";
                                header("Location: ..\displayFiles\clientPanel.php");
                            }
                            $_SESSION["userName"]=$_REQUEST["userName"];
                            $_SESSION["userEmail"]=$_REQUEST["userEmail"];
                        }
                        elseif(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"]=="admin"){
                            header("Location: ..\displayFiles\adminPanel.php");
                        }
                        
                    }
                    else{
                        $msg="password does not match";
                        $_SESSION["registrationError"]=$msg;
                    }
                }
                else{
                    $msg="password must be a minimum of 5 characters";
                    $_SESSION["registrationError"]=$msg;
                }
            }
            else{
                $msg="phone number format error";
                $_SESSION["registrationError"]=$msg;
            }
        }
        else{
            $msg="email format error";
            $_SESSION["registrationError"]=$msg;
        }
    }
    else{
        $msg="User-name format error";
        $_SESSION["registrationError"]=$msg;
    }	

    if(isset($_SESSION["registrationError"])){
        header("Location: ../../project/displayFiles/registrationPage.php");
    }
?>