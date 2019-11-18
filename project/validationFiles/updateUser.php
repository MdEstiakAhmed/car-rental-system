<?php
    session_start();
    if($_REQUEST["uname"]!=""){
        $name = $_REQUEST["uname"];
        if (preg_match("/^[a-zA-Z ]*$/",$name)){
            if($_REQUEST["pass"]!=""){
                $x = strlen($_REQUEST["pass"]);
                if($x >= 8){
                    if($_REQUEST["pass"]==$_REQUEST["conpass"]){
                        $file=fopen("../dataSet/userRegistrationData.txt","r") or die("file error");
                        $data=array();
                        $status="";
                        while($c=fgets($file)){
                            if($c!="\r\n"){
                                $ar=explode("-",$c);
                                $dar["usermail"]=$ar[0];
                                $dar["username"]=$ar[1];
                                $dar["birthdate"]=$ar[2];
                                $dar["gender"]=$ar[3];
                                $dar["password"]=$ar[4];
                                $dar["usertype"]=$ar[5];
                                $dar["userimagelink"]=$ar[6];
                                $data[$dar["usermail"]]=$dar;
                            }
                        }
                        foreach($data as $v){ 
                            if($v["usermail"]==$_SESSION["useremail"]){
                                $data[$v["usermail"]]["username"]=$_REQUEST["uname"];
                                $data[$v["usermail"]]["password"]=md5($_REQUEST["pass"]);
                                $_SESSION["name"]=$_REQUEST["uname"];
                            }
                        }
                        $file=fopen('..\..\project\dataSet\userRegistrationData.txt','w') or die("file open error");
                        foreach ($data as $k) {
                            fwrite($file,"\r\n");
                            fwrite($file,$k["usermail"]);
                            fwrite($file,"-");
                            fwrite($file,$k["username"]);
                            fwrite($file,"-");
                            fwrite($file,$k["birthdate"]);
                            fwrite($file,"-");
                            fwrite($file,$k["gender"]);
                            fwrite($file,"-");
                            fwrite($file,$k["password"]);
                            fwrite($file,"-");
                            fwrite($file,$k["usertype"]);
                            fwrite($file,"-");
                            fwrite($file,trim($k["userimagelink"]));
                        } 
                        $msg="successfully updated";
                        $_SESSION["userupdate"]=$msg;

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