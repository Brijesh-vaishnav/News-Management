<?php
session_start();
include('includes/config.php');

// echo ($_SESSION["type"]!="Admin" && $_SESSION["type"]!="Operator");die();
if ($_SESSION["type"] != "Employee") {
    echo "<script>document.location='./login.php'</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>News Portal | Dashboard</title>
        <link rel="stylesheet" href="../plugins/morris/morris.css">

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
        <?php include('includes/leftsidebar.php'); ?>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php') ?>
            <!-- Top Bar End -->


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
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">NewsPortal</a>
                                        </li>
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <?php if ($_SESSION['utype'] == '1') : ?>

                                <a href="manage-operators.php">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-box widget-box-one">
                                            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                            <div class="wigdet-one-content">
                                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Operators</p>
                                                <?php $query = mysqli_query($con, "select * from employee where emp_role_id=0");
                                                $countcat = mysqli_num_rows($query);
                                                ?>

                                                <h2><?php echo htmlentities($countcat); ?> <small></small></h2>

                                            </div>
                                        </div>
                                    </div>
                                </a><!-- end col -->
                                <a href="manage-categories.php">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-box widget-box-one">
                                            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                            <div class="wigdet-one-content">
                                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
                                                <?php $query = mysqli_query($con, "select * from category where Is_Active=1");
                                                $countcat = mysqli_num_rows($query);
                                                ?>

                                                <h2><?php echo htmlentities($countcat); ?> <small></small></h2>

                                            </div>
                                        </div>
                                    </div>
                                </a><!-- end col -->
                                <a href="manage-subcategories.php">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-box widget-box-one">
                                            <i class="mdi mdi-layers widget-one-icon"></i>
                                            <div class="wigdet-one-content">
                                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Sub category</p>
                                                <?php $query = mysqli_query($con, "select * from subcategory where Is_Active=1");
                                                $countsubcat = mysqli_num_rows($query);
                                                ?>
                                                <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                </a>
                        </div>
                        <div class="row">
                            <a href="manage_subscription_plans.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Subscription Plans</p>
                                            <?php $query = mysqli_query($con, "select * from subscription_plans");
                                            $countsubcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>
                        <?php endif; ?>

                        <a href="manage-breaking-news.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Breaking News</p>
                                        <?php $query = mysqli_query($con, "select * from breaking_news");
                                        $countposts = mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>


                        <a href="trash-posts.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Trash News</p>
                                        <?php $query = mysqli_query($con, "select * from news where Is_Active=0");
                                        $countposts = mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                    </div>
                                </div>
                            </div>
                        </a>

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <a href="manage-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month"> News</p>
                                            <?php $query = mysqli_query($con, "select * from news where Is_Active=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>


                            <?php if ($_SESSION['utype'] == '1') : ?>
                                <a href="manage-authors.php">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-box widget-box-one">
                                            <i class="mdi mdi-layers widget-one-icon"></i>
                                            <div class="wigdet-one-content">
                                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Authors</p>
                                                <?php $query = mysqli_query($con, "select * from author");
                                                $countsubcat = mysqli_num_rows($query);
                                                ?>
                                                <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </a>

                                <a href="manage-advertisers.php">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-box widget-box-one">
                                            <i class="mdi mdi-layers widget-one-icon"></i>
                                            <div class="wigdet-one-content">
                                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month"> Advertisers</p>
                                                <?php $query = mysqli_query($con, "select * from advertiser");
                                                $countposts = mysqli_num_rows($query);
                                                ?>
                                                <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                        </div>

                        <div class="row">
                            <a href="manage-advertises-admin.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month"> Advertisements</p>
                                            <?php $query = mysqli_query($con, "select * from advertisement");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="normal-users.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month"> All Users</p>
                                            <?php $query = mysqli_query($con, "select count(*) from user");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="manage_advertisement_plans.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Advertisement Plans</p>
                                            <?php $query = mysqli_query($con, "select * from advertise_plans");
                                            $countsubcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>

                        </div>
                    </div>



                    <div class="row">
                        <a href="manage-comments.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Comments </p>
                                        <?php $query = mysqli_query($con, "select * from comment where status=1");
                                        $countposts = mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>
                        <a href="subscribed-users.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month"> Subscribed Users</p>
                                        <?php $query = mysqli_query($con, "select count(*) from subscriber ");
                                        $countposts = mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endif; ?>
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

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>