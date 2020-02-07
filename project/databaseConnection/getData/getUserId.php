<?php
    $data=array();
    include("getUserData.php");
    $sql="select * from user_information where id='".$_REQUEST["userName"]."'";
    getData($sql);
    foreach($data as $v){
        $_SESSION["usernameForAdmin"]=$v["name"];
    }
?>