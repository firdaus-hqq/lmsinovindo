<?php 
include '../lib/library.php';
session_start();
date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d H:i:s";
$waktu = date($DATE_FORMAT);

function isTerlambat($waktu) {
    $batas_waktu_menit = 9 * 60 + 30; # menunjukkan jam 9:30
    
    $waktu_time = strtotime($waktu);
    $waktu_menit = date('H', $waktu_time) * 60 + date('i', $waktu_time);
    
    return $waktu_menit > $batas_waktu_menit;
}

function canSubmit($waktu) {
    $batas_waktu_menit = 10 * 60; # menunjukkan jam 10:00
    
    $waktu_time = strtotime($waktu);
    $waktu_menit = date('H', $waktu_time) * 60 + date('i', $waktu_time);
    
    return $waktu_menit > $batas_waktu_menit;
    
}

$kehadiran = 'H';

if (isTerlambat($waktu)) {
    $kehadiran = 'T';
}

$button = "<button type='submit' name='simpan' class='btn btn-success'>Simpan</button>";

if (canSubmit($waktu)) {
    echo $button;
} else {
    $button = "<button type='submit' name='simpan' class='btn btn-success' disabled>Simpan</button>";
    echo $button;
}
echo $kehadiran." -- ".$waktu;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa  = $_SESSION['idsiswa'];
    if (isTerlambat($waktu)) {
        $kehadiran = 'T';
    } else {
        $kehadiran = @$_POST['kehadiran'];
    }
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