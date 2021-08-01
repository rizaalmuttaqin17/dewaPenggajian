<?php include 'database/connection.php' ?>
<?php 

$dataMahasiswa = "";
$id = $_POST['id'];
$query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results)> 0) {
    $dataMahasiswa = mysqli_fetch_assoc($results);
}else {
    $_SESSION['success'] = "Gagal Update Data!";
	// header('location: profile.php');
}


$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_hp = $_POST['no_hp'];
$id_jurusan_prodi = $_POST['id_jurusan_prodi'];
$alamat = $_POST['alamat'];
$foto = $dataMahasiswa['foto'];



if($_FILES['foto']["name"] != "" ){
    echo 111;
    $target_dir = "foto_profile/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $foto = $_FILES["foto"]["name"];
}

$query =    "UPDATE users 
                SET nama='$nama',
                nim='$nim',
                tempat_lahir='$tempat_lahir',
                tanggal_lahir='$tanggal_lahir',
                no_hp='$no_hp',
                foto= '$foto',
                alamat= '$alamat',
                id_jurusan_prodi= '$id_jurusan_prodi',
                data_diri='Lengkap'
                WHERE id = '$id'
                ;";
mysqli_query($db, $query);
header("Location:profile.php");
?>