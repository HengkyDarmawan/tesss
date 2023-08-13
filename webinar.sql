-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 08:33 AM
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
  `webinar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu_absen` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `sesi` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `webinar_id`, `user_id`, `waktu_absen`, `bukti`, `sesi`, `status`) VALUES
(1, 1, 8, '20 Juli 2023 21.00', 'absen.jpg', 1, 'approved'),
(2, 3, 8, '21 Juli 2023 21.00', 'absen.jpg', 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_webinar`
--

CREATE TABLE `daftar_webinar` (
  `id_daftar_webinar` int(11) NOT NULL,
  `webinar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_webinar`
--

INSERT INTO `daftar_webinar` (`id_daftar_webinar`, `webinar_id`, `user_id`, `waktu_daftar`, `status`) VALUES
(1, 1, 8, '2023-07-17 05:40:25', 'review'),
(2, 3, 8, '2023-07-17 05:40:25', 'terdaftar'),
(3, 1, 13, '2023-08-13 07:28:07', 'ditolak');

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
(6, 'Amin Admin', 'aminAdmin@gmail.com', 'Jakarta Barat', '082176659945', 'Kasir', 'default.jpg', '$2y$10$V4ZI5K9ZDS0TE1Kgo3CikO/8vlBYqms4eiJ.qw8H2puOcX2lUiGjK', 1, 1, 1689481467),
(7, 'Amin Panitia', 'aminPanitia@gmail.com', 'Jakarta Timur', '082176659945', 'Mahasiswa', 'default.jpg', '$2y$10$ntDfMOeijhEfE/L5rtx.quHfgqIEVj1nvScLi/YhpLUKIoCpJpQCG', 2, 1, 1689481583),
(8, 'Amin User', 'amin@gmail.com', 'Jakarta Utara', '082176659945', 'Mahasiswa', 'default.jpg', '$2y$10$VsKu26pAQO2xZuyYZj/0fetrWp.D./yVtmHLCO/U0pG.wyWL80XTS', 3, 1, 1689481620),
(11, 'tes', 'tes@gmail.com', 'jak', '082189963321', 'mahasisw', 'default.jpg', '$2y$10$3B78Pf85jzpLdbl2eo2Ln.VSwr8uvCWiWl44bb.svZRTu4tlfb.N2', 3, 1, 1691350530),
(13, 'Riko', 'rikorinaldiansyah26@gmail.com', 'Bandung', '085332163499', 'Dosen', 'default.jpg', '$2y$10$LEP9.0z1mlZrJrp3A8CsVOFfMpQ1hqwCgQSNJkycavN4UnHXHkstm', 1, 1, 1691355330);

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
  `pembicara_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`id_webinar`, `tema`, `tipe`, `lokasi`, `tanggal`, `waktu`, `pembicara_id`, `moderator_id`) VALUES
(1, 'Frontend', 'webinar', 'online', '2023-08-01', '16.00', 2, 1),
(3, 'tes', 'webinar', 'online', '2023-08-08', '19.00 -  selesai', 1, 1),
(6, 'Kopi Ekspor', 'webinar', 'Online', '2023-08-23', '06.00 - selesai', 1, 2),
(7, 'js', 'webinar', 'online', '2023-08-16', '17.00 - selesai', 3, 1),
(8, 'tess', 'seminar', 'jakartas', '2023-08-26', '19.00 -  selesais', 2, 3);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_webinar`
--
ALTER TABLE `daftar_webinar`
  MODIFY `id_daftar_webinar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `id_webinar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
