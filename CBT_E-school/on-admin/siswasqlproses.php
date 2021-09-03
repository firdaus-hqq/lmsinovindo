<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$connect = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', ''));
if (!$connect) {
die('Could not connect to mysql: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//nama database
$cid =mysqli_select_db($connect, 'cbt');



$zip = new ZipArchive;
$zip->open('siswa.zip');
$zip->extractTo('./');
$zip->close();
// Name of the file
$filename = 'siswa.sql';
// mysql host
$mysql_host = 'localhost';
// mysql username
$mysql_username = 'root';
// mysql password
$mysql_password = '';
// Database name
$mysql_database = 'cbt';

// Connect to mysql server
$con = @new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);

// Check connection
if ($con->connect_errno) {
    echo "Failed to connect to mysql: " . $con->connect_errno;
    echo "<br/>Error: " . $con->connect_error;
}

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line) {
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        $con->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";

unlink('siswa.zip');
unlink('siswa.sql');
header("location:syncupload.php?pesan=sukses");
exit();
?>