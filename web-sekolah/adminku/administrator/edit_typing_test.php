<?php
include '../../config/config.php';

$id_peringkat = $_GET['id_peringkat'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap       = $_POST['nama_lengkap'];
    $kelas              = $_POST['id_kelas'];
    $wpm                = $_POST['wpm'];
    $accuracy           = $_POST['accuracy'];

    $sql = "UPDATE peringkat SET
                nama_lengkap = '$nama_lengkap',
                id_kelas = '$kelas',
                wpm = '$wpm',
                accuracy = '$accuracy'
            WHERE id_peringkat = $id_peringkat;
            ";

    $mysqli->query($sql) or die($mysqli->error);

    header('location: v_typing_test.php');
}

$sql = "SELECT * FROM kelas";
$dataSekolah = $mysqli->query($sql) or die($mysqli->error);

if (empty($id_peringkat)) header('location: v_typing_test.php');

$sql = "SELECT * FROM peringkat WHERE id_peringkat = '$id_peringkat'";
$query = $mysqli->query($sql);
$peringkat = $query->fetch_array();

if (empty($peringkat)) header('location: v_typing_test.php');

include 'v_tambah_nilai.php';