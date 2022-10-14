<!DOCTYPE html>
<html lang="en">
<?php 
  ob_start();
  session_start();
  include 'layout/head.php'; 
  require_once 'admin/classes/db.php';
  if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
    header('location: login.php');
  }


$SID = $_SESSION['customerid'];
// $cart = $_SESSION["cart"];
?>
   <div id="all">

        <div id="content">
            <div class="container-fluid">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Staff account</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Staff Member section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                     
                            <li class="link">
                                <a href="Admin/products.php">
                                    <span class="hidden-sm hidden-xs">Products</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href="Admin/new-product.php">
                                    
                                    <span class="hidden-sm hidden-xs">Add Product</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href="Admin/category.php">
                                    
                                    <span class="hidden-sm hidden-xs">Category</span>
                                </a>
                                </li>
                                <li class="link">
                                <a href="Admin/customers.php">
                                    
                                    <span class="hidden-sm hidden-xs">Customers</span>
                                </a>
                                </li>
                                <li class="link">
                                <a href="Admin/orders.php">
                                    <span class="hidden-sm hidden-xs">Orders</span>
                                </a>
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
                        <h1>Staff Account</h1>

                        <hr>

                        <h3>Personal details</h3>
                        <!-- table -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th >StaffID</th>
                                <th >Username</th>
                                <th >Email</th>
                                
                                
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                        $csql = "SELECT id, username, email FROM admin where id = '$SID' ";
                                        $cres = mysqli_query($con, $csql);
                                        if(mysqli_num_rows($cres) > 0){
                                        $cr = mysqli_fetch_assoc($cres);
                                        ?>
                                        <tr>
                                            <td><?php echo "<p>".$cr["id"] ."</p>"; ?> </td>
                                            <td><?php echo "<p>".$cr["username"] ."</p>"; ?></td>
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
