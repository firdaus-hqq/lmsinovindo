<?php
include '../../config/config.php';

$id_tentang = @$_GET['id_tentang'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file       = $_POST['name'];
    $fileTugas  = $_FILES['fileTugas'];
    $fileLama  = $_POST['fileLama'];
    $pembuat    = $_POST['pembuat'];

    if (!empty($fileTugas) and $fileTugas['error'] == 0) {
        $path = '../tentang/';
        $upload = move_uploaded_file($fileTugas['tmp_name'], $path . $fileTugas['name']);
        $fileLama = $fileTugas['name'];
    }
    if (!$upload) {
        echo "<script>alert('Upload GAGAL!')</script>";
        header('location:v_edit_tentang.php');
    }
    $file = $fileLama;

    $sql = "UPDATE tentang SET
                file = '$file',
                pembuat = '$pembuat'
            WHERE id_tentang = $id_tentang;
            ";

    $mysqli->query($sql) or die($mysqli->error);

    header('location:v_edit_tentang.php');
}

$sql = "SELECT * FROM tentang";
$tentang = $mysqli->query($sql) or die($mysqli->error);

if (empty($id_tentang)) header('location:v_edit_tentang.php');

$sql = "SELECT * FROM tentang WHERE id_tentang = '$id_tentang'";
$query = $mysqli->query($sql);
$tentang = $query->fetch_array();

if (empty($tentang)) header('location:v_edit_tentang.php');

include 'v_edit_tentang.php';
