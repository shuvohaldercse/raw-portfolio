<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$id = $_GET['id'];

$sel_db = "SELECT * FROM site_desp WHERE id=$id";
$sel_db_que = mysqli_query($db_con,$sel_db);
$sel_db_assoc = mysqli_fetch_assoc($sel_db_que);


?>


<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h3>Information Edit:</h3>
					</div>
					<div class="card-body">
						<form class="" action="edit-com.php" method="post">
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $sel_db_assoc['id']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="s_title" value="<?php echo $sel_db_assoc['title']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="s_name" value="<?php echo $sel_db_assoc['s_name']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="ban_text" value="<?php echo $sel_db_assoc['ban_text']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="short_desp" value="<?php echo $sel_db_assoc['short_desp']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="footer" value="<?php echo $sel_db_assoc['footer']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="footer_link" value="<?php echo $sel_db_assoc['footer_link']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update</button>
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