<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
	<h1>Mengatur Kategori</h1>
	<TABLE class="tbl-full"><Br><br><br>
				<!-- button -->
				<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Tambahan Kategori Baru</a> 

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
					if(isset($_SESSION['update']))
					{
						echo $_SESSION['update'];
						unset($_SESSION['update']);
					}
					if(isset($_SESSION['no-category']))
					{
						echo $_SESSION['no-category'];
						unset($_SESSION['no-category']);
					}
				?><Br><br>

				<tr>
					<th>S.N</th>
					<th>Nama Kategori</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>
				<?php 
				$sql = "SELECT * FROM tbl_category";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
				$sn=1;

				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id = $row['id'];
						$title = $row['title'];
						$featured = $row['featured'];
						$active = $row['active'];

						?>
					<tr>
						<TD><?php echo $sn++; ?></TD>
						<TD><?php echo $title; ?></TD>
						<TD><?php echo $featured; ?></TD>
						<td><?php echo $active; ?></td>
						<TD>
							<a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary"> Update Kategori</a>
							<a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>" class="btn-danger"> Delete Category</a>
						</TD>
					</tr>
						<?php
					}
				}
				else
				{
					?> 
					<tr>
						<td colspan="5"><div class="error">No Category Added.</div></td>
					</tr>
					<?php
				}


				?>
				
				
			</TABLE>

	</div>	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>