<?php
    function getData($query){
        global $outerArray;
        $count="";
        $connection = mysqli_connect("localhost", "root", "","vehicle_rental_system");
        $result = mysqli_query($connection, $query)or die(mysqli_error($connection));
        while($tableRow = mysqli_fetch_assoc($result)) {
            $total=$tableRow["COUNT(*)"];
        }
        mysqli_close($connection);
        return $total;
    }
?>