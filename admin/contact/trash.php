<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$sel_con = "SELECT * FROM contact WHERE status=2";
$sel_con_que = mysqli_query($db_con,$sel_con);



?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h3>Trash</h3><hr>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
								<th>S.N</th>
								<th>Name</th>
								<th>Email</th>
								<th>Message</th>
								<th>Action</th>
							</tr>
							<?php $sn=1; foreach ($sel_con_que as $msg): ?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $msg['name']; ?></td>
								<td><?php echo $msg['email']; ?></td>
								<td><?php echo substr($msg['message'], 0,25); ?>...</td>
								<td>
									<a href="undo.php?id=<?php echo $msg['id']; ?>" class="btn btn-success btn-xs">Undo</a>
									<a href="delete.php?id=<?php echo $msg['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
						
						<div class="mt-1">
                                            <?php if(!empty($_SESSION['undo_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['undo_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['undo_com']); ?>
                                    </div><div class="mt-1">
                                            <?php if(!empty($_SESSION['del_com'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['del_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['del_com']); ?>
                                    </div>
                                <a href="index.php" class="btn btn-success">Inbox</a><hr>
						</table>
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