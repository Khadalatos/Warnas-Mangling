<?php 
include('partials/menu.php');
$id=$_GET['id'];
$sql = "DELETE FROM tbl_category WHERE id=$id";
$res = mysqli_query($conn, $sql);
if($res==true)
{
	//echo "ADMIN DELETE ANJING"; 
	$_SESSION['delete'] = "<div class='success'>Kategori Berhasil Dilenyapkan.</div";
	header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
	//echo "GAGAL ANJENG";
	$_SESSION['delete'] = "<div class='error'>Kategori Gagal Dilenyapkan.</div>";
	header('location:'.SITEURL.'admin/manage-category.php');
}
?>