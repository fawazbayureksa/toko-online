-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`) VALUES
(4, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `br_id` int(6) NOT NULL,
  `br_nm` varchar(50) NOT NULL,
  `br_item` int(4) NOT NULL,
  `br_hrg` int(10) NOT NULL,
  `br_stok` int(9) NOT NULL,
  `br_satuan` varchar(20) NOT NULL,
  `br_gbr` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`br_id`, `br_nm`, `br_item`, `br_hrg`, `br_stok`, `br_satuan`, `br_gbr`, `ket`) VALUES
(1, 'Kaos Three Second', 1, 90000, 12, 'Pcs', '3secondbaju.jpg', 'Bahan Cotton Combed 24s built up'),
(2, 'Kaos Three Second Logo', 1, 65000, 24, 'Pcs', '3secondbaju2.jpg', 'Bahan Cotton Combed 24s built up'),
(3, 'Jaket Three Second', 1, 300000, 30, 'Pcs', '3secondjaket.jpg', 'Bahan Cotton Combed'),
(4, 'Art Wear Jaket', 1, 280000, 19, 'Pcs', 'artwearjaket2.jpg', 'Bahan Cotton Combed'),
(5, 'Jaket Greenlight', 1, 360000, 30, 'Pcs', 'greenlightjaket.jpg', 'Bahan Cotton Combed'),
(6, 'Celana Jeans Panjang', 1, 175000, 20, 'Pcs', 'jeans4.jpg', 'Bahan Jeans Terbaik'),
(7, 'Celana Jeans Pendek', 1, 100000, 20, 'Pcs', 'jeans5.jpg', 'Bahan Jeans Terbaik'),
(8, 'Kaos Greenlight Terbaru', 1, 95000, 11, 'Pcs', 'greenlightbaju2.jpg', 'Bahan Cotton Combed'),
(9, 'Kaos Custom Woles', 1, 86000, 20, 'Pcs', 'wolesbaju.jpg', 'Bahan cvc bandung build up tanpa jahitan samping');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_kurir` int(6) NOT NULL,
  `jasakurir` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_kurir`, `jasakurir`, `tarif`) VALUES
(1, 'J&T', 22000),
(2, 'JNE', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 37, 'Fawwaz Bayureksa', 'Mandiri', 117000, '2021-01-23', '20210122190138Screenshot_20180210-090855.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kurir` int(6) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_kurir`, `tanggal_pembelian`, `total_pembelian`, `alamat_lengkap`, `status_pembelian`, `resi`) VALUES
(37, 1, 1, '2021-01-22', 117000, 'Jl Barombong ', 'Barang dikirim', '123456789'),
(38, 1, 1, '2021-01-22', 122000, 'Jl Barombong ', 'pending', ''),
(39, 1, 1, '2021-01-22', 302000, 'Jl Barombong ', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(49, 37, 8, 1, 'Kaos Greenlight Terbaru', 95000, 95000),
(50, 38, 7, 1, 'Celana Jeans Pendek', 100000, 100000),
(51, 39, 4, 1, 'Art Wear Jaket', 280000, 280000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_usr` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `bank` varchar(30) NOT NULL,
  `norek` varchar(30) NOT NULL,
  `namarek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nama_usr`, `email`, `telp`, `pass`, `gender`, `tgl_lahir`, `alamat`, `bank`, `norek`, `namarek`) VALUES
(1, 'Fawwaz Bayureksa', 'fawwaz', 'fawwazbayureksa@gmail.com', '082394418669', 'fawaz123', 1, '2000-06-04', 'Jl Barombong ', 'Mandiri', '12345678', 'Fawwaz Bayureksa'),
(2, 'Ainul', 'ainul', 'ainul@gmail.com', '08236474733', 'ainul', 1, '1998-10-18', ' Jenneponto', 'Ainul ', '123456778', 'Ainul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `br_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_kurir` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
