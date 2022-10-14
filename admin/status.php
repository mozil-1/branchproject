<?php 
	include("classes/db.php"); 

		$status_id = $_GET['status_reg'];
		$status = $_GET['status'];
		
		$sql = "UPDATE admin SET status=$status where id=$status_id"; 
		
		$result = mysqli_query($con, $sql); 
		
		if($result){
		
		echo "<script>alert('User has been updated!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		}
	
	





?>