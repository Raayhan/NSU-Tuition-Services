<?php
require('../database/connect.php');
include('../controllers/TeacherLoginController.php');
include('../controllers/StudentLoginController.php');
include('../controllers/mail.php');

if((!isset($_SESSION['student'])) and (!isset($_SESSION['teacher']))  )
{
    // not logged in
    $_SESSION["error"]='You must login first !';
    header('Location: ../student/login.php');
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
    <title>Support | NSU-TS</title>
    
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
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/logo.png" alt=""></a>
      <nav class="nav-collapse">
      <?php 
        if (isset($_SESSION['student'])){
       echo'<ul>
          <li class="menu-item"><a href="../student/dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="../student/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;'.$_SESSION['student']['first_name'].'</a></li>
          <li class="menu-item"><a href="../student/tuitions.php"><i class="fas fa-book-open"></i>&nbsp; Tuitions</a></li>
          <li class="menu-item active"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>';
      }
      if (isset($_SESSION['teacher'])){
        echo'<ul>
        <li class="menu-item"><a href="../teacher/dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
        <li class="menu-item"><a href="../teacher/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;'.$_SESSION['teacher']['first_name'].'</a></li>
        <li class="menu-item active"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
        <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
        <li class="menu-item"><a href="../controllers/TeacherSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
        
      </ul>';

      }
      
    ?>
      </nav>
</header>


<div class="container-fluid contact-form" style="padding-left:0px;padding-right:0px;" >
    
     <div class="register mt-0">
                <div class="row">
                    <div class="col-md-3 register-left animated slideInLeft faster">
                        <img src="../img/icon-white.png" alt=""/>
                        
                        <h5>NSU Tuition Service</h5>
                        <h6><i class="fas fa-headset"></i> Find Support</h6>
                <span style="font-size:12px; text-align:left!important;"><i class="fas fa-envelope"></i> support@nsu-tuition.rf.gd</span><BR>
                <span style="font-size:12px;text-align:left!important;"><i class="fas fa-phone-alt"></i> +88 0171-7272999</span>
                        
                    </div>
                    <div class="col-md-9 register-right animated slideInUp faster">
                    
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-top:50px;">
                              
                                <h3 class="register-heading"><i class="fab fa-telegram-plane"></i>&nbsp; Send A Message</h3>
                                <div class="row justify-content-center login-form">
                                    <div class="col">
                                   
                                        <form method="post" style="padding-top: 10px; margin-top:10px;" action="../controllers/mail.php">
            

                <?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-warning" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
                                    } 
?>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="Name" class="form-control" placeholder="Your Name" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="Email" class="form-control" placeholder="Your Email" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Phone" class="form-control" placeholder="Your Phone Number" value="" required />
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="Message" class="form-control" placeholder="Your Message" style="width: 100%; height: 150px;"required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btn btn-primary" value="Send Message" />
                        </div>
                      
                    </div>
                </div>
                
            </form>
                                    
                                   
                                </div>
                             </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

           </div>
            
</div>




<div id="footer"></div>
<script src="../js/script.js"></script>
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>