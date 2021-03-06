-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 04:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `judul`, `product_id`, `user_id`, `jumlah`, `keperluan`, `tanggal`) VALUES
(1, 'barang keluar sore', 1, 3, 40, NULL, '2019-09-02'),
(2, 'keperluan inventory', 2, 1, 10, 'External', '2019-09-10'),
(3, 'tang untuk gudang', 1, 2, 10, NULL, '2019-09-03'),
(4, 'barang keluar #2', 4, 1, 10, 'External', '2019-09-04'),
(5, 'satu', 2, 1, 12, 'Internal', '2019-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `supplier_id`, `product_id`, `jumlah`, `tanggal`) VALUES
(2, 1, 1, 10000, '2019-09-03'),
(4, 1, 1, 66, '2019-09-03'),
(5, 3, 2, 90, '2019-09-19'),
(6, 2, 1, 1200, '2019-09-02'),
(7, 3, 4, 100, '2019-09-10'),
(8, 1, 5, 20, '2019-09-12'),
(9, 3, 2, 15, '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `nama`, `value`) VALUES
(1, 'nama_pt', 'PT. Graha Sarana Duta'),
(2, 'judul', 'PT. Graha Sarana Duta'),
(3, 'kalimat_pengantar', '<p>\r\nPT. Graha Sarana Duta didirikan pada tahun 1981, untuk meyediakan office building, jasa pemeliharaan dan perawatan gedung Bank Duta. Pada tahun 2001 kepemilikan perseroan diambil alih sepenuhnya oleh PT Telekomunikasi Indonesia, Tbk untuk mengelola gedung-gedung kantor dan aset properti Telkom yang sebelumnya dikelola oleh divisi properti Telkom. Di bawah kendali Telkom, PT. Graha Sarana Duta terus berkembang menjadi perusahaan properti yang terpadu dengan branding yaitu TelkomProperty.\r\n</p>\r\n<h3>Visi</h3>\r\n<p>Untuk menjadi manajemen properti yang terkemuka dan pengembang jasa di Indonesia dengan menyediakan berbagai 6 komprehensif pembangunan dan layanan untuk membantu pelanggan kami memaksimalkan bisnis mereka.</p>\r\n<h3>Misi</h3>\r\n<ol>\r\n<li>Memberikan Telkom Property properti dan fasilitas secara lengkap disertai dengan kualitas terbaik dan harga yang kompetitif.</li>\r\n<li>Memberikan Telkom Property fasilitas yang inovatif yang berwawaasan lingkungan.</li>\r\n<li>Menjadi korporasi dengan pengelolaan terbaik</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `alamat`) VALUES
(1, 'PT. Satu Berkarya', 'Cilandak Jakarta Selatan'),
(2, 'PT. Dua Warna', 'Bogor Utara'),
(3, 'PT. Tiga Roda', 'Kuningan Jakarta Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `user_id`, `jumlah`, `keperluan`, `tanggal`) VALUES
(2, 'Kantong semen', 2, 11, 'External', '2019-09-10'),
(3, 'Celengan ayam', 3, 2, 'Internal', '2019-09-04'),
(4, 'Wadah Tisu', 2, 12, 'External', '2019-09-04'),
(5, 'Pewangi ruangan', 1, 10, 'External', '2019-09-01'),
(6, 'Gelas biru', 3, 100, 'Internal', '2019-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `stok_minimal` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `jenis`, `nama`, `stok_minimal`) VALUES
(1, 'TG001', 'Tang jepit', 10),
(2, 'TG002', 'Tang potong', 10),
(4, 'chemical', 'Pembersih lantai', 100),
(5, 'peralatan', 'Rak sepatu', 20),
(6, 'peralatan', 'Sikat WC', 20);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `alamat`) VALUES
(1, 'PT. Garuda', 'Bogor Raya'),
(2, 'PT. Walet Biru', 'Bogor Utara 2'),
(3, 'PT. Sampoerna', 'Kuningan Jakarta Selatan'),
(4, 'PT. Pro Duta', 'Semarang, Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `nik`, `level`) VALUES
(1, 'Rudi Ismanto', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '1001', 'user'),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2001', 'admin'),
(3, 'Angga', 'angga', '8479c86c7afcb56631104f5ce5d6de62', '111', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
