<?php include('app_logic.php'); ?>
<?php $errors=''; ?>
<?php if (is_countable($errors) && count($errors) > 0) : ?>
	
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'function/functions.php';
include 'layout/head.php';
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
						<form class="logregform" method="post" action="loginprocess.php">
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
								<p><a href="enter_email.php">Forgot your password?</a></p>
							</div>
						</form>
					</div>
				</div>
				</div>
						</form>
					</div>
				   </div>
				</div>
			</div>


							
					</div>
				</div>
			</div>
		</div>
	</section>

<div class="clearfix"></div>
<br><br>
       <?php include 'layout/footer.php';?>


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>