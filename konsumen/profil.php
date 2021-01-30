<?php
require_once '../admin/koneksi.php';
$id = $_SESSION['user']['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id' ");
$data = mysqli_fetch_assoc($sql);




?>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card  border-left-info shadow py-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Profil Saya</h5>
            </div>
            <div class="card-body">
                <form action="" class="form-group" method="post">
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Username </th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><?= $data['nama_usr'] ?></td>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Nama Lengkap</th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><input class="form-control" value="<?= $data['nama'] ?>" type="text"></td>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>E-maill</th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><input class="form-control" value="<?= $data['email'] ?>" readonly type="text"></td>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Nomor Telepon</th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><input class="form-control" value="<?= $data['telp'] ?>" type="text"></td>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Jenis Kelamin</th>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">


                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="flexRadioDefault" <?php
                                                                                                            if ($data['gender'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            }
                                                                                                            ?>>
                                    <label class="form-check-label">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" <?php
                                                                                                            if ($data['gender'] == 2) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            }
                                                                                                            ?>>
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Tanggal Lahir</th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><input class="form-control" value="<?= $data['tgl_lahir'] ?>" type="date"></td>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-sm-2">
                            <th>Alamat</th>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <td><textarea class="form-control" value="" type="text"><?= $data['alamat'] ?></textarea></td>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success btn-sm" type="submit" name="ubah"><i class="fas fa-paper-plane"></i> Ubah Profil</button>
                        <a href="index.php?page=dashboard" class="btn btn-warning btn-sm"> <i class="fas fa-sign-out-alt"></i> Kembali </a>
                    </div>
            </div>
            
            </form>
        </div>
    </div>
</div>