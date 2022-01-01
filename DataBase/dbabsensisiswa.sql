-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 08:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbabsensisiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ssiswa`
--

CREATE TABLE `ssiswa` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `absen` int(100) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssiswa`
--

INSERT INTO `ssiswa` (`id`, `tanggal`, `nama`, `absen`, `kelas`) VALUES
(44, '2021-12-29', 'bintang', 0, ''),
(45, '2021-12-29', 'bintang', 12, 'xii rpl2'),
(46, '2021-12-30', 'dad', 12, 'qaea'),
(47, '2021-12-29', 'qq', 12, 'xii rpl2'),
(48, '2021-11-03', 'jj', 19, 'xii'),
(49, '2021-12-31', 'saya', 12, 'xii rpl2'),
(50, '2021-12-31', 'dasd', 12, 'xii rpl2');

-- --------------------------------------------------------

--
-- Table structure for table `suser`
--

CREATE TABLE `suser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suser`
--

INSERT INTO `suser` (`id_user`, `username`, `password`, `nama_pengguna`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ssiswa`
--
ALTER TABLE `ssiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suser`
--
ALTER TABLE `suser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ssiswa`
--
ALTER TABLE `ssiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `suser`
--
ALTER TABLE `suser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
