<?php 
include 'database/connection.php';
$jabatan = $_POST['jabatan'];
$gaji_pokok = str_replace(".","",$_POST['gaji_pokok']);


mysqli_query($db,"INSERT INTO jabatan (jabatan, gaji_pokok) VALUES ('$jabatan', '$gaji_pokok')");
header("location:jabatan.php");

?>