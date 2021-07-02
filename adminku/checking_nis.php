<?php
include "configurasi/koneksi.php";
$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM registrasi_siswa
                   WHERE nis = '$_POST[nis]'");
$ketemu = mysqli_num_rows($sql);
echo $ketemu;
?>
