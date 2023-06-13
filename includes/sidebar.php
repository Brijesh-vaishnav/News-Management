  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card mb-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <form name="search" action="search.php" method="post">
          <div class="input-group">

            <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>

        </form>
      </div>
    </div>
  </div>


  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php $query = mysqli_query($con, "select id,CategoryName from category");
            while ($row = mysqli_fetch_array($query)) {
            ?>

              <li>
                <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Recent News</h5>
    <div class="card-body">
      <ul class="mb-0">
        <?php
        $query = mysqli_query($con, "select news.id as pid,news.news_title as news_title from news left join category on category.id=news.CategoryId left join  subcategory on  subcategory.subcategoryId=news.subcategoryId where news.Is_Active=1 limit 8");
        while ($row = mysqli_fetch_array($query)) {

        ?>

          <li>
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>"><?php echo htmlentities($row['news_title']); ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <!-- Advertisements -->
  <?php
  $whoIsLoggedIn = null;
  $isSubscriber = null;
  if (isset($_SESSION["login"])) {

    $whoIsLoggedIn = $_SESSION["login"];
    $queryForCheckWhetherIsSubscriber = mysqli_query($con, "select * from subscriber where subscribed_user_email='$whoIsLoggedIn'");
    $isSubscriber = mysqli_fetch_assoc($queryForCheckWhetherIsSubscriber);
  }




  ?>
  <?php if ($isSubscriber == null or empty($isSubscriber)) : ?>
    <div class="advertisement">
      <?php

      $queryForAdv = mysqli_query($con, "select * from advertisement where paymentstatus=1");
      $row = mysqli_fetch_assoc($queryForAdv);
      $image = $row['advertise_img'];
      //echo "<script> alert('$image')</script>";
      ?>
      <img class="card-img-top" src="admin/advertiseImages/<?php echo $image ?>" alt="advertise image" />;
    </div>

    <div class="subscribe">
      Tired of advertising ? <a href="./subscription-page.php">Subscribe</a>
    </div>

  <?php endif; ?>
  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Popular News</h5>
    <div class="card-body">
      <ul>
        <?php
        $query1 = mysqli_query($con, "select news.id as pid,news.news_title as news_title from news left join category on category.id=news.CategoryId left join  subcategory on  subcategory.subcategoryId=news.subcategoryId  order by viewCounter desc limit 5");
        while ($result = mysqli_fetch_array($query1)) {

        ?>

          <li>
            <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>"><?php echo htmlentities($result['news_title']); ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>

  </div>