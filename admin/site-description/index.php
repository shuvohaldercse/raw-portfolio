<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$sel_db = "SELECT * FROM site_desp";
$sel_db_que = mysqli_query($db_con,$sel_db);
$site_assoc = mysqli_fetch_assoc($sel_db_que);

$banner_sel = "SELECT * FROM site_banner_img";
$banner_sel_que = mysqli_query($db_con,$banner_sel);


?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h3>Site Description</h3>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<td>Title:-</td>
							<td><?php echo $site_assoc['title']; ?></td>
						</tr>
						<tr>
							<td>Site Name:-</td>
							<td><?php echo $site_assoc['s_name']; ?></td>
						</tr>
						<tr>
							<td>Site banner text:-</td>
							<td><?php echo $site_assoc['ban_text']; ?></td>
						</tr>
						<tr>
							<td>Site Short Description:-</td>
							<td><?php echo $site_assoc['short_desp']; ?></td>
						</tr><tr>
							<td>Site Footer-</td>
							<td>&copy; <?php echo $site_assoc['footer']; ?></td>
						</tr>
						<tr>
							<td>Footer Link</td>
							<td>
								<a href="<?php echo $site_assoc['footer_link']; ?>" target="blank"><?php echo $site_assoc['footer_link']; ?></a>
							</td>
						</tr>
						<tr>
							<td><a href="edit.php?id=<?php echo $site_assoc['id']; ?>" class="btn btn-primary">Update</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h3>Banner Image</h3>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>S.N</th>
							<th>Image</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php foreach ($banner_sel_que as $banner): ?>
						<tr>
							<td><?php $sn=1; echo $sn++; ?></td>
							<td><img src="../uploads/banner/<?php echo $banner['picture']; ?>" width="80"></td>
							<td>
								<button type="submit" class="btn <?php echo($banner['status']==1?'btn-primary':'btn-warning');?>">
									<?php if ($banner['status']==1) { ?>
										<a href="deactive.php?id=<?php echo $banner['id']; ?>" class="text-white">Active</a>
									<?php }else{ ?>
										<a href="active.php?id=<?php echo $banner['id']; ?>" class="text-whites">De-active</a>
									<?php } ?>
								</button>
							</td>
							<td><a href="delete.php?id=<?php echo $banner['id']; ?> " class="btn btn-danger">Delete</a></td>

						</tr>
					<?php endforeach; ?>
						<div><a href="image.php" class="btn btn-warning">Upload</a></div>
						<div class="mt-1">
                                            <?php if(!empty($_SESSION['ins_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['ins_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['ins_com']); ?>
                                    </div>
                                    <div class="mt-1">
                                            <?php if(!empty($_SESSION['del_com'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['del_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['del_com']); ?>
                                    </div>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }  else{
    echo "<div class='alert alert-danger' role='alert'>
  <h3>ACCESS DENIED</h3></br>
Did you know! There are about 7 billion people in the world but only few of them have privilege to access this page.

Unfortunately you are not one of them!

If you think you should have the privilege to access this page, please contact with the administrator.

</div>";} include '../includes/footer.php'; ?>