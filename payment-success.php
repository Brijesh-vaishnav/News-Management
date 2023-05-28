
<?php

include('includes/config.php');
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
        $sql="insert into subscriber (subscription_date,subscription_end_date,subscribed_user_email) values (Now(),'$validity','$whoIsLoggedIn')  " ;
        mysqli_query($con,$sql);
        echo "<script>alert('Subscription Added')</script>";
        echo "<script>document.location='./subscription-details.php' </script>";
    }
    if($_SESSION["type"]=="Advertiser")
    {
       $advertise_id=$_POST["advertise_id"];
        $hours = $_POST["period"];
        //  echo "<script> alert('$period') </script>";
        $query = "UPDATE advertisement SET paymentstatus = 1,payment_done_on=now(), validity = NOW() + INTERVAL ? HOUR where advertise_id='$advertise_id'";

        // Bind the value of the "period" parameter to the query
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $hours);
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Advertise Added')</script>";
        echo "<script>document.location='./' </script>";
    }
}
?>