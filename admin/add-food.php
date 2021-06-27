<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
		<h1>Food Menu</h1>

		<br><br>

		<?php 
		if(isset($_SESSION['upload']))
		{
			echo $_SESSION['upload'];
			unset ($_SESSION['upload']);
		}
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			
			<table class="tbl-30">
				<tr>
					<td>Nama Makanan : </td>
					<td>
						<input type="text" name="judul" placeholder="Masukan Nama Makanan">
					</td>
				</tr>
				<tr>
					<td>Harga :</td>
					<td>
						<input type="number"  name="harga" placeholder="Harga makanan">
					</td>
				</tr>
				<TR>
					<td>Deskripsi Makanan :</td>
					<TD>
						<textarea name="desk" cols="18" rows="6" placeholder="Deskripsi Makanan"></textarea>
					</TD>
				</TR>
				<tr>
					<TD>Foto 110x110 :</TD>
					<td>
						<input type="file" name="image">
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
										$id = $row['id'];
										$title = $row['title'];
										?>
										<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
										<?php
									}
								}
								else
								{
									?>
									<option value="0">Tidak ada kategori</option>
									<?php

								}
							?>
							

						</select>
					</td>
				</TR>
				<tr>
					<td>Featured :</td>
					<td>
						<input type="radio" name="featured" value="yes"> Yes
						<input type="radio" name="featured" value="no"> No
					</td>
				</tr>
				<tr>
					<td>Active :</td>
					<td>
						<input type="radio" name="active" value="yes"> Yes
						<input type="radio" name="active" value="no"> No
					</td>
				</tr>
				<tr>
					<td colspan="2" >
						<input type="submit" name="submit"class="btn-secondary" value="Tambahkan">
					</td>
				</tr>
			</table>
		</form>

		<?php 
		if(isset($_POST['submit']))
		{
			$judul= $_POST['judul'];
			$desk = $_POST['desk'];
			$harga = $_POST['harga'];
			$category = $_POST['category'];

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
				$active = "No";
			}

			if(isset($_FILES['image']['name']))
			{
				$image_name = $_FILES['image']['name'];

				if($image_name!="")
				{
					$ext = end(explode('.', $image_name));

					$image_name = "food-name-".rand(0000,9999).".".$ext;

					$src =$_FILES['image']['tmp_name'];

					$dst = "images/".$image_name;

					$upload = move_uploaded_file($src, $dst);

					if($upload==false)
					{
						$_SESSION['upload'] = "Gagal Upload Gambar";
						header('location:'.SITEURL.'admin/add-food.php');

						die();
					}
				}
			}
			else
			{
				$image_name = "Ga ada Gambar";
			}

			$sql2 = "INSERT INTO tbl_menu SET 
			judul = '$judul',
			harga = $harga,
			desk = '$desk',
			image_name = '$image_name',
			category_id = $category,
			featured = '$featured',
			active = '$active' 
			";

			$res2 = mysqli_query($conn, $sql2);

			if($res2 == true)
			{
				$_SESSION['add'] = "Makanan Berhasil Ditambahkan";
				header('location:'.SITEURL.'admin/manage-food.php');
			}
			else
			{
				$_SESSION['add'] = "Makanan Gagal Ditambahkan";
				header('location:'.SITEURL.'admin/add-food.php');

			}

		}
		?>
	</div>
</div>