<?php
session_start();
require '../db-con/db_con.php';

$quli = $_POST['quli'];

if (empty($quli)) {
	$_SESSION['error_l'] = 'Fild Require';
	header('location:add-quli.php?error');
}else{
	$ins_db = "INSERT INTO quil(name) VALUES('$quli')";
	$ins_db_que = mysqli_query($db_con,$ins_db);
	header('location:index.php?ins_complete');
	$_SESSION['update_com'] = 'Insert Complete';
}


?>