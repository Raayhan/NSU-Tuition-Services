<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration
$course_id    = "";

$errors   = array();

// call the delete() function if DeleteCourse_btn is clicked
if (isset($_POST['DeleteCourse_btn'])) {
	delete();
}

// DELETE Course
function delete(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $course_id;

	
      $course_id     = $_POST["course_id"];
         






$query = "DELETE FROM student_courses WHERE id='$course_id'";

    if (mysqli_query($conn, $query)) {
      
            $_SESSION["error"]='Course Deleted Successfully !';
			header('location: profile.php');
      }
    else {
        $_SESSION["error"]='Failed to Delete the Course !';
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
