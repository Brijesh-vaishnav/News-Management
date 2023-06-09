<?php
session_start();
include('includes/config.php');

$error = "";
$msg = "";
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //Current Password hashing 
        $password = $_POST['password'];

        $whoIsLoggedIn = $_SESSION['login'];
        // new password hashing 
        $newpassword = $_POST['newpassword'];
    
        if ($_SESSION["type"] == "Employee") {
            $sql = mysqli_query($con, "SELECT emp_password FROM  employee where emp_mail='$whoIsLoggedIn'");
            $num = mysqli_fetch_array($sql);
            if ($num > 0) {
                $dbpassword = $num['emp_password'];
                
                if ($dbpassword == $password) {
                    echo "<script>alert('updating employee password');</script>";

                    $con = mysqli_query($con, "update employee set emp_password='$newpassword' where emp_mail='$whoIsLoggedIn'");
                    $msg = "Password Changed Successfully !!";
                }
            } else {
                $error = "Old Password not match !!";
            }
        }
        if ($_SESSION["type"] == "user") {
            $sql = mysqli_query($con, "SELECT * FROM  employee where email='$whoIsLoggedIn'");
            $num = mysqli_fetch_array($sql);
            if ($num > 0) {
                $dbpassword = $num['password'];

                if ($dbpassword == $password) {

                    $con = mysqli_query($con, "update user set password='$newpassword' where email='$whoIsLoggedIn'");
                    $msg = "Password Changed Successfully !!";
                }
            } else {
                $error = "Old Password not match !!";
            }
        }
        if ($_SESSION["type"] == "advertiser") {
            $sql = mysqli_query($con, "SELECT password FROM  advertiser where mail='$whoIsLoggedIn'");
            $num = mysqli_fetch_array($sql);
            if ($num > 0) {
                $dbpassword = $num['password'];

                if ($dbpassword == $password) {

                    $con = mysqli_query($con, "update advertiser set password='$newpassword' where mail='$whoIsLoggedIn'");
                    $msg = "Password Changed Successfully !!";
                }
            } else {
                $error = "Old Password not match !!";
            }
        }
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Newsportal | Add Category</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Change Password</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>

                                        <li class="active">
                                            Change Password
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Change Password </b></h4>
                                    <hr />



                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!---Success Message--->
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>


                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-md-10">
                                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Current Password<span style="color: red;"> *</span></label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="password" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">New Password<span style="color: red;"> *</span></label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="newpassword" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Confirm Password<span style="color: red;"> *</span></label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" value="" name="confirmpassword" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>


                                    </div>











                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>