<?php 
	if(!isset($_SESSION['user']))
	{
		$_SESSION['no-login-message'] = "<div class='error'>Mohon Login terlebih dahulu.</div>";
		header('location:'.SITEURL.'admin/login.php');
	}
?>