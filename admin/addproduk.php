<?php

require_once 'koneksi.php';



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
								<input type="text" class="form-control" name="nmproduk" placeholder="Nama Produk">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name="item" placeholder="Item">

							</div>
						</div>

					</div>

					<div class="row justify-content-center">
						<div class="col-sm-7">

							<div class="form-group">
								<input type="number" class="form-control" name="harga" placeholder="Harga">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name="stok" placeholder="Stock">

							</div>
						</div>

					</div>

					<div class="row justify-content-center">
						<div class="col-sm-5">

							<div class="form-group">
								<select class="form-control" name="satuan">
									<option value="">--Pilih--</option>
									<option value="Pcs">Pcs</option>

								</select>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<input type="file" class="form-control" name="gambar" placeholder="Gambar Produk">

							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-sm-10">

							<div class="form-group">
								<textarea name="ket" id="" placeholder="Keterangan" class="form-control" cols="30" rows="5"></textarea>
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

	$nama = $_POST['nmproduk'];
	$item = $_POST['item'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$satuan = $_POST['satuan'];

	$lok = $_FILES['gambar']['name'];
	$gambar = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($gambar,"../gambar/" . $lok);

	$ket = $_POST['ket'];

	mysqli_query($koneksi, "INSERT INTO barang (br_nm,br_item,br_hrg,br_stok,br_satuan,br_gbr,ket) 
	VALUES ('$nama','$item','$harga','$stok','$satuan','$lok','$ket')");

echo "<script>alert('Produk Berhasil Ditambahkan');</script>";
echo "<script>location='index.php?page=produk';</script>";

}
?>