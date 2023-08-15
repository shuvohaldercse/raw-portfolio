<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';


$id = $_GET['id'];
$sel_co = "SELECT * FROM contact WHERE id=$id";
$sel_co_que = mysqli_query($db_con,$sel_co);
$sel_co_assoc = mysqli_fetch_assoc($sel_co_que);

if ($sel_co_assoc['status']==0) {
	$update = "UPDATE contact SET status=1 WHERE id=$id";
	$update_que = mysqli_query($db_con,$update);
}



?>


<?php if ($_SESSION['role']!=0) { ?>


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h3>View Message</h3>
					</div>
					<div class="card-body">
						
                		<h3><?php echo $sel_co_assoc['name']; ?></h3>
                		<h5>From: <?php echo $sel_co_assoc['email']; ?>
                  		</h5>
              			<hr>
              			<p><?php echo $sel_co_assoc['message']; ?></p>
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