 <?php

require_once '../koneksi.php';

?>

 <h1 class="h3 mb-0 text-gray-800 text-center">Riwayat Belanja</h1>
 <br>
 <hr>


           
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th style="width: 20%;">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                  
                    <?php
                    $no = 1;
                    // pelanggan yang login
                    $id_pelanggan = $_SESSION['user']['id_user'];

                    $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN pembelian_produk ON pembelian_produk.id_pembelian = pembelian.id_pembelian
                    JOIN barang ON pembelian_produk.id_produk=barang.br_id
                     WHERE id_pelanggan='$id_pelanggan'");
                    while ($data = mysqli_fetch_assoc($query)) {

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?=$data['br_nm']?></td>
                            <td><?php echo $data['tanggal_pembelian']; ?></td>
                            <td><?php echo $data['status_pembelian']; ?></td>
                            <td> Rp <?php echo  number_format($data['total_pembelian']); ?></td>
                            <td>

                                <a href="../nota.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-info btn-sm">Cetak Nota</a>
                                <!-- <a href="pembayaran.php?id=<?php echo $data['id_pembelian'];?>" class="btn btn-success">Pembayaran</a> -->
                                <a href="index.php?page=pembayaran&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-danger btn-sm">Pembayaran</a>
                            </td>

                    

                        <?php $no++;
                    } ?>
                        </tr>

                </tbody>
            </table>
      
