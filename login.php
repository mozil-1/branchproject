<?php
session_start();
 $errors = array();
 $errors=''; 
 if (is_countable($errors) && count($errors) > 0) : ?>
	
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<?php
if (isset($_POST['login_user'])) {
  if (isset($_POST['username']) && isset($_POST['password'])){

    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;

    }

    $username = test_input($_POST['username']);
    $password = test_input( $_POST['password']);
  
    if (empty($username)) {
		?>
		<script>alert("Username is required")</script>
		<?php
    }
    if (empty($password)) {
		?>
		<script>alert("Password is required")</script>
		<?php
    }
  
    if (!$errors) {
        $password = md5($password);
		$db = mysqli_connect('localhost', 'root', '', 'furnstore');

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
        $results = mysqli_query($db, $query);
        
        $row = mysqli_fetch_array($results);
		// if ($row){

			if ($row["user_type"]=="user" && $row["status"]==1) {
			$_SESSION["username"] = $username;
			$_SESSION["email"] = $row['email'];
			header("location: customer-account.php");

			}elseif( $row["user_type"]=="Admin" && $row["status"]==1){
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $row['email'];
			header("location: admin/index.php");

			}elseif( $row["user_type"]=="staff" && $row["status"]==1){
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $row['email'];			
				header("location: staff-account.php");

			}else{
				?>
			<script>alert("Wrong username")</script>
			<?php
            }
	    }
        
      }else {
		  header("location: login.php?message=1");
      }
	}
    // }

?>
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
						<form class="logregform" method="post" action="login.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Username</label>
										<input type="username" name="username"  class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<!-- <a class="pull-right" href="#">(Lost Password?)</a> -->
										<label>Password</label>
										<input type="password" name="password" class="form-control">
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
									<button type="submit" class="button btn-md pull-right" name="login_user">Login</button>
								</div>
							</div>
							<p><a href="enter_email.php">Forgot your password?</a></p>

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