<!DOCTYPE html>
<html>
    <head>
        <title>check login</title>
    </head>
    <body>
        <?php
            session_start();
            $cred=array();
            $username="";
            $useremail="";
            $userType="";
            $file=fopen("..\..\project\dataSet\userRegistrationData.txt","r") or die("file error");
            while($c=fgets($file)){
                $ar=explode("-",$c);
                if($ar[0]==$_REQUEST["email"]){
                    $username = $ar[1];
                    $userType = trim($ar[5]);
                    $useremail = $ar[0];
                }
                $cred[$ar[0]]=$ar[4];
            }
            
            foreach($cred as $k=>$v){
                if($_REQUEST["email"]==$k && md5($_REQUEST["pass"])==$v){
                    //echo "Login success";
                    $_SESSION["valid"]="yes";
                    $_SESSION["name"]=$username;
                    $_SESSION["useremail"]=$useremail;
                    $flag = 1;
                    break;
                }
            }
            echo $useremail;
            if($flag==0){
                echo "<p style='color:red'>Wrong credentials</p>";
                $_SESSION["worng"]="worng password or username";
                header("Location: ..\..\project\HTMLFiles\loginPage.php");
            }
            elseif($flag==1){
                //echo $userType;
                //echo strlen($userType);
                if(strcmp($userType, "admin")==0){
                    $_SESSION["loginStatus"]="yes";
                    header("Location: ..\..\project\HTMLFiles\adminPanel.php");
                }
                elseif(strcmp($userType, "customer")==0){
                    $_SESSION["loginStatus"]="yes";
                    header("Location: ..\..\project\HTMLFiles\landingPage.php");
                }
                elseif(strcmp($userType, "client")==0){
                    $_SESSION["loginStatus"]="yes";
                    header("Location: ..\..\project\HTMLFiles\clientPanel.php");
                }
            }    
        ?>
    </body>
</html>