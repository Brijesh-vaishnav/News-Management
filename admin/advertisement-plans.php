<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> | Manage Advertisement Plans</title>
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
        
        <?php include('includes/advertiserSidebar.php'); ?>
        <!-- Begin page -->
        <div id="wrapper">
            <?php include('includes/topheader.php'); ?>

            <!-- Top Bar Start -->

            <!-- ========== Left Sidebar Start ========== -->
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> Advertisement Plans</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Advertisement Plans </a>
                                        </li>
                                        <li class="active">
                                             Advertisement Plans
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->











                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                   
                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Plan Price</th>
                                                    <th>Plan  Duratioin</th>

                                               

                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select * from  advertise_plans");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['plan_price']); ?></td>
                                                        <td><?php echo htmlentities($row['plan_duration']); ?>  Hour</td>

                                                        
                                                    </tr>
                                                <?php
                                                    $cnt++;
                                                } ?>
                                            </tbody>

                                        </table>
                                    </div>




                                </div>

                            </div>


                        </div>
                        <!--- end row -->






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
