<!DOCTYPE html>
<html>
    <head>
        <title>check vehicle registration</title>
    </head>
    <body>
        <?php
            session_start();
            function costAnalysis(){
                $categoryCost="";
                $destinationCost="";
                $drivingCost="";
                $durationCost="";

                $category=$_SESSION["vehicleCategory"];
                switch ($category) {
                    case 'standard':
                        $categoryCost=1000;
                        break;
                    case 'suv':
                        $categoryCost=1200;
                        break;
                    case 'compact':
                        $categoryCost=800;
                        break;
                    case 'minivan':
                        $categoryCost=1500;
                        break;
                    case 'microvan':
                        $categoryCost=2000;
                        break;
                    
                    default:
                        $categoryCost=0;
                        break;
                }
                $destination=$_REQUEST["destination"];
                switch ($destination) {
                    case 'insideDhaka':
                        $destinationCost=1000;
                        break;
                    case 'outsideDhaka':
                        $destinationCost=2000;
                        break;
                    
                    default:
                        $destinationCost=0;
                        break;
                }
                $drivingOption=$_REQUEST["drivingOption"];
                switch ($drivingOption) {
                    case 'selfDriving':
                        $drivingCost=500;
                        break;
                    case 'withDriver':
                        $drivingCost=2000;
                        break;
                    
                    default:
                        $drivingCost=0;
                        break;
                }
                $date2=date_create($_REQUEST["endingDate"]);
                $date1=date_create($_REQUEST["staringDate"]);
                date_format($date2,"m/d/Y");
                date_format($date1,"m/d/Y");
                $duration=date_diff($date2,$date1);
                $duration=$duration->format("%a");
                $durationCost=$duration*1500;

                $totalcost = $categoryCost + $destinationCost + $drivingCost + $durationCost;
                //$costArray = array($categoryCost,$destinationCost,$drivingCost,$durationCost);
                return $totalcost;

                
            }
            function idGenerator(){
                $file=fopen("../dataSet/borrowRequestData.txt","r") or die("file error");
                $dar=array();
                while($c=fgets($file)){
                    $ar=explode("-",$c);
                    $dar[]=$ar[0];
                }
                $flag=0;
                $id=uniqid();
                foreach ($dar as $key){
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
            $file1=fopen("../dataSet/vehicleRegistrationData.txt","r") or die("file error");
            $data1=array();
            $status="";
			while($c1=fgets($file1)){
                if($c!="\r\n"){
                    $ar1=explode("-",$c1);
                    $dar1["vehicleID"]=$ar1[0];
                    $dar1["status"]=$ar1[10];
                    if($_SESSION["vehicleID"]==$ar1[0]){
                        $status=$ar1[10];
                    }
                    $data1[]=$dar1;
                }
			}
            $file=fopen('..\..\project\dataSet\borrowRequestData.txt','a') or die("fle open error");
            if($status=="available"){
                if($_REQUEST["destination"]!=""){
                    if($_REQUEST["drivingOption"]!=""){
                        if($_REQUEST["drivingLicense"]!=""){
                            if($_REQUEST["staringDate"]!=""){
                                if($_REQUEST["endingDate"]!=""){
                                    fwrite($file,"\r\n");
                                    $borrowID=idGenerator();
                                    fwrite($file,$borrowID);
                                    fwrite($file,"_");
                                    fwrite($file,$_SESSION["useremail"]);
                                    fwrite($file,"_");
                                    fwrite($file,$_SESSION["vehicleID"]);
                                    fwrite($file,"_");
                                    fwrite($file,$_REQUEST["staringDate"]);
                                    fwrite($file,"_");
                                    fwrite($file,$_REQUEST["endingDate"]);
                                    fwrite($file,"_");
                                    fwrite($file,$_REQUEST["destination"]);
                                    fwrite($file,"_");
                                    fwrite($file,$_REQUEST["drivingOption"]);
                                    fwrite($file,"_");
                                    $cost=costAnalysis();
                                    fwrite($file,$cost);
                                    fwrite($file,"_");
                                    fwrite($file,"Pending");
                                    $_SESSION["borrowID"]=$borrowID;
                                    header("Location: ..\..\project\HTMLFiles\borrowDetails.php");
                                }
                                else{
                                    $msg="select ending date";
                                    $_SESSION["vehicleRegistrationError"]=$msg;
                                }
                            }
                            else{
                                $msg="select starting date";
                                $_SESSION["vehicleRegistrationError"]=$msg;
                            }
                        }
                        else{
                            $msg="select driving license";
                            $_SESSION["vehicleRegistrationError"]=$msg;
                        }
                    }
                    else{
                        $msg="select driving option";
                        $_SESSION["vehicleRegistrationError"]=$msg;
                    }
                }
                else{
                    $msg="select destination";
                    $_SESSION["vehicleRegistrationError"]=$msg;
                }
            }
            else{
                $msg="vehicle is not available";
                $_SESSION["vehicleRegistrationError"]=$msg;
            }
            if(isset($_SESSION["vehicleRegistrationError"])){
                header("Location: ../../project/HTMLFiles/borrowRequest.php");
            }
        ?>
    </body>
</html>