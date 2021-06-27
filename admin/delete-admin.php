<?php 
include('partials/menu.php');
$id=$_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);
if($res==true)
{
	//echo "ADMIN DELETE ANJING"; 
	$_SESSION['delete'] = "<div class='success'>Admin Berhasil Dilenyapkan.</div";
	header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
	//echo "GAGAL ANJENG";
	$_SESSION['delete'] = "<div class='error'>Admin Gagal Dilenyapkan.</div>";
	header('location:'.SITEURL.'admin/manage-admin.php');
}
?>