<?php
require '../db-con/db_con.php';

$id = $_GET['id'];

$update = "UPDATE site_banner_img SET status=0 WHERE id=$id";
$update_que = mysqli_query($db_con,$update);
header('location:index.php?deactive_complete');


?>