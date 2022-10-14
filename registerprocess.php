<?php 
// session_start();
require_once 'function/functions.php';

// if(isset($_POST) & !empty($_POST)){



// initializing variables
$firstName = "";
$lastName = "";
$username = "";
$password = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'furnstore');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['passwordagain']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "first name is required"); }
  if (empty($lastName)) { array_push($errors, "last name is required"); }
  if (empty($username)) { array_push($errors, "username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if(strlen($password_1) < 6){
    array_push($errors, 'ERROR: password is too short');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Admin WHERE email='$email' OR password='$password'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }

    if ($user['password'] === $password) {
      array_push($errors, "password already exists");
    }
    if ($user['username'] === $username) {
      array_push($errors, "username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query ="INSERT INTO Admin (firstName, lastName,username,email, password) VALUES ('$firstName', '$lastName','$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "registration is successful";
  	header('location: login.php');
  }else{
    $fmsg = "Invalid Login Credentials";
  }
}

?>