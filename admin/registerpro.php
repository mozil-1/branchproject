<?php
session_start();

// initializing variables
$username = "";
$email    = "";
// $usertype = "";
$errors = array();


// // connect to the database
$db = mysqli_connect('localhost', 'root', '', 'furnstore');

// // REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // $usertype = mysqli_real_escape_string($db, $_POST['user_type']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  // if (empty($usertype)) { array_push($errors, "usertype is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }
  if(strlen($password_1) < 6){
    array_push($errors, 'ERROR: password is too short');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO admin (username, email, password) VALUES('$username', '$email', '$password')";
  	$result = mysqli_query($db, $query);
    if ($result){
      $_SESSION['username'] = $row['username'];
      $_SESSION['success'] = "registration is successful";
      header('location: login.php');
    }else{
      array_push($errors, "please check your information");
    }
        
    // if (mysqli_num_rows($result) > 0){
    //   $row = mysqli_fetch_array($result);
      
    //   if ($row['user_type']=='user'){
        
         
    //   }else{
    //     array_push($errors, "registration failed");
    //   }
    // }else{
    //   array_push($errors, "Sorry you entered wrong information");
    // }
  	
  }else{
    array_push($errors, "Sorry you entered wrong details");
  }
}
?>  
