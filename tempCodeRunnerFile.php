<?php  
        // put your code here
        //database connection
        if(isset($_POST['submit']))
        {
  

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pincode=$_POST['pincode'];
        $registerDate = $_POST['registerDate'];
        $pass=$_POST['pass'];
        $pass = md5($pass);
        
         mysqli_query($conn,"insert into customer(firstName,lastName,email,phoneNo,pincode,registerDate,password) values('$fname','$lname','$email','$phone','$pincode','$registerDate','$pass')");
         
         echo "<script>window.location.href='Login.php'</script>";
      
      }
?>