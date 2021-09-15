-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 01:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geraipickup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `users_active` int(11) DEFAULT NULL,
  `kode_aktivasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `username`, `email`, `password`, `level`, `foto`, `status`, `created_at`, `users_active`, `kode_aktivasi`) VALUES
(1, 'Ahmad Fatoni', 'admin', 'achmad.fatoni33@gmail.com', 'a67914b3c95e94116c0d3aaebd389abce91fe7bb7fb10b7e6406030b9f5d4f8669a08c7c7c944e75eafa3af22dd6dc648cad73989ee3df4a022dad9bf8e92a68', 1, 'fatoni.png', 1, '2020-11-08 03:12:18', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE `gerai` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_gerai` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `telepon` int(10) DEFAULT NULL,
  `alamat` text NOT NULL,
  `prov` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `kec` int(11) DEFAULT NULL,
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`id`, `username`, `password`, `email`, `nama_gerai`, `nama_lengkap`, `hp`, `telepon`, `alamat`, `prov`, `kota`, `kec`, `lat`, `long`, `level`, `created_at`, `created_by`, `status`) VALUES
(3, 'geraidua', '3024f22d62b26a83ed957ecf58a0715270893fcb7a32bd72d0d5ab7d3d9b6ef00888a4899174ad1d553ae53d99d6bf5d8c559d95766c79fe96a550bc1d27ca2c', '2ahmadfatoni0@gmail.com', 'Gerai Dua', 'Gerai Dua', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3673, 3673020, '-6.117275896930658', '106.14995686508176', 3, '2021-06-03 00:00:00', 1, 1),
(8, 'geraid', '007204d1ac33e9f85d76532d5659ae2428d6057b7e695f6697d0b954a718c600c7b0dc4396eb0c5e5e125c2729e007689ce788d137e11b95e358ace81c506949', 'Achmad.fatoni33@gmail.com', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3673, 3673040, '', '', 3, '2021-06-20 00:00:00', 1, 1),
(11, 'pelanggan', '2100cacc41e9e7f45998b8a74a4045bc7ea6f10ef7bb8481be37a480072174197e921756454e7fd8dbc22e45d72e94796ed6024f2256c2122178ed6b78b8f62a', 'pelanggan1@gmail.com', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3672, 3672022, '-6.115910423885307', '106.14813296295164', 3, '2021-06-24 00:00:00', 1, 1),
(12, 'petugas', '3364822a4fad2178913a682fa697960c707e5af3d9619510ccddb13582a31a26e916bae7f45457890e1b9422c1115f0720da3fed14e892202e8631030a20984a', '192010386@smkn5.net', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 52, 5207, 5207040, '-6.115441041720623', '106.15075079895017', 3, '2021-06-24 00:00:00', 1, 1),
(13, 'gerai', 'be95e2aa966ce818369ba21f56653a7ced1db208e0c6e134d629d6675682cf5d996ca0d6f501102635609b02ab179d9182a1f876d6058cab0b08b36a874fbc68', 'gerai@gmail.com', 'Gerai', '', '08999999', 8999999, '', 36, 3673, 3673050, '-6.1150996726147975', '106.14948479629514', 3, '2021-08-04 13:08:11', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `foto` text NOT NULL,
  `wilayah` int(11) NOT NULL,
  `prov` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kec` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `username`, `password`, `email`, `nama_lengkap`, `hp`, `foto`, `wilayah`, `prov`, `kota`, `kec`, `created_at`, `created_by`, `status`, `level`) VALUES
(2, 'kurir', '35ceaa68b7fd651430bef04b7b487cfbf2322fcfc007ef5fe304bc17b2bec38e0dd25eb320930cff94daf2c3e53dfaa674a3ded0efb32b1982244741149e61f3', 'Achmad.fatoni33@gmail.com', 'Fatoni', '089676490971', '', 0, 36, 3673, 3673050, '2021-04-14', 1, 1, 2),
(3, 'admin', 'e745eebf6a1ec2accdb3e891fe0cb402a5a1de7fa3e6c2b7d8af158316a385b6865f948654bd44ec053eaad92c1747d36718bfb1b7c3e6768cb6bd6d266fd61b', 'admin@admin.com', 'Dummy', '5345354545453', '', 0, 12, 1201, 1201060, '2021-07-05', 1, 1, 2),
(4, 'kurirbaru', '24acf5942625330309f40c1ffc3180ac9089dc83da311bf5c8ceeb549ba10a95697e3c7709bbc384d8de8a10c842a312953930c27fd82cb173119d40627170b3', 'kurirbaru@gmail.com', 'Kurir Baru', '0456789', '', 0, 36, 3672, 3672030, '2021-07-05', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `level` int(11) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `level`, `sub_menu`, `icon`) VALUES
(1, 'Dashboard', '', 1, 1010, ''),
(2, 'Dashboard', 'admin', 1, 1, 'fa fa-dashboard'),
(20, 'Master Data', '', 1, 1010, ''),
(21, 'Data Gerai', 'data_gerai', 1, 20, 'fa fa-dashboard'),
(22, 'Data Kurir', 'data_kurir', 1, 20, 'fa fa-dashboard'),
(30, 'PickUp', '', 1, 1010, ''),
(31, 'Data Pickup', 'data_pickup_admin', 1, 30, 'fa fa-dashboard'),
(40, 'Laporan', '', 1, 1010, ''),
(43, 'Semua Laporan', 'semua_laporan', 1, 40, 'fa fa-dashboard'),
(100, 'Dashboard', '', 3, 1010, ''),
(101, 'Dashboard', 'gerai', 3, 100, 'fa fa-dashboard'),
(120, 'Data Gerai', '', 3, 1010, ''),
(121, 'Profil Gerai', 'profil_gerai', 3, 120, 'fa fa-user'),
(130, 'Pickup', '', 3, 1010, ''),
(131, 'Data Pickup', 'data_pickup', 3, 130, 'fa fa-briefcase'),
(200, 'Dashboard', '', 2, 1010, ''),
(201, 'Dashboard', 'kurir', 2, 200, 'fa fa-dashboard'),
(220, 'Pickup', '', 2, 1010, ''),
(221, 'Data Pickup', 'data_pickup_kurir', 2, 220, 'fa fa-briefcase'),
(300, 'Dashboard', '', 4, 1010, ''),
(301, 'Dashboard', 'pimpinan', 4, 300, 'fa fa-dashboard'),
(310, 'Master Data', '', 4, 1010, ''),
(311, 'Data Gerai', 'data_gerai_pimpinan', 4, 310, 'fa fa-dashboard'),
(320, 'Laporan', '', 4, 1010, ''),
(323, 'Semua Laporan', 'semua_laporan', 4, 320, 'fa fa-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `kode_pickup` int(11) NOT NULL,
  `id_gerai` int(11) NOT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `tgl_pickup` datetime DEFAULT NULL,
  `jenis_paket` varchar(20) NOT NULL,
  `jumlah_paket` int(11) NOT NULL,
  `status_pickup` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`id`, `kode_pickup`, `id_gerai`, `id_kurir`, `tgl_pickup`, `jenis_paket`, `jumlah_paket`, `status_pickup`, `created_at`) VALUES
(1, 1304210001, 3, 2, '2021-04-14 13:26:00', 'ONS', 2, 3, '2021-04-13 21:42:13'),
(2, 1705210001, 3, NULL, NULL, 'TRC', 1, 0, '2021-05-17 19:17:34'),
(3, 1705210002, 3, NULL, NULL, 'REG', 3, 0, '2021-05-17 19:18:38'),
(4, 1705210003, 3, 2, '2021-05-17 08:25:00', 'ONS', 4, 3, '2021-05-17 19:19:59'),
(5, 507210001, 13, NULL, NULL, 'REG', 7, 0, '2021-07-05 22:56:33'),
(6, 507210002, 13, 4, NULL, 'ONS', 3, 0, '2021-07-05 23:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `users_active` int(11) DEFAULT NULL,
  `kode_aktivasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id`, `nama_lengkap`, `username`, `email`, `password`, `level`, `foto`, `status`, `created_at`, `users_active`, `kode_aktivasi`) VALUES
(1, 'Ahmad Fatoni', 'pimpinan', 'achmad.fatoni33@gmail.com', 'ad1d63da21e81c745a02ac6df4e3a5f848cab3707f2578f88ed3e13a3fa8c1768ddf3c1bc332bc745fe1b7c392f3f209888c16874af9de3e2861b90426cc4746', 4, 'fatoni.png', 1, '2020-11-08 03:12:18', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id`, `nama_group`, `level`, `link`) VALUES
(1, 'Administrator', 1, 'admin'),
(2, 'Kurir', 2, 'kurir'),
(3, 'Gerai', 3, 'gerai'),
(4, 'Pimpinan', 4, 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerai`
--
ALTER TABLE `gerai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
