-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 14.10
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_active` int(11) DEFAULT NULL,
  `kode_aktivasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `username`, `email`, `password`, `level`, `foto`, `status`, `created_at`, `users_active`, `kode_aktivasi`) VALUES
(1, 'Ahmad Fatoni', 'admin', 'achmad.fatoni33@gmail.com', 'a67914b3c95e94116c0d3aaebd389abce91fe7bb7fb10b7e6406030b9f5d4f8669a08c7c7c944e75eafa3af22dd6dc648cad73989ee3df4a022dad9bf8e92a68', 1, 'fatoni.png', 1, '2020-11-08 03:12:18', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gerai`
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
-- Dumping data untuk tabel `gerai`
--

INSERT INTO `gerai` (`id`, `username`, `password`, `email`, `nama_gerai`, `nama_lengkap`, `hp`, `telepon`, `alamat`, `prov`, `kota`, `kec`, `lat`, `long`, `level`, `created_at`, `created_by`, `status`) VALUES
(3, 'geraidua', '3024f22d62b26a83ed957ecf58a0715270893fcb7a32bd72d0d5ab7d3d9b6ef00888a4899174ad1d553ae53d99d6bf5d8c559d95766c79fe96a550bc1d27ca2c', '2ahmadfatoni0@gmail.com', 'Gerai Dua', 'Gerai Dua', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3673, 3673020, '-6.117275896930658', '106.14995686508176', 3, '2021-06-03 00:00:00', 1, 1),
(8, 'geraid', '007204d1ac33e9f85d76532d5659ae2428d6057b7e695f6697d0b954a718c600c7b0dc4396eb0c5e5e125c2729e007689ce788d137e11b95e358ace81c506949', 'Achmad.fatoni33@gmail.com', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3673, 3673040, '', '', 3, '2021-06-20 00:00:00', 1, 1),
(11, 'pelanggan', '2100cacc41e9e7f45998b8a74a4045bc7ea6f10ef7bb8481be37a480072174197e921756454e7fd8dbc22e45d72e94796ed6024f2256c2122178ed6b78b8f62a', 'pelanggan1@gmail.com', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 36, 3672, 3672022, '-6.115910423885307', '106.14813296295164', 3, '2021-06-24 00:00:00', 1, 1),
(12, 'petugas', '3364822a4fad2178913a682fa697960c707e5af3d9619510ccddb13582a31a26e916bae7f45457890e1b9422c1115f0720da3fed14e892202e8631030a20984a', '192010386@smkn5.net', 'Ahmad Fatoni', 'Unicorn Gift', '089676490971', 2147483647, 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 52, 5207, 5207040, '-6.115441041720623', '106.15075079895017', 3, '2021-06-24 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
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
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `username`, `password`, `email`, `nama_lengkap`, `hp`, `foto`, `wilayah`, `prov`, `kota`, `kec`, `created_at`, `created_by`, `status`, `level`) VALUES
(2, 'kurir', '35ceaa68b7fd651430bef04b7b487cfbf2322fcfc007ef5fe304bc17b2bec38e0dd25eb320930cff94daf2c3e53dfaa674a3ded0efb32b1982244741149e61f3', 'Achmad.fatoni33@gmail.com', 'Fatoni', '089676490971', '', 0, 36, 3673, 3673050, '2021-04-14', 1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
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
-- Dumping data untuk tabel `menus`
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
(121, 'Profil Gerai', 'profil', 3, 120, 'fa fa-user'),
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
-- Struktur dari tabel `pickup`
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pickup`
--

INSERT INTO `pickup` (`id`, `kode_pickup`, `id_gerai`, `id_kurir`, `tgl_pickup`, `jenis_paket`, `jumlah_paket`, `status_pickup`, `created_at`) VALUES
(1, 1304210001, 3, 2, '2021-04-14 13:26:00', 'ONS', 2, 3, '2021-04-13 21:42:13'),
(2, 1705210001, 3, NULL, NULL, 'TRC', 1, 0, '2021-05-17 19:17:34'),
(3, 1705210002, 3, NULL, NULL, 'REG', 3, 0, '2021-05-17 19:18:38'),
(4, 1705210003, 3, 2, '2021-05-17 08:25:00', 'ONS', 4, 3, '2021-05-17 19:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_active` int(11) DEFAULT NULL,
  `kode_aktivasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`id`, `nama_lengkap`, `username`, `email`, `password`, `level`, `foto`, `status`, `created_at`, `users_active`, `kode_aktivasi`) VALUES
(1, 'Ahmad Fatoni', 'pimpinan', 'achmad.fatoni33@gmail.com', 'ad1d63da21e81c745a02ac6df4e3a5f848cab3707f2578f88ed3e13a3fa8c1768ddf3c1bc332bc745fe1b7c392f3f209888c16874af9de3e2861b90426cc4746', 4, 'fatoni.png', 1, '2020-11-08 03:12:18', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_group`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gerai`
--
ALTER TABLE `gerai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gerai`
--
ALTER TABLE `gerai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
