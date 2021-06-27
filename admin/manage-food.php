<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
	<h1>Mengatur Makanan</h1>
	<TABLE class="tbl-full"><Br><Br><br>
				<!-- button -->
				<a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Tambahan Makanan Baru</a> <br><br>

				<?php 
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); 
				}
				if(isset($_SESSION['delete']))
					{
						echo $_SESSION['delete'];
						unset($_SESSION['delete']);
					}
				if(isset($_SESSION['upload']))
					{
						echo $_SESSION['upload'];
						unset($_SESSION['upload']);
					}
				if(isset($_SESSION['update']))
					{
						echo $_SESSION['update'];
						unset($_SESSION['update']);
					}
				if(isset($_SESSION['remove-failed']))
					{
						echo $_SESSION['remove-failed'];
						unset($_SESSION['remove-failed']);
					}
				?>

				<tr>
					<th>S.N</th>
					<th>Makanan</th>
					<th>Harga</th>
					<th>Deskripsi</th>
					<th>Foto</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
				</tr>

				<?php
				$sql = "SELECT * FROM tbl_menu";
				$res = mysqli_query($conn, $sql);

				$count = mysqli_num_rows($res);

				$sn=1;

				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id = $row['id'];
						$judul = $row['judul'];
						$harga = $row['harga'];
						$desk = $row['desk'];
						$image_name = $row['image_name'];
						$featured = $row['featured'];
						$active = $row['active'];
						?>
							<tr>
								<TD><?php echo $sn++;?></TD>
								<TD><?php echo $judul;?></TD>
								<TD>Rp.<?php echo $harga;?></TD>
								<TD><?php echo $desk;?></TD>
								<TD>
									<?php 
										if($image_name=="")
										{
											echo "<div class='error'>Gambar tidak ada.</div>";
										}
										else
										{
											?>
											<img src="<?php echo SITEURL; ?>admin/images/<?php echo $image_name; ?>" width="80px">
											<?php
										}
									?>
										
								</TD>
								<TD><?php echo $featured;?></TD>
								<TD><?php echo $active;?></TD>
								<TD>
									<a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary"> Update</a>
									<a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
								</TD>
							</tr>
						<?php
					}
				}
				else
				{
					echo "<tr> <td colspan='8' class='error'> Makanan Tidak tersedia.</td></tr>";
				}



				?>
				
				
			</TABLE>
	</div>	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>