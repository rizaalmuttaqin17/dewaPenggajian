<?php include 'database/connection.php' ?>

<?php 



$idUsers = $_POST['idUsers'];
$idKuisioner = $_POST['idKuisioner'];
$query = "UPDATE `tracer_bayu`.`users` SET `status_pengisian`='Sudah' WHERE  `id`=$idUsers;";
$results = mysqli_query($db, $query);

if (isset($_POST['rating'])) { 
    foreach($_POST['rating'] as $item){
        $jawaban = explode(":",$item);
        if(COUNT($jawaban)>1){
            $id_kuisioner_pilihan = $jawaban[1];
            $jawabanRating = $jawaban[0];
            $sql = "INSERT INTO `tracer_bayu`.`jawaban` (`id_user`, `id_kuisioner_pilihan`, `id_kuisioner`, `jawaban`,`created_at`) VALUES ('$idUsers', '$id_kuisioner_pilihan', '$idKuisioner', '$jawabanRating',NOW())";
            mysqli_query($db, $sql);
        }
    }
}


header('location: index.php');


?>