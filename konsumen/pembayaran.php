<?php

$id=$_GET['id'];
require_once '../koneksi.php';

$query = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pembelian = '$id'");
$idpem = mysqli_fetch_assoc($query);



?>

<!-- <pre><?php print_r($idpem)?></pre> -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Pembayaran</h1>
</div>
<div class="alert alert-info">Total tagihan anda <strong>Rp <?php echo number_format($idpem['total_pembelian']); ?></strong></div>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow py-2">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                            <i style="color: red;">*sesuai nama di rekening</i>
                        </div>
                    </div>
                    <div class="col-sm-5">

                        <div class="form-group">
                            <input type="text" name="bank" class="form-control" placeholder="Nama Bank">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="number" name="jumlah" class="form-control" min="1" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="date" name="tanggal" class="form-control" placeholder="Nama Bank">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">

                        <div class="form-group">
                            <label for="">Gambar Bukti Pembayaran</label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-sm-2">
                            <button type="submit" name="bayar" class="btn btn-info btn-sm"><i class="fas fa-paper-plane"></i> Kirim</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="index.php?page=laporan" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i>Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

if (isset($_POST['bayar'])){

    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $date = $_POST['tanggal'];

    $lok = $_FILES['bukti']['name'];
    $gambar = $_FILES['bukti']['tmp_name'];
    $namafix = date("YmdHis").$lok;
    move_uploaded_file($gambar,"../gambar/bukti/".$namafix);
    
    mysqli_query($koneksi,"INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$id','$nama','$bank','$jumlah','$date','$namafix')");

    mysqli_query($koneksi,"UPDATE pembelian SET status_pembelian = 'Sudah di bayar' WHERE id_pembelian='$id'");

    echo "<script>alert('Pembayaran Segera di proses');</script>";
    echo "<script>location='index.php?page=laporan';</script>";

}


?>