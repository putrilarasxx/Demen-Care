-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demencare`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `first_name`, `last_name`, `username`, `email`, `password`, `role`, `photo_profile`) VALUES
(1, 'Marc', 'Gany', 'pasien', 'pasien@gmail.com', '$2y$10$/TXoQnpvteLjylmjLmlWE.yriAQekCaW/T4bc785LBArpT975a.16', 'pasien', 'BLACK-icon1.jpg'),
(2, 'Budi', 'Wali', 'budiii', 'budi@gmail.com', '$2y$10$kpYnibORFJYkBACCRGPaOe6rWm5TK0hg6CB/4W0Dl7fG/2gqiWAZS', 'dokter', 'Screenshot_20221227_0956564.png');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id_app` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id_app`, `id_akun`, `nama_pasien`, `dokter`, `tanggal`) VALUES
(5603, 1, 'Marc', 'Doctor A', '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id_diagnosis` int(11) NOT NULL,
  `id_akun` int(111) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `data_diagnosis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id_diagnosis`, `id_akun`, `nama_pasien`, `dokter`, `tanggal`, `data_diagnosis`) VALUES
(1, 0, 'amalia', 'Doctor A', '2023-01-19', 'Pasien mengalami demensia tingkat 3');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`) VALUES
(1, 'Doctor A'),
(2, 'Doctor B'),
(3, 'Doctor C'),
(4, 'Doctor D'),
(5, 'Doctor E'),
(6, 'Doctor F');

-- --------------------------------------------------------

--
-- Table structure for table `medrec`
--

CREATE TABLE `medrec` (
  `id_medrec` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `data_medrec` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medrec`
--

INSERT INTO `medrec` (`id_medrec`, `id_akun`, `nama_pasien`, `dokter`, `tanggal`, `data_medrec`) VALUES
(1, 0, 'Marc', 'Doctor A', '2023-01-17', 'demensia tahap 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `medrec`
--
ALTER TABLE `medrec`
  ADD PRIMARY KEY (`id_medrec`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5604;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id_diagnosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medrec`
--
ALTER TABLE `medrec`
  MODIFY `id_medrec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
