<?php
	if(isset($_REQUEST["uname"])){
        $sqlQuery="select * from user_information where name like '%".$_REQUEST["uname"]."%'";
        $outerArray=array();
	    include("../databaseConnection/getData/getUserData.php");
        getData($sqlQuery);
		foreach($outerArray as $v){
			echo "<b>id: </b>".$v["id"]."<br/>";
	        echo "<b>email: </b>".$v["email"]."<br/>";
	        echo "<b>name: </b>".$v["name"]."<br/>";
	        echo "<b>gender: </b>".$v["gender"]."<br/>";
	        echo "<b>type: </b>".$v["type"]."<br/>";
			$newid = $v["id"];?>
			<!-- onclick="getId(<?php echo $newid ?>)" -->
            <button><a href="userAccount.php?userUpdateId=<?php echo $v["id"] ?>" >Details</a></button>
            <br/><hr/><br/>
		<?php
		}
		if(sizeof($outerArray)==0)
			echo "Not found";
    }
    else {
        $sqlQuery="select * from user_information";
        $outerArray=array();
	    include("../databaseConnection/getData/getUserData.php");
        getData($sqlQuery);
		foreach($outerArray as $v){
			echo "<b>id: </b>".$v["id"]."<br/>";
	        echo "<b>email: </b>".$v["email"]."<br/>";
	        echo "<b>name: </b>".$v["name"]."<br/>";
	        echo "<b>gender: </b>".$v["gender"]."<br/>";
	        echo "<b>type: </b>".$v["type"]."<br/>";
	        $newid = $v["id"];?>
            <button><a href="userAccount.php?userUpdateId=<?php echo $v["id"] ?>" >Details</a></button>
            <br/><hr/><br/>
            <?php
        }
    }
?>