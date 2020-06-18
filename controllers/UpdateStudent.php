<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration
$first_name = "";
$last_name  = "";
$email      = "";
$phone      = "";
$gender     = "";
$department = "";
$nsu_id     = "";
$id         = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['update_btn'])) {
	update();
}


function update(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $first_name, $last_name, $email, $phone, $gender ,$department, $id;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
      $first_name   = $_POST["first_name"];
      $last_name    = $_POST["last_name"];
      $email        = $_POST["email"];
      $phone        = $_POST["phone"];
      $gender       = $_POST["gender"];
      $department   = $_POST["department"];
      $nsu_id       = $_POST["nsu_id"];
      $id           = $_POST["id"];
      $password     = $_POST["password"];



      $query = ("UPDATE students SET first_name = '$first_name',
      last_name = '$last_name', email = '$email', phone = '$phone', password ='$password', nsu_id = '$nsu_id', department = '$department', gender = '$gender'
      WHERE id = '$id'");

    if (mysqli_query($conn, $query)) {
      
      
      $_SESSION["error"]="Profile Updated (changes will take effect after signout) <i class='fas fa-check-circle'></i>";
			header('location: ../student/profile.php');
      }
    else {
      $_SESSION["error"]="Failed to Update Profile <i class='fas fa-times-circle'></i>";
			header('location: ../student/profile.php');
      }




			
		}

    