<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "db_rpl";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn){
    var_dump('koneksi error');
    die();
}

if(isset($_POST['submit'])){
    $batas_pengumpulan = $_POST['batas_pengumpulan'];
    $waktu_tenggat = $_POST['waktu_tenggat'];
    $waktu_pengumpulan = $_POST['waktu_pengumpulan'];

    $query = mysqli_query($conn, "UPDATE admin_tanggal_tugas SET batas_pengumpulan = '$batas_pengumpulan', waktu_tenggat = '$waktu_tenggat', waktu_pengumpulan = '$waktu_pengumpulan'");
}
if (!$conn){
    var_dump('koneksi error');
    die();
}

$query = mysqli_query($conn, "SELECT * FROM admin_tanggal_tugas");

$data = mysqli_fetch_assoc($query);


?>