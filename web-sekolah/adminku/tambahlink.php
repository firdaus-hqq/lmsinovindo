<?php 
include '../config/config.php';
session_start();
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa  = $_SESSION['idsiswa'];
    $link = @$_POST['link'];
    $fileTugas = @$_FILES['fileTugas'];
    $file   = $fileTugas['name'];

    if (empty($link)) {
        echo "<script>console.log('Mohon isi link/keterangan terlebih dahulu');</script>";
    } else {
        if (!empty($fileTugas) and $fileTugas['error'] == 0) {
            $path = 'tugas/';
            $upload = move_uploaded_file($fileTugas['tmp_name'], $path . $fileTugas['name']);

            if (!$upload) {
                echo "<script>alert('Upload GAGAL!')</script>";
                header('location:tambahtugas.php');
            }
            $file = $fileTugas['name'];
        }

        $sql = "INSERT INTO tugas (id_siswa, file, link, tanggal) 
                VALUES ('$id_siswa', '$file', '$link', '$tanggal')";

        $mysqli->query($sql) or die($mysqli->error);

        header("location:tambahtugas.php");
    }
}

$sql = "SELECT * FROM tugas";
$tugas = $mysqli->query($sql) or die($mysqli->error);
?>