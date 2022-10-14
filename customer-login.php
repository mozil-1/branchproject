<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'layout/head.php';
include 'function/functions.php';
require_once 'admin/classes/db.php';

if(isset($_POST) && !empty($_POST)){
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE email='$email' ";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);

	if($count == 1){
		if(password_verify($password, $r['password'])){
			//echo "User exits, create session";
			// $_SESSION['customer'] = $email;
			// $_SESSION['customerid'] = $r['id'];
			// $_SESSION['cart']  = $cart;

			$fmsg = "Invalid Login Credentials";
            echo "<script>window.open('customer-login.php?message=1','_self')</script>";

            // echo "<script>window.open('checkout.php','_self')</script>";

		}else{
			$_SESSION['customer'] = $email;
			$_SESSION['customerid'] = $r['id'];
			// $_SESSION['cart']  = $cart;
			
			echo "<script>window.open('checkout.php','_self')</script>";
		}
	}else{
		echo "<script>window.open('customer-login.php?message=1','_self')</script>";
		
	}
}


?>
<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop - Account</h2>
						<p>Tagline Here</p>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6">
					<div class="box">
					<div class="box-content">
						<h3 class="heading text-center">I'm a Returning Customer</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){
								if($_GET['message'] == 1){
						 ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Login Credentials"; ?> </div>

						 <?php } }?>
						<form class="logregform" method="post" action="customer-login.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<!-- <a class="pull-right" href="#">(Lost Password?)</a> -->
										<label>Password</label>
										<input type="password" name="password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span> 
								</div>
								<div class="col-md-6">
									<p></p>
									<button type="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
							<p>if not a member? please <a href="register.php">Register</a></p>

						</form>
					</div>
				</div>
			</div>
			