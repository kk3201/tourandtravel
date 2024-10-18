<?php
//
include("conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
session_start();
?>

<?php
// put your code here
//database connection
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = md5($_POST['pass']);
    $v_code = bin2hex(random_bytes(16));

    $check_query = mysqli_query($conn, "SELECT * FROM tblusers where EmailId ='$email'");
    if (mysqli_num_rows($check_query)) {
        echo'<script>alert("email id is aleady exists")</script>';
    } else {
        $sql = "INSERT INTO tblusers(FullName,MobileNumber,EmailId,Password,Otp,Status) VALUES('$name','$mobile','$email','$password','$v_code','0')";
        //  $sql = "INSERT INTO tblusers(FullName,MobileNumber,EmailId,Password,Otp,Status)VALUES('$name','$mobile','$email','$password','$v_code','0')";        
       if( $query = mysqli_query($conn, $sql)&& sendEmail($email, $v_code));
        echo "<script>alert('Registration sucessfull')</script>";
        
//    
//           echo "<script>New record created successfully</script>";
//        echo "<script>window.location.href='Login.php'</script>";
    }
}
?>
<?php
function sendEmail($email, $v_code) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
                         //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'projectpp2301@gmail.com';                     //SMTP username
        $mail->Password = 'KPkhushipatel';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        
        $mail->setFrom('vikramsinghparmar1400@gmail.com', 'Make My jounery');
        $mail->addAddress($email);     //Add a recipient
       

       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verfication Code from Make my Jounery';
        $mail->Body = "Thank you for Registration!"
                . "Click the link below  to verify the email address"
                . "<a href='http://localhost/Project/Project/verification.php?email=$email&v_code=$v_code'>Verify</a>";
       

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

