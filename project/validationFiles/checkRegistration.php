<!DOCTYPE html>
<html>
    <head>
        <title>check registration</title>
    </head>
    <body>
        <?php
            session_start();
            $file=fopen('..\..\project\dataSet\userRegistrationData.txt','a') or die("fle open error");
            if($_REQUEST["uname"]!=""){
                $name = $_REQUEST["uname"];
                if (preg_match("/^[a-zA-Z ]*$/",$name)){
                    if($_REQUEST["email"]!=""){
                        $email =$_REQUEST["email"];
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                            if($_REQUEST["day"]!=""){
                                if($_REQUEST["month"]!=""){
                                    if($_REQUEST["year"]!=""){
                                        if($_REQUEST["gender"]!=""){
                                            if($_REQUEST["pass"]!=""){
                                                $x = strlen($_REQUEST["pass"]);
                                                if($x >= 8){
                                                    if($_REQUEST["category"]!=""){
                                                        if($_REQUEST["pass"]==$_REQUEST["conpass"]){
                                                            $c=$c+fwrite($file,"\r\n");
                                                            $c=$c+fwrite($file,$_REQUEST["email"]);
                                                            $c=$c+fwrite($file,"-");
                                                            $c=$c+fwrite($file,$_REQUEST["uname"]);
                                                            $c=$c+fwrite($file,"-");
                                                            $c=$c+fwrite($file,$_REQUEST["day"]);
                                                            $c=$c+fwrite($file,"/");
                                                            $c=$c+fwrite($file,$_REQUEST["month"]);
                                                            $c=$c+fwrite($file,"/");
                                                            $c=$c+fwrite($file,$_REQUEST["year"]);
                                                            $c=$c+fwrite($file,"-");
                                                            $c=$c+fwrite($file,$_REQUEST["gender"]);
                                                            $c=$c+fwrite($file,"-");
                                                            $c=$c+fwrite($file,md5($_REQUEST["pass"]));
                                                            $c=$c+fwrite($file,"-");
                                                            $c=$c+fwrite($file,$_REQUEST["category"]);
                                                            if($_REQUEST["category"]=="customer"){
                                                                $_SESSION["loginStatus"]="yes";
                                                                $_SESSION["name"]=$_REQUEST["uname"];
                                                                header("Location: ..\..\project\HTMLFiles\landingPage.php");
                                                            }
                                                            elseif($_REQUEST["category"]=="client"){
                                                                header("Location: ..\..\project\HTMLFiles\clientPanel.php");
                                                            }
                                                            elseif($_REQUEST["category"]=="admin"){
                                                                header("Location: ..\..\project\HTMLFiles\adminPanel.php");
                                                            }
                                                        }
                                                        else{
                                                            $msg="password does not match";
                                                            $_SESSION["registrationError"]=$msg;
                                                        }
                                                    }
                                                    else{
                                                        $msg="select user category";
                                                        $_SESSION["registrationError"]=$msg;
                                                    }
                                                }
                                                else{
                                                    $msg="password must be a minimum of 8 characters";
                                                    $_SESSION["registrationError"]=$msg;
                                                }
                                            }
                                            else{
                                                $msg="password empty";
                                                $_SESSION["registrationError"]=$msg;
                                            }
                                        }
                                        else{
                                            $msg="select your gender";
                                            $_SESSION["registrationError"]=$msg;
                                        }
                                    }
                                    else{
                                        $msg="select you birthdate year";
                                        $_SESSION["registrationError"]=$msg;
                                    }
                                }
                                else{
                                    $msg="select you birthdate month";
                                    $_SESSION["registrationError"]=$msg;
                                }
                            }
                            else{
                                $msg="select you birthdate day";
                                $_SESSION["registrationError"]=$msg;
                            }
                        }
                        else{
                            $msg="email format error";
                            $_SESSION["registrationError"]=$msg;
                        }
                    }
                    else{
                        $msg="enter your email";
                        $_SESSION["registrationError"]=$msg;
                    }
                }
				else{
                    $msg="User-name format error";
                    $_SESSION["registrationError"]=$msg;
                }	
			}
			else{
                $msg="user-name empty";
                $_SESSION["registrationError"]=$msg;
            }
            if(isset($_SESSION["registrationError"])){
                header("Location: ../../project/HTMLFiles/registrationPage.php");
            }
        ?>
    </body>
</html>