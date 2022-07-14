<?php
include('registerprocess.php') ;
require_once 'function/functions.php';
include 'layout/head.php';
?>

<div class="container">
    <div class="col-md-12">
      <div class="box">
          <div class="box-content">
            <h3 class="heading text-center">Register An Account</h3>
            <div class="clearfix space40"></div>
            <form class="logregform" method="post" action="register.php">
            <?php include('admin/errors.php'); ?>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                    <label for="firstName">First name</label>
                      <input type="text" id="firstName" name="firstname" class="form-control" value="<?php echo $firstName; ?>" autofocus="autofocus">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                    <label for="lastName">Last name</label>
                      <input type="text" id="lastName" name="lastname" class="form-control" value="<?php echo $lastName; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>E-mail Address</label>
                  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label>Password</label>
                  <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Re-enter Password</label>
                  <input type="password" name="passwordagain" value="<?php echo $password; ?>" class="form-control">
                </div>
              </div>
                  <div class="col-md-12">
                    <div class="space20"></div>
                    <p></p>
                    <button type="submit" name="register" class="btn btn-md pull-right">Register</button>
                  </div>
                </div>
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="login.php">Login Page</a>
              <a class="d-block small" href="admin/enter_email.php">Forgot Password?</a>
              <a class="d-block small mt-3" href="index.php">Home</a>
            </div>
          </div>
      </div>
    </div>
</div>
<?php include 'layout/footer.php';?>
 
