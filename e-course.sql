-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 06:32 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `status`, `bio`, `gambar`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'Muhammad Dzaky', 'admin@mail.com', NULL, NULL, NULL, 'admin', NULL, '$2y$10$uKuv/TKn4cJkuGKbeGlzAuxawOpduNmNghwb4Tx3ebIYTxS5YZWZe', '459VplWB5htTHAgWXacaW3NUbMWDg69QWhop3qcSqf2VjgiagKWuFF44WY5R', '2019-03-18 00:10:36', '2019-03-18 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `invoice` text,
  `tr_nama` varchar(255) DEFAULT NULL,
  `tr_rekening` varchar(255) DEFAULT NULL,
  `tr_tanggal` varchar(255) DEFAULT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `id_materi`, `id_user`) VALUES
(10, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `favicon` text,
  `keyword` text,
  `description` text,
  `nomor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `logo` text,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `favicon`, `keyword`, `description`, `nomor`, `email`, `alamat`, `logo`, `view`) VALUES
(1, 'CV Naistudio', NULL, 'android,SEO,webbase,web desain,aplikasi CBT,E-Planning,ereport,e-budgeting,e-musrenbang,sms center,cctv,jaringan,Jasa SEO,Aplikasi Tabungan,JDIH,E-Commerce,E-Surat,SIAKAD,SISMIK,APP Andorid,APP IOS,php,html,css,css3,html3,mysql,mariaDB,Laravel,CodeIgnier,NodeJS,photoshop,illustrator,desain web,desain grafish,kursus komputer,kursus pemrograman,privat pemrograman,private web,private it software,kota metro,bandar lampung,lampung timur,lampung tengah,lampung utara,waykanan,lampung barat,pesisir barat,tanggamus,pringsewu,lampung,indonesia', 'Naistudio - Web Design and Mobile Specialist, Official Website CV Naistudio Metro Lampung, lampung web, jasa web lampung, Jasa Pembuatan Website di Lampung, Jasa Pembuatan Website di Metro, Jasa Web Lampung Terbaik, Lampung Web Terbaik, Jasa Pembuatan Website Lampung Terbaik, MasterWeb Lampung, Master Web Lampung , Hosting Lampung, Jasa Pembuatan Website Instan - Profesional - Development - Murah dan berkualitas, Penjualan Domain Hosting Indonesia dan Internasional, Jasa Pembuatan Website, jasa Pembuatan website di lampung, domain gratis, hosting gratis, domain berbayar,hosting berbayar,free hosting,free domain,free website,bisnis online,Jasa Pembuatan Website di Metro Lampung Timur Lampung Tengah Tulang Bawang Barat Kota Metro Bandar Lampung,Jasa Desain Web Metro Lampung,Jasa Pemasangan Jaringan di Metro Lampung,Aplikasi CBT,E-Learning,E-Library,E-Budgeting,E-Report,E-Planning,RKPD,RPJMD,SKP Online,Daily Report,Aplikasi Databse Pendidikan,Legalisir Online,Absensi Online,E-Musrenbang,E-Database,E-PJB,Arsip Daerah,Perpustakaan,Website Sekolah,Sistem Informasi data Pos dan Telekomunikasi(Sidapostel),Peta Online,GIS,SKCK Online,SIAKAD,SISMIK,SIA Sekolah,SMS Gateway,SMS Center, www.naistudio.com', '+62896 3153 1651', 'hello.naistudio@gmail.com', 'Dusun 4 RT 14 RW 07, Sumberrejo 43 Polos Kecamatan Batanghari Kabupaten Lampung Timur.', NULL, 0);

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
(5, 'Web Development'),
(6, 'Framework');

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
  `dilihat` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `nama_materi`, `id_kategori`, `harga`, `deskripsi`, `love`, `user`, `gambar`, `dilihat`, `id_user`) VALUES
(19, 'Belajar Laravel Sampai Tuntas', 6, 'FREE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '26-03-2019-14-03-18-belajar-laravel-sampe-tuntas.jpg', 80, 18),
(20, 'Dasar - Dasar HTML', 5, '55000', 'Lorem Ipsum', 0, 0, '01-04-2019-10-04-36-dasar-dasar-html.jpg', 32, 18),
(21, 'Belajar CSS', 5, '20000', 'Lorem ipsum', 0, 0, '02-04-2019-11-04-16-belajar-css.jpg', 5, 18),
(22, 'JavaScript', 5, '70000', 'lorem ipsum', 0, 0, '02-04-2019-11-04-23-javascript.jpg', 14, 18),
(23, 'Tutorial PHP', 5, '20000', 'lorem ipsum', 0, 0, '02-04-2019-11-04-38-tutorial-php.jpg', 26, 18),
(24, 'MySQL', 5, '800000', 'lorem ipsum', 0, 0, '02-04-2019-12-04-31-mysql.jpg', 34, 18),
(25, 'Belajar Laravel Sampai Tuntas', 6, 'FREE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 0, '26-03-2019-14-03-18-belajar-laravel-sampe-tuntas.jpg', 73, 18),
(26, 'Dasar - Dasar HTML', 5, '55000', 'Lorem Ipsum', 0, 0, '01-04-2019-10-04-36-dasar-dasar-html.jpg', 31, 18),
(27, 'Belajar CSS', 5, '20000', 'Lorem ipsum', 0, 0, '02-04-2019-11-04-16-belajar-css.jpg', 5, 18),
(29, 'Tutorial PHP', 5, '20000', 'lorem ipsum', 0, 0, '02-04-2019-11-04-38-tutorial-php.jpg', 26, 18),
(37, 'Belajar Laravel Sampai Tuntas', 6, 'FREE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 0, '26-03-2019-14-03-18-belajar-laravel-sampe-tuntas.jpg', 73, 18),
(38, 'Dasar - Dasar HTML', 5, '55000', 'Lorem Ipsum', 0, 0, '01-04-2019-10-04-36-dasar-dasar-html.jpg', 32, 18),
(41, 'Tutorial PHP', 5, '20000', 'lorem ipsum', 0, 0, '02-04-2019-11-04-38-tutorial-php.jpg', 29, 18);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(14, 'Muhammad Dzaky', 'user@mail.com', 'Pelajar', 'Lorem Ipsum', '02-04-2019-17-04-35-waliid-ilham-ramadhan.jpg', 'user', NULL, '$2y$10$G571qqkeoUup9XuFl.6JZuLcAeCq9g1G6qBbqaysl8ysInRy7Bj06', 'DxmDdAs4fQ50v3Z9a6rkveUQqxJFv2YF72CymvHF1MDVJ5qiaqURtkcY2cxC', '2019-03-21 04:03:54', '2019-04-21 12:36:24'),
(17, 'vincent', 'admin1@mail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$VHxrfALVj3lndYKslhS1kez5SPgHICuEAEgaX0mGCf3Cea5vIMfTy', 'XRuzz3vM2OkqnnG9uf6C3Wj7YTNQIIXdcIOWWpcqJZD7vuMeQAQJNdJHerRw', '2019-03-31 01:51:05', '2019-03-31 01:51:05'),
(18, 'David Naista', 'admin@mail.com', 'Web Developer', 'Lorem Ipsum', '02-04-2019-20-04-26-muhammad-dzaky.jpg', 'admin', NULL, '$2y$10$8dAkcKGqWEhOBQZOUx1r5uVydJ0KxkwG7wAvioKEhow3vMeduFPMW', 'dlj6GWQbPwmbT49UEQr6CEMrTZzqoXPBaqORDGv8vWd0RMOhVfiHO3zO0EPv', '2019-03-18 00:10:36', '2019-04-21 12:37:00');

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
(1, 'Pengertian dan Cara Install Laravel', 'Lorem Ipsum', 11, '01-04-2019-09-04-14-pengertian-dan-cara-install-laravel.mp4', '01-04-2019-09-04-12-pengertian-dan-cara-install-laravel.jpg', 19),
(2, 'Belajar Route dan View Pada Laravel', 'Lorem Ipsum', 2, '01-04-2019-09-04-40-belajar-route-dan-view-pada-laravel.mp4', '01-04-2019-09-04-39-belajar-route-dan-view-pada-laravel.jpg', 19),
(3, 'Tutorial Membuat  Controller Pada Laravel', 'Lorem Ipsum', 3, '01-04-2019-10-04-08-tutorial-membuat-controller-pada-laravel.mp4', '01-04-2019-10-04-08-tutorial-membuat-controller-pada-laravel.jpg', 19),
(4, 'Passing Data Controller Ke View Laravel', 'Lorem Ipsum', 1, '01-04-2019-10-04-45-passing-data-controller-ke-view-laravel.mp4', '01-04-2019-10-04-45-passing-data-controller-ke-view-laravel.jpg', 19),
(5, 'Request Data Pada Laravel', 'Lorem Ipsum', 1, '01-04-2019-10-04-11-request-data-pada-laravel.mp4', '01-04-2019-10-04-11-request-data-pada-laravel.jpg', 19),
(6, 'Maintenance Mode pada Laravel', 'Lorem Ipsum', NULL, '01-04-2019-10-04-46-maintenance-mode-pada-laravel.mp4', '01-04-2019-10-04-45-maintenance-mode-pada-laravel.jpg', 19),
(7, 'Konfigurasi Dasar Laravel', 'Lorem Ipsum', 1, NULL, '01-04-2019-10-04-18-konfigurasi-dasar-laravel.jpg', 19),
(8, 'Sistem Template Blade Laravel', 'Lorem Ipsum', NULL, '01-04-2019-10-04-43-sistem-template-blade-laravel.mp4', '01-04-2019-10-04-42-sistem-template-blade-laravel.jpg', 19),
(9, 'Tutorial Membuat CRUD dengan Laravel', 'Lorem Ipsum', NULL, '01-04-2019-10-04-04-tutorial-membuat-crud-dengan-laravel.mp4', '01-04-2019-10-04-04-tutorial-membuat-crud-dengan-laravel.jpg', 19),
(10, 'Membuat CRUD dengan Laravel Part 2', 'Lorem Ipsum', NULL, '01-04-2019-10-04-36-membuat-crud-dengan-laravel-part-2.mp4', '01-04-2019-10-04-36-membuat-crud-dengan-laravel-part-2.jpg', 19),
(11, 'Tutorial CRUD Laravel', 'Lorem Ipsum', NULL, '01-04-2019-10-04-06-tutorial-crud-laravel.mp4', '01-04-2019-10-04-05-tutorial-crud-laravel.jpg', 19),
(12, 'CRUD Laravel', 'Lorem Ipsum', NULL, '01-04-2019-10-04-35-crud-laravel.mp4', '01-04-2019-10-04-35-crud-laravel.jpg', 19),
(13, 'CRUD Laravel Query Builder', 'Lorem Ipsum', NULL, '01-04-2019-10-04-47-crud-laravel-query-builder.mp4', '01-04-2019-10-04-47-crud-laravel-query-builder.jpg', 19),
(14, 'Pengertian HTML', 'Lorem Ipsum', 2, '01-04-2019-10-04-16-pengertian-html.mp4', '01-04-2019-10-04-16-pengertian-html.jpg', 20),
(15, 'Memilih Text Editor', 'Lorem Ipsum', 2, '01-04-2019-10-04-40-memilih-text-editor.mp4', '01-04-2019-10-04-40-memilih-text-editor.jpg', 20),
(16, 'Mengenal Tag, Element, Atribut HTML', 'Lorem Ipsum', 1, '01-04-2019-10-04-08-mengenal-tag-element-atribut-html.mp4', '01-04-2019-10-04-07-mengenal-tag-element-atribut-html.jpg', 20),
(17, 'Heading Pada HTML', 'lorem ipsum', 1, '01-04-2019-10-04-35-heading-pada-html.mp4', '01-04-2019-10-04-34-heading-pada-html.jpg', 20),
(18, 'Format Text Pada HTML', 'Lorem Ipsum', NULL, '01-04-2019-10-04-00-format-text-pada-html.mp4', '01-04-2019-10-04-00-format-text-pada-html.jpg', 20),
(19, 'Membuat Paragraf Pada HTML', 'Lorem Ipsum', NULL, '01-04-2019-10-04-45-membuat-paragraf-pada-html.mp4', '01-04-2019-10-04-44-membuat-paragraf-pada-html.jpg', 20),
(20, 'Membuat Table Pada HTML', 'Lorem Ipsum', NULL, '01-04-2019-10-04-25-membuat-table-pada-html.mp4', '01-04-2019-10-04-25-membuat-table-pada-html.jpg', 20),
(21, 'Membuat Hyper Link Pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-57-membuat-hyper-link-pada-html.mp4', '01-04-2019-10-04-57-membuat-hyper-link-pada-html.jpg', 20),
(22, 'Membuat List Pada HTML', 'Lorem Ipsum', NULL, '01-04-2019-10-04-20-membuat-list-pada-html.mp4', '01-04-2019-10-04-19-membuat-list-pada-html.jpg', 20),
(23, 'Membuat Format Code pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-50-membuat-format-code-pada-html.mp4', '01-04-2019-10-04-49-membuat-format-code-pada-html.jpg', 20),
(24, 'Membuat Form pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-17-membuat-form-pada-html.mp4', '01-04-2019-10-04-17-membuat-form-pada-html.jpg', 20),
(25, 'Atribut Form pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-52-atribut-form-pada-html.mp4', '01-04-2019-10-04-52-atribut-form-pada-html.jpg', 20),
(26, 'Menampilkan Gambar pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-20-menampilkan-gambar-pada-html.mp4', '01-04-2019-10-04-19-menampilkan-gambar-pada-html.jpg', 20),
(27, 'Tag Iframe pada HTML', 'Lorem ipsum', NULL, '01-04-2019-10-04-45-tag-ifram-pada-html.mp4', '01-04-2019-10-04-44-tag-ifram-pada-html.jpg', 20),
(28, 'Menghubungkan HTML dengan CSS', 'lorem ipsum', NULL, '01-04-2019-10-04-47-menghubungkan-html-dengan-css.mp4', '01-04-2019-10-04-47-menghubungkan-html-dengan-css.jpg', 20),
(29, 'Mengenal Class dan ID pada HTML', 'lorem ipsum', NULL, '01-04-2019-10-04-19-mengenal-class-dan-id-pada-html.mp4', '01-04-2019-10-04-18-mengenal-class-dan-id-pada-html.jpg', 20),
(30, 'Membuat Symbol pada HTML', 'lorem ipsum', 2, '01-04-2019-10-04-46-membuat-symbol-pada-html.mp4', '01-04-2019-10-04-45-membuat-symbol-pada-html.jpg', 20),
(31, 'Belajar CSS Part 1 : Pengertian dan Pengenalan CSS', 'lorem ipsum', 1, '02-04-2019-11-04-33-belajar-css-part-1-pengertian-dan-pengenalan-css.mp4', '02-04-2019-11-04-33-belajar-css-part-1-pengertian-dan-pengenalan-css.jpg', 21),
(32, 'Belajar JavaScript Part 1 : Pengertian dan Pengenalan JavaScript', 'lorem ipsum', NULL, '02-04-2019-11-04-08-belajar-javascript-part-1-pengertian-dan-pengenalan-javascript.mp4', '02-04-2019-11-04-07-belajar-javascript-part-1-pengertian-dan-pengenalan-javascript.jpg', 22),
(34, '#1 - Pengenalan PHP', 'lorem ipsum', 1, '02-04-2019-11-04-14-1-pengenalan-php.mp4', '02-04-2019-11-04-13-1-pengenalan-php.jpg', 23),
(35, '#2 - Instalasi Web Server di Windows', NULL, 1, '02-04-2019-11-04-04-2-instalasi-web-server-di-windows.mp4', '02-04-2019-11-04-04-2-instalasi-web-server-di-windows.jpg', 23),
(36, 'Pengenalan dan Pengertian MySQL', 'lorem Ispum', NULL, '02-04-2019-12-04-12-pengenalan-dan-pengertian-mysql.mp4', '02-04-2019-12-04-12-pengenalan-dan-pengertian-mysql.jpg', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `config`
--
ALTER TABLE `config`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
