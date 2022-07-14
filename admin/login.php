
<?php include_once("layout/navbar.php"); ?>
<?php include('server.php') ?>

<div class="container-fluid mt-5 mb-5">
<div class="header">
  	<h2>Admin Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn btn-success" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>

</div>




<?php include "layout/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
