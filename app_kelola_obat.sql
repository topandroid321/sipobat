-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2018 at 11:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_kelola_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_obat`
--

CREATE TABLE `t_gudang_obat` (
  `kd_obat` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_exp` date NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(20) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_obat`
--

INSERT INTO `t_gudang_obat` (`kd_obat`, `tgl_masuk`, `nama_supplier`, `nama_obat`, `tgl_daftar`, `tgl_exp`, `harga`, `stok`, `satuan`) VALUES
('02343', '2018-02-07', 'PT.FARMA 2', 'OBH Batuk', '2018-02-07', '2018-02-16', 6000, 30, 'botol'),
('17272', '2018-01-23', 'PT.FARMA', 'OBH', '2018-01-23', '2019-01-23', 3000, 15, 'kaplet'),
('2334435', '2018-01-18', 'Medika Farma ', 'Paracetamol 0,5', '2018-01-11', '2018-01-31', 4000, 40, 'kaplet'),
('778823', '2018-01-23', 'PT.FARMA', 'Bodrex', '2018-01-23', '2018-01-31', 5000, 10, 'strip');

-- --------------------------------------------------------

--
-- Table structure for table `t_permintaan`
--

CREATE TABLE `t_permintaan` (
  `id` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_permintaan`
--

INSERT INTO `t_permintaan` (`id`, `tgl_permintaan`, `nama_obat`, `jumlah`, `satuan`) VALUES
(1, '2018-01-28', 'OBH Batuk', 200, 'kaplet'),
(2, '2018-02-08', 'Bodrex', 30, 'strip');

-- --------------------------------------------------------

--
-- Table structure for table `t_suplier`
--

CREATE TABLE `t_suplier` (
  `id` int(11) NOT NULL,
  `kd_suplier` varchar(50) DEFAULT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_suplier`
--

INSERT INTO `t_suplier` (`id`, `kd_suplier`, `nama_suplier`, `alamat`, `no_telp`) VALUES
(1, 'SUP001', 'PT.FARMA 2', 'JL.Sukses Muda', '089500443332'),
(2, 'SUP002', 'PT.FARMA', 'JL.Sukses Muda 1', '884949495050'),
(3, 'SUP003', 'Medika Farma ', 'ciruluk 07', '089501990858'),
(4, 'SUP004', 'Medikal sehat', 'jl gunadarma', '0823344334');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `kd_obat` varchar(20) NOT NULL,
  `no_resep` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` bigint(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `kd_transaksi`, `kd_obat`, `no_resep`, `nama_obat`, `tgl_beli`, `jumlah`, `harga`, `deskripsi`) VALUES
(13, 'TRX001', '02343', '30122', 'OBH Batuk', '2018-02-08', 10, 4000, 'ahayyy'),
(15, 'TRX002', '02343', '0099891', 'OBH Batuk', '2018-09-09', 10, 6000, ' jangan diminum jika tidak ada obat nya');

--
-- Triggers `t_transaksi`
--
DELIMITER $$
CREATE TRIGGER `TG_STOK_UPDATE` AFTER INSERT ON `t_transaksi` FOR EACH ROW BEGIN
 UPDATE t_gudang_obat SET stok=stok-NEW.jumlah
 WHERE kd_obat=NEW.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nik_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk` enum('Perempuan','Laki-laki') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `nik_karyawan`, `nama_karyawan`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `telp`, `username`, `password`, `level`) VALUES
(1, '1232234', 'Topan Nurpana ', 'Laki-laki', 'Subang', '1999-01-18', 'Desa.ciruluk', '889977878789', 'topan', '2b165d92e828c00b5b83f9dc3eb7cc20', 'User'),
(2, '4533445', 'Udin', 'Laki-laki', 'Subang', '2000-01-16', 'cidahu', '08988777666777', 'udin', '6bec9c852847242e384a4d5ac0962ba0', 'Admin'),
(5, '219939490', 'Adung', 'Laki-laki', 'Subang', '1999-12-07', 'ciruluk 01', '089667885598', 'adung', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_gudang_obat`
--
ALTER TABLE `t_gudang_obat`
  ADD PRIMARY KEY (`kd_obat`),
  ADD KEY `nama_supplier` (`nama_supplier`),
  ADD KEY `nama_obat` (`nama_obat`);

--
-- Indexes for table `t_permintaan`
--
ALTER TABLE `t_permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_obat` (`nama_obat`);

--
-- Indexes for table `t_suplier`
--
ALTER TABLE `t_suplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_suplier` (`kd_suplier`),
  ADD KEY `nama_suplier` (`nama_suplier`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_resep` (`no_resep`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_permintaan`
--
ALTER TABLE `t_permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_suplier`
--
ALTER TABLE `t_suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_gudang_obat`
--
ALTER TABLE `t_gudang_obat`
  ADD CONSTRAINT `t_gudang_obat_ibfk_2` FOREIGN KEY (`nama_supplier`) REFERENCES `t_suplier` (`nama_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_permintaan`
--
ALTER TABLE `t_permintaan`
  ADD CONSTRAINT `t_permintaan_ibfk_1` FOREIGN KEY (`nama_obat`) REFERENCES `t_gudang_obat` (`nama_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`kd_obat`) REFERENCES `t_gudang_obat` (`kd_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
