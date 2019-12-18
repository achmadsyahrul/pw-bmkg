-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 10:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmkg`
--

-- --------------------------------------------------------

--
-- Table structure for table `gempa`
--

CREATE TABLE `gempa` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `dep` int(11) DEFAULT NULL,
  `mag` float DEFAULT NULL,
  `mountain` char(3) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'uploads/no-pic.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gempa`
--

INSERT INTO `gempa` (`id`, `tanggal`, `waktu`, `lat`, `lon`, `dep`, `mag`, `mountain`, `region`, `foto`) VALUES
(1, '2019-10-31', '21:43:55', -2.41, 138.47, 10, 3.9, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(2, '2019-10-31', '20:40:54', -3.59, 128.37, 10, 3.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(3, '2019-10-31', '20:33:03', -3.38, 128.37, 10, 3, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(4, '2019-10-31', '19:51:00', -2.44, 138.37, 14, 3.4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(5, '2019-10-31', '19:41:58', 1.26, 125.66, 116, 3.3, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(6, '2019-10-30', '19:04:19', -3.39, 128.41, 10, 2.1, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(7, '2019-10-30', '18:53:08', -2.87, 127.16, 11, 3.6, 'No', 'Ceram Sea', 'uploads/no-pic.jpg'),
(8, '2019-10-30', '18:46:06', -2.98, 139.68, 34, 2.8, 'No', 'Near North Coast of Irian Jaya', 'uploads/no-pic.jpg'),
(9, '2019-10-30', '18:23:18', -3.39, 128.38, 10, 2.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(10, '2019-10-30', '18:16:18', -3.59, 128.23, 10, 2.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(11, '2019-10-29', '17:55:57', -1.89, 139.27, 11, 3.3, 'No', 'Near North Coast Of Irian Jaya', 'uploads/no-pic.jpg'),
(12, '2019-10-29', '17:10:44', -7.12, 106.26, 60, 2.5, 'No', 'Java, Indonesia', 'uploads/no-pic.jpg'),
(13, '2019-10-29', '16:39:25', -3.95, 125.57, 33, 3.7, 'No', 'Talaud Islands, Indonesia', 'uploads/no-pic.jpg'),
(14, '2019-10-29', '16:24:42', -3.55, 128.32, 10, 2.2, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(15, '2019-10-29', '16:17:19', -3.56, 128.31, 10, 2.7, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(16, '2019-10-28', '16:06:36', -3.58, 128.33, 10, 1.7, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(17, '2019-10-28', '16:04:21', -2.37, 138.48, 16, 4.1, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(18, '2019-10-28', '15:58:36', -2.5, 138.16, 10, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(19, '2019-10-28', '15:54:33', -2.86, 129.34, 10, 3.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(20, '2019-10-28', '15:50:19', -2.44, 138.55, 18, 3.4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(21, '2019-10-27', '15:44:46', 2.88, 126.06, 10, 3.4, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(22, '2019-10-27', '15:43:36', -3.59, 128.38, 10, 1.7, 'No', 'Seram, Indoensia', 'uploads/no-pic.jpg'),
(23, '2019-10-27', '15:41:50', -2.51, 138.46, 10, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(24, '2019-10-27', '15:04:02', -2.47, 138.49, 10, 3.4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(25, '2019-10-27', '14:44:19', -10.53, 118.9, 10, 3.1, 'No', 'South of Sumbawa, Indonesia', 'uploads/no-pic.jpg'),
(26, '2019-10-26', '14:36:07', -2.51, 138.44, 10, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(27, '2019-10-26', '14:32:17', 2.52, 128.82, 10, 3.8, 'No', 'Halmahera, Indonesia', 'uploads/no-pic.jpg'),
(28, '2019-10-26', '14:20:50', -2.3, 138.53, 32, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(29, '2019-10-26', '14:19:28', -1.86, 120.16, 10, 3.1, 'No', 'Sulawesi, Indonesia', 'uploads/no-pic.jpg'),
(30, '2019-10-26', '14:03:27', -3.58, 128.25, 10, 2.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(31, '2019-10-25', '13:59:32', -2.46, 138.43, 10, 3.8, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(32, '2019-10-25', '13:12:17', -2.5, 138.53, 10, 4.2, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(33, '2019-10-25', '12:53:26', 0.46, 121.01, 72, 4.2, 'No', 'Minahassa Peninsula, Sulawesi', 'uploads/no-pic.jpg'),
(34, '2019-10-25', '11:50:44', 2.36, 126.79, 28, 3.3, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(35, '2019-10-25', '11:42:51', -9.42, 112.97, 10, 4.2, 'No', 'South of Java, Indonesia', 'uploads/no-pic.jpg'),
(36, '2019-10-24', '11:34:41', 2.51, 128.84, 10, 4.2, 'No', 'Halmahera, Indonesia', 'uploads/no-pic.jpg'),
(37, '2019-10-24', '11:25:38', -6.08, 133.74, 80, 4.4, 'No', 'Aru Islands Region, Indonesia', 'uploads/no-pic.jpg'),
(38, '2019-10-24', '10:56:05', -2.44, 138.49, 10, 3.8, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(39, '2019-10-24', '10:36:21', -2.42, 138.47, 17, 4.6, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(40, '2019-10-24', '08:26:25', -3.4, 128.38, 10, 3.2, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(41, '2019-10-23', '08:21:41', -3.4, 128.35, 10, 2.5, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(42, '2019-10-23', '07:13:26', -2.2, 138.41, 26, 4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(43, '2019-10-23', '07:07:54', -2.41, 138.44, 15, 4.2, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(44, '2019-10-23', '07:06:47', -8.84, 118.16, 95, 2.5, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(45, '2019-10-23', '06:55:30', -2.28, 138.44, 19, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(46, '2019-10-22', '06:47:41', -2.52, 138.48, 10, 3.6, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(47, '2019-10-22', '06:40:19', -2.35, 138.46, 10, 3.9, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(48, '2019-10-22', '05:56:42', -2.27, 138.37, 13, 4.7, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(49, '2019-10-22', '05:50:21', -3.56, 128.26, 10, 2.3, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(50, '2019-10-22', '05:44:20', -4.28, 127.63, 143, 4.1, 'No', 'Talaud Islands, Indonesia', 'uploads/no-pic.jpg'),
(51, '2019-10-21', '05:35:12', -2.35, 138.42, 21, 3.9, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(52, '2019-10-21', '04:26:51', -2.35, 138.35, 10, 4.2, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(53, '2019-10-21', '03:50:45', -2.63, 138.41, 10, 5.2, 'Yes', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(54, '2019-10-21', '03:33:37', -2.36, 138.45, 22, 4.6, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(55, '2019-10-21', '02:56:48', -3.56, 128.23, 10, 3.1, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(56, '2019-10-20', '02:56:14', -3.41, 128.38, 10, 3.3, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(57, '2019-10-20', '02:09:11', -9.88, 120.03, 23, 3.6, 'No', 'Sumba Region, Indonesia', 'uploads/no-pic.jpg'),
(58, '2019-10-20', '01:31:00', -3.59, 128.36, 10, 2.4, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(59, '2019-10-20', '01:10:29', 2.56, 128.83, 10, 3.8, 'No', 'Halmahera, Indonesia', 'uploads/no-pic.jpg'),
(60, '2019-10-20', '01:29:03', -2.26, 138.35, 15, 4.1, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(61, '2019-10-19', '22:54:03', -2.57, 138.45, 10, 5.1, 'Yes', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(62, '2019-10-19', '22:31:09', -2.5, 138.43, 10, 4.3, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(63, '2019-10-19', '22:11:08', -2.49, 99.71, 32, 5.2, 'Yes', 'Southern Sumatra, Indonesia', 'uploads/no-pic.jpg'),
(64, '2019-10-19', '22:04:02', -2.33, 138.51, 17, 4.4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(65, '2019-10-19', '21:42:00', -2.35, 138.42, 34, 5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(66, '2019-10-18', '21:26:03', -2.31, 138.47, 14, 3.1, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(67, '2019-10-18', '21:17:03', -2.48, 138.51, 10, 4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(68, '2019-10-18', '21:08:31', -2.35, 138.45, 10, 3, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(69, '2019-10-18', '21:06:40', -1.46, 138.86, 10, 3.2, 'No', 'Near North Coast of Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(70, '2019-10-18', '20:50:19', -2.44, 138.37, 10, 4.2, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(71, '2019-10-17', '20:39:48', -1.57, 138.68, 10, 3.4, 'No', 'Near North Coast of Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(72, '2019-10-17', '20:35:33', -2.4, 138.47, 10, 3.3, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(73, '2019-10-17', '20:30:20', -2.44, 138.39, 10, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(74, '2019-10-17', '20:25:34', -3.56, 128.34, 10, 2.3, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(75, '2019-10-17', '20:09:17', -2.4, 138.44, 10, 3.7, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(76, '2019-10-16', '20:06:58', -2.36, 138.43, 17, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(77, '2019-10-16', '20:03:04', -2.43, 138.38, 14, 3.3, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(78, '2019-10-16', '19:56:54', -2.63, 138.4, 14, 3.3, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(79, '2019-10-16', '19:53:45', -2.39, 138.44, 23, 3.9, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(80, '2019-10-16', '19:52:34', -2.52, 138.36, 10, 3.8, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(81, '2019-10-15', '19:50:03', -3.57, 128.23, 10, 3.2, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(82, '2019-10-15', '19:48:22', -2.58, 138.51, 10, 3.6, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(83, '2019-10-15', '19:42:09', -2.38, 138.51, 10, 3.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(84, '2019-10-15', '19:24:26', -2.61, 138.39, 10, 5.2, 'Yes', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(85, '2019-10-15', '19:15:31', -2.52, 138.52, 10, 5.5, 'Yes', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(86, '2019-10-14', '18:22:53', -8.99, 117.72, 92, 3.8, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(87, '2019-10-14', '18:13:51', -9.59, 118.27, 48, 4.5, 'Yes', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(88, '2019-10-14', '12:38:45', -10.69, 117.48, 48, 4, 'No', 'South of Sumbawa, Indonesia', 'uploads/no-pic.jpg'),
(89, '2019-10-14', '12:06:04', -8.82, 113.25, 117, 3.2, 'No', 'Java, Indonesia', 'uploads/no-pic.jpg'),
(90, '2019-10-14', '11:13:58', -9.5, 118.79, 172, 3.1, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(91, '2019-10-13', '11:03:55', -0.82, 128.15, 14, 4, 'No', 'Halmahera, Indonesia', 'uploads/no-pic.jpg'),
(92, '2019-10-13', '10:29:55', -6.49, 130.19, 108, 4.7, 'No', 'Banda Sea', 'uploads/no-pic.jpg'),
(93, '2019-10-13', '09:57:36', -6.41, 129.87, 29, 4.3, 'No', 'Banda Sea', 'uploads/no-pic.jpg'),
(94, '2019-10-13', '08:24:41', -2.44, 99.84, 27, 3.6, 'No', 'Southern Sumatra, Indonesia', 'uploads/no-pic.jpg'),
(95, '2019-10-13', '07:20:12', -0.28, 124.88, 51, 3.9, 'No', 'Southern Molucca Sea', 'uploads/no-pic.jpg'),
(96, '2019-10-12', '06:45:24', -3.59, 128.24, 10, 3.3, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(97, '2019-10-12', '06:20:04', -3.6, 128.25, 10, 2.9, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(98, '2019-10-12', '05:54:00', -3.6, 114.3, 91, 3.3, 'No', 'Bali Region, Indonesia', 'uploads/no-pic.jpg'),
(99, '2019-10-12', '03:04:40', -2.29, 139.62, 16, 3.8, 'No', 'Near North Coast of Irian Jaya', 'uploads/no-pic.jpg'),
(100, '2019-10-12', '01:35:06', 0.63, 122.63, 36, 3.8, 'No', 'Minahassa Peninsula, Sulawesi', 'uploads/no-pic.jpg'),
(101, '2019-10-11', '00:56:56', 2.32, 138.67, 21, 4.1, 'No', 'Irian Jaya Region, Indoenesia', 'uploads/no-pic.jpg'),
(102, '2019-10-11', '00:15:21', 0.97, 138.25, 12, 3.3, 'No', 'Irian Jaya Region, Indoenesia', 'uploads/no-pic.jpg'),
(103, '2019-10-11', '00:03:56', 2.48, 99.67, 30, 4.9, 'No', 'Southern Sumatra, Indoenesia', 'uploads/no-pic.jpg'),
(104, '2019-10-11', '00:00:10', -8.33, 117.14, 10, 3.8, 'No', 'Sumbawa Region, Indoenesia', 'uploads/no-pic.jpg'),
(105, '2019-10-11', '00:00:05', 2.4, 99.81, 15, 5.4, 'Yes', 'Southern Sumatra, Indoenesia', 'uploads/no-pic.jpg'),
(106, '2019-10-10', '21:50:19', 1.57, 125.47, 10, 3.6, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(107, '2019-10-10', '20:59:31', -10.14, 124.33, 37, 3.4, 'No', 'Timor Region', 'uploads/no-pic.jpg'),
(108, '2019-10-10', '18:50:51', -9.36, 120.13, 34, 3.3, 'No', 'Sumba Region,Indonesia', 'uploads/no-pic.jpg'),
(109, '2019-10-10', '18:35:11', -10.26, 120.08, 12, 3, 'No', 'Sumba Region,Indonesia', 'uploads/no-pic.jpg'),
(110, '2019-10-10', '18:29:53', 4.29, 126.67, 18, 3.4, 'No', 'Talaud Islnads,Indonesia', 'uploads/no-pic.jpg'),
(111, '2019-10-09', '18:26:28', -3.59, 128.35, 10, 2.4, 'No', 'Seram,Indonesia', 'uploads/no-pic.jpg'),
(112, '2019-10-09', '17:56:24', -0.69, 121.6, 10, 3.9, 'No', 'Minahassa Peninsula, Sulawesi', 'uploads/no-pic.jpg'),
(113, '2019-10-09', '17:51:19', 2.42, 126.71, 13, 3.7, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(114, '2019-10-09', '16:08:56', -9.35, 119.16, 32, 2.9, 'No', 'Sumba Region, Indonesia', 'uploads/no-pic.jpg'),
(115, '2019-10-09', '16:05:49', 4.21, 126.67, 27, 3.4, 'No', 'Talaud Islands, Indonesia', 'uploads/no-pic.jpg'),
(116, '2019-10-08', '15:46:58', -9.06, 123.92, 102, 3.1, 'No', 'Timor Region', 'uploads/no-pic.jpg'),
(117, '2019-10-08', '15:37:31', -9, 128.68, 42, 4.5, 'No', 'Timor Sea', 'uploads/no-pic.jpg'),
(118, '2019-10-08', '14:24:56', -3.09, 135.82, 12, 4.4, 'No', 'Irian Jaya Region, Indonesia', 'uploads/no-pic.jpg'),
(119, '2019-10-08', '11:27:37', 4.23, 126.66, 27, 2.9, 'No', 'Talauds Islands, Indonesia', 'uploads/no-pic.jpg'),
(120, '2019-10-08', '11:18:04', 4.15, 126.66, 23, 4, 'No', 'Talauds Islands, Indonesia', 'uploads/no-pic.jpg'),
(121, '2019-10-07', '11:17:30', -2.72, 130.1, 10, 3.2, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(122, '2019-10-07', '07:43:58', 3.82, 126.71, 32, 3.1, 'No', 'Talauds Islands, Indonesia', 'uploads/no-pic.jpg'),
(123, '2019-10-07', '07:08:32', -3.54, 128.3, 10, 2.6, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(124, '2019-10-07', '07:01:11', 1.32, 120.83, 16, 3.1, 'No', 'Minahassa Peninsula, Sulawesi', 'uploads/no-pic.jpg'),
(125, '2019-10-07', '06:05:10', 3.25, 128.34, 19, 2.5, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(126, '2019-10-06', '05:09:03', -9.29, 117.85, 26, 2.4, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(127, '2019-10-06', '02:23:14', 1.4, 126.56, 29, 4.5, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(128, '2019-10-06', '00:34:09', -9.45, 116.56, 55, 3.4, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(129, '2019-10-06', '00:29:50', -8.46, 118.03, 44, 2.4, 'No', 'Sumbawa Region, Indonesia', 'uploads/no-pic.jpg'),
(130, '2019-10-06', '00:27:04', -7.79, 117.23, 11, 4.3, 'No', 'Bali Sea', 'uploads/no-pic.jpg'),
(131, '2019-10-05', '23:05:33', -2.84, 140.03, 10, 2.5, 'No', 'Near North Coast of Irian Jaya', 'uploads/no-pic.jpg'),
(132, '2019-10-05', '22:50:12', -3.57, 128.37, 10, 2.5, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(133, '2019-10-05', '21:49:14', -9.72, 112.12, 19, 4, 'No', 'South of Java, Indonesia', 'uploads/no-pic.jpg'),
(134, '2019-10-05', '21:39:20', -0.78, 99.94, 29, 2.5, 'No', 'Southern Sumatra, Indonesia', 'uploads/no-pic.jpg'),
(135, '2019-10-05', '21:01:01', -2.51, 138.45, 10, 4.5, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(136, '2019-10-04', '20:24:52', -2.45, 138.48, 10, 3.8, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(137, '2019-10-04', '20:08:14', -3.4, 128.25, 10, 2.1, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(138, '2019-10-04', '19:56:37', 1.41, 99.32, 10, 2.9, 'No', 'Northern Sumatra, Indonesia', 'uploads/no-pic.jpg'),
(139, '2019-10-04', '19:53:22', -2.89, 130.46, 10, 3.5, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(140, '2019-10-04', '19:39:03', -5.89, 130.77, 168, 4.2, 'No', 'Banda Sea', 'uploads/no-pic.jpg'),
(141, '2019-10-03', '19:32:56', -10.24, 118.93, 10, 3.4, 'No', 'South of Sumbawa, Indonesia', 'uploads/no-pic.jpg'),
(142, '2019-10-03', '17:58:51', -2.47, 138.47, 13, 4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(143, '2019-10-03', '15:47:56', 0.54, 126.12, 10, 3.5, 'No', 'Northern Molucca Sea', 'uploads/no-pic.jpg'),
(144, '2019-10-03', '15:46:57', -2.32, 139.38, 73, 2.5, 'No', 'Near North Coast of Irian Jaya', 'uploads/no-pic.jpg'),
(145, '2019-10-03', '14:04:55', -0.58, 131.52, 10, 4.1, 'No', 'Irian Jaya Region, Indonesia', 'uploads/no-pic.jpg'),
(146, '2019-10-02', '13:23:50', -0.99, 131.1, 23, 3, 'No', 'Irian Jaya Region, Indonesia', 'uploads/no-pic.jpg'),
(147, '2019-10-02', '12:45:23', -2.34, 138.5, 26, 4.4, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(148, '2019-10-02', '11:49:07', -2.52, 138.47, 10, 4.6, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(149, '2019-10-02', '08:30:52', -3.95, 122.66, 10, 3.1, 'No', 'Sulawesi, Indonesia', 'uploads/no-pic.jpg'),
(150, '2019-10-02', '08:30:27', -8.53, 110.86, 47, 2.9, 'No', 'Java, Indonesia', 'uploads/no-pic.jpg'),
(151, '2019-10-01', '07:26:48', -7.67, 106.68, 12, 3.1, 'No', 'Java, Indonesia', 'uploads/no-pic.jpg'),
(152, '2019-10-01', '06:57:45', -9.67, 112.76, 44, 5, 'No', 'South of Java, Indonesia', 'uploads/no-pic.jpg'),
(153, '2019-10-01', '05:59:10', 2.54, 128.88, 10, 4.2, 'No', 'Halmahera, Indonesia', 'uploads/no-pic.jpg'),
(154, '2019-10-01', '05:33:26', -3.4, 138.53, 18, 3.9, 'No', 'Irian Jaya, Indonesia', 'uploads/no-pic.jpg'),
(155, '2019-10-01', '05:21:00', -3.58, 128.34, 10, 2.5, 'No', 'Seram, Indonesia', 'uploads/no-pic.jpg'),
(156, '2019-11-24', '21:48:04', -0.17, 124.38, 10, 5.2, 'No', 'Sulawesi Utara, Indonesia', 'uploads/0e3dc908b2f0c4d5be413ce163c8b28f_1.jpg'),
(157, '2019-11-25', '20:25:16', -2.51, 121.14, 10, 3.5, 'No', 'Sulawesi Selatan, Indonesia', 'uploads/5e40df176e44da9cb1131611b55fd592_skeyt-kosmos-luna-mesyac.jpg'),
(158, '2019-11-28', '11:17:57', -2.82, 122.09, 10, 3.9, 'No', 'Sulawesi Tengah, Indonesia', 'uploads/no-pic.jpg'),
(159, '2019-11-28', '12:32:04', 1.44, 126.38, 10, 4.5, 'No', 'Maluku Utara, Indonesia', 'uploads/no-pic.jpg'),
(160, '2019-11-14', '23:17:41', 1.67, 126.39, 73, 7.1, 'No', 'Maluku Utara, Indonesia', 'uploads/8bcd77e500f708550b4130f4aa96ead9_5.jpg'),
(161, '2019-11-29', '13:29:13', -9.89, 100.89, 17, 6.9, 'No', 'Sulawesi', 'uploads/no-pic.jpg'),
(162, '2008-12-01', '01:01:01', -11, 95, 10, 6, 'Yes', 'China', 'uploads/no-pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'photos/default.jpg',
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `foto`, `username`, `password`, `level`) VALUES
(1, 'Achmad Syahrul', 'photos/f2e58b76187b5e67583d35604a8cb6ae_crop.jpg', 'admin15', '3cc941e82ee8cbacc1c6be5ddca7dd49', 'admin'),
(2, 'Maudy Ayunda', 'photos/default.jpg', 'maudy', '87b34e30ab68eddb4bc9ee65da7fe23a', 'user'),
(3, 'domi', 'photos/default.jpg', 'domi', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(4, 'Samuelson', 'photos/default.jpg', 'samuelson', 'b503de445d4ff6cfbeaa5a1c7f1c5ac0', 'admin'),
(5, 'andra', 'photos/default.jpg', 'andra', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(6, 'coba', 'photos/default.jpg', 'coba', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(7, 'arul', 'photos/default.jpg', 'arul', 'e10adc3949ba59abbe56e057f20f883e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gempa`
--
ALTER TABLE `gempa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gempa`
--
ALTER TABLE `gempa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
