<?php
  session_start();
  require_once 'classes/db.php';
  

  if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
  }else{
    header('location: category.php');
  }

  if(isset($_POST) & !empty($_POST)){
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['categoryname']);
    $sql = "UPDATE categories SET cat_title = '$name' WHERE cat_id=$id";
    $res = mysqli_query($con, $sql);
    if($res){
      $smsg = "Category Updated";
    }else{
      $fmsg = "Failed Update Category";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Categories</title>

		<!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/category.css">
	</head>
	<body>
		<div class="container-fluid display-table">
      <div class="row display-table-row">
        <!--side bar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
          <h1 class="hidden-sm hidden-xs">Navigation</h1>
         <ul>
            <li class="link ">
              <a href="">
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
              <a href="payments.php">
                <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Payments</span>
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
        
            
            <div class="row">
            	<div class="col-md-4 dashboard-left-cell">
            		<div class="admin-content-con">
            			<header>
            				<h5>Create Category</h5>
            			</header>
                  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            			<form action="" method="post">
            				<div class="form-group">
            					<label>Add Category</label>
            					<?php  
          $sql = "SELECT * FROM categories WHERE cat_id=$id";
          $res = mysqli_query($con, $sql); 
          $r = mysqli_fetch_assoc($res); 
        ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="text" class="form-control" name="categoryname" id="Categoryname" placeholder="Category Name" value="<?php echo $r['cat_title'];  ?>">
            					
            				</div>
                    <button type="submit" class="btn btn-info">Submit</button>
            			</form>
            		</div>
            	</div>
            	<div class="col-md-8 dashboard-right-cell">
            		<div class="admin-content-con">
            			<header>
            				<h5>Categories</h5>
            			</header>
            			<table class="table table-striped table-hover">
            				<thead>
            					<tr>
            						<th>Name</th>
            						<th>Status</th>
            						<th>Created</th>
            						<th>Action</th>
            					</tr>
            				</thead>
            				<tbody>
                      <?php 
  include("classes/db.php");
  
  $get_cat = "select * from categories";
  
  $run_cat = mysqli_query($con, $get_cat); 
  
  $i = 0;
  
  while ($row_cat=mysqli_fetch_array($run_cat)){
    
    $cat_id = $row_cat['cat_id'];
    $cat_title = $row_cat['cat_title'];
    $dt=$row_cat['Date_Added'];
    $status=$row_cat['status'];
    if ($status=='In_Use') {
                     $span = 'class="label label-success"';
                  } else {
                    $span = 'class="label label-danger"';
                 }
    $i++;
  
  ?>
  <tr align="center">
    <td><?php echo $cat_title;?></td>
    <td><span <?php echo $span;?>><?php echo $status;?></span></td>
    <td><?php echo $dt;?></td>
    <td><a class="btn btn-xs btn-warning" href="editcategory.php?edit_cat=<?php echo $cat_id; ?>">Edit</a>
    <a  class="btn btn-xs btn-danger disabled" href="deletecategory.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
  
  </tr>
  <?php } ?>
            				</tbody>
            			</table>
            		</div>
            		
            	</div>
            	
            </div>
           <?php 
include("classes/db.php"); 

	if(isset($_POST['add_cat'])){
	
	$new_cat = $_POST['category'];
	$new_status="In_Use";
	$insert_cat = "INSERT INTO `categories`( `cat_title`, `status`, `Date_Added`) VALUES ('$new_cat','$new_status',now())";

	$run_cat = mysqli_query($con, $insert_cat); 
	
	if($run_cat){
	
	$msg="New Category has been inserted!";
	
	}else{
    $fmsg='Failled to Add Category';
  }
	}

?>

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
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>