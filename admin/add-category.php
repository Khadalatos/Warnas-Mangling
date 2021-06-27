<?php include('partials/menu.php');

?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Category</h1> <br><br>
		<?php 
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Title :</td>
					<td>
						<input type="text" name="title" placeholder="Judul Kategori">
					</td>
				</tr>
				<tr>
					<td>Featured:</td>
					<td>
						<input type="radio" name="featured" value="yes">Yes
						<input type="radio" name="featured" value="no">No
					</td>
				</tr>

				<tr>
					<td>Active :</td>
					<td>
						<input type="radio" name="active" value="yes">Yes
						<input type="radio" name="active" value="no">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Category" class="btn-primary">
					</td>
				</tr>
			</table>

		</form>

		<?php 
			if(isset($_POST['submit']))
			{
				$title =$_POST['title'];

				if(isset($_POST['featured']))
				{
					$featured = $_POST['featured'];
				}
				else
				{
					$featured = "No";
				}
				if(isset($_POST['active']))
				{
					$active = $_POST['active'];
				}
				else
				{
					$active ="No";
				}

				$sql = "INSERT INTO tbl_category SET 
				title ='$title',
				featured ='$featured',
				active = '$active'
				";

				$res = mysqli_query($conn, $sql);

				if($res==TRUE)
				{
					$_SESSION['add'] = "<div class='success'>Kategori berhasil ditambahkan</div>";
					header('location:'.SITEURL.'admin/manage-category.php');
				}
				else
				{
					$_SESSION['add'] = "<div class='error'>Kategori gagal ditambahkan</div>";
					header('location:'.SITEURL.'admin/add-category.php');
				}
			}


		?>
	</div>
</div>