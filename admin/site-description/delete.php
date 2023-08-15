<?php
session_start();

require '../db-con/db_con.php';

$id = $_GET['id'];

$sel_img = "SELECT picture FROM site_banner_img WHERE id=$id";
$sel_img_que = mysqli_query($db_con,$sel_img);
$sel_img_assoc = mysqli_fetch_assoc($sel_img_que);
$del_from = "../uploads/banner/".$sel_img_assoc['picture'];
unlink($del_from);



$del_db = "DELETE FROM site_banner_img WHERE id=$id";
$del_db_que = mysqli_query($db_con,$del_db);
$_SESSION['del_com'] = 'Delete Complete';
header('location:index.php?delete_complete');


?>