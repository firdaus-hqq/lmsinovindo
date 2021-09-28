<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $kelas = $_POST['id_kelas'];
    $wpm = $_POST['wpm'];
    $accuracy = $_POST['accuracy'];

    $sql = "INSERT INTO peringkat (nama_lengkap, id_kelas, wpm, accuracy) VALUES
            ('$nama_lengkap', '$kelas', '$wpm', '$accuracy')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:v_typing_test.php");
}

$sql = "SELECT * FROM kelas";
$dataSekolah = $mysqli->query($sql) or die($mysqli->error);

$sql2 = "SELECT * FROM siswa WHERE nama_lengkap NOT IN (SELECT nama_lengkap FROM peringkat)";
$dataSiswa = $mysqli->query($sql2) or die($mysqli->error);

include 'v_tambah_nilai.php';