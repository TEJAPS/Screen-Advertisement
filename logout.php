<?php
session_start();
		$_SESSION["status"] = "invalid";
		echo "<script> alert('logged out successfully'); 
		window.location.href='./index.php';
		</script>";
	
?>