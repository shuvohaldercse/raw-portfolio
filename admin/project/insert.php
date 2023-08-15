<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h3>Insert Project</h3>
					</div>
					<div class="card-body">
						<form action="insert-com.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="pro_title" class="form-control" placeholder="Project Title">
							</div>
							<div class="form-group">
								<input type="text" name="pro_short" class="form-control" placeholder="Project Short Description">
							</div>
							<div class="form-group">
								<input type="text" name="pro_link" class="form-control" placeholder="Project Link">
							</div>
							<div class="form-group">
								<input type="text" name="pro_feedback" class="form-control" placeholder="Project Feedback">
							</div>
							<div class="form-group">
								<input type="text" name="pro_sender" class="form-control" placeholder="Project Sender">
							</div>
							<div class="form-group">
								<input type="file" name="pro_img" class="form-control" placeholder="Project image">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Insert Project</button>
							</div>
						</form>
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