<?php
@session_start();

include("conn.php");
error_reporting(0);

// customer
$id = $_SESSION['sesLoginDetails']['customerId'];
$name = $_SESSION['sesLoginDetails']['fullName'];
$email = $_SESSION['sesLoginDetails']['email'];
$mobile = $_SESSION['sesLoginDetails']['phoneNo'];

//Find booking id


$sql = "SELECT bookingId FROM booking WHERE customerId = $id ORDER BY customerId DESC LIMIT 1";
$result = mysqli_query($conn, $sql) or die("SQL query failed");
$row = mysqli_fetch_assoc($result);
$bookingId = $row['bookingId'];



$sql = "SELECT B.bookingId,B.fromPlace,B.toPlace,B.bookingDate,B.departureDate,P.packageName,P.packageLocation,P.numberOfDays,P.image,P.price,PM.paymentId,PM.paymentDate,PM.amount
		FROM booking B, payment PM,package P 
		WHERE
        B.packageId=P.packageId AND
		B.bookingId = PM.bookingId AND 
		B.bookingId =$bookingId;";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Make My Jounery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php


    ?>

    <div class="container">
        <!-- <img src="../Traveler/assets/images/logo.png"> -->
        <!-- <center><b><span style="font-size: 40px; color: black;">TRAVELIX</span></b>	</center> -->
        <h2 align="center">Invoice</h2>
        <hr>
        <br>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Booked By</th>
                <th>Booked ID</th>
                <th>From Place</th>
                <th>To Place</th>
                <th>Booked Date</th>
                <th>Departure Date</th>

            </tr>
            <tr>
                <td>
                    <?php echo $name; ?>
                </td>
                <td><?php echo $row['bookingId']; ?></td>
                <td><?php echo $row['fromPlace']; ?></td>
                <td><?php echo $row['toPlace']; ?></td>
                <td><?php echo $row['bookingDate']; ?></td>
                <td><?php echo $row['departureDate']; ?></td>
            </tr>
        </table>
        <br>
        <h2>Packages Details</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Package Name</th>
                <th>Package Location</th>
                <th>Image</th>
                <th>Number of Days</th>
                <th>Price(per person)</th>
            </tr>
            <tr>
                <td>
                    <?php echo $row['packageName']; ?>
                </td>
                <td><?php echo  $row['packageLocation']; ?></td>
                <td><img src="<?php echo $row['image'] ?>" height="235px" width="350px"></td>
                <td><?php echo  $row['numberOfDays']; ?></td>
                <td><?php echo  $row['price']; ?></td>
            </tr>
        </table>

        <h2>Customer Details</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
            </tr>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $mobile; ?></td>
            </tr>
        </table>

        <h2>Payment Details</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Payment ID</th>
                <th>Payment Date</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td><?php echo $row['paymentId']; ?></td>
                <td><?php echo $row['paymentDate']; ?></td>
                <td><?php echo $row['amount']; ?></td>
            </tr>
        </table>
        <br>
        <center><button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button></center>
    </div>

    
    <script>
			function downloadPDF() {
				// window.print();
				window.location.replace("DownloadPDF.php");
			}
		</script>
</body>

</html>