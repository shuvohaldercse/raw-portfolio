<?php
session_start();

require '../db-con/db_con.php';

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$msg = $_POST['msg'];


if (empty($f_name || $l_name || $email || $msg)) {
	$_SESSION['msg_err'] = 'All Fild Require';
	header('location:../../index.php#contact-section');
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['msg_err'] = 'Valid Email Require';
	header('location:../../index.php#contact-section');
}else{
	$name = $f_name.' '.$l_name;
	$ins_db = "INSERT INTO contact(name,email,message) VALUES('$name','$email','$msg')";
	$ins_db_que = mysqli_query($db_con,$ins_db);
	$_SESSION['ins_com'] = 'Message Sent Succesfully';
	header('location:../../index.php#contact-section');
}



?>