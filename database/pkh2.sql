-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2023 at 07:31 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkh2`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int(11) NOT NULL,
  `is_pns` tinyint(1) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `type_gaji` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - kurang dari, 1 - lebih dari',
  `status` smallint(1) NOT NULL COMMENT '0 tidak dapat bantuan, 1 dapat bantuan',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sample_data`
--

INSERT INTO `sample_data` (`id`, `is_pns`, `gaji`, `type_gaji`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5000000, 1, 0, '2023-12-23 02:25:06', '2023-12-23 03:36:20'),
(2, 1, 5000000, 0, 0, '2023-12-23 02:25:06', '2023-12-23 03:36:20'),
(3, 0, 5000000, 1, 0, '2023-12-23 02:25:06', '2023-12-23 03:36:20'),
(4, 0, 5000000, 0, 1, '2023-12-23 02:25:06', '2023-12-23 03:36:20'),
(5, 0, 5000000, 1, 0, '2023-12-23 04:35:03', '2023-12-23 04:35:03'),
(6, 0, 5000000, 0, 1, '2023-12-23 04:39:50', '2023-12-23 04:39:50'),
(7, 0, 5000000, 0, 1, '2023-12-23 04:40:03', '2023-12-23 04:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin 123', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-12-22 01:36:55', '2023-12-22 02:17:56'),
(3, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2023-12-22 02:35:12', '2023-12-22 02:35:12'),
(4, 'Kades', 'kades', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'user', '2023-12-23 04:40:36', '2023-12-23 04:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `wargas`
--

CREATE TABLE `wargas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `is_pns` tinyint(1) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wargas`
--

INSERT INTO `wargas` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `is_pns`, `gaji`, `created_at`, `updated_at`) VALUES
(1, 'Sina', 'Pati', '1999-05-11', 'Pedurungan, Semarang', 2, 2, 0, 5000000, '2023-12-22 02:54:34', '2023-12-23 07:28:48'),
(2, 'Aldi Maharani', 'Pati', '2000-04-11', 'Pedurungan, Semarang', 4, 2, 1, 1000000, '2023-12-22 02:55:10', '2023-12-23 07:28:45'),
(3, 'Beta', 'Semarang', '2023-12-01', 'Pedurungan, Semarang', 2, 2, 1, 5000000, '2023-12-22 07:54:53', '2023-12-23 07:28:44'),
(4, 'Tina', 'Brebes', '2023-12-08', 'Pedurungan, Semarang', 2, 2, 0, 2000000, '2023-12-22 07:55:08', '2023-12-23 07:28:40'),
(5, 'Aldo', 'Pati', '1999-04-11', 'Pedurungan, Semarang', 2, 2, 1, 4000000, '2023-12-22 09:10:58', '2023-12-23 07:28:52'),
(6, 'Maharani', 'Demak', '2003-04-11', 'Pedurungan, Semarang', 2, 2, 1, 2000000, '2023-12-22 09:11:22', '2023-12-23 07:28:55'),
(7, 'Mona Lisa', 'Salatiga', '2000-04-10', 'Pedurungan, Semarang', 2, 2, 0, 1000000, '2023-12-23 04:27:06', '2023-12-23 07:28:57'),
(8, 'Viona Alfa', 'Rembang', '1998-04-11', 'Pedurungan, Semarang', 1, 2, 1, 4000000, '2023-12-23 06:32:06', '2023-12-23 07:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wargas`
--
ALTER TABLE `wargas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wargas`
--
ALTER TABLE `wargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
