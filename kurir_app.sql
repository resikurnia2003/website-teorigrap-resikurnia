-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 04:55 PM
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
-- Database: `kurir_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `resi` varchar(12) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` varchar(200) NOT NULL,
  `nohp_penerima` varchar(15) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `nohp_pengirim` varchar(15) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `nohp_kurir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`resi`, `nama_barang`, `status_barang`, `nama_penerima`, `alamat_penerima`, `nohp_penerima`, `nama_pengirim`, `nohp_pengirim`, `nama_kurir`, `nohp_kurir`) VALUES
('098765', 'mukena ziper', 'cash on delivery', 'resi kurniaaaa', 'cikatomas', '085222285578', 'rezaaa', '087654456789', 'wawang', '082212343567'),
('12345', 'tas mossdom', 'Delivery Courier', 'resi kurnia', 'Jl mekarsari, pancatengah, tasikmalaya', '081319893497', 'rezky aditya', '08123456789', 'rizki maulana', '08987654321');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'resikurnia', '$2y$10$nGbNUzxVbSnnK1bwHjCbFuEXjwajrPGjS/C1sWuj1hXlmgMrGBzkK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`resi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
