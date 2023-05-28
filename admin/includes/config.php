<?php
date_default_timezone_set('Asia/Kolkata');
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'newsportal');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_query($con, "DELETE FROM advertisement WHERE  validity < NOW()");
mysqli_query($con, "delete from subscriber where now()>subscription_end_date ");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
