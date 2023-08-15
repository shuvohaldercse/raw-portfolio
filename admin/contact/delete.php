<?php
session_start();



require '../db-con/db_con.php';

$id = $_GET['id'];

$del_db = "DELETE FROM contact WHERE id=$id";
$del_db_que = mysqli_query($db_con,$del_db);
$_SESSION['del_com'] = 'Delete Complete';


header('location:trash.php?message_delete');


?>