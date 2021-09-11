<?php 
    include('connection.php');
    $query = "SELECT * FROM absensi WHERE tanggal_absen=DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND jam_keluar IS NULL AND  id_user=".$_SESSION['users']['id'];
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results)>0) {
        while($row = mysqli_fetch_array($results)){
            $query = "UPDATE absensi SET keterangan='Lupa Absen!' WHERE  `id`=1";
            mysqli_query($db,$query);
        }
    } 
?>