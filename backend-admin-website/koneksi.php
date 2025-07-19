<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "toko_sepatu_neo_city";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi){
    die("Koneksi dengan database gagal : " .mysqli_connect_errno(). " - " .mysqli_connect_error());
	}
?>