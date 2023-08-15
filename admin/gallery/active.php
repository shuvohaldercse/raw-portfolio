<?php

require '../db-con/db_con.php';

$id = $_GET['id'];

$update = "UPDATE gallery SET status=1 WHERE id=$id";
$update_que = mysqli_query($db_con,$update);
header('location:index.php?active_complete');



?>