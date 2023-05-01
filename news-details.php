<?php

include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token

      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into comment(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query) :
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
        echo "<script>alert('Something went wrong. Please try again.');</script>";
      endif;
}
$postid = intval($_GET['nid']);

$sql = "SELECT viewCounter FROM news WHERE id = '$postid'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visits = $row["viewCounter"];
    $sql = "UPDATE news SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);
  }
} else {
  echo "no results";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

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
        $pid = intval($_GET['nid']);
        $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
        $query="";
        $flag=false;
        if(!isset($_GET["news"]))
        $query = mysqli_query($con, "select news.news_title as news_title,news.news_img,category.CategoryName as category,category.id as cid,subcategory.subcategory as subcategory,news.news_desc as news_desc,news.PostingDate as postingdate,news.postedBy from news left join category on category.id=news.CategoryId left join  subcategory on  subcategory.subcategoryId=news.subcategoryId where news.id='$pid'");
        else{
          $query=mysqli_query($con,"select * from breaking_news where news_id='$pid'");
          $flag=true;
        }
        while ($row = mysqli_fetch_array($query)) {
        ?>

          <div class="card mb-4">

            <div class="card-body">
              <?php if(!$flag): ?>
              <h2 class="card-title"><?php echo htmlentities($row['news_title']); ?></h2>
             <?php else: ?>
              <h2 class="card-title"><?php echo htmlentities($row['news_title']); ?></h2>
            <?php endif; ?>
              <!--category-->
              <?php if(!$flag): ?>
              <a class="badge bg-secondary text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#fff"><?php echo htmlentities($row['category']); ?></a>
              <!--subcategory--->
              <a class="badge bg-secondary text-decoration-none link-light" style="color:#fff"><?php echo htmlentities($row['subcategory']); ?></a>
              <?php endif; ?>

              <p>
 
              <?php if(!$flag): ?>
                 posted on </b><?php echo htmlentities($row['postingdate']); ?> |
              <?php else : ?>
                posted on </b><?php echo htmlentities($row['news_date']); ?> |
                <?php endif; ?>
                <?php if(!$flag): ?>
              </p>
            <?php endif; ?>
           
        <b>Visits:</b> <?php print $visits; ?>
            </p>
            <hr />
          <?php if(!$flag): ?>
            <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['news_img']); ?>" alt="<?php echo htmlentities($row['news_title']); ?>">
          <?php else: ?>
            <img class="img-fluid rounded" src="admin/breakingnews/<?php echo htmlentities($row['news_img']); ?>" alt="<?php echo htmlentities($row['news_title']); ?>">
          <?php endif; ?>

            <p class="card-text"><?php
                                $pt="";
                                if(!$flag)
                                  $pt = $row['news_desc'];
                                else 
                                  $pt=$row["news_title"];
                                  echo (substr($pt, 0)); ?></p>

            </div>
            <div class="card-footer text-muted">

            </div>
          </div>
        <?php } ?>






      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->
    <!---Comment Section --->

    <div class="row" style="margin-top: -8%">
      <div class="col-md-8">
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form name="Comment" method="post">
              <!-- <input type="hidden" name="csrftoken" value="" /> -->
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
              </div>


              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
          </div>
        </div>

        <!---Comment Display Section --->

        <?php
        $sts = 1;
        $query = mysqli_query($con, "select name,comment,postingDate from  comment where postId='$pid' and status='$sts'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']); ?> <br />
                <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']); ?></span>
              </h5>

              <?php echo htmlentities($row['comment']); ?>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>