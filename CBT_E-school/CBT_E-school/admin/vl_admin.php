<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('../koneksi/base.php');
session_start();
$username 	= $_POST['username'];
$password	= $_POST['password'];

$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $username);
$password = md5(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $password));
$q = mysqli_query($GLOBALS["___mysqli_ston"], "select username,password,nama_lengkap from admin where username='$username' and password='$password'");
if (mysqli_num_rows($q) == 1) {
$_SESSION['admin'] = $username;
$_SESSION['nama_lengkap'] = $nama;
header('location:../on-admin/index.php');
} else {
header('location:login.php?salah=1');
}
?>