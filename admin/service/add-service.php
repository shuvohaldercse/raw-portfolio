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
					<div class="card-header text-center">
						<h4>Add New Service</h4>
					</div>
					<div class="card-body">
						<form action="add-service-com.php" method="post">
							<div class="form-group">
								<input type="text" name="ser_name" class="form-control" placeholder="Service Name">
							</div>
							<div class="form-group">
								<textarea name="desp" class="form-control" placeholder="Service Description" cols="3"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Add Service</button>
							</div>
							<div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['error_all'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['error_all']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['error_all']); ?>
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