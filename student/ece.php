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
    <title>ECE | NSU-TS</title>
    
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

<div class="section_title">

<h3>Department of Electrical & Computer Engineering</h3>
<h6>Please select your desired course for tuition</h6>
</div>

<div class="container mb-5">
      <div class="row">
      <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE111</h2>
              <p class="my-box-text">Analog Electronics I</p>
              
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee111">Select</button>
            

            </div>
          </div>

        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 141</h2>
              <p class="my-box-text">Electrical Circuits I</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee141">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 241</h2>
              <p class="my-box-text">Electrical Circuits II</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee241">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 221</h2>
              <p class="my-box-text">Signals and Systems</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee221">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE311</h2>
              <p class="my-box-text">Analog Electronics II</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee311">
                Select
            </button>
           </div>
          </div>

        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 361</h2>
              <p class="my-box-text">Electromagnetic Fields & Waves</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee361">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 312</h2>
              <p class="my-box-text">Power Electronics</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee312">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">EEE 321</h2>
              <p class="my-box-text">Intro to Communications Systems</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#eee321">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE115</h2>
              <p class="my-box-text">Programming Language I</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse115">
                Select
            </button>
           </div>
          </div>

        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE173</h2>
              <p class="my-box-text">Discrete Mathematics</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse173">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE215</h2>
              <p class="my-box-text">Programming Language II</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse215">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE225</h2>
              <p class="my-box-text">Data Structure & Algorithms</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse225">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE231</h2>
              <p class="my-box-text">Digital Logic Design</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse231">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE311</h2>
              <p class="my-box-text">Database Systems</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse311">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE323</h2>
              <p class="my-box-text">Operating Systems Design</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse323">
                Select
            </button>
           </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="my-box-option">
            <div class="my-box-content">
              <h2 class="my-box-title">CSE327</h2>
              <p class="my-box-text">Software Engineering</p>
              <button type="button" class="box-button" data-toggle="modal" data-target="#cse327">
                Select
            </button>
            </div>
          </div>
        </div>
          <div class="col-md-3">
            <div class="my-box-option">
              <div class="my-box-content">
                <h2 class="my-box-title">CSE331</h2>
                <p class="my-box-text"> Microprocessor Interfacing & Embedded Sys.</p>
                <button type="button" class="box-button" data-toggle="modal" data-target="#cse331">
                  Select
              </button>

              </div>
             </div>
          </div>

          <div class="col-md-3">
            <div class="my-box-option">
              <div class="my-box-content">
                <h2 class="my-box-title">CSE373</h2>
                <p class="my-box-text">Design and Analysis of Algorithms</p>
                <button type="button" class="box-button" data-toggle="modal" data-target="#cse373">
                  Select
              </button>
             </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="my-box-option">
              <div class="my-box-content">
                <h2 class="my-box-title">CSE332</h2>
                <p class="my-box-text">Computer Organization and Architecture</p>
                <button type="button" class="box-button" data-toggle="modal" data-target="#cse332">
                  Select
              </button>
             </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="my-box-option">
              <div class="my-box-content">
                <h2 class="my-box-title">CSE425</h2>
                <p class="my-box-text">Concepts of Programming language </p>
                <button type="button" class="box-button" data-toggle="modal" data-target="#cse425">
                  Select
              </button>
             </div>
            </div>
          </div>




<!-- Modal: modalCart -->
<div class="modal fade tuition" id="eee111" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
         
               <!--Header-->
               <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">EEE 111 Analog Electronics I</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
               </div>
      
               <!--Body-->
               <div class="modal-body">    
                   <div class="table-responsive text-nowrap"> 
                        <table class="table table-hover">
                               <thead class="rgba-green-slight">
                                    <tr>
                                      <th>Name</th>
                                      <th>NSU ID</th>
                                      <th>Department</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                    </tr>
                               </thead>
                               <tbody>
                                  <?php
                                      $sql = "SELECT * FROM teacher_courses WHERE name = 'EEE111'";
                                      $result = $conn->query($sql);

                                      if ($result->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {
                                        echo"<tr>";
                                          
                                          echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                                          echo "<td>".$row['nsu_id']."</td>";
                                          echo "<td>".$row['department']."</td>";
                                          echo "<td>".$row['phone']."</td>";
                                          echo '<td><form action="AddCourse.php" method="POST">';
                                                          echo '<input type="hidden" name="course_name" value="EEE111 Analog Electronics I"/>';
                                                          echo '<input type="hidden" name="teacher_name" value='.$row['first_name'].'&nbsp;'.$row['last_name'].">";
                                                          echo  '<input type="hidden" name="teacher_id" value= '.$row['nsu_id'].'>';
                                                          echo  '<input type="hidden" name="student_id" value= '.$_SESSION['student']['nsu_id'].'/>';
                                                          echo  '<input type="hidden" name="teacher_email" value= '.$row['email'].'>';
                                                          echo  '<input type="hidden" name="teacher_phone" value= '.$row['phone'].'>';
                                                          echo  '<input type="hidden" name="teacher_department" value= '.$row['department'].'>';
                                          echo '<button type="submit" name="ADDCourse_btn" class="btn btn-primary btn-sm m-0 p-1">Select</button></form></td>';

                                        echo "</tr>";
                                      }
                                    } 
                                    
                                    else {
                                          echo "<tbody>";
                                          echo "<tr>";
                                          echo "<td>"; echo "No Teacher Available"; echo "</td>";
                                          echo "<td>"; echo "NULL"; echo "</td>";
                                          echo "<td>"; echo "NULL"; echo "</td>";
                                          echo "<td>"; echo "NULL"; echo "</td>";
                                          echo "<td>"; echo "NULL"; echo "</td>";
                                          echo "</tr>";
                                          echo "</tbody>";
                                        }  
                                                                            
                                  ?>
                               </tbody>
                       </table>
                   </div>  
                </div>
     
                <!--Footer-->
                <div class="modal-footer">
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
                </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->
  
 





 </div>

</div>
<div id="footer"></div>

<script src="../js/fastclick.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/fixed-responsive-nav.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>