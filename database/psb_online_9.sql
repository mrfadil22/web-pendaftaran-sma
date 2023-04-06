-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 11:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb_online_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha','Konghucu') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `fullname`, `nisn`, `alamat`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `no_telp`, `nama_ortu`, `user_id`) VALUES
(2, 'Udin Udino', '7776665544', 'Jl. Asgard', 'Laki-Laki', 'Budha', 'Bali', '2004-02-03', 'SMPN 70 BALI', '555-1234', 'Holly', 4),
(5, 'Jessica', '1287643', 'jl mitrabatik', 'Perempuan', 'Budha', 'Tasikmalaya', '2010-01-06', 'SMPN 6 Tasikmalaya', '085641237895', 'Hokkaido', 7),
(6, 'Yondu', '1231273981', 'jl. Re MArtadinata', 'Laki-Laki', 'Islam', 'Jakarta', '2014-01-02', 'smpn 67 jakarta', '085641237895', 'jonathan', 8),
(7, 'Peter ', '777665333', 'Jl. Queens', 'Laki-Laki', 'Konghucu', 'Jakarta', '2008-01-29', 'smpn 67 jakarta', '085641237895', 'Ben', 9),
(8, 'Faridlan Nul Hakim', '8877665544', 'Jl.Leuwidahu', 'Laki-Laki', 'Islam', 'Tasikmalaya', '1999-12-06', 'smpn 5 tasikmalaya', '085641237895', 'jonathan', 3),
(9, 'glu nulhakim', '1234444', 'jl. Re MArtadinata', 'Laki-Laki', 'Islam', 'Tasikmalaya', '2021-12-01', 'smpn 5 tasikmalaya', '085641237895', 'jonathan', 10),
(10, 'Fadil Muhammad Rizky', '2222222333', 'Jl. Cipedes', 'Laki-Laki', 'Islam', 'Tasikmalaya', '2000-01-21', 'SMPN 5 Tasikmalaya', '089554433222', 'Teten', 11),
(11, 'teten muhamad ridwan', '1234666', 'jl cieuteung', 'Laki-Laki', 'Islam', 'Tasikmalaya', '2021-12-22', 'SMPN 6 Tasikmalaya', '085641237895', 'Holly', 12);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(30) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nilai_mtk` decimal(3,2) NOT NULL DEFAULT 0.00,
  `nilai_ipa` decimal(3,2) NOT NULL DEFAULT 0.00,
  `nilai_ing` decimal(3,2) NOT NULL DEFAULT 0.00,
  `nilai_ind` decimal(3,2) NOT NULL DEFAULT 0.00,
  `ijazah` varchar(100) NOT NULL DEFAULT 'default.pdf',
  `tgl_pend` date DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `jurusan_id`, `nilai_mtk`, `nilai_ipa`, `nilai_ing`, `nilai_ind`, `ijazah`, `tgl_pend`, `status_id`, `user_id`) VALUES
('2021002', 2, '8.99', '8.99', '8.99', '8.99', '61c19f5f7fe9b.pdf', '2021-12-21', 2, 4),
('2021005', 1, '9.99', '9.99', '9.99', '9.99', '61bf724d4e950.pdf', '2021-12-21', 4, 7),
('2021006', 2, '9.99', '9.99', '9.99', '7.99', '61c05f4e03a7a.pdf', '2021-12-21', 3, 8),
('2021007', 1, '9.99', '8.99', '9.99', '7.99', '61c154b923a9a.pdf', '2021-12-21', 1, 9),
('2021008', 1, '9.99', '8.99', '9.99', '7.99', '61c19c6a6ae5c.pdf', '2021-12-21', 1, 3),
('2021009', 1, '9.99', '9.99', '9.99', '7.99', '61c1dc706b9b8.pdf', '2021-12-21', 1, 10),
('2021010', 2, '8.99', '9.99', '9.99', '7.99', '61c1e0397d1c9.pdf', '2021-12-21', 2, 11),
('2021011', 1, '9.99', '9.99', '9.99', '9.99', '61c2c18fd940c.pdf', '2021-12-22', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Menunggu'),
(2, 'Lulus'),
(3, 'Tidak Lulus'),
(4, 'Di Cadangkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `level_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `image`, `level_id`) VALUES
(1, 'Admin', 'faridlannulhakim@gmail.com', '$2y$10$gGnb/rL6JkKL20cFZHImkupFMy49vsjh3s4IVrtl4m3aPUrm8DmJ.', 'default.png', 1),
(3, 'faridlan', 'idanadi@gmail.com', '$2y$10$GxRm2eSyK/pNLXxMF6UQueKHuYyAsHVpcssNP59vjzPVyzQ9LZlW2', '121220211623556.jpg', 2),
(4, 'udin', 'udin', '$2y$10$CqK4kaG0YuIVf4z9qW6TG./oWx1t2lwH4U7f2HqDsijR2j0aco0jG', '12122021162511avatars-profile-picture-7.png', 2),
(7, 'jessica', 'jessica@gmail.com', '$2y$10$80Jhixo4tE/pN0NlyKosru.HxSoiy23GsIfuvSTPJFeIaOkFAZps2', 'default.png', 2),
(8, 'yondu', 'yondu@gmail.com', '$2y$10$8eS1LGM5.aHgq47.3XgODeVJW8VUBuutKUx2TRQVLHw0eD0NFycIm', '61c05f6f0f674.png', 2),
(9, 'peter', 'peter@gmail.com', '$2y$10$WEunlFi/XiimVeMOmSz0/el/b/aznRa2cvaGznoG4Q4qs8wmr5LL6', 'default.png', 2),
(10, 'glu', 'glu@gmail.com', '$2y$10$/kmS7bkoFdJdX2do7S324uWa7IMRtC.U/b8uivDHDccYDDiFTZQEG', 'default.png', 2),
(11, 'fadil', 'fadil@gmail.com', '$2y$10$n3.vrz54isGUAMuophWwDuWOgMcSPeFNK6THq3uEa.bweOAjSROOW', '61c1dfc32b00e.jpg', 2),
(12, 'teten', 'teten@gmail.com', '$2y$10$ftDnADohdeSxUKpHg6LqE.dTMVbdjIATln1V3YOl41oo/i08UvLFm', '61c2c0fbd4c56.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD UNIQUE KEY `fk_user_id_unique` (`user_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `fk_user_id_unique` (`user_id`),
  ADD KEY `fk_pendaftaran_jurusan` (`jurusan_id`),
  ADD KEY `fk_pendaftaran_status` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `fk_biodata_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `fk_pendaftaran_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
