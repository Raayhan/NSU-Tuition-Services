<?php
require('database/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <title>Welcome | NSU-TS</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script> 
        $(function(){
        $("#footer").load("/layouts/footer.html"); 
          });
    </script>     
</head>
<body>


      <nav class="navbar navbar-expand-lg navbar-light blue-gradient justify-content-md-center">
        
         <a class="navbar-brand" href="#"><img class="logo" src="img/nsu-ts.png" alt=""></a>
        
      </nav>
      
        
       

    
<div class="jumbotron text-center  p-4 mb-0">
      <div class="row justify-content-center welcome">
           
           <div class="col-md-4 offset-md-1 mx-3 my-3">
                <div class="view overlay">
                     <img src="https://i.ibb.co/BzrBsS2/Panel.png" class="img-fluid" alt="Panel Image">    
                </div>
           </div>

           
           <div class="col-md-7 text-md-left ml-3 mt-3" style="margin-left: 0px!important;">
               <a href="#!" class="red-text">
                   <h6 class="h6 pb-1"><i class="fas fa-chalkboard-teacher"></i>  Welcome</h6>
               </a>

               <h4 class="h5 mb-4 title">NORTH SOUTH UNIVERSITY TUITION SERVICES</h5>

               <p class ="para">NSU-TS is a platform for NSU Students to find suitable tutors for the courses which they find difficulties.It's also a platform for students who want to earn some money by giving tuitions to other students.</p>
    
               <div class="dropdown">
                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                       <i class="fas fa-sign-in-alt"></i> Login
                   </button>
                   <div class="dropdown-menu">
                      <a class="dropdown-item" href="student/login.php"><i class="fas fa-user-graduate"></i>&nbsp As Student</a>
                      <a class="dropdown-item" href="teacher/login.php"><i class="fas fa-user-tie"></i>&nbsp As Teacher</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-user-secret"></i>&nbsp As Admin</a>
                   </div>
                </div>
 
                 <div class="dropdown">    
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-user-plus"></i> Register
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="student/registration.php"><i class="fas fa-user-graduate"></i>&nbsp As Student</a>
                          <a class="dropdown-item" href="teacher/registration.php"><i class="fas fa-user-tie"></i>&nbsp As Teacher</a>
        
                      </div>
                 </div>
 

           </div>
  

      </div>


</div>


<!-- Footer -->
<div id="footer"></div>

</body>
</html>