-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 06:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-course`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id`, `id_materi`, `id_user`) VALUES
(1, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Web Programming'),
(2, 'Desain Grafis');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama_materi` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `love` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `gambar` text,
  `dilihat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `nama_materi`, `id_kategori`, `harga`, `deskripsi`, `love`, `user`, `gambar`, `dilihat`) VALUES
(1, 'HTML Dasar', 1, '10000', 'lorem ipsum', 0, 0, 'html-dasar.png', 394),
(2, 'Banner', 2, 'FREE', 'lorem ipsum PHP Dasar', 0, 1, 'php-dasar.png', 179);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `gambar` text COLLATE utf8mb4_unicode_ci,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `bio`, `gambar`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'User 1', 'user@mail.com', NULL, 'Hai', NULL, 'user', NULL, '$2y$10$OAaEzk7PyosGfRu16/q9J.0Q65x3UCIkbpV/Vd3IINWy1oErP29IC', 'Zms6rrVfTxSDGIGur1QpNUnIgqbXRLu1raJKKamFQ8B11aUo0E01KWugZQXI', '2019-03-14 01:05:35', '2019-03-14 18:48:25'),
(8, 'user 2', 'user2@mail.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$EZEWxKHJliRm3Mk0RnA5oesYO.AfQWga1hLigpDMEX58jqbp1VFda', 'NK3ImYnSAQ1218nMnfnRZ2fGfdvrqeyLcW8w0aiqcjeD2QWploLKX47svaLb', '2019-03-14 19:41:08', '2019-03-14 19:41:08'),
(11, 'Dzaky', 'user3@mail.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$/FZvhaQyWi6t0glVarK8beS7UzTHMviZxQBDg7ngrGuUnJJptUD42', 'nEiNSVrYdrNwx9lALbchXa0vj9VKp9Mzj8n0D4LufLqy3aV6AIlB1hvGkQn6', '2019-03-16 00:13:52', '2019-03-16 00:13:52'),
(12, 'Muhammad Dzaky', 'admin@mail.com', NULL, NULL, NULL, 'admin', NULL, '$2y$10$uKuv/TKn4cJkuGKbeGlzAuxawOpduNmNghwb4Tx3ebIYTxS5YZWZe', 'UD86gaiul9VbFrYZEtVzKmnI1EXhbTOmm6WUiaWBmxUed2MnWAX1leyfBOj1', '2019-03-18 00:10:36', '2019-03-18 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `nama_video` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `dilihat` int(11) DEFAULT NULL,
  `video` text,
  `thumbnail` text,
  `id_materi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `nama_video`, `deskripsi`, `dilihat`, `video`, `thumbnail`, `id_materi`) VALUES
(1, 'Perkenalan HTML', 'lorem Perkenalan HTML', 40, 'perkenalan-html.mp4', 'perkenalan-html.png', 1),
(2, 'layout pada banner', 'lorem Perkenalan PHP', 18, 'perkenalan-php.mp4', 'perkenalan-php.png', 2),
(3, 'Paragraf pada HTML', 'lorem Paragraf HTML', 44, 'paragraf-pada-html.mp4', 'paragraf-pada-html.png', 1),
(4, 'Typhography', 'lorem Perkenalan PHP', 18, 'perkenalan-php.mp4', 'perkenalan-php.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
