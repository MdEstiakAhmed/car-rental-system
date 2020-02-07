<?php
    if(isset($_REQUEST["email"])){
        $sqlQuery="select * from user_information where email = '".$_REQUEST["email"]."'";
        $outerArray=array();
	    include("../databaseConnection/getData/getUserData.php");
        getData($sqlQuery);
		if(sizeof($outerArray)==0)
            echo "Valid mail";
        elseif (sizeof($outerArray)!=0) {
            echo "Already taken";
        }
    }
?>