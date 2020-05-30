-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:48 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang_buku` varchar(30) NOT NULL,
  `edisi_buku` varchar(5) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` int(5) NOT NULL,
  `no_rak` varchar(5) NOT NULL,
  `stock_buku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang_buku`, `edisi_buku`, `penerbit`, `tahun_terbit`, `no_rak`, `stock_buku`) VALUES
(1, 'Ekonomi Bisnis Internasional', 'Bayu Pramutoko, SE,MM. dan Ach', '1', 'Jenggala Pustaka Utama', 2016, '1', 1),
(2, 'Ekonomi Mikro', 'Bayu Pramutoko, SE,MM.', '1', 'Jenggala Pustaka Utama', 2016, '2', 1),
(3, 'Manajaemen Pemasaran', 'Jenggala Pustaka Utama', '1', 'Pilar Intermedia', 2016, '3', 1),
(4, 'Perekonomian Indonesia', 'ayu Pramutoko, SE,MM. dan Achm', '1', 'Jenggala Pustaka Utama', 2016, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id_pinjamn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id_pinjamn`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_pinjam`) VALUES
(1, 1708561004, 1, '2020-05-28', '2020-05-30', 0),
(1, 1708561004, 1, '2020-05-28', '2020-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `username`, `password`, `status`) VALUES
(1, 'I Dewa Gede Rama Satya', 'Laki-Laki', '083114321772', 'Tabanan', 'dewarama_satya', '12345678', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
