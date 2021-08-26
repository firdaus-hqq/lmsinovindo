<?php

include '../adminku/configurasi/koneksi.php';
include '../adminku/configurasi/library.php';

function flash($tipe, $pesan = '') {
    if (empty($pesan)) {
        $pesan = @$_SESSION[$tipe];
        unset($_SESSION[$tipe]);
        return $pesan;
    } else {
        $_SESSION[$tipe] = $pesan;
    }
}

$id_file = @$_GET['id_file'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_file            = $_POST['id_file'];
    $file               = $_POST['name'];
    $link               = $_POST['link'];

    if (empty($file)) {
        flash('error', 'Silahkan upload terlebih dahulu');
    } elseif (empty($link)) {
        flash('error1', 'Silahkan masukan teks terlebih dahulu');
    } else {
        if (!empty($link) and $link['error'] == 0) {
            $path = 'tugas/';
            $upload = move_uploaded_file($file['tmp_name'], $path . $file['name']);
        }
        if (!$upload) {
            flash('error', "Upload file gagal!");
            header('location:tambahtugas.php');
        }
    }

    $sql = "UPDATE tugas SET
                id_file = '$id_file',
                 file  = '$file',
                 link = '$link'
                 tanggal = '$tanggal'
            WHERE id_file = $id_file;
            ";

    $mysqli->query($sql) or die($mysqli->error);

    header('location:tambahtugas.php');
}

$sql = "SELECT * FROM tugas";
$dataTugas = $mysqli->query($sql) or die($mysqli->error);

if (empty($id_file)) header('location:tambahtugas.php');

$sql = "SELECT * FROM tugas WHERE id_file = '$id_file'";
$query = $mysqli->query($sql);
$tugas = $query->fetch_array();

if (empty($tugas)) header('location:tambahtugas.php');

include '../adminku/tambahtugas.php';