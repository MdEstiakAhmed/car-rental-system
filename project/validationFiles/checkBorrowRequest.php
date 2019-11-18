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
                $costArray = array($categoryCost, $destinationCost, $drivingCost, $duration, $durationCost, $totalcost);
                return $costArray;
            }
            function insertRequest(){
                $sqlQuery_getId="SELECT auto_increment AS id FROM `information_schema`.`tables` WHERE table_name = 'borrow_information' AND table_schema = 'vehicle_rental_system'";
                include("../databaseConnection/getData/getNextId.php");
                $id=getData($sqlQuery_getId);
                if($id!=null){
                    $cost=costAnalysis();
                    $sqlQuery_cost="INSERT INTO `borrow_cost_details` (`borrow_id`, `category_cost`, `destination_cost`, `driving_cost`,`total_day`, `duration_cost`, `total_cost`) VALUES ('".$id."', '".$cost[0]."', '".$cost[1]."', '".$cost[2]."', '".$cost[3]."', '".$cost[4]."', '".$cost[5]."')";
                    include("../databaseConnection/setData/setData.php");
                    setData($sqlQuery_cost);

                    $startDate=date_create($_REQUEST["staringDate"]);
                    $startDate=date_format($startDate,"d/M/Y");
                    $endDate=date_create($_REQUEST["endingDate"]);
                    $endDate=date_format($endDate,"d/M/Y");
                    $sqlQuery_borrow = "INSERT INTO `borrow_information` (`vehicle_id`, `user_id`, `vehicle_category`, `destination`, `driving_option`, `user_license_number`, `travel_start_date`, `travel_end_date`, `total_cost`, `borrow_status`) VALUES ('".$_SESSION["vehicleID"]."', '".$_SESSION["userId"]."', '".$_SESSION["vehicleCategory"]."', '".$_REQUEST["destination"]."', '".$_REQUEST["destination"]."', '".$_REQUEST["destination"]."', '".$startDate."', '".$endDate."', '".$cost[5]."', 'pending')";
                    setData($sqlQuery_borrow);

                    $sqlQuery_car_status="UPDATE `vehicle_information` SET `status` = 'unavailable' WHERE `vehicle_information`.`id` = '".$_SESSION["vehicleID"]."';";
                    setData($sqlQuery_car_status);
                }
                else {
                    $_SESSION["sqlError"]="error in database";
                }

                
            }
        ?>
        <?php
            date_default_timezone_set("Asia/dhaka");
            $todayTime=date("d-M-y");
            $startTime=$_REQUEST["staringDate"];
            $endTime=$_REQUEST["endingDate"];
            if(date_create($startTime)>date_create($todayTime) && date_create($endTime)>date_create($todayTime) && date_create($endTime)>=date_create($startTime)){
                if($_REQUEST["drivingOption"]=="selfDriving"){
                    if($_REQUEST["drivingLicense"]!=""){
                        if(preg_match('/([a-zA-Z]{2}[0-9]{7}[a-zA-Z]{1}[0-9]{5})/', $_REQUEST["drivingLicense"])){
                            echo "all ok. have a safe journey";
                            insertRequest();
                        }
                        else{
                            $msg="license error";
                            echo $msg;
                            $_SESSION["vehicleRegistrationError"]=$msg;
                        }
                    }
                    else{
                        $msg="driving license must needed.";
                        echo $msg;
                        $_SESSION["vehicleRegistrationError"]=$msg;
                    }
                }
                elseif($_REQUEST["drivingOption"]=="withDriver"){
                    echo "all ok with driver";
                    insertRequest();
                }
            }
            else {
                $msg="start or ending date error";
                echo $msg;
                $_SESSION["vehicleRegistrationError"]=$msg;
            }
            if(isset($_SESSION["vehicleRegistrationError"])){
                header("Location: ../displayFiles/borrowRequest.php");
            }
            if(isset($_SESSION["sqlError"])){
                header("Location: ../displayFiles/borrowRequest.php");
            }
            if(isset($_SESSION["sqlInsert"])){
                header("Location: ..\displayFiles\borrowDetails.php");
            }
        ?>
    </body>
</html>