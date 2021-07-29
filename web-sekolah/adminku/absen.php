<?php 
include '../lib/library.php';
session_start();
date_default_timezone_set("Asia/Jakarta");
$waktu = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa  = $_SESSION['idsiswa'];
    $kehadiran = @$_POST['kehadiran'];
    $kegiatan  = @$_POST['kegiatan'];

    if (empty($kehadiran)) {
        echo "<script>console.log('Mohon isi kehadiran terlebih dahulu')</script>";
    } elseif (empty($kegiatan)) {
        echo "<script>console.log('Mohon isi kegiatan hari ini terlebih dahulu')</script>";
    } else {
        $sql = "INSERT INTO data_absen (id_siswa, kehadiran, kegiatan, waktu) 
                VALUES ('$id_siswa', '$kehadiran', '$kegiatan', '$waktu')";

        $mysqli->query($sql) or die($mysqli->error);

        header("location:v_absen.php");
    }
}

$sql = "SELECT * FROM data_absen";
$data_absen = $mysqli->query($sql) or die($mysqli->error);
?>