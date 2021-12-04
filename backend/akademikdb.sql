-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 05:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademikdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absensikpn`
--

CREATE TABLE `t_absensikpn` (
  `absensikpnid` bigint(20) UNSIGNED NOT NULL,
  `matakuliahid` int(11) NOT NULL,
  `mahasiswaid` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_absensikpn`
--

INSERT INTO `t_absensikpn` (`absensikpnid`, `matakuliahid`, `mahasiswaid`, `tgl`) VALUES
(1, 17, 1, '2018-02-01'),
(2, 17, 1, '2018-02-02'),
(3, 17, 1, '2018-02-09'),
(4, 17, 1, '2018-02-10'),
(5, 17, 1, '2018-02-17'),
(6, 17, 1, '2018-02-18'),
(7, 17, 1, '2018-02-25'),
(8, 17, 1, '2018-02-26'),
(9, 28, 1, '2018-08-01'),
(10, 28, 1, '2018-08-02'),
(11, 28, 1, '2018-08-09'),
(12, 28, 1, '2018-08-10'),
(13, 28, 1, '2018-08-17'),
(14, 28, 1, '2018-08-18'),
(15, 28, 1, '2018-08-25'),
(16, 28, 1, '2018-08-26'),
(17, 26, 1, '2018-08-02'),
(18, 26, 1, '2018-08-03'),
(19, 26, 1, '2018-08-10'),
(20, 26, 1, '2018-08-11'),
(21, 26, 1, '2018-08-18'),
(22, 26, 1, '2018-08-19'),
(23, 26, 1, '2018-08-26'),
(24, 26, 1, '2018-08-27'),
(25, 33, 1, '2019-02-01'),
(26, 33, 1, '2019-02-02'),
(27, 33, 1, '2019-02-09'),
(28, 33, 1, '2019-02-10'),
(29, 33, 1, '2019-02-11'),
(30, 33, 1, '2019-02-12'),
(31, 33, 1, '2019-02-19'),
(32, 33, 1, '2019-02-20'),
(33, 37, 1, '2019-08-05'),
(34, 37, 1, '2019-08-06'),
(35, 37, 1, '2019-08-13'),
(36, 37, 1, '2019-08-14'),
(37, 37, 1, '2019-08-21'),
(38, 37, 1, '2019-08-22'),
(39, 37, 1, '2019-08-29'),
(40, 37, 1, '2019-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `t_angkatan`
--

CREATE TABLE `t_angkatan` (
  `angkatanid` bigint(20) UNSIGNED NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_angkatan`
--

INSERT INTO `t_angkatan` (`angkatanid`, `angkatan`, `jenis`, `status`) VALUES
(1, '2021/2022', 'Ganjil', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_fakultas`
--

CREATE TABLE `t_fakultas` (
  `fakultasid` bigint(20) UNSIGNED NOT NULL,
  `fakultas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_fakultas`
--

INSERT INTO `t_fakultas` (`fakultasid`, `fakultas`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `t_historymk`
--

CREATE TABLE `t_historymk` (
  `historymkid` bigint(20) UNSIGNED NOT NULL,
  `mahasiswaid` int(11) NOT NULL,
  `matakuliahid` int(11) NOT NULL,
  `tglujian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_historymk`
--

INSERT INTO `t_historymk` (`historymkid`, `mahasiswaid`, `matakuliahid`, `tglujian`) VALUES
(1, 1, 1, '2017-01-15'),
(2, 1, 2, '2017-01-15'),
(3, 1, 3, '2017-01-17'),
(4, 1, 4, '2017-01-17'),
(5, 1, 5, '2017-01-18'),
(6, 1, 6, '2017-01-18'),
(7, 1, 7, '2017-01-20'),
(8, 1, 8, '2017-01-21'),
(9, 1, 9, '2017-07-15'),
(10, 1, 10, '2017-07-15'),
(11, 1, 11, '2017-07-17'),
(12, 1, 12, '2017-07-17'),
(13, 1, 13, '2017-07-18'),
(14, 1, 14, '2017-07-18'),
(15, 1, 15, '2017-07-20'),
(16, 1, 16, '2018-01-15'),
(17, 1, 17, '2018-01-15'),
(18, 1, 18, '2018-01-17'),
(19, 1, 19, '2018-01-17'),
(20, 1, 20, '2018-01-18'),
(21, 1, 21, '2018-01-18'),
(22, 1, 22, '2018-01-20'),
(23, 1, 23, '2018-07-15'),
(24, 1, 24, '2018-07-15'),
(25, 1, 25, '2018-07-17'),
(26, 1, 26, '2018-07-17'),
(27, 1, 27, '2018-07-18'),
(28, 1, 28, '2018-07-18'),
(29, 1, 29, '2018-07-20'),
(30, 1, 30, '2019-01-15'),
(31, 1, 31, '2019-01-15'),
(32, 1, 32, '2019-01-17'),
(33, 1, 33, '2019-01-17'),
(34, 1, 34, '2019-01-18'),
(35, 1, 35, '2019-01-18'),
(36, 1, 36, '2019-01-20'),
(37, 1, 37, '2019-07-15'),
(38, 1, 38, '2019-07-15'),
(39, 1, 39, '2019-07-17'),
(40, 1, 40, '2019-07-17'),
(41, 1, 41, '2019-07-18'),
(42, 1, 42, '2019-07-18'),
(43, 1, 43, '2019-07-20'),
(44, 1, 44, '2019-07-23'),
(45, 1, 45, '2020-01-15'),
(46, 1, 46, '2020-01-15'),
(47, 1, 47, '2020-01-17'),
(48, 1, 48, '2020-01-17'),
(49, 1, 49, '2020-01-18'),
(50, 1, 50, '2020-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `jurusanid` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `fakultasid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`jurusanid`, `jurusan`, `fakultasid`) VALUES
(1, 'Teknik Informatika', 1),
(2, 'Sistem Informasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `mahasiswaid` bigint(20) UNSIGNED NOT NULL,
  `npm` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tmplahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `jurusanid` int(11) NOT NULL,
  `asalsekolah` varchar(5) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`mahasiswaid`, `npm`, `nama`, `jk`, `alamat`, `nohp`, `email`, `tmplahir`, `tgllahir`, `angkatan`, `jurusanid`, `asalsekolah`, `photo`) VALUES
(1, '216001', 'Andi Marpaung', 'Pria', 'Jl Sado no 5 Medan', '08111222333', 'andi@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/andi.jpg'),
(2, '216002', 'Iwan Karo Karo', 'Pria', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/iwan.jpg'),
(3, '216003', 'Ratna Murni Pakpahan', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/ratna.jpg'),
(4, '216004', 'Siti Khadijah', 'Wanita', 'Jl Bunga Tulip 13 Medan', '08111222333', 'siti@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/siti.jpg'),
(5, '216005', 'Iwan A', 'Pria', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/iwan.jpg'),
(6, '216006', 'Ratna A', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Sidikalang', '2001-01-01', '2016', 1, 'SMK', 'images/ratna.jpg'),
(7, '216007', 'Siti A', 'Wanita', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/mahasiswa/iwan.jpg'),
(8, '216008', 'Ratna A', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/mahasiswa/ratna.jpg'),
(9, '216009', 'Iwan B', 'Pria', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Siantar', '2001-01-01', '2016', 1, 'SMA', 'images/iwan.jpg'),
(10, '216010', 'Ratna B', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/mahasiswa/ratna.jpg'),
(11, '216011', 'Siti B', 'Wanita', 'Jl Bunga Tulip 13 Medan', '08111222333', 'siti@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/mahasiswa/siti.jpg'),
(12, '216011', 'Andi B', 'Pria', 'Jl Bunga Tulip 13 Medan', '08111222333', 'siti@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/siti.jpg'),
(13, '216005', 'Iwan C', 'Pria', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/iwan.jpg'),
(14, '216006', 'Ratna C', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Siantar', '2001-01-01', '2016', 1, 'SMK', 'images/ratna.jpg'),
(15, '216007', 'Siti C', 'Wanita', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMA', 'images/iwan.jpg'),
(16, '216008', 'Andi C', 'Pria', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/ratna.jpg'),
(17, '216009', 'Iwan D', 'Pria', 'Jl Tangguk Bongkar VII no 15 Medan', '08111222333', 'iwan@marpaung.com', 'Tebing Tinggi', '2001-01-01', '2016', 1, 'SMA', 'images/iwan.jpg'),
(18, '216010', 'Ratna D', 'Wanita', 'Jl Karya 245 Medan', '08111222333', 'ratna@marpaung.com', 'Sibolga', '2001-01-01', '2016', 1, 'SMK', 'images/ratna.jpg'),
(19, '216011', 'Siti D', 'Wanita', 'Jl Bunga Tulip 13 Medan', '08111222333', 'siti@marpaung.com', 'Sibolga', '2001-01-01', '2016', 1, 'SMK', 'images/siti.jpg'),
(20, '216011', 'Andi D', 'Pria', 'Jl Bunga Tulip 13 Medan', '08111222333', 'siti@marpaung.com', 'Medan', '2001-01-01', '2016', 1, 'SMK', 'images/siti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_matakuliah`
--

CREATE TABLE `t_matakuliah` (
  `matakuliahid` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `jurusanid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_matakuliah`
--

INSERT INTO `t_matakuliah` (`matakuliahid`, `kode`, `nama`, `sks`, `sem`, `jurusanid`) VALUES
(1, 'MPK0102', 'Pendidikan Pancasila', 2, 1, 1),
(2, 'MPK0202', 'Bahasa Indonesia', 2, 1, 1),
(3, 'INFO0113', 'Matematika Dasar', 3, 1, 1),
(4, 'INFO0213', 'Aljabar Linear', 3, 1, 1),
(5, 'INFO0313', 'Statistika', 3, 1, 1),
(6, 'INFO0413', 'Pengantar Teknik Informatika', 3, 1, 1),
(7, 'INF0512', 'Komunikasi Interpersonal', 2, 1, 1),
(8, 'INF0613', 'Pengantar Sistem Informasi', 3, 1, 1),
(9, 'MPK0302', 'Pendidikan Kewarganegaraan', 2, 2, 1),
(10, 'MPK0402', 'Pendidikan Agama', 2, 2, 1),
(11, 'INF0723', 'Kalkulus', 3, 2, 1),
(12, 'INF0823', 'Matematika Diskrit', 3, 2, 1),
(13, 'INF0924', 'Sistem Digital', 4, 2, 1),
(14, 'INF1023', 'Pemikiran Desain dan Kreativitas', 3, 2, 1),
(15, 'INF1124', 'Dasar Pemrograman', 4, 2, 1),
(16, 'INF1234', 'Struktur Data dan Algoritma', 4, 3, 1),
(17, 'INF1333', 'Kecerdasan Buatan', 3, 3, 1),
(18, 'INF1432', 'Dasar Multimedia', 2, 3, 1),
(19, 'INF1533', 'Arsitektur Komputer', 3, 3, 1),
(20, 'INF1633', 'Dasar Keamanan Sistem', 3, 3, 1),
(21, 'INF1732', 'Bahasa Inggris Umum', 2, 3, 1),
(22, 'INF1833', 'Pemrograman Berorientasi Objek', 3, 3, 1),
(23, 'INF1943', 'Basis data', 3, 4, 1),
(24, 'INF2043', 'Jaringan Komputer', 3, 4, 1),
(25, 'INF2143', 'Rekayasa Perangkat Lunak', 3, 4, 1),
(26, 'INF2243', 'Sistem Operasi', 3, 4, 1),
(27, 'INF2343', 'Perancangan dan Analisis Algor', 3, 4, 1),
(28, 'INF2443', 'Teori Bahasa dan Otomata', 3, 4, 1),
(29, 'INF2542', 'Bahasa Inggris Khusus', 2, 4, 1),
(30, 'INF2653', 'Manajemen Projek Perangkat Lun', 3, 5, 1),
(31, 'INF2753', 'Interaksi Manusia dan Komputer', 3, 5, 1),
(32, 'INF2853', 'Analisis dan Pengolahan Data', 3, 5, 1),
(33, 'INF2953', 'Pengembangan Aplikasi Web', 3, 5, 1),
(34, 'INF3053', 'Pengembangan Berbasis Platform', 3, 5, 1),
(35, 'INF3153', 'Pengujian Perangkat Lunak', 3, 5, 1),
(36, 'INF3253', 'Bahasa Inggris Khusus', 3, 5, 1),
(37, 'INF3363', 'Grafika Komputer', 3, 6, 1),
(38, 'INF3464', 'Projek Pengembangan Perangkat Lunak', 4, 6, 1),
(39, 'INF3562', 'Technopreneurship', 2, 6, 1),
(40, 'INF3662', 'Kuliah Kerja Nyata', 2, 6, 1),
(41, 'INF3763', 'Sosio Informatika', 3, 6, 1),
(42, 'INF3861', 'Kuliah Lapangan', 1, 6, 1),
(43, 'INX001', 'Mata Kuliah Pilihan 1', 3, 6, 1),
(44, 'INX002', 'Mata Kuliah Pilihan 2', 3, 6, 1),
(45, 'INF3973', 'Penulisan Proposal Tugas Akhir', 3, 7, 1),
(46, 'INX003', 'Mata Kuliah Pilihan 3', 3, 7, 1),
(47, 'INX004', 'Mata Kuliah Pilihan 4', 3, 7, 1),
(48, 'INX005', 'Mata Kuliah Pilihan 5', 3, 7, 1),
(49, 'INF4082', 'Praktek Kerja Lapangan', 3, 8, 1),
(50, 'INF4286', 'Tugas Akhir', 3, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_nilaimk`
--

CREATE TABLE `t_nilaimk` (
  `nilaimkid` bigint(20) UNSIGNED NOT NULL,
  `mahasiswaid` int(11) NOT NULL,
  `matakuliahid` int(11) NOT NULL,
  `na` int(11) NOT NULL,
  `nh` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_nilaimk`
--

INSERT INTO `t_nilaimk` (`nilaimkid`, `mahasiswaid`, `matakuliahid`, `na`, `nh`) VALUES
(1, 1, 1, 80, 'B'),
(2, 1, 2, 85, 'A'),
(3, 1, 3, 90, 'A'),
(4, 1, 4, 85, 'A'),
(5, 1, 5, 80, 'B'),
(6, 1, 6, 80, 'B'),
(7, 1, 7, 80, 'B'),
(8, 1, 8, 65, 'C'),
(9, 1, 9, 85, 'A'),
(10, 1, 10, 80, 'B'),
(11, 1, 11, 85, 'A'),
(12, 1, 12, 80, 'B'),
(13, 1, 13, 80, 'B'),
(14, 1, 14, 80, 'B'),
(15, 1, 15, 85, 'A'),
(16, 1, 16, 80, 'B'),
(17, 1, 17, 90, 'A'),
(18, 1, 18, 80, 'B'),
(19, 1, 19, 65, 'C'),
(20, 1, 20, 80, 'B'),
(21, 1, 21, 60, 'C'),
(22, 1, 22, 65, 'C'),
(23, 1, 23, 65, 'C'),
(24, 1, 24, 80, 'B'),
(25, 1, 25, 80, 'B'),
(26, 1, 26, 80, 'B'),
(27, 1, 27, 80, 'B'),
(28, 1, 28, 85, 'A'),
(29, 1, 29, 85, 'A'),
(30, 1, 30, 85, 'A'),
(31, 1, 31, 80, 'B'),
(32, 1, 32, 80, 'B'),
(33, 1, 33, 85, 'A'),
(34, 1, 34, 80, 'B'),
(35, 1, 35, 80, 'B'),
(36, 1, 36, 80, 'B'),
(37, 1, 37, 85, 'A'),
(38, 1, 38, 80, 'B'),
(39, 1, 39, 80, 'B'),
(40, 1, 40, 90, 'A'),
(41, 1, 41, 90, 'A'),
(42, 1, 42, 80, 'B'),
(43, 1, 43, 85, 'A'),
(44, 1, 44, 80, 'B'),
(45, 1, 45, 80, 'B'),
(46, 1, 46, 80, 'B'),
(47, 1, 47, 80, 'B'),
(48, 1, 48, 85, 'A'),
(49, 1, 49, 85, 'A'),
(50, 1, 50, 80, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `pembayaranid` bigint(20) UNSIGNED NOT NULL,
  `mahasiswaid` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `cicilanke` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`pembayaranid`, `mahasiswaid`, `sem`, `ta`, `cicilanke`, `nilai`, `sisa`, `denda`, `tgl`, `bukti`) VALUES
(49, 1, 1, 2016, 1, 750000, 750000, 0, '2016-07-01', 'pembayaran/bukti.jpg'),
(50, 1, 1, 2016, 2, 750000, 0, 0, '2016-09-01', 'pembayaran/bukti.jpg'),
(51, 1, 2, 2016, 1, 1500000, 0, 0, '2017-02-01', 'pembayaran/bukti.jpg'),
(52, 1, 3, 2017, 1, 1500000, 0, 100000, '2017-10-01', 'pembayaran/bukti.jpg'),
(53, 1, 4, 2017, 1, 750000, 750000, 0, '2018-02-01', 'pembayaran/bukti.jpg'),
(54, 1, 4, 2017, 2, 750000, 0, 0, '2018-04-01', 'pembayaran/bukti.jpg'),
(55, 1, 5, 2018, 1, 750000, 750000, 0, '2018-07-01', 'pembayaran/bukti.jpg'),
(56, 1, 5, 2018, 2, 750000, 0, 0, '2018-09-01', 'pembayaran/bukti.jpg'),
(57, 1, 6, 2018, 1, 750000, 750000, 100000, '2019-03-01', 'pembayaran/bukti.jpg'),
(58, 1, 6, 2018, 2, 750000, 0, 0, '2019-04-01', 'pembayaran/bukti.jpg'),
(59, 1, 7, 2019, 1, 1500000, 0, 0, '2019-07-01', 'pembayaran/bukti.jpg'),
(60, 1, 8, 2019, 1, 1500000, 0, 0, '2020-02-01', 'pembayaran/bukti.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_absensikpn`
--
ALTER TABLE `t_absensikpn`
  ADD UNIQUE KEY `absensikpnid` (`absensikpnid`);

--
-- Indexes for table `t_angkatan`
--
ALTER TABLE `t_angkatan`
  ADD UNIQUE KEY `angkatanid` (`angkatanid`);

--
-- Indexes for table `t_fakultas`
--
ALTER TABLE `t_fakultas`
  ADD UNIQUE KEY `fakultasid` (`fakultasid`);

--
-- Indexes for table `t_historymk`
--
ALTER TABLE `t_historymk`
  ADD UNIQUE KEY `historymkid` (`historymkid`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD UNIQUE KEY `jurusanid` (`jurusanid`);

--
-- Indexes for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD UNIQUE KEY `mahasiswaid` (`mahasiswaid`);

--
-- Indexes for table `t_matakuliah`
--
ALTER TABLE `t_matakuliah`
  ADD UNIQUE KEY `matakuliahid` (`matakuliahid`);

--
-- Indexes for table `t_nilaimk`
--
ALTER TABLE `t_nilaimk`
  ADD UNIQUE KEY `nilaimkid` (`nilaimkid`);

--
-- Indexes for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD UNIQUE KEY `pembayaranid` (`pembayaranid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_absensikpn`
--
ALTER TABLE `t_absensikpn`
  MODIFY `absensikpnid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `t_angkatan`
--
ALTER TABLE `t_angkatan`
  MODIFY `angkatanid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_fakultas`
--
ALTER TABLE `t_fakultas`
  MODIFY `fakultasid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_historymk`
--
ALTER TABLE `t_historymk`
  MODIFY `historymkid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  MODIFY `jurusanid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  MODIFY `mahasiswaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_matakuliah`
--
ALTER TABLE `t_matakuliah`
  MODIFY `matakuliahid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_nilaimk`
--
ALTER TABLE `t_nilaimk`
  MODIFY `nilaimkid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `pembayaranid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
