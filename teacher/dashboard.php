<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php');
include('../controllers/TeacherLoginController.php');

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
    <title>Teacher Dashboard | NSU-TS</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/responsive-nav.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <script src="../js/responsive-nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
          <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;  <?php echo $_SESSION['teacher']['first_name']?></a></li>
          <li class="menu-item"><a href="#projects"><i class="fas fa-phone-alt"></i>&nbsp; Support</a></li>
          <li class="menu-item"><a href="../controllers/TeacherSignout.php"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
          
        </ul>
      </nav>
</header>


<div class="container-fluid">
      <div class="row">
        <div class="col-md-12" style="padding-left: 0px;padding-right:0px;">
          <div class="section-title">
           <div class="alert alert-info" role="alert" style="text-align:center;margin-bottom:0px;">
            <h2>Welcome !</h2>

                         <?php  if (isset($_SESSION['teacher'])) : ?>

                           <html>
                                 <h6><?php echo $_SESSION['teacher']['first_name'].' '.$_SESSION['teacher']['last_name'];?> <span style="font-size:10px!important;">(Teacher)</span></h6>
                           </html>

                         <?php endif ?>
           </div>
                         

            
          </div>
        </div>
      </div>
  </div>

  <div class="container profile">
  <?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-success" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
                                    } 
?>

  <div class ="row justify-content-center mb-4">
  <h6><i class="fas fa-user-tie"></i> Teacher Panel</h6>
  </div>
        <?php  if(isset($_SESSION['error'])) { echo '<div class="alert alert-success" style="text-align:center;" role="alert" id="error">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']);
                                            } 
        ?>
    <div class="row justify-content-center my-2">
        
         
        <div class="col-lg-8 order-lg-2">
             <ul class="nav nav-tabs justify-content-around">
                  <li class="nav-item">
                      <a href="" data-target="#status" data-toggle="tab" class="nav-link tab_button active"><i class="fas fa-check-circle" aria-hidden="true"></i> Status</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#courses" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-book"></i> Courses</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#add" data-toggle="tab" class="nav-link tab_button"><i class="fas fa-plus-circle"></i> Add</a>
                  </li>
                  
             </ul>
            <div class="tab-content teacher_dashboard py-5">
                
                
                <div class="tab-pane active" id="status">
                    <h5 class="mb-3">Status</h5>
                    
                    
                    
                </div>
                <div class="tab-pane" id="courses">
                    
                     <div class="row justify-content-center">
                              <h5 class="mb-3">Courses Information</h5>
                     </div>

                     <div class="table-responsive text-nowrap"> 
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
                
                
                <div class="tab-pane" id="add">
                         <div class="row justify-content-center">
                              <h5 class="mb-3">Add A Course</h5>
                          </div>
                          <div class="row justify-content-center"style="margin-left: 0px;margin-right: 0px;">
                          <form method="POST" action="../controllers/AddTeacherCourse.php">
                              
                              <select name="name" class=" form-control selectpicker mb-4" data-live-search="true" data-width="auto" data-style="btn-indigo">
                                                       <option value="" selected="selected">Select course</option>
                                            <optgroup label="Electrical & Computer Engineering">
                                                       <option value="CSE 115 Programming Language I">CSE115 Programming Language I</option>
                                                       <option value="CSE 173">CSE173</option>
                                                       <option value="CSE 215">CSE215</option>
                                                       <option value="CSE 225">CSE225</option>
                                                       <option value="CSE 231">CSE231</option>
                                                       <option value="CSE 311">CSE311</option>
                                                       <option value="CSE 323">CSE323</option>
                                                       <option value="CSE 327">CSE327</option>
                                                       <option value="CSE 331">CSE331</option>
                                                       <option value="CSE 373">CSE373</option>
                                                       <option value="CSE 332">CSE332</option>
                                                       <option value="CSE 425">CSE425</option>
                                              </optgroup>
                                              <optgroup label="Arch">
                                                        <option value="ARC 111">ARC 111</option>
                                                        <option value="ARC 112">ARC 112</option>
                                                        <option value="ARC 121">ARC 121</option>
                                              </optgroup>
                                              <optgroup label="DAF">
                                                        <option value="ACT 201">ACT 201</option>
                                                        <option value="ACT 202">ACT 202</option>
                                                        <option value="FIN 254">FIN 254</option>
                                                        <option value="ACT 322">ACT 322</option>
                                              </optgroup>
                              </select>


                              <div class="custom-control custom-checkbox mt-4 mb-2 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember my preference</label>
                              </div>
                              <input type="hidden" name="first_name" value=<?php echo $_SESSION['teacher']['first_name']?>>
                              <input type="hidden" name="last_name" value=<?php echo $_SESSION['teacher']['last_name']?>>
                              <input type="hidden" name="email" value=<?php echo $_SESSION['teacher']['email']?>>
                              <input type="hidden" name="phone" value=<?php echo $_SESSION['teacher']['phone']?>>
                              <input type="hidden" name="nsu_id" value=<?php echo $_SESSION['teacher']['nsu_id']?>>
                              <input type="hidden" name="department" value=<?php echo $_SESSION['teacher']['department']?>>
                              <input type="hidden" name="time">
                              <button type="submit" name ="Add_btn" class="btn btn-info mb-4 btn-block">ADD</button>
                         </form>
                         </div>
                     </div>
                
                
                
                

            </div>
        </div>
        
    </div>
</div>






<div id="footer"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
</body>
</html>