<?php
session_start();



require '../db-con/db_con.php';

$id = $_GET['id'];

$update_db = "UPDATE contact SET status=0 WHERE id=$id";
$update_db_que = mysqli_query($db_con,$update_db);

$_SESSION['undo_com'] = 'Undo Complete';
header('location:trash.php?message_undo');


?>