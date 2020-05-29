<?php
require('../database/connect.php');
include('../controllers/TeacherLoginController.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>Teacher Login | NSU-TS</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light blue-gradient justify-content-md-center">
        <a class="navbar-brand" href="/"><img class="logo" src="../img/nsu-ts.png" alt=""></a>
        
      </nav>
      
      <div class="container-fluid register mt-0">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Login & Enjoy NSU-TS Services!</p>
                        <form action="TeacherRegistration.php" method="get">
                            <input type="submit" value="Register"/>
                        </form><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="TeacherRegistration.php" role="tab" aria-controls="profile" aria-selected="false">Teacher</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <form name="LoginForm" method="POST" onsubmit="return Validation()" action="../controllers/TeacherLoginController.php">
                                <h3 class="register-heading">Teacher Login</h3>
                                <div class="row justify-content-center login-form">
                                    <div class="col-sm-8">
                                    <?php  if(isset($_SESSION['error'])) { echo '
                                            <div class="alert alert-danger" role="alert" id="error">'.$_SESSION['error'].'</div>';
                                            unset($_SESSION['error']);
                                            } ?>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email"required/>
                                        </div>
                                      
                                   
                                    
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password"required/>
                                        </div>
                                        
                                        <input type="submit" class="btnLogin" name="login_btn" value="Login"/>
                                        
                                    </div>
                                    
                                   
                                </div>
                              </form>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- Footer -->
<footer class="page-footer font-small blue-gradient">

  
     
  

 
<div class="footer-copyright text-center py-3">© 2020 Copyright : 
  <a href="#"> NSU Tuition Services</a>
  <div>
    <p class="end"> Developed & Maintained By : Rayhan Ahmed Rakib</p>
  
  
</div>


</footer>
</body>
</html>