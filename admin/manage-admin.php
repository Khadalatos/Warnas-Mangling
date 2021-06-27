<?php include('partials/menu.php'); ?>
<!-- Menu Section Ends -->

<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Mengatur Admin</h1>
			<TABLE class="tbl-full"><Br>
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
				if(isset($_SESSION['user-not-found']))
				{
					echo $_SESSION['user-not-found'];
					unset($_SESSION['user-not-found']);
				}
				if(isset($_SESSION['notmatch']))
				{
					echo $_SESSION['notmatch'];
					unset($_SESSION['notmatch']);
				}
				if(isset($_SESSION['change-pwd']))
				{
					echo $_SESSION['change-pwd'];
					unset($_SESSION['change-pwd']);
				}
				if(isset($_SESSION['login']))
				{
					echo $_SESSION['login'];
					unset($_SESSION['login']);
				}
				?>
				<br><br>
				<!-- button -->
				<a href="add-admin.php" class="btn-primary">Tambahan Admin Baru</a> <br><br>

				<tr>
					<th>S.N</th>
					<th>Nama Lengkap</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>
				<?php 
					//dapetin data dari databasenya
					$sql = "SELECT * FROM tbl_admin";
					$res = mysqli_query($conn, $sql);
					if($res==TRUE)
					{
						$count = mysqli_num_rows($res);
						$sn=1;
						if($count>0)
						{
							while($rows=mysqli_fetch_assoc($res))
							{
								$id=$rows['id'];
								$name=$rows['name'];
								$username=$rows['username'];
								?>
								<tr>
									<TD><?php echo $sn++; ?></TD>
									<TD><?php echo $name; ?></TD>
									<TD><?php echo $username;?></TD>
									<TD>
										<a href="<?php echo SITEURL;?>admin/password-admin.php?id=<?php echo $id;?>" class="btn-primary"> Ubah Password</a>
										<a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary"> Update Admin</a>
										<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin</a>
									</TD>
								</tr>
								<?php
							}

						}
						else
						{

						}


					} 
				?>



				
			</TABLE>

		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
<!-- Main Section Ends -->


</body>
</html>