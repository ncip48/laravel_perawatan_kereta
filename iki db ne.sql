-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2024 at 07:45 AM
-- Server version: 8.3.0
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perawatan_imss`
--

-- --------------------------------------------------------

--
-- Table structure for table `checksheet`
--

CREATE TABLE `checksheet` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kereta` int NOT NULL,
  `id_user` int NOT NULL,
  `date_time` datetime NOT NULL,
  `no_kereta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_so` int DEFAULT NULL,
  `p` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_approve_assman` int DEFAULT NULL,
  `id_approve_spv` int DEFAULT NULL,
  `is_approve` int DEFAULT NULL,
  `est_tso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checksheet`
--

INSERT INTO `checksheet` (`id`, `id_kereta`, `id_user`, `date_time`, `no_kereta`, `tipe`, `jam_engine`, `is_so`, `p`, `created_at`, `updated_at`, `id_approve_assman`, `id_approve_spv`, `is_approve`, `est_tso`) VALUES
(1, 1, 1, '2023-08-21 16:12:56', '1233', '0', '1234', NULL, NULL, '2023-08-21 06:31:15', '2023-08-21 06:31:15', NULL, NULL, NULL, NULL),
(21, 1, 1, '2023-10-12 09:04:16', '123-55', '0', '12-098', NULL, NULL, '2023-10-12 02:04:16', '2023-10-12 02:04:16', NULL, NULL, NULL, NULL),
(23, 1, 1, '2023-10-13 08:19:12', 'ABBB', '0', '28181', NULL, NULL, '2023-10-13 01:19:12', '2023-10-13 01:19:12', NULL, NULL, NULL, NULL),
(25, 1, 1, '2023-10-13 10:15:27', 'BCCC', '1', '123', NULL, 'P1', '2023-10-13 03:15:27', '2023-10-13 03:15:27', NULL, NULL, NULL, NULL),
(26, 1, 1, '2023-10-19 08:07:25', 'GggGggg', '0', '18181818', NULL, NULL, '2023-10-19 01:07:25', '2023-10-19 01:07:25', NULL, NULL, NULL, NULL),
(27, 1, 1, '2023-11-13 08:54:36', '11', '0', '12:00', NULL, NULL, '2023-11-13 01:54:36', '2023-11-13 01:54:36', NULL, NULL, NULL, NULL),
(28, 1, 1, '2023-11-28 11:01:45', '45454', '0', 'sdfsdf', NULL, NULL, '2023-11-28 04:01:45', '2023-11-28 04:01:45', NULL, NULL, NULL, NULL),
(29, 1, 1, '2023-11-29 22:58:19', 'A', '0', 'Bbb', NULL, NULL, '2023-11-29 15:58:19', '2023-11-29 15:58:19', NULL, NULL, NULL, NULL),
(30, 1, 1, '2023-11-30 18:26:50', 'abc', '0', 'def', NULL, NULL, '2023-11-30 11:26:50', '2023-11-30 11:26:50', NULL, NULL, NULL, NULL),
(31, 1, 1, '2023-12-18 08:40:30', 'abcdef', '0', '1234', NULL, NULL, '2023-12-18 01:40:30', '2023-12-18 01:40:30', NULL, NULL, NULL, NULL),
(32, 1, 1, '2023-12-20 13:45:44', 'awokowkwokwo', '0', '123123', NULL, NULL, '2023-12-20 06:45:44', '2023-12-20 06:45:44', NULL, NULL, NULL, NULL),
(33, 1, 1, '2023-12-30 15:17:18', 'Ahahaha', '0', '18181', NULL, NULL, '2023-12-30 08:17:18', '2023-12-30 08:17:18', NULL, NULL, NULL, NULL),
(34, 1, 1, '2024-03-25 12:10:41', '123', '0', '11.12', NULL, NULL, '2024-03-25 05:10:41', '2024-03-25 05:10:41', NULL, NULL, NULL, NULL),
(35, 1, 1, '2024-04-01 20:51:07', 'asdf', '0', 'oke', NULL, NULL, '2024-04-01 13:51:07', '2024-04-01 13:51:07', NULL, NULL, NULL, NULL),
(37, 1, 1, '2024-04-18 14:00:53', 'ABC', '0', '1010', NULL, NULL, '2024-04-18 07:00:53', '2024-04-18 07:00:53', NULL, NULL, NULL, NULL),
(38, 1, 1, '2024-04-19 18:28:24', 'bb', '0', '11', 0, NULL, '2024-04-19 11:28:24', '2024-04-19 11:28:24', NULL, NULL, NULL, NULL),
(39, 1, 1, '2024-04-21 01:47:13', 'pp', '0', 'ppp', 1, NULL, '2024-04-20 18:47:13', '2024-04-20 18:47:13', NULL, NULL, NULL, NULL),
(40, 1, 1, '2024-04-21 01:48:41', 'uu', '1', 'yy', 0, 'P2', '2024-04-20 18:48:41', '2024-04-23 02:32:18', NULL, NULL, NULL, NULL),
(41, 1, 1, '2024-04-23 10:24:36', '1233', '0', '89', 0, NULL, '2024-04-23 03:24:36', '2024-04-23 12:02:16', NULL, NULL, NULL, NULL),
(58, 1, 12, '2024-05-28 16:04:17', 'K3 01 20 01-03', '0', '7', 1, NULL, '2024-05-28 09:04:17', '2024-05-28 10:41:53', 11, 13, NULL, NULL),
(59, 1, 12, '2024-05-26 20:38:13', 'K3 01 20 01-03', '1', '12', 1, 'P3', '2024-05-28 13:38:13', '2024-05-28 13:41:52', NULL, NULL, NULL, NULL),
(60, 1, 12, '2024-05-29 15:32:17', 'K3 01 20 01-03', '0', '50', 1, NULL, '2024-05-29 08:32:17', '2024-05-30 06:23:33', NULL, NULL, NULL, NULL),
(61, 1, 12, '2024-05-30 13:15:42', 'K3 01 20 01-03', '0', '80', 0, NULL, '2024-05-30 06:15:42', '2024-07-22 10:50:08', 11, 13, NULL, '2024-07-31'),
(62, 1, 12, '2024-05-31 19:12:12', 'K3 01 20 01-03', '0', '6789', NULL, NULL, '2024-05-31 12:12:12', '2024-07-22 10:50:07', 11, 13, NULL, NULL),
(67, 1, 7, '2024-07-24 13:57:33', 'K3 2 20 01-03', '0', '2', 1, NULL, '2024-07-24 06:57:33', '2024-07-24 06:58:58', NULL, NULL, NULL, NULL),
(68, 1, 7, '2024-07-29 11:02:06', 'K3 2 20 01-03', '1', '30', 0, 'P1', '2024-07-29 04:02:06', '2024-07-29 04:26:32', 11, 13, NULL, '2024-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `detail_checksheet`
--

CREATE TABLE `detail_checksheet` (
  `id` bigint UNSIGNED NOT NULL,
  `id_checksheet` int NOT NULL,
  `id_item_checksheet` int NOT NULL,
  `dilakukan` tinyint(1) DEFAULT NULL,
  `hasil` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_checksheet`
--

INSERT INTO `detail_checksheet` (`id`, `id_checksheet`, `id_item_checksheet`, `dilakukan`, `hasil`, `keterangan`, `created_at`, `updated_at`, `car`) VALUES
(1, 14, 1, 1, 1, 'Test keterangan', NULL, NULL, NULL),
(2, 14, 2, 1, 0, '', NULL, NULL, NULL),
(6, 17, 1, 1, 1, 'Baik', '2023-10-09 04:09:20', '2023-10-09 12:10:58', NULL),
(7, 17, 2, 0, 0, 'Awkwolwo', '2023-10-09 04:11:30', '2023-10-09 12:11:23', NULL),
(8, 17, 3, 1, 1, '-', '2023-10-09 04:11:47', '2023-10-09 10:46:36', NULL),
(9, 17, 4, 0, 0, NULL, '2023-10-09 04:11:59', '2023-10-09 04:11:59', NULL),
(10, 17, 5, 0, 1, NULL, '2023-10-09 04:12:51', '2023-10-09 04:12:52', NULL),
(11, 17, 8, 1, 0, '<script>alert(\"ok\')</script>\n<h1>WOY</h1>', '2023-10-09 04:13:02', '2023-10-09 10:43:02', NULL),
(12, 18, 1, 1, 0, 'Oke bang', '2023-10-10 00:55:03', '2023-10-10 00:56:22', NULL),
(13, 18, 2, 1, 1, NULL, '2023-10-10 03:25:09', '2023-10-10 03:25:11', NULL),
(14, 18, 3, 1, 0, NULL, '2023-10-10 03:25:22', '2023-10-10 03:25:24', NULL),
(15, 18, 5, 1, NULL, NULL, '2023-10-10 13:14:52', '2023-10-10 13:14:52', NULL),
(16, 20, 5, 1, 0, NULL, '2023-10-11 09:04:23', '2023-10-11 09:04:30', NULL),
(17, 21, 1, 1, 1, NULL, '2023-10-12 02:07:14', '2023-10-12 02:07:20', NULL),
(18, 21, 2, 1, 1, NULL, '2023-10-12 03:12:03', '2023-10-12 03:12:11', NULL),
(19, 23, 1, 1, 1, NULL, '2023-10-13 01:19:28', '2023-10-13 01:19:29', NULL),
(20, 25, 17, 1, 1, 'uji coba keterangan yang menggunakan banyak kata apakah kata akan wrap kebawah atau blabass kesamping  \napakah akan mengubah tampilan tabel', '2023-10-13 03:15:41', '2023-10-13 03:17:57', NULL),
(21, 25, 1, 1, 0, '<script>\nalert(\"Hello! I am an alert box!!\");\n</script>', '2023-10-13 03:24:46', '2023-10-13 03:25:46', NULL),
(22, 26, 1, 1, 1, 'Okkkk', '2023-10-19 01:07:51', '2023-10-19 01:08:45', NULL),
(23, 28, 1, 1, 1, 'OKKK', '2023-11-28 04:01:59', '2023-11-28 04:02:08', NULL),
(24, 28, 2, 0, 0, NULL, '2023-11-28 04:06:04', '2023-11-28 04:06:06', NULL),
(25, 29, 1, 1, 1, NULL, '2023-11-29 15:58:25', '2023-11-29 15:58:27', NULL),
(26, 31, 1, 1, 0, NULL, '2023-12-18 01:41:25', '2023-12-18 01:41:28', NULL),
(27, 32, 1, 1, 1, NULL, '2023-12-20 06:47:20', '2023-12-20 06:47:22', NULL),
(28, 34, 1, 1, 1, 'okdeh', '2024-03-25 05:10:46', '2024-03-25 15:16:05', NULL),
(29, 34, 2, 1, 0, NULL, '2024-03-25 05:13:36', '2024-03-25 05:13:37', NULL),
(30, 34, 3, 1, 1, NULL, '2024-03-25 05:13:51', '2024-03-25 05:13:53', NULL),
(31, 34, 4, 1, 1, NULL, '2024-03-25 05:15:07', '2024-03-25 05:15:09', NULL),
(32, 34, 5, 0, 0, NULL, '2024-03-25 05:15:19', '2024-03-25 05:15:21', NULL),
(33, 35, 1, 1, 1, NULL, '2024-04-01 13:51:34', '2024-04-01 13:51:34', NULL),
(34, 37, 1, 1, 1, NULL, '2024-04-18 07:01:09', '2024-04-18 07:11:40', NULL),
(35, 37, 2, 0, 0, 'suspensi rusak', '2024-04-18 07:01:30', '2024-04-18 07:01:37', NULL),
(36, 38, 1, 1, 1, NULL, '2024-04-19 12:13:27', '2024-04-19 12:13:28', NULL),
(37, 38, 2, 1, 1, 'Abcd', '2024-04-19 12:14:19', '2024-04-19 12:14:28', NULL),
(38, 39, 1, 1, 0, 'uuuuup', '2024-04-20 18:47:27', '2024-04-20 18:47:39', NULL),
(39, 39, 2, NULL, NULL, NULL, '2024-04-20 18:47:47', '2024-04-20 18:47:47', NULL),
(40, 40, 20, 1, 0, NULL, '2024-04-20 18:48:46', '2024-04-20 18:48:47', NULL),
(41, 40, 1, 0, 0, 'yuhg', '2024-04-20 18:48:54', '2024-04-22 23:38:54', NULL),
(42, 40, 2, 1, NULL, NULL, '2024-04-23 02:34:37', '2024-04-23 02:34:37', NULL),
(43, 40, 4, 1, NULL, NULL, '2024-04-23 02:36:51', '2024-04-23 02:36:51', NULL),
(44, 41, 1, 0, 0, NULL, '2024-04-23 03:25:22', '2024-04-23 03:29:16', NULL),
(45, 41, 4, 1, 1, NULL, '2024-04-23 03:29:23', '2024-04-23 03:29:24', NULL),
(46, 41, 2, 1, 1, NULL, '2024-04-23 05:37:31', '2024-04-23 05:37:33', NULL),
(47, 41, 5, 1, 1, NULL, '2024-04-23 05:37:42', '2024-04-23 05:37:43', NULL),
(48, 41, 8, 1, 1, NULL, '2024-04-23 05:37:50', '2024-04-23 05:37:52', NULL),
(49, 41, 6, 1, 1, 'Aa', '2024-04-23 08:20:15', '2024-04-23 08:21:11', NULL),
(50, 42, 1, 1, 1, NULL, '2024-05-04 15:22:18', '2024-05-04 15:22:22', NULL),
(51, 43, 1, 1, 1, NULL, '2024-05-07 02:39:50', '2024-05-07 02:39:52', NULL),
(52, 44, 1, 1, 1, 'ok', '2024-05-07 02:43:46', '2024-05-07 02:44:23', NULL),
(53, 43, 9, 1, 1, NULL, '2024-05-07 09:03:09', '2024-05-07 09:03:11', NULL),
(54, 43, 2, 1, 1, NULL, '2024-05-07 09:03:56', '2024-05-07 09:04:09', NULL),
(55, 43, 3, 1, 0, 'contoh keterangan', '2024-05-07 09:45:42', '2024-05-07 09:46:14', NULL),
(56, 46, 1, 1, 0, NULL, '2024-05-13 08:06:25', '2024-05-13 08:06:35', NULL),
(57, 51, 1, 1, 1, NULL, '2024-05-13 08:15:51', '2024-05-13 08:15:53', NULL),
(58, 51, 4, 1, 1, NULL, '2024-05-13 08:15:58', '2024-05-13 08:16:00', NULL),
(59, 46, 2, 1, 1, NULL, '2024-05-13 09:10:02', '2024-05-13 09:10:18', NULL),
(60, 52, 3, 1, 1, NULL, '2024-05-14 03:21:34', '2024-05-14 03:21:36', NULL),
(61, 52, 1, 1, 1, NULL, '2024-05-14 10:05:56', '2024-05-14 10:05:58', NULL),
(62, 53, 1, 1, 1, NULL, '2024-05-15 11:33:11', '2024-05-15 13:21:04', NULL),
(63, 53, 2, 1, NULL, NULL, '2024-05-15 12:45:34', '2024-05-15 12:45:34', NULL),
(64, 54, 1, 1, NULL, NULL, '2024-05-17 13:47:18', '2024-05-17 13:47:18', NULL),
(67, 55, 1, 1, 1, '23 Mei 2024', '2024-05-23 11:52:34', '2024-05-23 12:12:29', 0),
(68, 55, 1, 1, 1, '23 Mei 2024', '2024-05-23 11:59:48', '2024-05-24 10:37:27', 2),
(70, 55, 2, 1, 1, NULL, '2024-05-23 14:36:25', '2024-05-23 14:36:25', 1),
(71, 55, 3, 1, 1, NULL, '2024-05-24 10:36:54', '2024-05-24 10:36:54', 0),
(72, 55, 3, 1, 1, NULL, '2024-05-24 10:36:55', '2024-05-24 10:36:55', 1),
(73, 55, 3, 1, 1, NULL, '2024-05-24 10:37:02', '2024-05-24 10:37:02', 2),
(74, 56, 1, 1, 1, 'tidak baiknya kenapa', '2024-05-27 14:13:50', '2024-05-27 14:14:14', 0),
(75, 56, 1, 1, 0, NULL, '2024-05-27 14:14:00', '2024-05-27 14:14:00', 2),
(76, 58, 1, 1, 1, NULL, '2024-05-28 10:41:29', '2024-05-28 10:41:29', 0),
(77, 58, 1, 1, 1, NULL, '2024-05-28 10:41:33', '2024-05-28 10:41:33', 2),
(78, 59, 1, 1, 1, NULL, '2024-05-28 13:38:18', '2024-05-28 13:38:18', 0),
(79, 59, 1, 1, 1, NULL, '2024-05-28 13:38:21', '2024-05-28 13:38:21', 2),
(80, 59, 3, 1, 1, NULL, '2024-05-28 13:38:25', '2024-05-28 13:38:25', 0),
(81, 59, 3, 1, 1, NULL, '2024-05-28 13:38:27', '2024-05-28 13:38:27', 1),
(82, 59, 3, 1, 1, NULL, '2024-05-28 13:38:29', '2024-05-28 13:38:29', 2),
(83, 58, 2, 1, 0, NULL, '2024-05-28 15:12:40', '2024-05-28 15:12:40', 1),
(84, 58, 3, 1, 0, NULL, '2024-05-28 16:14:25', '2024-05-28 16:14:25', 0),
(85, 58, 3, 1, 0, NULL, '2024-05-28 16:14:26', '2024-05-28 16:14:26', 1),
(86, 58, 3, 1, 0, NULL, '2024-05-28 16:14:27', '2024-05-28 16:14:27', 2),
(87, 60, 4, 1, 1, NULL, '2024-05-29 08:32:36', '2024-05-29 08:32:36', 1),
(88, 60, 5, 1, 1, NULL, '2024-05-29 08:32:40', '2024-05-29 08:32:40', 0),
(89, 60, 5, 1, 1, NULL, '2024-05-29 08:32:41', '2024-05-29 08:32:41', 2),
(90, 60, 6, 1, 1, NULL, '2024-05-29 08:32:48', '2024-05-29 08:32:48', 0),
(91, 60, 6, 1, 1, NULL, '2024-05-29 08:32:49', '2024-05-29 08:32:49', 2),
(92, 61, 1, 1, 0, NULL, '2024-05-30 06:15:53', '2024-05-30 06:15:53', 0),
(93, 61, 1, 1, 0, NULL, '2024-05-30 06:15:54', '2024-05-30 06:15:54', 2),
(94, 61, 2, 1, 0, NULL, '2024-05-30 06:16:12', '2024-05-30 06:16:12', 1),
(95, 61, 3, 1, 0, NULL, '2024-05-30 06:16:13', '2024-05-30 06:16:13', 0),
(96, 61, 3, 1, 0, NULL, '2024-05-30 06:16:15', '2024-05-30 06:16:15', 1),
(97, 61, 3, 1, 0, NULL, '2024-05-30 06:16:16', '2024-05-30 06:16:16', 2),
(98, 61, 4, 1, 0, NULL, '2024-05-30 06:16:18', '2024-05-30 06:16:18', 1),
(99, 61, 5, 1, 0, NULL, '2024-05-30 06:16:19', '2024-05-30 06:16:19', 0),
(100, 61, 5, 1, 0, NULL, '2024-05-30 06:16:20', '2024-05-30 06:16:20', 2),
(101, 61, 6, 1, 0, NULL, '2024-05-30 06:16:26', '2024-05-30 06:16:26', 0),
(102, 61, 6, 1, 0, NULL, '2024-05-30 06:16:27', '2024-05-30 06:16:27', 2),
(103, 61, 27, 1, 0, NULL, '2024-05-30 06:16:55', '2024-05-30 06:16:55', 0),
(104, 61, 27, 1, 0, NULL, '2024-05-30 06:16:56', '2024-05-30 06:16:56', 2),
(105, 65, 1, 1, 1, NULL, '2024-07-24 04:44:27', '2024-07-24 04:44:27', 0),
(106, 65, 1, 1, 1, NULL, '2024-07-24 04:44:28', '2024-07-24 04:44:28', 2),
(107, 66, 1, 1, 1, NULL, '2024-07-24 04:48:45', '2024-07-24 04:48:45', 0),
(108, 66, 1, 1, 1, NULL, '2024-07-24 04:48:45', '2024-07-24 04:48:45', 2),
(109, 67, 1, 1, 0, NULL, '2024-07-24 06:57:56', '2024-07-24 07:09:23', 0),
(110, 67, 1, 1, 0, NULL, '2024-07-24 06:57:57', '2024-07-24 07:09:24', 2),
(111, 67, 2, 1, 0, NULL, '2024-07-24 07:24:38', '2024-07-24 07:24:38', 1),
(112, 68, 1, 1, 0, '- kerusakan as bearing pada car TeC, estimasi perbaikan 30 juli 2024\n- kebocoran oli pada MC, estimasi perbaikan hari ini 29 juli 2024', '2024-07-29 04:02:09', '2024-07-29 04:48:17', 0),
(113, 68, 1, 1, 0, NULL, '2024-07-29 04:02:10', '2024-07-29 04:02:10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` bigint UNSIGNED NOT NULL,
  `id_detail` int NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `id_detail`, `foto`, `created_at`, `updated_at`) VALUES
(12, 6, '1696839212.jpeg', '2023-10-09 08:13:32', '2023-10-09 08:13:32'),
(13, 7, '1696839817.jpeg', '2023-10-09 08:23:37', '2023-10-09 08:23:37'),
(14, 6, '1696840300.jpeg', '2023-10-09 08:31:40', '2023-10-09 08:31:40'),
(17, 12, '1696908168.jpeg', '2023-10-10 03:22:48', '2023-10-10 03:22:48'),
(18, 12, '1696908409.jpeg', '2023-10-10 03:26:49', '2023-10-10 03:26:49'),
(19, 16, '1697015099.jpeg', '2023-10-11 09:04:59', '2023-10-11 09:04:59'),
(20, 17, '1697076466.jpeg', '2023-10-12 02:07:46', '2023-10-12 02:07:46'),
(21, 18, '1697080350.jpeg', '2023-10-12 03:12:30', '2023-10-12 03:12:30'),
(22, 19, '1697160025.jpeg', '2023-10-13 01:20:25', '2023-10-13 01:20:25'),
(23, 19, '1697160080.jpeg', '2023-10-13 01:21:20', '2023-10-13 01:21:20'),
(24, 20, '1697166987.jpeg', '2023-10-13 03:16:27', '2023-10-13 03:16:27'),
(25, 22, '1697677702.jpeg', '2023-10-19 01:08:22', '2023-10-19 01:08:22'),
(26, 22, '1697677718.jpeg', '2023-10-19 01:08:38', '2023-10-19 01:08:38'),
(27, 22, '1697677911.jpeg', '2023-10-19 01:11:51', '2023-10-19 01:11:51'),
(28, 23, '1701144145.jpeg', '2023-11-28 04:02:25', '2023-11-28 04:02:25'),
(29, 23, '1701144200.jpeg', '2023-11-28 04:03:20', '2023-11-28 04:03:20'),
(30, 24, '1701144457.jpeg', '2023-11-28 04:07:37', '2023-11-28 04:07:37'),
(31, 25, '1701273524.jpeg', '2023-11-29 15:58:45', '2023-11-29 15:58:45'),
(32, 26, '1702863708.jpeg', '2023-12-18 01:41:48', '2023-12-18 01:41:48'),
(33, 26, '1702863724.jpeg', '2023-12-18 01:42:04', '2023-12-18 01:42:04'),
(34, 28, '1711343463.jpeg', '2024-03-25 05:11:03', '2024-03-25 05:11:03'),
(35, 29, '1711343628.jpeg', '2024-03-25 05:13:48', '2024-03-25 05:13:48'),
(36, 30, '1711343641.jpeg', '2024-03-25 05:14:01', '2024-03-25 05:14:01'),
(37, 31, '1711343717.jpeg', '2024-03-25 05:15:17', '2024-03-25 05:15:17'),
(38, 32, '1711343730.jpeg', '2024-03-25 05:15:30', '2024-03-25 05:15:30'),
(41, 28, '1711345442.jpeg', '2024-03-25 05:44:02', '2024-03-25 05:44:02'),
(42, 28, '1711379586.jpeg', '2024-03-25 15:13:06', '2024-03-25 15:13:06'),
(43, 28, '1711379797.jpeg', '2024-03-25 15:16:37', '2024-03-25 15:16:37'),
(44, 33, '1711979549.jpeg', '2024-04-01 13:52:29', '2024-04-01 13:52:29'),
(45, 33, '1711979568.jpeg', '2024-04-01 13:52:48', '2024-04-01 13:52:48'),
(46, 33, '1711979586.jpeg', '2024-04-01 13:53:06', '2024-04-01 13:53:06'),
(84, 44, '1713856295_mark.jpeg', '2024-04-23 07:11:36', '2024-04-23 07:11:36'),
(85, 44, '1713856851_mark.jpeg', '2024-04-23 07:20:51', '2024-04-23 07:20:51'),
(86, 44, '1713857077_mark.jpeg', '2024-04-23 07:24:38', '2024-04-23 07:24:38'),
(89, 46, '1713860085_mark.jpeg', '2024-04-23 08:14:45', '2024-04-23 08:14:45'),
(90, 46, '1713860365_mark.jpeg', '2024-04-23 08:19:25', '2024-04-23 08:19:25'),
(95, 46, '1713863812_mark.jpeg', '2024-04-23 09:16:53', '2024-04-23 09:16:53'),
(120, 76, '1716903402_mark.jpeg', '2024-05-28 13:36:42', '2024-05-28 13:36:42'),
(121, 76, '1716903431_mark.jpeg', '2024-05-28 13:37:11', '2024-05-28 13:37:11'),
(122, 78, '1716903519_mark.jpeg', '2024-05-28 13:38:39', '2024-05-28 13:38:39'),
(123, 78, '1716903530_mark.jpeg', '2024-05-28 13:38:50', '2024-05-28 13:38:50'),
(124, 80, '1716903543_mark.jpeg', '2024-05-28 13:39:03', '2024-05-28 13:39:03'),
(125, 83, '1716909199_mark.jpeg', '2024-05-28 15:13:19', '2024-05-28 15:13:19'),
(126, 84, '1716912893_mark.jpeg', '2024-05-28 16:14:53', '2024-05-28 16:14:53'),
(127, 87, '1716971576_mark.jpeg', '2024-05-29 08:32:56', '2024-05-29 08:32:56'),
(128, 88, '1716971589_mark.jpeg', '2024-05-29 08:33:09', '2024-05-29 08:33:09'),
(129, 90, '1716971607_mark.jpeg', '2024-05-29 08:33:27', '2024-05-29 08:33:27'),
(130, 105, '1721796277_mark.jpeg', '2024-07-24 04:44:37', '2024-07-24 04:44:37'),
(131, 109, '1721804295_mark.jpeg', '2024-07-24 06:58:16', '2024-07-24 06:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `item_checksheet`
--

CREATE TABLE `item_checksheet` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kereta` int NOT NULL,
  `id_kategori_checksheet` int NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `standar` text COLLATE utf8mb4_unicode_ci,
  `harian` int DEFAULT NULL,
  `p1` int DEFAULT NULL,
  `p3` int DEFAULT NULL,
  `p6` int DEFAULT NULL,
  `p12` int DEFAULT NULL,
  `car_index` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_checksheet`
--

INSERT INTO `item_checksheet` (`id`, `id_kereta`, `id_kategori_checksheet`, `nama_item`, `created_at`, `updated_at`, `standar`, `harian`, `p1`, `p3`, `p6`, `p12`, `car_index`) VALUES
(1, 1, 1, 'pemeriksaan axle bearing (16 buah)', '2023-08-21 06:00:11', '2024-05-23 11:13:48', 'tidak rembes, tidak bocor, bersih', 1, 1, 1, 1, 1, '[\"0\",\"2\"]'),
(2, 1, 1, 'pemeriksaan suspsensi primer (8 buah) spasi edit', '2023-08-21 06:02:41', '2024-05-24 08:43:26', 'tidak renmbes, tidak bocor', 1, 1, NULL, NULL, NULL, '[\"1\"]'),
(3, 1, 1, 'Pemeriksaan suspsensi sekunder', '2023-08-21 06:03:02', '2024-05-24 07:44:08', NULL, 1, 1, 1, 1, NULL, '[\"0\",\"1\",\"2\"]'),
(4, 1, 1, 'pemeriksaan air suplly', '2023-08-21 06:03:21', '2024-05-24 08:11:55', NULL, 1, 1, NULL, NULL, NULL, '[\"1\"]'),
(5, 1, 1, 'Pemeriksaan  Leveling Valve', '2023-08-21 06:04:01', '2024-05-24 10:39:11', NULL, 1, 1, NULL, NULL, NULL, '[\"0\",\"2\"]'),
(6, 1, 1, 'Pemeriksaan V-Belt (altenenator & Charging Batery)', '2023-08-21 06:04:37', '2024-05-24 10:39:21', NULL, 1, 1, NULL, NULL, NULL, '[\"0\",\"2\"]'),
(7, 1, 4, 'Pemeriksaan pulley alternator charging Baterry', '2023-08-21 06:05:10', '2023-08-22 11:44:49', NULL, 1, 1, NULL, NULL, NULL, NULL),
(8, 1, 1, 'Pemeriksaan level oli engine (pelumas mesin diesel)', '2023-08-22 11:46:13', '2024-05-31 12:02:13', NULL, 1, 1, NULL, NULL, NULL, '[\"0\",\"2\"]'),
(9, 1, 4, 'Pemeriksaan level air raadiator', '2023-08-22 11:46:59', '2023-08-22 11:46:59', NULL, 1, 1, NULL, NULL, NULL, NULL),
(10, 1, 4, 'pemeriksaan kebocoran oli pada engine', '2023-08-22 11:47:28', '2023-08-22 11:47:28', NULL, 1, 1, NULL, NULL, NULL, NULL),
(11, 1, 4, 'pemeriksaan pembuangan air filter HSD', '2023-08-22 11:47:59', '2023-08-22 11:47:59', NULL, 1, 1, NULL, NULL, NULL, NULL),
(12, 1, 4, 'Pemeriksaan saluran udara', '2023-08-22 11:48:23', '2023-08-22 11:48:23', NULL, 1, 1, NULL, NULL, NULL, NULL),
(13, 1, 4, 'Pemeriksaan ketidaknormalan suara engine', '2023-08-22 11:48:52', '2023-08-22 11:48:52', NULL, 1, 1, NULL, NULL, NULL, NULL),
(14, 1, 4, 'pemeriksaan visual rubber mounting engine', '2023-08-22 11:49:22', '2023-08-22 11:49:22', NULL, 1, 1, NULL, NULL, NULL, NULL),
(15, 1, 4, 'pemeriksaan visual rubber hose', '2023-08-22 11:49:47', '2023-08-22 11:49:47', NULL, 1, 1, NULL, NULL, NULL, NULL),
(16, 1, 4, 'pemeriksaan connector ECM', '2023-08-22 11:50:19', '2023-08-22 11:50:19', NULL, 1, 1, NULL, NULL, NULL, NULL),
(17, 1, 5, 'pemeriksaan suplai udara', '2023-08-23 02:14:24', '2023-08-23 02:14:24', NULL, 1, 1, NULL, NULL, NULL, NULL),
(18, 1, 1, 'contoh saja', '2023-10-04 01:04:20', '2023-10-04 01:04:20', NULL, 1, 1, NULL, NULL, NULL, NULL),
(20, 1, 7, 'contohh contohh aja', '2023-10-13 04:00:04', '2023-10-13 04:00:04', NULL, 1, 1, NULL, NULL, NULL, NULL),
(21, 1, 6, 'contoh contoh aa', '2023-10-13 04:02:39', '2023-10-13 04:02:39', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_checksheet`
--

CREATE TABLE `kategori_checksheet` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kereta` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_checksheet`
--

INSERT INTO `kategori_checksheet` (`id`, `id_kereta`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kelompok Bogie', '2023-08-21 05:08:59', '2024-04-23 08:34:03'),
(4, 1, 'Engine dan propulsi', '2023-08-21 05:30:59', '2023-08-21 05:30:59'),
(5, 1, 'Kelompok Pengereman dan Suplai Udara', '2023-08-22 11:22:20', '2023-08-22 11:22:20'),
(6, 1, 'Kleompok Alat Penggerak Mekanik', '2023-08-22 11:22:57', '2023-08-22 11:22:57'),
(7, 1, 'Kelompok Elektrikdan Pealatan Kereta', '2023-08-22 11:23:28', '2023-08-22 11:23:28'),
(8, 1, 'Kelompok Panel Listrik', '2023-08-22 11:23:49', '2023-08-22 11:23:49'),
(9, 1, 'Sistem Pendingin Udara', '2023-08-22 11:24:26', '2023-08-22 11:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sparepart`
--

CREATE TABLE `kategori_sparepart` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_sparepart`
--

INSERT INTO `kategori_sparepart` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Engine', '2023-08-21 05:02:35', '2023-08-21 05:02:35'),
(2, 'Consumable', '2023-08-22 00:14:52', '2023-08-22 00:14:52'),
(3, 'Kompresor', '2023-08-22 13:37:25', '2023-08-22 13:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `master_kereta`
--

CREATE TABLE `master_kereta` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kereta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kereta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_kereta`
--

INSERT INTO `master_kereta` (`id`, `username`, `password`, `nama_kereta`, `nomor_kereta`, `foto`, `created_at`, `updated_at`, `car`) VALUES
(1, 'solo', '$2y$10$sSas0kazFQFcjlylTQ1RbOoLnTBrIn.a/L7BWiwzWUwGKAJAN19Tu', 'Railbus Solo', '[\"K3 2 20 01-03\"]', '1692600875_poster donor.png', '2023-08-21 04:54:35', '2024-07-22 14:53:26', '[\"TeC\",\"T\",\"MC\"]'),
(7, NULL, '$2y$10$9n1jet/k6jt8G3M9eRZqB.t2Wu0kdtZcsCR1hpkbMPB/2QJrilUC.', 'railbus padang', '[\"K3 01 20 10 01-03\",\"K3 03 20 10 03-04\"]', NULL, '2024-04-23 08:24:53', '2024-05-07 01:56:58', NULL),
(11, NULL, '$2y$10$wsQjfffuMGxm4afnnzfo..rdiTOTB77OrDOnx/mwo4/euvkZaxfEu', 'krl solo', '[\"1234\",\"5673\",null,null]', NULL, '2024-05-06 11:58:13', '2024-05-07 01:17:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_08_18_071858_create_master_kereta_table', 1),
(19, '2023_08_18_072320_create_kategori_sparepart_table', 1),
(20, '2023_08_18_072351_create_sparepart_table', 1),
(21, '2023_08_18_072621_create_kategori_checksheet_table', 1),
(22, '2023_08_18_072704_create_sub_kategori_checksheet_table', 1),
(23, '2023_08_18_072739_create_checksheet_table', 1),
(24, '2023_08_18_073224_create_detail_checksheet_table', 1),
(25, '2023_08_18_073554_create_foto_table', 1),
(26, '2023_08_21_061615_item_checksheet', 1),
(27, '2024_05_13_135837_add_p_column_in_item_checksheet', 2),
(28, '2024_05_14_102511_add_approve_in_checksheet', 3),
(29, '2024_05_18_201201_add_car_in_kereta', 4),
(30, '2024_05_23_170323_add_car_index_column_in_item_checksheet', 5),
(31, '2024_05_23_170505_add_car_column_in_detail_checksheet', 6),
(32, '2024_05_28_155000_create_signature_table', 7),
(33, '2024_07_29_102427_est_tso_in_checksheet_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Kereta', 1, 'auth_token', '2a1e76ce519d4bd7063d2bb1b2c6da524b4fb4fd0dc46b1d1edce1d76dc45d0e', '[\"*\"]', NULL, NULL, '2023-08-21 05:24:15', '2023-08-21 05:24:15'),
(2, 'App\\Models\\Kereta', 1, 'auth_token', '0efd6dfc3180dfa35f7bd468487d6fbb5e0bd8d36278fa23b40c64497aff1c5a', '[\"*\"]', '2023-08-23 00:52:10', NULL, '2023-08-21 05:49:01', '2023-08-23 00:52:10'),
(3, 'App\\Models\\Kereta', 1, 'auth_token', 'd25554aa0114f74ebb6ac5a189b58b421ea46249fd54f61d12d351d22326a8a4', '[\"*\"]', NULL, NULL, '2023-08-21 06:44:25', '2023-08-21 06:44:25'),
(4, 'App\\Models\\Kereta', 1, 'auth_token', 'a89ab393b18fdc5e6fd6097154254dd76cce63ba4ad3068f95af04a8c38955fe', '[\"*\"]', NULL, NULL, '2023-08-21 13:02:49', '2023-08-21 13:02:49'),
(5, 'App\\Models\\Kereta', 1, 'auth_token', 'c2161c77a53de14af080ae9c7b8903a353f38249338afc19a61f30a661ddbee8', '[\"*\"]', NULL, NULL, '2023-08-21 23:34:09', '2023-08-21 23:34:09'),
(6, 'App\\Models\\Kereta', 1, 'auth_token', '0fcca82e165c4cb6377701ef352bc84862b28e70a91721ee20c12a9fb8ce6adf', '[\"*\"]', NULL, NULL, '2023-08-22 00:20:41', '2023-08-22 00:20:41'),
(7, 'App\\Models\\Kereta', 1, 'auth_token', 'fde5deb18e8650ec7402693b3f279a40b8321235e47f82c23f165ac15b1956b5', '[\"*\"]', NULL, NULL, '2023-08-22 00:22:37', '2023-08-22 00:22:37'),
(8, 'App\\Models\\Kereta', 1, 'auth_token', '2d51e45971dfca2031840599424fa8fea556d86e8f31dc940c879e356c6b38cf', '[\"*\"]', '2023-08-22 13:14:38', NULL, '2023-08-22 00:53:18', '2023-08-22 13:14:38'),
(9, 'App\\Models\\Kereta', 1, 'auth_token', '3886ac20462421880c62e80a46da4ec7c3e18b97877f08b0204628f0d672edcc', '[\"*\"]', '2023-10-11 01:27:35', NULL, '2023-08-22 01:08:55', '2023-10-11 01:27:35'),
(10, 'App\\Models\\Kereta', 1, 'auth_token', '850abc10993a5e981afd3f0b73fa6e180477fded754b961c1ddc76fdc522dbd3', '[\"*\"]', '2023-10-10 00:44:28', NULL, '2023-08-22 09:13:27', '2023-10-10 00:44:28'),
(11, 'App\\Models\\Kereta', 1, 'auth_token', 'e0206e57b9458d7dd331796dd9514d81fafb6915d8b0cf72d2c54214caf5a9ee', '[\"*\"]', '2023-08-22 13:15:26', NULL, '2023-08-22 09:15:33', '2023-08-22 13:15:26'),
(12, 'App\\Models\\Kereta', 1, 'auth_token', '08d3a9ef35ded1367f01089f81699f7fb41b96f24dbc4f9ebb05967c0f06610f', '[\"*\"]', '2023-12-30 08:17:21', NULL, '2023-08-22 13:16:03', '2023-12-30 08:17:21'),
(13, 'App\\Models\\Kereta', 1, 'auth_token', 'a005b18886ae8b3d3ed838c1fa91ed7c5bf7b9d097ae2a4d283869bf1e1ec5ec', '[\"*\"]', '2023-08-22 18:04:15', NULL, '2023-08-22 18:03:28', '2023-08-22 18:04:15'),
(14, 'App\\Models\\Kereta', 1, 'auth_token', 'db999d5f4e3b65399924c249108dfd6dc43933e09b0b98a5b652a8fcd4e5eb63', '[\"*\"]', '2023-09-14 05:36:40', NULL, '2023-09-14 05:31:08', '2023-09-14 05:36:40'),
(15, 'App\\Models\\Kereta', 1, 'auth_token', '22a761151694c7820296bdb307f022d5b6cf7b77c18b88dfd36df42d4959e18a', '[\"*\"]', '2023-10-10 02:29:33', NULL, '2023-10-09 03:52:08', '2023-10-10 02:29:33'),
(16, 'App\\Models\\Kereta', 1, 'auth_token', 'c503b5403bc5d267dde1c61d92e1cbe89b4616cb6caff543e9d8ab1f51e5cb4e', '[\"*\"]', '2023-10-11 09:05:01', NULL, '2023-10-11 09:01:03', '2023-10-11 09:05:01'),
(17, 'App\\Models\\Kereta', 1, 'auth_token', 'ea05257615b75cc147b21941eb81172c4ba58584569df4fb1fd4b1c7fae2c651', '[\"*\"]', '2023-10-13 06:55:37', NULL, '2023-10-12 02:03:55', '2023-10-13 06:55:37'),
(18, 'App\\Models\\Kereta', 1, 'auth_token', '782369361392902508b22cfedd32efb71dea48372608183f5912a02c381cb02e', '[\"*\"]', '2023-11-13 01:55:15', NULL, '2023-11-13 01:53:40', '2023-11-13 01:55:15'),
(19, 'App\\Models\\Kereta', 1, 'auth_token', '085c66b416fd9890b0cc45fa97dc8d2023f83c84f21154bbea72f36fc289f00d', '[\"*\"]', '2023-12-20 06:56:28', NULL, '2023-11-28 04:01:08', '2023-12-20 06:56:28'),
(20, 'App\\Models\\Kereta', 1, 'auth_token', 'd2ebb749e7dda4628791929f15f03ec23e13dffc00c77b82a1ef5771b26ab103', '[\"*\"]', NULL, NULL, '2023-12-08 16:09:19', '2023-12-08 16:09:19'),
(21, 'App\\Models\\Kereta', 1, 'auth_token', '0ec7b4fda320d540f4196d47ae49839074a46c99d5fdb582c81235d81025fa1e', '[\"*\"]', NULL, NULL, '2023-12-08 16:09:53', '2023-12-08 16:09:53'),
(22, 'App\\Models\\Kereta', 1, 'auth_token', '72b81b4cb3bb954f268965f291362e60af5e4e7906fefff44b9531c9ce8f044b', '[\"*\"]', NULL, NULL, '2023-12-08 16:11:32', '2023-12-08 16:11:32'),
(23, 'App\\Models\\Kereta', 1, 'auth_token', 'cd5169de8077ea3d1e766946b3d5fa3f1261b0bfc2158c7319c883ca2e79e3eb', '[\"*\"]', NULL, NULL, '2023-12-08 16:12:36', '2023-12-08 16:12:36'),
(24, 'App\\Models\\Kereta', 1, 'auth_token', '1ba8bdc05fb18816fb923fca452bde18ada9c86f0b73b7349e19fe8211fd8f21', '[\"*\"]', NULL, NULL, '2023-12-08 16:12:49', '2023-12-08 16:12:49'),
(25, 'App\\Models\\Kereta', 1, 'auth_token', '188e18345bf60fee57765d04b28ac67aaf6baa59ca0344ef74a2f938272047c8', '[\"*\"]', NULL, NULL, '2023-12-08 16:13:00', '2023-12-08 16:13:00'),
(26, 'App\\Models\\Kereta', 1, 'auth_token', 'cb5bf857fa82b5545538cc5ebb37eb12485447a7527b80da32b29cbc97712052', '[\"*\"]', NULL, NULL, '2023-12-08 16:13:01', '2023-12-08 16:13:01'),
(27, 'App\\Models\\Kereta', 1, 'auth_token', '63c1066f84bfb98fef0bbe1699b6633fc73739951e9948d5d71d377fa6bed282', '[\"*\"]', NULL, NULL, '2023-12-08 16:13:09', '2023-12-08 16:13:09'),
(28, 'App\\Models\\Kereta', 1, 'auth_token', '1eae46742a7f4466787c79fcac0cdf3c297db79806cc47ba9d0e16f870b4b5c9', '[\"*\"]', NULL, NULL, '2023-12-08 16:25:28', '2023-12-08 16:25:28'),
(29, 'App\\Models\\Kereta', 1, 'auth_token', 'ed521e46e5ea5e37ce58738f6eabb1fcd9a1cb7240fd16b47a56953e40eb67fb', '[\"*\"]', NULL, NULL, '2023-12-08 16:41:42', '2023-12-08 16:41:42'),
(30, 'App\\Models\\Kereta', 1, 'auth_token', '5a75464984b4f6eb22cd2259cfb222694bc452c605dbae18a35fe7c825ef23aa', '[\"*\"]', NULL, NULL, '2023-12-08 16:42:01', '2023-12-08 16:42:01'),
(31, 'App\\Models\\Kereta', 1, 'auth_token', '12e40e5212ddbfd484dadaa1e89924b0526bf5edb99a5e0e602363f0ce2f62b2', '[\"*\"]', NULL, NULL, '2023-12-08 16:42:24', '2023-12-08 16:42:24'),
(32, 'App\\Models\\Kereta', 1, 'auth_token', '60816915b49c6314ed0e78cc34d13aa2db70091dfd3901804c039e61c3242bab', '[\"*\"]', NULL, NULL, '2023-12-08 16:45:58', '2023-12-08 16:45:58'),
(33, 'App\\Models\\Kereta', 1, 'auth_token', '3fd30d1995c5190c3f731533f82aa6e6d2e08c23cf272b864f5a37a8b60c2e6f', '[\"*\"]', NULL, NULL, '2023-12-08 16:46:16', '2023-12-08 16:46:16'),
(34, 'App\\Models\\Kereta', 1, 'auth_token', '1a6d8eee8b825b4b28df21bafb7593a9ae94a9fe6951a8030614d23e38b81bce', '[\"*\"]', NULL, NULL, '2023-12-08 16:50:33', '2023-12-08 16:50:33'),
(35, 'App\\Models\\Kereta', 1, 'auth_token', 'f3c3505635d0731992569825630fd741f112a2a307ac69b16d5525d3e563c481', '[\"*\"]', NULL, NULL, '2023-12-08 16:52:56', '2023-12-08 16:52:56'),
(36, 'App\\Models\\Kereta', 1, 'auth_token', '87fdaa5d9797067e74c308fcca285a8c3b11b2884179939149709c2694da6504', '[\"*\"]', NULL, NULL, '2023-12-08 16:56:48', '2023-12-08 16:56:48'),
(37, 'App\\Models\\Kereta', 1, 'auth_token', 'bd9cd89e973c0cf3b30e1cd4137e005d34a4a7a69bc19ff53c2fd96b77d77767', '[\"*\"]', NULL, NULL, '2023-12-08 16:57:52', '2023-12-08 16:57:52'),
(38, 'App\\Models\\Kereta', 1, 'auth_token', 'b3d9b6201195d2add021c6651fdc860ff61f17affc3ec01e14266e8004020666', '[\"*\"]', '2023-12-20 07:34:17', NULL, '2023-12-18 01:40:16', '2023-12-20 07:34:17'),
(39, 'App\\Models\\Kereta', 1, 'auth_token', '1155e9d7e2f2219517c037e3848c974beaa2e3b2b2dcd3499fbc216717180cdc', '[\"*\"]', '2024-04-18 07:28:53', NULL, '2024-03-25 05:10:29', '2024-04-18 07:28:53'),
(40, 'App\\Models\\Kereta', 1, 'auth_token', 'e3354bd3775e440933e37bdf6ca23217e685adfb547fb46260b021902b1e9e85', '[\"*\"]', '2024-04-01 13:54:30', NULL, '2024-04-01 13:50:54', '2024-04-01 13:54:30'),
(41, 'App\\Models\\Kereta', 1, 'auth_token', '81d17b8158941c3725375ceb3e533e34b395d80aa79bfd47ade02477442f0a28', '[\"*\"]', NULL, NULL, '2024-04-01 15:23:05', '2024-04-01 15:23:05'),
(42, 'App\\Models\\Kereta', 1, 'auth_token', '522b51aea60aee4699b530b6d19dc49294c8f41ae364ce4f9fe6340dc603e66b', '[\"*\"]', NULL, NULL, '2024-04-01 15:23:05', '2024-04-01 15:23:05'),
(43, 'App\\Models\\Kereta', 1, 'auth_token', '2e711f7acf7ae96d701e9664312cb40f50e0409563aa895c964c2767b239a88e', '[\"*\"]', NULL, NULL, '2024-04-01 15:23:13', '2024-04-01 15:23:13'),
(44, 'App\\Models\\Kereta', 1, 'auth_token', '8af74714fdede46cebb833f5ef6ba41f5713904443a5ec4d53f2919854437824', '[\"*\"]', NULL, NULL, '2024-04-01 15:23:13', '2024-04-01 15:23:13'),
(45, 'App\\Models\\Kereta', 1, 'auth_token', '68b3be86fee4406e7c04364f5753ec8c86019cd1a7fe406d09a80834c8254b07', '[\"*\"]', NULL, NULL, '2024-04-01 15:25:56', '2024-04-01 15:25:56'),
(46, 'App\\Models\\Kereta', 1, 'auth_token', '8c78905a06b07a3e09041d5efd38166200aecef5c63fbc64b1da53480f0b4d68', '[\"*\"]', NULL, NULL, '2024-04-01 15:25:56', '2024-04-01 15:25:56'),
(47, 'App\\Models\\Kereta', 1, 'auth_token', '1ba885340eeeb9db3fe10678b424557b22359b044576050d51f658e56ef0b5c2', '[\"*\"]', NULL, NULL, '2024-04-01 15:25:59', '2024-04-01 15:25:59'),
(48, 'App\\Models\\Kereta', 1, 'auth_token', 'e462ff4e9daed5bd515db8aaf63f7f918658984dc1a20ac574f369915768c199', '[\"*\"]', NULL, NULL, '2024-04-01 15:25:59', '2024-04-01 15:25:59'),
(49, 'App\\Models\\Kereta', 1, 'auth_token', '590f0ae4815d0d9ec7f378a485521cc05d5c2ce87038d52da4f2accfc901ac27', '[\"*\"]', NULL, NULL, '2024-04-01 15:26:03', '2024-04-01 15:26:03'),
(50, 'App\\Models\\Kereta', 1, 'auth_token', '52843c06e1d46e4dcab3f55722a0625e9a840ee2d687dd41c70e6c0dbf0dfaf6', '[\"*\"]', NULL, NULL, '2024-04-01 15:26:03', '2024-04-01 15:26:03'),
(51, 'App\\Models\\Kereta', 1, 'auth_token', '13f498c5a8c12ead027a23a871548c55159e1d8417f7468faa8bd49947c7778b', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:24', '2024-04-01 15:28:24'),
(52, 'App\\Models\\Kereta', 1, 'auth_token', '5f1b252fc50def906b3cecd55927e57ec65d7ebe48daa0d8b2313445d0c3a0cc', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:24', '2024-04-01 15:28:24'),
(53, 'App\\Models\\Kereta', 1, 'auth_token', '1e76f99c81736de17681b78c39fee32219fb631525aef5e7cdd6b24cf0604a6b', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:28', '2024-04-01 15:28:28'),
(54, 'App\\Models\\Kereta', 1, 'auth_token', '4619facad5327109c3b6d8f66c72b46caf0501d672438e58f695cf90585de443', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:28', '2024-04-01 15:28:28'),
(55, 'App\\Models\\Kereta', 1, 'auth_token', '250b537e57e557fae1e7da4bb9529537482b3d8b351d655ae3cdb9756ec9d0b3', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:54', '2024-04-01 15:28:54'),
(56, 'App\\Models\\Kereta', 1, 'auth_token', '26194002fb166d721c59abdae2bb877158e4746b830b1c2ce620eb426318ccf8', '[\"*\"]', NULL, NULL, '2024-04-01 15:28:54', '2024-04-01 15:28:54'),
(57, 'App\\Models\\Kereta', 1, 'auth_token', 'af4da29186ae566787ee361cb64ffc7fc3f77198cba807ea813e34072e259f12', '[\"*\"]', NULL, NULL, '2024-04-01 15:32:56', '2024-04-01 15:32:56'),
(58, 'App\\Models\\Kereta', 1, 'auth_token', '6b2b9d4db709608a4d75a7706e0979ea514109e5c835dd9a8db1d90669831ccf', '[\"*\"]', NULL, NULL, '2024-04-01 15:32:56', '2024-04-01 15:32:56'),
(59, 'App\\Models\\Kereta', 1, 'auth_token', 'bf87d4bb5f62d2ae74afa1bfa513de1d4326d60fb240933fbca4cdb049c2302b', '[\"*\"]', NULL, NULL, '2024-04-01 15:33:26', '2024-04-01 15:33:26'),
(60, 'App\\Models\\Kereta', 1, 'auth_token', '733eaf1ccc9acf0a0d73efa29e09bce43f0876ec920417b1ce749a3cd1977d4c', '[\"*\"]', NULL, NULL, '2024-04-01 15:33:26', '2024-04-01 15:33:26'),
(61, 'App\\Models\\Kereta', 1, 'auth_token', 'a843dcd7b3d884f323c3d03c41d2ab2ad983049e299c14692283a2a2b1b02b39', '[\"*\"]', NULL, NULL, '2024-04-01 15:33:30', '2024-04-01 15:33:30'),
(62, 'App\\Models\\Kereta', 1, 'auth_token', '2b07c2b42701f82c73bde03b272fe18a580aab4a462e4fe1498e92a13cb12887', '[\"*\"]', '2024-04-01 15:33:37', NULL, '2024-04-01 15:33:30', '2024-04-01 15:33:37'),
(63, 'App\\Models\\Kereta', 1, 'auth_token', '9c17f75756fed7459f847611c55c61d18e7bf15785e7aaf99469261afd1648de', '[\"*\"]', NULL, NULL, '2024-04-01 15:37:45', '2024-04-01 15:37:45'),
(64, 'App\\Models\\Kereta', 1, 'auth_token', '64f050fe936832bd78c7bc07dfb16ac85ec0d94c3051cfc3de379df0ff8cf6e8', '[\"*\"]', '2024-04-01 15:59:01', NULL, '2024-04-01 15:37:45', '2024-04-01 15:59:01'),
(65, 'App\\Models\\Kereta', 1, 'auth_token', 'd5ee3a8ecf0d0d92c50efd182934bec6ae8e69bf2677a03e2ebab1a5b7dc47ad', '[\"*\"]', NULL, NULL, '2024-04-01 16:31:25', '2024-04-01 16:31:25'),
(66, 'App\\Models\\Kereta', 1, 'auth_token', '673e4aa4c3112756b2fd223ec8b451c11b0fc54ca4d7c01a092bb4c04e2e0ca4', '[\"*\"]', NULL, NULL, '2024-04-01 16:31:25', '2024-04-01 16:31:25'),
(67, 'App\\Models\\Kereta', 1, 'auth_token', '7604932e724064d2466305842abf1874336d559194241cac8bb0897c80ba714e', '[\"*\"]', NULL, NULL, '2024-04-01 16:33:43', '2024-04-01 16:33:43'),
(68, 'App\\Models\\Kereta', 1, 'auth_token', '8ec4686c6af2d5925a522cc37555dd94ced02407230bd8e3fa04b4607f249c2d', '[\"*\"]', NULL, NULL, '2024-04-01 16:33:43', '2024-04-01 16:33:43'),
(69, 'App\\Models\\Kereta', 1, 'auth_token', 'ab760af2dfaae22153b04ad41900ee4fd98a7ca9438c025450a6f098a475f60a', '[\"*\"]', NULL, NULL, '2024-04-01 16:40:18', '2024-04-01 16:40:18'),
(70, 'App\\Models\\Kereta', 1, 'auth_token', 'ec8dd9b1f3302edce269d9847a64c89282b5b2a05282f9df9a71303e8c1729d3', '[\"*\"]', NULL, NULL, '2024-04-01 16:40:18', '2024-04-01 16:40:18'),
(71, 'App\\Models\\Kereta', 1, 'auth_token', 'cc8d01c9c584c6acd47cefe87631954321b2c8b6fc253a9843e9f1fc52d0d84c', '[\"*\"]', NULL, NULL, '2024-04-01 16:41:32', '2024-04-01 16:41:32'),
(72, 'App\\Models\\Kereta', 1, 'auth_token', 'c42c0f7c732f77d4e69ff32abb5d692bf6aa522b16fa93f2ad674fda930355b1', '[\"*\"]', NULL, NULL, '2024-04-01 16:41:32', '2024-04-01 16:41:32'),
(73, 'App\\Models\\Kereta', 1, 'auth_token', 'ac6c75b5684d7ac3e37259adb455a8c739e87c8ffd023c96028f1e86757fdccd', '[\"*\"]', NULL, NULL, '2024-04-01 16:46:41', '2024-04-01 16:46:41'),
(74, 'App\\Models\\Kereta', 1, 'auth_token', 'ddc8d608c04fa699c81bedac799a6a43b62cbfb330ba34e73673c3526548572e', '[\"*\"]', '2024-04-01 16:57:33', NULL, '2024-04-01 16:46:41', '2024-04-01 16:57:33'),
(75, 'App\\Models\\Kereta', 1, 'auth_token', '8c0386773f0adaf41b4f1f6dd6d0c189427025e753111618fba0ea1bc26d0508', '[\"*\"]', NULL, NULL, '2024-04-01 16:59:27', '2024-04-01 16:59:27'),
(76, 'App\\Models\\Kereta', 1, 'auth_token', '04c183cf6f1c53284279488241b84692101be9b2cc93bc7d1cfae09417bd295e', '[\"*\"]', NULL, NULL, '2024-04-01 16:59:27', '2024-04-01 16:59:27'),
(77, 'App\\Models\\Kereta', 1, 'auth_token', '0cd2997f6d08cc83918045a8323c57ab9d39033198085d3fdc5262e1197ea606', '[\"*\"]', NULL, NULL, '2024-04-18 07:25:19', '2024-04-18 07:25:19'),
(78, 'App\\Models\\Kereta', 1, 'auth_token', '79cb8a33b4b537982aacc1743c0a0d49928bca2da0348e485875d22d4c04f06e', '[\"*\"]', NULL, NULL, '2024-04-18 07:26:40', '2024-04-18 07:26:40'),
(79, 'App\\Models\\Kereta', 1, 'auth_token', '9ebb7c1ae20e6750714006279628c4540487b1915f41b3c1a049680491313a6c', '[\"*\"]', '2024-04-18 07:42:26', NULL, '2024-04-18 07:37:50', '2024-04-18 07:42:26'),
(80, 'App\\Models\\Kereta', 1, 'auth_token', 'e3920be4b2f5ba3b5a09551087009d7186b72d4b7337919e14e07a34caff7e18', '[\"*\"]', '2024-04-18 07:41:05', NULL, '2024-04-18 07:39:05', '2024-04-18 07:41:05'),
(81, 'App\\Models\\User', 1, 'auth_token', '6733852ad228efcfad6da2b2a178cfda4d3afadc3c70fe60c53bac3dea9cfc9d', '[\"*\"]', NULL, NULL, '2024-04-19 11:21:23', '2024-04-19 11:21:23'),
(82, 'App\\Models\\User', 1, 'auth_token', 'eecb3fbeb19ffa050976904ea5656cdd7b18a54184f5f5b7223da85c6c7ac226', '[\"*\"]', '2024-04-19 11:26:25', NULL, '2024-04-19 11:25:53', '2024-04-19 11:26:25'),
(83, 'App\\Models\\User', 1, 'auth_token', 'cf0b7383cae5967b926c0f20adfa3a942c8ffc689f77641c1d1ebb3d66d61363', '[\"*\"]', '2024-04-19 11:28:38', NULL, '2024-04-19 11:27:03', '2024-04-19 11:28:38'),
(84, 'App\\Models\\User', 1, 'auth_token', '885d19c291c9a35574c277e01ecde58b1d473e507c0ad8d7af56fbc54f8ba12e', '[\"*\"]', NULL, NULL, '2024-04-19 11:31:17', '2024-04-19 11:31:17'),
(85, 'App\\Models\\User', 1, 'auth_token', '0e9af24f1952a6e1aec69794c3ac3b6379d66ff8c6939c41cec109fe8d6e0487', '[\"*\"]', NULL, NULL, '2024-04-19 11:31:17', '2024-04-19 11:31:17'),
(86, 'App\\Models\\User', 1, 'auth_token', '01d5efb7cc233dffd1c88eda030b0cbf1fe2b4866be423ccc99511dc660680e5', '[\"*\"]', NULL, NULL, '2024-04-19 11:31:28', '2024-04-19 11:31:28'),
(87, 'App\\Models\\User', 1, 'auth_token', '7fd089d65daf66c5faafbcb29bfb5c46957805a85cd2db275428bdd7179c5ad7', '[\"*\"]', '2024-04-21 05:07:27', NULL, '2024-04-19 11:31:28', '2024-04-21 05:07:27'),
(88, 'App\\Models\\User', 1, 'auth_token', '91d935e92a1d6ef3980f68618bf36377bb946cf0520d8802ee001305e3881950', '[\"*\"]', '2024-04-22 09:26:25', NULL, '2024-04-19 12:12:20', '2024-04-22 09:26:25'),
(89, 'App\\Models\\User', 1, 'auth_token', '8f7395b6f3039aa08f4c596365b7ac930427774fa24fc01e679e5f70845efabd', '[\"*\"]', '2024-06-01 11:36:39', NULL, '2024-04-19 12:13:16', '2024-06-01 11:36:39'),
(90, 'App\\Models\\User', 1, 'auth_token', 'c64038443b4792ecf284c4042255be65b2d37ca0bd8cba61f2ed4679a288b912', '[\"*\"]', '2024-04-23 08:21:13', NULL, '2024-04-19 12:13:40', '2024-04-23 08:21:13'),
(91, 'App\\Models\\User', 1, 'auth_token', 'aeb9e53a4e3f56f7962fc7488724e6d3140c43295ca969c05e35290e1ea2686d', '[\"*\"]', '2024-04-20 18:49:03', NULL, '2024-04-20 18:43:27', '2024-04-20 18:49:03'),
(92, 'App\\Models\\User', 1, 'auth_token', '85be400cc1cdab7533f149496aca18823556dfa1e7b31232210de46c0267ec4f', '[\"*\"]', NULL, NULL, '2024-04-21 05:09:10', '2024-04-21 05:09:10'),
(93, 'App\\Models\\User', 1, 'auth_token', '1968f40445df6537e5d787f705ca9a114c09c5b1a9071fad0119cf8373a6cd45', '[\"*\"]', '2024-04-23 00:04:08', NULL, '2024-04-21 05:09:41', '2024-04-23 00:04:08'),
(94, 'App\\Models\\User', 1, 'auth_token', '1928cb8e5ee62748c397ae0c18a87ca601cab47d4ce092231de22e6612e86a5a', '[\"*\"]', '2024-04-23 04:49:05', NULL, '2024-04-21 09:09:39', '2024-04-23 04:49:05'),
(95, 'App\\Models\\User', 1, 'auth_token', '55254dc7ee35d78ba07baafd328dcebca2aaf4f9c4fcc0cc5a09b9d1e016c4ba', '[\"*\"]', '2024-04-23 12:01:01', NULL, '2024-04-22 08:12:10', '2024-04-23 12:01:01'),
(96, 'App\\Models\\User', 1, 'auth_token', '1c97aa9ebd6a5c003ab0ea671cfae8fa407b689855465c8ca6c78a2648f70a59', '[\"*\"]', '2024-04-24 14:17:43', NULL, '2024-04-22 09:30:18', '2024-04-24 14:17:43'),
(97, 'App\\Models\\User', 1, 'auth_token', '1d69af5b2a75721d35d9b27a07626ac29bb974b3c55eecfb63c46ec9f7f6c48f', '[\"*\"]', '2024-04-23 03:22:17', NULL, '2024-04-23 00:08:37', '2024-04-23 03:22:17'),
(98, 'App\\Models\\User', 1, 'auth_token', '4d855ea3f29eda6a433d0d077663e2e82b2986d9d949eef618bd55ee6517e719', '[\"*\"]', '2024-04-23 11:56:47', NULL, '2024-04-23 03:46:02', '2024-04-23 11:56:47'),
(99, 'App\\Models\\User', 1, 'auth_token', '6cc0e46be75d7cbfcb784fca33cc7f0ac47fac6e12c455bef303d21ba018f910', '[\"*\"]', NULL, NULL, '2024-04-23 04:30:42', '2024-04-23 04:30:42'),
(100, 'App\\Models\\User', 1, 'auth_token', 'bbf1b1d413f209c943f3d272e42dc8ca310ef32cf9bcf6481a445c1ce8d872dc', '[\"*\"]', '2024-04-23 05:39:38', NULL, '2024-04-23 04:32:48', '2024-04-23 05:39:38'),
(101, 'App\\Models\\User', 1, 'auth_token', '72667dbd1b30b6b4850a39d546f2e1e8826cc56640b3a4c848ae52e2a291a9f5', '[\"*\"]', '2024-04-23 06:04:46', NULL, '2024-04-23 06:03:25', '2024-04-23 06:04:46'),
(102, 'App\\Models\\User', 1, 'auth_token', '5168fbb37f0ee005ab87edc65ff4352c29a25a4d397254be388350bcbc683860', '[\"*\"]', NULL, NULL, '2024-04-23 06:28:12', '2024-04-23 06:28:12'),
(103, 'App\\Models\\User', 1, 'auth_token', '7cfe2726636d6d82710a31e696f5e5bfa38bc2003aaae133e6d8d0fef9b068c1', '[\"*\"]', '2024-04-25 06:54:07', NULL, '2024-04-23 07:58:06', '2024-04-25 06:54:07'),
(104, 'App\\Models\\User', 1, 'auth_token', '583e3932a60cde549464dd396c398fbaae0a29b3846a59d3ca7115e64a99a424', '[\"*\"]', '2024-04-26 08:38:36', NULL, '2024-04-23 08:04:28', '2024-04-26 08:38:36'),
(105, 'App\\Models\\User', 3, 'auth_token', '1d7456887c76fda5e5c04a4c441bae008e5f3a638163bf823a442306bbf7bfb3', '[\"*\"]', '2024-04-23 12:02:54', NULL, '2024-04-23 11:57:03', '2024-04-23 12:02:54'),
(106, 'App\\Models\\User', 1, 'auth_token', '3b265d0a359ae0277076825628f3662b6d92c7098273bdb9dabbd005eea5d75d', '[\"*\"]', '2024-05-07 02:21:32', NULL, '2024-04-23 12:04:57', '2024-05-07 02:21:32'),
(107, 'App\\Models\\User', 1, 'auth_token', '7b9331122c7c23b77a0a2142b384b4bda9b802648ffa08fbec7889b5c3396b0a', '[\"*\"]', '2024-04-24 01:06:51', NULL, '2024-04-24 01:05:51', '2024-04-24 01:06:51'),
(108, 'App\\Models\\User', 1, 'auth_token', 'd7bc44a72362a32b3fa80b007b7b68f0d3b3ba8ec69072c4aa8c3fdd92bf2637', '[\"*\"]', '2024-05-04 15:36:15', NULL, '2024-05-04 15:13:03', '2024-05-04 15:36:15'),
(109, 'App\\Models\\User', 1, 'auth_token', 'f26d4ae52efaa1df50cbd7188d04b9ba4d96fecd57bf39d90a7c4401dee2641f', '[\"*\"]', '2024-06-26 03:14:58', NULL, '2024-05-04 15:18:20', '2024-06-26 03:14:58'),
(110, 'App\\Models\\User', 1, 'auth_token', '9249aeef61446fc0a1941a4168d69f1e08befeaa54ef05fe18957f7608ba8eb2', '[\"*\"]', '2024-05-17 13:58:17', NULL, '2024-05-06 12:41:09', '2024-05-17 13:58:17'),
(111, 'App\\Models\\User', 7, 'auth_token', '849fb04a2e6d2ab2e3211035f884dec92f8cdd7b40a6e66337e0d324e1df0ddf', '[\"*\"]', '2024-05-13 09:05:30', NULL, '2024-05-07 02:25:02', '2024-05-13 09:05:30'),
(112, 'App\\Models\\User', 7, 'auth_token', '647f7b6c0a30ef428eb746e7f9c64fb4424588dae5f2868a51d31f6e939eac01', '[\"*\"]', '2024-05-07 09:58:21', NULL, '2024-05-07 08:45:45', '2024-05-07 09:58:21'),
(113, 'App\\Models\\User', 7, 'auth_token', 'abbc6481ad2d3bafa94613766ef42df8a4526d00b57a430c8b3f5b21019c175a', '[\"*\"]', NULL, NULL, '2024-05-07 09:32:59', '2024-05-07 09:32:59'),
(114, 'App\\Models\\User', 7, 'auth_token', 'd12a57d7bf789b90f88eda6c4e0836d6ecb6fa09702f12c1daf1d3af2ebdcb62', '[\"*\"]', '2024-05-07 09:37:59', NULL, '2024-05-07 09:33:54', '2024-05-07 09:37:59'),
(115, 'App\\Models\\User', 7, 'auth_token', 'e501fd30ef8eec30eb45a35f9a8eaa38c79d15172ad0ed4c4034cacc502c2ecf', '[\"*\"]', '2024-05-14 06:06:09', NULL, '2024-05-07 09:50:58', '2024-05-14 06:06:09'),
(116, 'App\\Models\\User', 7, 'auth_token', 'e208a0861ab5818aba23da0d915f7dde4044d8c75ec670f20da22ab1c4d3d84b', '[\"*\"]', '2024-05-13 09:11:34', NULL, '2024-05-13 09:09:27', '2024-05-13 09:11:34'),
(117, 'App\\Models\\User', 12, 'auth_token', '0fa5d835528aa4a82df694d17aa53e2f33041ced5aebdda64e927935441b53f0', '[\"*\"]', '2024-05-13 09:16:22', NULL, '2024-05-13 09:11:40', '2024-05-13 09:16:22'),
(118, 'App\\Models\\User', 7, 'auth_token', '6ec22a57411d8868b694a9f2241e969a88a9095c1ceda869a8784d00413f06d1', '[\"*\"]', '2024-05-13 10:54:05', NULL, '2024-05-13 09:16:39', '2024-05-13 10:54:05'),
(119, 'App\\Models\\User', 12, 'auth_token', '4c17d077766fed729d025cca31a2bac3cae816e4b80bd8d580802479c4108c64', '[\"*\"]', '2024-05-27 14:06:09', NULL, '2024-05-13 10:54:20', '2024-05-27 14:06:09'),
(120, 'App\\Models\\User', 12, 'auth_token', 'f3d2368f07d3a447098f9f3b14aa1305d562e77ade19b64dc20eecc1c29c8e67', '[\"*\"]', '2024-05-14 06:06:51', NULL, '2024-05-14 06:06:20', '2024-05-14 06:06:51'),
(121, 'App\\Models\\User', 7, 'auth_token', '5aeb8badbcc0bbab8f2deff8244e27184c2b82f59358fa28b05565c1da7ebad6', '[\"*\"]', '2024-05-14 14:31:32', NULL, '2024-05-14 06:07:00', '2024-05-14 14:31:32'),
(122, 'App\\Models\\User', 15, 'auth_token', 'e6ec98d4522ede9b3bada67fd19662ffa5ab5f4ee0451109fe0fd5a317011c13', '[\"*\"]', '2024-05-17 14:00:03', NULL, '2024-05-17 13:59:55', '2024-05-17 14:00:03'),
(123, 'App\\Models\\User', 7, 'auth_token', '81f53d986baa8b87fe335e1882568d6b2eaae42cad282aa2ee4fe34aee7d172a', '[\"*\"]', '2024-05-17 14:22:49', NULL, '2024-05-17 14:21:23', '2024-05-17 14:22:49'),
(124, 'App\\Models\\User', 7, 'auth_token', '9817f9111cd5853fec7073dddc24612272ef8fe86bc79001853f45928d2da82c', '[\"*\"]', NULL, NULL, '2024-05-22 07:43:42', '2024-05-22 07:43:42'),
(125, 'App\\Models\\User', 12, 'auth_token', '23bac346caef270a589d56dc04ce04dfb84c22d8c48f5f758633ed45c6204cbb', '[\"*\"]', '2024-06-01 16:03:57', NULL, '2024-05-27 14:11:11', '2024-06-01 16:03:57'),
(126, 'App\\Models\\User', 12, 'auth_token', '6665c609d23abe23a691f570673040c01afb5b6b62fd0d6073cbe8f384b50a3f', '[\"*\"]', '2024-05-30 11:11:34', NULL, '2024-05-30 11:11:02', '2024-05-30 11:11:34'),
(127, 'App\\Models\\User', 12, 'auth_token', 'af9b9cdfa6e2fba45ad109715adc209caf66c17ca9383a77e6fab12dbb985e36', '[\"*\"]', '2024-05-31 12:13:38', NULL, '2024-05-31 12:02:55', '2024-05-31 12:13:38'),
(128, 'App\\Models\\User', 12, 'auth_token', '90c2daf5d27f3f2d93a4c7d98e738c3cbdbe3738c5b1436bd1978cc73c692ebf', '[\"*\"]', '2024-06-23 15:05:51', NULL, '2024-06-01 11:37:10', '2024-06-23 15:05:51'),
(129, 'App\\Models\\User', 12, 'auth_token', '8650cd98528df08a119c3f3e8a2faf78743c378e1f238fce0173ec2fa3be92ff', '[\"*\"]', NULL, NULL, '2024-06-04 06:31:39', '2024-06-04 06:31:39'),
(130, 'App\\Models\\User', 12, 'auth_token', 'fb71d7ad57fbe3b88dbd0bd2c89c78d0941d1128017f1598fc414b1d49b7f75a', '[\"*\"]', '2024-06-06 03:58:39', NULL, '2024-06-06 03:57:23', '2024-06-06 03:58:39'),
(131, 'App\\Models\\User', 12, 'auth_token', 'fbff36fa034bc8ec33bac6a144569a6dba02abe3b4e33b3923b3d1af47c55c82', '[\"*\"]', '2024-06-07 03:05:32', NULL, '2024-06-07 02:06:26', '2024-06-07 03:05:32'),
(132, 'App\\Models\\User', 12, 'auth_token', '67cc62ae2be5f074bc0ae11e2d9d96b925ba3010358d0f0216374b4771a63050', '[\"*\"]', '2024-06-10 08:05:15', NULL, '2024-06-10 07:58:42', '2024-06-10 08:05:15'),
(133, 'App\\Models\\User', 12, 'auth_token', '24a7e3bb0d32a38f4f2b12d08ad7c6004b98a10bea65dc500c8533f0372ff8f4', '[\"*\"]', '2024-06-11 02:36:44', NULL, '2024-06-11 02:36:27', '2024-06-11 02:36:44'),
(134, 'App\\Models\\User', 12, 'auth_token', '9988ee8279416f402114185b09a2edb84d521cfd5d7cf21ba1c490fa44fac50b', '[\"*\"]', '2024-06-11 02:41:54', NULL, '2024-06-11 02:40:24', '2024-06-11 02:41:54'),
(135, 'App\\Models\\User', 12, 'auth_token', '4e6b2b16918e608ca966847a7cc2171c93d23f92e3018e1eb7475376a7385431', '[\"*\"]', '2024-06-11 02:42:46', NULL, '2024-06-11 02:42:34', '2024-06-11 02:42:46'),
(136, 'App\\Models\\User', 12, 'auth_token', '8d6523e3d4b439dfac63ce33527b46b94e989a15518121608716cfab299b55d6', '[\"*\"]', NULL, NULL, '2024-06-22 01:28:52', '2024-06-22 01:28:52'),
(137, 'App\\Models\\User', 7, 'auth_token', 'cffe003713ab480b09c0ae664944070e8e0817727be2d4438e479c2ae62745ed', '[\"*\"]', '2024-08-09 02:51:35', NULL, '2024-07-22 10:48:34', '2024-08-09 02:51:35'),
(138, 'App\\Models\\User', 12, 'auth_token', 'ad1e114ee7716a1fc192c47f9cb5ef71855054156aa7341b93e29aaf21207a87', '[\"*\"]', NULL, NULL, '2024-07-24 06:50:50', '2024-07-24 06:50:50'),
(139, 'App\\Models\\User', 12, 'auth_token', '0b3fc7cf140c329d28f8851ed87b52bd8588f8c2380e2a51555ef2ded866fefe', '[\"*\"]', NULL, NULL, '2024-07-28 04:36:24', '2024-07-28 04:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id` bigint UNSIGNED NOT NULL,
  `identity` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_checksheet` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `identity`, `id_user`, `id_checksheet`, `created_at`, `updated_at`) VALUES
(1, '89cd79d2-029a-45f0-aae6-05f00f58986a', 12, 58, '2024-05-28 09:04:17', '2024-05-28 09:04:17'),
(2, '598d5cae-2647-4f7b-b370-9d7396c78e02', 11, 58, '2024-05-28 10:18:19', '2024-05-28 10:18:19'),
(3, '08981a8b-7605-4ad1-921e-bd685e77c061', 13, 58, '2024-05-28 10:24:04', '2024-05-28 10:24:04'),
(4, 'eeea2cbb-8a96-4c32-a12c-4ca4b1ba5077', 12, 59, '2024-05-28 13:38:13', '2024-05-28 13:38:13'),
(5, 'da1d6d23-6d1e-4ee3-87fb-efbf4c4dcffd', 12, 60, '2024-05-29 08:32:17', '2024-05-29 08:32:17'),
(6, '0331388c-2776-4b37-9379-2bbe76962c8d', 12, 61, '2024-05-30 06:15:42', '2024-05-30 06:15:42'),
(7, '49c8186e-b94d-455c-aabc-d9a98b35a604', 12, 62, '2024-05-31 12:12:18', '2024-05-31 12:12:18'),
(8, 'b8f0388b-704f-4e6a-8663-e67f9072b043', 1, 63, '2024-06-01 03:34:42', '2024-06-01 03:34:42'),
(9, '990a08a3-df86-4244-9985-e2649a91737b', 1, 64, '2024-06-01 04:12:20', '2024-06-01 04:12:20'),
(10, '37616aa7-b4fb-4018-b54e-7852c838cb65', 11, 62, '2024-07-22 10:49:54', '2024-07-22 10:49:54'),
(11, '35cf3e16-4079-4d13-9eef-2368b565e817', 11, 61, '2024-07-22 10:49:55', '2024-07-22 10:49:55'),
(12, 'feba7a5e-da4f-4227-b81b-d3927a0027cb', 13, 62, '2024-07-22 10:50:07', '2024-07-22 10:50:07'),
(13, '33841513-2998-44e0-bc73-d18ca3cefd02', 13, 61, '2024-07-22 10:50:08', '2024-07-22 10:50:08'),
(14, 'c518f72f-02f9-4562-b820-5c0a501ef9ef', 7, 65, '2024-07-24 04:44:24', '2024-07-24 04:44:24'),
(15, '0baa5329-0ed9-4c85-96ea-440e9b3b85d3', 7, 66, '2024-07-24 04:48:42', '2024-07-24 04:48:42'),
(16, '4261109f-ef06-4621-ad02-f2b032f03279', 7, 67, '2024-07-24 06:57:33', '2024-07-24 06:57:33'),
(17, 'fd7ab71b-fa3f-48f3-bda4-8bef9ef8ac36', 7, 68, '2024-07-29 04:02:06', '2024-07-29 04:02:06'),
(18, '4a01896f-b792-487f-b143-86a2ac9d485f', 11, 68, '2024-07-29 04:26:23', '2024-07-29 04:26:23'),
(19, '0806996d-ef35-4f5b-807b-7e49c2d85c2a', 13, 68, '2024-07-29 04:26:32', '2024-07-29 04:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kategori_sparepart` int NOT NULL,
  `nama_sparepart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `id_kategori_sparepart`, `nama_sparepart`, `jumlah`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'mesin jet', 12, 'buah', '2023-08-22 00:57:15', '2023-08-22 00:57:15'),
(2, 2, 'oli', 12, 'liter', '2023-08-22 01:20:28', '2023-08-22 01:20:28'),
(6, 6, 'hanya contoh', 2, 'pcs', '2023-10-05 06:44:06', '2023-10-05 06:44:06'),
(10, 3, 'kompresor sedeng', 2, 'pcs', '2023-10-06 07:17:28', '2023-10-06 07:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori_checksheet`
--

CREATE TABLE `sub_kategori_checksheet` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_checksheet` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kereta` int NOT NULL,
  `nip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_kereta`, `nip`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '111', 'Setiawanto', 'setiawanto@gmail.com', 0, NULL, '$2y$10$55he.E1cWev9OSblltk5V.xH2X0MOJLwwfw5ybT./mFq5xOGennFC', NULL, NULL, '2024-05-30 05:33:00'),
(5, 1, '1234', 'ayis', 'ayis@gmail.com', 0, NULL, '$2y$10$hfwtnmO0NLW2hjaqo4H9L.8dJOv5Kfi9Ev7Tb4tCv0jHYbpChsCXu', NULL, '2024-05-06 11:50:03', '2024-05-06 11:50:03'),
(7, 1, '12345', 'herli purnomo putro', 'herli@gmail.com', 3, NULL, '$2y$10$kuc3Cz70AWDp/rBMz0sA8eLnBTtfDQjJNevwrxIa1gJItSsGWT.3K', NULL, '2024-05-07 01:36:08', '2024-05-07 08:14:10'),
(8, 0, '123456', 'janu', 'janu@gmail.com', 1, NULL, '$2y$10$fQJ4z3xMZRtFDC8n.2uLi.Hw5D.lFLwmlMFwtySVk.Pnw06qo7Exu', NULL, '2024-05-07 01:38:32', '2024-05-07 02:03:04'),
(9, 0, '11', 'yanu', 'asdasd@gmail.com', 1, NULL, '$2y$10$w8pCCC48HNmCZRQOMV3DWeKgOdvqrRQiijRrI/0jgsnpAMmb06Jp.', NULL, '2024-05-07 02:03:30', '2024-05-07 02:05:03'),
(11, 1, '999', 'yanuar', 'yanu@gmail.com', 1, NULL, '$2y$10$57Y3gcMp2lykLIOaBNAM9u9aPwxUZKJkMswOZ10NcTXtRdnemLLpe', NULL, '2024-05-07 08:16:56', '2024-05-07 08:16:56'),
(12, 1, '909', 'Budi', 'budi@gmail.com', 3, NULL, '$2y$10$BYlrFo7Fqir3vWjMc72TMOLQi2XGPunii8XWKmc42QLL/C5T0LFD2', NULL, '2024-05-13 09:11:12', '2024-05-13 09:11:12'),
(13, 1, '88', 'Yoga', 'yoga@gmail.com', 2, NULL, '$2y$10$Ea0svtsHTMSIO1RN58iypeauKsP627TJ1ZZWfzYTQ45LUcFqAFu1m', NULL, '2024-05-14 03:41:24', '2024-05-14 03:41:24'),
(15, 7, '5555', 'Juki', 'juki@gmail.com', 3, NULL, '$2y$10$jT3S/mOekCjgw0YfpkQdoug03Iksx/Ja4eMyxu3I7hH7up7IzQC.q', NULL, '2024-05-17 13:57:48', '2024-06-26 03:17:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checksheet`
--
ALTER TABLE `checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_checksheet`
--
ALTER TABLE `detail_checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_checksheet`
--
ALTER TABLE `item_checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_checksheet`
--
ALTER TABLE `kategori_checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_sparepart`
--
ALTER TABLE `kategori_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kereta`
--
ALTER TABLE `master_kereta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori_checksheet`
--
ALTER TABLE `sub_kategori_checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checksheet`
--
ALTER TABLE `checksheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `detail_checksheet`
--
ALTER TABLE `detail_checksheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `item_checksheet`
--
ALTER TABLE `item_checksheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_checksheet`
--
ALTER TABLE `kategori_checksheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori_sparepart`
--
ALTER TABLE `kategori_sparepart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_kereta`
--
ALTER TABLE `master_kereta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_kategori_checksheet`
--
ALTER TABLE `sub_kategori_checksheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
