 <?php
  session_start();
  if (isset($_GET["state_id"]))
    $state_id = $_GET["state_id"];
  
  ?>


 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
   <div class="container">
     <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="50"></a>
     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item">
           <a class="nav-link" href="index.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="about-us.php">About</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="index.php">News</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="contact-us.php">Contact us</a>
         </li>

         <?php if (!isset($_SESSION["type"])) : ?>
           <li class="nav-item">
             <a class="nav-link" href="./admin/login.php">Login</a>
           </li>

         <?php endif; ?>



         <li>
           <div class="dropdown show" style="width:100%" style="overflow: scroll;z-index:1;">
             <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Select State
             </a>

             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index:1" style="overflow: scroll;">

               <?php $query = mysqli_query($con, "select * from state");
                while ($row = mysqli_fetch_array($query)) {

                ?>

                 <a class="dropdown-item" href="index.php?state_id=<?php echo $row['state_id'] ?>" ?>> <?php echo $row["state_name"] ?></a>


               <?php } ?>


             </div>
           </div>
         </li>
     </div>
     </ul>
     <!-- <?php echo isset($_SESSION["type"]) ?> -->
     <?php if (isset($_SESSION["type"])) : ?>

       <li class="dropdown user-box" style="position:absolute;right:10px;padding:10px;color:gray">
         <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
           <img src="admin/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img" style="width:40px;height:40px" ;>
         </a>

         <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list p-1">
           <li style="background-color:gray;color:white;padding:5px 10px;border-radius:10px">
             <h5> <?php echo $_SESSION["login"] ?></h5>
           </li>
           <?php $type = $_SESSION["type"] ?>
           <!-- <?php echo "<script>alert('$type')</script>" ?> -->
           <?php
            $whoIsLoggedIn = $_SESSION["login"];

            if ($_SESSION["type"] == "user") :
              $queryForCheckWhetherIsSubscriber = mysqli_query($con, "select * from subscriber where subscribed_user_email='$whoIsLoggedIn'");
              $num = mysqli_fetch_array($queryForCheckWhetherIsSubscriber);
              // echo "<script>alert('$num')</script>";
              if (!empty($num) ): ?>
               <li><a href="subscription-details.php">Subscription Details</a></li>
           <?php endif;
            endif; ?>
           <?php if ($_SESSION["type"] == "Advertiser") : ?>
             <li><a href="admin/advertiser_dashboard.php"> Dashboard</a></li>
           <?php endif; ?>
           <?php if ($_SESSION["type"] == "Employee") : ?>
             <li><a href="admin/dashboard.php"> Dashboard</a></li>
           <?php endif; ?>

           <li><a href="admin/logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
         </ul>
       </li>
     <?php endif; ?>

   </div>
 </nav>