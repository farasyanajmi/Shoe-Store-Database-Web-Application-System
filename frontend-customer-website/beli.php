<?php
session_start();
$id_sepatu = $_GET["id"];

if(isset($_SESSION['cart'][$id_sepatu]))
{

	$_SESSION['cart'][$id_sepatu]+=1;

}
else
{
	$_SESSION['cart'][$id_sepatu]=1;
}
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='cart.php';</script>";

?>