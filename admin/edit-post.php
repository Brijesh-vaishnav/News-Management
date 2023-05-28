<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $news_title = $_POST['news_title'];
        $catid = $_POST['category'];
        $subcatid = $_POST['subcategory'];
        $news_desc = $_POST['postdescription'];
        $lastuptdby = $_SESSION['login'];
        $arr = explode(" ", $news_title);
        $url = implode("-", $arr);
        $status = 1;
        $isActive=1;
        $postid = intval($_GET['pid']);
        $stmt = mysqli_prepare($con, "UPDATE news SET news_title=?, CategoryId=?, subcategoryId=?, news_desc=?, Is_Active=? WHERE id=?");

        mysqli_stmt_bind_param($stmt, "siisii", $news_title, $catid, $subcatid, $news_desc, $isActive, $postid);
        
        if (mysqli_stmt_execute($stmt)) {
            $msg = "Post updated";
        } else {
            $error = "Something went wrong. Please try again.";
        }
   
        
        if (mysqli_stmt_execute($stmt)) {
            $msg = "Post updated";
        } else {
            $error = "Something went wrong. Please try again.";
        }

        mysqli_stmt_close($stmt);

        // $query = mysqli_query($con, "update news set news_title='$news_title',CategoryId='$catid',subcategoryId='$subcatid',news_desc='$news_desc',Pos,Is_Active='$status', where id='$postid'");
        // if ($query) {
        //     $msg = "Post updated ";
        // } else {
        //     $error = "Something went wrong . Please try again.";
        // }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Add Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
            function getSubCat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcategory.php",
                    data: 'catid=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }
        </script>
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
                                    <h4 class="page-title">Edit Post </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"> Posts </a>
                                        </li>
                                        <li class="active">
                                            Add Post
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

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
                        $postid = intval($_GET['pid']);
                        $query = mysqli_query($con, "select news.id as postid,news.news_img,news.news_title as title,news.news_desc,category.CategoryName as category,category.id as catid,subcategory.subcategoryId as subcatid,subcategory.subcategory as subcategory from news left join category on category.id=news.CategoryId left join subcategory on subcategory.subcategoryId=news.subcategoryId where news.id='$postid' and news.Is_Active=1 ");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form name="addpost" method="post">
                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Post Title<span style="color: red;"> *</span></label>
                                                    <input type="text" class="form-control" id="news_title" value="<?php echo htmlentities($row['title']); ?>" name="news_title" placeholder="Enter title" required>
                                                </div>



                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Category<span style="color: red;"> *</span></label>
                                                    <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                                                        <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['category']); ?></option>
                                                        <?php
                                                        // Feching active categories
                                                        $ret = mysqli_query($con, "select id,CategoryName from  category where Is_Active=1");
                                                        while ($result = mysqli_fetch_array($ret)) {
                                                        ?>
                                                            <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Sub Category<span style="color: red;"> *</span></label>
                                                    <select class="form-control" name="subcategory" id="subcategory" required>
                                                        <option value="<?php echo htmlentities($row['subcatid']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
                                                    </select>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                                                            <textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['news_desc']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                                                            <img src="postimages/<?php echo htmlentities($row['news_img']); ?>" width="300" />
                                                            <br />
                                                            <a href="change-image.php?pid=<?php echo htmlentities($row['postid']); ?>">Update Image</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <div class="row m-b-30">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <?php echo $row["state"] ?>
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Update State</b></h4>
                                                        <select name="state">
                                                            <option value="">Select state</option>

                                                            <option value="0" <?php if ($_row["state"] == 0) echo "selected" ?>>Andhra Pradesh</option>
                                                            <option value="1" <?php if ($_row["state"] == 1) echo "selected" ?>>Arunachal Pradesh</option>
                                                            <option value="2" <?php if ($_row["state"] == 2) echo "selected" ?>>Assam</option>
                                                            <option value="3" <?php if ($_row["state"] == 3) echo "selected" ?>>Bihar</option>
                                                            <option value="4" <?php if ($_row["state"] == 4) echo "selected" ?>>Chhattisgarh</option>
                                                            <option value="5" <?php if ($_row["state"] == 5) echo "selected" ?>>Goa</option>
                                                            <option value="6" <?php if ($_row["state"] == '6') echo "selected" ?>>Gujarat</option>
                                                            <option value="7" <?php if ($_row["state"] == 7) echo "selected" ?>>Haryana</option>
                                                            <option value="8" <?php if ($_row["state"] == 8) echo "selected" ?>>Himachal Pradesh</option>
                                                            <option value="9" <?php if ($_row["state"] == 9) echo "selected" ?>>Jharkhand</option>
                                                            <option value="10" <?php if ($_row["state"] == 10) echo "selected" ?>>Karnataka</option>
                                                            <option value="11" <?php if ($_row["state"] == 0) echo "selected" ?>>Kerala</option>
                                                            <option value="12" <?php if ($_row["state"] == 0) echo "selected" ?>>Madhya Pradesh</option>
                                                            <option value="13" <?php if ($_row["state"] == 0) echo "selected" ?>>Maharashtra</option>
                                                            <option value="14" <?php if ($_row["state"] == 0) echo "selected" ?>>Manipur</option>
                                                            <option value="15" <?php if ($_row["state"] == 0) echo "selected" ?>>Meghalaya</option>
                                                            <option value="16" <?php if ($_row["state"] == 0) echo "selected" ?>>Mizoram</option>
                                                            <option value="17" <?php if ($_row["state"] == 0) echo "selected" ?>>Nagaland</option>
                                                            <option value="18" <?php if ($_row["state"] == 0) echo "selected" ?>>Odisha</option>
                                                            <option value="19" <?php if ($_row["state"] == 0) echo "selected" ?>>Punjab</option>
                                                            <option value="20" <?php if ($_row["state"] == 0) echo "selected" ?>>Rajasthan</option>
                                                            <option value="21" <?php if ($_row["state"] == 0) echo "selected" ?>>Sikkim</option>
                                                            <option value="22" <?php if ($_row["state"] == 0) echo "selected" ?>>Tamil Nadu</option>
                                                            <option value="23" <?php if ($_row["state"] == 0) echo "selected" ?>>Telangana</option>
                                                            <option value="24" <?php if ($_row["state"] == 0) echo "selected" ?>>Tripura</option>
                                                            <option value="25" <?php if ($_row["state"] == 0) echo "selected" ?>>Uttar Pradesh</option>
                                                            <option value="26" <?php if ($_row["state"] == 0) echo "selected" ?>>Uttarakhand</option>
                                                            <option value="27" <?php if ($_row["state"] == 0) echo "selected" ?>>West Bengal</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>

                                        </div>
                                    </div> <!-- end p-20 -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->



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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            jQuery(document).ready(function() {

                $('.summernote').summernote({
                    height: 240, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>

    </html>
<?php } ?>