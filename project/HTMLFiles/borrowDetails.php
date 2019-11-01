<!DOCTYPE html>
<html>
    <head>
        <title>borrow details</title>
    </head>
    <body>
        <h1>borrow details</h1>
        <?php
            session_start();
            $usermail=$_SESSION["useremail"];
            //$borrowID=$_SESSION["borrowID"];
            $vehicleId="";
        ?>
        <?php
            if(isset($_SESSION["useremail"])){
                $file=fopen("../dataSet/borrowRequestData.txt","r") or die("file error");
                $data=array();
                while($c=fgets($file)){
                    if($c!="\r\n"){
                        $ar=explode("_",$c);
                        $dar["borrowId"]=$ar[0];
                        $dar["userMail"]=$ar[1];
                        $dar["vehicleId"]=$ar[2];
                        $dar["startingdate"]=$ar[3];
                        $dar["endingDate"]=$ar[4];
                        $dar["location"]=$ar[5];
                        $dar["driving"]=$ar[6];
                        $dar["cost"]=$ar[7];
                        $dar["status"]=$ar[8];
                        $data[]=$dar;
                    }
                }
                $file1=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
                $data1=array();
                while($c1=fgets($file1)){
                    if($c!="\r\n"){
                        $ar1=explode("-",$c1);
                        $dar1["vehicleID"]=$ar1[0];
                        $dar1["vehicleCategory"]=$ar1[2];
                        $dar1["company"]=$ar1[3];
                        $dar1["vehicleImageLink"]=$ar1[9];
                        $dar1["seat"]=$ar1[6];
                        $data1[]=$dar1;
                    }
                }
                foreach($data as $v){
                    if($v["userMail"]==$usermail){
                        $vehicleId=$v["vehicleId"];
                        foreach($data1 as $v1){ 
                            if($v1["vehicleID"]==$vehicleId){?>
                                <img src=<?php echo "../".$v1["vehicleImageLink"] ?> alt="Vehicle Image" height="200" width="200"><br/>
                                <span><strong>Vehicle ID:</strong></span><span><?php echo $v1["vehicleID"] ?></span><br/>
                                <span><strong>vehicle category:</strong></span><span><?php echo $v1["vehicleCategory"] ?></span><br/>
                                <span><strong>company:</strong></span><span><?php echo $v1["company"] ?></span><br/>
                                <span><strong>Total seat:</strong></span><span><?php echo $v1["seat"] ?></span><br/>
                                <span><strong>Borrow ID:</strong></span><span><?php echo $v["borrowId"] ?></span><br/>
                                <span><strong>User Mail:</strong></span><span><?php echo $v["userMail"] ?></span><br/>
                                <span><strong>location type:</strong></span><span><?php echo $v["location"] ?></span><br/>
                                <span><strong>driving type:</strong></span><span><?php echo $v["driving"] ?></span><br/>
                                <span><strong>starting date:</strong></span><span><?php echo $v["startingdate"] ?></span><br/>
                                <span><strong>ending date:</strong></span><span><?php echo $v["endingDate"] ?></span><br/>
                                <span><strong>Total cost:</strong></span><span><?php echo $v["cost"] ?></span><br/>
                                <span><strong>Status:</strong></span><span><?php echo $v["status"] ?></span><br/>
                                <button><a href="landingPage.php">Home</a></button>
                                <button><a href="logoutAction.php">logout</a></button>
        <?php
                            }
                        }
                    }
                }
            }
        ?>
    </body>
</html>