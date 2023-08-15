<?php
session_start();

require '../db-con/db_con.php';


$ser_name = $_POST['ser_name'];
$desp = $_POST['desp'];



if (empty($ser_name || $desp)) {
	$_SESSION['error_all'] = 'All File Must Be Require.';
	header('location:add-service.php?all_fild_error');
}else{
	$insert_db = "INSERT INTO services(ser_name,ser_desp) VALUES('$ser_name','$desp')";
	$insert_db_que = mysqli_query($db_con,$insert_db);
	$_SESSION['ins_com'] = 'Service Insert Complete';
	header('location:index.php?insert_complete');
}


?>