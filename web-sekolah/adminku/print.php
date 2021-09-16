<?php
session_start();
include '../config/config.php';

$query = "SELECT * from siswa WHERE id_siswa = " . $_SESSION['idsiswa'];
$siswa = mysqli_query($mysqli, $query);

$data_siswa = mysqli_fetch_assoc($siswa);

function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

$image = imagecreatefromjpeg("sertifikat.jpg");
$white = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 0, 0, 0);
$font = __DIR__ . "/baru.ttf";
$angka = __DIR__ . "/inter.ttf";
$bold = __DIR__ . "/bold.ttf";
$nama = $data_siswa['nama_lengkap'];
$awal = tgl_indo($data_siswa['tgl_masuk']);
$akhir = tgl_indo($data_siswa['tgl_keluar']);
$idserti = $data_siswa['id_siswa'];
$romawi = date('n', strtotime($data_siswa['tgl_keluar']));
$bulan = getRomawi($romawi);
$tahun = date('Y', strtotime($data_siswa['tgl_keluar']));
$jurusan = $data_siswa['jurusan'];
$noserti = "No. $idserti/IDM/PKL.SERTIFIKAT/$bulan/$tahun";
$kalimatjurusan = "untuk kompetensi keahlian $jurusan";
$durasi = "tanggal $awal s.d. $akhir.";
$ttd = "Bandung, $akhir";

$bbox = imagettfbbox(100, 0, $font, $nama);
$center1 = (imagesx($image) / 2) - (($bbox[2] - $bbox[0]) / 2);
$bbox2 = imagettfbbox(30, 0, $angka, $noserti);
$center2 = (imagesx($image) / 2) - (($bbox2[2] - $bbox2[0]) / 2);
$bbox3 = imagettfbbox(35, 0, $bold, $kalimatjurusan);
$center3 = (imagesx($image) / 2) - (($bbox3[2] - $bbox3[0]) / 2);
$bbox4 = imagettfbbox(35, 0, $bold, $durasi);
$center4 = (imagesx($image) / 2) - (($bbox4[2] - $bbox4[0]) / 2);
$bbox5 = imagettfbbox(30, 0, $angka, $ttd);
$center5 = (imagesx($image) / 1.18) - (($bbox5[2] - $bbox5[0]) / 2);

imagettftext($image, 100, 0, $center1, 920, $red, $font, $nama);
imagettftext($image, 30, 0, $center2, 498, $white, $angka, $noserti);
imagettftext($image, 35, 0, $center3, 1108, $white, $bold, $kalimatjurusan);
imagettftext($image, 35, 0, $center4, 1188, $white, $bold, $durasi);
imagettftext($image, 30, 0, $center5, 1310, $white, $angka, $ttd);

header("Content-type: image/jpeg");
imagejpeg($image);
