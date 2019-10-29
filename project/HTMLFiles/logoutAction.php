<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION["valid"]="";
        unset($_SESSION["valid"]);
        $_SESSION["loginStatus"]="";
        unset($_SESSION["loginStatus"]);
        $_SESSION["name"]="";
        unset($_SESSION["name"]);
        $_SESSION["useremail"]="";
        unset($_SESSION["useremail"]);
        $_SESSION["adminlogin"]="";
        unset($_SESSION["adminlogin"]);
        $_SESSION["clientlogin"]="";
        unset($_SESSION["clientlogin"]);
        header("Location: ..\..\project\HTMLFiles\landingPage.php");
    ?>
</body>
</html>