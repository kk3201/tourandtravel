<?php
@session_start();

include('conn.php');
?>

<!-- Genreate a pdf  -->
<?php
$ranInvoiceId = rand(10000, 99999);
$_SESSION['ranInvoiceId'] = $ranInvoiceId;
if (isset($_POST['btnPdf'])) {
    $totalPerson = $_POST['totalPerson'];
    $from = $_POST['From'];
    $date = $_POST['departureDate'];
    $_SESSION['totalPerson'] = $totalPerson;
    $_SESSION['From'] = $from;
    $_SESSION['date'] = $date;
    echo "<script>alert('Pdf is Create Please Download it');window.location.href='pdf.php'</script>";
}
?>
<!-- For Weather
<?php
// $apiKey = "747a7aa07e239a2d588e8ca07968f018";  // Replace with your actual API key
// $cityName ="" ; // You should use the city ID, not the city name. This is a placeholder for Moscow.
// $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&lang=en&units=metric&APPID=" . $apiKey;

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_VERBOSE, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// $response = curl_exec($ch);

// curl_close($ch);
// $data = json_decode($response);
// $currentTime = time();
?> -->
<!-- Booking -->
<?php

// if (isset($_POST['btndata'])) {
//     $id = $_SESSION['sesLoginDetails']['customerId'];
//     $name = $_SESSION['sesLoginDetails']['fullName'];
//     $Emailid = $_SESSION['sesLoginDetails']['email'];
//     $packageName = $_POST['PackageName'];
//     $_SESSION['packageName'] = $packageName;
//     $fromplace = $_POST['From'];
//     $_SESSION['frompalce'] = $fromplace;
//     $toplace = $_POST['To'];
//     $_SESSION['toplace'] = $toplace;
//     $departureDate = $_POST['departureDate'];
//     $_SESSION['departureDate'] = $departureDate;
//     $noOfPerson = $_POST['totalPerson'];
//     $_SESSION['noOfPerson'] = $noOfPerson;
//     $total = $_POST['TotalPrice'];
//     $_SESSION['total'] = $total;
//     $date = date('Y-m-d');
//     $_SESSION['currentDate'] = $date;
//     // Get the package ID
//     $ab = "SELECT packageId FROM package WHERE packageName='$packageName'";
//     $result = mysqli_query($conn, $ab);
//     $row = mysqli_fetch_assoc($result);
//     $packageId = $row['packageId'];
//     $_SESSION['packageidBook'] = $packageId;
//     // echo"<script>window.location.href='payment_process.php'</script>";
//     $insert_query = "INSERT INTO booking(customerId, packageId,customerName,fromplace,toplace,bookingdate,departureDate,numberOfPerson,totalPrice,status)VALUES('$id','$packageId','$name','$fromplace','$toplace','$date','$departureDate','$noOfPerson','$total','Confirm')";
//     mysqli_query($conn, $insert_query);
//     // echo "<script>alert('Your Payment is done Sucessfully');</script>";
// }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                            <h4 class="text-white text-uppercase mb-md-3" id="weatherHumidity"></h4>
                            <h1 class="display-3 text-white mb-md-4"></h1>
                            <h4 class="text-white text-uppercase mb-md-3" id="weatherWind"></h4>

                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>-->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3" id="minTemperature"></h4>
                            <!--  <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>  -->
                            <h4 class="text-white text-uppercase mb-md-3" id="maxTemperature"></h4>
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
    <form method="post" id="packageForm">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-6">
                <div class="bg-light shadow" style="padding: 30px;">
                    <!-- <div class="row align-items-center" style="min-height: 60px;"> -->

                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Package Name</label>
                                <!-- <input type="dropDown" name="PackageName" class="form-control" > -->
                                <select class="form-control package" name="PackageName" id="PackageName">
                                    <option disabled selected>-- Select To Package --</option>
                                    <?php
                                    $records = mysqli_query($conn, "SELECT DISTINCT packageName From package");
                                    // Use select query here 

                                    while ($row = mysqli_fetch_array($records)) { ?>
                                        <option value="<?= $row['packageName'] ?> "><?= $row['packageName'] ?> </option>

                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <p id="errorMessage" style="color: red; display: none;">**please Select package</p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">From</label>
                                <input type="text" name="From" id="form" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">To</label>
                                <input type="text" name="To" id="To" class="form-control" disabled>
                            </div>
                        </div>

                    </div>


                    <div class="row p-t-20">

                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Total Person</label>
                                <input type="text" name="totalPerson" id="totalPerson" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <?php
                                // Set the new timezone
                                date_default_timezone_set('Asia/Kolkata');
                                $departureDate = date('y-m-d');
                                ?>
                                <label class="control-label">Departure Date</label>
                                <input type="date" name="departureDate" id="departureDate" class="form-control form-control-danger">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Total</label>
                                <input type="text" name="TotalPrice" id="total" class="form-control form-control-danger" disabled>
                            </div>
                        </div>
                        <div class="col-md-12" id="center">
                            <input type="button" class="btn btn-primary btn-block" name="btndata" value="Book Now" id="btnBook">
                            <br>
                        </div>



                        <!-- <div class="col-md-12" id="center">
                            <input type="submit" class="btn btn-primary btn-block" name="btndata" value="Book">
                        </div> -->
                        <!-- </div> -->
                    </div>

                </div>
                <!--   -->

            </div>

            <!-- extra -->

    </form>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Package Name:</label>
                            <input type="text" class="form-control" id="billPackageName" disabled>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">From:</label>
                            <input type="text" class="form-control" id="billFrom">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">To:</label>
                            <input type="text" class="form-control" id="billTo">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Total Person:</label>
                            <input type="text" class="form-control" id="billTotalPerson">
                        </div> -->
    <!-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Total Price:</label>
                            <input type="text" class="form-control" name="amt" id="billTotalPrice">
                        </div> -->
    <!-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Date:</label>
                            <input type="text" class="form-control" id="billDate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="paynow()">Pay Now </button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Booking End -->

    <!--Payment-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnBook").click(function() {
                var totalPrice1 = $('input[name="TotalPrice"]').val();
                var options = {
                    "key": "rzp_test_mpN3TstpS4GFPc",
                    "amount": totalPrice1 * 100,
                    "currency": "INR",
                    "name": "Make My Journey",
                    "description": "Make My Journey",
                    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                    "handler": function(response) {
                        if (response.razorpay_payment_id) {
                            var pid = response.razorpay_payment_id;
    var pName = document.getElementsByName("PackageName")[0].value;
    var fromplace = document.getElementsByName("From")[0].value;
    var toplace = document.getElementsByName("To")[0].value;
    var totalPerson = document.getElementsByName("totalPerson")[0].value;
    var departureDate = document.getElementsByName("departureDate")[0].value;
    var totalPrice = document.getElementsByName("TotalPrice")[0].value;
                            $.ajax({
                                type: "POST",
                                url: "AddBooking.php",
                                data: {
                                    pid: pid,
                                    pName: pName,
                                    fromplace: fromplace,
                                    toplace: toplace,
                                    totalPerson: totalPerson,
                                    departureDate: departureDate,
                                    totalPrice: totalPrice
                                },
                                success: function(data) {
                                    window.location.href = 'Invoice.php';
                                },
                                error: function() {
                                    alert("An error occurred while adding the booking.");
                                }
                            });
                            // The form submission part seems redundant; you may remove it.

                        }
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();

                rzp1.on('payment.failed', function(response) {
                    alert(response.error.code);
                    alert(response.error.description);
                    alert(response.error.source);
                    alert(response.error.step);
                    alert(response.error.reason);
                });
            });
        });
    </script>










    <!-- Vaildation of book package -->
    <script>
        $(document).ready(function() {
            //     $('#departureDate').datepicker({
            //     minDate: 0,
            //     maxDate: '3M',
            //     dateFormat: 'yy-mm-dd'
            // });
            var $packageName = $("#PackageName");
            var $from = $("#form");
            var to = $("#To");
            var $totalperson = $("#totalPerson");
            var $modelPackageName = $("#billPackageName");
            var $modelfrom = $("#billFrom");
            var $modelto = $("#billTo");
            var $modeltotalperson = $("#billTotalPerson")

            $packageName.on("input", function() {
                // Get the value from the source textbox
                var packageName = $packageName.val();
                // Set the value of the target textbox to the source value
                $modelPackageName.val(packageName);
                $modelto.val(packageName);

            });
            $from.on("input", function() {
                var from = $from.val();
                $modelfrom.val(from);

            });

            $totalperson.on("input", function() {
                var totalperson = $totalperson.val();

            });


            $("select.package").change(function() {
                var selected = $(this).children("option:selected").val();
                // alert(selected);
                $("#To").val(selected);



            });
            //vaildation for Total Person
            $('input[name="totalPerson"]').on('keypress', function(event) {
                var x = event.which || event.keyCode;
                if (x >= 47 && x <= 57) {
                    return true;
                } else {
                    return false;
                }
            })
            $('input[name="totalPerson"]').attr("maxlength", "2");

            //from
            $('input[name="From"]').on('keypress', function(event) {
                var x = event.which || event.keyCode;
                if ((x >= 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32) {
                    return true;
                } else {
                    return false;
                }
            })
            $('input[name="fname"]').attr("maxlength", "30");

                    $('#departureDate').on('change', function() {
                // Get today's date
                var today = new Date();
                today.setHours(0, 0, 0, 0);

                // Get the selected date from the input
                var selectedDate = new Date($(this).val());

                // Set the maximum allowed date (3 months from today)
                var maxDate = new Date();
                maxDate.setMonth(today.getMonth() + 3);

                // Compare the selected date with the validation criteria
                if (selectedDate < today || selectedDate > maxDate) {
                    alert("Please select a date between tomorrow and the next 3 months.");
                    $(this).val(''); // Reset the input value
                }
            });
        });
    </script>
    <script>
        // Function to calculate and update the total price
        function updateTotalPrice() {
            var totalPerson = parseInt($("#totalPerson").val());
            var packageName = $("#PackageName").val();

            console.log("Total Persons: " + totalPerson);
            console.log("Package Name: " + packageName);

            if (totalPerson && packageName) {
                $.ajax({
                    type: "POST",
                    url: "get_price.php",
                    data: {
                        packageName: packageName
                    },
                    success: function(response) {
                        console.log("Response from get_price.php: " + response); // Log the response

                        var price = parseFloat(response);

                        if (!isNaN(price)) {
                            var totalPrice = totalPerson * price;
                            console.log("Total Price: " + totalPrice);

                            $("#total").val(totalPrice.toFixed(2));
                        } else {
                            console.log("Invalid Price: " + response); // Log the invalid price
                            $("#total").val("Invalid Price");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error: " + error); // Log AJAX errors
                        $("#total").val("Price not found");
                    }
                });
            }
        }

        // Attach event listeners for input changes
        $("#totalPerson, #PackageName").on("input", updateTotalPrice);
    </script>



    <script>
        var subdis;

        function subdistick() {
            var packageName = $("#PackageName").val();
            $.ajax({
                url: "subdistick.php",
                type: "POST",
                data: {
                    packageName: packageName
                },
                success: function(data) {
                    if (data !== "sub distict not found") {
                        subdis = data;
                        console.log("Sub-district value: " + data);
                        fetchWeatherData(data);
                    } else {
                        console.log("Sub-district not found");
                    }
                }
            });
        }

        // Attach event listener for input change
        $("#PackageName").on("change", subdistick);

        function fetchWeatherData(data1) {
            const apiKey = "747a7aa07e239a2d588e8ca07968f018";
            var openWeatherUrl = "https://api.openweathermap.org/data/2.5/weather?q=" + data1 + "&lang=en&units=metric&APPID=" + apiKey;

            // Use HTTPS instead of HTTP for the API request for security
            $.get(openWeatherUrl, function(data) {
                    if (data.cod === 200) {
                        // const currentTime = new Date(data.dt * 1000);
                        // $("#weatherCity").text(data.name + " Weather Status");
                        // $("#weatherTime").text("Time: " + currentTime.toLocaleTimeString());
                        // $("#weatherDate").text("Date: " + currentTime.toLocaleDateString());
                        //  $("#weatherDescription").text("Description: " + data.weather[0].description);
                        $("#maxTemperature").text("Max Temp: " + data.main.temp_max + "°C");
                        $("#minTemperature").text("Min Temp: " + data.main.temp_min + "°C");
                        $("#weatherHumidity").text("Humidity: " + data.main.humidity + "%");
                        $("#weatherWind").text("Wind: " + data.wind.speed + " km/h");
                    } else { 
                        $("#maxTemperature").text("");
                        $("#minTemperature").text("");
                        $("#weatherHumidity").text("");
                        $("#weatherWind").text("");
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching weather data: " + errorThrown);
                });
        }
    </script>


</body>


</html>