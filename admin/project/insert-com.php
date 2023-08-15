<?php
session_start();

require '../db-con/db_con.php';

$pro_title = $_POST['pro_title'];
$pro_short = $_POST['pro_short'];
$pro_link = $_POST['pro_link'];
$pro_feedback = $_POST['pro_feedback'];
$pro_sender = $_POST['pro_sender'];


if (empty($pro_title || $pro_short || $pro_link || $pro_feedback || $pro_sender)) {
	$_SESSION['all_fild_error'] = 'All Fild Require';
	header('location:insert.php?all_fild_require');
}else{

	$u_img = $_FILES['pro_img'];
	$after_explode = explode('.', $u_img['name']);
	$extension = end($after_explode);
	$allow_extension = array('jpg','png','jpeg','gif');
	if (in_array($extension, $allow_extension)) {
		if ($u_img['size']<=20000000) {
			
			$ins_db = "INSERT INTO pro_1(pro1_title,pro1_short,pro1_link,pro1_feedback,pro1_sender) VALUES('$pro_title','$pro_short','$pro_link','$pro_feedback','$pro_sender')";
			$ins_db_que = mysqli_query($db_con,$ins_db);

			$last_id = mysqli_insert_id($db_con);
			$file_name = $last_id.'.'.$extension;
			$location = "../uploads/project/".$file_name;
			move_uploaded_file($u_img['tmp_name'], $location);

			$update_img = "UPDATE pro_1 SET pro1_picture='$file_name' WHERE id='$last_id'";
			$update_img_que = mysqli_query($db_con,$update_img);

			header('location:index.php?ins_com');

		}else{
			echo "file too learge";
		}
	}else{
		echo "file not support";
	}
}


?>