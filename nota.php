<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nota Pembelian</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <h2> Detail Pemesanan</h2>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user 
    ON pembelian.id_pelanggan=user.id_user
    WHERE pembelian.id_pembelian='$_GET[id]'");
        $data = mysqli_fetch_assoc($query);


        ?>
        <!--<h1>data pembeli</h1>-->
        <!--<pre><?php //print_r($data) 
                    ?></pre>-->

        <!--<h1>Data orang Login</h1>-->
        <!--<pre><?php //print_r($_SESSION)
                    ?></pre>-->


        <!--- Jika pembelian tidak sama dengan data orang yang login maka riwayat tidak akan terbuka -->
        <!-- it means like pelanggan yang beli harus pelanggan yang login -->
        <?php
        //datapelangganbeli
        $a = $data['id_pelanggan'];
        //datapelanganlogin
        $b = $_SESSION['user']['id_user'];

        if ($a !== $b) {
            echo "<script>alert('id yang anda tulis kosong');</script>";
            echo "<script>location='riwayat.php';</script>";
            exit();
        }

        ?>


        <div class="row">
            <div class="col-sm-4">
                <h3>Pembelian </h3>
                <strong>No Pesanan : <?php echo $data['id_pembelian']; ?> </strong>
                <h5>
                    Tanggal Pembelian : <?php echo $data['tanggal_pembelian']; ?> <br>
                </h5>
                Total Pembelian : Rp <?php echo number_format($data['total_pembelian']); ?>


            </div>
            <div class="col-sm-4">
                <h3>Data Costumer</h3>
                <strong><?php echo $data['nama'] ?></strong></br>
                <h5>
                    Nomor Telepon : <?php echo $data['telp']; ?> <br>
                    Email : <?php echo $data['email']; ?> <br>

                </h5>

            </div>
            <div class="col-sm-4">
                <h3>Pengiriman Barang</h3>
          


            <?php
            $idkurir = $data['id_kurir'];
            $tarifongkir = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_kurir = '$idkurir' ");
            $ongkir = mysqli_fetch_assoc($tarifongkir);
            $kurir = $ongkir['jasakurir'];
            $tarif = $ongkir['tarif'];

            ?>
            Alamat Lengkap : <?php echo $data['alamat_lengkap']; ?> <br>
           <strong>
               <?=$kurir?> - Rp <?php echo number_format($tarif); ?> </br>
           </strong> 

        </div>
    </div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah </th>
                <th>Total Harga Barang </th>
             
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM pembelian_produk where id_pembelian='$_GET[id]'"); ?>
            <?php while ($x = $query->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td>Rp <?php echo number_format($x['harga']); ?></td>
                    <td><?php echo $x['jumlah']; ?></td>
                    <td>Rp <?php echo number_format($x['subharga']); ?></td>
                   
                </tr>
                <th colspan="4">Total :</th>
                <td>Rp <?php echo number_format($data['total_pembelian']); ?></td>
            <?php $no++;
            } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-info">
                <p>
                    Silahkan Lanjutkan Pembayaran Ke- <br>
                    <strong>BANK MANDIRI XXX-XXX-XXXX-XXX AN. XXXXXXXX</strong>
                </p>

            </div>
        </div>
    </div>
    </div>

    <script>
       window.print();

        //location='konsumen/index.php?page=laporan';
    </script>
   
</body>

</html>