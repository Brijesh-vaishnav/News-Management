

<?php
session_start();
include('includes/config.php');

 {
   
   $whoIsLoggedIn=$_SESSION["login"];
//    echo "<script>alert('$whoIsLoggedIn')</script>";
    
    // Code for Add New Sub Admi
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];

        // $postedby = $_SESSION['login'];
        $postedby=$whoIsLoggedIn ;
        
    
        $imgfile = $_FILES["advertise_image"]["name"];
        // echo "<script>alert('$imgfile')</script>";
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // echo "<script>alert('$extension')</script>";
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["advertise_image"]["tmp_name"], "advertiseImages/" . $imgnewfile);
            $status = 0;
            $paymentstatus = 0;
            $is_active = 1;


            $total_price = $_POST["total_price"];
            $hours=$_POST["validity"];
            $currentDateTime = date('Y-m-d H:i:s');
            $validity = date('Y-m-d H:i:s', strtotime($currentDateTime .  "+$hours hours"));
            // echo "<script>alert('$validity')</script>";

            $query = mysqli_query($con, "insert into advertisement(advertiser_mail ,advertise_img,status,validity,paymentstatus,total_price) values('$postedby','$imgnewfile','$status','$validity','$paymentstatus','$total_price')") or die("Query failed: " . mysqli_error($conn)); ;
            if ($query) {
                $msg = "Advertise submitted for Approvement ";
                 echo "<script>alert('$msg')</script>";
            } else {
                $error = "Something went wrong . Please try again.";
                echo "<script>alert('$error')</script>";

            }
        }
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Newsportal | Add Operator</title>

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
        <script>
            function checkAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'username=' + $("#semp_mail").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
    </head>


    <body class="fixed-left">

        <?php include('includes/advertiserSidebar.php'); ?>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php
                        $query = "select price from advertise_price";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result)
                        ?>

                        <script>
                            let price = <?php echo $row['price'] ?>
                        </script>


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Advertise</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Advertiser</a>
                                        </li>

                                        <li class="active">
                                            Add Advertise
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
                                    <h4 class="m-t-0 header-title"><b>Add Advertise </b></h4>
                                    <hr />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form name="add_advertise" method="post" enctype="multipart/form-data" action="">
                                                <div class="form-group">
                                                    <label for="exampleInputusername">Email</label>
                                                    <input type="text" placeholder="Enter  Email" name="email" id="semp_mail" class="form-control" required autocomplete="off" disabled value=<?php echo $whoIsLoggedIn; ?>>
                                                    <span id="user-availability-status" style="font-size:14px;"></span>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12" style="margin-bottom:5px">

                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Advertise Image</b></h4>
                                                        <input type="file" class="form-control" id="news_img" name="advertise_image" required>

                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-top:20px">
                                                    <label for="validity">Validity In Hour</label> <br>
                                                    <select name="validaty" id="validity" onchange="dropDownChanged(this)">
                                                        <option value="" selected disabled>Select Validity</option>
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                    <span>Price : <?php echo $row['price'] ?> rs/hour</span>
                                                    <span style="margin-left:20px" id="bill"> </span>
                                                </div>
                                                <input type="text" name="total_price" id="total_price" hidden>

                                                <div class="form-group" style="display:flex;margin-top:20px">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10 flex justify-start">
                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" id="submit" name="submit" style="transform:translateX(-120px)">
                                                            Submit</button>
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

            function dropDownChanged(e) {
                let validity = e.value;
                document.querySelector('#bill').innerHTML = 'Total Price: ' + validity * price + " Rs";
                document.querySelector("#total_price").value = validity * price;
            }
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