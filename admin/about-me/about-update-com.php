<?php
session_start();
require '../db-con/db_con.php';

$id = $_POST['id'];
$about = $_POST['about'];

$update = "UPDATE about_me SET about='$about' WHERE id='$id'";
$update_que = mysqli_query($db_con,$update);
$_SESSION['update_com'] = 'Update Complete';
header('location:index.php?update_complete');




?>