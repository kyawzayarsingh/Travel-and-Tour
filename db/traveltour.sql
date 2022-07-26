-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 09:38 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `au_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `guest_no` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `booking_remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `create_user_id` int(11) DEFAULT 0,
  `updated_user_id` int(11) DEFAULT NULL,
  `deleted_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `package_id`, `guest_no`, `booking_date`, `totalprice`, `booking_remark`, `status`, `create_user_id`, `updated_user_id`, `deleted_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 26, 6, '2019-04-29', 195000, 'Dada', 3, 3, NULL, NULL, '2020-08-19 20:02:39', '2020-08-20 03:17:35', NULL),
(2, 6, 5, '2019-09-12', 677500, 'Cool', 3, 3, NULL, NULL, '2020-08-19 20:03:28', '2020-08-19 20:07:43', NULL),
(3, 20, 10, '2019-10-09', 507800, 'awesome beach', 3, 3, NULL, NULL, '2020-08-19 20:04:18', '2020-08-19 20:07:52', NULL),
(4, 1, 2, '2019-05-24', 75832, 'dandan', 3, 3, NULL, NULL, '2020-08-19 20:05:20', '2020-08-19 20:08:00', NULL),
(5, 10, 20, '2019-05-04', 527900, 'hilda', 3, 2, NULL, NULL, '2020-08-19 20:12:19', '2020-08-19 20:24:40', NULL),
(6, 16, 30, '2019-10-23', 1108920, 'cold but awesome', 3, 2, NULL, NULL, '2020-08-19 20:13:06', '2020-08-19 20:24:49', NULL),
(7, 13, 25, '2019-12-03', 316725, 'balmond', 3, 2, NULL, NULL, '2020-08-19 20:13:56', '2020-08-19 20:24:58', NULL),
(8, 8, 20, '2019-05-01', 1160000, 'Tigreal', 3, 5, NULL, NULL, '2020-08-19 20:15:32', '2020-08-19 20:25:06', NULL),
(9, 22, 40, '2019-01-06', 984000, 'Tara', 3, 5, NULL, NULL, '2020-08-19 20:16:20', '2020-08-19 20:25:14', NULL),
(10, 26, 45, '2019-01-12', 1462500, 'Yarata', 3, 5, NULL, NULL, '2020-08-19 20:17:52', '2020-08-19 20:25:22', NULL),
(11, 14, 30, '2019-02-02', 1998330, 'Uranus', 3, 5, NULL, NULL, '2020-08-19 20:18:50', '2020-08-19 20:25:30', NULL),
(12, 6, 8, '2019-02-26', 1084000, 'Batch', 3, 5, NULL, NULL, '2020-08-19 20:19:43', '2020-08-19 20:25:38', NULL),
(13, 4, 40, '2019-02-25', 1056000, 'Urana', 3, 6, NULL, NULL, '2020-08-19 20:21:31', '2020-08-19 20:25:47', NULL),
(14, 21, 10, '2019-04-01', 1927000, 'Moskov', 3, 6, NULL, NULL, '2020-08-19 20:22:14', '2020-08-19 20:25:55', NULL),
(15, 8, 20, '2019-05-12', 1160000, 'Gara', 3, 6, NULL, NULL, '2020-08-19 20:23:22', '2020-08-19 20:26:03', NULL),
(16, 2, 50, '2019-03-17', 2474000, 'cara', 3, 4, NULL, NULL, '2020-08-19 20:30:00', '2020-08-19 20:34:50', NULL),
(17, 23, 30, '2019-04-14', 1806000, 'uara', 3, 4, NULL, NULL, '2020-08-19 20:30:48', '2020-08-19 20:34:59', NULL),
(18, 8, 10, '2019-01-20', 580000, 'Erara', 3, 4, NULL, NULL, '2020-08-19 20:31:46', '2020-08-19 20:35:07', NULL),
(19, 3, 10, '2019-04-02', 625610, 'Ready to visit', 3, 4, NULL, NULL, '2020-08-19 20:32:41', '2020-08-19 20:35:15', NULL),
(20, 10, 45, '2019-03-18', 1187775, 'Opara', 3, 4, NULL, NULL, '2020-08-19 20:33:30', '2020-08-19 20:35:24', NULL),
(21, 17, 20, '2019-04-10', 1173140, 'Weara', 3, 4, NULL, NULL, '2020-08-19 20:34:23', '2020-08-19 20:35:32', NULL),
(22, 1, 50, '2019-07-06', 1895800, 'Quera', 3, 2, NULL, NULL, '2020-08-19 20:38:16', '2020-08-19 20:44:55', NULL),
(23, 15, 20, '2019-06-20', 1723540, 'Viper', 3, 2, NULL, NULL, '2020-08-19 20:39:38', '2020-08-19 20:45:04', NULL),
(24, 20, 20, '2019-06-05', 1015600, 'Irrithel', 3, 6, NULL, NULL, '2020-08-19 20:41:41', '2020-08-19 20:45:12', NULL),
(25, 3, 40, '2019-06-24', 2502440, 'Kiara', 3, 6, NULL, NULL, '2020-08-19 20:42:20', '2020-08-19 20:45:20', NULL),
(26, 8, 35, '2019-09-15', 2030000, 'Niafera', 3, 6, NULL, NULL, '2020-08-19 20:43:33', '2020-08-19 20:45:28', NULL),
(27, 28, 60, '2019-06-15', 1578000, 'cool palace', 3, 6, NULL, NULL, '2020-08-19 20:44:28', '2020-08-19 20:45:37', NULL),
(28, 1, 40, '2019-09-08', 1516640, 'Piera', 3, 9, NULL, NULL, '2020-08-19 20:47:04', '2020-08-19 20:51:47', NULL),
(29, 16, 60, '2019-09-14', 2217840, 'Nain', 3, 4, NULL, NULL, '2020-08-19 20:48:03', '2020-08-19 20:51:55', NULL),
(30, 17, 80, '2019-11-10', 4692560, 'laraest', 3, 3, NULL, NULL, '2020-08-19 20:49:11', '2020-08-19 20:52:03', NULL),
(31, 17, 60, '2019-12-15', 3519420, 'Typto', 3, 10, NULL, NULL, '2020-08-19 20:51:19', '2020-08-19 20:52:12', NULL),
(32, 22, 10, '2019-01-07', 246000, 'Juraya', 3, 12, NULL, NULL, '2020-08-19 21:07:19', '2020-08-19 21:14:15', NULL),
(33, 4, 12, '2019-01-04', 316800, 'Miya Deta', 3, 12, NULL, NULL, '2020-08-19 21:08:25', '2020-08-19 21:14:25', NULL),
(34, 20, 4, '2019-06-01', 203120, 'Pereah', 3, 8, NULL, NULL, '2020-08-19 21:09:43', '2020-08-19 21:14:32', NULL),
(35, 27, 26, '2019-08-03', 1690000, 'Okara', 3, 8, NULL, NULL, '2020-08-19 21:11:21', '2020-08-19 21:14:40', NULL),
(36, 12, 7, '2019-06-04', 660534, 'happy trip', 3, 14, NULL, NULL, '2020-08-19 21:13:07', '2020-08-19 21:14:49', NULL),
(37, 15, 9, '2019-06-18', 775593, 'Odette', 3, 13, NULL, NULL, '2020-08-19 21:24:07', '2020-08-19 21:30:24', NULL),
(38, 26, 21, '2019-06-30', 682500, 'Yee Suu Shinn', 3, 4, NULL, NULL, '2020-08-19 21:25:34', '2020-08-19 21:30:33', NULL),
(39, 28, 31, '2019-04-16', 815300, 'Hanabi', 3, 8, NULL, NULL, '2020-08-19 21:27:24', '2020-08-19 21:30:41', NULL),
(40, 12, 7, '2019-08-10', 660534, 'Badang', 3, 11, NULL, NULL, '2020-08-19 21:28:59', '2020-08-19 21:30:50', NULL),
(41, 19, 12, '2019-08-16', 584988, 'Martis', 3, 11, NULL, NULL, '2020-08-19 21:30:02', '2020-08-19 21:30:59', NULL),
(42, 8, 13, '2019-08-21', 754000, 'Bruno', 3, 13, NULL, NULL, '2020-08-19 21:37:40', '2020-08-19 21:49:58', NULL),
(43, 24, 7, '2019-08-08', 487900, 'Karrie', 3, 13, NULL, NULL, '2020-08-19 21:38:24', '2020-08-19 21:48:36', NULL),
(44, 11, 15, '2019-08-12', 861780, 'Selena', 3, 16, NULL, NULL, '2020-08-19 21:39:43', '2020-08-19 21:48:46', NULL),
(45, 3, 9, '2019-09-02', 563049, 'Zilong', 3, 16, NULL, NULL, '2020-08-19 21:40:51', '2020-08-19 21:48:55', NULL),
(46, 8, 38, '2019-08-24', 2204000, 'Karina', 3, 15, NULL, NULL, '2020-08-19 21:44:15', '2020-08-19 21:49:03', NULL),
(47, 12, 23, '2019-09-06', 2170326, 'Hilong', 3, 15, NULL, NULL, '2020-08-19 21:45:04', '2020-08-19 21:49:11', NULL),
(48, 13, 9, '2019-08-27', 114021, 'Kimina', 3, 17, NULL, NULL, '2020-08-19 21:53:29', '2020-08-19 21:54:42', NULL),
(49, 7, 1, '2019-09-10', 20400, 'Thamuz', 3, 17, NULL, NULL, '2020-08-19 21:54:19', '2020-08-19 21:54:58', NULL),
(50, 2, 4, '2019-08-30', 197920, 'Odeseka', 3, 19, NULL, NULL, '2020-08-19 21:58:14', '2020-08-19 22:00:57', NULL),
(55, 13, 2, '2019-08-26', 25338, 'aayeyay', 3, 14, NULL, NULL, '2020-08-19 23:00:06', '2020-08-19 23:01:51', NULL),
(56, 29, 5, '2019-08-26', 241000, 'YuZhong', 3, 17, NULL, NULL, '2020-08-19 23:01:37', '2020-08-19 23:02:31', NULL),
(57, 29, 10, '2019-08-31', 482000, 'Markman', 3, 2, NULL, NULL, '2020-08-19 23:58:56', '2020-08-19 23:58:56', NULL),
(58, 1, 8, '2019-10-05', 303328, 'Claude', 3, 17, NULL, NULL, '2020-08-20 00:06:44', '2020-08-20 00:06:44', NULL),
(59, 30, 2, '2019-10-10', 191200, 'Harrith', 3, 11, NULL, NULL, '2020-08-20 00:07:40', '2020-08-20 00:07:40', NULL),
(60, 21, 5, '2019-10-15', 963500, 'Entrial', 3, 15, NULL, NULL, '2020-08-20 00:08:53', '2020-08-20 00:08:53', NULL),
(61, 26, 7, '2019-10-20', 227500, 'alice', 3, 8, NULL, NULL, '2020-08-20 00:09:58', '2020-08-20 00:09:58', NULL),
(62, 8, 5, '2019-10-21', 290000, 'Rafelar', 3, 5, NULL, NULL, '2020-08-20 00:11:04', '2020-08-20 00:11:04', NULL),
(63, 10, 4, '2019-10-09', 105580, 'Lapu lapu', 3, 7, NULL, NULL, '2020-08-20 00:14:56', '2020-08-20 00:14:56', NULL),
(64, 29, 8, '2019-10-12', 385600, 'Death Prophet', 3, 2, NULL, NULL, '2020-08-20 00:16:16', '2020-08-20 00:16:16', NULL),
(65, 20, 9, '2019-10-28', 457020, 'Faceless Void', 3, 13, NULL, NULL, '2020-08-20 00:18:00', '2020-08-20 00:18:00', NULL),
(66, 20, 21, '2019-11-02', 1066380, 'Kgreal', 3, 9, NULL, NULL, '2020-08-20 00:32:59', '2020-08-20 00:32:59', NULL),
(67, 18, 2, '2019-11-06', 171786, 'Joker', 3, 2, NULL, NULL, '2020-08-20 00:33:59', '2020-08-20 00:33:59', NULL),
(68, 6, 1, '2019-11-13', 135500, 'tyuker', 3, 20, NULL, NULL, '2020-08-20 00:34:48', '2020-08-20 00:34:48', NULL),
(69, 10, 8, '2019-11-20', 211160, 'Kedreal Sarkar', 3, 10, NULL, NULL, '2020-08-20 00:36:43', '2020-08-20 00:36:43', NULL),
(70, 2, 10, '2019-11-24', 494800, 'Apna Sapana Money', 3, 11, NULL, NULL, '2020-08-20 00:37:48', '2020-08-20 00:37:48', NULL),
(71, 2, 10, '2019-11-24', 494800, 'Apna Sapana Money', 3, 11, NULL, NULL, '2020-08-20 00:37:48', '2020-08-20 00:37:48', NULL),
(72, 26, 2, '2019-11-28', 65000, 'Alucard', 3, 19, NULL, NULL, '2020-08-20 00:39:06', '2020-08-20 00:39:06', NULL),
(73, 8, 30, '2019-11-29', 1740000, 'FarieDragon', 3, 14, NULL, NULL, '2020-08-20 00:41:16', '2020-08-20 00:41:16', NULL),
(74, 29, 2, '2019-12-02', 96400, 'kyoto', 3, 8, NULL, NULL, '2020-08-20 00:57:48', '2020-08-20 00:57:48', NULL),
(75, 10, 2, '2019-12-08', 52790, 'Kirayayo', 3, 8, NULL, NULL, '2020-08-20 00:58:31', '2020-08-20 00:58:31', NULL),
(76, 3, 2, '2019-12-13', 125122, 'Happy journey', 3, 18, NULL, NULL, '2020-08-20 00:59:43', '2020-08-20 00:59:43', NULL),
(77, 16, 6, '2019-12-20', 221784, 'Too good', 3, 12, NULL, NULL, '2020-08-20 01:01:38', '2020-08-20 01:01:38', NULL),
(78, 23, 4, '2019-12-04', 240800, 'Dara', 3, 3, NULL, NULL, '2020-08-20 01:03:01', '2020-08-20 01:03:01', NULL),
(79, 17, 6, '2019-12-25', 351942, 'Mainine', 3, 3, NULL, NULL, '2020-08-20 01:04:08', '2020-08-20 01:04:08', NULL),
(80, 9, 3, '2019-12-08', 237000, 'Odetara', 3, 15, NULL, NULL, '2020-08-20 01:05:00', '2020-08-20 01:05:00', NULL),
(81, 25, 3, '2019-12-15', 54843, 'Uitnera', 3, 15, NULL, NULL, '2020-08-20 01:05:39', '2020-08-20 01:05:39', NULL),
(82, 13, 1, '2019-12-16', 12669, 'Chill', 3, 4, NULL, NULL, '2020-08-20 01:07:08', '2020-08-20 01:07:08', NULL),
(83, 2, 8, '2020-01-02', 395840, 'full masti', 3, 6, NULL, NULL, '2020-08-20 01:12:06', '2020-08-20 01:12:06', NULL),
(84, 14, 12, '2020-01-07', 799332, 'King Khan', 3, 18, NULL, NULL, '2020-08-20 01:16:55', '2020-08-20 01:16:55', NULL),
(85, 24, 12, '2020-01-22', 836400, 'lollita', 3, 18, NULL, NULL, '2020-08-20 01:18:08', '2020-08-20 01:18:08', NULL),
(86, 15, 5, '2020-01-21', 430885, 'Jillie', 3, 5, NULL, NULL, '2020-08-20 01:19:47', '2020-08-20 01:19:47', NULL),
(87, 29, 12, '2020-01-28', 578400, 'Nellila', 3, 5, NULL, NULL, '2020-08-20 01:20:35', '2020-08-20 01:20:35', NULL),
(88, 27, 21, '2020-01-03', 1365000, 'Uaries', 3, 19, NULL, NULL, '2020-08-20 01:21:32', '2020-08-20 01:21:32', NULL),
(89, 20, 26, '2020-01-08', 1320280, 'Bolapuri', 3, 7, NULL, NULL, '2020-08-20 01:22:32', '2020-08-20 01:22:32', NULL),
(90, 10, 7, '2020-01-10', 184765, 'Geograp', 3, 14, NULL, NULL, '2020-08-20 01:23:25', '2020-08-20 01:23:25', NULL),
(91, 9, 6, '2020-01-14', 474000, 'Giga', 3, 14, NULL, NULL, '2020-08-20 01:23:57', '2020-08-20 01:23:57', NULL),
(92, 15, 1, '2020-01-16', 86177, 'Aeora', 3, 9, NULL, NULL, '2020-08-20 01:26:26', '2020-08-20 01:26:26', NULL),
(93, 5, 1, '2020-01-18', 47550, 'Jeona', 3, 9, NULL, NULL, '2020-08-20 01:26:55', '2020-08-20 01:26:55', NULL),
(94, 2, 2, '2020-01-10', 98960, 'Jilla Gaziyabaad', 3, 13, NULL, NULL, '2020-08-20 01:32:31', '2020-08-20 01:32:31', NULL),
(95, 28, 2, '2020-01-09', 52600, 'Trinaty', 3, 13, NULL, NULL, '2020-08-20 01:39:10', '2020-08-20 01:39:10', NULL),
(96, 5, 5, '2020-02-05', 237750, 'Oreoreolay', 3, 13, NULL, NULL, '2020-08-20 01:40:19', '2020-08-20 01:40:19', NULL),
(97, 18, 10, '2020-02-07', 858930, 'Billa', 3, 19, NULL, NULL, '2020-08-20 01:43:24', '2020-08-20 01:43:24', NULL),
(98, 28, 10, '2020-02-17', 263000, 'Vinod', 3, 19, NULL, NULL, '2020-08-20 01:44:02', '2020-08-20 01:44:02', NULL),
(99, 12, 6, '2020-03-25', 566172, 'Jugth Jila', 3, 3, NULL, NULL, '2020-08-20 01:47:11', '2020-08-20 01:47:11', NULL),
(100, 3, 20, '2020-03-02', 1251220, 'Accha hai', 3, 3, NULL, NULL, '2020-08-20 01:47:59', '2020-08-20 01:47:59', NULL),
(101, 20, 1, '2020-03-09', 50780, 'Htik hee hai', 3, 11, NULL, NULL, '2020-08-20 01:51:54', '2020-08-20 01:51:54', NULL),
(102, 9, 1, '2020-03-17', 79000, 'Waah ye bhi htik hai', 3, 14, NULL, NULL, '2020-08-20 01:52:57', '2020-08-20 01:52:57', NULL),
(103, 8, 3, '2020-03-21', 174000, 'Jao Jao', 3, 2, NULL, NULL, '2020-08-20 01:54:22', '2020-08-20 01:54:22', NULL),
(104, 17, 15, '2020-03-24', 879855, 'Mast Hoga', 3, 18, NULL, NULL, '2020-08-20 01:55:56', '2020-08-20 01:55:56', NULL),
(105, 22, 20, '2020-03-17', 492000, 'Bahut accha', 3, 12, NULL, NULL, '2020-08-20 02:01:09', '2020-08-20 02:01:09', NULL),
(106, 26, 4, '2020-03-04', 130000, 'Aana Jarna Aaraam Se', 3, 16, NULL, NULL, '2020-08-20 02:02:22', '2020-08-20 02:02:22', NULL),
(107, 13, 7, '2020-03-10', 88683, 'Sanam Teri Kasam', 3, 5, NULL, NULL, '2020-08-20 02:06:01', '2020-08-20 02:06:01', NULL),
(108, 3, 2, '2020-02-10', 125122, 'Dhoom', 3, 6, NULL, NULL, '2020-08-20 02:06:48', '2020-08-20 02:06:48', NULL),
(109, 29, 1, '2020-02-22', 48200, 'Hum Theen', 3, 7, NULL, NULL, '2020-08-20 02:08:19', '2020-08-20 02:08:19', NULL),
(110, 8, 1, '2020-04-04', 58000, 'ekalehe', 3, 22, NULL, NULL, '2020-08-20 02:15:00', '2020-08-20 02:15:00', NULL),
(111, 3, 1, '2020-05-11', 62561, 'Jarna hai', 3, 22, NULL, NULL, '2020-08-20 02:15:56', '2020-08-20 02:15:56', NULL),
(112, 24, 1, '2020-04-11', 69700, 'Saath Saath Chalte hai', 3, 24, NULL, NULL, '2020-08-20 02:17:49', '2020-08-20 02:17:49', NULL),
(113, 21, 2, '2020-04-10', 385400, 'Jao masti karo', 3, 23, NULL, NULL, '2020-08-20 02:20:44', '2020-08-20 02:20:44', NULL),
(114, 4, 15, '2020-04-16', 396000, 'Lounda', 3, 23, NULL, NULL, '2020-08-20 02:22:08', '2020-08-20 02:22:08', NULL),
(115, 17, 20, '2020-06-18', 1173140, 'Wonderful', 3, 8, NULL, NULL, '2020-08-20 02:24:14', '2020-08-20 02:24:14', NULL),
(116, 24, 11, '2020-06-23', 766700, 'Excellent', 3, 8, NULL, NULL, '2020-08-20 02:25:09', '2020-08-20 02:25:09', NULL),
(117, 20, 7, '2020-06-16', 355460, 'khiladi', 3, 8, NULL, NULL, '2020-08-20 02:26:02', '2020-08-20 02:26:02', NULL),
(118, 2, 13, '2020-06-23', 643240, 'Jhoot', 3, 20, NULL, NULL, '2020-08-20 02:27:01', '2020-08-20 02:27:01', NULL),
(119, 14, 13, '2020-06-29', 865943, 'Wahe Log', 3, 20, NULL, NULL, '2020-08-20 02:27:34', '2020-08-20 02:27:34', NULL),
(120, 27, 24, '2020-06-16', 1560000, 'Badiya Bhai', 3, 12, NULL, NULL, '2020-08-20 02:28:39', '2020-08-20 02:28:39', NULL),
(121, 16, 40, '2020-06-06', 1478560, 'office log', 3, 21, NULL, NULL, '2020-08-20 02:31:29', '2020-08-20 02:31:29', NULL),
(122, 3, 9, '2020-06-02', 563049, 'Sab Jao', 3, 10, NULL, NULL, '2020-08-20 02:32:32', '2020-08-20 02:32:32', NULL),
(123, 10, 2, '2020-06-14', 52790, 'Kenthapo', 3, 17, NULL, NULL, '2020-08-20 02:33:39', '2020-08-20 02:33:39', NULL),
(124, 5, 4, '2020-07-23', 190200, 'Hinda', 3, 2, NULL, NULL, '2020-08-20 02:40:46', '2020-08-20 02:40:46', NULL),
(125, 26, 4, '2020-07-25', 130000, 'Accha Ba', 3, 2, NULL, NULL, '2020-08-20 02:41:36', '2020-08-20 02:41:36', NULL),
(126, 20, 10, '2020-08-15', 507800, 'Hijenic', 3, 16, NULL, NULL, '2020-08-20 02:43:03', '2020-08-20 02:43:03', NULL),
(127, 18, 10, '2020-08-28', 858930, 'Yoma Pee', 3, 16, NULL, NULL, '2020-08-20 02:44:17', '2020-08-20 02:44:17', NULL),
(128, 8, 30, '2020-08-11', 1740000, 'Yanthara', 3, 7, NULL, NULL, '2020-08-20 02:45:30', '2020-08-20 02:45:30', NULL),
(129, 16, 20, '2020-08-31', 739280, 'Ab hteek hai', 3, 7, NULL, NULL, '2020-08-20 02:46:09', '2020-08-20 02:46:09', NULL),
(130, 4, 6, '2020-08-08', 158400, 'Jidar Jarna hai Jao', 3, 21, NULL, NULL, '2020-08-20 02:47:16', '2020-08-20 02:47:16', NULL),
(131, 16, 21, '2020-08-24', 776244, 'Oleole', 3, 13, NULL, NULL, '2020-08-20 02:48:46', '2020-08-20 02:48:46', NULL),
(132, 2, 3, '2020-08-29', 148440, 'Vig Vp', 3, 30, NULL, NULL, '2020-08-20 02:58:37', '2020-08-20 02:58:37', NULL),
(133, 10, 4, '2020-08-02', 105580, 'Sab Kuch Accha', 3, 30, NULL, NULL, '2020-08-20 03:00:07', '2020-08-20 03:00:07', NULL),
(134, 17, 10, '2020-09-15', 586570, 'Booking bhi karr ne laga', 3, 25, NULL, NULL, '2020-08-20 03:01:13', '2020-08-20 03:01:13', NULL),
(135, 10, 5, '2020-09-09', 131975, 'Kushi2 Jao', 3, 26, NULL, NULL, '2020-08-20 03:05:07', '2020-08-20 03:05:07', NULL),
(136, 28, 5, '2020-09-21', 131500, 'Ganga Yamuna', 3, 26, NULL, NULL, '2020-08-20 03:06:12', '2020-08-20 03:06:12', NULL),
(137, 4, 12, '2020-09-03', 316800, 'Terodaa', 3, 28, NULL, NULL, '2020-08-20 03:09:31', '2020-08-20 03:09:31', NULL),
(138, 22, 12, '2020-09-10', 295200, 'Bravo', 3, 28, NULL, NULL, '2020-08-20 03:10:18', '2020-08-20 03:10:18', NULL),
(139, 13, 10, '2020-09-15', 126690, 'Having Fun', 3, 29, NULL, NULL, '2020-08-20 03:11:21', '2020-08-20 03:11:21', NULL),
(140, 19, 10, '2020-06-14', 487490, 'Yoohtan', 3, 29, NULL, NULL, '2020-08-20 03:12:22', '2020-08-20 03:12:22', NULL),
(141, 8, 6, '2020-10-06', 348000, 'Tubhi Mazay Karr', 3, 27, NULL, NULL, '2020-08-20 03:13:37', '2020-08-20 03:13:37', NULL),
(142, 1, 4, '2020-10-15', 151664, 'Watata', 3, 27, NULL, NULL, '2020-08-20 03:16:00', '2020-08-20 03:16:00', NULL),
(143, 22, 23, '2020-10-21', 565800, 'Jao', 3, 31, NULL, NULL, '2020-08-20 03:47:59', '2020-08-20 03:47:59', NULL),
(144, 15, 2, '2020-11-02', 172354, 'Mazay Karr', 3, 23, NULL, NULL, '2020-08-20 03:50:40', '2020-08-20 03:50:40', NULL),
(145, 11, 1, '2020-11-03', 57452, 'One is the best', 3, 24, NULL, NULL, '2020-08-20 03:52:00', '2020-08-20 03:52:00', NULL),
(146, 28, 11, '2020-11-14', 289300, 'Hilok', 3, 19, NULL, NULL, '2020-08-20 03:55:00', '2020-08-20 03:55:00', NULL),
(147, 20, 14, '2020-11-17', 710920, 'thoda kam', 3, 16, NULL, NULL, '2020-08-20 03:56:31', '2020-08-20 03:56:31', NULL),
(148, 26, 7, '2020-11-13', 227500, 'Saathwa', 3, 21, NULL, NULL, '2020-08-20 03:58:15', '2020-08-20 03:58:15', NULL),
(149, 12, 5, '2020-11-05', 471810, 'Gozillabird', 3, 5, NULL, NULL, '2020-08-20 19:24:41', '2020-08-20 19:24:41', NULL),
(150, 8, 2, '2020-11-10', 116000, 'Ninja', 3, 11, NULL, NULL, '2020-08-20 19:25:37', '2020-08-20 19:25:37', NULL),
(151, 23, 7, '2020-12-11', 421400, 'Montrial', 3, 20, NULL, NULL, '2020-08-20 19:26:49', '2020-08-20 19:26:49', NULL),
(152, 25, 2, '2020-12-17', 36562, 'Yatra', 3, 3, NULL, NULL, '2020-08-20 19:27:49', '2020-08-20 19:27:49', NULL),
(153, 19, 6, '2020-12-16', 292494, 'Hijiji', 3, 19, NULL, NULL, '2020-08-20 19:29:18', '2020-08-20 19:29:18', NULL),
(154, 26, 20, '2020-12-30', 650000, 'Gorgoga', 3, 33, NULL, NULL, '2020-08-20 19:30:31', '2020-08-20 19:30:31', NULL),
(155, 1, 15, '2020-12-02', 568740, 'Bbaab', 3, 32, NULL, NULL, '2020-08-20 19:35:13', '2020-08-20 19:35:13', NULL),
(156, 16, 15, '2020-12-15', 554460, 'Goa', 3, 32, NULL, NULL, '2020-08-20 19:36:02', '2020-08-20 19:36:02', NULL),
(157, 17, 8, '2020-12-15', 469256, 'Jugajaasoos', 3, 26, NULL, NULL, '2020-08-20 19:37:41', '2020-08-20 19:37:41', NULL),
(158, 10, 8, '2020-12-30', 211160, 'Kedrenath', 3, 26, NULL, NULL, '2020-08-20 19:38:43', '2020-08-20 19:38:43', NULL),
(159, 16, 3, '2020-12-10', 110892, 'Tujarre', 3, 35, NULL, NULL, '2020-08-20 19:40:07', '2020-08-20 19:40:07', NULL),
(160, 16, 1, '2020-12-10', 36964, 'Chorr', 3, 27, NULL, NULL, '2020-08-20 19:41:05', '2020-08-20 19:41:05', NULL),
(161, 10, 10, '2020-12-14', 263950, 'Tubhija', 3, 34, NULL, NULL, '2020-08-20 19:43:13', '2020-08-20 19:43:13', NULL),
(162, 13, 20, '2020-12-21', 253380, 'Layjao', 3, 18, NULL, NULL, '2020-08-20 19:46:41', '2020-08-20 19:46:41', NULL),
(163, 10, 2, '2020-12-10', 52790, 'Wayter', 3, 4, NULL, NULL, '2020-08-20 19:49:47', '2020-08-20 19:49:47', NULL),
(164, 2, 2, '2020-12-08', 98960, 'Bsdk', 3, 9, NULL, NULL, '2020-08-20 19:50:57', '2020-08-20 19:50:57', NULL),
(165, 23, 30, '2020-12-21', 1806000, 'Gentone', 3, 6, NULL, NULL, '2020-08-20 19:52:28', '2020-08-20 19:52:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_user_id` int(11) DEFAULT 0,
  `updated_user_id` int(11) DEFAULT NULL,
  `deleted_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `image`, `description`, `city`, `division`, `create_user_id`, `updated_user_id`, `deleted_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bagan', '[\"b1.jpg\",\"b2.jpg\",\"b3.jpg\",\"b5.jpg\",\"b6.jpg\",\"b7.jpg\"]', 'The ancient city of Bagan is perhaps one of the most interesting places in Myanmar. Over 2,000 Buddhist monuments dot the Bagan Archeological Zone that’s spread across 26 square miles. The best way to take in the entirety of this breathtaking city is to hop into a hot air balloon and fly over it. The rides take place in the wee hours of the morning. Carry a good camera so you can take photos of the monuments', 'Bagan', 'Mandalay', 6, NULL, NULL, '2020-08-19 19:47:42', '2020-08-19 19:51:05', NULL),
(2, 'Loikaw', '[\"loikaw1.jpg\",\"Loikaw-2.jpg\",\"loikaw-3.jpeg\",\"loikaw-4.jpg\"]', 'Loikaw was the Headquarters of the Political Officer in Charge of the Karenni States, part of the Princely States of British Burma, in 1922 during British rule in Burma. The town was located in the only flat part of the Karenni area', 'Loikaw', 'Kayah', 7, NULL, NULL, '2020-08-19 19:47:45', '2020-08-19 19:52:47', NULL),
(3, 'Kyaiktiyo Pagoda', '[\"kyaiktio-1.jpg\",\"kyaiktio-2.jpg\",\"kyaiktio-3.jpg\",\"kyaikto-4.png\"]', 'Mount Kyaiktiyo (Kyite Htee Yoe), famous for the huge golden rock perched at its summit, is one of the three most sacred religious sites in Myanmar, along with the Shwedagon Pagoda and the Mahamuni Temple. It is a wellknown Buddhist pilgrimage site in Mon State, Burma.', 'Kyaik Hto', 'Mon', 8, NULL, NULL, '2020-08-19 19:47:48', '2020-08-19 19:53:04', NULL),
(4, 'Mount Popa', '[\"popa-1.jpg\",\"popa-2.jpg\",\"popa-3.jpg\",\"popa-4.jpg\"]', 'Mount Popa is one of the best Myanmar points of interest especially if you love to hike. The extinct volcano is not just magnificent to look at in itself but it’s topped by the Popa Taungkalat Monastery that’s perched on an outcrop. 777 steps will take you all the way to the top and reward you with panoramic views of the plains.', 'Mandalay', 'Mandalay', 9, NULL, NULL, '2020-08-19 19:47:50', '2020-08-19 19:53:29', NULL),
(5, 'Ngwe Saung', '[\"ngwesaung-1.jpg\",\"ngwesaung-2.jpg\",\"ngwesaung-3.jpg\",\"ngwesaung-4.jpg\"]', 'Ngwe Saung or Silver Beach is one of the most popular. There are scuba diving and snorkeling facilities too if you want to explore the water. Cafes and restaurants nearby serve up dish after dish of lip-smacking seafood and snacks.Beaches in Myanmar are best visited during December-April when spring lends itself to deliciously warm weather. You can also catch the Water Festival (Thingyan) in April where everyone comes out to celebrate.', 'Ayeyarwady', 'Ayeyarwady', 10, NULL, NULL, '2020-08-19 19:48:00', '2020-08-19 19:53:53', NULL),
(6, 'Kalaw', '[\"kalaw-1.jpg\",\"kalaw-2.webp\",\"kalaw-3.jpg\",\"kalaw-4.jpg\"]', 'Ngwe Saug or Silver Beach is one of the most popular. There are scuba diving and snorkeling facilities too if you want to explore the water. Cafes and restaurants nearby serve up dish after dish of lip-smacking seafood and snacks.Beaches in Myanmar are best visited during December-April when spring lends itself to deliciously warm weather. You can also catch the Water Festival (Thingyan) in April where everyone comes out to celebrate.', 'Kalaw', 'Shan', 11, NULL, NULL, '2020-08-19 19:48:03', '2020-08-19 19:54:13', NULL),
(7, 'Ngapali', '[\"ngapali-1.jpg\",\"ngapali-2.jpg\",\"ngapali-3.jpg\",\"ngaplai-4.jpg\"]', 'Ngapali the most popular sand stretch around in Myanmar and does make up for one of the most popular relaxing spots in the entirety of Myanmar. The combination of the yellow-white sand is what makes it one of the most beautiful spots that you can sit and tan yourself and let loose of the thoughts that do intrigue you.', 'Thandwe', 'Rakhine', 12, NULL, NULL, '2020-08-19 19:48:05', '2020-08-19 19:54:31', NULL),
(8, 'Pindaya', '[\"pindaya-1.jpg\",\"pindaya-2.jpg\",\"pindaya-3.jpg\",\"pindaya-4.jpg\"]', 'Pindaya is one of the off the beaten track sites that you will possibly come across. It is predominantly known around to provide a glimpse into the Buddhist histories in the nation. The entire landmark has completely formed from a series of deep caves and alone is home to over 8000 images of Lord Buddha. The statues and images are adorned in beautiful hues of gold and brass with the glimmering effect under the shadowy caverns. Apart from the spots around celebrating the religion, you will also find an amazing influx of tourists visiting the lake beside Pindaya. You can also trek through the region and cross mountains from Kalaw to Boot.', 'Pindaya', 'Shan', 13, NULL, NULL, '2020-08-19 19:48:08', '2020-08-19 19:54:49', NULL),
(9, 'Hpa-An', '[\"hpaan1.jpg\",\"hpaan2.jpg\",\"hpaan3.webp\",\"hpaan4.jpg\"]', 'Hpa-An is a very popular traveler town around in Myanmar which is not necessarily a lot visited around by the tourist but does make up for providing you with an amazing experience altogether. The rugged and rustic vibes from this specific town are what makes it unique and loved by the majority of the tourists who visit it. One of the most important and popular spots to visit around in Hpa-An is the Zaydan Road which is littered around with coffee joints and amazing spots to just sit down and have a relaxing day. The lakeside of Kan Thar Yar is yet another of the amazing spots to be around in and make sure to enjoy the reflective transparency of the water when you walk along it', 'Hpa-An', 'Kayin', 14, NULL, NULL, '2020-08-19 19:48:12', '2020-08-19 19:55:09', NULL),
(10, 'Mandalay Palace', '[\"mandalay palace 4.jpg\",\"Mandalay-Palace1.jpg\",\"mandalaypalace2.jpg\",\"mandalay-palace3.jpg\"]', 'This is one of the best places to visit in Myanmar. The palace consists of a watchtower which you can climb and soak in the beautiful views of the city it offers. The most compelling thing about this palace is a pyramid which is made of gilt filigree built above the main throne of the palace. This is one of the important places to visit in Myanmar.', 'Mandalay', 'Mandalay', 15, NULL, NULL, '2020-08-19 19:48:22', '2020-08-19 19:55:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1171, '2014_10_12_000000_create_users_table', 1),
(1172, '2014_10_12_100000_create_password_resets_table', 1),
(1173, '2019_08_19_000000_create_failed_jobs_table', 1),
(1174, '2020_07_01_080915_create_packages_table', 1),
(1175, '2020_07_01_084823_create_destination_table', 1),
(1176, '2020_07_01_085658_create_bookings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `create_user_id` int(11) DEFAULT 0,
  `updated_user_id` int(11) DEFAULT NULL,
  `deleted_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `destination_id`, `name`, `description`, `price`, `create_user_id`, `updated_user_id`, `deleted_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Normal', 'Boasting a bar, shared lounge and views of city, Bagan HMWE Hotel is situated in Bagan, 3.2 km from Manuha Temple. A wonderful place and the kindest service ever!', 37916, 16, NULL, NULL, '2020-08-19 19:48:23', '2020-08-19 19:48:23', NULL),
(2, 1, 'Premium', 'Situated in Bagan, 2.2 km from Izza Gawna Pagoda, Bagan Wynn Hotel features accommodation with a restaurant, free private parking, an outdoor swimming pool and a fitness centre. ', 49480, 17, NULL, NULL, '2020-08-19 19:48:31', '2020-08-19 19:48:31', NULL),
(3, 1, 'Gold', 'Golden View Hotel features a restaurant, outdoor swimming pool, a bar and garden in Bagan. Each accommodation at the 3-star hotel has pool views and free WiFi. Superb experience!', 62561, 18, NULL, NULL, '2020-08-19 19:48:32', '2020-08-19 19:48:32', NULL),
(4, 2, 'Normal', 'The rooms come with air conditioning, a flat-screen TV with satellite channels, an electric tea pot, a bath, a hairdryer and a desk. Rooms are complete with a private bathroom equipped with free toiletries, while certain accommodations at the hotel also feature a seating area. All rooms have a closet.An Asian breakfast is available each morning at Myat Nan Taw Hotel.The nearest airport is Loikaw Airport, 3.5 km from the accommodation.  ', 26400, 19, NULL, NULL, '2020-08-19 19:48:34', '2020-08-19 19:48:34', NULL),
(5, 2, 'Premium', 'Located in Loikaw, Hotel Empire provides a bar and shared lounge. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. Private parking can be arranged at an extra charge. At the hotel every room is equipped with a closet, a flat-screen TV and a private bathroom. A buffet breakfast is available daily at Hotel Empire.The nearest airport is Loikaw Airport, 2.3 km from the accommodation.', 47550, 20, NULL, NULL, '2020-08-19 19:48:35', '2020-08-19 19:48:35', NULL),
(6, 2, 'Gold', 'Demoso Lodge offers 4-star accommodations with a bar. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi throughout the property. Private parking can be arranged at an extra charge. At the hotel, the rooms come with a closet. Complete with a private bathroom, all rooms at Demoso Lodge come with air conditioning, and some rooms also feature a seating area.Guests at the accommodation can enjoy a continental breakfast.The nearest airport is Loikaw Airport, 22.5 km from the hotel. ', 135500, 21, NULL, NULL, '2020-08-19 19:48:36', '2020-08-19 19:48:36', NULL),
(7, 3, 'Normal', 'Pann Myo Thu Inn is offering accommodations in Kinmun. The property has a 24-hour front desk as well as free WiFi.At the inn, all rooms come with a desk. At Pann Myo Thu Inn the rooms include air conditioning and a private bathroom. Solo travelers in particular like the location – they rated it 8.5 for a one-person stay.  ', 20400, 22, NULL, NULL, '2020-08-19 19:48:38', '2020-08-19 19:48:38', NULL),
(8, 3, 'Premium', 'Every room is equipped with a satellite TV, a seating area and an electric kettle with coffee/tea making facilities. Air conditioning is also available in selected rooms. Fitted with shower facilities, the private bathroom includes free toiletries, a hairdryer and bathrobes.Located on the hilltop and surrounded by nature, guests can enjoy hiking with a local expert at the property. Other facilities such as meeting rooms, laundry and currency exchange can all be arranged at the 24-hour front desk.Guests can enjoy meals at the hotel restaurant as well as drinks at the bar. Room service is also available throughout the day.', 58000, 23, NULL, NULL, '2020-08-19 19:48:39', '2020-08-19 19:48:39', NULL),
(9, 3, 'Gold', 'The Merit Resort features a restaurant, outdoor swimming pool, a bar and shared lounge in Kinmun. The property has a garden, as well as a terrace. The property provides a 24-hour front desk, a shuttle service, room service and free WiFi.At the hotel, each room comes with a desk. Complete with a private bathroom equipped with a shower and a hairdryer, guest rooms at The Merit Resort have a flat-screen TV and air conditioning, and selected rooms are equipped with a seating area.The accommodation offers a continental or buffet breakfast.Guests at The Merit Resort will be able to enjoy activities in and around Kinmun, like cycling.ort Bagan', 79000, 24, NULL, NULL, '2020-08-19 19:48:40', '2020-08-19 19:48:40', NULL),
(10, 4, 'Normal', 'Located in the heartland of ancient Bagan, Myanmar Han Hotel Lays at the foot of Mt. Tu-Yin Taung, one of the beautiful landmarks of the region. Surrounding the hotel are the archaeological sites and monuments that have stood against the test of time. The hotel is only 15 mins drive away from the airport as well as the bus terminal.', 26395, 25, NULL, NULL, '2020-08-19 19:48:42', '2020-08-19 19:48:42', NULL),
(11, 4, 'Premium', 'The resort offers quiet and tranquil surroundings and the most stunning views of the beautiful Taung Kalatt monastery as the sun sets over the infinity pool.', 57452, 26, NULL, NULL, '2020-08-19 19:48:43', '2020-08-19 19:48:43', NULL),
(12, 4, 'Gold', 'The rooms offer air conditioning, and getting online is possible, as free wifi is available, allowing you to rest and refresh with ease.\r\n				Popa Garden Resort features a 24 hour front desk, room service, and a coffee shop. ', 94362, 27, NULL, NULL, '2020-08-19 19:48:44', '2020-08-19 19:48:44', NULL),
(13, 5, 'Normal', 'Come join us at Dream House Guest House & Restaurant, only a 5 minute walk from Nwge Saung Beach. Rooms start at $10 and All rooms are private with bath room, clean and cozy, Banana Pan Cake, Vegetable Sandwich, Pad Thai Noodle, Fried Rice, Fried Noodle, Fried Vermicelli Coffee, Tea and Juice provided for breakfast and we offer the welcome juice, purified water, hot water, coffee, tea, green tea, cigar and thanakhar for face free anytime ', 12669, 28, NULL, NULL, '2020-08-19 19:48:45', '2020-08-19 19:48:45', NULL),
(14, 5, 'Premium', 'If you’re looking for a family-friendly small hotel in Ngwe Saung, look no further than Central Hotel Ngwesaung Beach.\r\n				Ngwe Saung Beach (2.9 mi), located nearby, makes Central Hotel Ngwesaung Beach a great place to stay for those interested in visiting this popular Ngwe Saung landmar. Central Hotel Ngwesaung Beach is a family-friendly small hotel offering air conditioning and a minibar in the rooms, and it is easy to stay connected during your stay as free wifi is offered to guests.', 66611, 29, NULL, NULL, '2020-08-19 19:48:46', '2020-08-19 19:48:46', NULL),
(15, 5, 'Gold', 'Sunny Paradise Hotel offers guests an array of room amenities including a minibar, a refrigerator, and air conditioning, and getting online is possible, as free internet access is available.\r\n				The resort offers a 24 hour front desk, a concierge, and room service, to make your visit even more pleasant. The property also features a pool and free breakfast. Guests arriving by vehicle have access to free parking.', 86177, 30, NULL, NULL, '2020-08-19 19:48:47', '2020-08-19 19:48:47', NULL),
(16, 6, 'Normal', 'A charming two story colonial style red bricked B&B with wide welcoming porch, immaculate exterior, beautiful garden, marvelous fireplace and unique touches of Myanmar culture located at the heart of quiet and peaceful neighborhood in Kalaw. Rooms are spacious with gorgeous hardwood floors and private bathroom in the company of Myanmar rattan furniture and comfortable king-size or twins bed ', 36964, 31, NULL, NULL, '2020-08-19 19:48:49', '2020-08-19 19:48:49', NULL),
(17, 6, 'Premium', 'Set in Kalaw, 2.1 km from Shwe Oo Min Pagoda, Pine Land Oasis Hotel offers accommodation with a restaurant, free private parking and a bar. The accommodation features a 24-hour front desk, room service and ticket service for guests.', 58657, 32, NULL, NULL, '2020-08-19 19:48:50', '2020-08-19 19:48:50', NULL),
(18, 6, 'Gold', 'Dream Mountain Resort offers high standard hotel facilities, friendly services and good quality of foods with reasonable price.', 85893, 33, NULL, NULL, '2020-08-19 19:48:52', '2020-08-19 19:48:52', NULL),
(19, 7, 'Normal', 'Golden Queen Hotel offers accommodation in Ngapali, a short walk from the beach. Private rooms include a seating area and air-conditioning for your convenience.  ', 48749, 34, NULL, NULL, '2020-08-19 19:48:53', '2020-08-19 19:48:53', NULL),
(20, 7, 'Premium', 'Located in Ngapali, 300 metres from Ngapali Beach, May 18 Guest House Ngapali provides accommodation with a garden and free private parking. ', 50780, 35, NULL, NULL, '2020-08-19 19:48:54', '2020-08-19 19:48:54', NULL),
(21, 7, 'Gold', 'Hotel Per night: Aureum Palace Hotel & Resort Bagan', 192700, 36, NULL, NULL, '2020-08-19 19:48:56', '2020-08-19 19:48:56', NULL),
(22, 8, 'Normal', 'With a stay at Full Moon Guest House in Kalaw, you will be a 4-minute walk from Christ the King Church and 12 minutes by foot from Shwe Oo Min Phaya. Featured amenities include a 24-hour front desk, luggage storage, and laundry facilities. Free self parking is available onsite. ', 24600, 37, NULL, NULL, '2020-08-19 19:48:57', '2020-08-19 19:48:57', NULL),
(23, 8, 'Premium', 'Location close to the cave - gardens - large individual bungalows and terrace with nice view - Heated mattress (nights can be a bit cold) - free bikes - staff kindliness and service\r\n				noise from prayers at night from close by pagoda (but not the hotel’s fault) - room equipment a bit outdated. Bed was good, airco worked well, good hot water, also room could use some maintenance but is acceptable and clean. Nice balcony, well maintained garden, quiet atmosphere.', 60200, 38, NULL, NULL, '2020-08-19 19:48:58', '2020-08-19 19:48:58', NULL),
(24, 8, 'Gold', 'A wonderful welcome and a real feeling of being part of a family are some of the joys of Pindaya Farm. Add to that great food, fabulous service, lovely rooms and peace and quiet and you get a splendid spot to sty, just outside of Pindaya.', 69700, 39, NULL, NULL, '2020-08-19 19:48:59', '2020-08-19 19:48:59', NULL),
(25, 9, 'Normal', 'Offering a restaurant, Hotel Angels Land is located in Kyaikhtaw. It offers comfortable rooms with air conditioning and free WiFi access. Guests enjoy the convenience of a 24-hour front desk. ', 18281, 40, NULL, NULL, '2020-08-19 19:49:00', '2020-08-19 19:49:00', NULL),
(26, 9, 'Premium', 'Golden Palace Hotel is located in Hpa-an, within 1.7 km of Hpa-an Night Market and 1.4 km of Shwe Yin Mhyaw Pagoda. This 3-star hotel offers a 24-hour front desk, room service and free WiFi. Really nice room in Hpa An and great price. Breakfast is a delicious buffet with many options. Great staff who are helpful with local area and onward travel. Really happy with this place.', 32500, 41, NULL, NULL, '2020-08-19 19:49:01', '2020-08-19 19:49:01', NULL),
(27, 9, 'Gold', 'Situated in Hpa-an, 5 km from Hpa-an Night Market, Thiri Hpa An Hotel features accommodation with a restaurant, free private parking, an outdoor swimming pool and a fitness centre. ', 65000, 42, NULL, NULL, '2020-08-19 19:49:03', '2020-08-19 19:49:03', NULL),
(28, 10, 'Normal', 'Located on 30th Street Between 77th & 76th Street, Mandalay, Myanmar. Near railway station, walk 1 minute, Diamond Palaza walk just 3 minutes, Gold Leave work walk 5 minutes and Maharmuni Image walk 10 Minutes. Zegyo Market walk 10 Minutes and Bagan & Mingoon jutty drive 10 minutes. Bus Station 15 minutes drive. U Bain Bridge 30 minutes driving. International airport 50 minutes driving. Hotel is located in central Mandalay. ', 26300, 43, NULL, NULL, '2020-08-19 19:49:04', '2020-08-19 19:49:04', NULL),
(29, 10, 'Premium', 'Shwe Ingyinn Hotel (SIG HOTEL) is located in 0.0 km from the center of Mandalay City near by famous Tourist places such as Mya Nan San Kyaw Palace, Mandalay Hill, Khuthotaw Pagoda where the World Largest book existed etc... Moreover Shwe Ingyinn Hotel opposites by Mandalay Central Railway Station and it just takes 45 minutes drive from Mandalay International Airport.', 48200, 1, NULL, NULL, '2020-08-19 22:53:41', '2020-08-19 22:53:41', NULL),
(30, 10, 'Gold', 'Yadanarpon Dynasty Hotel is quite close to Mandalay Royal Palace which is peaceful, delighted silent zone road-map of 65th, between 27th and 28th street. Decorated with contemporary implement to enjoy the odour age of Yadanarpon Dynasty. Sixth stories building design and/is nestled with cozy Villas, improved a beautiful green landscape. Organized with total of 80 rooms and 3 room types as Superior, Deluxe and Villa', 95600, 1, NULL, NULL, '2020-08-19 22:54:28', '2020-08-19 22:54:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `status` int(11) DEFAULT 0,
  `create_user_id` int(11) DEFAULT 0,
  `updated_user_id` int(11) DEFAULT NULL,
  `deleted_user_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `type`, `phone`, `address`, `dob`, `status`, `create_user_id`, `updated_user_id`, `deleted_user_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$/2wEOaD/4ydEpUKvySPK/ek7x0s7zESpfBvak5EAXSPD04R/haqvC', 'd3ec932af77859540a44bf2e60439e63.jpg', '0', '09786456229', '7498 Abigail Mall Suite 886\nOndrickaside, TX 55252', '2000-06-26', 1, 0, NULL, NULL, 'HgLc0JnpcM', '1987-04-09 07:40:12', '1991-07-04 02:56:47', NULL),
(2, 'Wai Yan Kyaw', 'scm.waiyankyaw@gmail.com', NULL, '$2y$10$rXY1eCxCVIw.xG4bulxwjO8FhRK.IS0gDdxo.Pgwc8yc992cyCmA6', 'e359b40702cd0ef4cbfee72d73027c00.jpg', '1', '09878767663', '330 Liam Well Apt. 716\nWest Emilie, MT 56951', '1996-08-15', 1, 0, NULL, NULL, 'XyTIBJO4TMm4h5jNtCEyPzWAl7qzleW6bKpqH7UNExyQ47qq5vfVpNUAigPw', '1987-11-17 05:47:51', '1972-04-27 05:05:48', NULL),
(3, 'Yair Win Aung', 'scm.yairwinaung@gmail.com', NULL, '$2y$10$qCSJgX2A/P9sFrdwAnJJmufVcuyxZOgJUfqqk0PD6iXn3KFjCJSvS', 'a014ce7e0a62cfb4a7cff8b9904c8894.jpg', '1', '09798765652', '729 Vern Curve\nLuellaborough, VA 37745-3097', '1984-02-25', 1, 0, NULL, NULL, '2yrFOFIYLF9gvysiksNH7ytiRNbz5FV1G6v9N3JCNNupYCG3peZrOJiIaQnr', '2017-07-25 06:11:33', '1985-02-09 07:20:51', NULL),
(4, 'Kyaw Zayar Win', 'scm.kyawzayarwin@gmail.com', NULL, '$2y$10$W.cCpL6svzdorgiLPr1YPeVAnUsaCf4fT41kb8rxOIWsxyOiwAMla', 'e8dfbff7696a6c351399228c9f1236c8.jpg', '1', '09683564776', '6534 Damaris Terrace Suite 843\nLake Marisol, VT 55979-5025', '1994-10-13', 1, 0, NULL, NULL, 'hly5KWqAc8iPG6Jvvf0ijVG1PZLy42htQQ7i5SiQWeeZNW0VTNQEVo7qSpbA', '1975-07-27 23:42:08', '1985-01-30 13:15:22', NULL),
(5, 'Ei Cho', 'scm.eicho@gmail.com', NULL, '$2y$10$0R8ui/RXoRTJ0J03DngoAe.Fdo4TZvn1cIIFEBUdDzDic9VLvvSB2', 'd4bc1585531bd773d1cfac768ea8f732.jpg', '1', '09796587112', '6625 Winfield Viaduct\nLake Mittie, WV 26788-8763', '1985-04-11', 1, 0, NULL, NULL, 'c6Zl06zxzgDcEZZfNEKhYzgW3wx3UWkNQ30DCo3UJHb37CqRrjKo1dSKjB9L', '1975-03-05 07:56:30', '1995-02-05 11:24:47', NULL),
(6, 'Ei Khaing Poe', 'scm.eikhaingpoe@gmail.com', NULL, '$2y$10$rWy7PMJGbzWI8Ly4Yy4wEeLfxCN8HVhH2j2RrGPwnqxpw95cg1rbq', '9a7486f73eeeb861b50d7e1a6c48b5d5.jpg', '1', '09697949494', '2207 Dietrich Springs\nAnthonyburgh, PA 01702-9898', '2012-09-20', 1, 0, NULL, NULL, 'mxCUY9WjB2DiStrmY309kX3Pcgn3U8jbWRgRBBVbEKUtzOLyhNrGcw0JBgrK', '1971-10-09 10:02:04', '1992-04-23 13:50:18', NULL),
(7, 'Anthony', 'kyawzayarwin1335@gmail.com', NULL, '$2y$10$.0BlznZwkuhQI7mHV7cY5.caBbJazBciB7tJuitzteLq5//z9S8e.', 'f59842ab9f20ba85eb00d268ad59a197.jpg', '1', '09586767763', '969 Cummerata Crescent Suite 513\nSouth Berneiceville, NH 26884', '1971-06-09', 1, 0, NULL, NULL, 'u8RSgj1aZA4JR2iSymqHoxxMkxuVsoj1evNktn65bJh3B53HvXDtxM7wYOr0', '2016-06-11 08:49:19', '2014-11-07 06:14:25', NULL),
(8, 'David', 'kyawzayarwin.ucst@gmail.com', NULL, '$2y$10$qNjvMFVopKbynL.e7M9Youl.xB6vVvyktBm1izJuq54xgDMt7N58m', 'dcae4697970e25cf00afbdd88aae0499.jpg', '1', '09246533214', '806 Padberg Ports Suite 718\nKossstad, VT 33433-9151', '1996-11-21', 1, 0, NULL, NULL, 'WV9lbsrNQoBd1PYAph8k4kldV0qSJeALmLHx2qBpxNpKzWbWlQHTi1kdeaCD', '2008-02-07 06:58:37', '2017-01-15 17:59:28', NULL),
(9, 'Johnny', 'oblivion.geomancer7@gmail.com', NULL, '$2y$10$9YoXfXAX2InWqz5FHqi.e.CwNOnNJW0SKo5UK5h1jjI4YSUXc89Zy', 'd388c8731f41117093ea32feeb816930.jpg', '1', '09795005610', '44526 Laury Prairie Suite 154\nNorth Rosalee, WV 83291', '2010-09-15', 1, 0, NULL, NULL, 'eGXS0iWxSHzedXVLQFRvRlL9po2QP27G4j0igzSd3hKdEXvCLMgHO6wjWLMe', '2015-05-29 05:52:00', '2009-06-22 06:28:53', NULL),
(10, 'Richard', 'oblivion.venomancer8@gmail.com', NULL, '$2y$10$Jhp.VpQuCZPsaeFTwTwNi.jV9LeQfoMAKcVSMlIuaVgmYbJZCFDZi', '09ba9134f8981d4cf6cb54716f72c59d.jpg', '1', '09689002103', '312 Reynolds Passage Suite 987\nNoemiechester, MD 11538-3572', '2011-05-12', 1, 0, NULL, NULL, '3baVtmq3oKCziRBia0jVK6eAE9ISgo0oRglorAuWwFEvOtX0gdBYfqs6ZlIp', '2019-08-14 23:19:27', '2001-10-04 13:46:08', NULL),
(11, 'Kyaw Kyaw', 'kyawkyaw@gmail.com', NULL, '$2y$10$oh2MtJs7urzb9D6FXy8r6ueVXJus67ZWOdMCyVYynbmYIefi51mKG', '9697d21232427280066ca09e10a6c667.jpg', '1', '09785599887', '40503 Breitenberg Drive\nMekhiburgh, AK 36646', '1982-01-04', 1, 0, NULL, NULL, 'ovydsRobik3h0ChlOfyteAtwNcDmM6dAm2IsD9yscEtexcTXP2ibsspnTCF3', '1992-12-07 17:11:23', '1997-10-04 03:54:52', NULL),
(12, 'Mg Mg', 'mgmg@gmail.com', NULL, '$2y$10$R8lRkbclaCe2p4kDR6nyxeYgZWcMdzV0YS/G.YQRY3Zw1FLA.9Ikq', 'ef764b5581fd610ad1515945d036c52d.jpg', '1', '09697778353', '113 Robel Bridge Apt. 059\nIsaifort, VA 72626-1924', '1999-01-19', 1, 0, NULL, NULL, '7LnnSXuoULgDb66y0kkqCAICeoJDuBS8qq8fPGFqwxytYIqd67hr3c0Si1EY', '1990-07-01 17:10:14', '1999-10-09 03:28:14', NULL),
(13, 'Su Su', 'susu@gmail.com', NULL, '$2y$10$/mxjYyo.UruAFDgNONpAROv0yJQ4etLJ1Ij0p8TnThNfMgBnwCA8W', '5608a9e14ddaac45d1b352514f24d3ed.jpg', '1', '09450787653', '354 Williamson Land Apt. 202\nEmardfurt, MN 14929', '1997-06-27', 1, 0, NULL, NULL, 'miXJPNimb4aI50c59Lqd9vPw8DF8E9f2blwO1pEPkorl9y2djj4XsWmfi0CB', '2009-03-08 20:24:38', '1983-08-17 08:26:11', NULL),
(14, 'Aye Aye', 'ayeaye@gmail.com', NULL, '$2y$10$Z/EZovpQDg4Wg19yHAskPeiHTYJF1xqjxFTyDFs6seuni6oDj.pFq', '757bdacb31a964c227e5685046fc4261.jpg', '1', '09670798798', '61604 Rau Parkways Suite 377\nLorenzoport, IN 78433', '2012-08-27', 1, 0, NULL, NULL, '0MJvCAWFdl3t3dVKd6ZIzH1MdoAmkzHsqFuGb8Dp9WkoxzT1xcpsXs9KR7Lk', '2008-08-16 14:00:09', '1992-05-03 08:23:11', NULL),
(15, 'Tun Tun', 'tuntun@gmail.com', NULL, '$2y$10$ORxAaobEvWweFHk86TdogekULMlKE4XCThVrIrEiUWtDTsAZcozsG', 'c20198b86f9eb40776151993ef381730.jpg', '1', '(728) 206-0532', '1006 Lenna Club Suite 740\nNikkoport, CO 41090', '2013-07-24', 1, 0, NULL, NULL, 'ZLYptpc2iB3EbuCvrqRMNpMvdV98QCa6IrSOYSA0fMwjZhVZCJPLHnRhPasO', '2018-12-18 09:26:10', '2015-10-10 14:17:10', NULL),
(16, 'Aung Aung', 'aungaung@gmail.com', NULL, '$2y$10$6Zky7rA.N3fOJF0P8g.tcu6QdgbQfOKx9oKH/Fcq7vLyXs3x0fH32', '08674f97dc3d2abe042f54f7d31f8b0a.jpg', '1', '724.532.6744 x697', '715 Verla Hill Suite 261\nTatyanaberg, ME 11182-4229', '2003-03-29', 1, 0, NULL, NULL, 'resOm65G9KzqKNSrlHigTM3ffnJVlPgASaJoZTFAjWWdNMXhzUlREqcDRF9u', '2008-12-02 23:48:19', '1973-08-09 18:40:59', NULL),
(17, 'Moe Moe', 'moemoe@gmail.com', NULL, '$2y$10$TwACSnRrodF4Nr/KkhBIDuOBXEXuuSkf3swnBmMMpWEqm0BDjvcgW', '2dc74891a662e954f85c4b64dc246fc9.jpg', '1', '1-335-641-6396 x7424', '47981 Eleanora Garden\nSouth Elisabeth, TX 34699', '1984-09-12', 1, 0, NULL, NULL, 'OjCzbZg6bxTpX1u8nvcsostk3CBqhOrxoPC26M3hcHs1Cm5AWZSPz0u1RkKI', '2014-04-22 17:58:35', '2001-11-15 14:03:54', NULL),
(18, 'Thandar Soe', 'thandarsoe@gmail.com', NULL, '$2y$10$ZkypT5Que1.nJNq02bqqKebE84QQQSshSN5052My3vUKL.5rSnJJm', 'f74795caee4c1b03337fdc8d94c3eab8.jpg', '1', '09787876673', '4575 Rosalee ParkwayPort Eviefurt, HI 63281-8193', '2013-04-19', 1, 0, NULL, NULL, 'GqKuWSEPhigzcugMu041M19Yb4uvwPJk6vAZfzVamNvPtjwnvQy3OcsmBLMu', '1984-08-27 02:04:00', '2020-08-21 00:08:01', NULL),
(19, 'Zaw Win Tun', 'zawwintun@gmail.com', NULL, '$2y$10$TJ0y7KeDS90vdXasTVFvSuF8x/iBGuJ1xtfV2tPda/wt5NiDBWz8K', '787410b625bb47ec3b6c413d44048055.jpg', '1', '(843) 893-5321', '97454 America Pines\nNorth Zeldabury, IA 31130', '2011-06-04', 1, 0, NULL, NULL, 'geSiO0n55DNnDdWuHYKW2dVWYAmhN2SykEdk7OkerWoiYzUHNfJlRjXYGGpa', '1975-11-28 13:24:23', '2003-10-07 07:03:48', NULL),
(20, 'Hla Hla', 'hlahla@gmail.com', NULL, '$2y$10$0h4Y/yZVRIyH5NXrfeEZPejzORlXS.nUEdZFMzuuv83B76ovus7QK', '16ef1d750ab176a9a39def0ec9f600a2.jpg', '1', '737-997-7320', '2190 Euna Harbor Apt. 871\nNew Leopoldoside, AL 49818', '1981-10-27', 1, 0, NULL, NULL, 'YTnZeZ38M5oaoc279pyltGBexuAP2PtLg0JXr5B74piTissW38ybe0wYBQz0', '1974-11-02 12:39:20', '1979-04-16 04:02:50', NULL),
(21, 'Dev Raj', 'devraj@gmail.com', NULL, '$2y$10$0wj30wMehbLk7FqRQW.eju6osh9DuGCiVTMAvtFdMLW305CUtqaXu', '7efcc9962597753a305125196f133d7f.jpg', '1', '+18127710143', '784 Belle Freeway Suite 527\nJamalmouth, WV 06538-7497', '1994-07-18', 1, 0, NULL, NULL, 'uFDEdahVWniFR2saUkqFPoTGJrN56Ua3MyXcqCQ9KrDUFhITnneXng7E1psM', '2019-10-01 22:07:57', '2008-08-08 16:53:02', NULL),
(22, 'John Smith', 'johnsmith@gmail.com', NULL, '$2y$10$cQHWB/b4x5Z/yWgcTxA8DO8NTS7VVDtokfjp61hNkSMtZ66mRJxwG', '203fff5b65942874fe7b9f3fdff7a811.jpg', '1', '389-378-4495', '93160 Wolf Manors Apt. 667\nRandybury, NE 84070', '2015-09-17', 1, 0, NULL, NULL, '4qO0ZEiTMlG3ci42aya7iTMMZ8FeyRxJCC4xmWWYvokM2mfBFMFFywKJ6b7j', '1986-08-19 07:21:14', '2003-01-04 17:03:28', NULL),
(23, 'Nick Jonas', 'nickjonas@gmail.com', NULL, '$2y$10$qu7SLTUrelygKnENBvS0weyAnagfZTb4uBng9rc3fyd9DBhqVOdLa', '46e29fe0182f9f29f4b9790ce82615e2.jpg', '1', '1-917-672-9009 x8334', '52037 Crona Ford\nPort Maud, OH 09204', '1991-11-30', 1, 0, NULL, NULL, 'lw566UXyNi15jQZShjjdu10wsIYw7K4KCYCi6nxtRV0GTxV6OvfVvz84W3i7', '1988-05-02 01:31:47', '2018-06-27 11:09:32', NULL),
(24, 'William David', 'williamdavid@gmail.com', NULL, '$2y$10$eo.kpSVMScGL8IkIaAmF7uvvo8eI9uKs.52LJCwWeKsoGyq41DxAS', '797b82030745d56e684adb8809730050.jpg', '1', '1-896-617-0749', '5827 Heathcote Ferry Suite 251\nSouth Chloe, MT 83856-7980', '2003-12-13', 1, 0, NULL, NULL, '0wqz3uNqWnkRNv3nhev4KtGcc8z3gbR9WWaW7A2ivXkeaqpBhSKOqVWEln69', '2006-04-24 20:04:51', '1984-04-17 16:53:55', NULL),
(25, 'Phone Myint Zaw', 'phonemyintzaw@gmail.com', NULL, '$2y$10$5bpU/1C6EW.aAtLvUReHdO9NoufarszfdzlccJVFG1MryZWT9IJdK', '07efdb433fab7e1739528132da6362e9.jpg', '1', '270.572.2851 x005', '358 Hessel Lodge Apt. 152\nNorth Aurelio, AZ 93049', '1976-04-27', 1, 0, NULL, NULL, '6YxiRZ1mzBbdpvzS89NgA64QsQCX1K3XpYGML2ARIVYLBRzB3NCt6hw8neVP', '1992-06-22 11:07:10', '2006-10-09 08:18:22', NULL),
(26, 'Soe Aung', 'soeaung@gmail.com', NULL, '$2y$10$Gqh9cDyjk5MsBNgOhZ4hHulYl6/xiY2yOZL6CT7w/s18fGkb/m2I6', 'b6a337b20c940a19b19c7ecaa10383df.jpg', '1', '+1 (345) 844-1172', '672 Kendall Green Apt. 346\nPort Manley, MS 92012-0658', '2017-07-07', 1, 0, NULL, NULL, 'hWI3GWDyd6ySj7in9ei58j1yhN3y3qFomcnYpKyTCom154BBssoNVjtq1H3n', '1978-03-22 11:30:30', '1985-10-24 12:22:02', NULL),
(27, 'Lwin Aung Kyaw', 'lwinaungkyaw@gmail.com', NULL, '$2y$10$cE9H0LU6tcDREjMkptgRKeaGQzpFy/F7psiRzF9WsuVYU6QKo.qnK', '51b0c4160a0ab4572acaf42e80e4a1c9.jpg', '1', '(408) 384-4869 x4705', '667 Ferry Expressway Apt. 530\nWest Kiera, AL 67154', '2002-02-25', 1, 0, NULL, NULL, 'Ti5KN3EXwrVrym5jkAClQleGI7DdJwFalDYWJENge4P6gf327hjZujJUtKWG', '1984-11-28 11:41:36', '1973-03-26 17:20:18', NULL),
(28, 'Htet Aung', 'htetaung@gmail.com', NULL, '$2y$10$m2dYf9zQRsQogj/8Mfcwl.s.HzpW9sDpXVlpGcmDmOCofhnb8e8JS', 'f0007523714c4fa532cd7d26f9d34d8a.jpg', '1', '294-649-8236 x025', '361 Cronin Stravenue\nFriesenside, WI 00964', '1974-10-14', 1, 0, NULL, NULL, 'X0QosylyoyuIwul7Vbw0nlYjrFgMmHNZE6A7hXe4GxenBnj258x5kEhMGM7u', '1989-11-03 05:26:43', '2011-07-26 15:56:50', NULL),
(29, 'Aung Khant Oo', 'aungkhantoo@gmail.com', NULL, '$2y$10$4XfcMgqsu.Rajw03RLwjBeJvbULjKqehkxsyxaQkFKptOseugSdtm', '925a670107c237dd1fcb6b466ad1ad81.jpg', '1', '224.977.1605 x5836', '793 Hartmann Mountain Suite 442\nCasimirburgh, UT 36963-7890', '2012-04-23', 1, 0, NULL, NULL, 'gPmvhwZgnagZOW01AtAvXhDZHaglusTpRaOcpjrRhpnoOVMH0vPgNScNIHVi', '1993-11-09 06:50:02', '1996-08-17 08:56:55', NULL),
(30, 'Zaw Htet Naung', 'zawhtetnaung@gmail.com', NULL, '$2y$10$DemtZeKwHcdvLcDrbFAuM.Sn4yfLV3ga0ZhmYh2KM49ZkYjlMyGm2', '97f1e8eb7c0f28b09e39d4080823a00f.jpg', '1', '723.771.5527 x416', '9494 Wayne Villages\nTillmanfort, HI 95524-6298', '1984-10-06', 1, 0, NULL, NULL, 'RbOHNpRMfwPESPPfrh05XgOMhzu9FXMQznLNphFgvf0dKEf4pgLQMo1zm7cH', '2010-11-14 21:01:19', '1979-03-03 10:39:30', NULL),
(31, 'Kyaw Min', 'kyawmin@gmail.com', NULL, '$2y$10$Z7srPIUMSW1CufV0ENk0Q.bNM4aBF21Mkcoyh495mFFr274h9JxA6', '5875edad690f30790300f93d4d904d92.jpg', '1', '920.331.4001 x613', '8174 Eldridge Loop Apt. 923\nEast Jerroldmouth, MN 54002-8163', '1990-07-03', 1, 0, NULL, NULL, 'rGMMTDl2Hs3PlUApAMGYXSe4BegC36eIiH6rS4FirxOkPtlyPkorH8XHuz63', '2018-08-26 18:57:45', '2018-09-04 18:06:14', NULL),
(32, 'Kyaw Naing', 'kyawnaing@gmail.com', NULL, '$2y$10$ERcTAWX3hKgd2UFTAHEptOfUX6i4Cs9T8pJ3ej6E2Pn6W2PvzfxTq', '02653edda86c6563520c1ba9cf95ae16.jpg', '1', '463.310.5912', '67351 Earnest Orchard\nPort Faye, UT 53101-1716', '1992-07-17', 1, 0, NULL, NULL, 'FwY3q51PdH03DCy0c8hm72pZd0vL3ZpARsa8NvSFmirHRTKW7lihMB5DJe4I', '1985-05-18 03:00:54', '1971-05-09 06:00:21', NULL),
(33, 'Kyaw Soe', 'kyawsoe@gmail.com', NULL, '$2y$10$OkKC1hFCjk/5qX35sn.1cuWdCwmXkGSv4SmiihWr12QlbLAxfUMli', '49d0c27864fb5c501bbc7d31e5805e91.jpg', '1', '543-623-6582 x3497', '8285 Harmon Fords\nFriesenland, DE 36580-0140', '2002-10-19', 1, 0, NULL, NULL, 'DwTOjNAXXRx63e0lbmtjcSe5YSNMOtDgJfXrbb1DF1xRCrFRKPxDfH09E5Oa', '1977-12-13 19:14:22', '1990-05-08 16:47:50', NULL),
(34, 'Htet Wai Linn', 'htetwailin@gmail.com', NULL, '$2y$10$K2dKUNQ8bsceV5Bv3U16KOjSbCNZ.SaTdJ5OUrnH77LMg8Uc.EKTG', '751dcc8800fc2d799cb96467f79ca323.jpg', '1', '249.374.7403 x0968', '63751 Doug Parkways\nOdastad, NC 16291', '1973-06-02', 1, 0, NULL, NULL, 'ebVkRWGE8EBltpwDIDio0j0WKwhyumqsLnbd2CazHavRyEimCLsuguPstQwP', '1985-05-28 19:36:43', '2016-04-11 05:21:20', NULL),
(35, 'Ye Win Kyaw', 'yewinkyaw@gmail.com', NULL, '$2y$10$l4Xv/5T7RDzLkkqJSECj8O498AnLnn.lgp6r5ws2NmIYr7/Pb2mHW', '60ad5a0dda1d771edb0faa25ef43f305.jpg', '1', '+1-457-299-8455', '97251 Moore Shoal Suite 261\nRosabury, KS 72044', '2017-02-08', 1, 0, NULL, NULL, 'tqZhhC2WhMewpw2zT7ZEJnp7XLC5WAc3iEwj9GO6kqes8Ni0ksoVlPCGWfwK', '1977-11-30 04:48:50', '1983-06-29 10:40:10', NULL),
(36, 'Ye Lwin Tun', 'yelwintun@gmail.com', NULL, '$2y$10$9lXHzMk95h2wLVPIP1D.MeFgLPMYIQBt9BBKQn/GqZhbkkUvZtB4i', '41b6ccc6292d61d463b3370aa87aa762.jpg', '1', '+1 (431) 987-3925', '826 Bella Turnpike\nWest Brielle, KS 45548', '2003-10-16', 1, 0, NULL, NULL, 'XfTXICDYp3', '1982-11-04 06:16:37', '2013-02-24 22:59:44', NULL),
(37, 'Aung Pain Ko', 'aungpaingko@gmail.com', NULL, '$2y$10$KzO4YWFOzp.8KXZSZ03VHuNPDbGcFrmdz9hnZaWw6Vp3419JtYcVS', '22ad8e7306d839c8f8af15ad1713d72a.jpg', '1', '538.312.9904', '49516 Swift Dam Apt. 492\nDareborough, AL 48770-4076', '2000-08-07', 1, 0, NULL, NULL, 'z1rup3Fpth', '2012-09-21 09:48:16', '2015-06-24 12:36:09', NULL),
(38, 'Paing Htet Oo', 'painghtetoo@gmail.com', NULL, '$2y$10$UWpjhCs4UjKCZgYRsikIIOepCIYrglV9vUhDurlK4gdLbVdLcxMg.', '34da9f5283034733b8376fc554c0e3ed.jpg', '1', '+1-949-700-9143', '45375 Marisol Alley Apt. 257\nAleneview, SC 66388', '2019-05-23', 1, 0, NULL, NULL, 'GJ7WfwiLme', '1983-06-18 20:42:40', '1982-01-16 13:55:57', NULL),
(39, 'Zaw Min', 'zawmin@gmail.com', NULL, '$2y$10$6EWiF4sEC1CYcXOSMBfmxeeQvq/s3VwCmkC0lUA6ZpcsisoUH5lRG', 'f873cdc5985be1a62a613d9af90848f6.jpg', '1', '1-357-418-4207', '45011 Rippin Viaduct Apt. 764\nNorth Carriebury, NY 58898', '2002-12-22', 1, 0, NULL, NULL, 'fISdCJ9iuR', '1986-12-24 05:52:23', '2010-05-24 06:18:13', NULL),
(40, 'Htet Htet Aye', 'htethtetaye@gmail.com', NULL, '$2y$10$OZAN.udBh4VZYbuy4dI6b.E1mV/Vd9I0JuVZLVaCZhRgaunC4lE2m', '26624fe3bf76aee5176e4ff578b237a9.jpg', '1', '209-797-7593', '33622 Karina Cape\nEast Mylesbury, NY 20979-2765', '2003-06-17', 1, 0, NULL, NULL, '8pX4zoXXZ7', '1983-09-13 17:36:34', '2019-02-24 22:06:13', NULL),
(41, 'Madie Thompson', 'reinger.mertie@example.net', NULL, '$2y$10$5UdxrnWonUgdZrNil4nnEuMl70TTytcBRP9Pv1usGsdNrJRwHRiYi', 'd34cbdd8d97e85d09e62d6b108c42130.jpg', '1', '443.217.0414 x76447', '982 Magdalena Point Suite 529\nOmertown, OK 50165', '2004-10-03', 1, 0, NULL, NULL, 'pXLYuXFKMv', '1983-03-01 05:26:44', '2019-10-05 10:58:42', NULL),
(42, 'Dr. Cameron Feest V', 'titus.schaefer@example.org', NULL, '$2y$10$g1Jy9NXvJ3LfCn13Jzz/wu7k1ZlvDPPOgN5aV6N2SNjChNHGMxcR.', '68dc2075e28deddc2b31238f2e113608.jpg', '1', '1-698-345-3844 x4506', '8331 Rowe Lights Suite 473\nJoycestad, NY 34484', '1991-05-14', 1, 0, NULL, NULL, 'iXPDndMZGe', '1999-05-21 06:13:38', '1994-12-05 20:22:53', NULL),
(43, 'Mrs. Angeline Turner', 'lori.ernser@example.com', NULL, '$2y$10$CnT9B1HmP2EgXJS.RSrlyeaq1uIBtc1fPXio/DImhjotr7LJqH8zi', '227ef68ade44035b2d294961e20e3e6d.jpg', '1', '681-521-2912 x38355', '77902 Barrows Trail Suite 788\nEast Willie, TN 82382', '1979-01-31', 1, 0, NULL, NULL, 'd9dALi2Y90', '2017-07-11 01:30:52', '2003-03-26 13:20:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1177;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
