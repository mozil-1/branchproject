
<?php
 session_start();
 $db = mysqli_connect('localhost', 'root', '', 'furnstore');
 include_once("layout/navbar.php");
 $errors = array();
//  include('server.php');
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
    // $userType = test_input( $_POST['user_type']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) === 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
        $results = mysqli_query($db, $query);
        
        $row = mysqli_fetch_array($results);

        if ($row["user_type"]=="user" && $row["status"]==1) {
          $_SESSION['username'] = $username;
          $_SESSION['email']= $row['email'];
          
          header("location:http://localhost/school-project/staff-account.php");

        }elseif( $row["user_type"]=="Admin" && $row["status"]==1){
          $_SESSION['username'] = $username;
          header("location: index.php");
        }else{
          array_push($errors, "Wrong username");
        }
        
      }else {
          array_push($errors, "Wrong username/password combination");
      }
    }
  }

?>

<div class="container-fluid p-3 mt-5 mb-5">
<div class="header">
  	<h2> Login</h2>
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
  </form>

</div>




<?php include "layout/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
