<?php
session_start();
include('conn.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['sesLoginDetails']['customerId'];
    $name = $_SESSION['sesLoginDetails']['fullName'];
    $pName = $_POST['pName'];
    $fromplace = $_POST['fromplace'];
    $toplace = $_POST['toplace'];
    $totalPerson = $_POST['totalPerson'];
    $departureDate = $_POST['departureDate'];
    $total = $_POST['totalPrice'];
    $pid = $_POST['pid'];

    // Get the package ID
    $ab = "SELECT packageId FROM package WHERE packageName='$pName'";
    $result = mysqli_query($conn, $ab);
    $row = mysqli_fetch_assoc($result);
    $packageId = $row['packageId'];


    $insert_query = "INSERT INTO booking(customerId, packageId,customerName,fromplace,toplace,departureDate,numberOfPerson,totalPrice,status)VALUES($id,$packageId,'$name','$fromplace','$toplace','$departureDate','$totalPerson',$total,'Confirm')";
    mysqli_query($conn, $insert_query);

    $sql = "SELECT bookingId FROM booking WHERE customerId = $id ORDER BY customerId DESC LIMIT 1";
    $result = mysqli_query($conn, $sql) or die("SQL query failed");
    $row = mysqli_fetch_assoc($result);
    $bookingId = $row['bookingId'];


    $insert_query2 = "INSERT INTO payment(paymentId,customerId,bookingId,amount) VALUES('$pid',$id,$bookingId,$total)";
    mysqli_query($conn, $insert_query2);
    echo "<script>alert('Your Payment is done Sucessfully');</script>";
}
