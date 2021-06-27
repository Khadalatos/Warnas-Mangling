<?php 
//mulai sesi apalah gatau
session_start();

		define('SITEURL', 'http://localhost/resto/');
		define('LOCALHOST', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_NAME', 'db_warling');
		$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
		$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());


?>
<?php 
	if(!isset($_SESSION['user']))
	{
		$_SESSION['no-login-message'] = "<div class='error'>Mohon Login terlebih dahulu.</div>";
		header('location:'.SITEURL.'admin/login.php');
	}
?>

<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- Menu Section Starts -->
	<div class="menu">
		<div class="wrapper">
			<ul>
				<li><a href="admin.php">Home</a></li>
				<li><a href="manage-admin.php">Admin</a></li>
				<li><a href="manage-category.php">Category</a></li>
				<li><a href="manage-food.php">Food</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
		
	</div>