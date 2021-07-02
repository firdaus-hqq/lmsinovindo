<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND empty($_SESSION['leveluser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../configurasi/koneksi.php";
include "../../../configurasi/library.php";
include "../../../configurasi/fungsi_thumb.php";
$module=$_GET[module];
$act=$_GET[act];
// Hapus produk
if ($module=='galeri' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT gambar FROM galeri_foto WHERE id_galerifoto='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM galeri_foto WHERE id_galerifoto='$_GET[id]'");
     unlink("../../../foto_galeri/$_GET[namafile]");   
     unlink("../../../foto_galeri/small_$_GET[namafile]"); 
      unlink("../../../foto_galeri/medium_$_GET[namafile]");     
  }
  else{
     mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM galeri_foto WHERE id_galerifoto='$_GET[id]'");
  }
  header('location:../../media_admin.php?module='.$module);


  mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM galeri_foto WHERE id_galerifoto='$_GET[id]'");
  header('location:../../media_admin.php?module='.$module);
}
// Input produk
elseif ($module=='galeri' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media_admin.php?module=galeri)</script>";
    }
    else{
    UploadGaleri($nama_file_unik);
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO galeri_foto(nama_foto,
                                   
                                    gambar) 
                            VALUES('$_POST[nama_foto]',
                                   
                                   '$nama_file_unik')");
  header('location:../../media_admin.php?module='.$module);
  }
  }
  else{
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO galeri_foto(nama_foto
                                    ) 
                            VALUES('$_POST[nama_berita]')");
  header('location:../../media_admin.php?module='.$module);
  }
}
// Update produk
elseif ($module=='galeri' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE galeri_foto SET nama_foto = '$_POST[nama_foto]'
                                 
                             WHERE id_galerifoto   = '$_POST[id]'");
  header('location:../../media_admin.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media_admin.php?module=galeri)</script>";
    }
    else{
    UploadGaleri($nama_file_unik);
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE galeri_foto SET nama_foto = '$_POST[nama_foto]',
                                   
                                   gambar      = '$nama_file_unik'   
                             WHERE id_galerifoto  = '$_POST[id]'");
    header('location:../../media_admin.php?module='.$module);
    }
  }
}
}
?>
