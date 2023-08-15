<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$sel_pro = "SELECT * FROM pro_1";
$sel_pro_que = mysqli_query($db_con,$sel_pro);



?>


<?php if ($_SESSION['role']!=0) { ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					<h4>Showing Project</h4>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>S.N</th>
							<th>Title</th>
							<th>Short_desp</th>
							<th>Link</th>
							<th>Feedback</th>
							<th>Client</th>
							<th>Picture</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php $sn=1; foreach ($sel_pro_que as $pro): ?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $pro['pro1_title']; ?></td>
								<td><?php echo $pro['pro1_short']; ?></td>
								<td><?php echo $pro['pro1_link']; ?></td>
								<td><?php echo $pro['pro1_feedback']; ?></td>
								<td><?php echo $pro['pro1_sender']; ?></td>
								<td><img src="../uploads/project/<?php echo $pro['pro1_picture']; ?>" width="50"></td>
								<td><button type="submit" class="btn <?php echo($pro['pro1_status']==1?'btn-primary':'btn-warning'); ?>">
									<?php if ($pro['pro1_status']==1) { ?>
										<a href="deactive.php?id=<?php echo $pro['id']; ?>" class="text-white">Active</a>
									<?php }else{ ?>
										<a href="active.php?id=<?php echo $pro['id']; ?>" class="text-white">Deactive</a>
									<?php } ?>
								</button></td>
								<td><a href="delete.php?id=<?php echo $pro['id']; ?>" class="btn btn-danger">Delete</a></td>
							</tr>

						<?php endforeach; ?>
						<div><a href="insert.php" class="btn btn-primary">Insert Project</a></div>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>












<?php }  else{
    echo "<div class='alert alert-danger' role='alert'>
  <h3>ACCESS DENIED</h3></br>
Did you know! There are about 7 billion people in the world but only few of them have privilege to access this page.

Unfortunately you are not one of them!

If you think you should have the privilege to access this page, please contact with the administrator.

</div>";} include '../includes/footer.php'; ?>