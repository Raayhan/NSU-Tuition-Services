<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php');
include('../controllers/TeacherLoginController.php');

if(!isset($_SESSION['teacher']))
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
    <title>Teacher Dashboard | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="../js/responsive-nav.js"></script>
  
</head>
<body>
<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/nsu-ts.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['teacher']['first_name']?></a></li>
          <li class="menu-item"><a href="#projects"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../controllers/TeacherSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>


<div class="container-fluid">
      <div class="row">
        <div class="col-md-12" style="padding-left: 0px;padding-right:0px;">
          <div class="section-title">
           <div class="alert alert-info" role="alert" style="text-align:center";>
            <h2>Welcome !</h2>

                         <?php  if (isset($_SESSION['teacher'])) : ?>

                           <html>
                                 <h6><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?> <span style="font-size:10px!important;">(Teacher)</span></h6>
                           </html>

                         <?php endif ?>
           </div>
                         

            
          </div>
        </div>
      </div>
  </div>


<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>