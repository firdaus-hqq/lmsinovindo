<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "db_rpl";
($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $user, $password)) or die ("Koneksi gagal");
mysqli_select_db($GLOBALS["___mysqli_ston"], $database) or die ("Database tidak ditemukan");

$mysqli = mysqli_connect($server, $user, $password, $database)
            or die('Tidak dapat koneksi ke Database');
?>