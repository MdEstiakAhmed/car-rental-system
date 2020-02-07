<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="../design/adminPageDesign.css">
        <link rel="stylesheet" href="../design/footerDesign.css">
        
        <script>
            var xmlhttp = new XMLHttpRequest();
            function showHint(el) {
                console.log("yes");
                var str=el.value;
                xmlhttp.onreadystatechange = function() {		
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
                        var m=document.getElementById("txtHint");
                        m.innerHTML=xmlhttp.responseText;
                    }
                };
                var url="";
                url="../validationFiles/requestFromAJAX.php?uname="+str;
                console.log(url);
                xmlhttp.open("GET", url,true);
                xmlhttp.send();
            }
            function withoutShowHint() {
                console.log("yes");
                xmlhttp.onreadystatechange = function() {		
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
                        var m=document.getElementById("txtHint");
                        m.innerHTML=xmlhttp.responseText;
                    }
                };
                var url="";
                url="../validationFiles/requestFromAJAX.php";
                console.log(url);
                xmlhttp.open("GET", url,true);
                xmlhttp.send();
            }
        </script>
        
    </head>
    <body onload="withoutShowHint()">
        <?php
            if(isset($_COOKIE["loginStatus"])){
                if($_COOKIE["loginStatus"]=="admin"){
                    include("adminHeader.php");
                }?>
                <form style="text-align:center;" name="searchUser">
                    <input type="text" name="userName" id="name" onkeyup="showHint(this)" placeholder="Enter username" style="width:500px; height:30px;" required/>
                </form>
                <p id="txtHint"></p>
                <?php
                

                include("footer.html");
            }
            else {
                header("Location: landingPage.php");
            }
        ?>
    </body>
</html>