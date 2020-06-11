

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
<a class="navbar-brand" href="dashboard.php"><img class="logo" src="../img/nsu-ts.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item"><a href="dashboard.php" data-scroll><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li class="menu-item active"><a href="profile.php" data-scroll><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;  <?php echo $_SESSION['teacher']['first_name']?></a></li>
          <li class="menu-item"><a href="#projects" data-scroll><i class="fas fa-phone-alt"></i> &nbsp;Support</a></li>
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
    <div class="row my-2">
         <div class="col-lg-4 order-lg-1 text-center">
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
                    <h5 class="mb-3">Teacher Information</h5>
                    <div class="row information">
                        <div class="col-md-6 left">
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
                        <div class="col-md-6">
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
                        <div class="col-md-12">
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
                <div class="row justify-content-center">
                              <h5 class="mb-3">Courses Information</h5>
                     </div>

                     <div class="table-responsive text-nowrap teacher_dashboard"> 
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