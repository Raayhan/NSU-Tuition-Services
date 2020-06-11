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
    <title>EEE | NSU-TS</title>
    
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

<?php
  $course = $_GET['course'];
  echo '<div class="section_title py-5">';
       
  echo            '<h4>Available Teacher Information for '.$course.'</h4>';
  echo            '<h6>Please select your desired course for tuition</h6>';
        
  echo '</div>';

  echo '<div class="container mb-5 p-4">';
  echo      '<div class="row justify-content-center">';
    
   
 
  
  
  
  $sql = "SELECT * FROM teacher_courses WHERE name = '$course'";
                                      $result = $conn->query($sql);

                                      if ($result->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {
  
                                        echo '<div class="col-md-4 animated zoomIn">';
                                        
                                       
                                        echo '<div class="my-card-option">';
                                        echo      '<div class="my-card-heading"><h5><i class="fas fa-user-tie"></i> <b>'.$row['first_name']." ".$row['last_name'].'</b></h5></div>';
                                        echo            '<div class="my-card-content">';
                                        echo                 '<h2 class="my-box-title">'.$course.'</h2>';
                                        echo                  '<div class="GetTeacherList"> <hr>';
                                        echo                       '<strong>NSU ID : </strong>'.$row['nsu_id'].'<hr>';
                                        echo                       '<strong>Department : </strong>'.$row['department'].'<hr>';
                                        echo                       '<strong>Phone : </strong>'.$row['phone'].'<hr>';
                                        echo                       '<strong>Email : </strong>'.$row['email'].'<hr>';
                                        
                                              
                                        echo                   '</div>';
                                        echo '<BR>';
                                        echo                   '<form action="../controllers/AddCourse.php" method="POST">';
                                                       
                                        echo                     '<input type="hidden" name="course_name" value= '.$course.'>';
                                        echo                     '<input type="hidden" name="student_name" value='.$_SESSION['student']['first_name'].'&nbsp;'.$_SESSION['student']['last_name'].">";
                                        echo                     '<input type="hidden" name="teacher_name" value='.$row['first_name'].'&nbsp;'.$row['last_name'].">";
                                        echo                     '<input type="hidden" name="teacher_id" value= '.$row['nsu_id'].'>';
                                        echo                     '<input type="hidden" name="student_id" value= '.$_SESSION['student']['nsu_id'].'/>';
                                        echo                     '<input type="hidden" name="teacher_email" value= '.$row['email'].'>';
                                        echo                     '<input type="hidden" name="teacher_phone" value= '.$row['phone'].'>';
                                        echo                     '<input type="hidden" name="teacher_department" value= '.$row['department'].'>';

                                        echo                     '<button type="submit" name="ADDCourse_btn" class="box-button">ADD</button>';
                                        echo                    '</form>';
                                        echo             '</div>';
                                          
                                        echo        '</div>';
                                        
                                        echo '</div>';
  
  
  
  
  

                                      }}
                                      else{
                                        echo '<div class="d-flex justify-content-center" style="height: 42vh;">No Teacher Available</div>';
                                      }
         
  
        echo '</div>';
  echo '</div>';
?>


<div id="footer"></div>
<script src="../js/script.js"></script>
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>