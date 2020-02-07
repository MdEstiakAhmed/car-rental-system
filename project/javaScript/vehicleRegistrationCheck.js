console.log("hrllo");

var category = document.getElementById("category");
var company = document.getElementById("company");
var numcity = document.getElementById("numcity");
var numcategory = document.getElementById("numcategory");
var numfirst = document.getElementById("numfirst");
var numlast = document.getElementById("numlast");
var date = document.getElementById("date");
var seat = document.getElementById("seat");
var color = document.getElementById("color");
var power = document.getElementById("power");
var file = document.getElementById("file");

var errorcategory = document.getElementById("errorcategory");
var errorcompany = document.getElementById("errorcompany");
var errornumber = document.getElementById("errornumber");
var errorlicensedate = document.getElementById("errorlicensedate");
var errorseat = document.getElementById("errorseat");
var errorcolor = document.getElementById("errorcolor");
var errorpower = document.getElementById("errorpower");
var errorfile = document.getElementById("errorfile");
// console.log(category);
seat.disabled = true;

function checkFirstTwo(){
    if(numfirst.value==""){
        errornumber.style.color="red";
        errornumber.innerHTML="first digit empty";
        return false;
    }
    else if(!(/[0-9]{2}$/.test(numfirst.value))){
        errornumber.style.color="red";
        errornumber.innerHTML="first digit error";
        return false;
    }
    else{
        errornumber.innerHTML="";
        return true;
    }
}

function checkLastFour(){
    if(numlast.value==""){
        errornumber.style.color="red";
        errornumber.innerHTML="last digit empty";
        return false;
    }
    else if(!(/[0-9]{4}$/.test(numlast.value))){
        errornumber.style.color="red";
        errornumber.innerHTML="last digit error";
        return false;
    }
    else{
        errornumber.innerHTML="";
        return true;
    }
}

function checkDate(){
    var todayString = new Date().toLocaleDateString();
    var today = new Date(todayString);
    var other = new Date(date.value);

    if(today < other){
        errorlicensedate.innerHTML="";
        return true;
    }
    else if(today > other){
        errorlicensedate.style.color="red";
        errorlicensedate.innerHTML="invalid date date.";
        return false;
    }
}

function checkseat(){
    console.log(seat);
    if(category.value=="standard"){
        seat.value="5";
    }
    if(category.value=="suv"){
        seat.value="6";
    }
    if(category.value=="compact"){
        seat.value="5";
    }
    if(category.value=="minivan"){
        seat.value="9";
    }
    if(category.value=="microvan"){
        seat.value="12";
    }

}



function check(){
    if(category.value!=""){
        errorcategory.innerHTML="";
        if(company.value!=""){
            errorcompany.innerHTML="";
            if(numcity.value!=""){
                errornumber.innerHTML="";
                if(numcategory.value!=""){
                    errornumber.innerHTML="";
                    if(numfirst.value!=""){
                        errornumber.innerHTML="";
                        if(numlast.value!=""){
                            errornumber.innerHTML="";
                            if(date.value!=""){
                                errorlicensedate.innerHTML="";
                                if(color.value!=""){
                                    errorcolor.innerHTML="";
                                    if(power.value!=""){
                                        errorpower.innerHTML="";
                                        if(file.value!=""){
                                            errorfile.innerHTML="";
                                            if(checkFirstTwo()){
                                                errornumber.innerHTML="";
                                                if(checkLastFour()){
                                                    errornumber.innerHTML="";
                                                    if(checkDate()){
                                                        errorlicensedate.innerHTML="";
                                                        return true;
                                                    }
                                                    else{
                                                        errorlicensedate.style.color="red";
                                                        errorlicensedate.innerHTML="last four digit error";
                                                        return false;
                                                    }
                                                }
                                                else{
                                                    errornumber.style.color="red";
                                                    errornumber.innerHTML="last four digit error";
                                                    return false;
                                                }
                                            }
                                            else{
                                                errornumber.style.color="red";
                                                errornumber.innerHTML="first two digit error";
                                                return false;
                                            }
                                            
                                        }
                                        else{
                                            errorfile.style.color="red";
                                            errorfile.innerHTML="color empty";
                                            return false;
                                        }
                                    }
                                    else{
                                        errorpower.style.color="red";
                                        errorpower.innerHTML="color empty";
                                        return false;
                                    }
                                }
                                else{
                                    errorcolor.style.color="red";
                                    errorcolor.innerHTML="color empty";
                                    return false;
                                }
                            }
                            else{
                                errorlicensedate.style.color="red";
                                errorlicensedate.innerHTML="license date empty";
                                return false;
                            }
                        }
                        else{
                            errornumber.style.color="red";
                            errornumber.innerHTML="last 4 digit empty";
                            return false;
                        }
                    }
                    else{
                        errornumber.style.color="red";
                        errornumber.innerHTML="first digit empty";
                        return false;
                    }
                }
                else{
                    errornumber.style.color="red";
                    errornumber.innerHTML="category empty";
                    return false;
                }
            }
            else{
                errornumber.style.color="red";
                errornumber.innerHTML="city empty";
                return false;
            }
        }
        else{
            errorcompany.style.color="red";
            errorcompany.innerHTML="company empty";
            return false;
        }
    }
    else{
        console.log("hello");
        errorcategory.style.color="red";
        errorcategory.innerHTML="category empty";
        return false;
    }
}