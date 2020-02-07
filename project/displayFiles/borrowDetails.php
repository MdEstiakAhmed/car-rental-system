<!DOCTYPE html>
<html>
    <head>
        <title>borrow details</title>
    </head>
    <body>
        
        <?php
            session_start();
            if(isset($_SESSION["loginStatus"])){
                include("header.php");
                if(isset($_SESSION["userId"])){
                    $carId="";
                    $outerArray=array();
                    include("../databaseConnection/getData/getBorrowData.php");
                    $sqlQuery="select * from borrow_information where user_id='".$_SESSION["userId"]."'";
                    getBorrowData($sqlQuery);
    
                    foreach($outerArray as $key){
                        $carId=$key["vehicle_id"];
            ?>
                        <div>
                            <h1>borrow details</h1>
                            <b>borrow_id:</b><?php echo $key["borrow_id"] ?><br>
                            <b>user_id:</b><?php echo $key["user_id"] ?><br>
                            <b>destination:</b><?php echo $key["destination"] ?><br>
                            <b>driving_option:</b><?php echo $key["driving_option"] ?><br>
                            <b>user_license_number:</b><?php echo $key["user_license_number"] ?><br>
                            <b>travel_start_date:</b><?php echo $key["travel_start_date"] ?><br>
                            <b>travel_end_date:</b><?php echo $key["travel_end_date"] ?><br>
                            <b>total_cost:</b><?php echo $key["total_cost"] ?><br>
                            <b>borrow_status:</b><?php echo $key["borrow_status"] ?><br>
                            <b>vehicle_category:</b><?php echo $key["vehicle_category"] ?><br>
                            <b>vehicle_id:</b><?php echo $key["vehicle_id"] ?><br>
                        <div>
            <?php
                    }
                }
                else{
                    header("Location: ../displayFiles/landingPage.php");
                }
            }
            else{
                header("Location: ../displayFiles/landingPage.php");
            }
        ?>
    </body>
</html>