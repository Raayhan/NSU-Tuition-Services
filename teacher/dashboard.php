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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
           <div class="alert alert-info" role="alert" style="text-align:center;margin-bottom:0px;">
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

  <div class="container profile teacher_dashboard">
  <div class ="row justify-content-center mb-4">
  <h6><i class="fas fa-user-tie"></i> Teacher Panel</h6>
  </div>
        <?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-success" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']);
                                            } 
        ?>
    <div class="row justify-content-center my-2">
        
         
        <div class="col-lg-8 order-lg-2">
             <ul class="nav nav-tabs justify-content-around">
                  <li class="nav-item">
                      <a href="" data-target="#status" data-toggle="tab" class="nav-link tab_button active"><i class="fas fa-check-circle" aria-hidden="true"></i> Status</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#courses" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-book"></i> My Courses</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#add" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-plus-circle"></i> Add A Course</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#remove" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-minus-circle"></i> Remove A Course</a>
                  </li>
             </ul>
            <div class="tab-content py-4">
                
                
                <div class="tab-pane active" id="status">
                    <h5 class="mb-3">Status</h5>
                    
                    
                    
                </div>
                <div class="tab-pane" id="courses">
                    
                    <h5 class="mb-3">Course Information</h5>
                


                </div>
                
                
                <div class="tab-pane" id="add">
                     
                     <h5 class="mb-3">Add A Course</h5>

                </div>
                
                
                <div class="tab-pane" id="remove">
                     
                     <h5 class="mb-3">Remove A Course</h5>

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