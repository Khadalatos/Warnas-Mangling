<?php include('partials/menu.php');?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_menu WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $judul = $row2['judul'];
        $harga = $row2['harga'];
        $desk = $row2['desk'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

   
    <div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br> <br>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
				<tr>
					<td>Nama Makanan : </td>
					<td>
						<input type="text" name="judul" value="<?php echo $judul; ?>">
					</td>
				</tr>
				<tr>
					<td>Harga :</td>
					<td>
						<input type="number"  name="harga" value="<?php echo $harga; ?>">
					</td>
				</tr>
				<TR>
					<td>Deskripsi Makanan :</td>
					<TD>
						<textarea name="desk" cols="18" rows="6" ><?php echo $desk; ?></textarea>
					</TD>
				</TR>
				<tr>
					<TD>Foto Sebelumnya:</TD>
					<td>
						<?php 
						if($current_image=="")
						{
							echo "Tidak ada Foto";
						}
						else
						{
							?>
							<img src="<?php echo SITEURL; ?>admin/images/<?php echo $current_image;?>" width="110px">
							<?php
							
						}
						?>
					</td>
				</tr>
                <tr>
                    <td>Ganti Foto</td>
                    <td>
                    <input type="file" name="images">
                    </td>
                </tr>
				<TR>
					<td>Kategori :</td>
					<td>
						<select name="category">

							<?php 
								$sql = "SELECT * FROM tbl_category WHERE active='yes'";

								$res = mysqli_query($conn, $sql);
							
								$count = mysqli_num_rows($res);

								if($count>0)
								{
									while($row=mysqli_fetch_assoc($res))
									{
                                        $category_id = $row['id'];
										$category_title = $row['title'];
										?>
										<option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
										<?php
									}
								}
								else
								{
									echo " tidak ada kategori";

								}
							?>
							

						</select>
					</td>
				</TR>
				<tr>
					<td>Featured :</td>
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
				<tr>
					<td  >
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

						<input type="submit" name="submit"class="btn-secondary" value="update">
					</td>
				</tr>   
        </table>
        
        </form>

		<?php 
		
		if(isset($_POST['submit']))
		{
			//echo "Button click";
			$id = $_POST['id'];
			$judul = $_POST['judul'];
			$desk = $_POST['desk'];
			$harga = $_POST['harga'];
			$current_image = $_POST['current_image'];
			$category = $_POST['category'];

			$featured = $_POST['featured'];
			$active = $_POST['active'];

			if(isset($_FILES['images']['name']))
			{
				$image_name = $_FILES['images']['name'];
				if($image_name !="")
				{
					$ext = end(explode('.', $image_name));
					$image_name = "Food-Name-".rand(0000,9999).'.'.$ext;

					$src_path = $_FILES['images']['tmp_name'];
					$dest_path = "images/".$image_name;

					$upload = move_uploaded_file ($src_path, $dest_path);
					
					if($upload==false)
					{
						$_SESSION['upload'] = "Gagal Ganti Image";
						header('location:'.SITEURL.'admin/manage-food.php');
						die();
					}
					if($current_image!="")
					{
						$remove_path = "images/".$current_image;

						$remove = unlink($remove_path);

						if($remove==false)
						{
							$_SESSION['remove-failed'] = "Gagal menghapus foto sebelumnya";
							header('location:'.SITEURL.'admin/manage-food.php');
							die();
						}
					}
				}
				else
				{
					$image_name = $current_image;
				}
			}
			else
			{
				$image_name = $current_image;
			}

			$sql3 = "UPDATE tbl_menu SET
			judul = '$judul',
			harga = '$harga',
			desk = '$desk',
			image_name = '$image_name',
			category_id = '$category',
			featured = '$featured',
			active = '$active'
			WHERE id=$id
			";

			$res3 = mysqli_query($conn, $sql3);
			if($res3==true)
			{
				$_SESSION['update'] = "<div class='success'>Makanan berhasil di update</div>";
				header('location:'.SITEURL.'admin/manage-food.php');
			}
			else
			{
				$_SESSION['update'] = "<div class='error'>Makanan gagal di update</div>";
				header('location:'.SITEURL.'admin/manage-food.php');
			}
		}
		
		?>
    </div>
    </div>