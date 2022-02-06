<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "tugasakhir";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if(!$conn){
        die("Koneksi tidak berhasil");
    }
?>


