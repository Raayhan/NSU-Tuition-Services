<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration
$course_name    = "";
$teahcer_name   = "";
$teacher_id     = "";
$student_id     = "";
$teacher_email  = "";
$teacher_phone  = "";
$teacher_department ="";
$errors   = array();

// call the add() function if ADDCourse_btn is clicked
if (isset($_POST['ADDCourse_btn'])) {
	add();
}

// ADD course
function add(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $course_name, $teacher_name, $teacher_id, $student_id, $teacher_department, $teacher_email, $teacher_phone;

	
      $course_name     = $_POST["course_name"];
      $teacher_name    = $_POST["teacher_name"];
	  $teacher_id      = $_POST["teacher_id"];
	  $student_id      = $_POST["student_id"]; 
	  $teacher_email   = $_POST["teacher_email"];
	  $teacher_phone   = $_POST["teacher_phone"];
	  $teacher_department = $_POST["teacher_department"];
      






    $query = "INSERT INTO student_courses (course_name, teacher_name, teacher_id,student_id,teacher_email,teacher_phone,teacher_department)
    VALUES ('$course_name', '$teacher_name', '$teacher_id', '$student_id','$teacher_email','$teacher_phone','$teacher_department')";

    if (mysqli_query($conn, $query)) {
      
			
	        $_SESSION["error"]='Course Successfully Added !';
			header('location: profile.php');
      }
    else {
	 $_SESSION["error"]='Failed to Add the Course !';
	 header('location: profile.php');
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
