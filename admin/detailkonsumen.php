<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id' ");
$data = mysqli_fetch_assoc($sql)

?>


</style>
<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Detail Konsumen</h1>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                    <p class="m-0 font-weight-bold text-primary">Informasi Pribadi</p>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Nama :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['nama'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Username :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['nama_usr'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>E-mail</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['email'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>No Telepon :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['telp'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Jenis Kelamin :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['gender'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Tanggal Lahir :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['tgl_lahir'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Alamat :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['alamat'] ?></td>
                    </div>
                </div>
            <p class="m-0 font-weight-bold text-primary">Informasi Bank</p>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Nama Bank :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['bank'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>No Rekening :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['norek'] ?></td>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <th>Nama Rekening :</th>
                    </div>
                    <div class="col-sm-5">
                        <td><?= $data['namarek'] ?></td>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="index.php?page=konsumen" class="btn btn-warning btn-sm"><i class="fas fa-sign-out-alt"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>