<?php
// error_reporting(0);
@session_start();

include("conn.php");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

?>

<?php
// put your code here
//database connection
if (isset($_POST['btnSubmit'])) {
    $_SESSION['sesRegDetails'] = $_POST;
    
    $email = $_POST['email']; 

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";


    $check_query = mysqli_query($conn, "SELECT * FROM customer where email ='$email'");
    if (mysqli_num_rows($check_query)) {
        echo '<script>alert("Email Id is aleady exists!")</script>';
    } else {
        include './otpMail.php';
        sendMail($email);
        echo "<script>window.location.replace('./verification.php');</script>";
    }
    
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="validation.js"></script>
    <script src="RegistrationExp.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="container">
        <div class="title">Registration</div>

        <div class="content">

            <form onsubmit="return validationrgexp()" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name </span>
                        <input type="text" placeholder="Enter your name" name="fname" id="fname">
                        <span id="fNError"></span>
                        <span class="text-danger"></span>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" name="email" id="email">
                        <span id="emailError"></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input type="text" placeholder="Enter your Mobile Number" name="phone" id="phone">
                        <span id="mNError"></span>
                    </div>


                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your Password" name="pass" id="pass">
                        <span id="passwordError"></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm  your Password" name="txtConfirmPassword" id="txtConfirmPassword">
                        <span id="confirmPasswordError"></span>
                    </div>
                    <!--                        <div class="input-box" >
                                                    <span class="details">OTP</span>
                                                    <input type="tex  name="OTP"
                                                           id="OTP">
                                                    <span id="OtpError"></span>
                                                </div>-->
                </div>


                <div class="button">

                    <input type="submit" name="btnSubmit" id="submit" value="Register">

                </div>

            </form>
        </div>
    </div>

    <!--validation-->

</body>

</html>