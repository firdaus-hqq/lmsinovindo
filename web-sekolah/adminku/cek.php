<?php 
// error_reporting(0); 
session_start(); 
if (!isset($_SESSION['idsiswa']) || empty($_SESSION['idsiswa'])) { 
echo '';
} else {
$username=$_SESSION['idsiswa'];
}
?>