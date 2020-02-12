-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2020 at 11:42 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
  `id_jurusan_departemen` int(32) NOT NULL,
  `departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `id_jurusan_departemen`, `departemen`) VALUES
(8, 3, 'Teknik Informatika'),
(9, 3, 'Teknik Elektro'),
(10, 1, 'Teknik Arsitektur'),
(11, 2, 'Teknik Mesin'),
(12, 4, 'departemen tes');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(32) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `departemen_dosen` varchar(64) NOT NULL,
  `jurusan_dosen` int(11) NOT NULL,
  `foto_dosen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `departemen_dosen`, `jurusan_dosen`, `foto_dosen`) VALUES
('196012111987031022', 'Andani, Dr. Ir. MT.', 'Teknik Elektro', 3, ''),
('197310101998021001', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'Teknik Informatika', 3, ''),
('197404262005011002', 'Adnan, ST., MT.', 'Teknik Informatika', 3, ''),
('201912222019123001', 'dosen tes', 'Teknik Informatika', 3, ''),
('D001', 'dosen tes 1', 'departemen tes', 4, ''),
('D002', 'dosen tes 2', 'departemen tes', 4, ''),
('D003', 'dosen tes 3', 'departemen tes', 4, ''),
('D004', 'dosen tes 4', 'departemen tes', 4, ''),
('D005', 'dosen tes 5', 'departemen tes', 4, ''),
('D006', 'dosen tes 6', 'departemen tes', 4, '');

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

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`id_judul`, `nim`, `judul`, `pembimbing1`, `pembimbing2`, `penguji1`, `penguji2`, `penguji3`, `judul_departemen`) VALUES
(1, 'D42115010', 'Penerapan Metode Multitasking pada Hidroponik Terotomasi Berbasis Internet of Things', 'Adnan, ST., MT.', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'Andani, Dr. Ir. MT.', 'dosen tes', '', 'Teknik Informatika'),
(2, 'D42115510', 'Analisis Static Site Generators pada Web Responsif Portal Berita', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'Adnan, ST., MT.', 'Andani, Dr. Ir. MT.', '', 'Teknik Informatika'),
(3, 'D42115002', 'Analisis Kinerja Mini PC', 'Adnan, ST., MT.', 'dosen tes', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'Andani, Dr. Ir. MT.', '', 'Teknik Informatika'),
(4, 'M001', 'Judul Penelitian Mahasiswa 1', 'dosen tes 1', 'dosen tes 2', 'dosen tes 3', 'dosen tes 4', '', 'departemen tes'),
(5, 'M002', 'Judul Penelitian Mahasiswa 2', 'dosen tes 2', 'dosen tes 3', 'dosen tes 4', 'dosen tes 5', '', 'departemen tes'),
(6, 'M011', 'Judul Penelitian Mahasiswa 11', 'dosen tes 1', 'dosen tes 3', 'dosen tes 6', 'dosen tes 4', '', 'departemen tes');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Arsitektur'),
(2, 'Teknik Mesin'),
(3, 'Teknik Elektro'),
(4, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `kps`
--

CREATE TABLE `kps` (
  `username` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `jurusan` varchar(64) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kps`
--

INSERT INTO `kps` (`username`, `nama`, `departemen`, `jurusan`, `foto`) VALUES
('arsi1', '', 'Teknik Arsitektur', '1', ''),
('elektro1', '', 'Teknik Elektro', '3', ''),
('infor1', '', 'Teknik Informatika', '3', ''),
('tes', '', 'departemen tes', '4', '');

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

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `strata`, `angkatan`, `departemen`, `foto`, `request_hasil`, `hasil`, `request_tutup`, `alumni`) VALUES
('D42115002', 'Said Syamil Amas', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115008', 'Sabtian Juliana', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115010', 'Ryan Rafli', 'S1', 2015, 'Teknik Informatika', '', 1, 0, 0, 0),
('D42115510', 'A. Ardiansyah Yusuf', 'S1', 2015, 'Teknik Informatika', '', 1, 0, 0, 0),
('M001', 'mahasiswa 1', 'S1', 2015, 'departemen tes', '', 1, 0, 0, 0),
('M002', 'mahasiswa 2', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M003', 'mahasiswa 3', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M004', 'mahasiswa 4', 'S1', 2014, 'departemen tes', '', 0, 0, 0, 0),
('M005', 'mahasiswa 5', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M006', 'mahasiswa 6', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M007', 'mahasiswa 7', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M008', 'mahasiswa 8', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M009', 'mahasiswa 9', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M010', 'mahasiswa 10', 'S1', 2015, 'departemen tes', '', 0, 0, 0, 0),
('M011', 'Mahasiswa 11', 'S1', 2015, 'departemen tes', '', 1, 1, 1, 0);

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

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`seminar_id`, `seminar_nim`, `seminar_tanggal`, `seminar_waktu`, `seminar_tempat`, `seminar_pembimbing1_nama`, `seminar_pembimbing1_status`, `seminar_pembimbing2_nama`, `seminar_pembimbing2_status`, `seminar_penguji1_nama`, `seminar_penguji1_status`, `seminar_penguji2_nama`, `seminar_penguji2_status`, `seminar_jenis`, `seminar_status`) VALUES
(2, 'D42115010', '12/29/2019', 3, 'Lab. Ubicon Gedung Elektro', '', '0', '', '1', '', '0', '', '0', 'seminar hasil', ''),
(3, 'D42115510', '12/31/2019', 3, 'Lab. Ubicon Gedung Elektro', '', '0', '', '0', '', '0', '', '0', 'seminar hasil', ''),
(4, 'M011', '02/22/2020', 6, 'Ruang Meeting 12', 'dosen tes 1', 'diterima', 'dosen tes 3', 'diterima', 'dosen tes 6', 'diterima', 'dosen tes 4', 'diterima', 'seminar hasil', 'selesai'),
(5, 'M011', '02/08/2020', 7, 'Ruang Ujian 1', 'dosen tes 1', 'menunggu', 'dosen tes 3', 'menunggu', 'dosen tes 6', 'menunggu', 'dosen tes 4', 'menunggu', 'seminar tutup', 'aktif'),
(6, 'M011', '02/04/2020', 7, 'Ruang Meeting 12', 'dosen tes 1', 'menunggu', 'dosen tes 3', 'menunggu', 'dosen tes 6', 'menunggu', 'dosen tes 4', 'menunggu', 'seminar hasil', 'aktif'),
(7, 'M001', '02/22/2020', 6, 'Ruang Ujian 1', 'dosen tes 1', 'menunggu', 'dosen tes 2', 'menunggu', 'dosen tes 3', 'menunggu', 'dosen tes 4', 'menunggu', 'seminar hasil', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_ujian`
--

CREATE TABLE `tempat_ujian` (
  `tempat_ujian_id` int(11) NOT NULL,
  `tempat_ujian_nama` varchar(100) NOT NULL,
  `tempat_ujian_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_ujian`
--

INSERT INTO `tempat_ujian` (`tempat_ujian_id`, `tempat_ujian_nama`, `tempat_ujian_departemen`) VALUES
(1, 'Lab. Ubicon Gedung Elektro', 'Teknik Informatika'),
(2, 'Ruang Meeting 12', 'departemen tes'),
(3, 'Ruang Ujian 1', 'departemen tes');

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
  `departemen` varchar(64) NOT NULL,
  `jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`, `status`, `departemen`, `jurusan`) VALUES
(4, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'superadmin', '', '', 0),
(11, 'infor1', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'Teknik Informatika', 3),
(12, 'elektro1', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'Teknik Elektro', 3),
(13, 'arsi1', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'Teknik Arsitektur', 1),
(15, '197404262005011002', '21232f297a57a5a743894a0e4a801fc3', 'Adnan, ST., MT.', 'dosen', '', 'Teknik Informatika', 3),
(16, '197310101998021001', '21232f297a57a5a743894a0e4a801fc3', 'Amil Ahmad Ilham, ST., MT., Ph.D.', 'dosen', '', 'Teknik Informatika', 3),
(17, '196012111987031022', '21232f297a57a5a743894a0e4a801fc3', 'Andani, Dr. Ir. MT.', 'dosen', '', 'Teknik Elektro', 3),
(18, 'D42115510', '21232f297a57a5a743894a0e4a801fc3', 'A. Ardiansyah Yusuf', 'mahasiswa', '', 'Teknik Informatika', 0),
(19, 'D42115010', '21232f297a57a5a743894a0e4a801fc3', 'Ryan Rafli', 'mahasiswa', '', 'Teknik Informatika', 0),
(20, '201912222019123001', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes', 'dosen', '', 'Teknik Informatika', 3),
(21, 'D42115002', '21232f297a57a5a743894a0e4a801fc3', 'Said Syamil Amas', 'mahasiswa', '', 'Teknik Informatika', 0),
(22, 'D42115008', '21232f297a57a5a743894a0e4a801fc3', 'Sabtian Juliana', 'mahasiswa', '', 'Teknik Informatika', 0),
(25, 'tes', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'departemen tes', 4),
(26, 'D001', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 1', 'dosen', '', 'departemen tes', 4),
(27, 'D002', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 2', 'dosen', '', 'departemen tes', 4),
(28, 'M001', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 1', 'mahasiswa', '', 'departemen tes', 0),
(29, 'M002', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 2', 'mahasiswa', '', 'departemen tes', 0),
(31, 'M003', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 3', 'mahasiswa', '', 'departemen tes', 0),
(32, 'M004', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 4', 'mahasiswa', '', 'departemen tes', 0),
(33, 'M005', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 5', 'mahasiswa', '', 'departemen tes', 0),
(34, 'M006', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 6', 'mahasiswa', '', 'departemen tes', 0),
(35, 'M007', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 7', 'mahasiswa', '', 'departemen tes', 0),
(36, 'M008', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 8', 'mahasiswa', '', 'departemen tes', 0),
(37, 'M009', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 9', 'mahasiswa', '', 'departemen tes', 0),
(38, 'M010', '21232f297a57a5a743894a0e4a801fc3', 'mahasiswa 10', 'mahasiswa', '', 'departemen tes', 0),
(39, 'D003', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 3', 'dosen', '', 'departemen tes', 4),
(40, 'D004', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 4', 'dosen', '', 'departemen tes', 4),
(41, 'D005', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 5', 'dosen', '', 'departemen tes', 4),
(42, 'D006', '21232f297a57a5a743894a0e4a801fc3', 'dosen tes 6', 'dosen', '', 'departemen tes', 4),
(43, 'M011', '21232f297a57a5a743894a0e4a801fc3', 'Mahasiswa 11', 'mahasiswa', '', 'departemen tes', 0);

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
-- Dumping data for table `waktu_ujian`
--

INSERT INTO `waktu_ujian` (`waktu_ujian_id`, `waktu_mulai`, `waktu_selesai`, `waktu_departemen`) VALUES
(3, '08.00', '10.00', 'Teknik Informatika'),
(4, '10.00', '12.00', 'Teknik Informatika'),
(5, '13.00', '15.00', 'Teknik Informatika'),
(6, '08.00', '09.00', 'departemen tes'),
(7, '09.00', '10.00', 'departemen tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD KEY `jurusan_departemen` (`id_jurusan_departemen`);

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
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

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
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tempat_ujian`
--
ALTER TABLE `tempat_ujian`
  MODIFY `tempat_ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  MODIFY `waktu_ujian_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `jurusan_departemen` FOREIGN KEY (`id_jurusan_departemen`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
