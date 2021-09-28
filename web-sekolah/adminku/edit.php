<?php
include '../config/config.php';

$id_file = @$_GET['id_file'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link       = $_POST['link'];
    $fileTugas  = $_FILES['fileTugas'];
    $file      = $fileTugas['name'];
    $fileLama  = $_POST['fileLama'];

    // if (empty($link)) {
    //     echo "<script>console.log('Mohon isi link/keterangan terlebih dahulu');</script>";
    // } else {
        if (!empty($fileTugas) and $fileTugas['error'] == 0) {
            $path = 'tugas/';
            $upload = move_uploaded_file($fileTugas['tmp_name'], $path . $fileTugas['name']);
            $fileLama = $fileTugas['name'];
            $sql = "UPDATE tugas SET
                link = '$link',
                file = '$file',
                status = 'terkirim'
            WHERE id_file = $id_file;
            ";
        }
        else {
            $sql = "UPDATE tugas SET
                link = '$link',
                status = 'terkirim'
            WHERE id_file = $id_file;
            ";
        }
        $file = $fileLama;
    

    

    $mysqli->query($sql) or die($mysqli->error);

    header('location:tugas.php');
}

$sql = "SELECT * FROM tugas";
$dataTugas = $mysqli->query($sql) or die($mysqli->error);

if (empty($id_file)) header('location:tambahtugas.php');

$sql = "SELECT * FROM tugas WHERE id_file = '$id_file'";
$query = $mysqli->query($sql);
$tugas = $query->fetch_array();

if (empty($tugas)) header('location:tambahtugas.php');

include '../adminku/tambahtugas.php';
