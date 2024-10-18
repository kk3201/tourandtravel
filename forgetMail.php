<?php
@session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email)
{
    $otp = rand(100000, 999999);
    $_SESSION['sesFogetOtp'] = $otp;
    require("./PHPMailer/Exception.php");
    require("./PHPMailer/PHPMailer.php");
    require("./PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'makemyjourneyproject@gmail.com';    //SMTP username   quickcarhire.india@gmail.com
        //travelix

        $mail->Password = 'ncjrwlumvvlvwzgz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('makemyjourneyproject@gmail.com', 'OTP Verification');
        $mail->addAddress($email);     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OTP Verification Make My Journey';
        $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div
        style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
            <a href
               style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">
               Make My Journey</a>
        </div>
        <p style="font-size:1.1em">Hi,</p>
        <p>This Otp is for your forgetPassword. Use the following OTP to
            complete your Sign Up procedures. OTP is valid for 5 minutes</p>
        <h2
                style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">' . $otp . '</h2>
        <p style="font-size:0.9em;">Regards,<br />Make My Journey</p>
        <hr style="border:none;border-top:1px solid #eee" />
        <div
                style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
            <p>Travelix</p>
            <img src="cid:image_cid" alt="Jinal" height="50" width="50">
        </div>
    </div>
</div>
</body>
</html>';
       
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }
}
