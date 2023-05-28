<?php
session_start();
include('includes/config.php'); {

    $whoIsLoggedIn = $_SESSION["login"];
    //    echo "<script>alert('$whoIsLoggedIn')</script>";

    // Code for Add New Sub Admi
    if (isset($_POST['submit'])) {


        // $postedby = $_SESSION['login'];
        $postedby = $whoIsLoggedIn;


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
           $q= mysqli_query($con,"select * from advertise_plans where plan_price='$total_price'");
           $r=mysqli_fetch_assoc($q);
           $duration=$r["plan_duration"];


            // echo "<script>alert('$validity')</script>";

            $query = mysqli_query($con, "insert into advertisement(advertiser_mail ,advertise_img,status,paymentstatus,total_price,advertise_hours) values('$postedby','$imgnewfile','$status','$paymentstatus','$total_price','$duration')") or die("Query failed: " . mysqli_error($conn));;
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

        <title>Newsportal | Add Advertise</title>

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
        <!-- <script>
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
        </script> -->
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
                        $query = "select * from advertise_plans";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result)
                        ?>




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
                            <div class="col-sm-6">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Advertise </b></h4>
                                    <hr />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form name="add_advertise" method="post" enctype="multipart/form-data" action="">
                                                <div class="form-group">
                                                    <label for="exampleInputusername">Email<span style="color: red;"> *</span></label>
                                                    <input type="text" placeholder="Enter  Email" name="email" id="semp_mail" class="form-control" required autocomplete="off" disabled value=<?php echo $whoIsLoggedIn; ?>>
                                                    <span id="user-availability-status" style="font-size:14px;"></span>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12" style="margin-bottom:5px">

                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Advertise Image</b><span style="color: red;"> *</span></h4>
                                                        <input type="file" class="form-control" id="news_img" name="advertise_image" required>

                                                    </div>
                                                </div>
                                                <script>
                                                    let price = <?php echo $row['plan_price'] ?>
                                                </script>
                                                <div class="form-group" style="margin-top:20px">
                                                    <label for="validity">Validity In Hour<span style="color: red;"> *</span></label> <br>
                                                    <select name="validaty" id="validity" onchange="dropDownChanged(this)" required>
                                                        <option value="" selected disabled>Select Validity</option>
                                                        <?php
                                                        $query2 = mysqli_query($con, "Select * from  advertise_plans");
                                             
                                                        while ($row = mysqli_fetch_array($query2)) {

                                                            echo "<option value=" . $row["plan_price"] . ">" . $row["plan_duration"] . " Hour </option>";
                                                        }
                                                        ?>

                                                    </select>

                                                    <span style="margin-left:20px" id="bill"> </span>
                                                </div>
                                                <input type="text" name="total_price" id="total_price" hidden>

                                                <div class="form-group" style="display:flex;margin-top:20px">
                                                   
                                                    <div class="col-md-10 flex justify-start">
                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" id="submit" name="submit" >
                                                            Submit</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <h5 style="display:flex;justify-content: center;">Advertisement Plans</h5>
                            <div class="col-md-6">
                                <div class="demo-box m-t-20">

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Plan Price</th>
                                                    <th>Plan Duratioin</th>




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
                                                        <td><?php echo htmlentities($row['plan_duration']); ?> Hour</td>


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
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

        <script>
            var resizefunc = [];

            function dropDownChanged(e) {
                let price = e.value;
                document.querySelector('#bill').innerHTML = 'Total Price: ' + price  + " Rs";
                document.querySelector("#total_price").value = price ;
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