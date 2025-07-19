<?php 
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "toko_sepatu_neo_city";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$id_sepatu=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM sepatu INNER JOIN ukuran_sepatu
										ON sepatu.id_ukuran = ukuran_sepatu.id_ukuran
									 INNER JOIN warna_sepatu
										ON sepatu.id_warna = warna_sepatu.id_warna
										INNER JOIN merk_sepatu
										ON sepatu.id_merk = merk_sepatu.id_merk
										INNER JOIN model_sepatu
										ON sepatu.id_model = model_sepatu.id_model
										INNER JOIN jenis_sepatu
										ON sepatu.id_jenis = jenis_sepatu.id_jenis
										WHERE id_sepatu='$id_sepatu'");

$detail=$ambil->fetch_assoc();
?>



<!DOCTYPE HTML>
<html>
	<head>
	<title>NEO CITY</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php">Neo City</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="pencarian.php" method="get" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search" name="keyword">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li ><a href="index.php">Home</a></li>
								<li class="active"><a href="produk.php">All Product</a></li>
								<?php if (isset($_SESSION['pembeli'])): ?>
									<li><a href="logout.php">Log Out</a></li>
									<li><a href="riwayat.php">Shopping History</a></li>
								<?php else: ?>
								<li><a href="http://localhost/toko_sepatu_neo_city/login/signin.php">Log in</a></li>
							<?php endif?>
								<li class="cart"><a href="cart.php"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">SELAMAT DATANG DI TOKO SEPATU NEO CITY</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">This Is The NEO Era !</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span><a href="produk.php">Product</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						<div class="owl-carousel">
							<div class="item">
								<div class="product-entry border">
										<img src="../gambar_produk/<?php echo $detail["gambar_sepatu"];?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
								</div>
							</div>
							<div class="item">
								<div class="product-entry border">
										<img src="../gambar_produk/<?php echo $detail["gambar_sepatu"];?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3><?php echo $detail["nama_sepatu"]?></h3>
							<p class="price">
								<span>Rp. <?php echo number_format($detail["harga"]);?></span>
							</p>
							<h3>UKURAN = <?php echo $detail['jenis_ukuran'] ?></h3>
							<h3>WARNA = <?php echo $detail['jenis_warna'] ?></h3>
							<h3>MERK = <?php echo $detail['nama_merk'] ?></h3>
							<h3>MODEL = <?php echo $detail['nama_model'] ?></h3>
							<h3>JENIS = <?php echo $detail['nama_jenis'] ?></h3>
							<h3>STOK = <?php echo $detail['stok'] ?></h3>

					<form method="post">
						<div class="form-group">
							<div class="input-group">
                     	<input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $detail['stok']?>">
                     	<div class ="input-group-btn">
                     		<button class="btn btn-primary btn-addtocart" name="beli">Add To Cart</button>
                  	</div>
                  </div>
              </div>
              </form>
				<?php 
				if(isset($_POST["beli"]))
				{
					$jumlah=$_POST["quantity"];
					$_SESSION["cart"][$id_sepatu]=$jumlah;

					echo "<script>alert('Produk Telah Berhasil Masuk Ke Keranjang');</script>";
					echo "<script>location='cart.php';</script>";
				}
				?>
		</div>
	</div>
</div>
</div>
</div>
								

		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/logo-skechers.png" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
   <!-- popper -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
