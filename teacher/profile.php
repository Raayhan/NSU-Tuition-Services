

<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php');

if(!isset($_SESSION['teacher']))
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
    <title><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?> | NSU-TS</title>
    
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
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/logo.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item"><a href="dashboard.php" data-scroll><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item active"><a href="profile.php" data-scroll><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;  <?php echo $_SESSION['teacher']['first_name']?></a></li>
          <li class="menu-item"><a href="../pages/support.php" data-scroll><i class="fas fa-phone-alt"></i> &nbsp;Support</a></li>
          <li class="menu-item"><a href="../pages/settings.php"><i class="fa fa-users-cog" aria-hidden="true"></i> &nbsp;Settings</a></li>
          <li class="menu-item"><a href="../controllers/teacherSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>
<!----------- Navbar End----------->

<div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-md-12" style="padding-left: 0px;padding-right:0px;">
            <div class="alert alert-info" role="alert" style="text-align:center; padding-top:2em;padding-bottom:2em;margin-bottom:0px;">
                           <html>
                                 <h5>Profile | <?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?></h5>
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
         <div class="col-lg-4 order-lg-1 text-center animated slideInLeft faster">
            <img src="../img/teacher.png" class="mx-auto img-fluid img-circle d-block" alt="avatar"style="border-radius: 50%;">
            <h4 class="mt-2"><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?></h4>
            <span>Teacher</span>
         </div>
        <div class="col-lg-8 order-lg-2">
             <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a href="" data-target="#profile" data-toggle="tab" class="nav-link tab_button active"><i class="far fa-user-circle" aria-hidden="true"></i> Profile</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#courses" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-book"></i> Courses</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#edit" data-toggle="tab" class="nav-link tab_button"><i class="far fa-edit"></i> Edit</a>
                  </li>
             </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3 animated zoomIn faster">Teacher Information</h5>
                    <div class="row information">
                        <div class="col-md-6 left animated zoomIn faster">
                            <hr>
                            <strong>Name :</strong> <?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?>
                            <hr>
                            <strong>NSU ID :</strong> <?php echo $_SESSION['teacher']['nsu_id'];?>
                            <hr>
                            <strong>Department :</strong> <?php echo $_SESSION['teacher']['department'];?>
                            <hr>
                            <strong>Email :</strong> <?php echo $_SESSION['teacher']['email'];?>
                            <hr>
                            <strong>Phone :</strong> <?php echo $_SESSION['teacher']['phone'];?>
                            <hr>
                            <strong>Gender :</strong> <?php echo $_SESSION['teacher']['gender'];?>
                            <hr>
                            <strong>Member Since :</strong> <?php echo $_SESSION['teacher']['member_since'];?>
                            <hr>
                        </div>
                        <div class="col-md-6 animated slideInRight faster">
                            <h6><i class="fas fa-award"></i> Recent badges</h6>
                            <a class="badge badge-dark badge-pill">Member</a>
                            <a class="badge badge-dark badge-pill">Teacher</a>
                            <a class="badge badge-dark badge-pill"><?php echo $_SESSION['teacher']['department'];?></a>
                            <a class="badge badge-dark badge-pill">NSU</a>
                            
                            <hr>
                            <span class="badge badge-info"><i class="fa fa-book-reader"></i> <?php 
                                                $result = mysqli_query($conn, "SELECT name FROM teacher_courses WHERE nsu_id = {$_SESSION['teacher']['nsu_id']}");
                                                $num_rows = mysqli_num_rows($result);
                                                
                                                echo "$num_rows";

                                                ?> Courses</span>
                            <span class="badge badge-primary"><i class="fas fa-user-graduate"></i>  <?php 
                                                $result = mysqli_query($conn, "SELECT student_id FROM student_courses WHERE teacher_id = {$_SESSION['teacher']['nsu_id']}");
                                                $num_rows = mysqli_num_rows($result);
                                                
                                                echo "$num_rows";

                                                ?> Students</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 0 Views</span>
                        </div>
                        <div class="col-md-12 animated slideInUp faster">
                            <h5 class="mt-4"><i class="far fa-clock"></i> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong><b><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?></b></strong> has started using <strong>NSU-TS</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <strong><b><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?></b></strong> has registred to NSU-TS</strong>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="courses">
                <div class="row justify-content-center animated zoomIn faster">
                              <h5 class="mb-3">Courses Information</h5>
                     </div>

                     <div class="table-responsive text-nowrap teacher_dashboard animated zoomIn faster"> 
                        <table class="table table-hover">
                               <thead class="rgba-teal-slight">
                                    <tr>
                                      <th>Course Name</th>
                                      <th>Added on</th>
                                      <th></th>
                                    </tr>
                               </thead>
                               <tbody>
                            

                           <?php
                
                                      $sql = "SELECT * FROM teacher_courses WHERE nsu_id = {$_SESSION['teacher']['nsu_id']}";
                                      $result = $conn->query($sql);
                                      
                                      if ($result->num_rows > 0) {
                                      // output data of each row
                                     
                                      while($row = $result->fetch_assoc()) {
                                        
                                        echo"<tr>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['time']."</td>";
                                        echo '<td><form action="../controllers/DeleteTCourse.php" method="POST">';
                                        echo '<input type="hidden" name="id" value= '.$row['id'].'>';
                                        echo '<input type="hidden" name="name" value= '.$row['name'].'>';

                                        echo '<button type="submit" name="DeleteCourse_btn" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></form></td>';
                                        echo "</tr>";




                                        
                                    }
                                  } 
                                  
                                  else {
                                        
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>"; echo "No Course Available"; echo "</td>";
                                        echo "<td>"; echo "NULL"; echo "</td>";
                                        echo "</tr>";
                                        echo "</tbody>";
                                      }  
                                                                          
                            ?>
                   
                           </tbody>
                      </table>
                   </div>
                </div>
                <div class="tab-pane" id="edit">
                <form role="form" action="../controllers/UpdateTeacher.php" method="POST" id="myForm">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="first_name" type="text" value="<?php echo $_SESSION['teacher']['first_name'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="last_name" type="text" value="<?php echo $_SESSION['teacher']['last_name'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" type="email" value="<?php echo $_SESSION['teacher']['email'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="phone" type="text" value="<?php echo $_SESSION['teacher']['phone'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">NSU ID</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="nsu_id" type="number" value="<?php echo $_SESSION['teacher']['nsu_id'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department</label>
                            <div class="col-lg-9">
                                    <select name="department" class="form-control">
                                        <option value="<?php echo $_SESSION['teacher']['department']?>" selected>Department</option>
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
                                    <option value="<?php echo $_SESSION['teacher']['gender']?>" selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                    
                                </select>
                                <input type="hidden" name="id" value="<?php echo $_SESSION['teacher']['id'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label red-text">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="password" name="password" type="password" value="<?php echo $_SESSION['teacher']['password'];?>">
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
}); 




</script>      
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>