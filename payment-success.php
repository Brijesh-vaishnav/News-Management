
<?php

include('includes/config.php');
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>document.location='./admin/login.php' </script>";
}
// $price = $_GET["price"];
$msg=null;
$error=null;

 {

    $whoIsLoggedIn = $_SESSION["login"];
    $months=$_POST["period"];
    $currentDateTime = date('Y-m-d H:i:s');
    $validity = date('Y-m-d H:i:s', strtotime($currentDateTime . " +$months months"));
    $sql="insert into subscriber(subscription_date,subscription_end_date,subscribed_user_email) values (now(),'$validity','$whoIsLoggedIn')" ;
    mysqli_query($con,$sql) or die(mysqli_error($con));
    echo "<script>alert('Subscription Added')</script>";
    echo "<script>document.location='./subscription-details.php' </script>";
}
?>