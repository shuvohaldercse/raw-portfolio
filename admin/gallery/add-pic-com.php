<?php
session_start();
require '../db-con/db_con.php';


$alt = $_POST['alt'];

if (empty($alt)) {
	$_SESSION['pic_error'] = 'Insert Alt Tag';
	header('location:add-pic.php?alt_err');
}else{
	$u_img = $_FILES['img'];
	$after_explod = explode('.', $u_img['name']);
	$extension = end($after_explod);
	$allow_extension = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');

	if (in_array($extension, $allow_extension)) {
		$ins = "INSERT INTO gallery(alt_tag) Values('$alt')";
		$ins_que = mysqli_query($db_con,$ins);

		$last_id = mysqli_insert_id($db_con);
		$file_name = $last_id.'.'.$extension;
		$location = "uploads/".$file_name;
		move_uploaded_file($u_img['tmp_name'], $location);

		$upda = "UPDATE gallery SET picture='$file_name' WHERE id='$last_id'";
		$upda_que = mysqli_query($db_con,$upda);
		$_SESSION['ins_com'] = 'Insert Complete';
		header('location:index.php?insert_complete');
	}else{
		$_SESSION['pic_error'] = 'File Not Suport';
		header('location:add-pic.php?file_error');
	}
}





?>