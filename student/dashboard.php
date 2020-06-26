<?php
require('../database/connect.php');
include('../controllers/AddStudent.php');
include('../controllers/StudentLoginController.php');

if(!isset($_SESSION['student']))
{
    // not logged in
    $_SESSION["error"]='You must login first !';
    header('Location: login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>Student Dashboard | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="../js/responsive-nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <script> 
     
        $(function(){
        $("#footer").load("../layouts/footer.html"); 
          });

         
    </script>  
</head>  
<body>
    
<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/logo.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item"><a href="tuitions.php"><i class="fas fa-book-open"></i>&nbsp; Tuitions</a></li>
          <li class="menu-item"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
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
                                 <h6><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?> <span style="font-size:10px!important;">(Student)</span></h6>
                           </html>

                         <?php endif ?>
           </div>
                         

            
          </div>
        </div>
      </div>
  </div>
<div class="section_title">
  <h6>Please select your desired category for courses</h6>
</div> 
  <div class="container mb-5">
  
      <div class="row justify-content-center">
        
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SEPS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SEPS</h2>
              <p class="my-box-text">School of Engineering & Physical Sciences</p>
              <a href="SEPS.php" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SBE.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SBE</h2>
              <p class="my-box-text">School of Business & Economics</p>
              <a href="SBE.php" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SHSS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SHSS</h2>
              <p class="my-box-text">School Of Humanities & Social Sciences</p>
              <a href="#" class="box-button">Go</a>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-image"><img src="../img/SHLS.png"></div>
            <div class="my-box-content">
              <h2 class="my-box-title">SHLS</h2>
              <p class="my-box-text">School of Health & Life Sciences</p>
              <a href="#" class="box-button">Go</a>
           </div>
          </div>
        </div>
      </div>
    </div>


<div id="footer"></div>

<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>