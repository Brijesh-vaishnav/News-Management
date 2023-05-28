<?php
session_start();
$delmsg = null;
$error = null;
include('includes/config.php'); {

        if (isset($_GET['action']) && $_GET['action'] == 'del') {
            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "delete from advertisement  where advertise_id='$postid'");
            if ($query) {
                $delmsg = "Advertise deleted ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            table {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            table th {

                width: 300px;
                height: 50px;
                text-align: center;


            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Manage Posts</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left" style="overflow-y:auto ">

        <!-- Begin page -->
        <div id="wrapper"  style="overflow-y:auto ">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/advertiserSidebar.php'); ?>


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
                                    <h4 class="page-title">Manage Advertises </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Advertiser</a>
                                        </li>

                                        <li class="active">
                                            Manage Advertises
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <?php if ($delmsg) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($delmsg) ?>
                            </div>
                        <?php } ?>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <div style="display:flex;flex-direction:column;gap:40px;position:relative" >


                                        <?php
                                        $whoIsLoggedIn = $_SESSION["login"];
                                        $query = mysqli_query($con, "select * from advertisement where advertiser_mail='$whoIsLoggedIn'");
                                        $rowcount = mysqli_num_rows($query);
                                        if ($rowcount == 0) {
                                        ?>


                                            <h3 style="color:red">No record found</h3>

                                            <?php
                                        } else {
                                            while ($row = mysqli_fetch_array($query)) {
                                                $image = $row['advertise_img'];
                                                $mail = $row["advertiser_mail"];
                                            ?>

                                                <div style="display:flex;flex-direction:column;gap:20px;position:relative">
                                                 <div style="display:flex;gap:20px">
                                                    <a href="manage-advertises.php?pid=<?php echo htmlentities($row['advertise_id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050;position:absolute;right:0;top:0"></i></a>
                                                  <div class="image">
                                                      <img class="card-img-top" src="advertiseImages/<?php echo $image ?>" alt="advertise image" style="width:200px;height:200px" />
                                                  </div>
                                                    <div style="display:flex;flex-direction: column;justify-content: space-around;">
                                                        <div>
                                                            <?php
                                                            $findAdvertiserQuery = mysqli_query($con, "select * from advertiser where mail='$mail' ");
                                                            $advertiser = mysqli_fetch_assoc($findAdvertiserQuery);
                                                            ?>
                                                            <b>Advertiser Email : </b> <?php echo $mail; ?>
                                                        </div>
                                                        <div>

                                                            <b>Advertiser Name: </b> <?php echo $advertiser["fname"] . " " . $advertiser["lname"] ?>
                                                        </div>

                                                        <div>

                                                            <b>Advertise Hours : </b> <span> <?php echo $row["advertise_hours"]   ?></span>
                                                        </div>
                                                        <div>
                                                            <b>Advertise Total Price : </b> <span><?php echo $total_price = $row["total_price"]; ?> <span> Rs. </span>
                                                        </span>
                                                    </div>
                                                    <div>

                                                            <b>Advertise Requested On : </b> <span> <?php echo $row["requested_on"]   ?></span>
                                                        </div>
                                                    <div>

                                                        <b>Approvement Status: </b> <?php if ($row["status"] == 0) :  ?>
                                                            <span style="color:red"> Pending </span>
                                                        <?php else :    ?>
                                                            <span style="color:green"> Approved </span>
                                                        <?php endif; ?>
                                                    </div>
                                                        <div>

                                                            <b>Payment: </b>
                                                            <?php if ($row["paymentstatus"] == 0) :  ?>
                                                                <span style="color:red"> Pending </span>

                                                            <?php else :    ?>
                                                                <span style="color:green"> Paid </span>
                                                            <?php endif; ?>
                                                        </div>


                                                        <?php if ($row["paymentstatus"] == 1) :  ?>
                                                            <div>
                                                                
                                                                <b>Payment Done on: </b>
                                                                <span> <?php echo $row["payment_done_on"] ?> </span>
                                                            </div>
                                                            <div>

                                                                <b>Valid Till: </b>
                                                                <span> <?php echo $row["validity"] ?> </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div style="margin-top:10px">

                                                            <?php if ($row["status"] == 0) :  ?>
                                                                <span style="color:orangered">Payment Option Will Be Available After Approvement !!!</span>
                                                            <?php endif; ?>
                                                            <?php if ($row["status"] == 1) :  ?>
                                                                <?php if ($row["paymentstatus"] == 0) :  ?>
                                                                    <a href="../advertiser_payment_page.php?price=<?php echo $total_price ?>&period=<?php echo $row["advertise_hours"] ?>&advertise_id=<?php echo $row["advertise_id"] ?>" style="background-color:green;border-radius:10px;padding:10px 40px;color:white;">Pay</a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                             
                                        <?php }
                                        } ?>


                                    </div>
                                </div>
                            </div>
                        
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>