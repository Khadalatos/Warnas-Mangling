<?php include('partials/menu.php');
	if(isset($_GET['id']) && isset($_GET['image_name']))
	{
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		//
		if($image_name !="")
		{
			$path ="images/".$image_name;

			$remove = unlink($path);

			if($remove==false)
			{
				$_SESSION['upload'] = "<div class'error'>Gagal Hapus file gambar.</div>";

				header('location:'.SITEURL.'admin/manage-food.php');
				die();
			}
		}
		//
		$sql = "DELETE FROM tbl_menu WHERE id=$id";
		$res = mysqli_query($conn, $sql);
		if($res==true)
		{
			//echo "yes DELETE ANJING"; 
			$_SESSION['delete'] = "<div class='success'>Kategori Berhasil Dilenyapkan.</div";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
		else
		{
			//echo "GAGAL ANJENG";
			$_SESSION['delete'] = "<div class='error'>Kategori Gagal Dilenyapkan.</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
	}
	else
	{
		$_SESSION['unau'] = "<div class='error'> Akses tidak berhasil</div>";
		header('location:'.SITEURL.'admin/manage-food.php');
	}
?>