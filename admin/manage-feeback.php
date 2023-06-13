<?php
session_start();
include('includes/config.php');

$delmsg = null;
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['action'])) {


        $id = intval($_GET['id']);
        $query = mysqli_query($con, "delete from feedback where feedback_id='$id'");
        $delmsg = "Feedback deleted ";

        // Code for restore


    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> | Manage Feedback</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
        <style>
            .accordion {
                border: 1px solid #ddd;
            }

            .accordion-item {
                border-top: 1px solid #ddd;
            }

            .accordion-header {
                background-color: #f5f5f5;
                padding: 10px;
                cursor: pointer;
                font-weight: bold;
            }

            .accordion-content {
                padding: 10px;
                display: none;
            }
        </style>
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
                                    <h4 class="page-title">Manage Feedback</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Feedback </a>
                                        </li>
                                        <li class="active">
                                            Manage Feedback
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">



                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>








                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <?php
                                        $sql = "select * from feedback";
                                        $query = mysqli_query($con, $sql);

                                        ?>

                                        <?php $rowcount = mysqli_num_rows($query);
                                        if ($rowcount == 0) {
                                        ?>


                                            <h3 style="color:red">No record found</h3>

                                        <?php
                                        } else ?>
                                        <div class="accordion" id="accordionExample" style="display:flex;flex-direction:column;gap:19px;">
                                            <?php


                                            while ($row = mysqli_fetch_assoc($query)) {

                                            ?>

                                                <div class="accordion-item">

                                                    <div class="accordion-header" style="font-size: 20px;padding-right:20px;"><?php echo $row["name"] ?></div>
                                                    <div class="accordion-content" style="font-size: 15px;text-align:justify">
                                                        <div style="display:flex;justify-content:end;">
                                                           <a href="manage-feeback.php?id=<?php echo $row["feedback_id"] ?>&action=del" > <i class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                        </div>
                                                        <p><?php echo $row["description"] ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const accordionHeaders = document.querySelectorAll(".accordion-header");

                    accordionHeaders.forEach(function(header) {
                        header.addEventListener("click", function() {
                            const accordionItem = this.parentElement;
                            const accordionContent = this.nextElementSibling;

                            if (!accordionItem.classList.contains("active")) {
                                closeAllAccordionItems();
                                accordionItem.classList.add("active");
                                accordionContent.style.display = "block";
                            } else {
                                accordionItem.classList.remove("active");
                                accordionContent.style.display = "none";
                            }
                        });
                    });

                    function closeAllAccordionItems() {
                        accordionHeaders.forEach(function(header) {
                            const accordionItem = header.parentElement;
                            const accordionContent = header.nextElementSibling;

                            accordionItem.classList.remove("active");
                            accordionContent.style.display = "none";
                        });
                    }
                });
            </script>


    </body>

    </html>
<?php } ?>