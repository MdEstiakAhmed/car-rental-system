<?php
    session_start();
    function costAnalysis(){
        $categoryCost="";
        $destinationCost="";
        $drivingCost="";
        $durationCost="";

        $category=$_REQUEST["vehicleCategory"];
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
            case 'inside-Dhaka':
                $destinationCost=1000;
                break;
            case 'outside-Dhaka':
                $destinationCost=2000;
                break;
            
            default:
                $destinationCost=0;
                break;
        }
        $drivingOption=$_REQUEST["drivingOption"];
        switch ($drivingOption) {
            case 'self-Driving':
                $drivingCost=500;
                break;
            case 'with-Driver':
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
        $costArray = array($categoryCost,$destinationCost,$drivingCost,$durationCost);
        return $totalcost;     
    }
    if($_REQUEST["vehicleCategory"]!=""){
        if($_REQUEST["destination"]!=""){
            if($_REQUEST["drivingOption"]!=""){
                if($_REQUEST["staringDate"]!=""){
                    if($_REQUEST["endingDate"]!=""){
                        $cost=costAnalysis();
                        $_SESSION["temporaryCostSHow"]="yes";
                        $_SESSION["temporaryCost"]=$cost;
                        $_SESSION["temporaryCategory"]=$_REQUEST["vehicleCategory"];
                        $_SESSION["temporaryDestination"]=$_REQUEST["destination"];
                        $_SESSION["temporaryDrivingOption"]=$_REQUEST["drivingOption"];
                        $_SESSION["temporaryStartDate"]=$_REQUEST["staringDate"];
                        $_SESSION["temporaryEndDate"]=$_REQUEST["endingDate"];
                        header("Location: ..\displayFiles\costAnalysis.php");
                    }
                    else{
                        $msg="ending date empty";
                        $_SESSION["costerror"]=$msg;
                    }
                }
                else{
                    $msg="starting date empty";
                    $_SESSION["costerror"]=$msg;
                }
            }
            else{
                $msg="driving option empty date empty";
                $_SESSION["costerror"]=$msg;
            }
        }
        else{
            $msg="destination date empty";
            $_SESSION["costerror"]=$msg;
        }
    }
    else{
        $msg="category date empty";
        $_SESSION["costerror"]=$msg;
    }
    if(isset($_SESSION["costerror"])){
        header("Location: ../displayFiles/costAnalysis.php");
    }
?>