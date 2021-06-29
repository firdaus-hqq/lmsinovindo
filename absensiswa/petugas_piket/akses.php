<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
header("Location:http://localhost/LMS/absensiswa/");
}

//cek level user
if($_SESSION['akses']!="petugas_piket" and $_SESSION['akses']!="admin"){
header("Location:http://localhost/LMS/absensiswa/404.php");//jika bukan admin jangan lanjut
}
?>
