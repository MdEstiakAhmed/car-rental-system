console.log("hello");

var vehicleCategory=document.getElementById("vehicleCategory");
var destination=document.costAnalysisForm.destination;
var drivingOption=document.costAnalysisForm.drivingOption;
var drivingLicense=document.getElementById("drivingLicense");
var staringDate=document.getElementById("staringDate");
var endingDate=document.getElementById("endingDate");

var errorVehicleCategory = document.getElementById("errorVehicleCategory");
var errorDestination = document.getElementById("errorDestination");
var errorDrivingOption = document.getElementById("errorDrivingOption");
var errorDrivingLicense = document.getElementById("errorDrivingLicense");
var errorStaringDate = document.getElementById("errorStaringDate");
var errorEndingDate = document.getElementById("errorEndingDate");

console.log(vehicleCategory);

function ckeckDrivingOption(){
    console.log(drivingOption.value);
    if(drivingOption.value=="self-Driving"){
        drivingLicense.disabled = false;
        drivingLicense.style.border="2px solid green";
    }
    else if(drivingOption.value=="with-Driver"){
        drivingLicense.disabled = true;
        drivingLicense.style.border="2px solid white";
    }
}

function checkDrivingLicense(){
    if(drivingOption.value=="self-Driving"){
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
    else if(drivingOption.value=="with-Driver"){
        return true;
    }
    
}

function checkStartingDate(){
    
    var todayString = new Date().toLocaleDateString();
    var today = new Date(todayString);
    var other = new Date(staringDate.value);

    if(today <= other){
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
    if(vehicleCategory.value!=""){
        errorVehicleCategory.innerHTML="";
        if(destination.value!=""){
            errorDestination.innerHTML="";
            if(drivingOption.value!=""){
                errorDrivingOption.innerHTML="";
                if(checkDrivingLicense()){
                    errorDrivingLicense.innerHTML="";
                    if(checkStartingDate()){
                        errorStaringDate.innerHTML="";
                        if(checkEndingDate()){
                            errorEndingDate.innerHTML="";
                            console.log("ok all");
                            return true;
                        }
                        else{
                            errorEndingDate.style.color="red";
                            errorEndingDate.innerHTML="Ending Date error";
                            return false;
                        }
                    }
                    else{
                        errorStaringDate.style.color="red";
                        errorStaringDate.innerHTML="Staring Date error";
                        return false;
                    }
                }
                else{
                    errorDrivingLicense.style.color="red";
                    errorDrivingLicense.innerHTML="Driving License error";
                    return false;
                }
            }
            else{
                errorDrivingOption.style.color="red";
                errorDrivingOption.innerHTML="Driving option empty";
                return false;
            }
        }
        else{
            errorDestination.style.color="red";
            errorDestination.innerHTML="destination empty";
            return false;
        }
    }
    else{
        errorVehicleCategory.style.color="red";
        errorVehicleCategory.innerHTML="Vehicle Category empty";
        return false;
    }
}