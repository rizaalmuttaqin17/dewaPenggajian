<?php 
include 'database/connection.php';
$jabatan = $_POST['jabatan'];
$name = $_POST['name'];
$tgl_aktif = $_POST['tgl_aktif'];
$email = $_POST['email'];
$foto = $_POST['foto'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$kontak = $_POST['kontak'];
$tunjangan = str_replace(".","",$_POST['tunjangan']);
$role = $_POST['role'];

mysqli_query($db,"INSERT INTO users (id_jabatan, name, tgl_aktif, email, foto, tempat_lahir, tanggal_lahir, kontak, tunjangan, role) VALUES ('$jabatan', '$name', '$tgl_aktif', '$email', 'foto', '$tempat_lahir', '$tanggal_lahir', '$kontak', '$tunjangan', '$role')");
header("location:users.php");

?>