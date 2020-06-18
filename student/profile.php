

<?php
require('../database/connect.php');
include('../controllers/AddStudent.php');

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <title><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?> | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="../js/responsive-nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <script> 
        $(function(){
        $("#footer").load("../layouts/footer.html"); 
          });
    </script> 
<body>
   

<!----------- Navbar Start----------->

<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/logo.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item"><a href="dashboard.php" data-scroll><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item active"><a href="profile.php" data-scroll><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item"><a href="../pages/support.php" data-scroll><i class="fas fa-phone-alt"></i> &nbsp;Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/StudentSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>
<!----------- Navbar End----------->

<div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-md-12" style="padding-left: 0px;padding-right:0px;">
            <div class="alert alert-info" role="alert" style="text-align:center; padding-top:2em;padding-bottom:2em;margin-bottom:0px;">
                           <html>
                                 <h5>Profile | <?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?></h5>
                           </html>
            </div>
         </div>       
      </div>
</div>
  

<div class="container profile">
<?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-info" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
                                    } 
?>
    <div class="row my-2">
        
         <div class="col-lg-4 order-lg-1 text-center animated zoomIn">
            <img src="../img/user.png" class="mx-auto img-fluid img-circle d-block" alt="avatar"style="border-radius: 50%;">
            <h4 class="mt-2"><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?></h4>
            <span>Student</span>
         </div>
        <div class="col-lg-8 order-lg-2">
             <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a href="" data-target="#profile" data-toggle="tab" class="nav-link tab_button active"><i class="far fa-user-circle" aria-hidden="true"></i> Profile</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#courses" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-book"></i> My Courses</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#edit" data-toggle="tab" class="nav-link tab_button"><i class="far fa-edit"></i> Edit</a>
                  </li>
             </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Student Information</h5>
                    <div class="row information">
                        <div class="col-md-6 left animated zoomIn">
                            <hr>
                            <strong>Name :</strong> <?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?>
                            <hr>
                            <strong>NSU ID :</strong> <?php echo $_SESSION['student']['nsu_id'];?>
                            <hr>
                            <strong>Department :</strong> <?php echo $_SESSION['student']['department'];?>
                            <hr>
                            <strong>Email :</strong> <?php echo $_SESSION['student']['email'];?>
                            <hr>
                            <strong>Phone :</strong> <?php echo $_SESSION['student']['phone'];?>
                            <hr>
                            <strong>Gender :</strong> <?php echo $_SESSION['student']['gender'];?>
                            <hr>
                            <strong>Member Since :</strong> <?php echo $_SESSION['student']['member_since'];?>
                            <hr>
                        </div>
                        <div class="col-md-6 animated slideInRight">
                            <h6><i class="fas fa-award"></i> Recent badges</h6>
                            <a class="badge badge-dark badge-pill">Member</a>
                            <a class="badge badge-dark badge-pill">Student</a>
                            <a class="badge badge-dark badge-pill"><?php echo $_SESSION['student']['department'];?></a>
                            <a class="badge badge-dark badge-pill">NSU</a>
                            
                            <hr>
                            <span class="badge badge-info"><i class="fa fa-book-reader"></i> &nbsp;<?php 
                                                $result = mysqli_query($conn, "SELECT course_name FROM student_courses WHERE student_id = {$_SESSION['student']['nsu_id']}");
                                                $num_rows = mysqli_num_rows($result);
                                                
                                                echo "$num_rows";

                                                ?> Courses</span>
                            <span class="badge badge-primary"><i class="fa fa-user-tie"></i>  &nbsp;<?php 
                                                $result = mysqli_query($conn, "SELECT teacher_id FROM student_courses WHERE student_id = {$_SESSION['student']['nsu_id']}");
                                                $num_rows = mysqli_num_rows($result);
                                                
                                                echo "$num_rows";

                                                ?> Teachers</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 0 Views</span>
                        </div>
                        <div class="col-md-12 animated slideInUp faster">
                            <h5 class="mt-4"><i class="far fa-clock"></i> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong><b><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?></b></strong> has started using <strong>NSU-TS</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <strong><b><?php echo $_SESSION['student']['first_name'].' '.$_SESSION['student']['last_name'];?></b></strong> has registred to NSU-TS</strong>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="courses">
                    
                <h5 class="mb-3">Course Information</h5>
                <div class="list-group course_table my-3">
                    <a class="list-group-item list-group-item-action flex-column align-items-start animated slideInRight">
                           

                <?php
                
                                      $sql = "SELECT * FROM student_courses WHERE student_id = {$_SESSION['student']['nsu_id']}";
                                      $result = $conn->query($sql);
                                      
                                      if ($result->num_rows > 0) {
                                      // output data of each row
                                     
                                      while($row = $result->fetch_assoc()) {
                                        echo '<div class="d-flex w-100 justify-content-between">';
                                        echo'<h5 class="mb-2 h5">'.$row['course_name']."</h5>";
                                        echo '<small>';
                                        echo '<form action="../controllers/DeleteCourse.php" method="POST">';
                                                       
                                        echo '<input type="hidden" name="course_id" value= '.$row['id'].'>';
                                        echo '<input type="hidden" name="course_name" value= '.$row['course_name'].'>';              
                                        echo '<button type="submit" name="DeleteCourse_btn" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                        echo '</form>';
                                        echo '</small>';
                                        echo "</div>";

                                        echo '<div class="mb-2">';
                                        echo '<div class="course_list">
                                              <hr><strong>Teacher Name : </strong>'.$row['teacher_name'].'<hr>';
                                              echo '<strong>NSU ID : </strong>'.$row['teacher_id'].'<hr>';
                                              echo '<strong>Department : </strong>'.$row['teacher_department'].'<hr>';
                                              echo '<strong>Phone : </strong>'.$row['teacher_phone'].'<hr>';
                                              echo '<strong>Email : </strong>'.$row['teacher_email'].'<hr>';
                                              echo '<strong>Added On : </strong>'.$row['time'].'<hr>';
                                        
                                              
                                              echo '</div>';
                                              echo '<BR><hr>';
                                              echo '</div>';








                                        
                                    }
                                  } 
                                  
                                  else {
                                        
                                         echo "No Courses Available";
                                         
                                       
                                      }  
                                                                          
                                ?>
                   
                                        </a>
                                    </div>


                </div>
                <div class="tab-pane" id="edit">
                    <form role="form" action="../controllers/UpdateStudent.php" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="first_name" type="text" value="<?php echo $_SESSION['student']['first_name'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="last_name" type="text" value="<?php echo $_SESSION['student']['last_name'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" type="email" value="<?php echo $_SESSION['student']['email'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="phone" type="text" value="<?php echo $_SESSION['student']['phone'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">NSU ID</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="nsu_id" type="number" value="<?php echo $_SESSION['student']['nsu_id'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department</label>
                            <div class="col-lg-9">
                                    <select name="department" class="form-control">
                                        <option value="<?php echo $_SESSION['student']['department']?>" selected>Department</option>
                                        <option value="ECE">ECE</option>
                                        <option value="BBA">BBA</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="English">English</option>
                                        <option value="Enviromental Science">Environmental Science</option>
                                        <option value="Others">Others</option>
                                    </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-9">
                                  <select name="gender" class="form-control">
                                    <option value="<?php echo $_SESSION['student']['gender']?>" selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                    
                                </select>
                                <input type="hidden" name="id" value="<?php echo $_SESSION['student']['id'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label red-text">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="password" name="password" type="password" value="<?php echo $_SESSION['student']['password'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label red-text">Confirm Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="cpassword" name="cpassword" type="password">
                                <span style="font-size:12px;" id='message'></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" name="update_btn" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
});                              </script>    
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>