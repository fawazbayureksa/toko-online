<?php require_once 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aimi Shop - Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="namauser" class="form-control form-control-user" id="exampleLastName" placeholder="User name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="tel" name="telp" class="form-control form-control-user" id="" placeholder="No Telepon">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="" name="pass" placeholder=" Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="gender" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control form-control-user" id="" name="tanggal" placeholder=" Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="alamat" class="form-control form-control-user" placeholder="Alamat .."> </textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="namarek" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama di Rekening">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="bank" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Bank">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="norek" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nomor Rekening">
                                </div>
                                <button type="submit" name="daftar" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>

                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="konsumen/login.php">Sudah Memiliki Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>


<?php

if (isset($_POST['daftar'])) {

    $nama = $_POST['nama'];
    $user = $_POST['namauser'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $tgl = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $namarek = $_POST['namarek'];
    $bank = $_POST['bank'];
    $norek = $_POST['norek'];

    mysqli_query($koneksi, "INSERT INTO user (nama,nama_usr,email,telp,pass,gender,tgl_lahir,alamat,bank,norek,namarek)
    VALUES ('$nama','$user','$email','$telp','$pass','$gender','$tgl','$alamat','$bank','$norek','$namarek')");

    echo "<script>alert('Daftar Akun Berhasil');</script>";
    echo "<script>location='konsumen/login.php';</script>";
}


?>