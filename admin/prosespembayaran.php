<?php

$id = $_GET['id'];
require_once 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembelian = '$id'");
$data = mysqli_fetch_assoc($query);

if (!isset($data)) {

    echo "<script>alert('Produk Belum di Bayarkan')</script>";
    echo "<script>location='index.php?page=laporan';</script>";
}

?>

<!-- <pre><?php print_r($data) ?></pre> -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Pembayaran</h1>
</div>

<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow py-2">

            <div class="row justify-content">
                <div class="col-sm-5">
                    <img src="../gambar/bukti/<?= $data['bukti'] ?>" width="300px" alt="bukti pembayaran">
                </div>
                <div class="col-sm-5">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <td><?= $data['bank'] ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Pembayaran</th>
                            <td>Rp. <?=number_format($data['jumlah']) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $data['tanggal'] ?></td>
                        </tr>
                    </table>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">No Resi Pengiriman</label>
                            <input type="text" name="resi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="">--Pilih--</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang dikirim">Barang segera dikirim</option>
                                <option value="Batal">Batal</option>
                            </select>
                        </div>
                        <button type="submit" name="proses" class="btn btn-success btn-sm">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="row justify-content-center">
                    <a href="index.php?page=laporan" class="btn btn-warning"><i class="fas fa-sign-out-alt"></i>Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['proses']))
{
    
    $resi = $_POST['resi'];
   $status = $_POST['status'];

   mysqli_query($koneksi,"UPDATE pembelian SET resi ='$resi', status_pembelian='$status' WHERE id_pembelian='$id' ");

}

?>