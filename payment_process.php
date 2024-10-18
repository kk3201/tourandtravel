<?php
// put your code here
// $con= mysqli_connect("localhost","root","","project1");
include("conn.php");
session_start();
$Emailid = $_SESSION['sesLoginDetails']['email'];
if (isset($_POST['amt']) && isset($Emailid)) {

        $amt = $_POST['amt'];
        $Emailid = $_SESSION['sesLoginDetails']['email'];
        $payment_status = "pending";
        $added_on = date('Y-m-d h-i-s');
        mysqli_query($conn, "insert into payment(email,amount,payment_status,added_on) "
                . "values('$Emailid','$amt','$payment_status','$added_on')");

        $_SESSION['OID'] = mysqli_insert_id($conn);
}

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
        $payment_id = $_POST['payment_id'];
        $result = mysqli_query($conn, "update payment set payment_status='complete',payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
        if (!$result) {
                die('Error: ' . mysqli_error($conn));
        }
        $id = $_SESSION['sesLoginDetails']['customerId'];
        $name = $_SESSION['sesLoginDetails']['fullName'];
        $Emailid = $_SESSION['sesLoginDetails']['email'];
        $packageName = $_SESSION['packageName'];
        $fromplace = $_SESSION['frompalce'];
        $toplace = $_SESSION['toplace'];
        $departureDate = $_SESSION['departureDate'];
        $noOfPerson = $_SESSION['noOfPerson'];
        $total = $_SESSION['total'];
        $date = $_SESSION['currentDate'];
        $packageId = $_SESSION['packageidBook'];
        echo $id, $name, $Emailid, $packageName, $fromplace, $toplace, $departureDate, $noOfPerson, $total, $date, $packageId;
        $insert_query = "INSERT INTO booking(customerId, packageId,customerName,fromplace,toplace,bookingdate,departureDate,numberOfPerson,totalPrice,status)VALUES('$id','$packageId','$name','$fromplace','$toplace','$date','$departureDate','$noOfPerson','$total','Confirm')";
        mysqli_query($conn, $insert_query);
        echo "<script>alert('Your Payment is done Sucessfully');window.location.href='Homepage.php'</script>";
}
