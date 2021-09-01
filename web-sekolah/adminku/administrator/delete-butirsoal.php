<?php
include '../../config/config.php';

$id	= $_GET["id"];

if($delete = mysqli_query ($mysqli, "DELETE FROM soal WHERE id='$id'")){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($mysqli));

?>
