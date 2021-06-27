<?php include ('partials/menu.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update admin</h1> <br> <Br>
		<?php 
			$id=$_GET['id'];
			$sql="SELECT * FROM tbl_category WHERE id=$id";
			$res=mysqli_query($conn, $sql);
			if($res==true)
			{
				$count = mysqli_num_rows($res);
				if($count==1)
				{
					//echo "Admin Tersedia"
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$featured = $row['featured'];
					$active = $row['active'];
				}
				else
				{
					$_SESSION['no-category'] = "Kategori tidak ditemukan.";
					header('location'.SITEURL.'admin/manage-category.php');
				}
			}

		?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Nama Kategori</td>
					<td>
						<input type="text" name="title" value="<?php echo $title;?>">
					</td>
				</tr>
				<tr>
					<td>Featured</td>
					<td>
						<input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">Yes
						<input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no">No
					</td>
				</tr>
				<tr>
					<td>Active</td>
					<td>
						<input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes">Yes
						<input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="no">No
					</td>
				</tr>
				<TR>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="submit" name="submit" value="Update Category" class="btn-secondary">
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
	$title = $_POST['title'];
	$featured = $_POST['featured'];
	$active = $_POST['active'];

	$sql = "UPDATE tbl_category SET
	title = '$title',
	featured = '$featured',
	active = '$active' 
	WHERE id='$id'
	";
	$res = mysqli_query($conn, $sql);
	if($res==true)
	{
		$_SESSION['update']= "Kategori sudah terupdate";
		header('location:'.SITEURL.'admin/manage-category.php');
	}
	else
	{
		$_SESSION['update']= "Kategori gagal terupdate";
		header('location:'.SITEURL.'admin/manage-category.php');

	}
}

 ?>