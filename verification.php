<?php
// error_reporting(0);
@session_start();
include './conn.php';

$otpE = "";
if (isset($_POST['verify'])) {
    //E refers to error

    $otp = $_POST['otp_code'];
    // echo $otp . "<br>";
    // echo $_SESSION['sesOtp'];
    $valid = true;
    // email
    if (empty($otp)) {
        $valid = false;
        $otpE = "Enter a valid Otp";
    } else if (!preg_match("/[0-9]{6}/", $otp)) {
        $valid = false;
        $otpE = "Enter a valid Otp";
    }
    else if($otp != $_SESSION['sesOtp']){
        echo "<script>alert('Invalid OTP!');window.location.replace('./verification.php');</script>";
    }

    else if($valid && $otp == $_SESSION['sesOtp']){
        $name = $_SESSION['sesRegDetails']['fname'];
        $email = $_SESSION['sesRegDetails']['email'];
        $mobile = $_SESSION['sesRegDetails']['phone'];
        $password = md5($_SESSION['sesRegDetails']['pass']);
        $sql = "INSERT INTO customer(fullName,email,phoneNo,password) VALUES('$name','$email','$mobile','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration Successful!');window.location.replace('./Login.php');</script>";
        }
        else
            echo "<script>alert('Registration not successful!');window.location.replace('./Registration.php');</script>";
    
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
                            <form action="#" method="POST">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                    <div class="col-md-6">
                                        <input type="text" id="otp" class="form-control" name="otp_code" autofocus>
                                    </div>
                                    <?php echo $otpE; ?>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Verify" name="verify">
                                     <!-- <input type="submit" value="Resend" name="Resend"> -->
                                </div>
                                

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

</html>