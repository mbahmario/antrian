-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 01 Okt 2019 pada 08.13
-- Versi Server: 10.1.41-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.1.32-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrianpolis`
--

CREATE TABLE `antrianpolis` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenisantrian_id` int(10) UNSIGNED NOT NULL,
  `nomor_antrian` int(11) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `periode` int(11) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `countertpp_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `antrianpolis`
--

INSERT INTO `antrianpolis` (`id`, `jenisantrian_id`, `nomor_antrian`, `tgl_antrian`, `periode`, `fiscal_year`, `status`, `countertpp_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-08-15', 8, 2019, 2, 2, 1, '2019-08-14 18:09:27', '2019-08-15 01:02:29'),
(2, 2, 2, '2019-08-15', 8, 2019, 2, 2, 1, '2019-08-14 18:12:16', '2019-08-15 01:03:14'),
(3, 1, 3, '2019-08-15', 8, 2019, 2, 2, 1, '2019-08-14 18:21:33', '2019-08-15 01:03:34'),
(4, 1, 1, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 19:02:08', '2019-08-15 19:02:43'),
(5, 1, 2, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 19:02:29', '2019-08-15 19:04:43'),
(6, 2, 3, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 19:04:35', '2019-08-15 19:04:53'),
(7, 1, 4, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 19:57:47', '2019-08-15 19:57:54'),
(8, 1, 5, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 19:59:27', '2019-08-15 19:59:47'),
(9, 2, 6, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 22:43:13', '2019-08-15 22:47:15'),
(10, 1, 7, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 22:43:25', '2019-08-15 22:51:33'),
(11, 1, 8, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 22:53:12', '2019-08-15 22:53:27'),
(12, 2, 9, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 22:57:11', '2019-08-15 22:57:36'),
(13, 1, 10, '2019-08-16', 8, 2019, 2, 2, 1, '2019-08-15 22:57:22', '2019-08-15 23:22:53'),
(14, 1, 1, '2019-08-20', 8, 2019, 2, 2, 1, '2019-08-19 20:39:30', '2019-08-19 22:00:28'),
(15, 1, 2, '2019-08-20', 8, 2019, 2, 2, 1, '2019-08-19 20:51:11', '2019-08-19 22:00:32'),
(16, 1, 5, '2019-08-20', 8, 2019, 2, 2, 2, '2019-08-19 22:05:22', '2019-08-19 22:05:45'),
(17, 1, 1, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:23:11', '2019-08-20 22:59:56'),
(18, 1, 3, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:35:37', '2019-08-20 23:01:00'),
(19, 1, 4, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:37:04', '2019-08-20 23:02:03'),
(20, 1, 5, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:46:01', '2019-08-20 23:02:28'),
(21, 1, 6, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:46:50', '2019-08-20 23:03:31'),
(22, 1, 7, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 22:49:08', '2019-08-20 23:04:46'),
(23, 1, 10, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 23:23:44', '2019-08-20 23:24:54'),
(24, 1, 11, '2019-08-21', 8, 2019, 2, 2, 1, '2019-08-20 23:24:07', '2019-08-20 23:25:06'),
(25, 1, 1, '2019-08-22', 8, 2019, 1, 2, 1, '2019-08-21 19:13:03', '2019-08-21 19:13:03'),
(26, 2, 5, '2019-08-23', 8, 2019, 1, 2, 1, '2019-08-22 23:41:36', '2019-08-22 23:41:36'),
(27, 2, 6, '2019-08-23', 8, 2019, 1, 3, 1, '2019-08-22 23:41:53', '2019-08-22 23:41:53'),
(28, 1, 1, '2019-08-24', 8, 2019, 1, 2, 1, '2019-08-23 19:11:00', '2019-08-23 19:11:00'),
(29, 1, 1, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:11:36', '2019-08-25 07:11:36'),
(30, 2, 2, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:20:31', '2019-08-25 07:20:31'),
(31, 1, 3, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:20:39', '2019-08-25 07:20:39'),
(32, 2, 4, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:20:44', '2019-08-25 07:20:44'),
(33, 1, 5, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:20:49', '2019-08-25 07:20:49'),
(34, 2, 6, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:20:57', '2019-08-25 07:20:57'),
(35, 1, 7, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:21:11', '2019-08-25 07:21:11'),
(36, 2, 8, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:21:19', '2019-08-25 07:21:19'),
(37, 2, 10, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:23:56', '2019-08-25 07:23:56'),
(38, 1, 11, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 07:24:12', '2019-08-25 07:24:12'),
(39, 1, 13, '2019-08-25', 8, 2019, 1, 2, 1, '2019-08-25 16:21:37', '2019-08-25 16:21:37'),
(40, 1, 1, '2019-08-30', 8, 2019, 2, 2, 1, '2019-08-30 02:37:12', '2019-08-30 07:29:11'),
(41, 2, 2, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:18:35', '2019-08-30 05:18:35'),
(42, 1, 3, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:21:27', '2019-08-30 05:21:27'),
(43, 2, 4, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:31:08', '2019-08-30 05:31:08'),
(44, 1, 5, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:31:27', '2019-08-30 05:31:27'),
(45, 2, 6, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:31:46', '2019-08-30 05:31:46'),
(46, 1, 7, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:32:07', '2019-08-30 05:32:07'),
(47, 2, 8, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:32:27', '2019-08-30 05:32:27'),
(48, 1, 9, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:33:04', '2019-08-30 05:33:04'),
(49, 2, 10, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:35:10', '2019-08-30 05:35:10'),
(50, 1, 11, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 05:35:28', '2019-08-30 05:35:28'),
(51, 1, 13, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:05:01', '2019-08-30 06:05:01'),
(52, 2, 14, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:05:18', '2019-08-30 06:05:18'),
(53, 1, 15, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:05:35', '2019-08-30 06:05:35'),
(54, 2, 16, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:05:52', '2019-08-30 06:05:52'),
(55, 1, 17, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:06:12', '2019-08-30 06:06:12'),
(56, 2, 18, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:06:27', '2019-08-30 06:06:27'),
(57, 2, 19, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:06:44', '2019-08-30 06:06:44'),
(58, 1, 20, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 06:07:51', '2019-08-30 06:07:51'),
(59, 1, 22, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 07:26:39', '2019-08-30 07:26:39'),
(60, 2, 23, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 07:27:07', '2019-08-30 07:27:07'),
(61, 1, 24, '2019-08-30', 8, 2019, 1, 2, 1, '2019-08-30 07:27:23', '2019-08-30 07:27:23'),
(62, 1, 1, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:02:33', '2019-08-30 19:02:33'),
(63, 2, 3, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:10:24', '2019-08-30 19:10:24'),
(64, 2, 4, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:10:36', '2019-08-30 19:10:36'),
(65, 1, 5, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:10:51', '2019-08-30 19:10:51'),
(66, 1, 6, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:11:07', '2019-08-30 19:11:07'),
(67, 2, 7, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:11:30', '2019-08-30 19:11:30'),
(68, 2, 8, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:11:45', '2019-08-30 19:11:45'),
(69, 1, 9, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:12:02', '2019-08-30 19:12:02'),
(70, 1, 10, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:12:14', '2019-08-30 19:12:14'),
(71, 2, 11, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:12:31', '2019-08-30 19:12:31'),
(72, 2, 12, '2019-08-31', 8, 2019, 1, 2, 1, '2019-08-30 19:14:01', '2019-08-30 19:14:01'),
(73, 1, 1, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:16:32', '2019-09-02 22:16:32'),
(74, 2, 2, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:16:47', '2019-09-02 22:16:47'),
(75, 1, 3, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:17:03', '2019-09-02 22:17:03'),
(76, 2, 4, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:17:21', '2019-09-02 22:17:21'),
(77, 1, 5, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:17:38', '2019-09-02 22:17:38'),
(78, 2, 6, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:17:54', '2019-09-02 22:17:54'),
(79, 1, 17, '2019-09-03', 9, 2019, 1, 2, 1, '2019-09-02 22:20:24', '2019-09-02 22:20:24'),
(80, 1, 1, '2019-09-07', 9, 2019, 1, 2, 1, '2019-09-07 01:18:55', '2019-09-07 01:18:55'),
(81, 1, 2, '2019-09-07', 9, 2019, 1, 2, 1, '2019-09-07 01:19:33', '2019-09-07 01:19:33'),
(82, 1, 1, '2019-09-18', 9, 2019, 1, 2, 1, '2019-09-18 02:35:40', '2019-09-18 02:35:40'),
(83, 2, 2, '2019-09-18', 9, 2019, 1, 2, 1, '2019-09-18 03:22:09', '2019-09-18 03:22:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrians`
--

CREATE TABLE `antrians` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenisantrian_id` int(10) UNSIGNED NOT NULL,
  `nomor_antrian` int(11) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `periode` int(11) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `antrians`
--

INSERT INTO `antrians` (`id`, `jenisantrian_id`, `nomor_antrian`, `tgl_antrian`, `periode`, `fiscal_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-08-15', 8, 2019, 2, '2019-08-14 17:57:44', '2019-08-14 18:09:21'),
(2, 2, 2, '2019-08-15', 8, 2019, 2, '2019-08-14 18:08:14', '2019-08-14 18:11:57'),
(3, 1, 3, '2019-08-15', 8, 2019, 2, '2019-08-14 18:08:38', '2019-08-14 18:21:24'),
(4, 2, 4, '2019-08-15', 8, 2019, 2, '2019-08-14 18:08:42', '2019-08-14 18:21:49'),
(5, 1, 5, '2019-08-15', 8, 2019, 2, '2019-08-14 18:11:25', '2019-08-14 18:22:02'),
(6, 1, 1, '2019-08-16', 8, 2019, 2, '2019-08-15 19:00:43', '2019-08-15 19:02:01'),
(7, 1, 2, '2019-08-16', 8, 2019, 2, '2019-08-15 19:00:52', '2019-08-15 19:02:22'),
(8, 2, 3, '2019-08-16', 8, 2019, 2, '2019-08-15 19:00:56', '2019-08-15 19:04:30'),
(9, 1, 4, '2019-08-16', 8, 2019, 2, '2019-08-15 19:01:02', '2019-08-15 19:57:43'),
(10, 1, 5, '2019-08-16', 8, 2019, 2, '2019-08-15 19:57:34', '2019-08-15 19:59:20'),
(11, 2, 6, '2019-08-16', 8, 2019, 2, '2019-08-15 22:41:42', '2019-08-15 22:43:08'),
(12, 1, 7, '2019-08-16', 8, 2019, 2, '2019-08-15 22:41:47', '2019-08-15 22:43:20'),
(13, 1, 8, '2019-08-16', 8, 2019, 2, '2019-08-15 22:42:46', '2019-08-15 22:53:04'),
(14, 2, 9, '2019-08-16', 8, 2019, 2, '2019-08-15 22:56:58', '2019-08-15 22:57:05'),
(15, 1, 10, '2019-08-16', 8, 2019, 2, '2019-08-15 22:57:01', '2019-08-15 22:57:18'),
(16, 1, 1, '2019-08-20', 8, 2019, 2, '2019-08-19 20:38:06', '2019-08-19 20:39:06'),
(17, 1, 2, '2019-08-20', 8, 2019, 2, '2019-08-19 20:39:35', '2019-08-19 20:44:38'),
(18, 1, 3, '2019-08-20', 8, 2019, 2, '2019-08-19 20:51:02', '2019-08-19 20:51:18'),
(19, 1, 4, '2019-08-20', 8, 2019, 2, '2019-08-19 20:51:33', '2019-08-19 20:53:10'),
(20, 1, 5, '2019-08-20', 8, 2019, 2, '2019-08-19 20:53:43', '2019-08-19 22:04:56'),
(21, 1, 1, '2019-08-21', 8, 2019, 2, '2019-08-20 22:22:47', '2019-08-20 22:23:02'),
(22, 2, 2, '2019-08-21', 8, 2019, 2, '2019-08-20 22:22:49', '2019-08-20 22:25:09'),
(23, 1, 3, '2019-08-21', 8, 2019, 2, '2019-08-20 22:34:18', '2019-08-20 22:34:35'),
(24, 1, 4, '2019-08-21', 8, 2019, 2, '2019-08-20 22:34:57', '2019-08-20 22:36:01'),
(25, 1, 5, '2019-08-21', 8, 2019, 2, '2019-08-20 22:36:57', '2019-08-20 22:37:24'),
(26, 1, 6, '2019-08-21', 8, 2019, 2, '2019-08-20 22:45:48', '2019-08-20 22:46:17'),
(27, 1, 7, '2019-08-21', 8, 2019, 2, '2019-08-20 22:46:47', '2019-08-20 22:47:11'),
(28, 1, 8, '2019-08-21', 8, 2019, 2, '2019-08-20 22:49:06', '2019-08-20 22:49:33'),
(29, 2, 9, '2019-08-21', 8, 2019, 2, '2019-08-20 22:58:38', '2019-08-20 22:59:01'),
(30, 1, 10, '2019-08-21', 8, 2019, 2, '2019-08-20 23:18:44', '2019-08-20 23:18:51'),
(31, 1, 11, '2019-08-21', 8, 2019, 2, '2019-08-20 23:23:38', '2019-08-20 23:23:46'),
(32, 2, 12, '2019-08-21', 8, 2019, 2, '2019-08-20 23:24:02', '2019-08-20 23:24:08'),
(33, 1, 1, '2019-08-22', 8, 2019, 2, '2019-08-21 19:06:44', '2019-08-21 19:11:47'),
(34, 1, 2, '2019-08-22', 8, 2019, 2, '2019-08-21 19:12:58', '2019-08-21 19:34:06'),
(35, 1, 1, '2019-08-23', 8, 2019, 2, '2019-08-22 22:52:45', '2019-08-22 22:54:38'),
(36, 2, 2, '2019-08-23', 8, 2019, 2, '2019-08-22 22:54:29', '2019-08-22 22:58:07'),
(37, 1, 3, '2019-08-23', 8, 2019, 2, '2019-08-22 22:57:54', '2019-08-22 22:59:03'),
(38, 2, 4, '2019-08-23', 8, 2019, 2, '2019-08-22 22:59:52', '2019-08-22 22:59:56'),
(39, 2, 5, '2019-08-23', 8, 2019, 2, '2019-08-22 23:02:58', '2019-08-22 23:05:03'),
(40, 2, 6, '2019-08-23', 8, 2019, 2, '2019-08-22 23:03:30', '2019-08-22 23:51:33'),
(41, 2, 7, '2019-08-23', 8, 2019, 2, '2019-08-22 23:51:57', '2019-08-22 23:52:02'),
(42, 1, 8, '2019-08-23', 8, 2019, 2, '2019-08-22 23:51:58', '2019-08-22 23:52:18'),
(43, 1, 1, '2019-08-24', 8, 2019, 2, '2019-08-23 19:10:20', '2019-08-23 19:10:45'),
(44, 2, 2, '2019-08-24', 8, 2019, 2, '2019-08-23 19:10:21', '2019-08-23 19:12:51'),
(45, 2, 3, '2019-08-24', 8, 2019, 2, '2019-08-23 20:41:43', '2019-08-23 20:41:48'),
(46, 2, 4, '2019-08-24', 8, 2019, 2, '2019-08-23 20:44:13', '2019-08-23 20:44:16'),
(47, 2, 5, '2019-08-24', 8, 2019, 2, '2019-08-23 20:44:54', '2019-08-23 20:44:56'),
(48, 2, 6, '2019-08-24', 8, 2019, 2, '2019-08-23 20:45:36', '2019-08-23 20:45:41'),
(49, 1, 7, '2019-08-24', 8, 2019, 2, '2019-08-23 20:47:27', '2019-08-23 20:47:33'),
(50, 2, 8, '2019-08-24', 8, 2019, 2, '2019-08-23 20:48:17', '2019-08-23 20:48:21'),
(51, 1, 9, '2019-08-24', 8, 2019, 2, '2019-08-23 21:08:29', '2019-08-23 21:08:33'),
(52, 2, 10, '2019-08-24', 8, 2019, 2, '2019-08-23 21:09:55', '2019-08-23 21:10:04'),
(53, 1, 11, '2019-08-24', 8, 2019, 2, '2019-08-23 21:17:11', '2019-08-23 21:17:21'),
(54, 2, 12, '2019-08-24', 8, 2019, 2, '2019-08-23 21:19:10', '2019-08-23 21:19:16'),
(55, 2, 13, '2019-08-24', 8, 2019, 2, '2019-08-23 21:21:19', '2019-08-23 21:22:15'),
(56, 2, 14, '2019-08-24', 8, 2019, 2, '2019-08-23 21:30:07', '2019-08-23 21:30:17'),
(57, 2, 15, '2019-08-24', 8, 2019, 2, '2019-08-23 21:32:58', '2019-08-23 21:33:01'),
(58, 1, 16, '2019-08-24', 8, 2019, 2, '2019-08-23 21:36:43', '2019-08-23 21:36:47'),
(59, 2, 17, '2019-08-24', 8, 2019, 2, '2019-08-23 21:37:39', '2019-08-23 21:38:35'),
(60, 1, 1, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:25', '2019-08-25 07:11:01'),
(61, 2, 2, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:26', '2019-08-25 07:11:37'),
(62, 1, 3, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:27', '2019-08-25 07:20:34'),
(63, 2, 4, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:27', '2019-08-25 07:20:41'),
(64, 1, 5, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:28', '2019-08-25 07:20:45'),
(65, 2, 6, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:29', '2019-08-25 07:20:52'),
(66, 1, 7, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:30', '2019-08-25 07:21:02'),
(67, 2, 8, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:30', '2019-08-25 07:21:15'),
(68, 1, 9, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:34', '2019-08-25 07:21:23'),
(69, 2, 10, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:35', '2019-08-25 07:23:44'),
(70, 1, 11, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:35', '2019-08-25 07:24:04'),
(71, 2, 12, '2019-08-25', 8, 2019, 2, '2019-08-25 07:10:36', '2019-08-25 07:24:21'),
(72, 1, 13, '2019-08-25', 8, 2019, 2, '2019-08-25 16:18:00', '2019-08-25 16:21:27'),
(73, 1, 1, '2019-08-30', 8, 2019, 2, '2019-08-30 02:36:56', '2019-08-30 02:37:08'),
(74, 2, 2, '2019-08-30', 8, 2019, 2, '2019-08-30 02:37:01', '2019-08-30 05:18:24'),
(75, 1, 3, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:35', '2019-08-30 05:21:15'),
(76, 2, 4, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:35', '2019-08-30 05:21:28'),
(77, 1, 5, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:36', '2019-08-30 05:31:14'),
(78, 2, 6, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:36', '2019-08-30 05:31:29'),
(79, 1, 7, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:37', '2019-08-30 05:31:49'),
(80, 2, 8, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:37', '2019-08-30 05:32:09'),
(81, 1, 9, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:38', '2019-08-30 05:32:49'),
(82, 2, 10, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:38', '2019-08-30 05:33:07'),
(83, 1, 11, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:38', '2019-08-30 05:35:12'),
(84, 2, 12, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:39', '2019-08-30 05:35:40'),
(85, 1, 13, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:39', '2019-08-30 06:04:42'),
(86, 2, 14, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:40', '2019-08-30 06:05:02'),
(87, 1, 15, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:40', '2019-08-30 06:05:20'),
(88, 2, 16, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:41', '2019-08-30 06:05:36'),
(89, 1, 17, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:41', '2019-08-30 06:05:54'),
(90, 2, 18, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:42', '2019-08-30 06:06:13'),
(91, 2, 19, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:47', '2019-08-30 06:06:29'),
(92, 1, 20, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:47', '2019-08-30 06:06:47'),
(93, 2, 21, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:48', '2019-08-30 06:08:04'),
(94, 1, 22, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:48', '2019-08-30 07:26:33'),
(95, 2, 23, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:48', '2019-08-30 07:26:50'),
(96, 1, 24, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:49', '2019-08-30 07:27:08'),
(97, 2, 25, '2019-08-30', 8, 2019, 2, '2019-08-30 05:11:49', '2019-08-30 07:27:25'),
(98, 1, 1, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:48', '2019-08-30 19:01:01'),
(99, 1, 2, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:48', '2019-08-30 19:02:35'),
(100, 2, 3, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:49', '2019-08-30 19:10:10'),
(101, 2, 4, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:49', '2019-08-30 19:10:26'),
(102, 1, 5, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:49', '2019-08-30 19:10:40'),
(103, 1, 6, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:50', '2019-08-30 19:10:53'),
(104, 2, 7, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:50', '2019-08-30 19:11:09'),
(105, 2, 8, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:50', '2019-08-30 19:11:32'),
(106, 1, 9, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:50', '2019-08-30 19:11:46'),
(107, 1, 10, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:51', '2019-08-30 19:12:04'),
(108, 2, 11, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:51', '2019-08-30 19:12:18'),
(109, 2, 12, '2019-08-31', 8, 2019, 2, '2019-08-30 19:00:51', '2019-08-30 19:12:36'),
(110, 1, 1, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:05', '2019-09-02 22:16:19'),
(111, 2, 2, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:05', '2019-09-02 22:16:34'),
(112, 1, 3, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:05', '2019-09-02 22:16:50'),
(113, 2, 4, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:05', '2019-09-02 22:17:08'),
(114, 1, 5, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:06', '2019-09-02 22:17:24'),
(115, 2, 6, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:06', '2019-09-02 22:17:40'),
(116, 1, 7, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:06', '2019-09-02 22:17:56'),
(117, 2, 8, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:07', '2019-09-02 22:16:07'),
(118, 1, 9, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:07', '2019-09-02 22:16:07'),
(119, 2, 10, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:07', '2019-09-02 22:16:07'),
(120, 1, 11, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:08', '2019-09-02 22:16:08'),
(121, 2, 12, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:08', '2019-09-02 22:16:08'),
(122, 1, 13, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:08', '2019-09-02 22:16:08'),
(123, 2, 14, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:09', '2019-09-02 22:16:09'),
(124, 1, 15, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:09', '2019-09-02 22:16:09'),
(125, 2, 16, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:09', '2019-09-02 22:16:09'),
(126, 1, 17, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:10', '2019-09-02 22:20:06'),
(127, 2, 18, '2019-09-03', 9, 2019, 2, '2019-09-02 22:16:10', '2019-09-02 22:21:06'),
(128, 1, 1, '2019-09-07', 9, 2019, 2, '2019-09-07 01:16:58', '2019-09-07 01:18:34'),
(129, 1, 2, '2019-09-07', 9, 2019, 2, '2019-09-07 01:16:59', '2019-09-07 01:18:56'),
(130, 1, 3, '2019-09-07', 9, 2019, 1, '2019-09-07 01:16:59', '2019-09-07 01:16:59'),
(131, 1, 4, '2019-09-07', 9, 2019, 1, '2019-09-07 01:16:59', '2019-09-07 01:16:59'),
(132, 1, 5, '2019-09-07', 9, 2019, 1, '2019-09-07 01:16:59', '2019-09-07 01:16:59'),
(133, 2, 6, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:00', '2019-09-07 01:17:00'),
(134, 2, 7, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:00', '2019-09-07 01:17:00'),
(135, 2, 8, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:00', '2019-09-07 01:17:00'),
(136, 2, 9, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:01', '2019-09-07 01:17:01'),
(137, 2, 10, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:01', '2019-09-07 01:17:01'),
(138, 2, 11, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:01', '2019-09-07 01:17:01'),
(139, 2, 12, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:01', '2019-09-07 01:17:01'),
(140, 1, 13, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:02', '2019-09-07 01:17:02'),
(141, 1, 14, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:02', '2019-09-07 01:17:02'),
(142, 1, 15, '2019-09-07', 9, 2019, 1, '2019-09-07 01:17:02', '2019-09-07 01:17:02'),
(143, 1, 1, '2019-09-18', 9, 2019, 2, '2019-09-18 02:27:31', '2019-09-18 02:35:25'),
(144, 2, 2, '2019-09-18', 9, 2019, 2, '2019-09-18 02:27:55', '2019-09-18 03:20:49'),
(145, 1, 3, '2019-09-18', 9, 2019, 1, '2019-09-18 02:27:59', '2019-09-18 02:27:59'),
(146, 2, 4, '2019-09-18', 9, 2019, 1, '2019-09-18 02:28:03', '2019-09-18 02:28:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `countertpps`
--

CREATE TABLE `countertpps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `countertpps`
--

INSERT INTO `countertpps` (`id`, `name`, `alias`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tempat Pendaftaran', 'tempatpendaftaran', 1, '2019-01-22 06:04:39', '2019-09-18 04:24:55'),
(2, 'Poliklinik Gigi', 'poliklinikgigi', 2, '2019-01-25 05:02:59', '2019-01-25 05:02:59'),
(3, 'Poliklinik Umum', 'poliklinikumum', 3, '2019-01-25 05:03:07', '2019-01-25 05:03:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisantrians`
--

CREATE TABLE `jenisantrians` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenisantrians`
--

INSERT INTO `jenisantrians` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BPJS', '2019-01-22 05:58:24', '2019-01-22 05:58:24'),
(2, 'UMUM', '2019-01-22 05:58:28', '2019-01-22 05:58:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locks`
--

CREATE TABLE `locks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_01_04_123025_create_permission_tables', 1),
(36, '2019_01_05_104000_create_jenisantrians_table', 1),
(37, '2019_01_05_110213_create_countertpps_table', 1),
(38, '2019_01_05_112506_create_antrians_table', 1),
(39, '2019_01_23_223446_create_antrianpolis_table', 2),
(40, '2019_08_19_034841_create_locks_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(1, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2019-01-22 05:57:55', '2019-01-22 05:57:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-01-22 05:58:00', '2019-01-22 05:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rio Irmayanto', 'rio.irmayanto@gmail.com', NULL, '$2y$10$2CGGyWLXYbM5mDIlcMLv3.d6//nfbQF51n3OFaihTceu6Lew6tORC', 'x28JSJgPvqaQy5rxdECaScR1GKQZe657a73PtU8tna6PGR8wdtTACpFWgsmL', '2019-01-22 05:57:47', '2019-01-22 05:58:14'),
(2, 'Admin Poliklinik Gigi', 'poligigi@antrian.com', NULL, '$2y$10$X3bBFGyRMoZtmRGminv2v.yRe/qHZcdfr0ucvIPz3TE/J0LY/m.T6', 'FGhxYL3IEevM4zXl0fN5ZiqDbD7LPImCx4tPnblCvAdFm0gVgx9T1HwpQVHK', '2019-01-25 05:02:15', '2019-01-25 05:02:15'),
(3, 'Admin Poliklinik Umum', 'poliumum@antrian.com', NULL, '$2y$10$kZq.2Dh23te3NJ02lODiueFWpNshrS0.Fdu/WqhHMsrYGkvBrI.kC', NULL, '2019-01-25 05:02:45', '2019-01-25 05:02:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrianpolis`
--
ALTER TABLE `antrianpolis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `antrianpolis_countertpp_id_foreign` (`countertpp_id`),
  ADD KEY `antrianpolis_jenisantrian_id_foreign` (`jenisantrian_id`),
  ADD KEY `antrianpolis_user_id_foreign` (`user_id`);

--
-- Indexes for table `antrians`
--
ALTER TABLE `antrians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `antrians_jenisantrian_id_foreign` (`jenisantrian_id`);

--
-- Indexes for table `countertpps`
--
ALTER TABLE `countertpps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countertpps_user_id_foreign` (`user_id`);

--
-- Indexes for table `jenisantrians`
--
ALTER TABLE `jenisantrians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locks`
--
ALTER TABLE `locks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locks_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrianpolis`
--
ALTER TABLE `antrianpolis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `antrians`
--
ALTER TABLE `antrians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `countertpps`
--
ALTER TABLE `countertpps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenisantrians`
--
ALTER TABLE `jenisantrians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locks`
--
ALTER TABLE `locks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrianpolis`
--
ALTER TABLE `antrianpolis`
  ADD CONSTRAINT `antrianpolis_countertpp_id_foreign` FOREIGN KEY (`countertpp_id`) REFERENCES `countertpps` (`id`),
  ADD CONSTRAINT `antrianpolis_jenisantrian_id_foreign` FOREIGN KEY (`jenisantrian_id`) REFERENCES `jenisantrians` (`id`),
  ADD CONSTRAINT `antrianpolis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `antrians`
--
ALTER TABLE `antrians`
  ADD CONSTRAINT `antrians_jenisantrian_id_foreign` FOREIGN KEY (`jenisantrian_id`) REFERENCES `jenisantrians` (`id`);

--
-- Ketidakleluasaan untuk tabel `countertpps`
--
ALTER TABLE `countertpps`
  ADD CONSTRAINT `countertpps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `locks`
--
ALTER TABLE `locks`
  ADD CONSTRAINT `locks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
