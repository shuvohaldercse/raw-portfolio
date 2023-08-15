<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';


$sel_db = "SELECT * FROM services";
$sel_db_que = mysqli_query($db_con,$sel_db);



?>


<?php if ($_SESSION['role']!=0) { ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Service Part</h3>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
								<th>S.N</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php $sn=1; foreach ($sel_db_que as $service): ?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $service['ser_name']; ?></td>
								<td><?php echo substr($service['ser_desp'], 0,20); ?><a href="/sam/single-service.php?id=<?php echo $service['id']; ?>" target="blank">...more</a></td>
								<td>
									<button type="submit" class="btn <?php echo($service['status']==1?'btn-primary':'btn-warning');?>">
										<?php if ($service['status']==1) { ?>
											<a href="deactive.php?id=<?php echo $service['id']; ?>">Active</a>
										<?php }else{ ?>
											<a href="active.php?id=<?php echo $service['id']; ?>">de active</a>
										<?php } ?>
									</button>
								</td>
								<td><a href="delete.php?id=<?php echo $service['id']; ?>" class="btn btn-danger">Delete</a></td>
							</tr>
						<?php endforeach; ?>
						</table>
						<div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['delete_com'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['delete_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['delete_com']); ?>
                                        </div>
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['ins_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['ins_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['ins_com']); ?>
                                        </div>
                            <a href="add-service.php" class="btn btn-primary">New Service</a>
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