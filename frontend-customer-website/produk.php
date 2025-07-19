<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "toko_sepatu_neo_city";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$merk = "";
$model = "";
$jenis = "";
$ukuran = "";
$warna = "";
$strq = "";
$strw = "";
$jmlget = 0;

    if(isset($_GET['merk'])){
      $merk = $_GET['merk'];
      $strc[] = "id_merk = '$merk'";
      $jmlget++;
    }
    if(isset($_GET['model'])){
      $model = $_GET['model'];
      $strc[] = "id_model = '$model'";
      $jmlget++;
    }
    if(isset($_GET['jenis'])){
      $jenis = $_GET['jenis'];
      $strc[] = "id_jenis = '$jenis'";
      $jmlget++;
    }
    if(isset($_GET['ukuran'])){
      $ukuran = $_GET['ukuran'];
      $strc[] = "id_ukuran = '$ukuran'";
      $jmlget++;
    }
    if(isset($_GET['warna'])){
      $warna = $_GET['warna'];
      $strc[] = "id_warna = '$warna'";
      $jmlget++;
    }
    // susun string
    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    $query = "SELECT * FROM sepatu
    $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_merk  = "SELECT * FROM merk_sepatu";
    $result_merk = mysqli_query($koneksi,$query_merk);

    $query_model  = "SELECT * FROM model_sepatu";
    $result_model = mysqli_query($koneksi,$query_model);

    $query_jenis  = "SELECT * FROM jenis_sepatu";
    $result_jenis = mysqli_query($koneksi,$query_jenis);

    $query_uku  = "SELECT * FROM ukuran_sepatu";
    $result_uku = mysqli_query($koneksi,$query_uku);

    $query_warna  = "SELECT * FROM warna_sepatu";
    $result_warna = mysqli_query($koneksi,$query_warna);

    $title = "All Product Neo City";
    
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
			                  <input type="text" class="form-control search" placeholder="Search" name="keyword">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
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

	<div class="row">
      <div class="col" style="background-color:#B2DFDB">
		<h3 class="text-center mt-3">What Are You Looking For?</h3>
        <p class="lead text-left">Search By :</p>
        <form action="produk.php" method="GET">
          <div class="row">
            <div class="col-sm">

              <p>Merk : </p>
              <p>
                <select name="merk" class="form-control">
                  <option selected disabled>-- Merk --</option>
                  <?php while($row = mysqli_fetch_assoc($result_merk)) { ?>
                  <option value="<?= $row['id_merk'];?>"><?= $row['nama_merk'];?></option>
                  <?php } ?>
                </select>
              </p>
            </div>

            <div class="col-sm">
              <p>Model : </p>
              <p>
                <select name="model" class="form-control">
                  <option selected disabled>-- Model --</option>
                  <?php while($row = mysqli_fetch_assoc($result_model)) { ?>
                  <option value="<?= $row['id_model'];?>"><?= $row['nama_model'];?></option>
                  <?php } ?>
                </select>
              </p>
            </div>

            <div class="col-sm">
              <p>Type : </p>
              <p>
                <select name="jenis" class="form-control">
                  <option selected disabled>-- Type --</option>
                  <?php while($row = mysqli_fetch_assoc($result_jenis)) { ?>
                  <option value="<?= $row['id_jenis'];?>"><?= $row['nama_jenis'];?></option>
                  <?php } ?>
                </select>
              </p>
            </div>

          <div class="col-sm">
              <p>Size : </p>
              <p>
                <select name="ukuran" class="form-control">
                  <option selected disabled>-- Size --</option>
                  <?php while($row = mysqli_fetch_assoc($result_uku)) { ?>
                  <option value="<?= $row['id_ukuran'];?>"><?= $row['jenis_ukuran'];?></option>
                  <?php } ?>
                </select>
              </p>
            </div>

            <div class="col-sm">
              <p>Color : </p>
              <p>
                <select name="warna" class="form-control">
                  <option selected disabled>-- Color --</option>
                  <?php while($row = mysqli_fetch_assoc($result_warna)) { ?>
                  <option value="<?= $row['id_warna'];?>"><?= $row['jenis_warna'];?></option>
                  <?php } ?>
                </select>
              </p>
            </div>
          </div>
          
          <div clas="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
            </div>
          </div>
          
          <?php if($resnum == 0){ ?>
          <div clas="row">
            <div class="col-sm">
              <p>Oops! Not Available :(</p>
            </div>
          </div>
          <?php } ?>
        </form>
    </div>
</div>
<!-- konten -->
<section class="konten">
	<div class="container">
		<div style="color:white">
		<h1>All Product</h1>
	</div>
		<div class="row">

			 <?php while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="../gambar_produk/<?php echo $row['gambar_sepatu']; ?>" width="200">
					<div class="caption">
						<h3><?php echo $row['nama_sepatu']; ?></h3>
						<h5>Rp. <?php echo number_format($row['harga']); ?> </h5>
						<a href="beli.php?id=<?php echo $row['id_sepatu']; ?>" class="btn btn-primary">Beli</a>
						<a href="product-detail.php?id=<?php echo $row["id_sepatu"]; ?>" class="btn btn-default">Detail</a>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
	

</section>
							

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
