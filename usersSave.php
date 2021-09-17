<?php 
include 'database/connection.php';
$jabatan = $_POST['jabatan'];
$name = $_POST['name'];
$tgl_aktif = $_POST['tgl_aktif'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$kontak = $_POST['kontak'];
$tunjangan = str_replace(".","",$_POST['tunjangan']);
$role = $_POST['role'];

//Upload Foto
$foto = $_FILES['foto']['name'];
if(!empty($foto)){
    $lokasiFoto = $_FILES['foto']['tmp_name'];
    $tipeFile = pathinfo($foto, PATHINFO_EXTENSION);
    $fileFoto = $name.time().".".$tipeFile;

    $folder = "assets/usersPhoto/".$fileFoto;
    move_uploaded_file($lokasiFoto, $folder);
}else{
    $fileFoto = "null";
}

mysqli_query($db, "INSERT INTO users (id_jabatan, name, tgl_aktif, email, foto, password, tempat_lahir, tanggal_lahir, kontak, tunjangan, role, created_at, updated_at) VALUES ('$jabatan', '$name', '$tgl_aktif', '$email', '$fileFoto', '$password','$tempat_lahir', '$tanggal_lahir', '$kontak', '$tunjangan', '$role', now(), now()");
header("location:users.php");

?>