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
    <title>CSE | NSU-TS</title>
    
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
    </script> 
  
</head>  

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

<div class="section_title">

<h3>Computer Science & Engineering</h3>
<h6>Please select your desired course for tuition</h6>
</div>



<div class="container mb-5">
    <div class="row">
      <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 115</h2>
              <p class="my-box-text">Programming Language I</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE115">
              <button type="submit" class="box-button">Select</button>
              </form>

            </div>
          </div>

        </div>

        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 173</h2>
              <p class="my-box-text">Discrete Mathematics</p>
              <form action= "GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE173">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 215</h2>
              <p class="my-box-text">Programming Language II</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE215">
              <button type="submit" class="box-button">Select</button>
              </form>
              
           </div>
          </div>
        </div>
        
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 225</h2>
              <p class="my-box-text">Data Structures  and Algorithm</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE225">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 231</h2>
              <p class="my-box-text">Digital Logic Design</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE231">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE311</h2>
              <p class="my-box-text">Database Systems</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE311">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>

        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 323</h2>
              <p class="my-box-text">Operating Systems Design</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE323">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 327</h2>
              <p class="my-box-text">Software Engineering</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE327">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 331</h2>
              <p class="my-box-text">Microprocessor Interfacing & Embedded Sys.</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE331">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 373</h2>
              <p class="my-box-text">Design and Analysis of Algorithms</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE373">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 332</h2>
              <p class="my-box-text">Computer Organization and Architecture</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE332">
              <button type="submit" class="box-button">Select</button>
              </form>
           </div>
          </div>
        </div>
        <div class="col-md-3 animated zoomIn faster">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE 425</h2>
              <p class="my-box-text">Concepts of Programming Language</p>
              <form action="GetTeacher.php" method="GET"> 
              <input type="hidden" name="course" value="CSE425">
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