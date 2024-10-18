<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */ ?>
<?php

session_start();
error_reporting(0);
include('conn.php');
$name = $_SESSION['sesLoginDetails']['fullName'];
$mobileNumber = $_SESSION['sesLoginDetails']['phoneNo'];
$Emailid = $_SESSION['sesLoginDetails']['email'];
$pass = $_SESSION['sesLoginDetails']['password'];
$registerDate = $_SESSION['sesLoginDetails']['RegDate'];
//$updateDate=$_SESSION['sesLoginDetails']['UpdationDate'];
$normalpass = $_SESSION['normalpass'];

if (!isset($_SESSION['sesLoginDetails'])) {
    echo '<script>alert("please login first")</script>';
    echo "<script>window.location.href='Login.php'</script>";
}
if (isset($_POST['btnSave'])) {
    $newname = $_POST['fullName'];
    $newnumber = $_POST['mobileNumber'];
    $newemail = $_POST['email'];
    $newpass = md5($_POST['password']);


    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    //    echo '<br>'.$Emailid;



    $sql = "UPDATE customer SET fullName='$newname',phoneNo='$newnumber',email='$newemail',password='$newpass' WHERE email='$Emailid'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your profile is updated successfully');window.location.href='Profile.php'</script>";
    } else
        echo "<script>alert('Your profile is not updated');window.location.href='Profile.php'</script>";
}
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
                            <?php if (isset($_SESSION['sesLog'])) echo ' <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>'; ?>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <?php if (isset($_SESSION['sesLog'])) echo '<a href="Profile.php" class="dropdown-item">Profile</a>'; ?>
                                <!-- <a href="destination.php" class="dropdown-item">Destination</a> -->
                                <?php if (isset($_SESSION['sesLog'])) echo ' <a href="Review.php" class="dropdown-item">Review</a>'; ?>
                                <?php if (isset($_SESSION['sesLog'])) echo ' <a href="BookHistory.php" class="dropdown-item">Book Histroy</a>'; ?>
                            </div>
                        </div>
                        <a href="<?php if (isset($_SESSION['sesLog'])) echo 'Logout.php';
                                    else echo 'Login.php'; ?>" class="nav-item nav-link"><?php if (isset($_SESSION['sesLog'])) echo "Logout";
                                                                                            else echo "Login" ?></a>
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
                            <h4 class="text-white text-uppercase mb-md-3">Hello</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>-->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Hello</h4>
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
    <form method="post">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-6">
                <div class="bg-light shadow" style="padding: 30px;">
                    <!-- <div class="row align-items-center" style="min-height: 60px;"> -->

                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input type="text" name="fullName" class="form-control" value="<?php echo $name; ?>" <?php if (isset($_POST['btnUpdate'])) echo ""; else echo "disabled"; ?>>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Mobile Number</label>
                                <input type="text" name="mobileNumber" class="form-control" value="<?php echo $mobileNumber; ?>" <?php if (isset($_POST['btnUpdate'])) echo ""; else echo "disabled"; ?>>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Email Id</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $Emailid; ?>" <?php if (isset($_POST['btnUpdate'])) echo ""; else echo "disabled"; ?>>
                            </div>

                        </div>
                    </div>


                    <div class="row p-t-20">

                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-danger" value="<?php echo $normalpass; ?>" <?php if (isset($_POST['btnUpdate'])) echo ""; else echo "disabled"; ?>>

                            </div>
                        </div>

                    </div>


                    <div class="row p-t-20">
                    <div class="col-md-6 col-6">
                        <input type="submit" value="Edit" class="btn btn-block btn-primary font-weight-medium" name="btnUpdate" id="update" <?php if (isset($_POST['btnUpdate'])) echo "disabled"; else echo ""; ?>>
                    </div>
                    <div class="col-md-6 col-6">
                        <input type="submit" value="Save" class="btn btn-block btn-primary font-weight-medium" name="btnSave" id="save" <?php if (isset($_POST['btnUpdate'])) echo ""; else echo "disabled"; ?>> 
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </form>
    <!-- Booking End -->