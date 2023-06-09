<?php
session_start();
include('includes/config.php');
// error_reporting(0);
{

    // Code for Forever deletionparmdel
    if(isset($_GET["rid"]))
    {

        if ( $_GET['rid']) {
            $id = intval($_GET['rid']);
            $query = mysqli_query($con, "delete from  subscriber  where subscription_id='$id'");
            echo "<script>alert('User  deleted.');</script>";
            echo "<script type='text/javascript'> document.location = 'subscribed-users.php'; </script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> | Manage Subscribed Users</title>
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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
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
                                    <h4 class="page-title">Manage Subscribed Users</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Subscribed Users </a>
                                        </li>
                                        <li class="active">
                                            Manage Subscribed Users
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
                                                    <th> Email</th>
                                                    <th>First Name</th>

                                                    <th>Last Name</th>
                                                    <th>Subscription Start Date</th>
                                                    <th>Subscription End Date </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select * from  subscriber");
                                                $cnt = 1;
                                                
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?> 
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                          <?php
                                                            $login=$row["subscribed_user_email"];
                                                            $query = mysqli_query($con, "Select * from  user where email='$login'");
                                                            $cnt = 1;
                                                            
                                                            $user = mysqli_fetch_array($query);
                                                       ?>
                                                        <td><?php echo htmlentities($user['email']); ?></td>
                                                        <td><?php echo htmlentities($user['fname']); ?></td>
                                                        <td><?php echo htmlentities($user['lname']); ?></td>
                                                    
                                                        <td><?php echo htmlentities($row['subscription_date']); ?></td>
                                                        <td><?php echo htmlentities($row['subscription_end_date']); ?></td>
                                                        <td>  &nbsp;<a href="subscribed-users.php?rid=<?php echo htmlentities($row['subscription_id']); ?>"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
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
<?php } ?>