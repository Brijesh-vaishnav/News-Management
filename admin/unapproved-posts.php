<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if ($_GET['disid']) {
        $id = intval($_GET['disid']);
        $query = mysqli_query($con, "update news set status='0' where id='$id'");
        $msg = "Post unapprove ";
    }
    // Code for restore
    if ($_GET['appid']) {
        $id = intval($_GET['appid']);
        $query = mysqli_query($con, "update news set status='1' where id='$id'");
        $msg = "Post approved";
    }

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "delete from  news  where id='$id'");
        $delmsg = "Post deleted forever";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> | Manage Posts</title>
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
                                    <h4 class="page-title">Manage Unapproved Posts</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Posts </a>
                                        </li>
                                        <li class="active">
                                            Unapproved Posts
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">

                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>








                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">

                                        <div class="table-responsive">
                                            <table class="table table-colored table-centered table-inverse m-0">
                                                <thead>
                                                    <tr>

                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>subcategory</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($con, "select news.id as postid,news.news_title as title,category.CategoryName as category,subcategory.subcategory as subcategory from news left join category on category.id=news.CategoryId left join subcategory on subcategory.subcategoryId=news.subcategoryId where news.Is_Active=1 && news.status=0 ");
                                                    $rowcount = mysqli_num_rows($query);
                                                    if ($rowcount == 0) {
                                                    ?>
                                                        <tr>

                                                            <td colspan="4" align="center">
                                                                <h3 style="color:red">No record found</h3>
                                                            </td>
                                                        <tr>
                                                            <?php
                                                        } else {
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                        <tr>
                                                            <td><b><?php echo htmlentities($row['title']); ?></b></td>
                                                            <td><?php echo htmlentities($row['category']) ?></td>
                                                            <td><?php echo htmlentities($row['subcategory']) ?></td>

                                                            <td>
                                                            <?php if ($st == '0') : ?>
                                                                    <a href="unapprove-posts.php?disid=<?php echo htmlentities($row['id']); ?>" title="Disapprove this Post"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                <?php else : ?>
                                                                    <a href="unapproved-posts.php?appid=<?php echo htmlentities($row['postid']); ?>" title="Approve this Post["><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                <?php endif; ?>
                                                                &nbsp;<a href="manage-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                        </tr>
                                                <?php }
                                                        } ?>

                                                </tbody>
                                            </table>
                                        </div>




                                    </div>

                                </div>


                            </div>
                            <!--- end row -->



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <div class="m-b-30">


                                        </div>





                                    </div>

                                </div>


                            </div>


















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