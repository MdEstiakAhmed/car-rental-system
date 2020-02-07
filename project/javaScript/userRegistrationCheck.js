console.log("hello");


var username=document.getElementById("username");
var email=document.getElementById("email");
var number=document.getElementById("number");
var category=document.getElementById("category");
var birthdate=document.getElementById("birthdate");
var gender=document.registerForm.gender;
var file=document.registerForm.fileToUpload;
var password=document.getElementById("password");
var confirmPassword=document.getElementById("confirmPassword");

var errorName = document.getElementById("errorName");
var errorEmail = document.getElementById("errorEmail");
var errorNumber = document.getElementById("errorNumber");
var errorCategory = document.getElementById("errorCategory");
var errorBirthdate = document.getElementById("errorBirthdate");
var errorGender = document.getElementById("errorGender");
var errorFile = document.getElementById("errorFile");
var errorPassword = document.getElementById("errorPassword");
var errorConfirmPassowrd = document.getElementById("errorConfirmPassowrd");



function checkName(){
    if(username.value==""){
        username.style.color="red";
        errorName.innerHTML="invalid name";
    }
    else if(!(/([a-zA-Z])$/.test(username.value))){
        username.style.color="red";
        errorName.innerHTML="invalid name";
    }
    else{
        username.style.color="black";
        errorName.innerHTML="";
    }
}



function checkEmail(){
    if(email.value==""){
        email.style.color="red";
        errorEmail.innerHTML="invalid email";
    }
    else if(!(/[a-z0-9._-]+@[a-z]+\.[a-z]{2,4}$/.test(email.value))){
        email.style.color="red";
        errorEmail.innerHTML="invalid email";
    }
    else{
        emailExist();
        console.log("hello");
        email.style.color="black";
        errorEmail.innerHTML="";
    }
}
function emailExist(){
    var xmlhttp = new XMLHttpRequest();
    console.log("yes");
    var str=email.value;
    xmlhttp.onreadystatechange = function() {		
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
            errorEmail.innerHTML=xmlhttp.responseText;
            console.log(xmlhttp.responseText);
        }
    };
    var url="";
    url="../validationFiles/mailCheckAJAX.php?email="+str;
    console.log(url);
    xmlhttp.open("GET", url,true);
    xmlhttp.send();
}

function checkNumber(){
    if(number.value==""){
        number.style.color="red";
        errorNumber.innerHTML="invalid number";
    }
    else if(!(/(017|019|015|016|018|014|013)+[0-9]{8}$/.test(number.value))){
        number.style.color="red";
        errorNumber.innerHTML="invalid number";
    }
    else{
        number.style.color="black";
        errorNumber.innerHTML="";
    }
}

function checkCategory(){
    if(category.value==""){
        category.style.border="2px solid red";
        errorCategory.innerHTML="empty category";
    }
    else{
        category.style.border="none";
        errorCategory.innerHTML="";
    }
}

function checkBirthdate(){
    if(birthdate.value==""){
        birthdate.style.border="2px solid red";
        errorBirthdate.innerHTML="empty birthdate";
    }
    else{
        birthdate.style.border="none";
        errorBirthdate.innerHTML="";
    }
}

function checkPassword(){
    if(password.value==""){
        password.style.color="red";
        errorPassword.innerHTML="invalid password";
    }
    else if(password.value.length<5){
        password.style.color="red";
        errorPassword.innerHTML="invalid password";
    }
    else{
        password.style.color="black";
        errorPassword.innerHTML="";
    }
}

function checkConfirmPassword(){
    if(password.value==confirmPassword.value){
        confirmPassword.style.color="black";
        errorConfirmPassowrd.innerHTML="";
    }
    else{
        confirmPassword.style.color="red";
        errorConfirmPassowrd.innerHTML="invalid password";
    }
}

function check(){
    if(username.value!="" && (/([a-zA-Z])$/.test(username.value))){
        errorName.innerHTML="";
        username.style.border="1px solid green";
        if(email.value!="" && (/[a-z0-9._-]+@[a-z]+\.[a-z]{2,4}$/.test(email.value))){
            errorEmail.innerHTML="";
            email.style.border="1px solid green";
            if(number.value!="" && (/(017|019|015|016|018|014|013)+[0-9]{8}$/.test(number.value))){
                errorNumber.innerHTML="";
                number.style.border="1px solid green";
                if(category.value!=""){
                    errorCategory.innerHTML="";
                    category.style.border="1px solid green";
                    if(birthdate.value!=""){
                        errorBirthdate.innerHTML="";
                        birthdate.style.border="1px solid green";
                        if(gender.value!=""){
                            errorGender.innerHTML="";
                            if(file.value!=""){
                                errorFile.innerHTML="";
                                if(password.value!="" && password.value.length>=5){
                                    errorPassword.innerHTML="";
                                    password.style.border="1px solid green";
                                    if(password.value==confirmPassword.value){
                                        errorConfirmPassowrd.innerHTML="";
                                        confirmPassword.style.border="1px solid green";
                                        return true;
                                    }
                                    else{
                                        errorConfirmPassowrd.innerHTML="password doesnot match";
                                        return false;
                                    }
                                }
                                else{
                                    errorPassword.innerHTML="password format error";
                                    return false;
                                }
                            }
                            else{
                                errorFile.innerHTML="file empty";
                                return false;
                            }
                        }
                        else{
                            errorGender.innerHTML="gender empty";
                            return false;
                        }
                    }
                    else{
                        errorBirthdate.innerHTML="birthdate empty";
                        return false;
                    }
                }
                else{
                    errorCategory.innerHTML="category empty";
                    return false;
                }
            }
            else{
                errorNumber.innerHTML="number format error";
                return false;
            }
        }
        else{
            errorEmail.innerHTML="email format error";
            return false;
        }
    }
    else{
        errorName.innerHTML="name format error";
        return false;
    }
}