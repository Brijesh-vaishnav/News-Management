<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $loginas = $_POST["loginas"];
    $flag=false;
    // echo "<script>alert('$loginas');</script>";
    $uname = $_POST['username'];
    $password = ($_POST['password']);
    if ($loginas == "Employee") {


      
        // echo "<script>alert('$loginas');</script>";

        // Fetch data from database on the basis of username/email and password
        $sql = mysqli_query($con, "SELECT emp_mail,emp_password,emp_role_id FROM employee WHERE (emp_mail='$uname' && emp_password='$password')");
        $num = mysqli_fetch_array($sql);

        if ($num > 0) {

        //  echo "<script>alert('employee found');</script>";
          

            $_SESSION['login'] = $_POST['username'];
            $_SESSION['utype'] = $num['emp_role_id'];
        
            $_SESSION['type'] = $loginas;

            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    } else if ($loginas == "Advertiser") {
        $sql = mysqli_query($con, "SELECT * FROM advertiser WHERE (mail='$uname' && password='$password')") or die(mysqli_error($con));
        //  echo "<script>alert('$loginas');</script>";
        
        $num = mysqli_fetch_array($sql);
        echo print_r($num);  
    
        if (($num) > 0) {

            $_SESSION['login'] = $_POST['username'];
         
            $_SESSION['type'] = $loginas;
            
            echo "<script type='text/javascript'> document.location = 'advertiser_dashboard.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
    else{
        $sql = mysqli_query($con, "SELECT * FROM user WHERE (email='$uname' && password='$password')");
    //  echo "<script>alert('$loginas');</script>";
        
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {

            $_SESSION['login'] = $_POST['username'];
        
            $_SESSION['type'] = $loginas;
                  
            echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    
          

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News Portal.">
    <meta name="author" content="PHPGurukul">


    <!-- App title -->
    <title>News Portal</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase" style="color:white">
                                    Login
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post" action="./login.php">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group ">


                                        <div class="col-xs-12">
                                            Login as:
                                            <select name="loginas" style="height:50px;width:100%;background:transparent">
                                                <option value="user">User</option>
                                                <option value="Advertiser">Advertiser</option>
                                                <option value="Employee">Employee</option>
                                             
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                        </div>
                                    </div>





                                </form>

                                <div class="clearfix"></div>
                                <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
                            </div>
                        </div>
                        <!-- end card-box-->

                        <div>
                            <a href="register.php">Don't have an Account?</a>
                        </div>


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>