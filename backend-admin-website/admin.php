<?php 
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "toko_sepatu_neo_city";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!isset($_SESSION['username']))
{
	echo "<script>alert ('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login(1).php';</script";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Sepatu Neo City</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="index.php">Toko Sepatu Neo City</a>
			</div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Admin &nbsp; <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> 
</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/neocity.png" class="user-image img-responsive"/>
					</li>
				
			<li> <a href="admin.php"><h4>DASHBOARD</h4></a></li>

          <li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active"><i class="fa fa-laptop fa-3x"></i>MASTER DATA</a>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=pembeli" class="nav-link active">
								<b class="fa fa-user fa-1x"> Pembeli</b>
							</a>
						</li>
						</ul>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=merk sepatu" class="nav-link active">
								<b class="fa fa-folder fa-1x"> Merk Sepatu</b>
							</a>
						</li>
						</ul>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=jenis sepatu" class="nav-link active">
								<b class="fa fa-folder fa-1x"> Jenis Sepatu</b>
							</a>
						</li>
						</ul>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=model sepatu" class="nav-link active">
								<b class="fa fa-folder fa-1x"> Model Sepatu</b>
							</a>
						</li>
						</ul>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=warna sepatu" class="nav-link active">
								<b class="fa fa-folder fa-1x"> Warna Sepatu</b>
							</a>
						</li>
						</ul>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=ukuran sepatu" class="nav-link active">
								<b class="fa fa-folder fa-1x"> Ukuran Sepatu</b>
							</a>
						</li>
						</ul>
						
		  <li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active"><i class="fa fa-star fa-3x"></i>SEPATU</a>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=detail sepatu" class="nav-link active">
								<b class="fa fa-info-circle fa-1x"> Detail Sepatu</b>
							</a>
						</li>
						</ul>
						
		 	<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active"><i class="fa fa-barcode fa-3x"></i>FAKTUR</a>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=faktur" class="nav-link active">
								<b class="fa fa-info-circle fa-1x"> Detail Faktur</b>
							</a>
						</li>
						</ul>

			<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active"><i class="fa fa-archive fa-3x"></i>LAPORAN</a>
						
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="?page=laporan pembelian" class="nav-link active">
								<b class="fa fa-info-circle fa-1x"> Laporan Pembelian</b>
							</a>
						</li>
						</ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     
          
                     <?php
            
            $page = @$_GET['page'];
            $aksi = @$_GET['aksi'];
            
            
            if($page == "pembeli"){
              if($aksi == ""){
                include "page/pembeli/pembeli.php";
              }
              else if($aksi == "tambah"){
                include "page/pembeli/tambahpembeli.php";
              }
              else if($aksi == "ubah"){
                include "page/pembeli/ubahpembeli.php";
              }
              else if($aksi == "hapus"){
                include "page/pembeli/hapuspembeli.php";
              }
            }

            if($page == "merk sepatu"){
              if($aksi == ""){
                include "page/merk sepatu/merksepatu.php";
              }
              else if($aksi == "tambah"){
                include "page/merk sepatu/tambahmerksepatu.php";
              }
              else if($aksi == "ubah"){
                include "page/merk sepatu/ubahmerksepatu.php";
              }
              else if($aksi == "hapus"){
                include "page/merk sepatu/hapusmerksepatu.php";
              }
            }

            if($page == "jenis sepatu"){
              if($aksi == ""){
                include "page/jenis sepatu/jenissepatu.php";
              }
              else if($aksi == "tambah"){
                include "page/jenis sepatu/tambahjenissepatu.php";
              }
              else if($aksi == "ubah"){
                include "page/jenis sepatu/ubahjenissepatu.php";
              }
              else if($aksi == "hapus"){
                include "page/jenis sepatu/hapusjenissepatu.php";
              }
            }
            if($page == "model sepatu"){
              if($aksi == ""){
                include "page/model sepatu/modelsepatu.php";
              }
              else if($aksi == "tambah"){
                include "page/model sepatu/tambahmodelsepatu.php";
              }
              else if($aksi == "ubah"){
                include "page/model sepatu/ubahmodelsepatu.php";
              }
              else if($aksi == "hapus"){
                include "page/model sepatu/hapusmodelsepatu.php";
              }
            }
			if($page == "warna sepatu"){
              if($aksi == ""){
                include "page/warna sepatu/warnasepatu.php";
              }
              else if($aksi == "tambah"){
                include "page/warna sepatu/tambahwarnasepatu.php";
              }
              else if($aksi == "ubah"){
                include "page/warna sepatu/ubahwarnasepatu.php";
              }
              else if($aksi == "hapus"){
                include "page/warna sepatu/hapuswarnasepatu.php";
              }
            }
			if($page == "ukuran sepatu"){
              if($aksi == ""){
                include "page/ukuran sepatu/ukuransepatu.php";
              }
              else if($aksi == "tambah"){
                include "page/ukuran sepatu/tambahukuransepatu.php";
              }
              else if($aksi == "ubah"){
                include "page/ukuran sepatu/ubahukuransepatu.php";
              }
              else if($aksi == "hapus"){
                include "page/ukuran sepatu/hapusukuransepatu.php";
              }
            }
            if($page == "faktur"){
              if($aksi == ""){
                include "page1/faktur/faktur.php";
              }
			  else if($aksi == "tambah"){
                include "page1/faktur/tambahfaktur.php";
              }
              else if($aksi == "detail"){
                include "page1/faktur/detailfaktur.php";
              }
              else if($aksi == "lihatpembayaran"){
                include "page1/faktur/detailpembayaran.php";
              }
              else if($aksi == "ubah"){
                include "page1/faktur/ubahfaktur.php";
              }
              else if($aksi == "hapus"){
                include "page1/faktur/hapusfaktur.php";
              }
            }
            if($page == "detail ukuran warna sepatu"){
              if($aksi == ""){
                include "page1/detail ukuran warna sepatu/detailukuranwarnasepatu.php";
              }
              else if($aksi == "tambah"){
                include "page1/detail ukuran warna sepatu/tambahdetailukuranwarnasepatu.php";
              }
			  else if($aksi == "ubah"){
                include "page1/detail ukuran warna sepatu/ubahdetailukuranwarnasepatu.php";
			  }
              else if($aksi == "hapus"){
                include "page1/detail ukuran warna sepatu/hapusdetailukuranwarnasepatu.php";
              }
            }
			if($page == "detail sepatu"){
              if($aksi == ""){
                include "page1/detail sepatu/detailsepatu.php";
              }
              else if($aksi == "tambah"){
                include "page1/detail sepatu/tambahdetailsepatu.php";
              }
			  else if($aksi == "ubah"){
                include "page1/detail sepatu/ubahdetailsepatu.php";
              }
              else if($aksi == "hapus"){
                include "page1/detail sepatu/hapusdetailsepatu.php";
              }
            }
			if($page == "detail transaksi"){
              if($aksi == ""){
                include "page1/detail transaksi/detailtransaksi.php";
              }
              else if($aksi == "tambah"){
                include "page1/detail transaksi/tambahdetailtransaksi.php";
              }
			  else if($aksi == "ubah"){
                include "page1/detail transaksi/ubahdetailtransaksi.php";
              }
              else if($aksi == "hapus"){
                include "page1/detail transaksi/hapusdetailtransaksi.php";
              }
            }
            if($page == "laporan pembelian"){
              if($aksi == ""){
                include "page/laporan/laporanpembelian.php";
              }
            }
            if($page == "laporan produk"){
              if($aksi == ""){
                include "page/laporan/laporanproduk.php";
              }
            }

            
                
           ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
  
  
      <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    
   
</body>
</html>
