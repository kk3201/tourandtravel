<?php 
session_start();
error_reporting(0);
include("conn.php");
if(isset($_POST['verify']))
{
    $email=$_SESSION['sesEmail'];
    $password =md5($_POST['password']);
    $sql="UPDATE customer SET password='$password' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password Is Update Successful!');window.location.replace('./Login.php');</script>";
        setcookie('passsave', $pass, time() -3600);
        setcookie('emailsave', $email, time()-3600);
    }
    else
        echo "<script>alert('Password is not Update!');window.location.replace('./forgetPassword.php');</script>";
       
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="styleverfication.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">New Password</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">New Password</div>
                        <div class="card-body">
                            <form action="#" method="POST" onsubmit="return validationrgexp()">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" autofocus>
                                    </div>
                                    <span id="passwordError"></span>
                                    <?php //echo $otpE; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Confrim Pasword</label>
                                    <div class="col-md-6">
                                        <input type="password" id="txtConfirmPassword" class="form-control" name="ConfrimPassword" autofocus>
                                        <span id="confirmPasswordError"></span>
                                    </div>
                                    <?php //echo $otpE; ?>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Verify" name="verify">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

</body>
<script>
    function validationrgexp() {

     var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-z0-9!@#$%^&*]{5,12}$/;
  
    if(password =="")
    {
        document.getElementById('passwordError').innerHTML = "**Please Enter Password";
        return false;

    }
    if (passwordCheck.test(password)) {
      document.getElementById('passwordError').innerHTML = "";

    }
    else {
      document.getElementById('passwordError').innerHTML = "**password contain uppercase  ";
      return false;
    }
    if(confirmPassword =="")
    {
        document.getElementById('passwordError').innerHTML = "**Please Enter ConfrimPassword";
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
    $('input[name="password"]').attr("maxlength", "12");
    }
</script>
</html>