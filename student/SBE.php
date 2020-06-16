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
    <meta  charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>SBE | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    
    
    <script src="../js/responsive-nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> 
        $(function(){
        $("#footer").load("../layouts/footer.html"); 
          });
          function goBack() {
           window.history.back();
             }
    </script> 
  
</head>  

<body>


<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/logo.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>

<div class="section_title">

<h3>School of Business & Economics</h3>
<h6>Please select your desired course for tuition</h6>
</div>



<div class="container mb-5">
    <div class="row justify-content-start">
       <button class="btn back_button" onclick="goBack()"><i class="fas fa-chevron-circle-left"></i> Go Back</button>
    </div>
    <div class="row">
      <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 201</h2>
              <p class="my-box-text">Introduction to Financial Accounting</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT201">
              <button type="submit" class="box-button">Select</button>
              </form>

            </div>
          </div>

        </div>

        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 202</h2>
              <p class="my-box-text">Introduction to Managerial Accounting</p>
              <form action= "GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT202">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 322</h2>
              <p class="my-box-text">Taxation</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT322">
              <button type="submit" class="box-button">Select</button>
              </form>
              
           </div>
          </div>
        </div>
        
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 330</h2>
              <p class="my-box-text"> Intermediate Accounting</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT 330">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 333</h2>
              <p class="my-box-text">Managerial Accounting</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT333">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 341</h2>
              <p class="my-box-text">Introduction to Auditing</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT341">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>

        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">ACT 431</h2>
              <p class="my-box-text">Accounting Information Systems</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="ACT431">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">FIN 254</h2>
              <p class="my-box-text">Introduction to Financial Management</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="FIN254">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">FIN 340</h2>
              <p class="my-box-text">Working Capital Management</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="FIN340">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">FIN 433</h2>
              <p class="my-box-text">Financial Markets & Institutions</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="FIN433">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">FIN 440</h2>
              <p class="my-box-text">Corporate Finance</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="FIN440">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">FIN 435</h2>
              <p class="my-box-text">Investment Theory</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="FIN435">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        
        
    </div>
</div> 









<div id="footer"></div>

<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>