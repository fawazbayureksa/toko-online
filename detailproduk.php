<?php require_once("koneksi.php");



if (!isset($_SESSION)) {
	session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Aimhi Shop | Toko Baju Online telengkap dan terpercaya di Dunia</title>
	<meta name="description" content="Toko Baju, Dunia, Terlengkap, Informasi, Teknologi, Baru, Murah, Berkualitas" />
	<meta name="keywords" content="Kaos, Murah, Dunia, Baru, Terlengkap, Harga, Terjangkau" />
	<meta name="author" content="Ainul Mimi" />
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<!-- end: Facebook Open Graph -->

	<!-- start: CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

	<!--start: Header -->
	<header>

		<!--start: Container -->
		<div class="container">

			<!--start: Row -->
			<div class="row">

				<!--start: Logo -->
				<div class="logo span3">

					<a class="brand" href="#"><img src="img/depan.png" alt="Logo"></a>

				</div>
				<!--end: Logo -->

				<!--start: Navigation -->
				<div class="span9">

					<div class="navbar navbar-inverse">
						<div class="navbar-inner">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li><a href="index.php">Beranda</a></li>
									<li class="active"><a href="produk.php">Produk Kami</a></li>
									<li><a href="testimoni.php">Testimoni</a></li>
									<li><a href="detail.php">Keranjang</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Masuk / Daftar <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="index.html">Admin</a></li>
											<li><a href="index.php">Konsumen</a></li>
											<!--<li class="divider"></li>
			                  				<li class="nav-header">Nav header</li>
			                  				<li><a href="#">Separated link</a></li>
			                  				<li><a href="#">One more separated link</a></li>-->
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<!--end: Navigation -->

			</div>
			<!--end: Row -->

		</div>
		<!--end: Container-->

	</header>
	<!--end: Header-->

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Detail Produk</h2>

			</div>
			<!-- end: Container  -->

		</div>

	</div>
	<!-- end: Page Title -->

	<!--start: Wrapper-->
	<div id="wrapper">

		<!--start: Container -->
		<div class="container">


			<?php
			$id_produk=$_GET['kd'];
			$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$id_produk'");
			$data  = mysqli_fetch_array($query);

			include 'detailbarang.php';

			if (isset($_POST['beli'])) {
				//Get jumlah input
				$jumlah = $_POST['max'];
				//masukkan ke session keranjang
				$_SESSION['keranjang'][$id_produk] = $jumlah;

				echo "<script>alert('Produk Dimasukkan Ke Keranjang');</script>";
				echo "<script>location='detail.php';</script>";
			}


			?>


		</div>
	</div>


	</div>
	<!--end: Container-->

	<!--start: Container -->
	<div class="container">

		<hr>

		<!-- start Clients List -->
		<div class="clients-carousel">

			<ul class="slides clients">
				<li><img src="img/logo/3second.jpg" alt="" /></li>
				<li><img src="img/logo/nn.jpg" alt="" /></li>
				<li><img src="img/logo/greenlight.jpg" alt="" /></li>
				<li><img src="img/logo/screamous.jpg" alt="" /></li>
				<li><img src="img/logo/chambers.jpg" alt="" /></li>
				<li><img src="img/logo/420.jpg" alt="" /></li>
				<li><img src="img/logo/cibola.jpg" alt="" /></li>
				<li><img src="img/logo/woles.jpg" alt="" /></li>
				<li><img src="img/logo/artwear.jpg" alt="" /></li>
				<li><img src="img/logo/diery.jpg" alt="" /></li>
			</ul>

		</div>
		<!-- end Clients List -->

		<hr>

	</div>
	<!--end: Container-->

	</div>
	<!-- end: Wrapper  -->

	<!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">

			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo-footer-menu.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">

					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Kemeja</a></li>

							<li><a href="#">Kaos</a></li>

							<li><a href="#">Sweater</a></li>

							<li><a href="#">Jacket</a></li>

							<li><a href="#">Pants & Jeans</a></li>

						</ul>

					</div>

				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">

					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>

				</div>
				<!-- end: Footer Menu Back To Top -->

			</div>
			<!-- end: Row -->

		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">

		<!-- start: Container -->
		<div class="container">

			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">

					<h3>Tentang Aimhi Shop</h3>
					<p>
						Aimhi Shop adalah toko online yang bergerak di bidang fashion, sasaran kami semua kalangan baik muda maupun tua, mulai dari anak - anak dan orang dewasa.
					</p>

				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="span3">

					<h3>Alamat Kami</h3>
					Jl. M. Ali dg. Gassing No.112, Kec. Binamu, Kab. Jeneponto, Kode Pos 92311<br />
					Telp : 085694984803<br />
					Email : <a href="mailto:ainulkw2@gmail.com">Ainul</a> / <a href="mailto:ainulmimiselamanya@gmail.com">Mimi</a>
				</div>
				<!-- end: Photo Stream -->

				<div class="span6">

					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->

					<!-- start: Newsletter -->
					<!--	<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> -->
					<!-- end: Newsletter -->

				</div>

			</div>
			<!-- end: Row -->

		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">

		<!-- start: Container -->
		<div class="container">

			<p>
				Copyright &copy; <a href="http://www.niqoweb.com">Aimhi Shop 2020</a> <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster
			</p>

		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Copyright -->

	<!-- start: Java Script -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/flexslider.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/jquery.cslider.js"></script>
	<script src="js/slider.js"></script>
	<script def src="js/custom.js"></script>
	<!-- end: Java Script -->

</body>

</html>