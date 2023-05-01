<?php
include('includes/config.php');
include("includes/sendmail.php");
session_start();

$usertype=$_POST["usertype"];
function resendOTP($con,$email,$usertype)
{
        
    
        $v_code = rand(1000, 9000);
        if($usertype=="user")
             mysqli_query($con, "update user set verification_code='$v_code' where email='$email' ");
        else
            mysqli_query($con, "update advertiser set verification_code='$v_code' where mail='$email' ");

        sendmail($email, $v_code,$usertype);
 
}


$email = $_POST["email"];
$query=null;
if($usertype=="user")
    $query = mysqli_query($con, "select * from user where email='$email'");
else
   $query=mysqli_query($con, "select * from advertiser where mail='$email'");
$row = mysqli_fetch_assoc($query);

if ($_POST['submit'] == "Submit") {
    if (!empty($query)) {
        if ($row["verification_code"] == $_POST["otp"]) {
            echo "<script>alert('Registration Successfull')</script>";
            if($usertype=="user")
            mysqli_query($con, "update user set is_verified=1 where email='$email' ");
            else   
            mysqli_query($con, "update advertiser set is_verified=1 where mail='$email' ");
        echo "<script>document.location='./login.php'</script>";

        } else {
            echo "<script>alert('Invalid Otp, another otp has been sent to you')</script>";
            resendOTP($con,$email,$usertype);
            
        }
    }
}

if ($_POST['submit'] == "Resend OTP") {
    echo "<script>alert(' Otp has been sent to you')</script>";
    resendOTP($con,$email,$usertype);
}

