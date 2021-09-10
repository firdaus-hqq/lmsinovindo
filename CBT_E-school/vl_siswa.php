<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('koneksi/base.php');
session_start();
$username 	= $_POST['username'];
$password	= $_POST['password'];
$inputtoken=$_POST['token'];
$file = fopen("on-siswa/token.txt","r");
$token=fread($file,filesize("on-siswa/token.txt"));
if  ($token == $inputtoken){
    
$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $username);
$password = md5(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $password));
$q = mysqli_query($GLOBALS["___mysqli_ston"], "select username_login,password_login,nama_lengkap,statuslogin from siswa where BINARY username_login='$username' and password_login='$password'");
if (mysqli_num_rows($q) == 1) {

$_SESSION['siswa'] = $username;
$_SESSION['nama_lengkap'] = $nama;
mysqli_query($GLOBALS["___mysqli_ston"], "update siswa set online='1'where username_login='$username'");
header('location:on-siswa/index.php');


}
else {
header('location:login.php?salah=1');
}
}
else {
    fclose($file);
    header('location:login.php?token=1');
}
?>