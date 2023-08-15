<?php
require '../db-con/db_con.php';

$id = $_GET['id'];

$update_db = "UPDATE quil SET status=0 WHERE id=$id";
$update_db_res = mysqli_query($db_con,$update_db);
header('location:index.php?deactive_confirm');


?>