<?php
    include("conn.php");
        error_reporting();
        session_start();
?>

<?php  
        // put your code here
        //database connection
        if(isset($_POST['submit']))
        {
            $tname = $_POST['tname'];
            $pname = $_POST['pname'];
            $from=$_POST['from'];
            $to=$_POST['to'];
            $bookingDate=$_POST['bookingDate'];
            $departureDate=$_POST['departureDate'];
            $adult=$_POST['adult'];
            $child=$_POST['child'];
            $adultPrice=$_POST['adultPrice'];
            $childPrice=$_POST['childPrice'];
            $total=$_POST['total'];
            $paymentType=$_POST['paymentType'];
            $advanceAmount=$_POST['advanceAmount'];
        
            
$query = "SELECT customerId FROM customer WHERE firstName = '" . $tname . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$customerId = $row['customerId'];

// Get the package ID
$ab = "SELECT packageId FROM package WHERE subPlaceName = '" . $to . "'";
$result = mysqli_query($conn, $ab);
$row = mysqli_fetch_assoc($result);
$packageId = $row['packageId'];

// Insert the booking record
mysqli_query($conn, "INSERT INTO booking (customerId, packageId, travellerName, packageName, fromPlace, toPlace, bookingDate, numberOfChild, numberOfAdult, depatureDate, adult_total_price, child_total_price, totalPrice, paymentType, advanceAmount) VALUES ('$customerId', '$packageId', '$tname', '$pname', '$from', '$to', '$bookingDate', '$child', '$adult', '$departureDate', '$adultPrice', '$childPrice', '$total', '$paymentType', '$advanceAmount')");

         
          echo "sucessfully inserted";
         echo "<script>window.location.href='Booking.php'</script>";
        }

?>


<?php

// Get the user id
// $subplacename = $_REQUEST['subPlaceName'];

// // Database connection
// $con = mysqli_connect("localhost", "root", "", "project");

// if ($subplacename !== "") {
	
// 	// Get corresponding first name and
// 	// last name for that user id	
// 	$query = mysqli_query($con, "SELECT adultPrice, childPrice FROM package WHERE subPlaceName='$subplacename'");

// 	$row = mysqli_fetch_array($query);

// 	// Get the first name
// 	$adultPrice = $row["adultPrice"];

// 	// Get the first name
// 	$childPrice = $row["childPrice"];
// }

// // Store it in a array
// $result = array("$adultPrice", "$childPrice");

// // Send in JSON encoded form
// $myJSON = json_encode($result);
// echo $myJSON;
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $sql="select * from customer";
    $e= $_SESSION['email'];
    if($e == ""){
        echo "<script>window.location.href='Login.php'</script>";
    } 
?>
<head>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
// $(document).ready(function () {
//             $("#list").click(function () {
//                 let complete = "<?php //echo $row['complete'];?>";
//                 if (complete == 0) {
//                     alert("Please Complete Profile First.");
//                     event.preventDefault();
//                 }
//             });
//         });
        </script>

<style>
#center {
  /* display: flex;
  justify-content: center; */
  /* align-items: center; */
  text-align: center;
}
</style>

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
    <link herf="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/ui-lightness/jquery-ui.min.css"
        rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body onload="Total()">
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
                        <!--  <a href="service.html" class="nav-item nav-link">Review </a>-->
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>
                        <a href="Registration.php" class="nav-item nav-link">Sign-up</a>
                        <a href="Login.php" class="nav-item nav-link">Login-in</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <!--<a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>-->
                                <a href="destination.php" class="dropdown-item">Destination</a>
                                <!-- <a href="guide.html" class="dropdown-item">Travel Guides</a>-->
                                <a href="Review.php" class="dropdown-item">Review</a>
                                <a href="contact.php" class="dropdown-item">Contact</a>
                            </div>
                        </div>


                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>-->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <!--<a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <form onsubmit="return checkNull()" method="post">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <!-- <div class="row align-items-center" style="min-height: 60px;"> -->
                        
                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Traveller Name</label>
                                <input type="text" name="tname" class="form-control" value="">
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Package Name</label>
                                    <!-- <input type="text" name="pname" class="form-control" placeholder="Enter last Name"> -->
                                    <select class="form-control" name="pname" id="pname">
                                                        <option disabled selected>-- Select To Package --</option>
                                                        <?php
     
                                                            $records = mysqli_query($conn, "SELECT DISTINCT placeName From package");
                                                              // Use select query here 
                                                              
                                                            while($row = mysqli_fetch_array($records))
                                                            {?>
                                                               <option value="<?=$row['placeName']?> "><?= $row['placeName']?> </option> 
                                     
                                                             <?php }  ?>
                                                     </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">From</label>
                                    <input type="text" name="from" class="form-control" placeholder="Enter from place">
                                </div>
                        
                            </div>  
                    </div>


                    <div class="row p-t-20">
                        
                                            <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">To</label>
                                                    <!-- <input type="text" name="phone" class="form-control form-control-danger" placeholder="Enter Phone Number"> -->
                                <select class="form-control" name="to" id="to">
                                    <option disabled selected>-- Select To Place --</option>
                                    <?php
     
                                        $records = mysqli_query($conn, "SELECT DISTINCT subPlaceName From package");
                                                              // Use select query here 
                                                              
                                        while($row = mysqli_fetch_array($records))
                                        {?>
                                        <option value="<?=$row['subPlaceName']?> "><?= $row['subPlaceName']?> </option> 
                                     
                                        <?php }  ?>
                                </select>
                            </div>
                        </div>
                                            <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                            <?php
                                // Set the new timezone
                                date_default_timezone_set('Asia/Kolkata');
                                $booking_date = date('y-m-d');
                            ?>
                                <label class="control-label">Booking Date</label>
                                <input type="text" name="bookingDate" class="form-control" value="<?php echo $booking_date; ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Departure Date</label>
                                <input type="date" name="departureDate" class="form-control form-control-danger" placeholder="Enter departure Date">
                                                    
                            </div>
                        </div>
                    </div>

                                        <!--/row-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Number of adult</label>
                                <input type="text" name="adult" class="form-control form-control-danger" placeholder="Enter number of adult">
                                                     
                            </div>
                        </div>
                                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Number of child</label>
                                <input type="text" name="child" class="form-control form-control-danger" placeholder="Enter number of child">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Payment mode</label>
                                                    <!-- <input type="text" name="pname" class="form-control" placeholder="Enter Package Name"> -->
                                <select name="paymentType" class="form-control form-control-danger">
                                    <option disabled selected>--Select Payment Type--</option>
                                    <option value="Google pay">Google pay</option>
                                    <option value="PhonePe">PhonePe</option>
                                    <option value="Paytm">Paytm</option>
                                    <option value="UPI">UPI</option>
                                </select>
                            </div> 
                        </div>
                    </div>

                                            <!--/row-->
                    <div class="row p-t-20">


                    

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Total price of adult</label>
                                <input type="text" name="adultPrice" id="adultPrice" class="form-control" placeholder="Price of adult" onchange="Total()">
                            </div>
                        </div>
                                            <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Total price of child</label>
                                <input type="text" name="childPrice" id="childPrice" class="form-control form-control-danger" placeholder="Price of Child" onchange = "Total()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Advance Payment</label>
                                <input type="text" name="advanceAmount" class="form-control form-control-danger" placeholder="Enter advance payment">
                            </div>
                        </div> 
                                            <!--/row-->
                    </div>
                                      
                                            <!--/span-->
                

                                        <!--/row-->

                                        

			        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Total</label>
                                <input type="text" name="total" id="total" class="form-control form-control-danger" placeholder="Total Price">
                                                     
                            </div>
                        </div>
                               
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Number of adult</label>
                                <input type="text" name="adult" id="adult" class="form-control" placeholder="Number of adult">
                            </div>
                        </div>-->
                                            <!--/span-->
                        <!--<div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Number of child</label>
                                <input type="text" name="child" id="child" class="form-control form-control-danger" placeholder="Number of Child">
                            </div>
                        </div> -->
                    </div>
                    
                    <div class="col-md-12" id="center">
                            
                            <button class="btn btn-primary btn-block" name="submit" type="submit" 
                                id="list" style="height: 47px; margin-top: -2px;">Book</button>
                                        
                        </div>

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </form>
    <!-- Booking End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">Make M</span>Y Jounery</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed
                    vero lorem dolor dolor</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Review</a>
                    <!-- <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                
                <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>-->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <!--<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
           <div class="d-flex flex-column justify-content-start">
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
            </div>-->
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Surat,India</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+91 9328653090</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;"
                            placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <!--<div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white-50">Designed by <a href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>-->
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        $('.Date').datepicker({
            minDate: 0,
            maxDate: '3M',
            dateFormat: 'yy-mm-dd'
        });
        $(".valid").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('.valid').attr("maxlength", "2");


        $('.fromTo').on('keypress', function(event) {
            var x = event.which || event.keyCode;
            if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32) {
                return true;
            } else {
                return false;
            }

            $("#totalPrice").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
            $('#totalPrice').attr("maxlength", "2");

        })

        $('.fromTo').attr("maxlength", "20");
        $('.packageName').on('keypress', function(event) {
            var x = event.which || event.keyCode;
            if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32) {
                return true;
            } else {
                return false;
            }


        })
        $('#travllerName').on('keypress', function(event) {
            var x = event.which || event.keyCode;
            if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32) {
                return true;
            } else {
                return false;
            }


        })
    });

    // null value check 

    function checkNull() {
        var travllerName = document.getElementById("travllerName").value;
        var BookingDate = document.getElementById("BookingDate").value;
        var ArrivalDate = document.getElementById("ArrivalDate").value;
        var DepartureDate = document.getElementById("departureDate").value;
        var From = document.getElementById("from").value;
        var To = document.getElementById("to").value;
        var NumberOfAdult = document.getElementById("Adult").value;
        var NumberOfChild = document.getElementById("Child").value;
        var advancePayment = document.getElementById("advancePayment").value;
        if (travllerName == "") {
            document.getElementById('TnError').innerHTML = "**please enter the travller name";
            return false;
        } else if (BookingDate == "") {
            document.getElementById('BdError').innerHTML = "**please select the Booking date";
            return false;
        } else if (ArrivalDate == "") {
            document.getElementById('AdError').innerHTML = "**please select the Arrival date";
            return false;
        } else if (DepartureDate == "") {
            document.getElementById('DdError').innerHTML = "**please select the departure date";
            return false;
        } else if (From == "") {
            document.getElementById('FError').innerHTML = "**please enter the field";
            return false;
        } else if (To == "") {
            document.getElementById('TError').innerHTML = "**please enter the field";
            return false;
        } else if (NumberOfAdult == "") {
            document.getElementById('NoaError').innerHTML = "**please enter the Number of Adult";
            return false;
        } else if (NumberOfChild == "") {
            document.getElementById('NocError').innerHTML = "**please enter the Number of Child";
            return false;
        } else if (advancePayment == "") {
            document.getElementById('ApError').innerHTML = "**please enter the minimum advance ";
            return false;
        } else {
            document.getElementById('TnError').innerHTML = "";
            document.getElementById('BdError').innerHTML = "";
            document.getElementById('AdError').innerHTML = "";
            document.getElementById('FError').innerHTML = "";
            document.getElementById('TError').innerHTML = "";
            document.getElementById('NoaError').innerHTML = "";
            document.getElementById('DdError').innerHTML = "";
            document.getElementById('ApError').innerHTML = "";

        }

    }
    </script>
    <script>
function Total() {
  var amtOfAdult = document.getElementById('adultPrice').value;
  var amtOfChild = document.getElementById('childPrice').value;
  var sum = parseInt(amtOfAdult) + parseInt(amtOfChild);
  var total = document.getElementById("total");
  total.value = sum;
}
        </script>
</body>

</html>