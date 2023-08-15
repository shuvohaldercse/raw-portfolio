<?php
session_start();

require '../db-con/db_con.php';

$status = $_POST['status'];



	$u_img = $_FILES['pic'];
	$after_expolde = explode('.', $u_img['name']);
	$extension = end($after_expolde);
	$allow_extension = array('jpg','png','gif','jpeg','ico');
	if (in_array($extension, $allow_extension)) {
		if ($u_img['size']<=20000000) {
			list($width,$height) = getimagesize($u_img['tmp_name']);
			if ($width >= 1250 || $height >= 850) {

				$ins_db = "INSERT INTO site_banner_img(status) VALUES('$status')";
				$ins_db_que = mysqli_query($db_con,$ins_db);

				$last_id = mysqli_insert_id($db_con);
				$file_name = $last_id.'.'.$extension;
				$new_locat = "../uploads/banner/".$file_name;
				move_uploaded_file($u_img['tmp_name'], $new_locat);

				$ins_pic = "UPDATE site_banner_img SET picture='$file_name' WHERE id='$last_id'";
				$ins_pic_que = mysqli_query($db_con,$ins_pic);
				$_SESSION['ins_com'] = 'Picture Add Complete';
				header('location:index.php?picture_upload_complete');

			}else{
				$_SESSION['pic_err'] = 'Min. Width 1250 & Height 850 Require';
				header('location:image.php?demenation_error');
			}
		}else{
			$_SESSION['pic_err'] = 'Max upload 2MB';
			header('location:image.php?size_error');
		}
	}else{
		$_SESSION['pic_err'] = 'Picture Not Support. Only(jpg,png,gif,jpeg,ico)';
		header('location:image.php?picture_not_support');
	}



?>