<?php
    session_start();
    
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['user_type']);
    session_destroy();
    // Destroy session
    header("Location: ../login.php");
   
	
?>