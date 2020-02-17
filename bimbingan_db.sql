-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 08:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbingan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`) VALUES
(13, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(32) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `foto_dosen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(11) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pembimbing1` varchar(64) NOT NULL,
  `pembimbing2` varchar(64) NOT NULL,
  `penguji1` varchar(64) NOT NULL,
  `penguji2` varchar(64) NOT NULL,
  `penguji3` varchar(64) NOT NULL,
  `judul_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kps`
--

CREATE TABLE `kps` (
  `username` varchar(64) NOT NULL,
  `departemen` varchar(64) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kps`
--

INSERT INTO `kps` (`username`, `departemen`, `foto`) VALUES
('informatika', 'Teknik Informatika', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `strata` varchar(2) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `request_hasil` tinyint(1) NOT NULL,
  `hasil` tinyint(1) NOT NULL,
  `request_tutup` tinyint(1) NOT NULL,
  `alumni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
  `seminar_nim` varchar(32) NOT NULL,
  `seminar_tanggal` varchar(32) NOT NULL,
  `seminar_waktu` int(11) NOT NULL,
  `seminar_tempat` varchar(64) NOT NULL,
  `seminar_pembimbing1_nama` varchar(64) NOT NULL,
  `seminar_pembimbing1_status` varchar(16) NOT NULL,
  `seminar_pembimbing2_nama` varchar(64) NOT NULL,
  `seminar_pembimbing2_status` varchar(16) NOT NULL,
  `seminar_penguji1_nama` varchar(64) NOT NULL,
  `seminar_penguji1_status` varchar(16) NOT NULL,
  `seminar_penguji2_nama` varchar(64) NOT NULL,
  `seminar_penguji2_status` varchar(16) NOT NULL,
  `seminar_jenis` varchar(32) NOT NULL,
  `seminar_status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_ujian`
--

CREATE TABLE `tempat_ujian` (
  `tempat_ujian_id` int(11) NOT NULL,
  `tempat_ujian_nama` varchar(100) NOT NULL,
  `tempat_ujian_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`, `status`, `departemen`) VALUES
(4, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'superadmin', '', ''),
(56, 'informatika', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_ujian`
--

CREATE TABLE `waktu_ujian` (
  `waktu_ujian_id` int(16) NOT NULL,
  `waktu_mulai` varchar(11) NOT NULL,
  `waktu_selesai` varchar(11) NOT NULL,
  `waktu_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `kps`
--
ALTER TABLE `kps`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `tempat_ujian`
--
ALTER TABLE `tempat_ujian`
  ADD PRIMARY KEY (`tempat_ujian_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  ADD PRIMARY KEY (`waktu_ujian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tempat_ujian`
--
ALTER TABLE `tempat_ujian`
  MODIFY `tempat_ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  MODIFY `waktu_ujian_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
