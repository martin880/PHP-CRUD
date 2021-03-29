<?php 
    include 'koneksi.php';
    $nik = $_GET['nik'];
    $sql = "DELETE FROM karyawan WHERE nik = '$nik'" ;
    mysqli_query($conn, $sql);

    header("location: index.php");
    ?>