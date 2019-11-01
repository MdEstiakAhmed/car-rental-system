<!DOCTYPE html>
<html>
    <head>
        <title>check vehicle registration</title>
    </head>
    <body>
        <?php
            function idGenerator(){
                $file=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
                $data=array();
                while($c=fgets($file)){
                    $ar=explode("-",$c);
                    $dar[]=$ar[0];
                }
                $flag=0;
                $id=uniqid();
                foreach ($dar as $key) {
                    if($key==$id){
                        $flag=1;
                    }
                }
                if($flag==0){
                    return $id;
                }
                else{
                    idGenerator();
                }
            }
        ?>
        <?php
            session_start();
            echo $_SESSION["useremail"];
            $file=fopen('..\..\project\dataSet\vehicleRegistrationData.txt','a') or die("fle open error");
            if($_REQUEST["categorytype"]!=""){
                if($_REQUEST["company"]!=""){
                    if($_REQUEST["city"]!=""){
                        if($_REQUEST["category"]!=""){
                            if($_REQUEST["first2number"]!=""){
                                if(strlen($_REQUEST["first2number"])==2){
                                    if($_REQUEST["last4number"]!=""){
                                        if(strlen($_REQUEST["last4number"])==4){
                                            if($_REQUEST["licenseday"]!=""){
                                                if($_REQUEST["licensemonth"]!=""){
                                                    if($_REQUEST["licenseyear"]!=""){
                                                        if($_REQUEST["seatnumber"]!=""){
                                                            if($_REQUEST["seatnumber"]<12){
                                                                if($_REQUEST["color"]!=""){
                                                                    if($_REQUEST["power"]!=""){
                                                                        $source=$_FILES['fileToUpload']['tmp_name'];
                                                                        $imageLocation="uploadImage/uploadImageOfVehicle/".$_FILES['fileToUpload']['name'];
                                                                        $target="../uploadImage/uploadImageOfVehicle/".$_FILES['fileToUpload']['name'];
                                                                        if(move_uploaded_file($source,$target)){
                                                                            fwrite($file,"\r\n");
                                                                            $x=idGenerator();
                                                                            fwrite($file,$x);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_SESSION["useremail"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["categorytype"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["company"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["city"]);
                                                                            fwrite($file," metro ");
                                                                            fwrite($file,$_REQUEST["category"]);
                                                                            fwrite($file," ");
                                                                            fwrite($file,$_REQUEST["first2number"]);
                                                                            fwrite($file,"/");
                                                                            fwrite($file,$_REQUEST["last4number"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["licenseday"]);
                                                                            fwrite($file,"/");
                                                                            fwrite($file,$_REQUEST["licensemonth"]);
                                                                            fwrite($file,"/");
                                                                            fwrite($file,$_REQUEST["licenseyear"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["seatnumber"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["color"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$_REQUEST["power"]);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,$imageLocation);
                                                                            fwrite($file,"-");
                                                                            fwrite($file,"available");
                                                                            if(isset($_SESSION["adminlogin"])){
                                                                                header("Location: ..\..\project\HTMLFiles\adminPanel.php");
                                                                            }
                                                                            elseif(isset($_SESSION["clientlogin"])){
                                                                                header("Location: ..\..\project\HTMLFiles\clientPanel.php");
                                                                            }
                                                                        }
                                                                        else{
                                                                            $msg="file not uploaded";
                                                                            $_SESSION["vehicleRegistrationError"]=$msg;
                                                                        }
                                                                    }
                                                                    else{
                                                                        $msg="select hourse power";
                                                                        $_SESSION["vehicleRegistrationError"]=$msg;
                                                                    }
                                                                }
                                                                else{
                                                                    $msg="select vehicle color";
                                                                    $_SESSION["vehicleRegistrationError"]=$msg;
                                                                }
                                                            }
                                                            else{
                                                                $msg="vehile seat limit over";
                                                                $_SESSION["vehicleRegistrationError"]=$msg;
                                                            }
                                                        }
                                                        else{
                                                            $msg="seelct vehicle seat number";
                                                            $_SESSION["vehicleRegistrationError"]=$msg;
                                                        }
                                                    }
                                                    else{
                                                        $msg="select license year";
                                                        $_SESSION["vehicleRegistrationError"]=$msg;
                                                    }
                                                }
                                                else{
                                                    $msg="select license month";
                                                    $_SESSION["vehicleRegistrationError"]=$msg;
                                                }
                                            }
                                            else{
                                                $msg="select license day";
                                                $_SESSION["vehicleRegistrationError"]=$msg;
                                            }
                                        }
                                        else{
                                            $msg="vehicle last four digit error";
                                            $_SESSION["vehicleRegistrationError"]=$msg;
                                        }
                                    }
                                    else{
                                        $msg="enter last four digit of vehicle number";
                                        $_SESSION["vehicleRegistrationError"]=$msg;
                                    }
                                }
                                else{
                                    $msg="vehicle last two digit error";
                                    $_SESSION["vehicleRegistrationError"]=$msg;
                                }
                            }
                            else{
                                $msg="enter last two digit of vehicle number";
                                $_SESSION["vehicleRegistrationError"]=$msg;
                            }
                        }
                        else{
                            $msg="select category of vehilce number";
                            $_SESSION["vehicleRegistrationError"]=$msg;
                        }
                    }
                    else{
                        $msg="select city of vehicle number";
                        $_SESSION["vehicleRegistrationError"]=$msg;
                    }
                }
                else{
                    $msg="select vehile company";
                    $_SESSION["vehicleRegistrationError"]=$msg;
                }
            }
            else{
                $msg="select vehile category";
                $_SESSION["vehicleRegistrationError"]=$msg;
            }
            if(isset($_SESSION["vehicleRegistrationError"])){
                header("Location: ../../project/HTMLFiles/addVehicle.php");
            }
        ?>
    </body>
</html>