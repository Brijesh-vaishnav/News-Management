<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','newsportal');
// error_reporting(0);
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// error_reporting(0);
session_start();
//clear user subscription if he has taken any(even advertiser can take subscription)

    mysqli_query($con, "delete from subscriber where now()>subscription_end_date ");

//delete advertise if it is expired

        mysqli_query($con, "DELETE FROM advertisement WHERE  validity < NOW()");
    


?>