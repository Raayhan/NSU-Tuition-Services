<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration
$name         = "";
$first_name   = "";
$last_name    = "";
$nsu_id       = "";
$email        = "";
$phone        = "";
$department   = "";
$time         = "";
$errors       = array();

// call the add() function if Add_btn is clicked
if (isset($_POST['Add_btn'])) {
	add();
}

// ADD course
function add(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $name, $first_name, $last_name, $nsu_id, $email, $department, $phone;

	
      $name            = $_POST["name"];
      $first_name      = $_POST["first_name"];
	  $last_name       = $_POST["last_name"];
	  $nsu_id          = $_POST["nsu_id"]; 
	  $email           = $_POST["email"];
	  $phone           = $_POST["phone"];
      $department      = $_POST["department"];
      
      






    $query = "INSERT INTO teacher_courses (name, first_name, last_name ,email, phone, nsu_id, department, time)
    VALUES ('$name', '$first_name', '$last_name', '$email','$phone','$nsu_id','$department',now())";

    if (mysqli_query($conn, $query)) {
      
			
	        $_SESSION["error"]=" '$name'  has been added <i class='fas fa-check-circle'></i>";
			header('location: ../teacher/dashboard.php');
      }
    else {
	 $_SESSION["error"]='Failed to Add the Course !';
	 header('location: ../teacher/dashboard.php');
      }




			
		}







function display_error() {
	global $errors;

  	if (count($errors) > 0){
	   	echo '<div class="error">';
			foreach ($errors as $error){
			echo $error .'<br>';
			}
		echo '</div>';
	}
}





?>
