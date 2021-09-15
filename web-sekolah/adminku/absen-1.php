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

$kehadiran = 'H';

if (isTerlambat($waktu)) {
    $kehadiran = 'T';
}

echo $kehadiran." -- ".$waktu;

$id_siswa  = $_SESSION['idsiswa'];

$hadir = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'H' AND id_siswa = " . $id_siswa);
$jumlah_hadir = mysqli_num_rows($hadir);

$izin = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'I' AND id_siswa = " . $id_siswa);
$jumlah_izin = mysqli_num_rows($izin);

$sakit = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'S' AND id_siswa = " . $id_siswa);
$jumlah_sakit = mysqli_num_rows($sakit);

    $tgl_masuk  = strtotime($tgl_masuk);
    $tgl_keluar = strtotime($tgl_keluar);
    $jumlahHari = $tgl_masuk - $tgl_keluar;

    $jumlah_presensi = round($jumlahHari / (60*60*24));

$persentase = number_format($jumlah_hadir / $jumlah_presensi * 100);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        $sql2 = "UPDATE siswa SET
                persentase = '$persentase'
                WHERE id_siswa = $id_siswa";

        $mysqli->query($sql) or die($mysqli->error);

        $mysqli->query($sql2) or die($mysqli->error);

        header("location:v_absen.php");
    }
}

$sql = "SELECT * FROM data_absen";
$data_absen = $mysqli->query($sql) or die($mysqli->error);
?>