<?php 
include 'database/connection.php';
$id = $_POST['id'];
$user = $_POST['name'];
$total_gaji = str_replace(".","",$_POST['total_gaji']);
$tanggal_gajian = $_POST['tanggal_gajian'];

mysqli_query($db,"UPDATE gaji_bulanan SET id_user='$user', total_gaji='$total_gaji', tanggal_gajian='$tanggal_gajian' WHERE id='$id'");
header("location:gaji-bulanan.php");

?>