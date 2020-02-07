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