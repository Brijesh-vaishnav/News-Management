<?php
include('includes/config.php');

?>
<html>
  <head>
    <title>User Subscription Details</title>
      <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">

    <style>
      body {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }

      .details {
        box-shadow: 0 2px 50px rgba(8, 112, 184, 0.7);
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 500px;
        padding: 30px;
        border-radius: 5px;
        background-color: #fff;
      }

      .user-details,
      .subscription {
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 18px;
      }

      .user-details span,
      .subscription span {
        font-weight: bold;
      }

      .subscription {
        border-top: 1px solid #ccc;
        padding-top: 20px;
        margin-top: 20px;
      }

      .subscription div {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .subscription div span {
        min-width: 180px;
      }

      @media (max-width: 768px) {
        .details {
          width: 90%;
          padding: 20px;
        }

        .subscription div span {
          min-width: 120px;
        }
      }
    </style>
  </head>
  <body>
      <!-- Navigation -->
  <?php include('includes/header.php'); ?>
    <div class="details">
      <div class="user-details">
        <div>
          <span>Email:</span> <?php echo $_SESSION["login"] ?>
        </div>
        <div>
          <span>Name:</span>
          <?php 
            $whoIsLoggedIn=$_SESSION["login"];
            $query=mysqli_query($con,"select * from user where email='$whoIsLoggedIn'");
            $row=mysqli_fetch_assoc($query);
            echo $row["fname"]." ".$row["lname"];
          ?>
        </div>
      </div>
      <?php  
          $query = mysqli_query($con, "select * from subscriber where subscribed_user_email='$whoIsLoggedIn'");
          $row = mysqli_fetch_assoc($query);
      ?>
      <div class="subscription">
        <div>
          <span>Subscription Taken on:</span>
          <?php echo date("d-m-Y",strtotime($row["subscription_date"])); ?>
        </div>
        <div>
          <span>Susbscription Ending On:</span>
          <?php echo date("d-m-Y",strtotime($row["subscription_end_date"])); ?>
        </div>
        <div>
          <span>Remaining Period:</span>
          <?php
            $endDate = $row["subscription_end_date"];
            $todayDate = date("Y-m-d");
            $diff = date_diff(date_create($todayDate), date_create($endDate));
            echo $diff->format('%m months %d days');
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
