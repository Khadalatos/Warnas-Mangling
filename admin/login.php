<?php include('partials/menu1.php');?>
<html>
<head>
	<title>Warnas Login Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="login">
	<h1 class="text-center">Login</h1><Br><br>

	<!-- login mulai-->
	<?php 
	if(isset($_SESSION['login']))
	{
		echo $_SESSION['login'];
		unset($_SESSION['login']);
	}
	if(isset($_SESSION['logout']))
	{
		echo $_SESSION['logout'];
		unset($_SESSION['logout']);
	}
	if(isset($_SESSION['no-logi-nmessage']))
	{
		echo $_SESSION['no-login-message'];
		unset($_SESSION['no-login-message']);
	}
	?>
	<br><br>
	<form action="" method="POST" class="text-center">
	Username :<br>
	<input type="text" name="username" placeholder="Masukan Username"><br><br>
	Password :<br>
	<input type="password" name="password" placeholder="Masukan Password anda"><br><br>
	<input type="submit" name="submit" value="Login" class="btn-primary">
	</form>
	<!-- login mati-->
	<p class="text-center"> Silahkan Login Terlebih Dahulu</p>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

	$res = mysqli_query($conn, $sql);

	$count = mysqli_num_rows($res);

	if($count==1)
	{
		$_SESSION['login'] = "<div class='success text-center'>Anda berhasil Login</div>";
		$_SESSION['user'] = $username;
		header('location:'.SITEURL.'admin/index.php');
	}
	else
	{
		$_SESSION['login'] = "<div class='error text-center'>Ada yang salah</div>";
		header('location:'.SITEURL.'admin/login.php');
	}
}

?>