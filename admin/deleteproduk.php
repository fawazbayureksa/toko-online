<?php
require_once 'koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM barang WHERE br_id= '$id'");

$message = "Data Berhasil dihapus";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script>location='index.php?page=produk';</script>";




?>
