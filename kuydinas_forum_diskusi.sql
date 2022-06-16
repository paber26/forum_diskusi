-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 11:00 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuydinas_forum_diskusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft_thread`
--

CREATE TABLE `draft_thread` (
  `idd` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dukungan_tanggapan`
--

CREATE TABLE `dukungan_tanggapan` (
  `id` int(11) NOT NULL,
  `idtn` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `pilihan` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dukungan_thread`
--

CREATE TABLE `dukungan_thread` (
  `id` int(11) NOT NULL,
  `idt` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `pilihan` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_tanggapan`
--

CREATE TABLE `laporan_tanggapan` (
  `idltn` varchar(20) NOT NULL,
  `idtn` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `alsan` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_thread`
--

CREATE TABLE `laporan_thread` (
  `idlt` varchar(20) NOT NULL,
  `idt` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `alasan` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `idtn` varchar(20) NOT NULL,
  `idt` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `isi` longtext NOT NULL,
  `tdukungan` int(11) NOT NULL DEFAULT 0,
  `tmelapor` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `idt` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `tdukungan` int(11) NOT NULL DEFAULT 0,
  `tmenanggapi` int(11) NOT NULL DEFAULT 0,
  `tmelihat` int(11) NOT NULL DEFAULT 0,
  `tmelapor` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `nowa` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `api_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dukungan_tanggapan`
--
ALTER TABLE `dukungan_tanggapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dukungan_thread`
--
ALTER TABLE `dukungan_thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_tanggapan`
--
ALTER TABLE `laporan_tanggapan`
  ADD PRIMARY KEY (`idltn`);

--
-- Indexes for table `laporan_thread`
--
ALTER TABLE `laporan_thread`
  ADD PRIMARY KEY (`idlt`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`idtn`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`idt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dukungan_tanggapan`
--
ALTER TABLE `dukungan_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dukungan_thread`
--
ALTER TABLE `dukungan_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
