

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script> 
        $(function(){
        $("#footer").load("../layouts/footer.html"); 
          });
    </script> 
<body>
   

<!----------- Navbar Start----------->

<header>
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/nsu-ts.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item"><a href="dashboard.php" data-scroll><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item active"><a href="profile.php" data-scroll><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;  <?php echo $_SESSION['student']['first_name']?></a></li>
          <li class="menu-item"><a href="#projects" data-scroll><i class="fas fa-phone-alt"></i> &nbsp;Support</a></li>
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
<?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-success" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
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
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Jane">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Bishop">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="email@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Company</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Website</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="url" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="" placeholder="City">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="" placeholder="State">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                            <div class="col-lg-9">
                                <select id="user_time_zone" class="form-control" size="0">
                                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                    <option value="Alaska">(GMT-09:00) Alaska</option>
                                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option value="Arizona">(GMT-07:00) Arizona</option>
                                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="janeuser">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="button" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>



<div id="footer"></div>
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>