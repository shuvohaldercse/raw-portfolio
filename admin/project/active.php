<?php
require '../db-con/db_con.php';

$id = $_GET['id'];

$update_db = "UPDATE pro_1 SET pro1_status=1 WHERE id=$id";
$update_db_que = mysqli_query($db_con,$update_db);
header('location:index.php?project_active.');


?>