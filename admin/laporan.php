<?php

require_once 'koneksi.php';

?>

<h1 class="h3 mb-0 text-gray-800 text-center">Laporan Penjualan</h1>

<br>
<div class="text-right"><a href="cetaklaporan.php" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Cetak Laporan</a></div>
<hr>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama </th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>

        </tr>
    </thead>
    <tbody>
        <div class="row justify-content-start">
            <div class="col-sm-3">
                <form action="" method="get">
                    <div class="form-group">
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </form>
            </div>
        </div>
        <?php
        $no = 1;
        // pelanggan yang login



        $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user 
                    ON pembelian.id_pelanggan=user.id_user JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian
                    JOIN barang ON pembelian_produk.id_produk=barang.br_id");

        while ($data = mysqli_fetch_assoc($query)) {

        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['tanggal_pembelian']; ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?php echo $data['status_pembelian']; ?></td>
                <td> Rp <?php echo  number_format($data['total_pembelian']); ?></td>


                <td><a href="index.php?page=pembayaran&id=<?= $data['id_pembelian'] ?>" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i> Pembayaran</a></td>



            <?php $no++;
        } ?>
            </tr>

    </tbody>
</table>