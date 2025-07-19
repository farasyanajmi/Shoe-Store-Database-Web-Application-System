<?php
$host = "localhost";
$user = "root";
$db = "toko_sepatu_neo_city";
$koneksi = mysqli_connect($host,$user,'',$db);
if($koneksi){
echo "Connected";
}else
{
echo "Failed";
}
?>