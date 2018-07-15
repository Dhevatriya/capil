-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 05:18 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disdukcapil`
--

-- --------------------------------------------------------

--
-- Table structure for table `desakelurahan`
--

CREATE TABLE `desakelurahan` (
  `id_desakelurahan` int(11) NOT NULL,
  `id_kecamatanFK` int(11) NOT NULL,
  `nama_desakelurahan` varchar(20) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desakelurahan`
--

INSERT INTO `desakelurahan` (`id_desakelurahan`, `id_kecamatanFK`, `nama_desakelurahan`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 1, 'Baturan', '2018-04-24 15:19:03', '2018-07-14 19:25:51', '0'),
(2, 1, 'Klodran', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(3, 1, 'Gedongan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(4, 1, 'Tohudan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(5, 1, 'Blulukan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(6, 1, 'Gawanan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(7, 1, 'Gajahan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(8, 1, 'Paulan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(9, 1, 'Malangjiwan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(10, 1, 'Bolon', '2018-04-24 15:19:03', '2018-07-05 00:58:18', '0'),
(11, 1, 'Ngasem', '2018-04-24 15:19:03', '2018-07-05 00:35:31', '0'),
(12, 2, 'Plesungan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(13, 2, 'Bulurejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(14, 2, 'Dayu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(15, 2, 'Jatikuwung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(16, 2, 'Jeruksawit', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(17, 2, 'Karangturi', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(18, 2, 'Kragan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(19, 2, 'Krendowahono', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(20, 2, 'Rejosari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(21, 2, 'Selokaton', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(22, 2, 'Tuban', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(23, 2, 'Wonorejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(24, 2, 'Wonosari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(25, 3, 'Brujul', '2018-04-24 15:19:03', '2018-07-05 00:45:59', '0'),
(26, 3, 'Dagen', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(27, 3, 'Jaten', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(28, 3, 'Jati', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(29, 3, 'Jetis', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(30, 3, 'Ngingo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(31, 3, 'Sroyo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(32, 3, 'Suruhkalang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(33, 4, 'Jatiharo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(34, 4, 'Jatikuwung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(35, 4, 'Jatimulyo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(36, 4, 'Jatipuro', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(37, 4, 'Jatipurwo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(38, 4, 'Jatiroyo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(39, 4, 'Jatisobo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(40, 4, 'Jatisuko', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(41, 4, 'Jatiwarno', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(42, 4, 'Ngepungsari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(43, 5, 'Beruk', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(44, 5, 'Jatisawit', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(45, 5, 'Jatiyoso', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(46, 5, 'Karangsari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(47, 5, 'Petung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(48, 5, 'Tlobo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(49, 5, 'Wonokeling', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(50, 5, 'Wonorejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(51, 5, 'Wukirsawit', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(52, 6, 'Anggrasmanis', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(53, 6, 'Balong', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(54, 6, 'Gumeng', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(55, 6, 'Jenawi', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(56, 6, 'Lempong', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(57, 6, 'Menjing', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(58, 6, 'Seloromo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(59, 6, 'Sidomukti', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(60, 6, 'Trenggguli', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(61, 7, 'Blorong', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(62, 7, 'Gemantar', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(63, 7, 'Genengan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(64, 7, 'Kebak', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(65, 7, 'Ngunut', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(66, 7, 'Sambirejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(67, 7, 'Sedayu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(68, 7, 'Sringin', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(69, 7, 'Sukosari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(70, 7, 'Tugu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(71, 7, 'Tunggulrejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(72, 8, 'Kadipiro', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(73, 8, 'Bakalan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(74, 8, 'Giriwondo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(75, 8, 'Jatirejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(76, 8, 'Jumantoro', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(77, 8, 'Jumapolo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(78, 8, 'Karangbangun', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(79, 8, 'Kedawung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(80, 8, 'Kwangsan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(81, 8, 'Lemahbang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(82, 8, 'Paseban', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(83, 8, 'Ploso', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(84, 9, 'Karanganyar', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(85, 9, 'Cangakan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(86, 9, 'Jungke', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(87, 9, 'Tegalgede', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(88, 9, 'Popongan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(89, 9, 'Bejen', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(90, 9, 'Bolong', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(91, 9, 'Delingan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(92, 9, 'Gayamdompo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(93, 9, 'Gedong', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(94, 9, 'Jantiharjo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(95, 9, 'Lalung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(96, 10, 'Harjosari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(97, 10, 'Bangsri', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(98, 10, 'Dayu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(99, 10, 'Doplang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(100, 10, 'Gerdu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(101, 10, 'Gondangmanis', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(102, 10, 'Karang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(103, 10, 'Karang Pandan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(104, 10, 'Ngemlak', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(105, 10, 'Salam', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(106, 10, 'Tohkuning', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(107, 11, 'Alastuwo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(108, 11, 'Banjarharjo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(109, 11, 'Kaliwuluh', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(110, 11, 'Kebak', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(111, 11, 'Kemiri', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(112, 11, 'Macanan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(113, 11, 'Malanggaten', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(114, 11, 'Nangsri', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(115, 11, 'Pulosari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(116, 11, 'Waru', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(117, 12, 'Karangrejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(118, 12, 'Botok', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(119, 12, 'Ganten', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(120, 12, 'Gempolan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(121, 12, 'Kuto', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(122, 12, 'Kwadungan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(123, 12, 'Plosorejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(124, 12, 'Sumberejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(125, 12, 'Tamansari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(126, 12, 'Tawangsari', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(127, 13, 'Dawung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(128, 13, 'Gantiwarno', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(129, 13, 'Girilayu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(130, 13, 'Karangbangun', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(131, 13, 'Koripan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(132, 13, 'Matesih', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(133, 13, 'Ngadiluwih', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(134, 13, 'Pablengan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(135, 13, 'Plosorejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(136, 14, 'Munggur', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(137, 14, 'Buntar', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(138, 14, 'Gebyok', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(139, 14, 'Gentungan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(140, 14, 'Kaliboto', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(141, 14, 'Kedungjeruk', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(142, 14, 'Mojogedang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(143, 14, 'Mojoroto', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(144, 14, 'Ngadirejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(145, 14, 'Pendem', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(146, 14, 'Pereng', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(147, 14, 'Pojok', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(148, 14, 'Sewurejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(149, 15, 'Dukuh', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(150, 15, 'Berjo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(151, 15, 'Girimulyo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(152, 15, 'Jatirejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(153, 15, 'Kemuning', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(154, 15, 'Ngargoyoso', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(155, 15, 'Nglegok', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(156, 15, 'Puntukrejo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(157, 15, 'Segorogunung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(158, 16, 'Ngijo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(159, 16, 'Buran', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(160, 16, 'Gaum', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(161, 16, 'Kalijirak', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(162, 16, 'Kaling', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(163, 16, 'Karangmojo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(164, 16, 'Pandeyan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(165, 16, 'Papahan', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(166, 16, 'Suruh', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(167, 16, 'Wonolopo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(168, 17, 'Bandardawung', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(169, 17, 'Blumbang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(170, 17, 'Gondosuli', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(171, 17, 'Kalisoro', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(172, 17, 'Karanglo', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(173, 17, 'Nglebak', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(174, 17, 'Plumbon', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(175, 17, 'Sepanjang', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(176, 17, 'Tawangmangu', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(177, 17, 'Tengklik', '2018-04-24 15:19:03', '0000-00-00 00:00:00', '0'),
(178, 1, 'Wonorejo', '2018-07-12 00:08:42', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_syarat`
--

CREATE TABLE `detail_syarat` (
  `id_detail_syarat` int(11) NOT NULL,
  `id_pendaftaranFK` int(11) NOT NULL,
  `id_syaratFK` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_unggah` enum('Belum Diunggah','Sudah Diunggah','','') NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_syarat`
--

INSERT INTO `detail_syarat` (`id_detail_syarat`, `id_pendaftaranFK`, `id_syaratFK`, `gambar`, `status_unggah`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 1, 1, 'Picture12.jpg', 'Sudah Diunggah', '2018-07-11 17:06:52', '2018-07-15 02:53:46', '0'),
(2, 1, 6, 'Picture22.jpg', 'Sudah Diunggah', '2018-07-11 17:06:52', '2018-07-15 02:53:46', '0'),
(3, 2, 1, NULL, 'Belum Diunggah', '2018-07-11 21:06:50', '0000-00-00 00:00:00', '0'),
(4, 3, 4, NULL, 'Belum Diunggah', '2018-07-11 21:10:37', '0000-00-00 00:00:00', '0'),
(5, 3, 5, NULL, 'Belum Diunggah', '2018-07-11 21:10:37', '0000-00-00 00:00:00', '0'),
(6, 4, 4, NULL, 'Belum Diunggah', '2018-07-11 22:01:22', '0000-00-00 00:00:00', '0'),
(7, 4, 5, NULL, 'Belum Diunggah', '2018-07-11 22:01:22', '0000-00-00 00:00:00', '0'),
(12, 7, 8, 'Picture13.jpg', 'Sudah Diunggah', '2018-07-12 13:16:55', '2018-07-15 03:14:09', '0'),
(13, 7, 9, 'Picture23.jpg', 'Sudah Diunggah', '2018-07-12 13:16:55', '2018-07-15 03:14:09', '0'),
(14, 8, 8, NULL, 'Belum Diunggah', '2018-07-13 13:28:07', '0000-00-00 00:00:00', '0'),
(15, 8, 9, NULL, 'Belum Diunggah', '2018-07-13 13:28:07', '0000-00-00 00:00:00', '0'),
(24, 5, 1, NULL, 'Belum Diunggah', '2018-07-13 15:48:16', '0000-00-00 00:00:00', '0'),
(25, 5, 2, NULL, 'Belum Diunggah', '2018-07-13 15:48:16', '0000-00-00 00:00:00', '0'),
(26, 5, 7, NULL, 'Belum Diunggah', '2018-07-13 15:48:16', '0000-00-00 00:00:00', '0'),
(27, 5, 8, NULL, 'Belum Diunggah', '2018-07-13 15:48:16', '0000-00-00 00:00:00', '0'),
(28, 9, 1, 'Picture2.jpg', 'Sudah Diunggah', '2018-07-15 01:22:05', '2018-07-14 18:24:25', '0'),
(33, 12, 1, NULL, 'Belum Diunggah', '2018-07-15 02:07:31', '0000-00-00 00:00:00', '0'),
(36, 10, 1, NULL, 'Belum Diunggah', '2018-07-15 02:41:49', '0000-00-00 00:00:00', '0'),
(46, 11, 7, NULL, 'Belum Diunggah', '2018-07-15 09:04:54', '0000-00-00 00:00:00', '0'),
(47, 11, 8, NULL, 'Belum Diunggah', '2018-07-15 09:04:54', '0000-00-00 00:00:00', '0'),
(48, 11, 9, NULL, 'Belum Diunggah', '2018-07-15 09:04:54', '0000-00-00 00:00:00', '0'),
(53, 6, 1, 'Picture11.jpg', 'Sudah Diunggah', '2018-07-15 09:20:03', '2018-07-15 02:51:54', '0'),
(55, 13, 4, 'Picture1.jpg', 'Sudah Diunggah', '2018-07-15 09:34:27', '2018-07-15 02:39:57', '0'),
(56, 13, 5, 'Picture21.jpg', 'Sudah Diunggah', '2018-07-15 09:34:27', '2018-07-15 02:39:57', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 'Colomadu', '2018-04-24 15:21:01', '2018-07-08 00:05:08', '0'),
(2, 'Gondangrejo', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(3, 'Jaten', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(4, 'Jatipuro', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(5, 'Jatiyoso', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(6, 'Jenawi', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(7, 'Jumantono', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(8, 'Jumapolo', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(9, 'Karanganyar', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(10, 'Karangpandan', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(11, 'Kebakkramat', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(12, 'Kerjo', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(13, 'Matesih', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(14, 'Mojogedang', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(15, 'Ngargoyoso', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(16, 'Tasikmadu', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0'),
(17, 'Tawangmangu', '2018-04-24 15:21:01', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_desakelurahanFK` int(11) NOT NULL,
  `id_petugasFK` int(11) NOT NULL,
  `id_status_pendafFK` int(11) NOT NULL,
  `no_registrasi` varchar(30) NOT NULL,
  `nokk` bigint(50) DEFAULT NULL,
  `nik` bigint(50) DEFAULT NULL,
  `nama_kepala_keluarga` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `data_asal` varchar(100) DEFAULT NULL,
  `data_tujuan` varchar(100) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_jadi` date NOT NULL,
  `jenis_akte` enum('Umum','Terlambat Pendaftaran','','') DEFAULT NULL,
  `jumlah_anggota_pindah` varchar(20) DEFAULT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_desakelurahanFK`, `id_petugasFK`, `id_status_pendafFK`, `no_registrasi`, `nokk`, `nik`, `nama_kepala_keluarga`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `data_asal`, `data_tujuan`, `tgl_daftar`, `tgl_jadi`, `jenis_akte`, `jumlah_anggota_pindah`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 89, 4, 4, '1', NULL, 389101838189, NULL, 'Rakha', 'Laki-laki', 'Madiun', '1992-01-29', 'Karanganyar', '7', '6', 'Madiun', NULL, '2018-07-11', '2018-07-11', NULL, '2', '2018-07-11 17:06:52', '2018-07-11 10:21:50', '0'),
(2, 87, 4, 1, '2', 39389202029, 0, 'Fido', NULL, NULL, NULL, NULL, 'Bejen', '3', '1', NULL, NULL, '2018-07-11', '2018-07-11', NULL, NULL, '2018-07-11 21:06:50', '2018-07-11 14:07:00', '0'),
(3, 43, 4, 2, '5', NULL, 872637617, NULL, 'Devi', 'Perempuan', 'Karanganyar', '2018-07-03', 'Beruk', '6', '4', NULL, NULL, '2018-07-11', '2018-07-11', 'Umum', NULL, '2018-07-11 21:10:37', '0000-00-00 00:00:00', '0'),
(4, 127, 4, 2, '3', NULL, 8278271, NULL, 'Annisa', 'Perempuan', 'Karanganyar', '2018-07-08', 'Dawung', '2', '2', NULL, NULL, '2018-07-11', '2018-07-11', 'Umum', NULL, '2018-07-11 22:01:22', '2018-07-11 15:15:28', '0'),
(5, 110, 4, 3, '6', NULL, 7676167123, NULL, 'Airlangga', 'Laki-laki', 'Karanganyar', '1990-04-18', 'Kebak', '3', '5', NULL, 'Yogyakarta', '2018-07-11', '2018-07-11', NULL, '2', '2018-07-11 22:24:21', '2018-07-11 15:24:36', '0'),
(6, 100, 4, 1, '7', 8378178117, 0, 'Gusnav', NULL, NULL, NULL, NULL, 'Gerdu', '2', '1', NULL, NULL, '2018-07-11', '2018-07-12', NULL, NULL, '2018-07-12 00:40:24', '2018-07-11 17:40:30', '0'),
(7, 87, 4, 4, '1', NULL, 87286216, NULL, 'Asti', 'Perempuan', 'Sukoharjo', '1996-08-10', 'Tegalgede', '1', '2', 'Sukoharjo', NULL, '2018-07-12', '2018-07-12', NULL, '1', '2018-07-12 13:16:54', '2018-07-12 06:17:05', '0'),
(8, 84, 4, 4, '8', NULL, 726763, NULL, 'Peni', 'Perempuan', 'Yogyakarta', '1997-07-13', 'Bejen', '7', '4', 'Yogyakarta', NULL, '2018-07-13', '2018-07-13', NULL, '1', '2018-07-13 13:28:06', '0000-00-00 00:00:00', '0'),
(9, 1, 4, 1, '14', 2864481632, 0, 'Yoga', NULL, NULL, NULL, NULL, 'Baturan', '1', '4', NULL, NULL, '2018-07-14', '2018-07-15', NULL, NULL, '2018-07-15 01:22:05', '2018-07-14 18:22:49', '0'),
(10, 132, 4, 3, '16', NULL, 747827846, NULL, 'Titi', 'Perempuan', 'Kebumen', '1990-07-17', 'Matesih', '3', '2', NULL, 'Kebumen', '2018-07-14', '2018-07-15', NULL, '1', '2018-07-15 01:43:55', '2018-07-14 18:58:45', '0'),
(11, 176, 4, 4, '13', NULL, 761273, NULL, 'Yulia', 'Perempuan', 'Bekasi', '2018-07-15', 'Tawangmangu', '1', '4', 'Bekasi', NULL, '2018-07-14', '2018-07-15', NULL, '1', '2018-07-15 02:04:12', '0000-00-00 00:00:00', '0'),
(12, 165, 4, 3, '18', NULL, 278179193, NULL, 'Dina', 'Perempuan', 'Sukoharjo', '1993-07-03', 'Papahan', '4', '3', NULL, 'Bandung', '2018-07-14', '2018-07-15', NULL, '1', '2018-07-15 02:07:31', '0000-00-00 00:00:00', '0'),
(13, 67, 4, 2, '10', NULL, 6481878347, NULL, 'Yanuar', 'Laki-laki', 'Karanganyar', '2018-07-05', 'Sedayu', '1', '2', NULL, NULL, '2018-07-14', '2018-07-15', 'Umum', NULL, '2018-07-15 02:31:41', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_user_roleFK` int(11) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `no_hp_petugas` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `id_user_roleFK`, `nama_petugas`, `alamat_petugas`, `no_hp_petugas`, `username`, `password`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 1, 'Petugas KK', 'Karanganyar', '089876564562', 'petugaskkk', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2018-05-18 12:17:15', '2018-07-06 01:48:46', '0'),
(2, 2, 'Petugas Akte', 'Karanganyar', '087318739276', 'petugasakte', '63f15bdf93a1d467614d2f8c89cba096', '2018-05-18 12:17:15', '2018-05-18 05:17:56', '0'),
(3, 3, 'Petugas Pindah', 'Karanganyar', '087318739290', 'petugaspindah', '1c70bb8c4f22a19b8ca960ffcb2d9b3a', '2018-05-18 12:19:07', '2018-05-21 07:48:38', '0'),
(4, 4, 'Admin', 'Karanganyar', '089286397208', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-05-18 12:19:07', '2018-06-23 14:22:42', '0'),
(10, 2, 'petugas', 'Bejen', '0982938922948', 'petugas99', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2018-07-06 08:43:06', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `id_status_pendaftaran` int(11) NOT NULL,
  `nama_status_pendaftaran` varchar(20) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pendaftaran`
--

INSERT INTO `status_pendaftaran` (`id_status_pendaftaran`, `nama_status_pendaftaran`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 'Kartu Keluarga', '2018-05-29 22:33:05', '0000-00-00 00:00:00', '0'),
(2, 'Akte', '2018-05-29 22:33:05', '0000-00-00 00:00:00', '0'),
(3, 'Pindah', '2018-05-29 22:33:05', '0000-00-00 00:00:00', '0'),
(4, 'Pindah Datang', '2018-05-29 22:33:05', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `judul_syarat` varchar(30) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `judul_syarat`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 'Fotocopy KK', '2018-05-29 22:33:58', '0000-00-00 00:00:00', '0'),
(2, 'Fotocopy Surat Nikah', '2018-05-29 22:33:58', '0000-00-00 00:00:00', '0'),
(3, 'Fotocopy KTP Saksi', '2018-05-29 22:33:58', '0000-00-00 00:00:00', '0'),
(4, 'Fotocopy KTP Orang Tua', '2018-05-29 22:33:58', '0000-00-00 00:00:00', '0'),
(5, 'Surat Kelahiran Dokter', '2018-05-29 22:33:58', '0000-00-00 00:00:00', '0'),
(6, 'Surat Persetujuan Orang Tua', '2018-05-29 22:33:58', '2018-06-29 18:36:24', '0'),
(7, 'Surat Persetujuan Istri', '2018-06-03 14:54:01', '2018-06-29 18:36:44', '0'),
(8, 'Fotocopy KK Asal', '2018-06-04 20:17:14', '2018-06-29 18:37:07', '0'),
(9, 'Surat Pindah Daerah Asal', '2018-06-04 20:17:17', '2018-06-29 18:38:00', '0'),
(10, 'kk', '2018-06-23 19:59:49', '2018-06-23 14:47:25', '1'),
(11, 'akaf', '2018-07-05 07:51:40', '2018-07-06 02:13:58', '1'),
(12, 'kkl', '2018-07-06 09:11:02', '2018-07-11 08:34:09', '1'),
(13, 'w8uwei', '2018-07-15 09:56:26', '2018-07-15 02:56:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `peran` varchar(30) NOT NULL,
  `CreateDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `peran`, `CreateDtm`, `UpdateDtm`, `Deleted`) VALUES
(1, 'PetugasKK', '2018-05-18 12:15:15', '2018-07-02 11:39:04', '0'),
(2, 'PetugasAkte', '2018-05-18 12:15:15', '2018-07-02 11:39:04', '0'),
(3, 'PetugasPindah', '2018-05-18 12:15:34', '2018-07-02 11:39:04', '0'),
(4, 'Admin', '2018-05-18 12:15:34', '2018-07-02 11:39:04', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desakelurahan`
--
ALTER TABLE `desakelurahan`
  ADD PRIMARY KEY (`id_desakelurahan`),
  ADD KEY `id_kecamatanFK` (`id_kecamatanFK`);

--
-- Indexes for table `detail_syarat`
--
ALTER TABLE `detail_syarat`
  ADD PRIMARY KEY (`id_detail_syarat`),
  ADD KEY `id_pendaftaranFK` (`id_pendaftaranFK`),
  ADD KEY `id_dokumenFK` (`id_syaratFK`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_desakelurahanFK` (`id_desakelurahanFK`),
  ADD KEY `id_petugasFK` (`id_petugasFK`),
  ADD KEY `id_status_pendafFK` (`id_status_pendafFK`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user_roleFK` (`id_user_roleFK`);

--
-- Indexes for table `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`id_status_pendaftaran`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desakelurahan`
--
ALTER TABLE `desakelurahan`
  MODIFY `id_desakelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `detail_syarat`
--
ALTER TABLE `detail_syarat`
  MODIFY `id_detail_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  MODIFY `id_status_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desakelurahan`
--
ALTER TABLE `desakelurahan`
  ADD CONSTRAINT `desakelurahan_ibfk_1` FOREIGN KEY (`id_kecamatanFK`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_syarat`
--
ALTER TABLE `detail_syarat`
  ADD CONSTRAINT `detail_syarat_ibfk_3` FOREIGN KEY (`id_syaratFK`) REFERENCES `syarat` (`id_syarat`),
  ADD CONSTRAINT `detail_syarat_ibfk_4` FOREIGN KEY (`id_pendaftaranFK`) REFERENCES `pendaftaran` (`id_pendaftaran`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_desakelurahanFK`) REFERENCES `desakelurahan` (`id_desakelurahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_petugasFK`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_status_pendafFK`) REFERENCES `status_pendaftaran` (`id_status_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_user_roleFK`) REFERENCES `user_role` (`id_user_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
