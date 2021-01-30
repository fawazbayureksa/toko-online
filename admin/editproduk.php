<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id = '$id' ");
$data = mysqli_fetch_assoc($sql)

?>

<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tambah Produk</h1>
<div class="row justify-content-center">
	<div class="col-sm-10">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Tambah</h6>
			</div>
			<div class="card-body">
				<form class="form" method="post" enctype="multipart/form-data">
					<div class="row justify-content-center">
						<div class="col-sm-7">
							<div class="form-group">
								<input type="text" class="form-control" name="nmproduk" value="<?= $data['br_nm'] ?>" placeholder="Nama Produk">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name="item" value="<?= $data['br_item'] ?>" placeholder="Item">

							</div>
						</div>

					</div>

					<div class="row justify-content-center">
						<div class="col-sm-7">

							<div class="form-group">
								<input type="number" class="form-control" value="<?= $data['br_hrg'] ?>" name="harga" placeholder="Harga">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" value="<?= $data['br_stok'] ?>" name="stok" placeholder="Stock">

							</div>
						</div>

					</div>

					<div class="row justify-content-center">
						<div class="col-sm-3">
							<div class="form-group">
								<select class="form-control" name="satuan">
									<option value="<?= $data['br_satuan'] ?>"><?= $data['br_satuan'] ?></option>
									<option value="Pcs">Pcs</option>
								</select>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="form-group">
								<input type="file" class="form-control" name="gambar" placeholder="Gambar Produk">
								<img src="../gambar/<?= $data['br_gbr'] ?>" width="125px" alt="Baju">

							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-sm-7">

							<div class="form-group">
								<textarea name="ket" id="" placeholder="Keterangan" class="form-control" cols="30" rows="5"><?= $data['ket'] ?></textarea>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">

						<button class="btn btn-success btn-sm" name="simpan" type="submit"> <i class="fas fa-paper-plane"></i> Simpan</button>

						<a href="index.php?page=produk" class="btn btn-danger btn-sm"> <i class="fas fa-sign-out-alt"></i>Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php

if (isset($_POST['simpan'])) {

	$id = $_GET['id'];
	$nama = $_POST['nmproduk'];
	$item = $_POST['item'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$satuan = $_POST['satuan'];


	$ket = $_POST['ket'];

	if (empty($_FILES['gambar']['tmp_name'])) {

		mysqli_query($koneksi, "UPDATE barang SET br_nm='$nama',br_item='$item',br_hrg='$harga',br_stok='$stok',br_satuan='$satuan',ket='$ket' WHERE br_id = '$id'");

		echo "<script>alert('Produk Berhasil Diubah');</script>";
		echo "<script>location='index.php?page=produk';</script>";
	} else {

		$lok = $_FILES['gambar']['name'];
		$gambar = $_FILES['gambar']['tmp_name'];
		move_uploaded_file($gambar, "../gambar/" . $lok);

		mysqli_query($koneksi, "UPDATE barang SET br_nm='$nama',br_item='$item',br_hrg='$harga',br_stok='$stok',br_satuan='$satuan',br_gbr='$lok',ket='$ket' WHERE br_id = '$id'");

		echo "<script>alert('Produk Berhasil Diubah');</script>";
		echo "<script>location='index.php?page=produk';</script>";
	}
}


?>