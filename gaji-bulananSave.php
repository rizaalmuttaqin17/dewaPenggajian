<?php 
include 'database/connection.php';
$name = $_POST['name'];
$total_gaji = str_replace(".","",$_POST['total_gaji']);
$tanggal_gajian = $_POST['tanggal_gajian'];

mysqli_query($db,"INSERT INTO gaji_bulanan (id_user, total_gaji, tanggal_gajian) VALUES ('$name', '$total_gaji', '$tanggal_gajian')");
header("location:gaji-bulanan.php");

?>