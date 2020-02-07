<?php
    session_start();
    if($_REQUEST["uname"]!=""){
        $name = $_REQUEST["uname"];
        if (preg_match("/^[a-zA-Z ]*$/",$name)){
            $phone =$_REQUEST["userPhoneNumber"];
            $first3Digit = substr($phone,0,3);
            $length = strlen($phone);
            if ($length == 11 && ($first3Digit =="017" || $first3Digit =="019" || $first3Digit =="015" || $first3Digit =="016")){
                if($_REQUEST["pass"]!=""){
                    $x = strlen($_REQUEST["pass"]);
                    if($x >= 5){
                        if($_REQUEST["pass"]==$_REQUEST["conpass"]){
                            $encriptedPassword = md5($_REQUEST["pass"]);
                            include("../databaseConnection/setData/setData.php");
                            $sqlQuery="UPDATE `user_information` SET `name` = '".$_REQUEST["uname"]."', `phone_number` = '".$_REQUEST["userPhoneNumber"]."', `password` = '".$encriptedPassword."' WHERE `user_information`.`id` = '".$_SESSION["updateId"]."';";
                            setData($sqlQuery);
                            $msg="successfully updated";
                            $_SESSION["userupdate"]=$msg;
                            if($_SESSION["loginStatus"]=="customer"){
                                $_SESSION["userName"]=$_REQUEST["uname"];
                            }
                            
                            header("Location: ..\..\project\displayFiles\userAccount.php");
                        }
                        else{
                            $msg="password doesn't match";
                            $_SESSION["userUpdateError"]=$msg;
                        }
                    }
                    else{
                        $msg="password is too small";
                        $_SESSION["userUpdateError"]=$msg;
                    }
                }
                else{
                    $msg="password field empty";
                    $_SESSION["userUpdateError"]=$msg;
                }
            }
            else {
                $msg="phone number error";
                $_SESSION["userUpdateError"]=$msg;
            }
        }
        else{
            $msg="username format error";
            $_SESSION["userUpdateError"]=$msg;
        }
    }
    else{
        $msg="user name feild empty";
        $_SESSION["userUpdateError"]=$msg;
    }
    if(isset($_SESSION["userUpdateError"])){
        header("Location: ../../project/displayFiles/manegeUser.php");
    }
?>