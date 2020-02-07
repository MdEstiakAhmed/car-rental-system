console.log("hello");

var destination = document.borrowRegisterForm.destination;
var drivingOption = document.borrowRegisterForm.drivingOption;
var drivingLicense = document.getElementById("drivingLicense");
var staringDate = document.getElementById("staringDate");
var endingDate = document.getElementById("endingDate");

var errorDestination = document.getElementById("errorDestination");
var errorDriver = document.getElementById("errorDriver");
var errorDrivingLicense = document.getElementById("errorDrivingLicense");
var errorStaringDate = document.getElementById("errorStaringDate");
var errorEndingDate = document.getElementById("errorEndingDate");

var all = document.getElementById("all");

function checkDrivingLicense(){
    console.log("hello");
    if(drivingLicense.value==""){
        drivingLicense.style.color="red";
        errorDrivingLicense.innerHTML="invalid driving license";
        return false;
    }
    else if(!(/([a-zA-Z]{2}\-[0-9]{7}\-[a-zA-Z]{1}\-[0-9]{5})$/.test(drivingLicense.value))){
        drivingLicense.style.color="red";
        errorDrivingLicense.innerHTML="invalid driving license";
        return false;
    }
    else{
        drivingLicense.style.color="black";
        errorDrivingLicense.innerHTML="";
        return true;
    }
}

function checkStartingDate(){
    
    var todayString = new Date().toLocaleDateString();
    var today = new Date(todayString);
    var other = new Date(staringDate.value);

    // console.log(today);
    // console.log(other);

    if(today <= other){
        // console.log("yes");
        staringDate.style.color="black";
        errorStaringDate.innerHTML="";
        return true;
    }
    else if(today > other){
        staringDate.style.color="red";
        errorStaringDate.innerHTML="invalid starting date.";
        return false;
    }
}

function checkEndingDate(){
    var startDate = new Date(staringDate.value);
    var endDate = new Date(endingDate.value);

    if(staringDate.value!=""){
        if(startDate <= endDate){
            endingDate.style.color="black";
            errorEndingDate.innerHTML="";
            return true;
        }
        else if(startDate > endDate){
            endingDate.style.color="red";
            errorEndingDate.innerHTML="invalid ending date.";
            return false;
        }
    }
    else{
        endingDate.style.color="red";
        errorEndingDate.innerHTML="Please select Starting date.";
        return false;
    }
    
}

function check(){
    if(destination.value!=""){
        errorDestination.innerHTML="";
        if(drivingOption.value!=""){
            errorDriver.innerHTML="";
            if(checkDrivingLicense()){
                errorDrivingLicense.innerHTML="";
                if(checkStartingDate()){
                    errorStaringDate.innerHTML="";
                    if(checkEndingDate()){
                        errorEndingDate.innerHTML="";
                        all.innerHTML="all ok";
                        return true;
                    }
                    else{
                        endingDate.style.color="red";
                        errorEndingDate.style.color="red";
                        errorEndingDate.innerHTML="error ending date";
                        return false;
                    }
                }
                else{
                    staringDate.style.color="red";
                    errorStaringDate.style.color="red";
                    errorStaringDate.innerHTML="error starting date";
                    return false;
                }
            }
            else{
                drivingLicense.style.color="red";
                errorDrivingLicense.style.color="red";
                errorDrivingLicense.innerHTML="drving lecense error";
                return false;
            }
        }
        else{
            errorDriver.style.color="red";
            errorDriver.innerHTML="driving option empty";
            return false;
        }
    }
    else{
        errorDestination.style.color="red";
        errorDestination.innerHTML="destination empty";
        return false;
    }
}