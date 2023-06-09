<?php

include('includes/config.php');

error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Portal | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
        body {
            background-color: #E0E0E0;
        }

        .card-pricing.popular {
            z-index: 1;
            border: 1px solid #007bff;
        }

        .card-pricing .list-unstyled li {
            padding: .5rem 0;
            color: #6c757d;
            font-weight: 300;
        }

        .btn {
            border-radius: 1px;
            font-weight: 300;
        }

        .hvr:hover {

            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff !important;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <?php

    if (!isset($_SESSION["login"])) {
        echo "<script>document.location='./admin/login.php' </script>";
    }

    ?>
    <?php
    $query = mysqli_query($con, "Select * from  subscription_plans");
    $cnt = 1;
   ?>

    <div class="container mb-5 mt-5 " style="display:flex;flex-direction: column;justify-content: center;height:100vh">
        <div class="pricing card-deck flex-column flex-md-row mb-3 " style="width:100%;display:flex;justify-content:space-between">
        <?php  while ($row = mysqli_fetch_array($query)) { ?>
  
            <div class="card card-pricing text-center mb-4" style="padding: 60px 40px;">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm"><?php echo $row["plan_duration"] ?> Month</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">Rs <span class="price"><?php echo $row["plan_price"] ?></span><span class="h6 text-muted ml-2"></span></h1>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">

                    </ul>
                    <a href="payment-page.php?price=<?php echo $row["plan_price"] ?>&period=<?php echo $row["plan_duration"] ?>" class="btn btn-outline-secondary mb-3 hvr">Buy Now</a>
                </div>
            </div>
            <?php } ?> 
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>