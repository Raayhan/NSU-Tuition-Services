<?php
require('../database/connect.php');
include('../controllers/AddStudent.php')




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>Dashboard | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="../js/responsive-nav.js"></script>
    
<body>
    
<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/nsu-ts.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item"><a href="#projects"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>


<div class="container-fluid">
      <div class="row">
        <div class="col-md-12" style="padding-left: 0px;padding-right:0px;">
          <div class="section-title">
           <div class="alert alert-info" role="alert" style="text-align:center";>
            <h2>Welcome !</h2>

                         <?php  if (isset($_SESSION['student'])) : ?>

                           <html>
                                 <h6><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?></h6>
                           </html>

                         <?php endif ?>
           </div>
                         

            
          </div>
        </div>
      </div>
  </div>

  <h5 style="text-align:center;padding-bottom:40px; margin-left:20px;margin-right:20px;">Please select your desired category for courses</h5>
  <div class="container">
  
      <div class="row justify-content-center">
        
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SEPS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SEPS</h2>
              <p class="my-box-text">School of Engineering & Physical Sciences</p>
              <a href="SEPS.html" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SBE.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SBE</h2>
              <p class="my-box-text">School of Business & Economics</p>
              <a href="SBE.html" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SHSS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SHSS</h2>
              <p class="my-box-text">School Of Humanities & Social Sciences</p>
              <a href="/SBE" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SHLS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SHLS</h2>
              <p class="my-box-text">School of Health & Life Sciences</p>
              <a href="/SBE" class="box-button">Go</a>
           </div>
          </div>
        </div>
      </div>
    </div>


<footer class="page-footer font-small blue-gradient" style="margin-top:65px;">
  <div class="footer-copyright text-center py-3">© 2020 Copyright : 
    <a href="#"> NSU Tuition Services</a>
    <div>
      <p class="end"> Developed & Maintained By : Rayhan Ahmed Rakib</p>
    </div>
  
</footer>

<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>