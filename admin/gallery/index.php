<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$sel_gal = "SELECT * FROM gallery";
$sel_gal_que = mysqli_query($db_con,$sel_gal);


?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header text-center">
						<h3>Image Gallery</h3>
					</div>
					<div class="card-body">
						<a href="add-pic.php?add_picture" class="btn btn-success">Add Picture</a><hr>
						<table class="table">
							<tr>
								<th>S.N</th>
								<th>Picture</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php $sn=1; foreach ($sel_gal_que as $pic): ?>
								<tr>
									<td><?php echo $sn++; ?></td>
									<td><img src="uploads/<?php echo $pic['picture']; ?>" width="110" height="60"></td>
									<td>
										<button type="submit" class="btn <?php echo($pic['status']==1?'btn-primary':'btn-warning'); ?> btn-xs">
											<?php if ($pic['status']==1) { ?>
												<a href="deactive.php?id=<?php echo $pic['id']; ?>" class="text-white">Active</a>
											<?php }else{ ?>
												<a href="active.php?id=<?php echo $pic['id']; ?>" class="text-white">Deactive</a>
											<?php } ?>
										</button>
									</td>
									<td><a href="delete.php?id=<?php echo $pic['id']; ?>" class="btn btn-danger btn-xs">Delete</a></td>
								</tr>
							<?php endforeach; ?>
						</table>
						
						<div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['ins_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['ins_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['ins_com']); ?>
                                        </div>
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['del_com'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['del_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['del_com']); ?>
                                        </div>
					</div>
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