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
        
    
</head>
<body>


      <nav class="navbar navbar-expand-lg navbar-light blue-gradient justify-content-md-center">
        <a class="navbar-brand" href="#"><img class="logo" src="img/nsu-ts.png" alt=""></a>
        
      </nav>
      
        
       

     <!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4 mb-0">

<!-- Grid row -->
<div class="row welcome">

  <!-- Grid column -->
  <div class="col-md-4 offset-md-1 mx-3 my-3">

    <!-- Featured image -->
    <div class="view overlay">
      <img src="https://i.ibb.co/BzrBsS2/Panel.png" class="img-fluid" alt="Panel Image">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-md-7 text-md-left ml-3 mt-3" style="margin-left: 0px!important;">

    <!-- Excerpt -->
    <a href="#!" class="red-text">
      <h6 class="h6 pb-1"><i class="fas fa-chalkboard-teacher"></i>  Welcome</h6>
    </a>

    <h4 class="h5 mb-4 title">NORTH SOUTH UNIVERSITY TUITION SERVICES</h5>

    <p class ="para">NSU-TS is a platform for NSU Students to find suitable tutors for the courses which they find difficulties.It's also a platform for students who want to earn some money by giving tuitions to other students.</p>
    
    <div class="dropdown">
      <a class=" btn btn-indigo darken-4 front"><i class="fas fa-sign-in-alt"></i> Login</a>
      <div class="dropdown-content">
          <a href="pages/StudentLogin.php"><i class="fas fa-users"></i>&nbspAs a Student</a>
          <a href="#"><i class="fas fa-user-tie"></i>&nbspAs a Teacher</a>
          <a href="#"><i class="fas fa-user-tie"></i>&nbspAs an Admin</a>
          
      </div>
    </div>

    <div class="dropdown">
    <a class="btn btn-red darken-4 front"><i class="fas fa-user-plus"></i> Register</a>
    <div class="dropdown-content">
          <a href="pages/StudentRegistration.php"><i class="fas fa-users"></i> As a Student</a>
          <a href="pages/TeacherRegistration.php"><i class="fas fa-user-tie"></i> As a Teacher</a>
          
      </div>
    </div>
  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

</div>
<!-- News jumbotron -->




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