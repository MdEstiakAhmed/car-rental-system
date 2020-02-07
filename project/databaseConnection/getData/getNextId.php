<?php
    function getData($query){
        $connection = mysqli_connect("localhost", "root", "","vehicle_rental_system");
        if(mysqli_query($connection, $query)){
            $result = mysqli_query($connection, $query);
            while($tableRow = mysqli_fetch_assoc($result)) {
                $id=$tableRow["id"];
            }
            $_SESSION["sqlInsert"]="seccessfully done";
            return $id;
        }
        else{
            $_SESSION["sqlError"]=mysqli_error($connection);
            echo $_SESSION["sqlError"];
            return null;
        }
        mysqli_close($connection);
    }
?>