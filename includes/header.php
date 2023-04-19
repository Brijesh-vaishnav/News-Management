 <?php
     if(isset($_GET["state_id"]))
        $state_id=$_GET["state_id"];
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
         <li class="nav-item">
           <a class="nav-link" href="./admin/login.php">Login</a>
         </li>
        

         <li>
           <div class="dropdown show" style="width:100%">
             <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Select State
             </a>

             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index:1">
         
                 <?php $query = mysqli_query($con, "select * from state");
                 while ($row = mysqli_fetch_array($query)) {
                  
                 ?>     
                   
                   <a class="dropdown-item" href="index.php?state_id=<?php echo $row['state_id'] ?>" 
                    ?>> <?php echo $row["state_name"] ?></a>
                    
              
                 <?php } ?>
                   
  
             </div>
           </div>
         </li>
     </div>
     </ul>
   </div>
 </nav>