<?php 
@session_start();
error_reporting(0);
include("conn.php");
$email=$_POST['email_Id'];
$_SESSION['sesEmail']=$email;
    if(isset($_POST['verify']))
    {
        $check_query = mysqli_query($conn, "SELECT * FROM customer where email ='$email'");
        if (mysqli_num_rows($check_query)) {
            include './forgetMail.php';
            sendMail($email);
            echo "<script>window.location.replace('./forgetVerification.php');</script>";
          
        }
        else{
            echo '<script>alert("Email Id is not exists!")</script>';
        }
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
            <a class="navbar-brand" href="#">Verification Account</a>
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
                        <div class="card-header">Verification Account</div>
                        <div class="card-body">
                            <form action="#" method="POST" onsubmit="return checkEmail()">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">EmailId</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" class="form-control" name="email_Id" autofocus>
                                    </div>
                                <span id="emailError"></span>
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

    </main>
    <script>
        function checkEmail(){
    var email = document.getElementById("email").value;
    var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z.]{3,}[.]{1}[A-Za-z]{2,10}$/;

            if (emailCheck.test(email)) {
      document.getElementById('emailError').innerHTML = "";
    }
    else {
      document.getElementById('emailError').innerHTML = "**Please Enter EmailId";
      return false;
    }

        }
    </script>
</body>

</html>