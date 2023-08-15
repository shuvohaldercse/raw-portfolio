<?php
session_start();
require '../db-con/db_con.php';

$id = $_GET['id'];

$del_db = "DELETE FROM quil WHERE id=$id";
$del_db_res = mysqli_query($db_con,$del_db);
$_SESSION['del_com'] = 'Delete Success';
header('location:index.php?delete_complete');


?>