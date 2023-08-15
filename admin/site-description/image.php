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
						<h3>Upload Picture.</h3>
					</div>
					<div class="card-body">
						<form action="image-com.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<select name="status" class="form-control">
									<option value="0">Inactive</option>
									<option value="1">Active</option>
								</select>
							</div>
							<div class="form-group">
								<input type="file" name="pic" class="form-control">
							</div>
							<div class="mt-1">
                                            <?php if(!empty($_SESSION['pic_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['pic_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['pic_err']); ?>
                                    </div>
							<div class="form-group">
								<button type="submit" class="btn btn-warning">Upload</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<br><br><br><br><br><br>











<?php }  else{
    echo "<div class='alert alert-danger' role='alert'>
  <h3>ACCESS DENIED</h3></br>
Did you know! There are about 7 billion people in the world but only few of them have privilege to access this page.

Unfortunately you are not one of them!

If you think you should have the privilege to access this page, please contact with the administrator.

</div>";} include '../includes/footer.php'; ?>