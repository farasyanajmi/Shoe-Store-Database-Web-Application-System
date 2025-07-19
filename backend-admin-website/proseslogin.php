<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $level=$_POST['level'];   
   $sql = "SELECT * FROM user WHERE username = '$username'";
   $query = $koneksi->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'><<h1>Username Anda  Belum Terdaftar!!! <a href='login.php'>Back?</a></h1></div></font>";
   } else {
     if($pass <> $hasil['password']){
       echo "<div align='center'><h1>Password yang anda masukkan salah!! <a href='login.php'>Back?</a></div>";
     } else {
	 $_SESSION['username'] = $hasil['username'];
	   if($level=='admin')
	   {header('location:admin.php');}
	      else
	      	      	 header('location:login(1).php');
   }}
?>