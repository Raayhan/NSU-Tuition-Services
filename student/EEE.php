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
    <title>EEE | NSU-TS</title>
    
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
          <li class="menu-item"><a href="#projects"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>

<div class="section_title">

<h3>Electrical & Electronics Engineering</h3>
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
              <h2 class="my-box-title">EEE111</h2>
              <p class="my-box-text">Analog Electronics I</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE111">
              <button type="submit" class="box-button">Select</button>
              </form>

            </div>
          </div>

        </div>

        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 141</h2>
              <p class="my-box-text">Electrical Circuits I</p>
              <form action= "GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE141">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 211</h2>
              <p class="my-box-text">Digital Logic design</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE211">
              <button type="submit" class="box-button">Select</button>
              </form>
              
           </div>
          </div>
        </div>
        
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 221</h2>
              <p class="my-box-text">Signals and Systems</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE221">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 241</h2>
              <p class="my-box-text">Electrical Circuits II</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE241">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE311</h2>
              <p class="my-box-text">Analog Electronics II</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE311">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>

        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 312</h2>
              <p class="my-box-text">Power Electronics</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE312">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 321</h2>
              <p class="my-box-text">Intro to Communications Systems</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE321">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 342</h2>
              <p class="my-box-text">Control Engineering</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE342">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 361</h2>
              <p class="my-box-text">Electromagnetic Fields & Waves</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE361">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 362</h2>
              <p class="my-box-text">Electrical Machines</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE362">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 411</h2>
              <p class="my-box-text">Introduction to VLSI Design</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="EEE411">
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