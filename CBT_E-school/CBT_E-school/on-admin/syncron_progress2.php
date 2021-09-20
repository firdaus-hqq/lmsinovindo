<?php
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$connect = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', ''));
if (!$connect) {
die('Could not connect to mysql: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//nama database
$cid =mysqli_select_db($connect, 'db_rpl');

file_put_contents(
    'versi/aktif/images.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool_v6/syncron/images.zip' )
);



$zip = new ZipArchive;
$zip->open('versi/aktif/images.zip');
$zip->extractTo('./images/');
$zip->close();
unlink('versi/aktif/images.zip');

header("location:sync.php?pesan=sukses");
exit();
?>