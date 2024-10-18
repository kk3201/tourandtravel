<?php
// put your code here

session_start();
error_reporting(0);
include("conn.php");
?>
<?php
// put your code here
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pas = md5($pass);
	$_SESSION['normalpass'] = $pass;
	$sql = "SELECT * FROM customer where email='$email'and password='".md5($pass)."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	$num = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$count = mysqli_num_rows($query);
	$_SESSION['sesLoginDetails'] = $row;
	//email id exists or not 
	// $check_query = mysqli_query($conn, "SELECT * FROM tblusers where EmailId ='$email'");
    // if (!mysqli_num_rows($check_query)) {
    //     echo '<script>alert("Email Id is not exists!")</script>';
	// }
	if ($count == 0) {
		$msg = "Invalid email or password";
		echo "<script>alert('$msg');</script>";
		echo "<script>window.location.href='Login.php'</script>";
	} else {
		if (isset($_POST['remember'])) {

			//set cookie
			setcookie('emailsave', $email, time() + (86400 * 30));
			setcookie('passsave', $pass, time() + (86400 * 30));
			echo '<script>alert("cookie set ")</script>';
			$_SESSION['sesLog'] = "Logout";
			echo "<script>window.location.href='Homepage.php'</script>";
		}
		$_SESSION['sesLog'] = "Logout";
		echo "<script>window.location.href='Homepage.php'</script>";
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!--    <script src="loginReexp.js"></script>-->
	<title> Login Form</title>
</head>

<body>
	<form onsubmit="return validation()" method="post">
		<section class="_form_05">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="_form-05-box">
							<div class="row">
								<div class="col-sm-5 _lk_nb">
									<div class="form-05-box-a">
										<div class="_form_05_logo">
											<h2>Welcome </h2>
											<p>Login here and enjoy your trip...</p>
										</div>
										<!-- <div class="_form_05_socialmedia">
                      <ol>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>Sign With Facebook</li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a>Sign With Twitter</li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a>Sign With Google</li>
                      </ol>
                    </div>-->
									</div>
								</div>
								<div class="col-sm-7 _nb-pl">

									<div class="_mn_df">
										<div class="main-head">
											<h2>Login to your account</h2>
										</div>

										<div class="form-group" role="form">
											<input type="email" name="email" id="email" class="form-control" type="text" placeholder="Enter Email" value='<?php if (isset($_COOKIE["emailsave"])) {
																																								echo $_COOKIE["emailsave"];
																																							} ?>' aria-required="true">
											<span id="emailError"></span>
										</div>

										<div class="form-group">
											<input type="password" name="pass" id="pass" class="form-control" type="text" placeholder="Enter Password" value='<?php if (isset($_COOKIE["passsave"])) {
																																									echo $_COOKIE["passsave"];
																																								} ?>' aria-required="true">
											<span id="passwordError"></span>
										</div>

										<div class="checkbox form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" value="<?php if (isset($_COOKIE["emailsave"]) && isset($_COOKIE["passsave"])) {
																															echo 'checked';
																														} ?>" id="">

												Remember me

											</div>
											<a href="EmailId.php" name="forgetEmail">Forgot Password</a>
										</div>

										<div class="form-group">

											<button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
											<!--                  <span>
                  <?php
					//                   if(isset($_SESSION['message']))
					//                   {
					//                    echo $_SESSION['message'];
					//
					//                   }
					//                   unset($_SESSION['message']);
					?>
          </span>-->
										</div>
										<center>
											<a href="Registration.php">Click here of Registration</a>
										</center>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>
	<script>
		function validation() {

			var email = document.getElementById("email").value;
			var password = document.getElementById("pass").value;
			var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z.]{3,}[.]{1}[A-Za-z]{2,6}$/;
			var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-z0-9!@#$%^&*]{5,12}$/;
			if(email==="")
			{
				document.getElementById('emailError').innerHTML = "Email Feild is Blank";
				return false;
			}
			if (emailCheck.test(email)) {
				document.getElementById('emailError').innerHTML = "";
				
			} else {
				document.getElementById('emailError').innerHTML = "**Email is invaild";
				return false;
			}
			if(password==="")
			{
				document.getElementById('passwordError').innerHTML = "Password feild is Blank";
				return false;
			}
			if (passwordCheck.test(password)) {
				document.getElementById('passwordError').innerHTML = "";

			} else {
				document.getElementById('passwordError').innerHTML = "**password is invaild";
				return false;

			}
		}
	</script>

</body>

</html>