<?php
include '../lib/library.php';
session_start();
date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d H:i:s";
$waktu = date($DATE_FORMAT);

function isTerlambat($waktu)
{
    $batas_waktu_menit = 9 * 60 + 30; # menunjukkan jam 9:30

    $waktu_time = strtotime($waktu);
    $waktu_menit = date('H', $waktu_time) * 60 + date('i', $waktu_time);

    return $waktu_menit > $batas_waktu_menit;
}

$kehadiran = 'H';

if (isTerlambat($waktu)) {
    $kehadiran = 'T';
}

echo $kehadiran . " -- " . $waktu;

$id_siswa  = $_SESSION['idsiswa'];

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

        $mysqli->query($sql) or die($mysqli->error);
        
        $query = "SELECT * from siswa WHERE id_siswa = " . $_SESSION['idsiswa'];
        $siswa = mysqli_query($mysqli, $query);

        $data_siswa = mysqli_fetch_assoc($siswa);

        $awalKerja  = strtotime($data_siswa['tgl_masuk']);
        $akhirKerja = strtotime($data_siswa['tgl_keluar']);
        $jumlahHari = $akhirKerja - $awalKerja;

        $jumlah_presensi = round($jumlahHari / (60 * 60 * 24));

        $hadir = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'H' AND id_siswa = " . $id_siswa);
        $jumlah_hadir = mysqli_num_rows($hadir);

        $izin = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'I' AND id_siswa = " . $id_siswa);
        $jumlah_izin = mysqli_num_rows($izin);

        $sakit = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'S' AND id_siswa = " . $id_siswa);
        $jumlah_sakit = mysqli_num_rows($sakit);

        // $jumlah_presensi = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;

        $start = new DateTime($data_siswa['tgl_masuk']);
        $end = new DateTime($data_siswa['tgl_keluar']);
        $oneday = new DateInterval("P1D");

        $days = array();
        $data = "7.5";

        /* Iterate from $start up to $end+1 day, one day in each iteration.
   We add one day to the $end date, because the DatePeriod only iterates up to,
   not including, the end date. */
        foreach (new DatePeriod($start, $oneday, $end->add($oneday)) as $day) {
            $day_num = $day->format("N"); /* 'N' number days 1 (mon) to 7 (sun) */
            if ($day_num < 7) { /* weekday */
                $days[$day->format("Y-m-d")] = $data;
            }
        }

        $jumlah_presensi = count($days) - 1;

        $persentase = number_format($jumlah_hadir / $jumlah_presensi * 100);

        $sql2 = "UPDATE siswa SET
                persentase = '$persentase'
                WHERE id_siswa = $id_siswa";

        $mysqli->query($sql2) or die($mysqli->error);

        header("location:v_absen.php");
    }
}

$sql = "SELECT * FROM data_absen";
$data_absen = $mysqli->query($sql) or die($mysqli->error);
