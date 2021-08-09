<?php 
include 'database/connection.php';
$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$gaji_pokok = str_replace(".","",$_POST['gaji_pokok']);

mysqli_query($db,"UPDATE jabatan SET jabatan='$jabatan', gaji_pokok='$gaji_pokok' WHERE id='$id'");
header("location:jabatan.php");

?>