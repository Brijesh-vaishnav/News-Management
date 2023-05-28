<?php
session_start();
include('includes/config.php');
// error_reporting(0);
$msg="";
$error="";
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $aid = $_GET['said'];
        $email = $_POST['adminusernmae'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $query = mysqli_query($con, "Update  employee set emp_mail='$email', emp_fname='$fname',emp_lname='$lname'  where emp_role_id 	=0 && emp_mail='$aid'");
        if ($query) {
            echo "<script>alert('Operator details updated.');</script>";
            echo "<script>document.location='./manage-operators.php'</script>";
        } else {
            echo "<script>alert('Something went wrong . Please try again.');</script>";
        }
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Newsportal |Edit Operator</title>

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
                                    <h4 class="page-title">Edit Operator</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Operator </a>
                                        </li>
                                        <li class="active">
                                            Edit Operator
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
                                    <h4 class="m-t-0 header-title"><b>Edit Operator </b></h4>
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

                                    <?php
                                    $aid = ($_GET['said']);
                                    $query = mysqli_query($con, "Select * from  employee where emp_role_id 	=0 && emp_mail='$aid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>




                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" name="suadmin" method="post">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Email<span style="color: red;"> *</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['emp_mail']); ?>" name="adminusernmae" >
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">First Name<span style="color: red;"> *</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['emp_fname']); ?>" name="fname" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Last Name<span style="color: red;"> *</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['emp_lname']); ?>" name="lname" >
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                   
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Update
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
        <!-- END wrapper -->



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