<?php 
include 'database/connection.php';
$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$potongan = str_replace(".","",$_POST['potongan']);
$keterangan = $_POST['keterangan'];

mysqli_query($db,"UPDATE potongan_gaji SET id_jabatan='$jabatan', potongan='$potongan', keterangan='$keterangan', updated_at=NOW() WHERE id='$id'");
header("location:potongan-gaji.php");

?>