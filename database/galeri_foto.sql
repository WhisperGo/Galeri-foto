-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 05:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri_foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `gambar_album` text NOT NULL,
  `deskripsi_album` text DEFAULT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `gambar_album`, `deskripsi_album`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alam', 'cover.jpg', 'Ini adalah album khusus tes web. Berisi gambar alam / pemandangan ', 1, '2024-01-22 20:05:09', NULL, NULL),
(2, 'Arsitektur', 'cover.jpg', 'Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.', 1, '2024-01-22 20:05:09', NULL, NULL),
(4, 'Foto Random', 'Screenshot 2024-01-21 204010.png', 'Ini adalah album khusus tes web. Beta Version ', 1, '2024-01-23 18:52:12', '2024-01-23 19:45:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `judul_gambar` text NOT NULL,
  `nama_gambar` text NOT NULL,
  `deskripsi_gambar` text DEFAULT NULL,
  `album_gambar` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `judul_gambar`, `nama_gambar`, `deskripsi_gambar`, `album_gambar`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pemandangan', 'skyline.jpg', NULL, 4, 1, '2024-01-22 20:33:27', NULL, NULL),
(3, 'Jam Tangan', 'jamtangan.jpg', NULL, 4, 1, '2024-01-22 20:33:27', NULL, NULL),
(6, 'Buah-buahan', 'Screenshot 2023-10-24 220323.png', 'tes buah 1', 4, 1, '2024-01-23 20:49:14', NULL, NULL),
(12, 'Jalan jalan ke hutan bakau', 'gambar_1_1706019873.png', 'Kenang - kenangan kelas 12', 4, 1, '2024-01-23 21:24:33', NULL, NULL),
(14, 'Selancaran', 'gambar_1_1706027801.jpg', 'Gambar orang selancaran', 1, 1, '2024-01-23 23:36:41', '2024-01-24 08:17:35', NULL),
(15, 'Pegunungan', 'gambar_1_1706027919.jpg', 'Gambar pegunungan contoh', 1, 1, '2024-01-23 23:38:39', '2024-01-24 08:23:16', NULL),
(16, 'Aliran Sungai', 'gambar_1_1706028029.jpg', 'Gambar Aliran Sungai ', 1, 1, '2024-01-23 23:40:29', '2024-01-24 08:34:49', '2024-01-24 08:34:49'),
(17, 'Laut dengan perahu', 'gambar_1_1706028141.jpg', 'Pemandangan sore hari yang cukup apik', 1, 1, '2024-01-23 23:42:21', NULL, NULL),
(18, 'Pemandangan New York', 'gambar_1_1706028297.jpg', 'Foto ini diambil dengan drone dari jarak jauh', 2, 1, '2024-01-23 23:44:57', NULL, NULL),
(19, 'Twin tower Malaysia', 'gambar_1_1706028361.jpg', 'Penampakan twin tower petronas di malaysia saat malam hari', 2, 1, '2024-01-23 23:46:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `gambar` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `gambar`, `user`, `isi_komentar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 1, 'Mantap gambarnya gan!', '2024-01-24 00:46:21', NULL, NULL),
(5, 12, 2, 'Lanjutkan usahamu!', '2024-01-24 01:40:18', NULL, NULL),
(6, 17, 1, 'Tes', '2024-01-24 01:40:49', NULL, NULL),
(7, 16, 1, 'Tes halo gan', '2024-01-24 08:10:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2024-01-22 22:25:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id_like` int(11) NOT NULL,
  `gambar` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id_like`, `gambar`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 12, 1, '2024-01-23 23:56:40', NULL, NULL),
(5, 12, 2, '2024-01-24 00:20:52', NULL, NULL),
(6, 16, 1, '2024-01-24 08:10:13', NULL, NULL),
(7, 17, 1, '2024-01-24 10:10:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', '2024-01-22 22:26:01', NULL, NULL),
(2, 'Kevin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'default.png', '2024-01-22 22:26:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo_website` text DEFAULT NULL,
  `logo_pdf` text DEFAULT NULL,
  `favicon_website` text DEFAULT NULL,
  `komplek` text DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id_website`, `nama_website`, `logo_website`, `logo_pdf`, `favicon_website`, `komplek`, `jalan`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Galeri Foto', 'logo_contoh.svg', 'logo_pdf_contoh.svg', 'favicon_contoh.svg', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '2023-05-01 16:33:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
