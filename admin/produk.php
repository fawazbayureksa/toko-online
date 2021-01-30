<?php

require_once 'koneksi.php';
?>
<style type="text/css">
    .td {
        font-size: 14px;
    }

    .th {
        font-size: 15px;
    }
</style>
<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Produk</h1>
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row justify-content-end">
            <a href="index.php?page=tambah-produk" class="btn btn-primary "><i class="fas fa-plus"></i> Tambah Produk</a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Item</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Gambar</th>
                        <th>Ket</th>
                        <th>Status</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id DESC");

                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['br_nm'] ?></td>
                            <td><?= $data['br_item'] ?></td>
                            <td>Rp. <?= number_format($data['br_hrg']) ?></td>
                            <td><?= $data['br_stok'] ?></td>
                            <td><?= $data['br_satuan'] ?></td>
                            <td><img src="../gambar/<?= $data['br_gbr'] ?>" class="rounded float-start" width="125px"></td>
                            <td><?= $data['ket'] ?></td>
                            <td><?php if ($data['br_stok'] >= 1) {

                                    echo '<strong style="color: blue;">In Stock</strong>';
                                } else {
                                    echo '<strong style="color: red;">Out Of Stock</strong>';
                                };
                                ?>
                            </td>
                            <td>
                                <a href="index.php?page=ubah-produk&id=<?= $data['br_id']?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                <a href="index.php?page=hapus-produk&id=<?=$data['br_id']?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>