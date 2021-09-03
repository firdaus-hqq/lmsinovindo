<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost',  'root',  ''));
mysqli_select_db($GLOBALS["___mysqli_ston"], 'db_rpl');
?>