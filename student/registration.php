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
    <title>Student Registration | NSU-TS</title>

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
                        <p>You are 30 seconds away from becoming a NSU-TS Member!</p>
                        <form action="login.php" method="get">
                            <input type="submit" value="Login"/>
                        </form><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="../teacher/registration.php" role="tab" aria-controls="profile" aria-selected="false">Teacher</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-top:50px;">
                              <form name="RegForm" method="POST" onsubmit="return Validation()" action="../controllers/AddStudent.php">
                                <h3 class="register-heading">Student Registration</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name"required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password"required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="cpassword" class="form-control"  placeholder="Confirm Password"required/>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email"required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="11" maxlength="11" name="phone" class="form-control" placeholder="Your Phone"required/>
                                        </div>
                                        
                                        <div class="row d-flex bd-highlight mx-0">
                                          
                                                <div class="form-group flex-grow-1 bd-highlight" style="padding-right:5px;">
                                                    <select name="department" class="form-control">
                                                        <option class="hidden"  selected disabled>Department</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="BBA">BBA</option>
                                                        <option value="Architecture">Architecture</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="Civil Engineering">Civil Engineering</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group flex-grow-1 bd-highlight" style="padding-left:5px;">
                                                    <select name="gender" class="form-control">
                                                        <option class="hidden"  selected disabled>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                        
                                                    </select>
                                                </div>
                                        </div>
                                                <div class="form-group">
                                                    <input type="text" name="nsu_id" minlength="10" maxlength="10" class="form-control" placeholder="NSU ID"required/>
                                                </div>
                                          
                                            
                                            
                                        <input type="hidden" name="member_since"/>
                                        <input type="submit" class="btnRegister" name="register_btn" value="Register"/>
                                        

                                       
                                    </div>
                                    <span class="mt-4">By clicking "Register" you agree with our <a class="red-text">Terms of Services</a></span>
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