<?php

include('includes/config.php');
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>document.location='./admin/login.php' </script>";
}
$price = $_GET["price"];
$msg=null;
$error=null;
if (isset($_GET["submit"])) {

    $whoIsLoggedIn = $_SESSION["login"];
    $months=$_GET["period"];
    $currentDateTime = date('Y-m-d H:i:s');
    $validity = date('Y-m-d H:i:s', strtotime($currentDateTime . " +$months months"));
    $sql="insert into subscriber(subscription_date,subscription_end_date,subscribed_user_email) values (now(),'$validity','$whoIsLoggedIn')";
    $query2=mysqli_query($con,$sql);
    if ($query2) {
        $msg = "Subscribed Successfully";
    } else {
        $error = "Something went wrong, Please try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .checkbox.pull-right {
            margin: 0;
        }

        .pl-ziro {
            padding-left: 0px;
        }
    </style>
</head>

<body>
  
        <!---Success Message--->
        <?php if ($msg!=null) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
            </div>
        <?php } ?>

        <!---Error Message--->
        <?php if ($error!=null) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
            </div>
        <?php } ?>


 
    <div class="row">
        <div class="container">
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-4'>
                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                    <form accept-charset="UTF-8" action="" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                        <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'>Expiration</label>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'> </label>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12'>
                                <div class='form-control total btn btn-info'>
                                    Total:
                                    <span class='amount'><?php echo $_GET["price"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <?php 
                                    $period=$_GET["period"];
                                ?>
                                <a class='form-control btn btn-primary submit-button' href="payment-page.php?submit=true&&price=<?php echo $price ?>&period=<?php echo $period ?>">Pay »</a>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>
                                    Please correct the errors and try again.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-md-4'></div>
            </div>
        </div>
</body>

</html>