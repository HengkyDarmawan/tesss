-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 05:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `daftar_webinar_id` int(11) NOT NULL,
  `webinar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu_absen` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `daftar_webinar_id`, `webinar_id`, `user_id`, `waktu_absen`, `bukti`, `status`) VALUES
(13, 27, 7, 8, '2023-08-21 17:56:38', 'https://www.google.com/', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_webinar`
--

CREATE TABLE `daftar_webinar` (
  `id_daftar_webinar` int(11) NOT NULL,
  `webinar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembicara_id` int(11) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `link_pembayaran` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_webinar`
--

INSERT INTO `daftar_webinar` (`id_daftar_webinar`, `webinar_id`, `user_id`, `pembicara_id`, `waktu_daftar`, `link_pembayaran`, `status`) VALUES
(25, 19, 8, 2, '2023-08-21 17:46:05', 'https://www.youtube.com/', 'terdaftar'),
(26, 9, 8, 3, '2023-08-21 17:46:42', 'gratis', 'terdaftar'),
(27, 7, 8, 3, '2023-08-21 17:50:00', 'https://www.youtube.com/', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id_moderator` int(11) NOT NULL,
  `nama_moderator` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id_moderator`, `nama_moderator`, `pekerjaan`, `email`, `hp`, `alamat`) VALUES
(1, 'Siti', 'Moderator', 'siti@gmail.com', '082411225533', 'Tanggerang'),
(2, 'Eko', 'Moderator', 'eko@gmail.com', '085332463499', 'Bandung'),
(3, 'tesa', 'Dosena', 'tesa@gmail.com', '086911235542', 'Jakarta Selatana');

-- --------------------------------------------------------

--
-- Table structure for table `pembicara`
--

CREATE TABLE `pembicara` (
  `id_pembicara` int(11) NOT NULL,
  `nama_pembicara` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `link` varchar(128) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembicara`
--

INSERT INTO `pembicara` (`id_pembicara`, `nama_pembicara`, `pekerjaan`, `email`, `hp`, `link`, `alamat`) VALUES
(1, 'Maya', 'Eksportir Rumput Laut', 'maya@gmail.com', '085188452631', 'https://getbootstrap.com/', 'Jakarta Pusat'),
(2, 'Desi', 'Web Developer', 'desi@gmail.com', '085412345623', 'https://getbootstrap.com/', 'Bekasi'),
(3, 'Hengky Darmawan', 'Fullstack Web Developer', 'hengkydarmawan66@gmail.com', '082186629996', 'hengkydarmawan.github.io/', 'Jakarta Barat'),
(5, 'Jerry', 'PNS', 'Jerry@gmail.com', '082187732996', 'https://www.google.com/', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alamat`, `hp`, `pekerjaan`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Amin Admin', 'aminAdmin@gmail.com', 'Jakarta Barat', '082176659947', 'Kasir', 'default.jpg', '$2y$10$Cl1SRjyYc8i9nurbXf4zMObGSA42nC01hC9.R2/UKRhpraMS9JSx2', 1, 1, 1689481467),
(7, 'Amin Panitia', 'aminPanitia@gmail.com', 'Jakarta Timur', '082176659941', 'Mahasiswa', 'default.jpg', '$2y$10$TJwIkPwafabkx9GqPqMSduw9aP0fTtwBvebObR6gQvHCauRfpYKO.', 2, 1, 1689481583),
(8, 'Amin User', 'aminUser@gmail.com', 'Tomang, Jakarta Barat', '082176659945', 'Mahasiswa', 'default.jpg', '$2y$10$FVzaY/QgWdOpQRIctuWn7.2RKNCWe746e1S3dyrk1mITw1XPDX8/6', 3, 1, 1689481620),
(17, 'Amin2', 'amin2@gmail.com', 'sa', '082186629996', 'Fullstack Web Developer', 'default.jpg', '$2y$10$39s6da.IGcJ1JqOhAZhUDeA/T7OV45.MGV3Z4m2nuLlwPZuIfbPAa', 3, 1, 1692475055),
(18, 'eky', 'eky@gmail.com', 'Jakarta B', '082186629996', 'Web Dev', 'default.jpg', '$2y$10$HGceMhr55dBJx4Jeny4fBeheU3vsFM6fgxNzv5fdqr1Ox0chVnDUu', 3, 1, 1692571977),
(20, 'Fauzi Rahman', 'fauzi@gmail.com', 'Bandung', '085412345678', 'Eksporti', 'default.jpg', '$2y$10$W8bJrNgT.rgekkYp/cL02ukuuWwKb2Wqcg9JtjNpxT1R6ykGVethO', 3, 1, 1692633303),
(21, 'Fauzi Panitia', 'fauziPanitia@gmail.com', 'bandung', '081245632899', 'Eksportir', 'default.jpg', '$2y$10$SXv0u0Keulr5RUjWaLmBceBt6Fy1rqOeMJMe8tDTcU32E0.zizWWK', 2, 1, 1692633635);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Panitia'),
(3, 'Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `id_webinar` int(11) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `lokasi` text NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `no_rek` varchar(128) DEFAULT NULL,
  `harga` varchar(128) DEFAULT NULL,
  `pembicara_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `jmlh_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`id_webinar`, `tema`, `tipe`, `lokasi`, `tanggal`, `waktu`, `bank`, `no_rek`, `harga`, `pembicara_id`, `moderator_id`, `jmlh_tiket`) VALUES
(1, 'Frontend', 'webinar', 'online', '2023-08-18', '16.00', 'gratis', NULL, NULL, 2, 1, 10),
(6, 'Kopi Ekspor', 'webinar', 'Online', '2023-08-20', '06.00 - selesai', 'gratis', NULL, NULL, 1, 2, 2),
(7, 'javascript', 'webinar', 'online', '2023-08-24', '17.00 - selesai', 'gratis', NULL, NULL, 3, 1, 1),
(9, 'Ekspor', 'hybrid', 'jakrata', '2023-08-31', '13:00 - 16:00', 'gratis', NULL, NULL, 3, 2, 1),
(12, 'Webinar', 'webinar', 'online', '2023-09-09', '17.00 - selesai', 'BRI', '515743515', '25000', 1, 2, 5),
(16, 'sad', 'webinar', 'sad', '2023-08-24', '19.00 -  selesais', 'BCA', '41456466', '50000', 1, 2, 10),
(19, 'sadsa', 'webinar', 'sad', '2023-08-24', '17.00 - selesai', 'BCA', '1414455', '15000', 2, 3, 100),
(20, 'AI', 'webinar', 'online', '2023-08-20', '19.00 - selesai', 'BCA', '6144520554', '1000000', 1, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `daftar_webinar`
--
ALTER TABLE `daftar_webinar`
  ADD PRIMARY KEY (`id_daftar_webinar`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id_moderator`);

--
-- Indexes for table `pembicara`
--
ALTER TABLE `pembicara`
  ADD PRIMARY KEY (`id_pembicara`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`id_webinar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `daftar_webinar`
--
ALTER TABLE `daftar_webinar`
  MODIFY `id_daftar_webinar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id_moderator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembicara`
--
ALTER TABLE `pembicara`
  MODIFY `id_pembicara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `id_webinar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
