<?php
    function getJSONData($sql){
        $connection = mysqli_connect("localhost", "root", "","vehicle_rental_system");
        $result = mysqli_query($connection, $sql)or die(mysqli_error($connection));
        $arr=array();
        while($tableRow = mysqli_fetch_assoc($result)) {
            $arr[$tableRow["id"]]=$tableRow;
        }
        mysqli_close($connection);
        return json_encode($arr);
    }
?>