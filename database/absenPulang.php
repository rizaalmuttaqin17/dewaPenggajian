<?php 
include('connection.php');
$idUser= $_SESSION['users']['id'];

$query = "SELECT * FROM absensi WHERE tanggal_absen=DATE_SUB(CURDATE(),INTERVAL 0 DAY) AND jam_keluar IS NULL AND  id_user=".$_SESSION['users']['id'];
    $results = mysqli_query($db, $query);
    echo mysqli_num_rows($results);
    if (mysqli_num_rows($results)>0) {
        while($row = mysqli_fetch_array($results)){
            $query = "UPDATE absensi SET jam_keluar=NOW(), keterangan='Pulang' WHERE id=".$row['id'];
            mysqli_query($db,$query);
        }

    } 

?>