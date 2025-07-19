<?php
session_start();

$id_sepatu = $_GET["id"];
unset($_SESSION["cart"][$id_sepatu]);

echo "<script>alert('Barang Terhapus dari Keranjang');</script>";
echo "<script>location='cart.php?halaman=cart';</script>";
?>