<?php include('partials/menu.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1> Ubah Password</h1><br><br>

		<?php 
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Password Lama :</td>
					<td>
						<input type="password" name="old_password" placeholder="Masukan Password Lama Anda">
					</td>
				</tr>
				<tr>
					<td>Password Baru :</td>
					<td>
						<input type="password" name="new_password" placeholder="Masukan Password Baru Anda">
					</td>
				</tr>
				<tr>
					<td>Confirm Password :</td>
					<td>
						<input type="password" name="confirm_password" placeholder="Masukan Password Baru Anda Lagi">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Ubah Password" class="btn-secondary">
					</td>
				</tr>


			</table>
		</form>
	</div>
</div>

<?php 

	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$old_password = md5($_POST['old_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);

		$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$old_password'";

		$res = mysqli_query($conn, $sql);

		if($res==true)
		{
			$count=mysqli_num_rows($res);
			if($count==1)
			{
				//echo "Pengguna ditemukan";
				if($new_password==$confirm_password)
				{
					//echo "Password sama";
					$sql2 = "UPDATE tbl_admin SET 
						password='$new_password'
						WHERE id=$id
					";
					$res2 = mysqli_query($conn, $sql2);

					if($res2==true)
					{
						$_SESSION['change-pwd'] = "Password Berhasil diubah.";
						header('location:'.SITEURL.'admin/manage-admin.php');
					}
					else
					{
						$_SESSION['change-pwd'] = "Password Gagal diubah.";
						header('location:'.SITEURL.'admin/manage-admin.php');
					}
				}
				else
				{
					$_SESSION['notmatch'] = "Password tidak sama.";
				header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}
			else
			{
				$_SESSION['user-not-found'] = "Pengguna tidak ditemukan.";
				header('location:'.SITEURL.'admin/manage-admin.php');
			}
		}
	}

?>