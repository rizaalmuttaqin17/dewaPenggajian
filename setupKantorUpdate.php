<?php 
include 'database/connection.php';
$id = $_POST['id'];
$jam_masuk = $_POST['jam_masuk'];
$jam_pulang = $_POST['jam_pulang'];
$dimulai_absen_menit = $_POST['dimulai_absen_menit'];
$potongan_gaji_terlambat = str_replace(".","",$_POST['potongan_gaji_terlambat']);
$potongan_gaji_absen = str_replace(".","",$_POST['potongan_gaji_absen']);
$potongan_gaji_pph = str_replace(".","",$_POST['potongan_gaji_pph']);

mysqli_query($db,"UPDATE kantor_setting SET jam_masuk='$jam_masuk', jam_pulang='$jam_pulang', dimulai_absen_menit='$dimulai_absen_menit', potongan_gaji_terlambat='$potongan_gaji_terlambat', potongan_gaji_absen='$potongan_gaji_absen', potongan_gaji_pph='$potongan_gaji_pph' WHERE id='$id'");
header("location:setupKantor.php");

?>