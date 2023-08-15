<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$sel_about = "SELECT * FROM about_me";
$sel_about_que = mysqli_query($db_con,$sel_about);
$sel_about_assoc = mysqli_fetch_assoc($sel_about_que);

$sel_quli = "SELECT * FROM quil";
$sel_quli_que = mysqli_query($db_con,$sel_quli);


?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h3>About Me</h3>
				</div>
				<div class="card-body">
					<div class="text-white mt-1">
						<p><?php echo $sel_about_assoc['about']; ?></p>
					</div>
					<div>
						<a href="about-update.php?id=<?php echo $sel_about_assoc['id']; ?>" class="btn btn-primary">Update</a>
					</div>
					<div class="mt-1">
                                     <?php if(!empty($_SESSION['update_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['update_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['update_com']); ?>
                                    </div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h3>Qualification:-</h3>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>S.N</th>
							<th>Subject</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php $sn=1; foreach ($sel_quli_que as $quli): ?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $quli['name']; ?></td>
								<td>
									<button type="submit" class="btn <?php echo($quli['status']==1?'btn-primary':'btn-warning')?> btn-xs">
										<?php if($quli['status']==1){ ?>
											<a href="deactive.php?id=<?php echo $quli['id']; ?>" class="text-white">Active</a>
										<?php }else{ ?>
											<a href="active.php?id=<?php echo $quli['id']; ?>" class="text-white">Deactive</a>
										<?php } ?>
									</button>
								</td>
								<td><a href="delete.php?id=<?php echo $quli['id']; ?>" class="btn btn-danger btn-xs">Delete</a></td>
							</tr>
						<?php endforeach; ?>
					</table>
					<div class="mt-1">
                                     <?php if(!empty($_SESSION['del_com'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['del_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['del_com']); ?>
                                    </div>
					<div>
						<a href="add-quli.php" class="btn btn-success btn-xs">Add</a>
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