<?php
    function getData($query){
        global $outerArray;
        $connection = mysqli_connect("localhost", "root", "","vehicle_rental_system");
        $result = mysqli_query($connection, $query)or die(mysqli_error($connection));
        while($tableRow = mysqli_fetch_assoc($result)) {
            $outerArray[$tableRow["id"]]=$tableRow;
        }
        mysqli_close($connection);
    }
?>