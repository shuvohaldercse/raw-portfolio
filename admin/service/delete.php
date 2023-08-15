<?php
session_start();
require '../db-con/db_con.php';


$id = $_GET['id'];

$del_db = "DELETE FROM services WHERE id=$id";
$del_db_que = mysqli_query($db_con,$del_db);
$_SESSION['delete_com'] = 'Service Delete Complete';
header('location:index.php?delete_complete');

?>