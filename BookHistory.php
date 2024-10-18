<?php
@session_start();
//error_reporting(0);
include('conn.php');
$id = $_SESSION['sesLoginDetails']['customerId'];

// fetch the booking deatils which was booked by customer
 // SQL QUERY 
//  $query = "SELECT * FROM booking WHERE customerId = '$id'";
//  // Execute the q uery
//  $result = mysqli_query($conn, $query);

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
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                 <!--   <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>-->
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <!---<div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>--->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">Make M</span>y Jounery</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="Homepage.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>
                        <div class="nav-item dropdown">
                           <?php if(isset($_SESSION['sesLog'])) echo ' <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>';?>
                            <div class="dropdown-menu border-0 rounded-0 m-0">   
                                <?php if(isset($_SESSION['sesLog'])) echo '<a href="Profile.php" class="dropdown-item">Profile</a>'; ?>
                                <!-- <a href="destination.php" class="dropdown-item">Destination</a> -->
                                <?php  if(isset($_SESSION['sesLog'])) echo ' <a href="Review.php" class="dropdown-item">Review</a>';?> 
                                <?php if(isset($_SESSION['sesLog'])) echo ' <a href="BookHistory.php" class="dropdown-item">Book Histroy</a>'; ?>     
                         </div>
                        </div>
                        <a href="<?php if(isset($_SESSION['sesLog'])) echo 'Logout.php'; else echo 'Login.php'; ?>" class="nav-item nav-link"><?php if(isset($_SESSION['sesLog'])) echo "Logout"; else echo "Login" ?></a>
                    </div>
                                                                
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
<br>
<!-- Booking History  -->

<div class="text-center mb-3 pb-">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">History</h6>
                <h1>Your Booking History</h1>
            </div>
            <table class="table table-hover">
  <thead>
    <tr>
    <tr>
                                                <th scope="col">Booking Id</th>		
                                                <th scope="col">Traveller Name</th>
                                                <th scope="col">From/To Place</th>
												<th scope="col">Booking Date</th>												
                                                <th scope="col">Departure Date</th>
                                                <th scope="col">Number of Person</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
      <!-- <th scope="col"> </th> -->
    </tr>
  </thead>
  <tbody>
  <?php
//   if ($result) {
//       if (mysqli_num_rows($result) > 0) {
//           while ($row = mysqli_fetch_assoc($result)) {
//               echo "<tr>";
//               echo "<td>" . $row['customerName'] . "</td>";
//               echo "<td>" . $row['fromPlace'] . "</td>";
//               echo "<td>" . $row['toPlace'] . "</td>";
//               echo "<td>" . $row['bookingDate'] . "</td>";
//               echo "<td>" . $row['departureDate'] . "</td>";
//               echo "<td>" . $row['numberOfPerson'] . "</td>";
//               echo "<td>" . $row['totalPrice'] . "</td>";
//               echo "<td>" . $row['status'] . "</td>";
//             //   echo" <td>"."<button type='button' class='btn btn-success btn-sm'>Success</button>"."</td>";
//               echo "</tr>";
//           }
//       } else {
//           echo "<tr><td colspan='8'>No results</td></tr>";
//       }
//   } else {
//       echo "<tr><td colspan='8'>Error: " . mysqli_error($conn) . "</td></tr>";
//   }





$sql1 = "SELECT * FROM booking WHERE customerId = '$id'";
$result1 = $conn->query($sql1);
$cnt = 1;

if ($result1->num_rows > 0) {
    while ($result = $result1->fetch_object()) {
        ?>
        <tr>
            <td><?php echo htmlentities($result->bookingId); ?></td>
            <td><?php echo htmlentities($result->customerName); ?></td>
            <td><?php echo htmlentities($result->fromPlace); ?> To <?php echo htmlentities($result->toPlace); ?></td>
            <td><?php echo htmlentities($result->bookingDate); ?></td>
            <td><?php echo htmlentities($result->departureDate); ?></td>
            <td><?php echo htmlentities($result->numberOfPerson); ?></td>
            <td><?php echo htmlentities($result->totalPrice); ?></td>
            <td><?php
                if ($result->status == 0) {
                    echo "Pending";
                }
                if ($result->status == 1) {
                    echo "Confirmed";
                }
                if ($result->status == 2 && $result->CancelledBy == 'a') {
                    echo "Canceled by admin at <br>" .date("Y-m-d");
                }
                if ($result->status == 2 && $result->CancelledBy == 'u') {
                    echo "Canceled by User at <br>" .date("Y-m-d");
                }
                ?></td>

            <?php
            if ($result->status == 2) {
                ?><td>Cancelled</td>
            <?php } else { ?>
                <td><a href="BookHistory.php?bkid=<?php echo htmlentities($result->bookingId); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a> </td>
            <?php } ?>

        </tr>
        <?php
        $cnt = $cnt + 1;
    }
}



if (isset($_REQUEST['bkid'])) {
    $bid = intval($_GET['bkid']);
    $status = 2;
    $CancelledBy = 'u';
    $sql = "UPDATE booking SET status=$status, CancelledBy='$CancelledBy' WHERE bookingId=$bid";
    $conn->query($sql);

    $msg = "Booking Cancelled successfully";
}

if (isset($_REQUEST['bckid'])) {
    $bcid = intval($_GET['bckid']);
    $status = 1;
    $sql = "UPDATE booking SET status=$status WHERE bookingId=$bcid";
    $conn->query($sql);
    $msg = "Booking Confirm successfully";
}
  ?>
  </tbody>
</table>
<?php
