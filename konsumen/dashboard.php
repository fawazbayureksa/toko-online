<?php

require_once '../koneksi.php';


?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<br>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Semua Pesanan</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Dikirim</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Pesanan Diterima</a>
    </li>
</ul>

<div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <div class="row">
            <div class="col-sm-12">
                <?php

                $id = $_SESSION['user']['id_user'];

                $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user 
                    ON pembelian.id_pelanggan=user.id_user JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian
                    JOIN barang ON pembelian_produk.id_produk=barang.br_id
                    WHERE user.id_user='$id'");

                while ($data = mysqli_fetch_assoc($query)) {;

                    // print_r($data);
                ?>
                    <div class="card shadow py-2">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="../gambar/<?= $data['br_gbr'] ?>" width="150px" class="rounded float-start" alt="">
                                </div>
                                <div class="col-sm-6">
                                    <h4><?= $data['br_nm'] ?></h4>
                                </div>
                                <div class="col-sm-4">
                                    <td>Harga</td><br>
                                    <td>Rp .<?= number_format($data['br_hrg']) ?></td>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                </div>
                                <div class="col-sm-4">
                                    <td>Total Harga</td><br>
                                    <td>Rp .<?= number_format($data['total_pembelian']) ?></td>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div id="menu2" class="container tab-pane fade"><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow py-2">
                    <div class="card-body">
                        <h4>Kosong</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>