<?php
session_start();
require '../db-con/db_con.php';

$id = $_GET['id'];

$sel_db = "SELECT picture FROM gallery WHERE id=$id";
$sel_db_que = mysqli_query($db_con,$sel_db);
$sel_db_assoc = mysqli_fetch_assoc($sel_db_que);
$del_img = "uploads/".$sel_db_assoc['picture'];
unlink($del_img);

$del = "DELETE FROM gallery WHERE id=$id";
$del_que = mysqli_query($db_con,$del);
$_SESSION['del_com'] = 'Delete Complete';
header('location:index.php?delete_complete');


?>