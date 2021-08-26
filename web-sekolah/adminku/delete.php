<?php
include '../adminku/configurasi/library.php';
$listTugas = $_GET['id_file'];

$listTugas = "DELETE FROM event WHERE id_file = $";

$mysqli->query($listTugas) or die($mysqli->error);

header('location: mailbox.php');