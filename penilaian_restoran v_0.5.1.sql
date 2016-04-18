-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 01:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penilaian_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `ID_JABATAN` int(11) NOT NULL,
  `ID_JABATAN_ATASAN` int(11) DEFAULT NULL,
  `NAMA_JABATAN` varchar(100) DEFAULT NULL,
  `GOLONGAN` varchar(20) DEFAULT NULL,
  `AKSES` varchar(20) DEFAULT NULL,
  `LEVEL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `ID_JABATAN_ATASAN`, `NAMA_JABATAN`, `GOLONGAN`, `AKSES`, `LEVEL`) VALUES
(1, 1, 'OWNER', 'GOLONGAN 1', 'OWNER', 1),
(2, 1, 'RESTORAN MANAGER', 'GOLONGAN 2', 'RESTORAN_MANAGER', 2),
(3, 2, 'ASSISTEN RESTORAN MANAGER', 'GOLONGAN 3', 'ASSISTEN_RESTORAN_MA', 3),
(4, 3, 'SHIFT LEADER', 'GOLONGAN 4', 'SHIFT_LEADER', 4),
(5, 5, 'CREW', 'GOLONGAN 5', 'CREW', 5);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `ID_KARYAWAN` varchar(15) NOT NULL,
  `ID_JABATAN` int(11) DEFAULT NULL,
  `ID_OUTLET` int(11) DEFAULT NULL,
  `NAMA_KARYAWAN` varchar(100) DEFAULT NULL,
  `STATUS_KARYAWAN` varchar(20) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `ID_JABATAN`, `ID_OUTLET`, `NAMA_KARYAWAN`, `STATUS_KARYAWAN`, `JENIS_KELAMIN`, `PASSWORD`) VALUES
('1000000001', 1, 1, 'RUDI HARTONO', 'OWNER', 'PRIA', '1a04ea854cd4a13d9956cc10bc38d720'),
('1122334410', 2, 2, 'ZAINUDIN', 'TETAP', 'PRIA', 'cd07ebfc2437c048c5ac248983a549c2'),
('1122334411', 3, 2, 'BAHARUDIN', 'TETAP', 'PRIA', '1c07d3a99566853eead01363c8362bad'),
('1122334412', 4, 2, 'HALIM', 'TETAP', 'PRIA', 'ba35c24cd35f93cbffa6414aae6e1cd7'),
('1122334413', 5, 2, 'ANDIKA', 'KONTRAK', 'PRIA', 'f214bb7e7a7768a11ed9847ae1f06e07'),
('1122334414', 5, 2, 'JOHNSON', 'KONTRAK', 'PRIA', '42f3c18809f26a299b41eab47ceb6eb5'),
('1122334415', 5, 2, 'RUDIANTO', 'KONTRAK', 'PRIA', '015eb8f2a830dbe845f278258eb4541e'),
('1122334416', 2, 3, 'NOVITASARI', 'TETAP', 'WANITA', '212bad0c2168c6eb74164cfae34b1e96'),
('1122334417', 3, 3, 'ALBERT', 'TETAP', 'PRIA', '4765a6b42cfc0a75a9016ea3600cafef'),
('1122334418', 4, 3, 'HARIS', 'TETAP', 'PRIA', '805a6e1b2f528d21fa51625451f407ad'),
('1122334419', 5, 3, 'HUDA', 'KONTRAK', 'PRIA', 'da9a3799cc9f6816f999f2ff19ad3f29'),
('1122334420', 5, 3, 'PRASETYA', 'KONTRAK', 'PRIA', '7c7013fd595f4de30444006a3cff09fe');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelatihan`
--

CREATE TABLE IF NOT EXISTS `kategori_pelatihan` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'KATEGORI 1'),
(2, 'KATEGORI 2');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE IF NOT EXISTS `kehadiran` (
  `ID_KEHADIRAN` int(11) NOT NULL,
  `ID_PERIODE2` int(11) DEFAULT NULL,
  `ID_KARYAWAN` varchar(15) DEFAULT NULL,
  `TERLAMBAT` varchar(100) DEFAULT NULL,
  `ABSEN` varchar(100) DEFAULT NULL,
  `SAKIT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`ID_KEHADIRAN`, `ID_PERIODE2`, `ID_KARYAWAN`, `TERLAMBAT`, `ABSEN`, `SAKIT`) VALUES
(1, 1, '1122334416', '0', '1', '0'),
(2, 1, '1122334417', '0', '0', '5'),
(3, 1, '1122334418', '2', '0', '0'),
(4, 1, '1122334419', '0', '1', '0'),
(5, 1, '1122334420', '2', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `NAMA_KRITERIA` varchar(100) DEFAULT NULL,
  `BOBOT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `NAMA_KRITERIA`, `BOBOT`) VALUES
(1, 'KRITERIA 1', '20'),
(2, 'KRITERIA 2', '40');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian`
--

CREATE TABLE IF NOT EXISTS `kriteria_penilaian` (
  `ID_KRITERIA` int(11) NOT NULL,
  `ID_PELATIHAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian_karyawan`
--

CREATE TABLE IF NOT EXISTS `kriteria_penilaian_karyawan` (
  `ID_KRITERIA` int(11) NOT NULL,
  `ID_PENILAIAN` int(11) NOT NULL,
  `NILAI` int(11) DEFAULT NULL,
  `DASAR_PENILAIAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_penilaian_karyawan`
--

INSERT INTO `kriteria_penilaian_karyawan` (`ID_KRITERIA`, `ID_PENILAIAN`, `NILAI`, `DASAR_PENILAIAN`) VALUES
(1, 1, 80, 'nilai kriteria 1 dari saudara huda bagus'),
(1, 2, 90, 'pada kriteria 1 saudara prasetya mempunyai nilai yang sangat bagus'),
(1, 3, 80, 'nilai huda hanya bagus'),
(1, 4, 90, 'nilainya sangat bagus'),
(1, 5, 80, 'kinerja yang bagus dari haris'),
(1, 6, 75, 'kinerja agak menurun'),
(2, 1, 65, 'pada kriteria 2 saudara huda mempunyai nilai cukup bagus'),
(2, 2, 70, 'pada kriteria 2 saudara prasetya mempunyai nilai yang cukup bagus'),
(2, 3, 85, 'nilai huda bagus'),
(2, 4, 85, 'nilanya bagus'),
(2, 5, 90, 'usaha yang sangat bagus sekali'),
(2, 6, 75, 'usahanya juga menurun');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE IF NOT EXISTS `outlet` (
  `ID_OUTLET` int(11) NOT NULL,
  `NAMA_OUTLET` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`ID_OUTLET`, `NAMA_OUTLET`) VALUES
(1, 'PUSAT'),
(2, 'OUTLET 1'),
(3, 'OUTLET 2');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `ID_PELATIHAN` int(11) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_PELATIHAN` varchar(100) DEFAULT NULL,
  `KETERANGAN_PELATIHAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`ID_PELATIHAN`, `ID_KATEGORI`, `NAMA_PELATIHAN`, `KETERANGAN_PELATIHAN`) VALUES
(1, 1, 'PELATIHAN 1', 'INI PELATIHAN 1 BRO');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `ID_PENILAIAN` int(11) NOT NULL,
  `ID_PERIODE2` int(11) DEFAULT NULL,
  `ID_KARYAWAN` varchar(15) DEFAULT NULL,
  `KAR_ID_KARYAWAN` varchar(15) DEFAULT NULL,
  `KETERANGAN_PENILAIAN` varchar(100) DEFAULT NULL,
  `PENILAIAN_TOTAL` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`ID_PENILAIAN`, `ID_PERIODE2`, `ID_KARYAWAN`, `KAR_ID_KARYAWAN`, `KETERANGAN_PENILAIAN`, `PENILAIAN_TOTAL`) VALUES
(1, 1, '1122334418', '1122334419', '', '42'),
(2, 1, '1122334418', '1122334420', '', '46'),
(3, 2, '1122334418', '1122334419', '', '50'),
(4, 2, '1122334418', '1122334420', '', '52'),
(5, 1, '1122334417', '1122334418', '', '52'),
(6, 2, '1122334417', '1122334418', '', '45');

-- --------------------------------------------------------

--
-- Table structure for table `periode_kehadiran_dan_penilaian`
--

CREATE TABLE IF NOT EXISTS `periode_kehadiran_dan_penilaian` (
  `ID_PERIODE2` int(11) NOT NULL,
  `NAMA_PERIODE` varchar(50) DEFAULT NULL,
  `AWAL` date DEFAULT NULL,
  `AKHIR` date DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_kehadiran_dan_penilaian`
--

INSERT INTO `periode_kehadiran_dan_penilaian` (`ID_PERIODE2`, `NAMA_PERIODE`, `AWAL`, `AKHIR`, `KETERANGAN`) VALUES
(1, 'JANUARI 2016/2017', '2016-01-01', '2017-01-31', 'PERIODE JANUARI 2016/2017'),
(2, 'FEBRUARI 2016/2017', '2016-02-01', '2017-02-28', 'PERIODE FEBRUARI 2016/2017'),
(3, 'MARET 2016/2017', '2016-03-01', '2017-03-31', 'PERIODE MARET 2016/2017');

-- --------------------------------------------------------

--
-- Table structure for table `range_kriteria`
--

CREATE TABLE IF NOT EXISTS `range_kriteria` (
  `ID_RANGE_KRITERIA` int(11) NOT NULL,
  `ID_KRITERIA` int(11) DEFAULT NULL,
  `NILAI_RANGE_KRITERIA` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KRITERIA` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range_kriteria`
--

INSERT INTO `range_kriteria` (`ID_RANGE_KRITERIA`, `ID_KRITERIA`, `NILAI_RANGE_KRITERIA`, `DESKRIPSI_KRITERIA`) VALUES
(1, 1, '30 - 40', 'SANGAT BURUK'),
(2, 1, '45 - 55', 'BURUK'),
(3, 1, '60 - 70', 'CUKUP'),
(4, 2, '30 - 40', 'SANGAT BURUK'),
(6, 1, '75 - 85', 'BAGUS'),
(7, 1, '90 - 100', 'SANGAT BAGUS'),
(8, 2, '45 - 55', 'BURUK'),
(9, 2, '60 - 70', 'CUKUP'),
(10, 2, '75 - 85', 'BAGUS'),
(11, 2, '90 - 100', 'SANGAT BAGUS');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_pelatihan`
--

CREATE TABLE IF NOT EXISTS `rekomendasi_pelatihan` (
  `ID_PELATIHAN` int(11) NOT NULL,
  `ID_PENILAIAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`), ADD KEY `FK_REFERENCE_16` (`ID_JABATAN_ATASAN`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`), ADD KEY `FK_MEMILIKI_3` (`ID_JABATAN`), ADD KEY `FK_MENGISI` (`ID_OUTLET`);

--
-- Indexes for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`ID_KEHADIRAN`), ADD KEY `FK_MEMILIKI` (`ID_PERIODE2`), ADD KEY `FK_MEMPUNYAI` (`ID_KARYAWAN`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indexes for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD PRIMARY KEY (`ID_KRITERIA`,`ID_PELATIHAN`), ADD KEY `FK_KRITERIA_PENILAIAN2` (`ID_PELATIHAN`);

--
-- Indexes for table `kriteria_penilaian_karyawan`
--
ALTER TABLE `kriteria_penilaian_karyawan`
  ADD PRIMARY KEY (`ID_KRITERIA`,`ID_PENILAIAN`), ADD KEY `FK_RELATIONSHIP_15` (`ID_PENILAIAN`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`ID_OUTLET`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`ID_PELATIHAN`), ADD KEY `FK_RELATIONSHIP_14` (`ID_KATEGORI`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`ID_PENILAIAN`), ADD KEY `FK_MEMILIKI_2` (`KAR_ID_KARYAWAN`), ADD KEY `FK_RELATIONSHIP_10` (`ID_KARYAWAN`), ADD KEY `FK_RELATIONSHIP_12` (`ID_PERIODE2`);

--
-- Indexes for table `periode_kehadiran_dan_penilaian`
--
ALTER TABLE `periode_kehadiran_dan_penilaian`
  ADD PRIMARY KEY (`ID_PERIODE2`);

--
-- Indexes for table `range_kriteria`
--
ALTER TABLE `range_kriteria`
  ADD PRIMARY KEY (`ID_RANGE_KRITERIA`), ADD KEY `FK_RELATIONSHIP_9` (`ID_KRITERIA`);

--
-- Indexes for table `rekomendasi_pelatihan`
--
ALTER TABLE `rekomendasi_pelatihan`
  ADD PRIMARY KEY (`ID_PELATIHAN`,`ID_PENILAIAN`), ADD KEY `FK_MEREKOMENDASIKAN2` (`ID_PENILAIAN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`ID_JABATAN_ATASAN`) REFERENCES `jabatan` (`ID_JABATAN`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
ADD CONSTRAINT `FK_MEMILIKI_3` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`),
ADD CONSTRAINT `FK_MENGISI` FOREIGN KEY (`ID_OUTLET`) REFERENCES `outlet` (`ID_OUTLET`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_PERIODE2`) REFERENCES `periode_kehadiran_dan_penilaian` (`ID_PERIODE2`),
ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Constraints for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
ADD CONSTRAINT `FK_KRITERIA_PENILAIAN` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`),
ADD CONSTRAINT `FK_KRITERIA_PENILAIAN2` FOREIGN KEY (`ID_PELATIHAN`) REFERENCES `pelatihan` (`ID_PELATIHAN`);

--
-- Constraints for table `kriteria_penilaian_karyawan`
--
ALTER TABLE `kriteria_penilaian_karyawan`
ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`),
ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_PENILAIAN`) REFERENCES `penilaian` (`ID_PENILAIAN`);

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_pelatihan` (`ID_KATEGORI`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
ADD CONSTRAINT `FK_MEMILIKI_2` FOREIGN KEY (`KAR_ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_PERIODE2`) REFERENCES `periode_kehadiran_dan_penilaian` (`ID_PERIODE2`);

--
-- Constraints for table `range_kriteria`
--
ALTER TABLE `range_kriteria`
ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`);

--
-- Constraints for table `rekomendasi_pelatihan`
--
ALTER TABLE `rekomendasi_pelatihan`
ADD CONSTRAINT `FK_MEREKOMENDASIKAN` FOREIGN KEY (`ID_PELATIHAN`) REFERENCES `pelatihan` (`ID_PELATIHAN`),
ADD CONSTRAINT `FK_MEREKOMENDASIKAN2` FOREIGN KEY (`ID_PENILAIAN`) REFERENCES `penilaian` (`ID_PENILAIAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
