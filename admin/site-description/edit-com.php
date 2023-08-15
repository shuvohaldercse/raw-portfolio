<?php
session_start();


require '../db-con/db_con.php';

$id = $_POST['id'];
$title = $_POST['s_title'];
$s_name = $_POST['s_name'];
$ban_text = $_POST['ban_text'];
$short_desp = $_POST['short_desp'];
$footer = $_POST['footer'];
$footer_link = $_POST['footer_link'];




$upd_desp = "UPDATE site_desp SET title='$title',s_name='$s_name',ban_text='$ban_text',short_desp='$short_desp',footer='$footer',footer_link='$footer_link' WHERE id='$id'";
$upd_desp_que = mysqli_query($db_con,$upd_desp);
header('location:index.php?update_complete');





?>