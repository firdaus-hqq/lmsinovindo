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
include "../../../configurasi/fungsi_seo.php";
$module=$_GET[module];
$act=$_GET[act];
// Hapus produk
if ($module=='setting' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT logo FROM setting WHERE id_setting='$_GET[id]'"));
  if ($data['logo']!=''){
     mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM setting WHERE id_setting='$_GET[id]'");
     unlink("../../../setting_web/$_GET[namafile]");   
     unlink("../../../setting_web/small_$_GET[namafile]");
     unlink("../../../setting_web/medium_$_GET[namafile]");      
  }
  else{
     mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM setting WHERE id_setting='$_GET[id]'");
  }
  header('location:../../media_admin.php?module='.$module);
  mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM setting WHERE id_setting='$_GET[id]'");
  header('location:../../media_admin.php?module='.$module);
}

// Update produk
elseif ($module=='setting' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE setting SET keyword = '$_POST[keyword]',
                                  deskripsi= '$_POST[deskripsi]',
                                   twitter = '$_POST[twitter]',
                                   google= '$_POST[google]', 
                                   linkedin=  '$_POST[linkedin]',
                                    facebook ='$_POST[facebook]',  
                                   whatshap   = '$_POST[whatshap]',
                                     alamat  = '$_POST[alamat]', 
                                      paging_galeri  = '$_POST[paging_galeri]',  
                                      paging_prestasi   = '$_POST[paging_prestasi]',  
                                      paging_news = '$_POST[paging_news]',
                                        phone   = '$_POST[phone]',
                                          email   = '$_POST[email]'


                             WHERE id_setting   = '$_POST[id]'");
  header('location:../../media_admin.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/png" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media_admin.php?module=setting)</script>";
    }
    else{
    UploadLogo($nama_file_unik);
      mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE setting SET keyword = '$_POST[keyword]',
                                  deskripsi= '$_POST[deskripsi]',
                                  logo ='$nama_file_unik',
                                   twitter = '$_POST[twitter]',
                                   facebook ='$_POST[facebook]',
                                   google= '$_POST[google]', 
                                   linkedin=  '$_POST[linkedin]',  
                                   whatshap   = '$_POST[whatshap]',
                                     alamat  = '$_POST[alamat]', 
                                      paging_galeri  = '$_POST[paging_galeri]',  
                                      paging_prestasi   = '$_POST[paging_prestasi]',  
                                      paging_news = '$_POST[paging_news]',
                                        phone   = '$_POST[phone]',
                                          email   = '$_POST[email]'


                             WHERE id_setting   = '$_POST[id]'");
    
    header('location:../../media_admin.php?module='.$module);
    }
  }
}
}
?>
