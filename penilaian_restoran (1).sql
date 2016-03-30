-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 04:15 PM
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
  `ID_JABATAN` varchar(20) NOT NULL,
  `NAMA_JABATAN` varchar(100) DEFAULT NULL,
  `GOLONGAN` varchar(20) DEFAULT NULL,
  `AKSES` varchar(20) DEFAULT NULL,
  `LEVEL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA_JABATAN`, `GOLONGAN`, `AKSES`, `LEVEL`) VALUES
('1', 'ADMIN', 'GOLONGAN 1', 'ADMINISTRATOR', 1),
('2', 'USER', 'GOLONGAN 3', 'USER', 3);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `ID_KARYAWAN` varchar(20) NOT NULL,
  `ID_JABATAN` varchar(20) DEFAULT NULL,
  `ID_OUTLET` varchar(20) DEFAULT NULL,
  `NAMA_KARYAWAN` varchar(100) DEFAULT NULL,
  `STATUS_KARYAWAN` varchar(20) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(50) DEFAULT NULL,
  `USERNAME2` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `ID_JABATAN`, `ID_OUTLET`, `NAMA_KARYAWAN`, `STATUS_KARYAWAN`, `JENIS_KELAMIN`, `USERNAME2`, `PASSWORD`) VALUES
('1', '1', '1', 'MUNIR AGUNG W.', 'TETAP', 'PRIA', 'MUNIR_AGUNG', '248559d155719fb84b887e83cdaab532'),
('2', '2', '2', 'ACHMAD AINUL YAQIN', 'TETAP', 'PRIA', 'Ainul_yaqin_jabrek', 'd41d8cd98f00b204e9800998ecf8427e'),
('3', '2', '1', 'ALMALIKUZ ZAHIR', 'KONTRAK', 'PRIA', 'zahir', 'b83cf0a21448176623feb48e7af3a59a');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelatihan`
--

CREATE TABLE IF NOT EXISTS `kategori_pelatihan` (
  `ID_KATEGORI` varchar(20) NOT NULL,
  `NAMA_KATEGORI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('1', 'KATEGORI 1'),
('2', 'KATEGORI 2');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE IF NOT EXISTS `kehadiran` (
  `ID_KEHADIRAN` varchar(10) NOT NULL,
  `ID_PERIODE2` varchar(15) DEFAULT NULL,
  `ID_KARYAWAN` varchar(20) DEFAULT NULL,
  `TERLAMBAT` varchar(100) DEFAULT NULL,
  `ABSEN` varchar(100) DEFAULT NULL,
  `SAKIT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`ID_KEHADIRAN`, `ID_PERIODE2`, `ID_KARYAWAN`, `TERLAMBAT`, `ABSEN`, `SAKIT`) VALUES
('1', '1', '1', '1', '8', '1'),
('2', '1', '3', '4', '4', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `ID_KRITERIA` varchar(10) NOT NULL,
  `ID_RANGE_KRITERIA` varchar(10) DEFAULT NULL,
  `NAMA_KRITERIA` varchar(100) DEFAULT NULL,
  `BOBOT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `ID_RANGE_KRITERIA`, `NAMA_KRITERIA`, `BOBOT`) VALUES
('1', '1', 'KRITERIA 1', '80');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian`
--

CREATE TABLE IF NOT EXISTS `kriteria_penilaian` (
  `ID_KRITERIA` varchar(10) NOT NULL,
  `ID_PELATIHAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian_karyawan`
--

CREATE TABLE IF NOT EXISTS `kriteria_penilaian_karyawan` (
  `ID_KRITERIA` varchar(10) NOT NULL,
  `ID_PENILAIAN` varchar(15) NOT NULL,
  `NILAI` varchar(20) DEFAULT NULL,
  `DASAR_PENILAIAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE IF NOT EXISTS `outlet` (
  `ID_OUTLET` varchar(20) NOT NULL,
  `NAMA_OUTLET` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`ID_OUTLET`, `NAMA_OUTLET`) VALUES
('1', 'OUTLET 1'),
('2', 'OUTLET 2');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `ID_PELATIHAN` varchar(10) NOT NULL,
  `ID_KATEGORI` varchar(20) DEFAULT NULL,
  `NAMA_PELATIHAN` varchar(100) DEFAULT NULL,
  `KETERANGAN_PELATIHAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`ID_PELATIHAN`, `ID_KATEGORI`, `NAMA_PELATIHAN`, `KETERANGAN_PELATIHAN`) VALUES
('1', '1', 'PELATIHAN 1', 'INI PELATIHAN 1 BRO');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `ID_PENILAIAN` varchar(15) NOT NULL,
  `ID_PERIODE2` varchar(15) DEFAULT NULL,
  `ID_KARYAWAN` varchar(20) DEFAULT NULL,
  `KAR_ID_KARYAWAN` varchar(20) DEFAULT NULL,
  `KETERANGAN_PENILAIAN` varchar(100) DEFAULT NULL,
  `PENILAIAN_TOTAL` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode_kehadiran_dan_penilaian`
--

CREATE TABLE IF NOT EXISTS `periode_kehadiran_dan_penilaian` (
  `ID_PERIODE2` varchar(15) NOT NULL,
  `NAMA_PERIODE` varchar(50) DEFAULT NULL,
  `AWAL` date DEFAULT NULL,
  `AKHIR` date DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_kehadiran_dan_penilaian`
--

INSERT INTO `periode_kehadiran_dan_penilaian` (`ID_PERIODE2`, `NAMA_PERIODE`, `AWAL`, `AKHIR`, `KETERANGAN`) VALUES
('1', '2016', '2016-01-01', '2016-12-31', 'PERIODE SETAHUN DI TAHUN 2016'),
('2', '2018', '2018-01-01', '2018-12-31', 'PERIODE TAHUN 2018');

-- --------------------------------------------------------

--
-- Table structure for table `range_kriteria`
--

CREATE TABLE IF NOT EXISTS `range_kriteria` (
  `ID_RANGE_KRITERIA` varchar(10) NOT NULL,
  `NILAI_RANGE_KRITERIA` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KRITERIA` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range_kriteria`
--

INSERT INTO `range_kriteria` (`ID_RANGE_KRITERIA`, `NILAI_RANGE_KRITERIA`, `DESKRIPSI_KRITERIA`) VALUES
('1', '1 - 100', 'RANGE PERTAMA'),
('2', '101 - 200', 'RANGE KEDUA');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_pelatihan`
--

CREATE TABLE IF NOT EXISTS `rekomendasi_pelatihan` (
  `ID_PELATIHAN` varchar(10) NOT NULL,
  `ID_PENILAIAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

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
  ADD PRIMARY KEY (`ID_KRITERIA`), ADD KEY `FK_RELATIONSHIP_9` (`ID_RANGE_KRITERIA`);

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
  ADD PRIMARY KEY (`ID_RANGE_KRITERIA`);

--
-- Indexes for table `rekomendasi_pelatihan`
--
ALTER TABLE `rekomendasi_pelatihan`
  ADD PRIMARY KEY (`ID_PELATIHAN`,`ID_PENILAIAN`), ADD KEY `FK_MEREKOMENDASIKAN2` (`ID_PENILAIAN`);

--
-- Constraints for dumped tables
--

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
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_RANGE_KRITERIA`) REFERENCES `range_kriteria` (`ID_RANGE_KRITERIA`);

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
-- Constraints for table `rekomendasi_pelatihan`
--
ALTER TABLE `rekomendasi_pelatihan`
ADD CONSTRAINT `FK_MEREKOMENDASIKAN` FOREIGN KEY (`ID_PELATIHAN`) REFERENCES `pelatihan` (`ID_PELATIHAN`),
ADD CONSTRAINT `FK_MEREKOMENDASIKAN2` FOREIGN KEY (`ID_PENILAIAN`) REFERENCES `penilaian` (`ID_PENILAIAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
