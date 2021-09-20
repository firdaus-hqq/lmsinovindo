<?php
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$connect = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', ''));
if (!$connect) {
die('Could not connect to mysql: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//nama database
$cid =mysqli_select_db($connect, 'db_rpl');

file_put_contents(
    'soal.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool_v6/syncron/soal.zip' )
);



$zip = new ZipArchive;
$zip->open('soal.zip');
$zip->extractTo('./');
$zip->close();
// Name of the file
$filename = 'soal.sql';
// mysql host
$mysql_host = 'localhost';
// mysql username
$mysql_username = 'root';
// mysql password
$mysql_password = '';
// Database name
$mysql_database = 'db_rpl';

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

unlink('soal.zip');
unlink('soal.sql');
header("location:syncron_progress4.php");
exit();
?>