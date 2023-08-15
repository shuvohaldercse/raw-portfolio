<?php
require '../db-con/db_con.php';

$id = $_GET['id'];

$update_db = "UPDATE services SET status=0 WHERE id=$id";
$update_db_que = mysqli_query($db_con,$update_db);
header('location:index.php?deactive_com');


?>