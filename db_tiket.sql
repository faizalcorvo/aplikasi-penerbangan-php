-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 10:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `email`, `foto`, `akses`) VALUES
(1, 'ardii', 'admin1', 'Faizal Ardi', 'faizalardi@gmail.com', 'avatar6.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti`
--

CREATE TABLE `tb_bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukti`
--

INSERT INTO `tb_bukti` (`id_bukti`, `id_pesan`, `file`) VALUES
(1, 1, 'Bukti.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daerah`
--

CREATE TABLE `tb_daerah` (
  `id_provinsi` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `nama_daerah` varchar(35) NOT NULL,
  `biaya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daerah`
--

INSERT INTO `tb_daerah` (`id_provinsi`, `id_daerah`, `nama_daerah`, `biaya`) VALUES
(1, 1, 'Malang', 50000),
(2, 2, 'Semarang', 150000),
(3, 3, 'Bogor', 200000),
(5, 4, 'Sleman', 175000),
(1, 5, 'Surabaya', 65000),
(7, 6, 'Denpasar', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keberangkatan`
--

CREATE TABLE `tb_keberangkatan` (
  `id_keberangkatan` int(11) NOT NULL,
  `maskapai` varchar(20) NOT NULL,
  `jadwal` varchar(20) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `foto` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keberangkatan`
--

INSERT INTO `tb_keberangkatan` (`id_keberangkatan`, `maskapai`, `jadwal`, `harga`, `foto`) VALUES
(1, 'Garuda Indonesia', 'JUMAT-SABTU-MINGGU', '1525000', 'Garuda Indonesia.png'),
(2, 'Lion Air', 'SENIN-SELASA', '1065000', 'Lion air.png'),
(3, 'Etihad Airways', 'SENIN-SELASA', '2323000', 'Etihad.png'),
(6, 'Fly Emirates', 'SENIN-SELASA', '2745000', 'Fly Emirates.png'),
(7, 'Lion Air', 'JUMAT-SABTU-MINGGU', '1500000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `harga_kelas` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `harga_kelas`, `keterangan`) VALUES
(1, 'Ekonomi', '750000', 'Memenuhi kebutuhan utama Anda, dengan biaya terendah.'),
(3, 'Bisnis', '950000', 'Terbang nyaman dengan konter check-in dan kursi ekslusif.'),
(4, 'First Class', '1425000', 'Kelas paling mewah dengan layanan terbaik dan personal.'),
(5, 'Premium Ekonomi', '875500', 'Perjalanan terjangkau dengan makanan lezat dan ruang lebih lega.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_keberangkatan` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_tour` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_kelas`, `id_keberangkatan`, `id_daerah`, `tgl_pesan`, `tgl_tour`, `status`) VALUES
(1, 1, 1, 2, 1, '2022-12-24', '2022-12-24', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa tengah'),
(3, 'Jawa Barat'),
(4, 'Jakarta'),
(5, 'Yogyagarta'),
(6, 'Banten'),
(7, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `akses` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `foto`, `nama_user`, `email_user`, `username`, `password`, `no_hp`, `akses`) VALUES
(1, 'avatar24.png', 'Naufal Akmal', 'akmal@dafsa.com', 'akmalee', 'user1', '081290413082', 'user'),
(2, 'avatar21.png', 'Jamaludin', 'jamal@narse.com', 'jamal', 'user2', '082193837653', 'user'),
(3, 'avatar15.jpg', 'Aulia Salsabila Haerunnisa', 'auliatonggos@mail.com', 'aulgitong', 'user3', '083478956902', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bukti`
--
ALTER TABLE `tb_bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD UNIQUE KEY `tb_pesan` (`id_pesan`);

--
-- Indexes for table `tb_daerah`
--
ALTER TABLE `tb_daerah`
  ADD PRIMARY KEY (`id_daerah`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tb_keberangkatan`
--
ALTER TABLE `tb_keberangkatan`
  ADD PRIMARY KEY (`id_keberangkatan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_keberangkatan` (`id_keberangkatan`),
  ADD KEY `id_kelas_2` (`id_kelas`),
  ADD KEY `id_kelas_3` (`id_kelas`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bukti`
--
ALTER TABLE `tb_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_keberangkatan`
--
ALTER TABLE `tb_keberangkatan`
  MODIFY `id_keberangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
