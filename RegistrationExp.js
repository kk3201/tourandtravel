
function validationrgexp() {

    var firstName = document.getElementById("fname").value;
//    var lastName = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var mobileNumber = document.getElementById("phone").value;
//    var pinCode = document.getElementById("pincode").value;
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;

    var fNameCheck = /^[a-zA-Z ]{2,30}$/;
//    var lNameCheck = /^[A-Z][a-z]{2,30}$/;
    var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z.]{3,}[.]{1}[A-Za-z]{2,10}$/;
    var mobileCheck = /^[6789][0-9]{9}$/;
    
//    var pinCodeCheck=/^[0-9]{6}/;
    var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-z0-9!@#$%^&*]{5,12}$/;

    if (fNameCheck.test(firstName)) {
      document.getElementById('fNError').innerHTML = "";
     
    }
    else {
      document.getElementById('fNError').innerHTML = "**Enter the Full Name ";
      return false;
    }
//    if (lNameCheck.test(lastName)) {
//      document.getElementById('lNError').innerHTML = "";
//
//
//    }
//    else {
//      document.getElementById('lNError').innerHTML = "**First letter Should be Capital or number of Character should be more than 2";
//      return false;
//    }
    if (emailCheck.test(email)) {
      document.getElementById('emailError').innerHTML = "";


    }
    else {
      document.getElementById('emailError').innerHTML = "**Email is invaild";
      return false;
    }

    if (mobileCheck.test(mobileNumber)) {
      document.getElementById('mNError').innerHTML = "";


    }
    else {
      document.getElementById('mNError').innerHTML = "**Mobile Number is invaild";
      return false;
    }
   


//    if (pinCodeCheck.test(pinCode)) {
//      document.getElementById('pCError').innerHTML = "";
//
//
//    }
//    else {
//      document.getElementById('pCError').innerHTML = "**pincode is invaild";
//      return false;
//    }
    if (passwordCheck.test(password)) {
      document.getElementById('passwordError').innerHTML = "";


    }
    else {
      document.getElementById('passwordError').innerHTML = "**password is invaild";
      return false;
    }
    if(confirmPassword.match(password))
    {
      document.getElementById('confirmPasswordError').innerHTML = "";
    }
    else
    {
      document.getElementById('confirmPasswordError').innerHTML = "**Confirm does not match with password";
      return false;
    }
  }