<?php
session_start();
//  error_reporting(0);
// if(isset($_SESSION['sesLoginDetails']))
// {
//     echo "<script>alert('You have not Login at yet');window.location.href='Login.php'</script>";

// }
include ('conn.php');
$name = $_SESSION['sesLoginDetails']['fullName'];
// $Emailid = $_SESSION['sesLoginDetails']['email'];
$id = $_SESSION['sesLoginDetails']['customerId'];

// echo "<pre>";
// print_r($_SESSION['sesLoginDetails']);
// echo"</pre>";

if (isset($_POST['btnsubmit'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = $_SESSION['sesLoginDetails']['email'];

    $sql = "INSERT INTO feedback(customerId,Subject,Message,email) VALUES('$id','$subject','$message','$email')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Your Feedback is submitted');window.location.href='Homepage.php'</script>";
    }
    else
        echo "<script>alert('Your feedback is not submitted');window.location.href='contact.php'</script>";
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
                      
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                     
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
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                               
                                <?php if(isset($_SESSION['sesLog'])) echo '<a href="Profile.php" class="dropdown-item">Profile</a>'; ?>
                                
                               
                                <a href="destination.php" class="dropdown-item">Destination</a>
                                <a href="Review.php" class="dropdown-item">Review</a>
                                <?php if(isset($_SESSION['sesLog'])) echo ' <a href="contact.php" class="dropdown-item">Contact</a>'; ?>
                                
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
                    <h3 class="display-4 text-white text-uppercase">Contact</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Contact</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->




        <!-- Contact Start -->

        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                    <h1>Contact For Any Query</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form bg-white" style="padding: 30px;">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate" method="post">
                               
                                <div class="control-group">
                                    <input type="text" class="form-control p-4" id="subject" placeholder="Subject" name="subject"
                                           required="required" data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="message"
                                              required="required"
                                              data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton" name="btnsubmit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="" class="navbar-brand">
                        <h1 class="text-primary"><span class="text-white">Make M</span>Y Jounery</h1>
                    </a>
                    <p>Hi</p>
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
    </body>

</html>