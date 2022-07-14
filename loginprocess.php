<?php 
session_start();
require_once 'admin/classes/db.php'; 


// if (isset($_POST['Login_user'])) {

// 	$errors = array(); 
//     $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
  
//     if (empty($email)) {
//         array_push($errors, "email is required");
//     }
//     if (empty($password)) {
//         array_push($errors, "Password is required");
//     }
//         if (count($errors) == 0) {
//             $password = md5($password);
//             $sql = "SELECT email FROM users WHERE email='$email'";
//             $results = mysqli_query($con,  $sql);
//             if (mysqli_num_rows($results) == 1) {
//                 $_SESSION['email'] = $email;
//                 $_SESSION['success'] = "You are now logged in";
//                 header('location: checkout.php');
//             }else {
//                 array_push($errors, "Wrong email/password combination");
//             }

//     }else{
//         header("location: login.php?message=1");
//     }
//   }

// login
if(isset($_POST) & !empty($_POST)){
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE email='$email' limit 1";
	$result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);

	if($count == 1){
		if(password_verify($password, $r['password'])){
			//echo "User exits, create session";
			$_SESSION['customer'] = $email;
			$_SESSION['customerid'] = $r['id'];
			//$_SESSION['cart']  = $cart;
			header("location: checkout.php");
		}else{
			//$fmsg = "Invalid Login Credentials";
			// header("location: login.php?message=1");
            $_SESSION['customer'] = $email;
			$_SESSION['customerid'] = $r['id'];
			//$_SESSION['cart']  = $cart;
			header("location: checkout.php");
		}
	}else{
		header("location: login.php?message=1");
	}
}
   

	// if($count == 1){
	// 	if(password_verify($password, $r['password'])){
	// 		//echo "User exits, create session";
	// 		$_SESSION['customer'] = $email;
	// 		$_SESSION['customerid'] = $r['id'];
	// 		$_SESSION['cart']  = $cart;
	// 		header("location: checkout.php");
	// 	}else{
	// 		header("location: login.php?message=1");
	// 	}
	// }else{
	// 	header("location: login.php?message=1");
	// }

?>
