-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 08:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasisp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `No_Anggota` varchar(12) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `No_KTP` varchar(16) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `No_HP` varchar(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`No_Anggota`, `Nama`, `No_KTP`, `Tanggal_Lahir`, `Jenis_Kelamin`, `No_HP`, `Alamat`, `Email`) VALUES
('140810200013', 'Rihlan Lumenda', '3271051010010015', '2001-09-21', 'Laki-laki', '081212345678', 'Cirebon', 'rihlanlumenda@gmail.com'),
('140810200025', 'Raihan Fadhlal ', '3271051010010012', '2021-05-06', 'Laki-laki', '081281132263', 'Bogor', 'raihanfadhlal@gmail.com'),
('140810200029', 'Adnan Rafiansyah', '3271051010010014', '2002-07-25', 'Laki-laki', '081212345678', 'Sumedang', 'adnanrafiansyah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `No_Angsuran` varchar(12) NOT NULL,
  `No_Pinjaman` varchar(12) NOT NULL,
  `Tanggal_Bayar` date NOT NULL,
  `Cicilan_Pokok` decimal(10,0) NOT NULL,
  `Cicilan_Margin` decimal(10,0) NOT NULL,
  `Angsuran_Ke` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`No_Angsuran`, `No_Pinjaman`, `Tanggal_Bayar`, `Cicilan_Pokok`, `Cicilan_Margin`, `Angsuran_Ke`) VALUES
('A1P103025', 'P1210301025', '2021-03-08', '100000', '10000', '1'),
('A1P203029', 'P2210312029', '2021-05-19', '500000', '50000', '1'),
('A1P304013', 'P3210404013', '2021-05-11', '600000', '60000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `No_Iuran` varchar(6) NOT NULL,
  `No_Anggota` varchar(12) NOT NULL,
  `Iuran_Wajib` decimal(10,0) NOT NULL,
  `Iuran_Pokok` decimal(10,0) NOT NULL,
  `Iuran_Sukarela` decimal(10,0) NOT NULL,
  `Tanggal_Bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`No_Iuran`, `No_Anggota`, `Iuran_Wajib`, `Iuran_Pokok`, `Iuran_Sukarela`, `Tanggal_Bayar`) VALUES
('p03013', '140810200013', '0', '20000', '0', '2021-03-01'),
('p03025', '140810200025', '0', '20000', '0', '2021-03-03'),
('w02025', '140810200025', '25000', '0', '0', '2021-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `No_Pinjaman` varchar(12) NOT NULL,
  `No_Anggota` varchar(12) NOT NULL,
  `Besar_Pinjaman` decimal(10,0) NOT NULL,
  `Lama_Pinjaman` decimal(10,0) NOT NULL,
  `Cicilan_Pokok` decimal(10,0) NOT NULL,
  `Cicilan_Margin` decimal(10,0) NOT NULL,
  `Tanggal_Pencairan` date NOT NULL,
  `Status_Pinjaman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`No_Pinjaman`, `No_Anggota`, `Besar_Pinjaman`, `Lama_Pinjaman`, `Cicilan_Pokok`, `Cicilan_Margin`, `Tanggal_Pencairan`, `Status_Pinjaman`) VALUES
('P2210312029', '140810200029', '2500000', '5', '500000', '50000', '2021-03-19', 'Lancar'),
('P3210404013', '140810200013', '2400000', '4', '600000', '60000', '2021-04-11', 'Lancar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'aziz', '123'),
(3, 'bobi', '$2y$10$2.E1yguVUSWvfchK2jA8A.SEgoo4A/mj1lsiwJl04M9LJ6r0rWrD.'),
(4, 'raihan', '$2y$10$8KeMsf9oj3IYEDhivofle.eppY5SCH42t.ladZAAvkg9wvF1U5jiy'),
(5, 'raihann', '$2y$10$rh4PEvH/.BzsUKUVvrs6surRwvP06/ieEb3ZQiRJbf4ni6U9ABpWC'),
(6, 'rihlan', '$2y$10$DS/xFuImpLKIeM0M7hmRFOAJh1nf3IrjQsgucjTsCPnugudxiGcTy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`No_Anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`No_Angsuran`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`No_Iuran`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`No_Pinjaman`),
  ADD KEY `No_Anggota` (`No_Anggota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`No_Anggota`) REFERENCES `anggota` (`No_Anggota`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
