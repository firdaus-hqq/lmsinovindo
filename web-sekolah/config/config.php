<?php
define('MY_PATH', 'http://localhost/web-sekolah/');
$domain = "http://localhost/web-sekolah/";
$url_share = $domain.$_SERVER['REQUEST_URI'];
$server= "localhost";
$username="root";
$pass="";
$db="db_rpl";

($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $username, $pass)) or die('Gagal Koneksi');
mysqli_select_db($GLOBALS["___mysqli_ston"], $db) or die ('Database tidak ada');


$sql_setweb=mysqli_query($GLOBALS["___mysqli_ston"], "select * from setting");
$datasetweb=mysqli_fetch_array($sql_setweb);
$pagpres = strip_tags($datasetweb['paging_prestasi']);
$pagnews = strip_tags($datasetweb['paging_news']);
$paggal = strip_tags($datasetweb['paging_galeri']);
$deskripsi = strip_tags($datasetweb['deskripsi']);
$keyword= strip_tags($datasetweb['keyword']);
$logo = strip_tags($datasetweb['logo']);
$phone = strip_tags($datasetweb['phone']);
$email = strip_tags($datasetweb['email']);
$fb = strip_tags($datasetweb['facebook']);
$twitter = strip_tags($datasetweb['twitter']);
$linkedin = strip_tags($datasetweb['linkedin']);
$wa = strip_tags($datasetweb['whatshap']);
$google= strip_tags($datasetweb['google']);
$alamat = strip_tags($datasetweb['alamat']);



?>