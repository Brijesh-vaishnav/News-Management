<?php



date_default_timezone_set('Asia/Kolkata');
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'newsportal');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_query($con, "DELETE FROM advertisement WHERE  validity < NOW()");
$result = mysqli_query($con, "select * from subscriber where now()>subscription_end_date");

function moveToSubscription_history($con,$email, $subscription_start_date, $subscription_end_date)
{
    $query = "INSERT INTO subscription_history (subscriber_email, subscription_start_date, subscription_end_date) 
    VALUES ('$email', '$subscription_start_date', '$subscription_end_date')";
    mysqli_query($con, $query);
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row["subscriber_mail"];
    $start_date = $row['subscription_start_date'];
    $end_date = $row['subscription_end_date'];
    moveToSubscription_history($con,$email, $start_date, $end_date);
}
mysqli_query($con, "delete from subscriber where now()>subscription_end_date ");


// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
