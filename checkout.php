<?php

session_start();
include 'koneksi.php';
if (!isset($_SESSION['user'])) {
	echo "<script>alert('Silahkan Login terlebih dahulu')</script>";
	echo "<script>location='konsumen/login.php';</script>";
}
if (empty($_SESSION["keranjang"])) {
	echo "<script>alert('Belum ada barang yang dipilih')</script>";
	echo "<script>location='index.php';</script>";
}


?>

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

	<header>

		<div class="container">

			<div class="row">

				<div class="logo span3">

					<a class="brand" href="#"><img src="img/depan.png" alt="Logo"></a>

				</div>

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
									<li><a href="produk.php">Produk Kami</a></li>
									<li><a href="testimoni.php">Testimoni</a></li>
									<li class="active"><a href="detail.php">Keranjang</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
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
			</div>
		</div>
	</header>
	<div id="page-title">
		<div id="page-title-inner">
			<div class="container">
				<h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>
			</div>
		</div>
	</div>
	<div id="wrapper">
		<div class="container">

			<div class="title">
				<h3>Detail Keranjang Belanja</h3>
			</div>
			<table class="table table-hover table-condensed">
				<tr>
					<th>
						<center>Nomor</center>
					</th>
					<!-- <th>
						<center>Kode Barang</center>
					</th> -->
					<th>
						<center>Nama Barang</center>
					</th>
					<th>
						<center>Harga Satuan</center>
					</th>
					<th>
						<center>Jumlah</center>
					</th>
					<th>
						<center>Sub Total</center>
					</th>

				</tr>
				<?php

				$total = 0;
				//mysql_select_db($database_conn, $conn);
				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
					// Menampilkan produk yang sedang diperulangkan berdasarkan id produk
					$query = mysqli_query($koneksi, "SELECT * FROM barang where br_id='$id_produk'");
					$data = mysqli_fetch_assoc($query);

					$jumlah_harga = $data['br_hrg'] * $jumlah;
					$total += $jumlah_harga;
					$no = 1;


				?>
					<tr>
						<td>
							<center><?php echo $no++; ?></center>
						</td>
						<!-- <td>
							<center><?php echo $data['br_id']; ?></center>
						</td> -->
						<td>
							<center><?php echo $data['br_nm']; ?></center>
						</td>
						<td>
							<center><?php echo number_format($data['br_hrg']); ?></center>
						</td>
						<td>
							<center><?php echo number_format($jumlah); ?></center>
						</td>
						<td>
							<center><?php echo number_format($jumlah_harga); ?></center>
						</td>

					</tr>
				<?php
				endforeach
				?>
				<?php
				if ($total == 0) {
					echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="index.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. ' . number_format($total, 2, ",", ".") . '</b></td></td></td><td></td></tr></table>
						<p>
						
					';
				}
				?>
			</table>
			<hr>
			<br>
			<div class="container">


				<form action="" method="post">
					<?php
					// print_r($_SESSION['user'])
					?>
					<div class="form-row">

						<input type="text" style="margin-right: 10px;" readonly value="<?= $_SESSION['user']['nama'] ?>">

						<input type="email" style="margin-right: 10px;" readonly value="<?= $_SESSION['user']['email'] ?>">

						<input type="tel" style="margin-right: 10px;" readonly value="<?= $_SESSION['user']['telp'] ?>">

						<select name="kurir" id="">
							<option value="">--Pilih Jasa Pengiriman--</option>
							<?php
							$kurir = mysqli_query($koneksi, "SELECT * FROM ongkir");
							while ($x = mysqli_fetch_assoc($kurir)) {

							?>
								<option value="<?= $x['id_kurir'] ?>"><?= $x['jasakurir'] ?> - Rp. <?= number_format($x['tarif']) ?></option>

							<?php
							}
							?>
						</select>

						<textarea name="alamat" id="" style="width:72%" rows="3"><?= $_SESSION['user']['alamat'] ?></textarea>
						<i style="color: red;">*Isikan sesuai alamat lengkap pengiriman</i>
					</div>
					<div align="right">
						<button type="submit" name="pesan" class="btn btn-success">&laquo; Pesan Sekarang</a>
					</div>
				</form>
				<!-- <pre><?php print_r($_SESSION['keranjang']);
						print_r($_SESSION['user']);
						?>
							
				</pre> -->

				<?php

				if (isset($_POST['pesan'])) {

					$id = $_SESSION['user']['id_user'];
					$id_kurir = $_POST['kurir'];
					$tanggalbeli = date("Y-m-d");

					//mendapatkakn tarif jasa kurir
					$tarifongkir = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_kurir = '$id_kurir' ");
					$ongkir = mysqli_fetch_assoc($tarifongkir);
					$tarif = $ongkir['tarif'];

					$alamat = $_POST['alamat'];

					$totalbelanja = $jumlah_harga + $tarif;


					mysqli_query($koneksi, "INSERT INTO pembelian (id_pelanggan,id_kurir,tanggal_pembelian,total_pembelian,alamat_lengkap) VALUES ('$id','$id_kurir','$tanggalbeli','$totalbelanja','$alamat') ");
					
					$id_pembelianbarusan = $koneksi->insert_id;

					  // foreach ($_SESSION["keranjang"] as $id=>$value):
						foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
							// Menampilkan produk yang sedang diperulangkan berdasarkan id produk
							$query = mysqli_query($koneksi, "SELECT * FROM barang where br_id='$id_produk'");
							$data = mysqli_fetch_assoc($query);
							$nama = $data['br_nm'];
							$harga = $data['br_hrg'];
							$subharga = $data['br_hrg'] * $jumlah;
							
							mysqli_query($koneksi, "INSERT INTO pembelian_produk
							(id_pembelian,id_produk,jumlah,nama,harga,subharga)   
							VALUES ('$id_pembelianbarusan','$id_produk','$jumlah','$nama','$harga','$subharga')");
						}
						$br_stok = $data['br_stok'] - $jumlah;


						mysqli_query($koneksi,"UPDATE barang SET br_stok = '$br_stok' WHERE br_id = '$id_produk'");
						

						//kosongkan keranjang
						unset($_SESSION["keranjang"]);
			
						echo "<script>alert('Pembelian berhasil');</script>";
						echo "<script>location='nota.php?id=$id_pembelianbarusan';</script>";

						

				}



				?>


			</div>




		</div>
	</div>
	<div id="footer-menu" class="hidden-tablet hidden-phone">
		<div class="container">
			<div class="row">
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo-footer-menu.png" alt="logo" /></a>
					</div>
				</div>

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

				<div class="span1">

					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					<h3>Tentang Aimhi Shop</h3>
					<p>
						Aimhi Shop adalah toko online yang bergerak di bidang fashion, sasaran kami semua kalangan baik muda maupun tua, mulai dari anak - anak dan orang dewasa.
					</p>
				</div>
				<div class="span3">
					<h3>Alamat Kami</h3>
					Jl. M. Ali dg. Gassing No.112, Kec. Binamu, Kab. Jeneponto, Kode Pos 92311<br />
					Telp : 085694984803<br />
					Email : <a href="mailto:ainulkw2@gmail.com">Ainul</a> / <a href="mailto:ainulmimiselamanya@gmail.com">Mimi</a>
				</div>
				<div class="span6">
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
				</div>

			</div>


		</div>

	</div>
	<div id="copyright">
		<div class="container">

			<p>
				Copyright &copy; <a href="http://www.niqoweb.com">Aimhi Shop 2020</a> <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster
			</p>

		</div>
	</div>
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/flexslider.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/jquery.cslider.js"></script>
	<script src="js/slider.js"></script>
	<script def src="js/custom.js"></script>

	<script src="jquery.validate.js"></script>
	<script>
		$(document).ready(function() {
			$("#formku").validate();
		});
	</script>

	<style type="text/css">
		label.error {
			color: red;
			padding-left: .5em;
		}
	</style>
	<!-- end: Java Script -->

</body>

</html>