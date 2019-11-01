<?php
    session_start();
    $file=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
    $data=array();
    $status="";
    while($c=fgets($file)){
        if($c!="\r\n"){
            $ar=explode("-",$c);
            $dar["vehicleID"]=$ar[0];
            $dar["ownermail"]=$ar[1];
            $dar["vehicleCategory"]=$ar[2];
            $dar["company"]=$ar[3];
            $dar["vehicleLicense"]=$ar[4];
            $dar["vehicleLicenseDate"]=$ar[5];
            $dar["seat"]=$ar[6];
            $dar["color"]=$ar[7];
            $dar["power"]=$ar[8];
            $dar["vehicleImageLink"]=$ar[9];
            $dar["status"]=$ar[10];
            $data[$dar["vehicleID"]]=$dar;
        }
    }

    foreach($data as $v){ 
        if($v["vehicleID"]==$_SESSION["vehicleID"]){
            $data[$v["vehicleID"]]["vehicleLicenseDate"]=$_REQUEST["licenseday"]."/".$_REQUEST["licensemonth"]."/".$_REQUEST["licenseyear"];
            $data[$v["vehicleID"]]["color"]=$_REQUEST["color"];
            $data[$v["vehicleID"]]["status"]=$_REQUEST["status"];
        }
    }

    $file=fopen('..\..\project\dataSet\vehicleRegistrationData.txt','w') or die("fle open error");
    foreach ($data as $k) {
        fwrite($file,"\r\n");
        fwrite($file,$k["vehicleID"]);
        fwrite($file,"-");
        fwrite($file,$k["ownermail"]);
        fwrite($file,"-");
        fwrite($file,$k["vehicleCategory"]);
        fwrite($file,"-");
        fwrite($file,$k["company"]);
        fwrite($file,"-");
        fwrite($file,$k["vehicleLicense"]);
        fwrite($file,"-");
        fwrite($file,$k["vehicleLicenseDate"]);
        fwrite($file,"-");
        fwrite($file,$k["seat"]);
        fwrite($file,"-");
        fwrite($file,$k["color"]);
        fwrite($file,"-");
        fwrite($file,$k["power"]);
        fwrite($file,"-");
        fwrite($file,$k["vehicleImageLink"]);
        fwrite($file,"-");
        fwrite($file,trim($k["status"]));
        $msg="successfully updated";
        $_SESSION["vehicleupdate"]=$msg;
        header("Location: ..\..\project\HTMLFiles\manegeVehicle.php");
    }   
?>
