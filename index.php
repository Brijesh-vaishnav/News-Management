<?php

include('includes/config.php');
error_reporting(0)


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <Style>
    html,
    body {
      height: 100%;
    }

    .dropdown-menu {
      max-height: 300px;
      overflow-y: scroll;
    }
  </Style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News Portal | Home Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>

  <!-- Page Content -->
  <div class="container">



    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno - 1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM news";
        $result = mysqli_query($con, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $state_id = "";
        if (isset($_GET["state_id"]))
          $state_id = $_GET["state_id"];

     
        ?>

        <div class="card mb-4">
          <?php 
            $query=mysqli_query($con,"select * from breaking_news");
            $breaking_news=mysqli_fetch_assoc($query);
            // echo print_r($breaking_news) ;
          ?>
          <img class="card-img-top" src="admin/breakingnews/<?php echo htmlentities($breaking_news['news_img']); ?>" alt="<?php echo htmlentities($row['news_title']);  ?>" style="width: 100%;height:300px;">
          <div class="card-body">
            <h2 class="card-title"><?php echo htmlentities($breaking_news['news_title']); ?></h2>

            <a href="news-details.php?nid=<?php echo htmlentities($breaking_news['news_id']) ?>&&news=breaking_news" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo htmlentities($breaking_news['news_date']); ?>

          </div>
        </div>

        <div class="flex" style="display:flex;flex-wrap:wrap;gap:10px">
          <?php
          if ($state_id == "")
            $query = mysqli_query($con, "select news.id as pid,news.news_title as news_title,news.news_img as news_img,category.CategoryName as category,category.id as cid,subcategory.subcategory as subcategory,news.news_desc as news_desc,news.PostingDate as postingdate  from news left join category on category.id=news.CategoryId left join  subcategory on  subcategory.subcategoryId=news.subcategoryId where news.Is_Active=1  order by news.id desc  LIMIT $offset, $no_of_records_per_page");
          else
            $query = mysqli_query($con, "select news.id as pid,news.news_title as news_title,news.news_img,category.CategoryName as category,category.id as cid,subcategory.subcategory as subcategory,news.news_desc as news_desc,news.PostingDate as postingdate from news left join category on category.id=news.CategoryId left join  subcategory on  subcategory.subcategoryId=news.subcategoryId where news.Is_Active=1 AND state='$state_id' order by news.id desc  LIMIT $offset, $no_of_records_per_page");
            // $row = mysqli_fetch_array($query);
            
          while ($row = mysqli_fetch_array($query)) {
              $img=$row['news_img'];
              // echo "<script>alert('$img');</script>"
            ?>
            
            <div class="card mb-4" style="width:48%;display:flex;align-content:space-between ;position:relative;text-align: left;">
              <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['news_img']); ?>" alt="<?php echo htmlentities($row['news_title']); ?>">
              <div class="card-body" style="display:flex;flex-direction:column;justify-content:space-between ;">
                <h4 class="card-title" ><?php echo substr(htmlentities($row['news_title']),0,60)."..."; ?></h4>

                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php echo htmlentities($row['postingdate']); ?>

              </div>
            </div>


          <?php } ?>
        </div>




        <!-- Pagination -->


        <ul class="pagination justify-content-center mb-4">
          <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
          <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                      } ?> page-item">
            <a href="<?php if ($pageno <= 1) {
                        echo '#';
                      } else {
                        echo "?pageno=" . ($pageno - 1);
                      } ?>" class="page-link">Prev</a>
          </li>
          <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                      } ?> page-item">
            <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                      } else {
                        echo "?pageno=" . ($pageno + 1);
                      } ?> " class="page-link">Next</a>
          </li>
          <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
   <div class="advertisements" style="margin-bottom:20px;display:flex;gap:20px;margin-top:100px;flex-wrap:wrap">
   <?php if ($isSubscriber == null or empty($isSubscriber)) : 
    while(  $row = mysqli_fetch_assoc($queryForAdv))
    {
    ?>
    
    <div class="advertisement" style="height:300px;width:300px">
      <?php
        $image = $row['advertise_img'];
      // echo "<script> alert('$image')</script>";
      ?>
      <img class="card-img-top" src="admin/advertiseImages/<?php echo $image ?>" alt="advertise image"  style="width:100%;height:100%" />;
    </div>

    <?php }  ?>
  <?php  endif; ?>
   </div>


  <!-- Footer -->
  <?php include('includes/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </head>

</body>

</html>