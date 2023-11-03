<?php 
date_default_timezone_set("ASIA/JAKARTA");

$server = "localhost";
$username ="root";
$password= "12345678";
$database= "dbpab";

$db=mysqli_connect($server, $username, $password, $database);

if (!$db) {
	die('Koneksi Databese Gagal : '.mysqli_connect_error());
}
?>