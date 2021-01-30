<?php
// require_once("koneksi.php");
//     if (!isset($_SESSION)) {
//         session_start();
//     }
     
//     if (isset($_GET['act']) && isset($_GET['ref'])) {
//         $act = $_GET['act'];
//         $ref = $_GET['ref'];
             
//         if ($act == "add") {
//             if (isset($_GET['barang_id'])) {
//                 $barang_id = $_GET['barang_id'];
//                 if (isset($_SESSION['items'][$barang_id])) {
//                     $_SESSION['items'][$barang_id] += 1;
//                 } else {
//                     $_SESSION['items'][$barang_id] = 1; 
//                 }
//             }
//         } elseif ($act == "plus") {
//             if (isset($_GET['barang_id'])) {
//                 $barang_id = $_GET['barang_id'];
//                 if (isset($_SESSION['items'][$barang_id])) {
//                     $_SESSION['items'][$barang_id] += 1;
//                 }
//             }
//         } elseif ($act == "min") {
//             if (isset($_GET['barang_id'])) {
//                 $barang_id = $_GET['barang_id'];
//                 if (isset($_SESSION['items'][$barang_id])) {
//                     $_SESSION['items'][$barang_id] -= 1;
//                 }
//             }
//         } elseif ($act == "del") {
//             if (isset($_GET['barang_id'])) {
//                 $barang_id = $_GET['barang_id'];
//                 if (isset($_SESSION['items'][$barang_id])) {
//                     unset($_SESSION['items'][$barang_id]);
//                 }
//             }
//         } elseif ($act == "clear") {
//             if (isset($_SESSION['items'])) {
//                 foreach ($_SESSION['items'] as $key => $val) {
//                     unset($_SESSION['items'][$key]);
//                 }
//                 unset($_SESSION['items']);
//             }
//         } 
         
//         header ("location:" . $ref);
//     }
?>

<?php
session_start();
$id_produk=$_GET['id'];
//Jika sudah ada di keranjang maka akan +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
    $_SESSION['keranjang'][$id_produk]+=1;

}
else
//Jika belum ada maka beli 1
    {
        $_SESSION['keranjang'][$id_produk]=1;
    }
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('Produk Ditambahkan Ke keranjang');</script>";
echo "<script>location='detail.php';</script>";
?>