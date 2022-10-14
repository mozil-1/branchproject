<!DOCTYPE html>
<html lang="en">
<?php 
  ob_start();
  session_start();
  include 'layout/head.php'; 
  require_once 'admin/classes/db.php';
  if(!isset($_SESSION['customerid']) && empty($_SESSION['customerid'])){
    header('location: login.php');
  }



$uid = $_SESSION['customerid'];
// $cart = $_SESSION['cart'];
?>
   <div id="all">

        <div id="content">
            <div class="container-fluid">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                     
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="wishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="login.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>

                        <h3>Change password</h3>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" class="form-control" id="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Personal details</h3>
                        <!-- table -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th >First Name</th>
                                <th >Last Name</th>
                                <th >Address1</th>
                                <th >Address2</th>
                                <th >City</th>
                                <th >State</th>
                                <th >Country</th>
                                <th >Company</th>
                                <th >Zip Code</th>
                                <th >Mobile</th>
                                <th >Email</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                        $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM admin u JOIN usersmeta u1 WHERE u.id=u1.userid AND u.id=$uid";
                                        $cres = mysqli_query($con, $csql);
                                        if(mysqli_num_rows($cres) == 1){
                                        $cr = mysqli_fetch_assoc($cres);
                                        ?>
                                        <tr>
                                            <td><?php echo "<p>".$cr["firstname"] ."</p>"; ?> </td>
                                            <td><?php echo "<p>".$cr["lastname"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["address1"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["address2"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["city"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["state"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["country"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["company"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["zip"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["mobile"] ."</p>"; ?></td>
                                            <td><?php echo "<p>".$cr["email"] ."</p>"; ?></td>
                                        </tr>
                                    <?php }?>
                                    
                            </tbody>
                        </table>
            
            
              
             
              
           
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


    <?php include 'layout/footer.php';?>





</body>

</html>
