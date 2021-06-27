<?php include ('partials/menu.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update admin</h1> <br> <Br>
		<?php 
			$id=$_GET['id'];
			$sql="SELECT * FROM tbl_admin WHERE id=$id";
			$res=mysqli_query($conn, $sql);
			if($res==true)
			{
				$count = mysqli_num_rows($res);
				if($count==1)
				{
					//echo "Admin Tersedia"
					$row = mysqli_fetch_assoc($res);
					$name = $row['name'];
					$username = $row['username'];
				}
				else
				{
					header('location'.SITEURL.'admin/manage-admin.php');
				}
			}

		?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Nama Lengkap</td>
					<td>
						<input type="text" name="name" value="<?php echo $name;?>">
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" name="username" value="<?php echo $username;?>">
					</td>
				</tr>
				<TR>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
				</TR>
			</table>
		</form>
		
	</div>
	
</div>
<?php
if(isset($_POST['submit']))
{
	//echo "Berhasil cuwk";
	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];

	$sql = "UPDATE tbl_admin SET
	name = '$name',
	username = '$username' 
	WHERE id='$id'
	";
	$res = mysqli_query($conn, $sql);
	if($res==true)
	{
		$_SESSION['update']= "Admin sudah terupdate";
		header('location:'.SITEURL.'admin/manage-admin.php');
	}
	else
	{
		$_SESSION['update']= "Admin gagal terupdate";
		header('location:'.SITEURL.'admin/manage-admin.php');

	}
}

 ?>