<?php
@session_start();
include('conn.php');
$sql = "SELECT * FROM package";
$all_package = $conn->query($sql);
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
    <!--<div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>-->
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


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
    <form method="post">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-6">
                <div class="bg-light shadow" style="padding: 30px;">
                    <!-- <div class="row align-items-center" style="min-height: 60px;"> -->

                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Filter By</label>
                                <!-- <input type="text" name="password" class="form-control form-control-danger"> -->
                                <select class="form-control" name="FilterBy" id="filterBy">
                                    <option hidden>-- Filter By --</option>
                                    <option  value="PackageName">Package Name</option>
                                    <option  value="Start&EndPrice">Start & End Price</option>
                                    
                                    <option  value="Days">Days</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4" id="PackageName" style="display: none;">
                            <div class="form-group">
                                <label class="control-label">Package Name</label>
                                <input type="text" name="packageName" id="packageSearch" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4" id="StartPrice" style="display: none;">
                            <div class="form-group">
                                <label class="control-label">Starting Price</label>
                                <input type="text" name="Range" id="SPrice" class="form-control Range" ?>
                            </div>
                        </div>
                        <div class="col-md-4" id="EndingPrice" style="display: none;">
                            <div class="form-group">
                                <label class="control-label">Ending Price</label>
                                <input type="text" name="Range" id="EPrice" class="form-control Range">
                            </div>
                        </div>

                        <div class="col-md-4" id="noOfDays" style="display: none;">
                            <div class="form-group has-danger">
                                <label class="control-label">No. of Days</label>
                                <input type="number" name="days" id="days" class="form-control form-control-danger">
                            </div>
                        </div>
                    </div>


                    <!-- 
                    <div class="col-md-12" id="center">

                        <button class="btn btn-primary btn-block" name="btnEdit" type="submit" id="list" style="height: 47px; margin-top: -2px;">Edit</button>
                    </div>
                    <div class="col-md-12" id="center">
                        <br>
                        <button class="btn btn-primary btn-block" name="btnUpdate" type="submit" id="list" style="height: 47px; margin-top: -2px;">Update</button>
                    </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </form>
    <!-- Booking End -->

    <!-- Packages Start -->
    <br>
    
    <div id="show"></div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">Make M</span>Y Jounery</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p>
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

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Surat,India</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+91 9328653090</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
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

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $("#filterBy").change(function() {
                var selectedOption = $(this).val();

                // Hide all fields initially
                $("#PackageName").hide();
                $("#StartPrice").hide();
                $("#EndingPrice").hide();
                $("#noOfDays").hide();

                // Show the relevant fields based on the selected option
                if (selectedOption === "PackageName") {
                    $("#PackageName").show();
                } else if (selectedOption === "Start&EndPrice") {
                    $("#StartPrice").show();
                    $("#EndingPrice").show();
                } else if (selectedOption === "Days") {
                    $("#noOfDays").show();
                }
            });
            $("#packageSearch").on("keyup", function() {
                var search_name = $(this).val();
                $.ajax({
                    url: "search.php",
                    type: "POST",
                    data: {
                        search: search_name
                    },
                    success: function(data) {
                        //console.log(search_name);
                        $('#show').html(data);
                    }

                });
            });

            $(".Range").on("keyup", function() {
                var search_Start = $("#SPrice").val();
                var search_End = $("#EPrice").val();
                $.ajax({
                    url: "ByPriceSearching.php",
                    type: "POST",
                    data: {
                        search_S_Price: search_Start,
                        search_E_Price: search_End
                    },
                    success: function(data) {
                        // console.log(search_Start);
                        // console.log(search_End);
                        $('#show').html(data);
                    }

                });
            });

            $("#days").on("keyup", function() {
                var search_days= $(this).val();
                $.ajax({
                    url: "ByDateSearching.php",
                    type: "POST",
                    data: {
                        search: search_days
                    },
                    success: function(data) {
                        //console.log(search_name);
                        $('#show').html(data);
                    }

                });
            });



    </script>

</body>

</html>