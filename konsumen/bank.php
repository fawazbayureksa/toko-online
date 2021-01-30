<?php
require_once '../admin/koneksi.php';
$id = $_SESSION['user']['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id' ");
$data = mysqli_fetch_assoc($sql)

?>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card  border-left-info shadow py-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Profil Saya</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-sm-2">
                        <th>Nama Bank</th>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <td><?= $data['bank'] ?></td>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-sm-2">
                        <th>No Rekening</th>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <td><input class="form-control" value="<?= $data['norek'] ?>" readonly type="text"></td>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-sm-2">
                        <th>Nama Rekening</th>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <td><input class="form-control" readonly value="<?= $data['namarek'] ?>" type="text"></td>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="index.php?page=profil" class="btn btn-warning btn-sm"><i class="fas fa-sign-out-alt"></i>Kembali</a>
            </div>
        </div>
    </div>
</div>