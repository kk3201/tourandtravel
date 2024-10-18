$(document).ready(function () {
    $('input[name="fname"]').on('keypress', function (event) {
        var x = event.which || event.keyCode;
        if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32) {
            return true;
        }
        else {
            return false;
        }


    })
    // max length of first name
    $('input[name="fname"]').attr("maxlength", "30");
    


    // vaildation on last name
    $('input[name="lname"]').on('keypress', function (event) {
        var x = event.which || event.keyCode;
        if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32 ||(x !=32)) {
            return true;
        }
        else {
            return false;
        }


    })
    // maxlength of last name
    $('input[name="lname"]').attr("maxlength", "30");
    // vaildation onn email 
    $('input[name="email"]').on('keypress', function (event) {
        var x = event.which || event.keyCode;
        if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || (x == 32) || (x >= 47 && x <= 57 || (x = 190) || x == 50)) {
            return true;
        }
        else {
            return false;
        }
    })
    // maxlength of email 
    $('input[name="email"]').attr("maxlength", "35");
    // vaildation on Mobile number 
    $('input[name="phone"]').on('keypress', function (event) {
        var x = event.which || event.keyCode;
        if (x >= 47 && x <= 57) {
            return true;
        }
        else {
            return false;
        }


    })
    // maxlength on mobile number
    $('input[name="phone"]').attr("maxlength", "10");
    // vaildation on addhar card 
   /* $('input[name="aadhar"]').on('keypress', function (event) {
        var x = event.which || event.keyCode;
        if (x >= 47 && x <= 57 ) {
            return true;
        }
        else {
            return false;
        }


    })
    // maxlength on Addhar card 
    $('input[name="aadhar"]').attr("maxlength", "12");*/
    // vaildation on pin code 
   
    // password equal to confrim password 
    
    $('input[name="pass"]').attr("maxlength", "12");
    $('input[name="txtConfirmPassword"]').attr("maxlength", "12");
});
