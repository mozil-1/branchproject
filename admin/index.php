
<?php 
session_start();  
// if (!isset($_SESSION['admin_id'])) {
//   header("location:index.php");
// }

?>
 <?php include "./layout/navbar.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
   
  </head>
  <body>
    <div class="container display-table">
      <div class="row display-table-row">
        <!--side bar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
          <h1 class="hidden-sm hidden-xs">Navigation</h1>
        <ul>
            <li class="link ">
              <a href="Home.php">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
              </a>
            </li>
           
            <li class="link">
              <a href="products.php">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Products</span>
              </a>
            </li>
            <li class="link">
              <a href="new-product.php">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Add Product</span>
              </a>
            </li>
           <li class="link">
              <a href="category.php">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Category</span>
              </a>
            </li>
            <li class="link">
              <a href="customers.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Customers</span>
              </a>
            </li>
            <li class="link">
              <a href="orders.php">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Orders</span>
              </a>
            </li>
             <li class="link">
              <a href="payments">
                <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Report</span>
              </a>
            </li>
            <li class="link setting-btn">
              <a href="">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- main content area -->
        <div class="col-md-10 col-md-11 display-table-cell valign-top box ">
          <div class="row">
          <header id="nav-header" class="clearfix">
            <div class="col-md-5">
              <nav class="navbar-default pull-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </nav>
              <input type="text" id="header-search-field" name="" class="hidden-sm hidden-xs" placeholder="Search for something ---">
            </div>
            <div class="col-md-7">
              <ul class="pull-right">
                <li id="welcome" class=" hidden-xs">Welcome admin</li>
                <li class="fixed-width">
                  <a href=""><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                    <span class="label label-warning">  3</span></a>
                </li>
                <li class="fixed-width">
                  <a href="">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <span class="label label-message">  3</span></a>
                </li>
                <li>
                  <a href="admin-logout.php" class="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>   Log out</a>
                </li>
              </ul>
            </div>
          </header>
        </div>
        <?php 
    if(isset($_GET['edit_pro'])){
    
    include("edit_product.php"); 
    
    }
    if(isset($_GET['view_products'])){
    
    include("view_products.php"); 
    
    }
    ?>


<h2><center>Admin Details</center></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr align='center'>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
            </tr>
          </thead>
          <tbody id="admin_list">
          <?php
include("classes/db.php");
$sql = "SELECT * FROM admin";
        $res = mysqli_query($con, $sql); 
        while ($r = mysqli_fetch_assoc($res)) {
      ?>
          <tr align='center'>
            <th scope='row'><?php echo $r['id']; ?></th>
            <td><?php echo $r['username']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['password']; ?></td>

         </tr>    
<?php
        }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
   
        </div>
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/admin.js"></script>
    <script src="js/custom.js"></script>
    <?php include "layout/footer.php"; ?>
  </body>
</html>