<?php
    include_once("config.php");
    $id = $_GET['id'];
    $query = "DELETE FROM mahasiswa WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    header("Location: add.php");
?>