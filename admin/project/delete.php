<?php
session_start();

require '../db-con/db_con.php';

$id = $_GET['id'];

$sel_db = "SELECT pro1_picture FROM pro_1 WHERE id=$id";
$sel_db_que = mysqli_query($db_con,$sel_db);
$sel_db_assoc = mysqli_fetch_assoc($sel_db_que);
$del_img = "../uploads/project/".$sel_db_assoc['pro1_picture'];
unlink($del_img);

$del_db = "DELETE FROM pro_1 WHERE id=$id";
$del_db_que = mysqli_query($db_con,$del_db);
$_SESSION['del_com'] = 'Delete Complete';
header('location:index.php?delete_complete');




?>