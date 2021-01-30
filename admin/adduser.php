<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tambah User</h1>
<div class="row justify-content-center">
	<div class="col-sm-10">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Tambah</h6>
			</div>


			<div class="card-body">
				<form class="form" method="post">
					<div class="row ">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username">
							</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
								<input type="text" class="form-control" autocomplete="off" name="fullname" placeholder="Nama Lengkap">
							</div>
						</div>
    
					</div>

					<div class="row ">
						<div class="col-sm-6">

							<div class="form-group">
								<input type="password" class="form-control"  name="password" placeholder="Kata sandi">
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