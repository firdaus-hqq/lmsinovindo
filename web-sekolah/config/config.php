<?php
// define('MY_PATH', 'http://localhost/web-sekolah/');
$domain = "http://localhost/web-sekolah/";
$url_share = $domain.$_SERVER['REQUEST_URI'];
$server= "localhost";
$username="root";
$pass="";
$db="db_rpl";

($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $username, $pass)) or die('Gagal Koneksi');
mysqli_select_db($GLOBALS["___mysqli_ston"], $db) or die ('Database tidak ada');

$mysqli = mysqli_connect($server, $username, $pass, $db)
            or die('Tidak dapat koneksi ke Database');
?>