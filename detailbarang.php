<?php





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aimhi Shop | Toko Baju Online telengkap dan terpercaya di Dunia</title>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body>

    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-shadow py-2">
                <div class="card-header">
                    <h3>Detail Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="gambar/<?= $data['br_gbr'] ?>" class="img-rounded" width="400px" alt="baju">
                        </div>
                        <div class="col-sm-7">
                            <th>Nama Produk:</th>
                            <td><?= $data['br_nm'] ?></td>
                            <br>
                            <th>Item :</th>
                            <td><?= $data['br_item'] ?></td>
                            <br>
                            <th">Stok :</th>
                                <td><?= $data['br_stok'] ?></td>
                                <br>
                                <th>Harga :</th>
                                <td>Rp. <?= number_format($data['br_hrg']) ?></td>
                                <br>
                                <th>Jumlah Pesan :</th>
                                <td>
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input type="number" required min="1" id="jumlah" max="<?= $data['br_stok'] ?>" name="max">
                                        </div>
                                </td>
                                <br>
                                <br>
                                <button type="submit" name="beli" class="btn btn-success">Beli</button>

                                </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="produk.php" class="btn btn-danger">Lanjut belanja</a>
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

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="admin/js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>
</body>

</html>