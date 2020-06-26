<?php

include('../controllers/StudentLoginController.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title>Reset Password | NSU-TS</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
                        <p>Enjoy NSU-TS Services!</p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="row justify-content-center">
                        
                        </div>    
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-top:50px;">
                              <form name="LoginForm" method="POST" onsubmit="return Validation()" action="../controllers/StudentLoginController.php">
                                <h3 class="register-heading">Reset Password</h3>
                                <div class="row justify-content-center login-form">
                                    <div class="col-sm-6">
                                    
                                    
                                    <?php  if(isset($_SESSION['error'])) { echo '
                                            <div class="alert alert-danger" role="alert" id="error">'.$_SESSION['error'].'</div>';
                                            unset($_SESSION['error']);
                                            } 
                                    ?>
                                     
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="&#xf0e0; Your Email"style="font-family:Alata, FontAwesome"required/>
                                        </div>
                                       <div class="form-group">
                                          <div class="form-group">
                                                    <select name="user_type" class="form-control" style="font-family:Alata, FontAwesome"required>
                                                        <option class="hidden"  selected disabled>&#xf2bd; Select User Type</option>
                                                        <option value="student">&#xf2bd; Student</option>
                                                        <option value="teacher">&#xf2bd; Teacher</option>
                                                        
                                                    </select>
                                                </div>
                                       </div>
                                    
                                       
                                        
                                        <input type="submit" class="btnLogin" name="submit_btn" value="Submit"/>
                                       
                                        
                                    </div>
                                    
                                   
                                </div>
                              </form>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- Footer -->
<div id="footer"></div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>