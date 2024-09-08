-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-09-08 10:20
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `teeorder`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `color`
--

CREATE TABLE `color` (
  `idx` int(11) NOT NULL,
  `type_idx` int(11) DEFAULT NULL,
  `design_idx` int(11) DEFAULT NULL,
  `index_idx` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `color`
--

INSERT INTO `color` (`idx`, `type_idx`, `design_idx`, `index_idx`, `name`, `sort`) VALUES
(1, 1, 0, 17, 'Gray', '0'),
(2, 1, 0, 18, 'Gray', '0'),
(3, 1, 0, 19, 'Gray', '0'),
(4, 1, 0, 19, 'Brown', '1'),
(5, 1, 0, 19, 'Green', '2'),
(6, 1, 0, 19, 'Yellow', '3'),
(7, 1, 0, 21, 'Gray', '0'),
(8, 1, 0, 21, 'Brown', '1'),
(9, 1, 0, 22, 'Gray', '0'),
(10, 1, 0, 22, 'Brown', '1'),
(11, 1, 0, 22, 'Green', '2'),
(12, 1, 0, 23, 'Gray', '0'),
(13, 1, 0, 23, 'Brown', '1'),
(14, 1, 0, 24, 'Gray', '0'),
(15, 1, 0, 24, 'Brown', '1'),
(16, 1, 0, 25, 'Gray', '0'),
(17, 1, 0, 25, 'Brown', '1'),
(18, 1, 0, 26, 'Gray', '0'),
(19, 1, 0, 26, 'Brown', '1'),
(20, 1, 0, 27, 'Gray', '0'),
(21, 1, 0, 27, 'Brown', '1'),
(22, 1, 0, 28, 'Gray', '0'),
(23, 1, 0, 28, 'Brown', '1'),
(24, 1, 0, 29, 'Gray', '0'),
(25, 1, 0, 29, 'Brown', '1'),
(26, 1, 0, 30, 'Gray', '0'),
(27, 1, 0, 30, 'Brown', '1'),
(28, 1, 0, 31, 'Gray', '0'),
(29, 1, 0, 31, 'Brown', '1'),
(30, 1, 0, 32, 'Gray', '0'),
(31, 1, 0, 32, 'Brown', '1'),
(32, 1, 0, 33, 'Gray', '0'),
(33, 1, 0, 33, 'Brown', '1'),
(34, 1, 0, 34, 'Gray', '0'),
(35, 1, 0, 34, 'Brown', '1'),
(36, 1, 0, 35, 'Gray', '0'),
(37, 1, 0, 35, 'Brown', '1'),
(38, 1, 0, 36, 'Gray', '0'),
(39, 1, 0, 36, 'Brown', '1'),
(40, 1, 0, 37, 'Gray', '0'),
(41, 1, 0, 38, 'Gray', '0'),
(42, 1, 0, 40, 'Gray', '0'),
(43, 1, 0, 40, 'Brown', '1'),
(44, 1, 0, 41, 'Gray', '0'),
(45, 1, 0, 41, 'Brown', '1'),
(46, 1, 0, 42, 'Gray', '0'),
(47, 1, 0, 42, 'Brown', '1'),
(48, 1, 0, 43, 'Gray', '0'),
(49, 1, 0, 43, 'Brown', '1'),
(50, 1, 0, 44, 'Gray', '0'),
(51, 1, 0, 44, 'Brown', '1'),
(52, 1, 0, 45, 'Gray', '0'),
(53, 1, 0, 45, 'Brown', '1'),
(54, 1, 0, 46, 'Gray', '0'),
(55, 1, 0, 46, 'Brown', '1'),
(56, 2, 0, 52, 'Gray', '0'),
(57, 2, 0, 52, 'Brown', '1'),
(58, 2, 0, 52, 'Green', '1'),
(59, 2, 0, 53, 'Gray', '0'),
(60, 2, 0, 53, 'Brown', '1'),
(61, 2, 0, 54, 'Gray', '0'),
(62, 2, 0, 54, 'Brown', '1'),
(63, 2, 0, 54, 'Green', '1'),
(64, 2, 0, 55, 'Gray', '0'),
(65, 2, 0, 55, 'Brown', '1'),
(66, 2, 0, 57, 'Gray', '0'),
(67, 2, 0, 57, 'Brown', '1'),
(68, 2, 0, 60, 'Gray', '0'),
(69, 2, 0, 60, 'Brown', '1'),
(70, 2, 0, 64, 'Gray', '0'),
(71, 2, 0, 64, 'Brown', '1'),
(72, 2, 0, 65, 'Gray', '0'),
(73, 2, 0, 74, 'Gray', '0'),
(74, 2, 0, 74, 'Brown', '1'),
(75, 3, 30, 92, 'Gray', '0'),
(76, 3, 30, 93, 'Gray', '0'),
(77, 3, 30, 94, 'Gray', '0'),
(78, 3, 30, 94, 'Brown', '1'),
(79, 3, 30, 94, 'Green', '2'),
(80, 3, 30, 94, 'Yellow', '3'),
(81, 3, 30, 96, 'Gray', '0'),
(82, 3, 30, 96, 'Brown', '1'),
(83, 3, 30, 97, 'Gray', '0'),
(84, 3, 30, 97, 'Brown', '1'),
(85, 3, 30, 97, 'Green', '2'),
(86, 3, 30, 98, 'Gray', '0'),
(87, 3, 30, 98, 'Brown', '1'),
(88, 3, 30, 99, 'Gray', '0'),
(89, 3, 30, 99, 'Brown', '1'),
(90, 3, 30, 100, 'Gray', '0'),
(91, 3, 30, 100, 'Brown', '1'),
(92, 3, 30, 101, 'Gray', '0'),
(93, 3, 30, 101, 'Brown', '1'),
(94, 3, 30, 102, 'Gray', '0'),
(95, 3, 30, 102, 'Brown', '1'),
(96, 3, 30, 103, 'Gray', '0'),
(97, 3, 30, 103, 'Brown', '1'),
(98, 3, 30, 104, 'Gray', '0'),
(99, 3, 30, 104, 'Brown', '1'),
(100, 3, 30, 105, 'Gray', '0'),
(101, 3, 30, 105, 'Brown', '1'),
(102, 3, 30, 106, 'Gray', '0'),
(103, 3, 30, 106, 'Brown', '1'),
(104, 3, 30, 107, 'Gray', '0'),
(105, 3, 30, 107, 'Brown', '1'),
(106, 3, 30, 108, 'Gray', '0'),
(107, 3, 30, 108, 'Brown', '1'),
(108, 3, 30, 109, 'Gray', '0'),
(109, 3, 30, 109, 'Brown', '1'),
(110, 3, 30, 110, 'Gray', '0'),
(111, 3, 30, 110, 'Brown', '1'),
(112, 3, 30, 111, 'Gray', '0'),
(113, 3, 30, 111, 'Brown', '1'),
(114, 3, 30, 112, 'Gray', '0'),
(115, 3, 30, 113, 'Gray', '0'),
(116, 3, 30, 115, 'Gray', '0'),
(117, 3, 30, 115, 'Brown', '1'),
(118, 3, 30, 115, 'Gray', '0'),
(119, 3, 30, 115, 'Brown', '1'),
(120, 3, 30, 116, 'Gray', '0'),
(121, 3, 30, 116, 'Brown', '1'),
(122, 3, 30, 117, 'Gray', '0'),
(123, 3, 30, 117, 'Brown', '1'),
(124, 3, 30, 118, 'Gray', '0'),
(125, 3, 30, 118, 'Brown', '1'),
(126, 3, 30, 119, 'Gray', '0'),
(127, 3, 30, 119, 'Brown', '1'),
(128, 3, 30, 120, 'Gray', '0'),
(129, 3, 30, 120, 'Brown', '1'),
(130, 3, 30, 121, 'Gray', '0'),
(131, 3, 30, 121, 'Brown', '1'),
(132, 3, 32, 146, 'Gray', '0'),
(133, 3, 32, 147, 'Gray', '0'),
(134, 3, 32, 148, 'Gray', '0'),
(135, 3, 32, 148, 'Brown', '1'),
(136, 3, 32, 148, 'Green', '2'),
(137, 3, 32, 148, 'Yellow', '3'),
(138, 3, 32, 150, 'Gray', '0'),
(139, 3, 32, 150, 'Brown', '1'),
(140, 3, 32, 151, 'Gray', '0'),
(141, 3, 32, 151, 'Brown', '1'),
(142, 3, 32, 151, 'Green', '2'),
(143, 3, 32, 152, 'Gray', '0'),
(144, 3, 32, 152, 'Brown', '1'),
(145, 3, 32, 153, 'Gray', '0'),
(146, 3, 32, 153, 'Brown', '1'),
(147, 3, 32, 154, 'Gray', '0'),
(148, 3, 32, 154, 'Brown', '1'),
(149, 3, 32, 155, 'Gray', '0'),
(150, 3, 32, 155, 'Brown', '1'),
(151, 3, 32, 156, 'Gray', '0'),
(152, 3, 32, 156, 'Brown', '1'),
(153, 3, 32, 157, 'Gray', '0'),
(154, 3, 32, 157, 'Brown', '1'),
(155, 3, 32, 158, 'Gray', '0'),
(156, 3, 32, 158, 'Brown', '1'),
(157, 3, 32, 159, 'Gray', '0'),
(158, 3, 32, 159, 'Brown', '1'),
(159, 3, 32, 160, 'Gray', '0'),
(160, 3, 32, 160, 'Brown', '1'),
(161, 3, 32, 161, 'Gray', '0'),
(162, 3, 32, 161, 'Brown', '1'),
(163, 3, 32, 162, 'Gray', '0'),
(164, 3, 32, 162, 'Brown', '1'),
(165, 3, 32, 163, 'Gray', '0'),
(166, 3, 32, 163, 'Brown', '1'),
(167, 3, 32, 164, 'Gray', '0'),
(168, 3, 32, 164, 'Brown', '1'),
(169, 3, 32, 165, 'Gray', '0'),
(170, 3, 32, 165, 'Brown', '1'),
(171, 3, 32, 166, 'Gray', '0'),
(172, 3, 32, 167, 'Gray', '0'),
(173, 3, 32, 169, 'Gray', '0'),
(174, 3, 32, 169, 'Brown', '1'),
(175, 3, 32, 170, 'Gray', '0'),
(176, 3, 32, 170, 'Brown', '1'),
(177, 3, 32, 171, 'Gray', '0'),
(178, 3, 32, 171, 'Brown', '1'),
(179, 3, 32, 172, 'Gray', '0'),
(180, 3, 32, 172, 'Brown', '1'),
(181, 3, 32, 173, 'Gray', '0'),
(182, 3, 32, 173, 'Brown', '1'),
(183, 3, 32, 174, 'Gray', '0'),
(184, 3, 32, 174, 'Brown', '1'),
(185, 3, 32, 175, 'Gray', '0'),
(186, 3, 32, 175, 'Brown', '1');

-- --------------------------------------------------------

--
-- 테이블 구조 `design`
--

CREATE TABLE `design` (
  `idx` int(11) NOT NULL,
  `type_idx` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `design`
--

INSERT INTO `design` (`idx`, `type_idx`, `name`, `sort`) VALUES
(1, 1, 'Alpha H45', '0'),
(2, 1, 'Alpha H25', '1'),
(3, 1, 'Alpha H65', '2'),
(4, 1, 'Alpha S45', '3'),
(5, 1, 'Alpha S35', '4'),
(6, 1, 'Basic H40', '5'),
(7, 1, 'Basic S40', '6'),
(8, 1, 'Basic S35', '7'),
(9, 1, 'Endless Steady', '8'),
(10, 1, 'Endless Steady Near', '9'),
(11, 1, 'Endless Steady Distance', '10'),
(12, 1, 'Endless Steady Intermediate', '11'),
(13, 1, 'Endless Ysian', '12'),
(14, 1, 'Endless Office', '13'),
(15, 1, 'Endless Drive', '14'),
(16, 1, 'Endless Sport', '15'),
(17, 1, 'Reader', '16'),
(18, 1, 'Reader2', '17'),
(19, 2, 'FT 28', '0'),
(20, 2, 'FT 25', '1'),
(21, 2, 'FT 35', '2'),
(22, 2, 'FT 45', '3'),
(23, 2, 'RT 28', '4'),
(24, 2, 'RT 24', '5'),
(25, 2, 'RT 38', '6'),
(26, 2, 'BLEND 28', '7'),
(27, 2, 'TRI 7*28', '8'),
(28, 2, 'TRI 8*35', '9'),
(29, 2, 'EX', '10'),
(30, 3, 'Single Vision RX', '0'),
(31, 3, 'HoneyComb Anti-Myopia', '1'),
(32, 3, 'FF Single Vision', '2');

-- --------------------------------------------------------

--
-- 테이블 구조 `index`
--

CREATE TABLE `index` (
  `idx` int(11) NOT NULL,
  `design_idx` int(11) DEFAULT NULL,
  `type_idx` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `index`
--

INSERT INTO `index` (`idx`, `design_idx`, `type_idx`, `name`, `sort`) VALUES
(1, NULL, 1, '1.50', 0),
(2, NULL, 1, '1.50 BRC', 1),
(3, NULL, 1, '1.56', 2),
(4, NULL, 1, '1.56 BRC', 3),
(5, NULL, 1, '1.61', 4),
(6, NULL, 1, '1.61 BRC', 5),
(7, NULL, 1, '1.67', 6),
(8, NULL, 1, '1.67 BRC', 7),
(9, NULL, 1, '1.74', 8),
(10, NULL, 1, '1.74 BRC', 9),
(11, NULL, 1, '1.56 IMPACT', 10),
(12, NULL, 1, '1.56 IMPACT BRC', 11),
(13, NULL, 1, '1.61 IMPACT', 12),
(14, NULL, 1, '1.61 IMPACT BRC', 13),
(15, NULL, 1, '1.59 PC', 14),
(16, NULL, 1, '1.59 PC BRC', 15),
(17, NULL, 1, '1.59 PC PHOTO', 16),
(18, NULL, 1, '1.59 PC POLAR', 17),
(19, NULL, 1, '1.50 POLA 85%', 18),
(20, NULL, 1, '1.50 POLA 50%', 19),
(21, NULL, 1, '1.50 POLA 25%', 20),
(22, NULL, 1, '1.56 POLA 85%', 21),
(23, NULL, 1, '1.56 POLA 50%', 22),
(24, NULL, 1, '1.56 POLA 25%', 23),
(25, NULL, 1, '1.61 POLA 85%', 24),
(26, NULL, 1, '1.67 POLA 85%', 25),
(27, NULL, 1, '1.50 POLA PHOTO', 26),
(28, NULL, 1, '1.50 TRANSITION8', 27),
(29, NULL, 1, '1.61 TRANSITION8', 28),
(30, NULL, 1, '1.67 TRANSITION8', 29),
(31, NULL, 1, '1.74 TRANSITION8', 30),
(32, NULL, 1, '1.59 PC TRANSITION8', 31),
(33, NULL, 1, '1.56 PHOTO', 32),
(34, NULL, 1, '1.61 PHOTO', 33),
(35, NULL, 1, '1.61 MR PHOTO BRC', 34),
(36, NULL, 1, '1.67 PHOTO BRC', 35),
(37, NULL, 1, '1.74 PHOTO', 36),
(38, NULL, 1, '1.56 PHOTO Orange Gray', 37),
(39, NULL, 1, '1.50 DRIVE', 38),
(40, NULL, 1, '1.50 Sunfilter Spin coating', 39),
(41, NULL, 1, '1.56 Sunfilter Spin coating', 40),
(42, NULL, 1, '1.61 Sunfilter Spin coating', 41),
(43, NULL, 1, '1.67 Sunfilter Spin coating', 42),
(44, NULL, 1, '1.74 Sunfilter Spin coating', 43),
(45, NULL, 1, '1.53 TRIVEX', 44),
(46, NULL, 1, '1.53 TRIVEX TRANSITION', 45),
(47, NULL, 2, 'FT 28 1.50', 0),
(48, NULL, 2, 'FT 28 1.56', 1),
(49, NULL, 2, 'FT 28 1.60', 2),
(50, NULL, 2, 'FT 28 1.67', 3),
(51, NULL, 2, 'FT 28 1.59 PC', 4),
(52, NULL, 2, 'FT 28 1.50 POLARIZED', 5),
(53, NULL, 2, 'FT 28 1.56 POLARIZED', 6),
(54, NULL, 2, 'FT 28 1.56 PHOTO', 7),
(55, NULL, 2, 'FT 28 1.61 PHOTO', 8),
(56, NULL, 2, 'FT 28 1.56 IMPACT', 9),
(57, NULL, 2, 'FT 28 1.50 TRANSITION 8', 10),
(58, NULL, 2, 'FT 25 1.50', 11),
(59, NULL, 2, 'FT 35 1.50', 12),
(60, NULL, 2, 'FT 35 1.56 PHOTO', 13),
(61, NULL, 2, 'FT 35 1.61', 14),
(62, NULL, 2, 'FT 45 1.50', 15),
(63, NULL, 2, 'TRI 7*28 1.50', 16),
(64, NULL, 2, 'TRI 7*28 1.50 POLARIZED', 17),
(65, NULL, 2, 'TRI 7*28 1.56 PHOTO', 18),
(66, NULL, 2, 'TRI 7*28 1.60', 19),
(67, NULL, 2, 'TRI 8*35 1.50', 20),
(68, NULL, 2, 'RT 28 1.50', 21),
(69, NULL, 2, 'RT 28 1.56 PHOTO', 22),
(70, NULL, 2, 'RT 24 1.50', 23),
(71, NULL, 2, 'RT 28 1.50', 24),
(72, NULL, 2, 'BLEND 28 1.50', 25),
(73, NULL, 2, 'BLEND 28 1.56', 26),
(74, NULL, 2, 'BLEND 28 1.56 PHOTO', 27),
(75, NULL, 2, 'EX 1.50', 28),
(76, 30, 3, '1.50', 0),
(77, 30, 3, '1.50 BRC', 1),
(78, 30, 3, '1.56', 2),
(79, 30, 3, '1.56 BRC', 3),
(80, 30, 3, '1.61', 4),
(81, 30, 3, '1.61 BRC', 5),
(82, 30, 3, '1.67', 6),
(83, 30, 3, '1.67 BRC', 7),
(84, 30, 3, '1.74', 8),
(85, 30, 3, '1.74 BRC', 9),
(86, 30, 3, '1.56 IMPACT', 10),
(87, 30, 3, '1.56 IMPACT BRC', 11),
(88, 30, 3, '1.61 IMPACT', 12),
(89, 30, 3, '1.61 IMPACT BRC', 13),
(90, 30, 3, '1.59 PC', 14),
(91, 30, 3, '1.59 PC BRC', 15),
(92, 30, 3, '1.59 PC PHOTO', 16),
(93, 30, 3, '1.59 PC POLAR', 17),
(94, 30, 3, '1.50 POLA 85%', 18),
(95, 30, 3, '1.50 POLA 50%', 19),
(96, 30, 3, '1.50 POLA 25%', 20),
(97, 30, 3, '1.56 POLA 85%', 21),
(98, 30, 3, '1.56 POLA 50%', 22),
(99, 30, 3, '1.56 POLA 25%', 23),
(100, 30, 3, '1.61 POLA 85%', 24),
(101, 30, 3, '1.67 POLA 85%', 25),
(102, 30, 3, '1.50 POLA PHOTO', 26),
(103, 30, 3, '1.50 TRANSITION8', 27),
(104, 30, 3, '1.61 TRANSITION8', 28),
(105, 30, 3, '1.67 TRANSITION8', 29),
(106, 30, 3, '1.74 TRANSITION8', 30),
(107, 30, 3, '1.59 PC TRANSITION8', 31),
(108, 30, 3, '1.56 PHOTO', 32),
(109, 30, 3, '1.61 PHOTO', 33),
(110, 30, 3, '1.61 MR PHOTO BRC', 34),
(111, 30, 3, '1.67 PHOTO BRC', 35),
(112, 30, 3, '1.74 PHOTO', 36),
(113, 30, 3, '1.56 PHOTO', 37),
(114, 30, 3, '1.50 DRIVE', 38),
(115, 30, 3, '1.50 Sunfilter Spin coating', 39),
(116, 30, 3, '1.56 Sunfilter Spin coating', 40),
(117, 30, 3, '1.61 Sunfilter Spin coating', 41),
(118, 30, 3, '1.67 Sunfilter Spin coating', 42),
(119, 30, 3, '1.74 Sunfilter Spin coating', 43),
(120, 30, 3, '1.53 TRIVEX', 44),
(121, 30, 3, '1.53 TRIVEX TRANSITION', 45),
(122, 31, 3, '1.56', 0),
(123, 31, 3, '1.56 BRC', 1),
(124, 31, 3, '1.61', 2),
(125, 31, 3, '1.61 BRC', 3),
(126, 31, 3, '1.67', 4),
(127, 31, 3, '1.67 BRC', 5),
(128, 31, 3, '1.74', 6),
(129, 31, 3, '1.74 BRC', 7),
(130, 32, 3, '1.50', 0),
(131, 32, 3, '1.50 BRC', 1),
(132, 32, 3, '1.56', 2),
(133, 32, 3, '1.56 BRC', 3),
(134, 32, 3, '1.61', 4),
(135, 32, 3, '1.61 BRC', 5),
(136, 32, 3, '1.67', 6),
(137, 32, 3, '1.67 BRC', 7),
(138, 32, 3, '1.74', 8),
(139, 32, 3, '1.74 BRC', 9),
(140, 32, 3, '1.56 IMPACT', 10),
(141, 32, 3, '1.56 IMPACT BRC', 11),
(142, 32, 3, '1.61 IMPACT', 12),
(143, 32, 3, '1.61 IMPACT BRC', 13),
(144, 32, 3, '1.59 PC', 14),
(145, 32, 3, '1.59 PC BRC', 15),
(146, 32, 3, '1.59 PC PHOTO', 16),
(147, 32, 3, '1.59 PC POLAR', 17),
(148, 32, 3, '1.50 POLA 85%', 18),
(149, 32, 3, '1.50 POLA 50%', 19),
(150, 32, 3, '1.50 POLA 25%', 20),
(151, 32, 3, '1.56 POLA 85%', 21),
(152, 32, 3, '1.56 POLA 50%', 22),
(153, 32, 3, '1.56 POLA 25%', 23),
(154, 32, 3, '1.61 POLA 85%', 24),
(155, 32, 3, '1.67 POLA 85%', 25),
(156, 32, 3, '1.50 POLA PHOTO', 26),
(157, 32, 3, '1.50 TRANSITION8', 27),
(158, 32, 3, '1.61 TRANSITION8', 28),
(159, 32, 3, '1.67 TRANSITION8', 29),
(160, 32, 3, '1.74 TRANSITION8', 30),
(161, 32, 3, '1.59 PC TRANSITION8', 31),
(162, 32, 3, '1.56 PHOTO', 32),
(163, 32, 3, '1.61 PHOTO', 33),
(164, 32, 3, '1.61 MR PHOTO BRC', 34),
(165, 32, 3, '1.67 PHOTO BRC', 35),
(166, 32, 3, '1.74 PHOTO', 36),
(167, 32, 3, '1.56 PHOTO', 37),
(168, 32, 3, '1.50 DRIVE', 38),
(169, 32, 3, '1.50 Sunfilter Spin coating', 39),
(170, 32, 3, '1.56 Sunfilter Spin coating', 40),
(171, 32, 3, '1.61 Sunfilter Spin coating', 41),
(172, 32, 3, '1.67 Sunfilter Spin coating', 42),
(173, 32, 3, '1.74 Sunfilter Spin coating', 43),
(174, 32, 3, '1.53 TRIVEX', 44),
(175, 32, 3, '1.53 TRIVEX TRANSITION', 45);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `auth` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `id`, `password`, `name`, `auth`, `email`, `company`, `memo`) VALUES
(1, 'admin', '$2y$10$AEu8mIWoewh6Jmvc/uHZyOCcOkMlUGfeIierXK9t./QJ7xWKki3La', 'teelens', '0', 'teelens@gmail.com', 'teelens', ''),
(37, '123', '$2y$10$pn0z4bzEoBnGEWX30PF4EOBAdSYROLCRHn0vOWnvXCO4Elzm24hVu', '12', '1', '12123', 'ㅁㅁ', 'ㅠㅠ'),
(38, '13423', '$2y$10$lGy54K3wLpVCLZVFd.rjROyi0MeRpPkbg6DRHzJSAPi.Lk3SRCxdi', '424123432', '0', '123', 'sdas', ''),
(39, '11', '$2y$10$aiRiCwoy44Cb20zTIvDduOsPlO2DPA0LY2nZB.EjJmncn5rqZvG3C', '11', '1', '', '', ''),
(40, '22', '$2y$10$ynpQ5FgdYYLpx7UeqqYSA.NRlJYZ6153SlEBSDHV6XuJTqa034UcW', '22', '0', '213213', '123213', '213213'),
(41, '133', '$2y$10$QaaSuLp6vFupn.ABrAGD8.LtELuACNtntkb5C8FrAdsXRSa58E4BW', '333123', '1', '333', '333', '333'),
(42, 'd', '$2y$10$tUT/SqjBb2e/nET95NkTKOc/OyQOHU3Q7X2RwaWjJ3CdZgTJl.WB2', 'd', '1', '', '', ''),
(43, '767868', '$2y$10$1hriGirFiASRAbBNpc0.eOcFVJrBlaTas86j5KcMqqjF.zJFFSDu2', '6787658', '1', '5676547', '657567', ''),
(44, 'sdafdsafasfxc2w', '$2y$10$jI6wjUp7v391fpu6gSwgK.WkTUIsv0/vH.ymy7B/mQQs52C1Uy.0.', '12321', '1', '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `order`
--

CREATE TABLE `order` (
  `idx` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_idx` int(11) DEFAULT NULL,
  `r_sph` varchar(255) DEFAULT NULL,
  `r_cyl` varchar(255) DEFAULT NULL,
  `r_axis` varchar(255) DEFAULT NULL,
  `r_add` varchar(255) DEFAULT NULL,
  `r_dia` varchar(255) DEFAULT NULL,
  `r_prism` varchar(255) DEFAULT NULL,
  `r_qty` varchar(255) DEFAULT NULL,
  `l_sph` varchar(255) DEFAULT NULL,
  `l_cyl` varchar(255) DEFAULT NULL,
  `l_axis` varchar(255) DEFAULT NULL,
  `l_add` varchar(255) DEFAULT NULL,
  `l_dia` varchar(255) DEFAULT NULL,
  `l_prism` varchar(255) DEFAULT NULL,
  `l_qty` varchar(255) DEFAULT NULL,
  `hbox` varchar(255) DEFAULT NULL,
  `vbox` varchar(255) DEFAULT NULL,
  `edbox` varchar(255) DEFAULT NULL,
  `dbl` varchar(255) DEFAULT NULL,
  `r_segh` varchar(255) DEFAULT NULL,
  `r_pd` varchar(255) DEFAULT NULL,
  `l_pd` varchar(255) DEFAULT NULL,
  `panto` varchar(255) DEFAULT NULL,
  `ztilt` varchar(255) DEFAULT NULL,
  `inset` varchar(255) DEFAULT NULL,
  `design_idx` int(11) DEFAULT NULL,
  `index_idx` int(11) DEFAULT NULL,
  `color_idx` int(11) DEFAULT NULL,
  `corridor` varchar(255) DEFAULT NULL,
  `frame` varchar(255) DEFAULT NULL,
  `coating` varchar(255) DEFAULT NULL,
  `uv` varchar(255) DEFAULT NULL,
  `tint_color` varchar(255) DEFAULT NULL,
  `tint_desc` varchar(255) DEFAULT NULL,
  `mirror` varchar(255) DEFAULT NULL,
  `mirror_desc` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  `quntity` varchar(255) DEFAULT NULL,
  `member_idx` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `type`
--

CREATE TABLE `type` (
  `idx` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `type`
--

INSERT INTO `type` (`idx`, `name`, `sort`) VALUES
(1, 'Free Form Progressive', '0'),
(2, 'Bifocal Trifocal', '1'),
(3, 'Single Vision', '2');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `color`
--
ALTER TABLE `color`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- 테이블의 AUTO_INCREMENT `design`
--
ALTER TABLE `design`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 테이블의 AUTO_INCREMENT `index`
--
ALTER TABLE `index`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 테이블의 AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
