<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Products</title>

		<!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid display-table">
      <div class="row display-table-row">
        <!--side bar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
          <h1 class="hidden-sm hidden-xs">Navigation</h1>
          <ul>
            <li class="link ">
              <a href="index.php">
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
              <a href="../Report.php">
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
                    <span class="label label-warning">3</span></a>
                </li>
                <li class="fixed-width">
                  <a href="">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <span class="label label-message">  3</span></a>
                </li>
                <li>
                  <a href="login.php" class="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>   Log out</a>
                </li>
              </ul>
            </div>
          </header>

        </div>
        <div id="content">
          <header class="clearfix">
            <h2 class="page_title">orders page</h2>
            
          </header>
          <div class="content-inner">
            <div class="row search-row">
            	<div class="col-md-12">
            		<div class="input-group">
            			<input type="text" class="form-control search-field" id="search" placeholder="Search">
            			<span class="input-group-btn">
            				<button type="button" class="btn btn-primary">Go!</button>
            			</span>
            		</div>
            		
            	</div>
            </div>
            <div class="row">
            	<table class="table table-hover">
                <thead>
                  <tr >
            <th>#</th>
            <th>Customer Name</th>
            <th>Total Price</th>
            <th>Order Status</th>
            <th>Payment Mode</th>
            <th>Order Placed On</th>
            <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
  include("classes/db.php");
  $sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.user_id=u.userid ORDER BY o.id DESC";
          $res = mysqli_query($con, $sql); 
          while ($r = mysqli_fetch_assoc($res)) {
        ?>
  <tr align="center">
    <th scope="row"><?php echo $r['id']; ?></th>
            <td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
            <td><?php echo $r['totalprice']; ?></td>
            <td><?php echo $r['orderstatus']; ?></td>
            <td><?php echo $r['paymentmode']; ?></td>
            <td><?php echo $r['timestamp']; ?></td>
    <td><a href="order-process.php?id=<?php echo $r['id']; ?>">Process Order</a></td>
  
  </tr>
  <?php } ?>
                </tbody>
              </table>
            </div>
            <hr>
            <div class="row">
            	<div class="col-md-12">
            		<nav>
            			<ul class="pagination">
            				<li><a href="#">&laquo;</a></li>
            				<li><a href="#">1</a></li>
            				<li><a href="#">2</a></li>
            				<li><a href="#">3</a></li>
            				<li><a href="#">4</a></li>
            				<li><a href="#">5</a></li>
            				<li><a href="#">&raquo;</a></li>
            			</ul>
            		</nav>
            		
            	</div>
            </div>
          </div>
        </div>

        <div class="row">
          <footer id="admin-footer" class="cle">
            <div class="pull-left">
              <b>Copyright </b>&copy; 2021
            </div>
            <div class="pull-right">
              <b>Admin System</b>
            </div>
          </footer>
        </div>

        
        </div>
      </div>
    </div>

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>