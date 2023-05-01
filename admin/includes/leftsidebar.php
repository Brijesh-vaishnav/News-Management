<?php

if ($_SESSION["type"] != "Employee") {

    echo "<script>document.location='./login.php'</script>";
}

?>
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="../index.php" class="logo"><span>News<span>Portal</span></span><i class="mdi mdi-layers"></i></a>
        <!-- Image logo -->
        <!--<a href="index.html" class="logo">-->
        <!--<span>-->
        <!--<img src="assets/images/logo.png" alt="" height="30">-->
        <!--</span>-->
        <!--<i>-->
        <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
        <!--</i>-->
        <!--</a>-->
    </div>

    <!-- Button mobile view to collapse sidebar menu -->

</div>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>

                </li>
                <?php if ($_SESSION['utype'] == '1') : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Opeators </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="add-operator.php">Add Operators</a></li>
                            <li><a href="manage-operators.php">Manage Operators</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['utype'] == '1') : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="normal-users.php">All Users</a></li>
                            <li><a href="subscribed-users.php">Subscribed Users</a></li>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['utype'] == '1') : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Advertisers </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">

                            <li><a href="manage-advertisers.php">Manage Advertisers</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['utype'] == '1') : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Advertisements </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="unapproved-advertisements.php">Waiting for Approval </a></li>
                            <li><a href="manage-advertises-admin.php">Approved Advertises</a></li>
                            <!-- manage-advertises.php -->
                        </ul>
                    </li>
                <?php endif; ?>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Category </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-category.php">Add Category</a></li>
                        <li><a href="manage-categories.php">Manage Category</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span>Sub Category </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-subcategory.php">Add Sub Category</a></li>
                        <li><a href="manage-subcategories.php">Manage Sub Category</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Posts (News) </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-post.php">Add Posts</a></li>
                        <li><a href="manage-posts.php">Manage Posts</a></li>
                        <li><a href="trash-posts.php">Trash Posts</a></li>
                        <?php if ($_SESSION['utype'] == '1') : ?>
                            <li><a href="unapproved-posts.php">Waiting for Approoval</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Breaking news </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-breaking-news.php">Add Breaking News</a></li>
                        <li><a href="manage-breaking-news.php">Manage Breaking News</a></li>
                        <?php if ($_SESSION['utype'] == '1') : ?>
                            <li><a href="unapproved-breaking-news.php">Waiting for Approoval</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php if ($_SESSION['utype'] == '1') : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="aboutus.php">About us</a></li>
                            <li><a href="contactus.php">Contact us</a></li>
                        </ul>
                    </li>


                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Comments </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                            <li><a href="manage-comments.php">Approved Comments</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>