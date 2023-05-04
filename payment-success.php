
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
    if($_SESSION["type"]=="user")
    {
        $months=$_POST["period"];
        $currentDateTime = date('Y-m-d H:i:s');
        $validity = date('Y-m-d H:i:s', strtotime($currentDateTime . " +$months months"));
        $sql="" ;
        mysqli_query($con,$sql) or die(mysqli_error($con));
        echo "<script>alert('Subscription Added')</script>";
        echo "<script>document.location='./subscription-details.php' </script>";
    }
    if($_SESSION["type"]=="Advertiser")
    {
       
        $hours = $_POST["period"];
        $query = "UPDATE advertisement SET paymentstatus = 1,payment_done_on=now(), validity = NOW() + INTERVAL ? HOUR where advertiser_mail='$whoIsLoggedIn'";

        // Bind the value of the "period" parameter to the query
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $hours);
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Advertise Added')</script>";
        echo "<script>document.location='./' </script>";
    }
}
?>