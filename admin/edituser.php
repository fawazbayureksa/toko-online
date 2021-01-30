<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_id = '$id' ");
$data = mysqli_fetch_assoc($sql)

?>  


<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Ubah User</h1>
<div class="row justify-content-center">
	<div class="col-sm-10">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Ubah</h6>
			</div>


			<div class="card-body">
				<form class="form" method="post">
					<div class="row ">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" autocomplete="off" name="username" value="<?=$data['username']?>" placeholder="Username">
							</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
								<input type="text" class="form-control" autocomplete="off" value="<?=$data['fullname']?>"  name="fullname" placeholder="Nama Lengkap">
							</div>
						</div>
    
					</div>

					<div class="row ">
						<div class="col-sm-6">

							<div class="form-group">
								<input type="password" class="form-control"  name="password" placeholder=" Masukkan Kata sandi Baru">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="password" class="form-control" name="stok" placeholder="Konfirmasi Kata sandi">

							</div>
						</div>

					</div>
				</form>
				<div class="row justify-content-center">
					<button class="btn btn-success btn-sm" type="submit"> <i class="fas fa-paper-plane"></i> Simpan</button>
				
					<a href="index.php?page=user" class="btn btn-danger btn-sm"> <i class="fas fa-sign-out-alt"></i>Batal</a>
				</div>
			</div>
		</div>
	</div>
</div>