<?php 

include("classes/db.php");
include("layout/navbar.php");

if(isset($_POST['update_register'])){
  
  //getting the text data from the fields
  
  $reg_id = $_POST['reg_id'];
  
  $register_username =  $_POST['username'];
  $register_email =  $_POST['email'];
  $register_password =  md5($_POST['password']);
  $product_usertype =  $_POST['user_type'];
   $register_status =  $_POST['status'];


   $update_user = "UPDATE admin SET id='$reg_id', username='$register_username', email='$register_email',password='$register_password', user_type='$product_usertype', status='$register_status' WHERE id='$reg_id'";
   
   $run_register = mysqli_query($con, $update_user);
   
   if($run_register){
   
   echo "<script>alert('User has been updated!')</script>";
   
   echo "<script>window.open('index.php','_self')</script>";
   
   }
}


if(isset($_GET['edit_reg'])){

  $get_id = $_GET['edit_reg']; 

  $get_reg = "SELECT * FROM `admin` WHERE `id`='$get_id' ";
  $run_reg = mysqli_query($con, $get_reg); 
  if (mysqli_num_rows($run_reg) >0 ){

      while($r = mysqli_fetch_assoc($run_reg)){
          $reg_id = $r['id'];
          $reg_username = $r['username'];
          $reg_email = $r['email'];
          $reg_password=$r['password'];
          $reg_status = $r['status'];
          $reg_usertype = $r['user_type']; 
      }
      ?>
         <div class="container-fluid mt-5 pt-5">
            <h2 class="page_title">UPDATION TABLE</h2>
            <div class="form-wrapper">
              <form action="editregister.php" method="post">
            
                      <div class="form-group">
                          <label>Username</label>
                          <input type="hidden" class="form-control" name="reg_id" value="<?php echo $reg_id;?>">
                          <input type="text" name="username" class="form-control" value="<?php echo $reg_username;?>">
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $reg_email;?>">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $reg_password;?>">
                        </div>

                        <div class="form-group">
                          <label>Usertype</label>
                        <input type="text" name="user_type" class="form-control" value="<?php echo $reg_usertype ;?>" >
                        </div>
                        <div class="form-group ">
                          <select name="status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>

                        <div class="clearfix">
                          <input type="submit" name="update_register" value="Update" class="btn btn-lg btn-primary pull-right" /> 
                        </div> 
              </form>
            </div>
          </div>
      <?php
    }else{
      header("location: index.php");
    }
  }
?>
 <?php include("layout/footer.php"); ?>