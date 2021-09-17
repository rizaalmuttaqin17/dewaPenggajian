<?php 
include 'database/connection.php';
$jabatan = $_POST['jabatan'];
$potongan = str_replace(".","",$_POST['potongan']);

mysqli_query($db,"INSERT INTO potongan_gaji (id_jabatan, potongan, keterangan) VALUES ('$jabatan', '$potongan')");
header("location:potongan-gaji.php");

?>