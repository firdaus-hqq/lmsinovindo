<?php 
error_reporting(0); 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (!isset($_SESSION['siswa']) || empty($_SESSION['siswa'])) { 
header('location:../index.php');
} else {
$username=$_SESSION['siswa'];
}
