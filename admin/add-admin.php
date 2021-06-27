<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1><br>
		<?php
		if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset ($_SESSION['add']);
		} 
		?>

		<form action="" method="POST">
			<table class="tbl-30"> 
				<tr>
					<td>Nama Lengkap :</td>
					<td><input type="text" name="name" placeholder="Enter Your Name"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" placeholder="Enter Your nickname"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" placeholder="Enter Your Password"></td>
				</tr>
				<tr>
					<td colspan="2"> 
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>
	</div>
</div>
<?php
	//proses masuk ke databasenya
	if(isset($_POST['submit']))
	{
		//tombol click
		//echo"Tombol Berhasil";
		//Dapetin datanya dari formnya.
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//buat save ke databasenya
		$sql = "INSERT INTO tbl_admin SET
			name='$name',
			username='$username',
			password='$password'
		"; 
		//Save data ke database

		$res = mysqli_query($conn, $sql) or die(mysqli_error());
		//cekdatana asup te goblog >:C 
		if($res==TRUE)
		{
			//Data inserted
			//echo "Data Berhasil Masuk";
			//buat variabel sesinya cok
			$_SESSION['add'] = "Admin Baru Berhasil Didaftarkan";
			header("location:".SITEURL.'admin/manage-admin.php');
		}
		else
		{
			//ggal
			//echo "Data Gagal Dimasukan";
			//buat variabel sesinya cok
			$_SESSION['add'] = "Admin Baru Gagal Didaftarkan";
			header("location:".SITEURL.'admin/add-admin.php');
		}
	}

?>