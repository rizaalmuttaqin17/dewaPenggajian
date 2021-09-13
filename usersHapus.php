<?php 
    include 'database/connection.php';
    $id = $_GET['id'];
    mysqli_query($db,"DELETE from users WHERE id='$id'");
    header("location:users.php");
?>