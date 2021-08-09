<?php 
include 'database/connection.php';
$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$potongan = str_replace(".","",$_POST['potongan']);

mysqli_query($db,"UPDATE potongan_gaji SET id_jabatan='$jabatan', potongan='$potongan' WHERE id='$id'");
header("location:potongan-gaji.php");

?>