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
    <title>Tuitions | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    
    
    <script src="../js/responsive-nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
        <ul>
          <li class="menu-item"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item active"><a href="tuitions.php"><i class="fas fa-book-open"></i>&nbsp; Tuitions</a></li>
          <li class="menu-item"><a href="../pages/support.php"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>
<div class="section_title">

<h3>Available Tuitions <span style="font-size:14px!important;" class="badge badge-danger badge-pill GetTeacherList"> <?php 
                                                $result = mysqli_query($conn, "SELECT name FROM teacher_courses");
                                                $num_rows = mysqli_num_rows($result);
                                                
                                                echo "$num_rows";

                                                ?></span></h3>

</div>

<div class="container mb-5">
    <div class="row justify-content-start">
       <button class="btn back_button" onclick="goBack()"><i class="fas fa-chevron-circle-left"></i> Go Back</button>
    </div>
    <div class="row">

<?php
$sql = "SELECT * FROM teacher_courses ";
                                      $result = $conn->query($sql);

                                      if ($result->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {


     echo '<div class="col-md-3 mb-4 animated zoomIn faster">
               <div class="card card-cascade">

           
                    <div class="view view-cascade gradient-card-header blue-gradient p-2">';

              
                  echo '<h5 class="card-header-title my-2" style="text-align:center; color:white;">'.$row['name'].'</h5>';
             
              

              echo '</div>

            
                   <div class="card-body card-body-cascade text-center GetTeacherList" style="text-align:left!important;font-size:12px;padding-left:5%;padding-right:5%;">';

              
                    echo '<span>Teacher : <b>'.$row['first_name']." ".$row['last_name'].'</b> </span><hr>';
                    echo '<span>Department : '.$row['department'].'</span><hr>';
                    echo '<span>NSU ID : '.$row['nsu_id'].'</span><hr>';
                    echo '<span>Email : '.$row['email'].'</span><hr>';
                    echo '<span>Phone : '.$row['phone'].'</span><hr>';
                    
                    echo                   '<form action="../controllers/AddCourse.php" method="POST">';
                                  
                  echo                     '<input type="hidden" name="course_name" value= '.$row['name'].'>';
                  echo                     '<input type="hidden" name="student_name" value='.$_SESSION['student']['first_name'].'&nbsp;'.$_SESSION['student']['last_name'].">";
                  echo                     '<input type="hidden" name="teacher_name" value='.$row['first_name'].'&nbsp;'.$row['last_name'].">";
                  echo                     '<input type="hidden" name="teacher_id" value= '.$row['nsu_id'].'>';
                  echo                     '<input type="hidden" name="student_id" value= '.$_SESSION['student']['nsu_id'].'/>';
                  echo                     '<input type="hidden" name="teacher_email" value= '.$row['email'].'>';
                  echo                     '<input type="hidden" name="teacher_phone" value= '.$row['phone'].'>';
                  echo                     '<input type="hidden" name="teacher_department" value= '.$row['department'].'>';


              
                   echo '<div class="row justify-content-center mt-4">
                            <button type="submit" name="ADDCourse_btn" class="box-button">Select</button>
                        </div>
                                          </form>
                </div>

            </div>
        </div>';
                                      }}
                                       else{
                                        echo '<div class="d-flex justify-content-center" style="height: 42vh;">No Tuitions Available</div>';
                                      }
 ?>
    </div>
</div>  



<div id="footer"></div>

<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>