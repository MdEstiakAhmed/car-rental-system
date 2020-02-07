<?php
    function setData($query){
        global $outerArray;
        $connection = mysqli_connect("localhost", "root", "","vehicle_rental_system");
        if(mysqli_query($connection, $query)){
            $_SESSION["sqlInsert"]="seccessfully added";
        }
        else{
            $_SESSION["sqlError"]=mysqli_error($connection);
            echo $_SESSION["sqlError"];
            //header("Location: ../displayFiles/registrationPage.php");
        }
        mysqli_close($connection);
    }
?>