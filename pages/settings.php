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
    <title>Settings | NSU-TS</title>
    
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
      <?php 
        if (isset($_SESSION['student'])){
       echo'<ul>
          <li class="menu-item"><a href="../student/dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="../student/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;'.$_SESSION['student']['first_name'].'</a></li>
          <li class="menu-item"><a href="../student/tuitions.php"><i class="fas fa-book-open"></i>&nbsp; Tuitions</a></li>
          <li class="menu-item"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item active"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>';
      }
      if (isset($_SESSION['teacher'])){
        echo'<ul>
        <li class="menu-item"><a href="../teacher/dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
        <li class="menu-item"><a href="../teacher/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;'.$_SESSION['teacher']['first_name'].'</a></li>
        <li class="menu-item"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
        <li class="menu-item active"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
        <li class="menu-item"><a href="../controllers/TeacherSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
        
      </ul>';

      }
      
    ?>
      </nav>
</header>


<div class="container contact-form" style="padding-bottom:45px;">

    <div class="row justify-content-start">
       <button class="btn back_button ml-4 mt-4" onclick="goBack()"><i class="fas fa-chevron-circle-left"></i> Go Back</button>
    </div>
    <div class="row justify-content-center">
       <h3><i class="fa fa-users-cog" aria-hidden="true"></i>&nbsp; Settings</h3>
       
    </div>
    <?php  if(isset($_SESSION['error'])) { echo '
                                            <div class="alert alert-info" style=" width :100%!important;text-align:center;display:inline-block;" role="alert" id="error">'.$_SESSION['error'].'</div>';
                                            unset($_SESSION['error']);
                                            } 
                                    ?>
    
                                   
    <div class="row course_list p-4">

        <h5> Account Settings<hr></h5>
        
    </div>
   
    <button class="btn btn-indigo custom" type="button" data-toggle="collapse" data-target="#ChangeEmail"
         aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-envelope"></i> &nbsp;Change Email&nbsp; <i class="fas fa-caret-down"></i></button>
        <div class="collapse" id="ChangeEmail">
             <div class="card card-body mb-4 settings_card" style="padding-top:50px!important; margin-left:6px;">
             
             <form style="padding:10px!important" method="POST" action="../controllers/ChangeMail.php">
                <div class="form-group">
                  <input style="border-radius:5px;" type="email" name="email"  class="form-control" placeholder="Enter New E-mail"required>
                </div>
                <div class="form-group">
                  <input style="border-radius:5px;" type="password" name="password"  class="form-control" placeholder="Enter Account Password"required>
                </div>
                 <input type="hidden" name="id" value= "<?php
                 if (isset($_SESSION['student'])){
                 echo $_SESSION['student']['id'];};
                 if (isset($_SESSION['teacher'])){
                  echo $_SESSION['teacher']['id'];};
                 
                 ?>">
                              

                  <button class="btn btn-dark-green btn-sm" style="padding:5px!important;margin-left:0px!important;" name="change_btn" type="submit">Change Email</button>


             </form>
                 
             </div>
        </div>
        
     <button class="btn btn-indigo custom" type="button" data-toggle="collapse" data-target="#ChangePassword"
                 aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-key"></i> &nbsp;Change Password&nbsp; <i class="fas fa-caret-down"></i></button>
                 <div class="collapse" id="ChangePassword">
                   <div class="card card-body mb-4 settings_card" style="padding-top:50px!important; margin-left:6px;">
             
                       <form style="padding:10px!important" method="POST" action="../controllers/ChangePassword.php">
                          <div class="form-group">
                             <input style="border-radius:5px;" name="password" type="password"  class="form-control mb-4" placeholder="Old Password"required>
                          </div>
                          <div class="form-group">
                              <input style="border-radius:5px;" id="password" name="newPassword" type="password" class="form-control mb-4" placeholder="New Password"required>
                         </div>
                         <div class="form-group">
                              <input style="border-radius:5px;" id="cpassword" type="password" class="form-control mb-4" placeholder="Confirm New Password"required>
                              <span style="font-size:12px;" id='message'></span>
                         </div>


                         <input type="hidden" name="id" value= "<?php
                              if (isset($_SESSION['student'])){
                              echo $_SESSION['student']['id'];};
                              if (isset($_SESSION['teacher'])){
                                echo $_SESSION['teacher']['id'];};
                              
                              ?>">
                              

                  <button class="btn btn-dark-green btn-sm" style="padding:5px!important;margin-left:0px!important;" name="change_btn" type="submit">Change Password</button>



             </form>
                 
             </div>
                 </div>
     <button class="btn btn-indigo custom" type="button" data-toggle="collapse" data-target="#DeleteAccount"
                 aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-trash"></i> &nbsp;Delete Account&nbsp; <i class="fas fa-caret-down"></i></button>
                 <div class="collapse" id="DeleteAccount">
                 <div class="card card-body mb-4 settings_card" style="padding-top:50px!important; margin-left:6px;">
                 <span class="red-text" style="font-size:14px!important;"> Deleting account will permanently remove account activities,informations & data. This process can not be undone.</span>
                
                 <form style="padding:10px!important" method="POST" action="../controllers/DeleteAccount.php">
                      <div class="checkbox mt-4" style="font-size:12px!important;">
                         <label><input type="checkbox" value=""required>  &nbsp;I Agree</label>
                      </div>
                          
                          <div class="form-group">
                             <input style="border-radius:5px;" name="password" type="password"  class="form-control mb-4" placeholder="Enter Account Password"required>
                          </div>
                          


                         <input type="hidden" name="id" value= "<?php
                              if (isset($_SESSION['student'])){
                              echo $_SESSION['student']['id'];};
                              if (isset($_SESSION['teacher'])){
                                echo $_SESSION['teacher']['id'];};
                              
                              ?>">
                              

                  <button class="btn btn-danger btn-sm" style="padding:5px!important;margin-left:0px!important;" name="delete_btn" type="submit">Delete Account</button>



             </form>
                    </div>
                 </div>
    <div class="row course_list p-4">
        <h5> Activity Settings<hr></h5>
        
    </div>
    <button class="btn btn-indigo custom" type="button" data-toggle="collapse" data-target="#ResetAccount"
                 aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-redo"></i> &nbsp;Reset Activity&nbsp; <i class="fas fa-caret-down"></i></button>
                 <div class="collapse" id="ResetAccount">
                 <div class="card card-body mb-4 settings_card" style="padding-top:50px!important; margin-left:6px;">
                     
                    </div>
                 </div>
</div>


<div id="footer"></div>
<script>
    $('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message').html('Matched <i class="fas fa-check-circle"></i>').css('color', 'green');
  } else 
    $('#message').html('Not Matching <i class="fas fa-times-circle"></i>').css('color', 'red');
});   
                           </script>    
<script src="../js/script.js"></script>
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>