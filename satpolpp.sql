-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 02:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satpolpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_kendaraan`
--

CREATE TABLE `booking_kendaraan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `acara` varchar(250) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `jumlah_personil` int(11) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `status_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_kendaraan`
--

INSERT INTO `booking_kendaraan` (`id`, `tanggal`, `lokasi`, `acara`, `waktu_berangkat`, `waktu_pulang`, `jumlah_personil`, `driver`, `id_kendaraan`, `status_booking`) VALUES
(20, '2023-09-01', 'jln gorongan 5 ', 'lokal', '19:48:00', '19:48:00', 1, '1', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `no_kendaraan` varchar(50) NOT NULL,
  `merek_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `pajak_lima_tahun` date NOT NULL,
  `pajak_tahunan` date NOT NULL,
  `kir` date NOT NULL,
  `jadwal_service` date NOT NULL,
  `catatan_keluhan` varchar(250) NOT NULL,
  `status_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `no_kendaraan`, `merek_kendaraan`, `jenis_kendaraan`, `pajak_lima_tahun`, `pajak_tahunan`, `kir`, `jadwal_service`, `catatan_keluhan`, `status_kendaraan`) VALUES
(3, 'ab 288938 ok', '', 'paolao', '2023-09-14', '2023-09-19', '2023-09-27', '2023-09-06', '         udah ooselesai dong pasti sih', 2),
(10, 'mlk 1234 ab', 'avanza 1', '4x4', '2023-09-02', '2023-09-02', '2023-09-02', '2023-09-02', '         aku nah ini kan rumsak nya fi bla bla bla bla', 1),
(11, 'ab 1234 zee', 'metic', 'motor roda 3', '2023-09-15', '2031-09-12', '2023-09-13', '2023-09-30', 'lol', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `role`) VALUES
('fajar', 'fajarwijaksono', '1234', 2),
('malik', 'malik fajar', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_kendaraan`
--
ALTER TABLE `booking_kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `no_kendaraan` (`no_kendaraan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_kendaraan`
--
ALTER TABLE `booking_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
