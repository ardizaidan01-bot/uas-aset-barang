-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aset_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` enum('Baik','Rusak') NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `user_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `kode_barang`, `nama_barang`, `kategori`, `lokasi`, `jumlah`, `kondisi`, `tanggal_masuk`, `foto`, `user_input`) VALUES
(1, 'CUPU001', 'aRacer RC Mini XX', 'Komponen', 'Jakarta Barat', 12, 'Baik', '2026-07-01', '1782893093_download.jpg', 'Admin'),
(2, 'CUPU002', 'Meja', 'Peralatan', 'Unpam', 200, 'Baik', '2026-07-01', '1782904297_1782843872_download.jfif', 'Admin'),
(3, 'CUPU003', 'Bangku', 'Peralatan', 'Unpam', 800, 'Baik', '2026-07-01', '1782924227_images.jfif', 'NET1'),
(4, 'CUPU004', 'Genteng', 'Toko Pembangunan', 'Jakarta Barat', 3000, 'Baik', '2026-07-01', '1782924952_images (1).jfif', 'NET1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`) VALUES
(1, 'CV001', 'test', '$2y$10$.Smw4mqY.nBXMs8sWdSKOeU/IcJ2MTY0HbYgrOXmGQ4KzNfntzeFW', '2026-06-30 15:55:25'),
(2, 'bb', 'test2', '$2y$10$m.YGuXQBiOZI6LtGJhaqW.xk238oNM8C9tJiNffGfQ7yMsWB/lEcm', '2026-07-01 07:47:35'),
(3, 'Admin', 'admin', '$2y$10$5aVgZv.hNqnxQ5FH0ML7lOWnG9CWkuMsmNmqrUWD9.Zre08yyk9hm', '2026-07-01 08:04:14'),
(4, 'NET1', 'net1', '$2y$10$CNPCwdemJFU2YCjoICAKqOG.ft3b4Roz8JSoyF3V.0hFBRQh52aiW', '2026-07-01 16:42:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
