<?php
require('../database/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>Teacher Registration | NSU-TS</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> 
        $(function(){
        $("#footer").load("../layouts/footer.html"); 
          });
    </script> 

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navColor justify-content-md-center">
        <a class="navbar-brand" href="/"><img class="logo" src="../img/logo.png" alt=""></a>
        
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
                    <div class="row justify-content-center">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab"  href="" role="tab" aria-controls="home" aria-selected="true">Teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab"  href="../student/registration.php" role="tab" aria-controls="profile" aria-selected="false">Student</a>
                            </li>
                        </ul>
                        </div>   
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="teacher" role="tabpanel" aria-labelledby="home-tab" style="padding-top:50px;">
                                <h3 class="register-heading">Teacher Registration</h3>
                                <form method="POST" action="../controllers/AddTeacher.php">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name"required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password"required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" id="cpassword" name="cpassword" class="form-control"  placeholder="Confirm Password"required/>
                                            <span style="font-size:12px;" id='message'></span>
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

  
     
  

 
<idv id="footer"></div>

<script>
    $('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message').html('Matched <i class="fas fa-check-circle"></i>').css('color', 'green');
  } else 
    $('#message').html('Not Matching <i class="fas fa-times-circle"></i>').css('color', 'red');
});   
                           </script>    
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>