<?php

require_once 'koneksi.php';

?>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container">

<h1 class="h3 mb-0 text-gray-800 text-center">Laporan Penjualan</h1>

<br>
<!-- <div class="text-right"><a href="cetaklaporan.php" onclick="window.print()" class="btn btn-info btn-sm"><i class="fas fa-print"></i>Cetak Laporan</a></div> -->
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

        $total = 0;


        $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user 
                    ON pembelian.id_pelanggan=user.id_user JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian
                    JOIN barang ON pembelian_produk.id_produk=barang.br_id");

        while ($data = mysqli_fetch_assoc($query)) {

        $total+=$data['total_pembelian'];

        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['tanggal_pembelian']; ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?php echo $data['status_pembelian']; ?></td>
                <td> Rp <?php echo  number_format($data['total_pembelian']); ?></td>
            </tr>

            <?php $no++;
        } ?>
            <th colspan="5">Total Penjualan</th>
            <td>Rp. <?=number_format($total)?></td>

    </tbody>
</table>
</div>

<script>
    window.print();
</script>