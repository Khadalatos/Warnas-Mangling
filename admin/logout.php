<?php include('partials/menu.php');
	session_destroy();
	{
	$_SESSION['logout'] = "<div class='success'>Berhasil Logout</div>";
	header('location:'.SITEURL.'admin/login.php');
	}
?>