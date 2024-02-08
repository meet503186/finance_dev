-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 10:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesspermission`
--

CREATE TABLE `accesspermission` (
  `permissionId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `accessFunction` int(5) NOT NULL,
  `accessValue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesspermission`
--

INSERT INTO `accesspermission` (`permissionId`, `uid`, `accessFunction`, `accessValue`) VALUES
(1, 33, 1, 0),
(2, 33, 3, 1),
(3, 33, 2, 1),
(4, 33, 4, 1),
(5, 1, 1, 0),
(6, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `access_list`
--

CREATE TABLE `access_list` (
  `listId` int(11) NOT NULL,
  `listTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_list`
--

INSERT INTO `access_list` (`listId`, `listTitle`) VALUES
(1, 'Can View Employee'),
(2, 'Can Delete Employee'),
(3, 'Can Edit Employee'),
(4, 'Can Add User');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES
(2, 'DSS'),
(3, 'ABC '),
(4, 'SHAH SATNAM JI GREEN S WELFARE FORCE WING'),
(5, 'shahi canteen');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `districtName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtId`, `districtName`) VALUES
(1, 'Moga'),
(2, 'Bathinda'),
(3, 'Ferozpur'),
(4, 'Sangrur');

-- --------------------------------------------------------

--
-- Table structure for table `tbblock`
--

CREATE TABLE `tbblock` (
  `blockid` int(11) NOT NULL,
  `blockname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blockdistrictid` varchar(11) DEFAULT NULL,
  `blockstateid` int(11) NOT NULL,
  `blockcountryid` int(11) NOT NULL,
  `blockpincode` varchar(10) NOT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `modifiedby` varchar(45) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `blkactsts` tinyint(1) DEFAULT 1,
  `blockname_hi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blockname_pb` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blockrawname` text NOT NULL,
  `blockremark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbblock`
--

INSERT INTO `tbblock` (`blockid`, `blockname`, `blockdistrictid`, `blockstateid`, `blockcountryid`, `blockpincode`, `createdby`, `createdon`, `modifiedby`, `modifiedon`, `blkactsts`, `blockname_hi`, `blockname_pb`, `blockrawname`, `blockremark`) VALUES
(1, 'Ambala Cantt.', '1', 1, 1, '133001', NULL, NULL, NULL, NULL, 1, 'अंबाला कैंट', 'ਅੰਬਾਲਾ ਛਾਉਣੀ', '', ''),
(2, 'Ambala City', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, 'अंबाला शहर', 'ਅੰਬਾਲਾ ਸ਼ਹਿਰ', '', ''),
(3, 'Barara', '1', 1, 1, '133201', NULL, NULL, NULL, NULL, 1, 'बरारा', 'ਬਰਾੜਾ', '', ''),
(4, 'Kodwa /Shazadpur', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(5, 'Narayangarh', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(6, 'Matheri Shekhan', '1', 1, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(7, 'Mithapur', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(8, 'Lalpur Lakhnaur', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(9, 'Mulana', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(10, 'Kesri', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(11, 'Adhoya', '1', 1, 1, '133205', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(12, 'Mohra', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(14, 'Bhiwani', '2', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(16, 'Loharu', '2', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(17, 'Tosham', '2', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(18, 'Bawani Khera', '2', 1, 1, '127032', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(19, 'Siwani', '2', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(20, 'Pandwan', '397', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(21, 'Jhojhu', '397', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(22, 'Dadri', '397', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(23, 'Hisar', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(24, 'Adampur', '3', 1, 1, '125052', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(25, 'Salemgarh', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(26, 'Barwala', '3', 1, 1, '125121', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(27, 'Mahenda Garhi', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(28, 'Gangwa', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(29, 'Narnaund ', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(30, 'Hansi', '3', 1, 1, '125033', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(31, 'Kheri Jalab', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(33, 'Uklana Mandi', '3', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(35, 'Ballabhgarh ', '343', 1, 1, '121004', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(37, 'Gurugram', '5', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(38, 'Sohna', '5', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(39, 'Manesar', '5', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(40, 'Pataudi', '5', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(41, 'Ateli', '6', 1, 1, '123021', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(42, 'Narnoul', '6', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(43, 'Mahendargarh', '6', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(44, 'Kanina', '6', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(46, 'Hodal', '7', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(47, 'Palwal', '7', 1, 1, '121102', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(48, 'Bawal', '8', 1, 1, '123501', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(49, 'Rewari', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(50, 'Kausali', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(51, 'Dahina', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(52, 'Kund', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(53, 'Bhadangi', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(54, 'Kalanaur', '9', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(55, 'Maham', '9', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(56, 'Kiloi', '9', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(57, 'Rohtak', '9', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(58, 'Ganaur', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(59, 'Gohana', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(60, 'Rai', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(61, 'Sonipat', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(62, 'Kailana', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(63, 'Kharkhoda', '10', 1, 1, '131402', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(64, 'Bahalgarh', '10', 1, 1, '131021', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(65, 'Mundlana', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(66, 'Mohana', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(67, 'Kathura', '10', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(68, 'Bhattu Kalan', '11', 1, 1, '125053', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(69, 'Fatehabad', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(70, 'Hadoli', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(71, 'Jakhal Mandi', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(72, 'Kukrawali', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(73, 'Mahamdpur Rohi', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(74, 'Ratangarh', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(76, 'Ratia', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(77, 'Tohana', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(78, 'Babain', '12', 1, 1, '136156', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(79, 'Ladwa', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(80, 'Shahbad', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(81, 'Ishak Bakhali', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(83, 'Dhurala', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(84, 'Ismailabad', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(85, 'Kurukshetra', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(86, 'Mandheri', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(87, 'Pihowa', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(88, 'Pipli-Thanesar', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(89, 'Berthla', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(90, 'Israna', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(91, 'Kabri', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(92, 'Madlauda', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(93, 'Nangal Kheri', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(94, 'Panipat', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(96, 'Samalkha', '13', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(97, 'Raipur Rani/Barwala', '14', 1, 1, '134204', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(98, 'Panchkula', '14', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(99, 'Pinjore Kalka', '14', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(100, 'Amarjeet Pura', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(101, 'MSG Complex', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(102, 'Chakkan/Rampurtheri', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(103, 'Dabwali', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(104, 'Darewala', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(105, 'Ellenabad', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(106, 'Kalyan Nagar', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(107, 'True Soul Complex', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(108, 'Nathusari Chopata', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(109, 'Rania', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(110, 'Shah Satnam Ji Nagar', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(111, 'Shah Satnam Ji Pura', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(112, 'Shri Jalalana Sahib', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(113, 'Rodi', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(114, 'Sirsa', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(115, 'Upkar Colony', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(116, 'Assandh', '16', 1, 1, '132039', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(118, 'Nigdhu', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(119, 'Gharaunda', '16', 1, 1, '111111', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(121, 'Kunjpura', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(122, 'Jundla', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(123, 'Karnal', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(124, 'Kambopura', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(125, 'Nilokheri', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(126, 'Nissing', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(127, 'Bahadurgarh', '17', 1, 1, '124507', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(128, 'Jhajjar', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(129, 'Beri', '17', 1, 1, '124201', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(130, 'Digal', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(131, 'Sahlawas', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(132, 'Goriyan', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(133, 'Dhamtan Sahib', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(134, 'Jind', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(135, 'Julana', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(136, 'Safidon', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(137, 'Nagura', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(138, 'Kinana', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(139, 'Narwana', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(140, 'Pillu Khera', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(141, 'Uchana', '18', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(142, 'Cheeka', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(143, 'Guhla', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(144, 'Dhand', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(145, 'Kaithal', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(146, 'Kalayat', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(147, 'Pundri', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(148, 'Rajaund', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(149, 'Siwan', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(150, 'Jagadhari', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(152, 'Radaur', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(153, 'Sadhaura', '20', 1, 1, '133204', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(154, 'Yamuna Nagar', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(155, 'Jathlana', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(156, 'Chhachhroli', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(157, 'Bilaspur', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(159, 'Kail', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(160, 'Talakaur', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(161, 'Balianwali', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(162, 'Bandi', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(164, 'Bhucho Mandi', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(165, 'Chughe Kalan', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(167, 'Maur Mandi', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(168, 'Nasibpura Rama', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(169, 'Rajgarh Salabatpura', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(171, 'Talwandi Sabo', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(172, 'Bareta', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(173, 'Bhikhi', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(174, 'Boha', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(175, 'Budhlada', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(177, 'Jhunir ', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(178, 'Khiala Kalan', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(179, 'Mansa', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(180, 'Sardulgarh', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(181, 'Chandigarh', '23', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(182, 'Saneta', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(183, 'Kurali', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(185, 'Tyourh', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(186, 'Handesara', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(187, 'Mulapur Garibdas', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(188, 'Samgoli', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(189, 'Banur', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(191, 'Kharar                  ', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(192, 'Lalru', '24', 2, 1, '111123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(193, 'Mohali', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(196, 'Gobindgarh', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(198, 'Bhalwan', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(199, 'Nadampur', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(200, 'Ahemad Garh', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(201, 'Amargarh', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(203, 'Dharamgarh', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(204, 'Dhuri', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(205, 'Dirba', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(208, 'Lehra Gaga', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(209, 'Longowal', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(210, 'Malerkotla', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(211, 'Moonak', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(212, 'Sangrur', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(213, 'Sherpur', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(214, 'Sunam', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(215, 'Nawan Gaon', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(216, 'Bamna', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(217, 'Mavi Kalan', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(218, 'Sadho Herhi', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(219, 'Bhunar Herhi', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(221, 'Loh Simbli', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(225, 'Bathoi Dakala', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(227, 'Shutrana', '26', 2, 1, '147105', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(230, 'Mallewal', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(232, 'Ganjukhera', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(234, 'Bhadson              ', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(235, 'Devigarh', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(236, 'Balveda', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(237, 'Ghagga', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(239, 'Nabha', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(240, 'Bahadurgarh', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(241, 'Patiala', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(242, 'Patran', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(243, 'Rajpura', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(244, 'Samana', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(245, 'Sanour ', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(246, 'Koom Kalan', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(247, 'Sarinh', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(248, 'Sidhwa Bait', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(249, 'Kila Raipur', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(251, 'Sane Wal', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(252, 'Maloud', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(253, 'Machiwara', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(254, 'Doraha', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(256, 'Jagraon', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(257, 'Khanna               ', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(258, 'Ludhiana', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(259, 'Mangat', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(261, 'Payal', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(262, 'Raikot', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(263, 'Samrala', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(264, 'Amloh              ', '28', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(265, 'Basi Pathana        ', '28', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(266, 'Mandi Gobindgarh', '28', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(267, 'Sirhind', '28', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(268, 'Jakhwali', '28', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(269, 'Firozpur Cant', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(270, 'Firozpur City', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(271, 'Mallwala', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(272, 'Makhu', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(273, 'Kul Garhi', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(274, 'Hakumat Sing Wala', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(275, 'Atari', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(276, 'Bare Ke', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(277, 'Chak Jamalgarh ', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(278, 'Amir Khas', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(279, 'Alphuke', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(282, 'Mamdot', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(283, 'Saide ke Mohan', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(284, 'Talwandi Bhai', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(285, 'Zira              ', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(286, 'Mandi LadhuKa', '30', 2, 1, '152123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(288, 'Sito Guno', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(289, 'Tarewala', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(290, 'Ghubaya', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(291, 'Abohar', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(292, 'Arniwala', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(293, 'Balluana', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(294, 'Chak Singewala', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(295, 'Fazilka', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(296, 'Jalalabad', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(297, 'Kabul Shah khuban', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(299, 'Kikkar Khera', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(300, 'Bargari', '31', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(301, 'Jaito', '31', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(302, 'Kotkapura', '31', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(303, 'Faridkot', '31', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(305, 'Mangat Badhai', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(306, 'Bariwala', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(307, 'Doda', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(308, 'Giddarbaha', '32', 2, 1, '456466', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(309, 'Lambi      ', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(310, 'Kot Bhai', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(311, 'Malout', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(312, 'Sri Muktsar Sahib', '32', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(313, 'Kabarwala', '32', 2, 1, '897666', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(315, 'Barnala ', '33', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(316, 'Mahal Kalan', '33', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(317, 'Tapa Bhadaur', '33', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(318, 'Bhinder Kalan', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(320, 'Bagha Purana', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(321, 'Dharamkot', '34', 2, 1, '142042', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(322, 'Marhi  Mustafa', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(323, 'Moga', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(324, 'Buttar Badhni', '34', 2, 1, '234232', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(325, 'Nihal Singh Wala  ', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(326, 'Kot Ise Khan', '34', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(327, 'Amritsar', '35', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(329, 'Hoshiarpur         ', '37', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(330, 'Mukerian            ', '37', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(331, 'Apra             ', '38', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(332, 'Jalandhar', '38', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(334, 'Kapurthala', '39', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(336, 'Balachaur', '40', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(337, 'Mukandpur', '40', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(338, 'Ropar', '41', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(339, 'Bhikhi Wind', '42', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(340, 'Tarntaran', '42', 2, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(341, 'Anupghar', '43', 4, 1, '335701', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(342, 'Sri Karanpur', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(343, 'Keri', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(344, 'Gharsana', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(345, 'Dhringha wali', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(346, 'Padampur', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(347, 'Banda kalony', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(348, 'Raisingh Nager', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(349, 'VijayNagar', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(350, 'Shri Gurusar Modia', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(351, 'Shri GangaNager', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(352, 'Sameja Kothi', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(353, 'Suratgarh', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(354, 'Chak Mahrajka /Lalgarh', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(355, 'Sadul Shehar', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(356, 'Rawla', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(357, 'Rattewala', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(358, 'Kesri Singh Pur', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(359, '1 C', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(360, '63 G.B', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(361, 'GajjSingh Pur', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(362, 'Choonawad', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(363, 'Jaitsar', '43', 4, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(364, 'Behwala', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(365, 'Ridmalsar', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(366, 'Ladhuwala', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(367, '365 Head', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(368, '32 M L', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(369, '3 j j Khichyain', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(370, 'Sahjipura', '44', 4, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(371, 'Fefana /Nohar', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(372, 'Hanumangarh', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(373, 'Mahrana', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(374, 'Nethrana', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(375, 'Bhagwanpura', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(376, 'Pilibanga', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(377, 'Sangria', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(378, 'Tibbi', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(379, 'Rawatsar', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(380, 'Pakka Sharna', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(381, 'Bhadra', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(382, 'Silwala Khurd', '44', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(383, 'Panwar', '45', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(384, 'Bhiwani Mandi', '45', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(385, 'Bandikui', '46', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(386, 'Mandawar', '46', 4, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(387, 'Dosa', '46', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(388, 'Alwar', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(389, 'Rajgarh', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(390, 'Bahror', '47', 4, 1, '301701', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(391, 'Kishangarhvas', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(392, 'Ajijpura', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(393, 'Tijara', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(394, 'Mubarakpur', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(396, 'Chirwai', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(397, 'Bahadur pur', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(398, 'Desula', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(399, 'Shah Jahan Pur', '47', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(400, 'Rajgarh', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(401, 'Sidhmukh', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(402, 'Rajpura', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(403, 'Churu', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(404, 'Dadrewa', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(405, 'Sardar Shahar ', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(406, 'TaraNagar', '48', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(407, 'Phulera', '49', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(408, 'Jamwaramgarh', '49', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(410, 'Kautpotli', '49', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(411, 'Jaipur', '49', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(412, 'Badhal', '49', 4, 1, '303602', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(413, 'Neem Ka Thana', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(414, 'Shri Madhopur', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(415, 'Khandela', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(416, 'Pattanvati', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(417, 'Fatehpuri', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(418, 'Sikar', '50', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(419, 'Udaypurvati', '51', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(420, 'Khethri', '51', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(421, 'Pilani', '51', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(422, 'Jhunjhunu', '51', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(423, 'Malsisar', '51', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(424, 'Kota', '52', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(425, 'Itawa', '52', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(426, 'Bikaner', '53', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(427, 'Khajuwala', '53', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(428, 'Shri Kolayat', '53', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(429, 'Bundi', '54', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(430, 'Keshavravpattan', '54', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(431, 'Bharatpur', '55', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(432, 'Flaudi', '56', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(433, 'Baran', '388', 4, 1, '325205', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(434, 'Todabheem', '58', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(435, 'Rawat Bhata', '59', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(436, 'Dhaulpur', '60', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(437, 'Kotra', '278', 4, 1, '307025', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(438, 'Tonk', '62', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(439, 'Hardi ', '63', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(440, 'Kodwa ', '64', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(441, 'Baikunthpur', '65', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(442, 'Karoti', '66', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(443, 'Binkara', '67', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(444, 'Kelhari', '65', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(445, 'Vishrampur', '66', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(446, 'Srinagar', '68', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(447, 'Jarhi  ', '69', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(448, 'Bijuri', '69', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(449, 'Koriya', '65', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(450, 'Anuppur (MP)', '69', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(451, 'Narela Alipur ', '341', 8, 1, '456455', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(452, 'Gokulpur', '187', 8, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(454, 'Babarpur', '187', 8, 1, '234223', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(455, 'Vikaspuri', '73', 8, 1, '121234', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(456, 'Shahdara', '187', 8, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(459, 'Burari', '341', 8, 1, '123125', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(460, 'Karawal Nagar', '187', 8, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(462, 'Palam', '73', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(463, 'Mehrauli', '74', 8, 1, '456464', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(464, 'Rohtash Nagar', '187', 8, 1, '324323', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(465, 'Purvi Delhi', '187', 8, 1, '234232', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(466, 'Dallupura', '74', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(467, 'Sangam Vihar  Devli', '74', 8, 1, '456444', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(468, 'Bawana', '341', 8, 1, '656577', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(471, 'Tughlakabad', '74', 8, 1, '675675', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(472, 'Prem Nagar kirari', '341', 8, 1, '657567', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(474, 'Badarpur', '74', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(475, 'Okhla', '74', 8, 1, '456545', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(476, 'Mangolpuri', '341', 8, 1, '454566', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(477, 'Uttam Nagar', '73', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(478, 'Jahangirpuri', '341', 8, 1, '675755', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(479, 'Trilokpuri', '74', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(480, 'Patparganj ', '74', 8, 1, '234234', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(481, 'Rohini', '341', 8, 1, '564564', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(482, 'Badli', '341', 8, 1, '123122', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(485, 'Dhodar', '77', 6, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(487, 'Aser Sarola', '79', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(488, 'Nagda', '80', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(489, 'Obdulaganj', '81', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(492, 'Kailaras', '84', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(493, 'Ambah', '85', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(494, 'Gwalior', '92', 6, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(495, 'Sultanpur', '87', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(497, 'Shahganj', '89', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(498, 'Budni', '90', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(500, 'Aamla', '223', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(501, 'Shivpur', '93', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(502, 'Manjholi', '94', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(503, 'Agra Dehat', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(504, 'Agra Cantt', '95', 3, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(505, 'Kheragarh', '95', 3, 1, '283121', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(506, 'Fatehabad', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(507, 'Aidmatpur', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(508, 'Jagner', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(509, 'Tehra', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(510, 'Dayalbag', '95', 3, 1, '282005', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(511, 'Bah', '95', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(512, 'Ajamgarh', '96', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(513, 'Brouli', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(514, 'Atrouli', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(515, 'Dhanipur Mandi', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(517, 'Aligarh Shahar', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(518, 'Eglas', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(519, 'Khair', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(520, 'Tiloi Mohanganj ', '98', 3, 1, '229309', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(521, 'Gouriganj', '98', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(522, 'Amethi', '98', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(523, 'Mandi Dhanoura', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(524, 'Hasanpur', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(525, 'Amroha', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(526, 'Atrasi', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(527, 'Dhavarasi', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(528, 'Gangeshwari', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(529, 'Kelsa', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(530, 'Jeerkhi', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(531, 'Gajroula', '99', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(533, 'Bisouli', '100', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(535, 'Mayau', '100', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(536, 'Bagpat', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(537, 'Baraut', '101', 3, 1, '250611', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(538, 'Barnawa', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(539, 'Chhaproli', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(540, 'Doghat', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(541, 'Khekra', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(542, 'Aminagar Saraye', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(543, 'Dhanaura', '101', 3, 1, '250622', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(544, 'Jonmana', '101', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(548, 'Nagina', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(549, 'Bijnour', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(550, 'Nahtour', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(551, 'Chandpur', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(552, 'Dhampur', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(553, 'Noorpur', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(554, 'DaraNagar Ganj', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(555, 'Dayalwala', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(556, 'Barhapur', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(557, 'Najibabad', '104', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(558, 'Siyana', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(560, 'Dibai', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(561, 'Shikarpur', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(562, 'Pahasu', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(563, 'Khurja', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(565, 'Agota', '105', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(567, 'Bulandshahar', '105', 3, 1, '111111', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(568, 'Eta', '106', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(569, 'Ghumari', '106', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(570, 'Etawa', '107', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(571, 'Bharthana', '107', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(572, 'Ayodhaya', '108', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(573, 'Gosaiganj', '108', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(574, 'Bikapur', '108', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(575, 'Sohawal', '108', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(576, 'Milkipur', '108', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(577, 'Kayamganj', '109', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(578, 'Farukhabad', '109', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(581, 'Sarsaganj', '109', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(583, 'Loni Shahar', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(584, 'Modinagar', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(585, 'Sahibabad', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(586, 'Ghaziabad', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(587, 'New Ghaziabad', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(588, 'Patla', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(589, 'Rajapur', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(590, 'Murad Nagar', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(591, 'Inderapuri', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(592, 'Loni Dehat', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(593, 'Khora', '110', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(594, 'Gorakhpur', '111', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(595, 'Dadri', '112', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(596, 'Noida Phase-1', '112', 3, 1, '201303', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(597, 'Noida Phase-2', '112', 3, 1, '201301', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(598, 'Dankour', '112', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(599, 'Surajpur', '112', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(600, 'Dhummanikpur', '112', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(601, 'Jewar', '112', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(602, 'Hapur', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(603, 'Pilkhua', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(604, 'Dhoulana', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(605, 'Garhmukhteshver', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(606, 'Simbhaoli', '113', 3, 1, '234563', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(607, 'Shyampur Jat', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(609, 'Peernagar Sudna', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(610, 'Nawada', '113', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(611, 'Hardoi', '114', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(612, 'Sikandrarao', '115', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(613, 'Sadabad', '115', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(614, 'Hathras', '115', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(615, 'Kanouj', '116', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(616, 'Kasganj', '340', 3, 1, '123199', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(617, 'Sidpura', '116', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(618, 'Ammapur', '116', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(619, 'Kushi Nagar', '117', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(621, 'Lakhnow', '119', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(622, 'Sarojani Nagar', '119', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(623, 'Karhal', '120', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(624, 'Mainpuri', '120', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(625, 'Bhongaon', '120', 3, 1, '205262', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(626, 'Kishni', '120', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(627, 'Kurawali', '120', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(629, 'Mant ', '121', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(630, 'Baldev', '121', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(631, 'Chhata', '121', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(633, 'Gazipur', '122', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(634, 'Mau', '122', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(635, 'Siwal Khas', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(636, 'Sardhana', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(637, 'Dourala', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(638, 'Hastinapur', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(639, 'Meerut Dakshin', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(640, 'Meerut City', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(641, 'Ganga Nagar', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(642, 'Kithor', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(643, 'Mawana', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(644, 'Kila Parikshit  Garh', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(645, 'Fajalpur', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(646, 'Falavada', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(647, 'Sakouti', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(648, 'Rohta', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(649, 'Sarurpur', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(650, 'Jainpur', '123', 3, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(651, 'Bilari', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(652, 'Muradabad City', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(653, 'Muradabad Dehat', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(654, 'Kanth', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(655, 'Thakurduwara', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(656, 'Kundarki', '124', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(658, 'Shahpur', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(659, 'Charthawal', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(660, 'Purkaji', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(661, 'Muzafar Nagar East', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(662, 'Muzafar Nagar West', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(663, 'Khatouli', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(664, 'Mirapur', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(665, 'Rampur Tiraha', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(666, 'Bhopa', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(668, 'Mansurpur', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(669, 'Jansath', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(670, 'Mohammadpur Rai Singh', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(671, 'Dhoulra', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(672, 'Baghara', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(673, 'Ouraya', '126', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(675, 'Puranpur', '128', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(676, 'Bilaspur', '129', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(677, 'Maswasi', '129', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(678, 'Rampur', '129', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(679, 'Deoband', '130', 3, 1, '247554', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(680, 'Rampura Maniharan', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(681, 'Nanouta', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(682, 'Gangoh', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(683, 'Nakur', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(684, 'Saharanpur Dehat', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(685, 'Saharanpur City', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(686, 'Behat', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(687, 'Maheshpur', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(688, 'Nagal', '130', 3, 1, '247551', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(689, 'Puwaraka', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(690, 'Barouli', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(691, 'Ambahetapeer', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(692, 'Chilkana', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(693, 'Sarsava', '130', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(694, 'Sheemli', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(695, 'Bhatpura', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(696, 'Sambhal', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(697, 'Babrala', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(698, 'Chandosi', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(699, 'Junabai', '131', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(700, 'Banda', '132', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(701, 'Meeranpur Katra', '132', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(702, 'Un', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(703, 'Shamli', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(704, 'Kandhla', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(705, 'Thana Bhawan', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(706, 'Garhi Pukhta', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(707, 'Babari', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(708, 'Kertu', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(709, 'Kairana', '133', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(710, 'Sultanpur', '134', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(712, 'Pharenda - Nautanwa', '136', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(713, 'Barabanki ', '137', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(714, 'Son Varsha', '138', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(715, 'B Kothi Purnia', '139', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(716, 'Bhagalpur', '140', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(717, 'Samstipur', '141', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(718, 'Madhepura', '142', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(719, 'Katiayar', '143', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(720, 'Jehanabad', '144', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(721, 'Sasaram', '145', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(722, 'Narkhatiaganj', '146', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(723, 'Ghorha Sahan', '147', 11, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(724, 'Saharsa', '148', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', '');
INSERT INTO `tbblock` (`blockid`, `blockname`, `blockdistrictid`, `blockstateid`, `blockcountryid`, `blockpincode`, `createdby`, `createdon`, `modifiedby`, `modifiedon`, `blkactsts`, `blockname_hi`, `blockname_pb`, `blockrawname`, `blockremark`) VALUES
(725, 'Navada Narhat', '149', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(726, 'Kaimur', '150', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(727, 'Begusarai', '151', 11, 1, '851101', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(728, 'Muzzafarpur', '152', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(729, 'Melbourne', '153', 62, 2, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(730, 'Brisbane', '154', 63, 2, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(731, 'Sydney', '155', 64, 2, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(733, 'New Zealand', '157', 66, 4, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(734, 'Canada', '158', 81, 3, '00000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(735, 'Doha Qatar', '159', 68, 6, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(736, 'UK', '160', 69, 8, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(737, 'Kuwait', '161', 70, 9, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(738, 'Rome ( Italy )', '162', 71, 10, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(739, 'Cyprus', '163', 72, 11, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(740, 'Ahmedabad', '178', 16, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(743, 'Indaura', '214', 5, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(747, 'Sujanpur', '182', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(748, 'Mithana', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(749, 'kharkhoda', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(750, 'Kila', '123', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(751, 'Nagpur', '183', 9, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(753, 'athpadi', '183', 9, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(754, 'Phaltan \\\\\\', '203', 9, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(755, 'Mumbai', '184', 9, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(756, 'bazpur', '166', 10, 1, '262401', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(758, 'gajsinghpur', '43', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(759, 'sundar nagar', '186', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(760, 'Haldwani', '167', 10, 1, '123452', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(761, 'HAMIRPUR', '182', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(763, 'Mustafabad', '187', 8, 1, '131212', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(764, 'London', '188', 73, 12, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(765, 'Matiyala', '73', 8, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(766, 'China', '189', 74, 13, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(767, 'RENUKA', '190', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(768, 'Nangal Choudhary', '6', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(770, 'Majholi', '193', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(771, 'Karnatka', '194', 36, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(772, 'Bilaspur', '195', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(774, 'Obaidullaganj', '87', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(776, 'Harda sheopur', '196', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(777, 'Kelaras', '197', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(778, 'Shahganj', '90', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(780, 'Indore', '198', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(781, 'Karoti', '199', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(782, 'Shrinagar', '199', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(783, 'Bisrampur', '66', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(784, 'Sirsagang', '200', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(785, 'Dehradun', '165', 10, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(787, 'Paonta sahib', '190', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(788, 'Wazidpur', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(790, 'Harigarh Kingan', '19', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(792, 'Keshavpura', '52', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(793, 'Chhatarpur', '74', 8, 1, '456456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(794, 'Dhaula Kuan', '190', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(799, 'Nepal', '202', 75, 14, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(800, 'Kala Amb', '190', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(802, 'Nangal Kalan', '22', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(803, 'Sahaspur', '165', 10, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(804, 'USA', '204', 76, 15, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(805, 'Bhawanigarh', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(806, 'Mehma Goniana', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(810, 'Lochman', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(811, 'Dhablan', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(812, 'Bathinda', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(816, 'Chibbranwali', '32', 2, 1, '242978', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(817, 'Ghanaur', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(819, 'Kachwi', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(820, 'Mehlan Chowk', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(821, 'Lalouchhi', '26', 2, 1, '768768', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(822, 'Madanpur Chalheri', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(823, 'Badshah Pur', '26', 2, 1, '234233', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(824, 'Manuke', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(825, 'Hardaspur', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(828, 'Ram Nagar', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(831, 'Mandaur', '26', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(832, 'Lalru', '24', 2, 1, '111111', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(835, 'Azam wala', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(838, 'Ladda', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(839, 'Gowara', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(840, 'Guru Har Sahai', '29', 2, 1, '234233', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(841, 'Khuiya Sarwar', '30', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(842, 'Sandaur', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(843, 'Sadiq', '31', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(845, 'Tuer', '24', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(846, 'Pehowa', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(854, 'Umri', '12', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(868, 'Indri', '16', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(870, 'Sounta', '1', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(872, 'Khizrabad', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(877, 'Sadhaura', '20', 1, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(878, 'Bapoli', '13', 1, 1, '132103', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(879, 'Buwan', '11', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(880, 'Saraswati Nagar', '20', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(882, 'Gharaunda', '16', 1, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(887, 'Kosli', '8', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(890, 'Nethrana', '44', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(897, 'Kotputli', '49', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(898, 'Tibbi', '44', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(899, 'Silwala Khurd', '44', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(909, 'Bhagwanpura', '44', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(940, 'Dharamshala ', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(941, 'Pathankot', '215', 5, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(942, 'Palam Pur ', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(944, 'Nagrota Bagwan', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(946, 'Garli', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(947, 'Haripur', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(948, 'Nadaun', '182', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(951, 'Nala garh', '180', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(952, 'Una', '217', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(954, 'Shimla', '218', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(955, 'Dehra', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(961, 'Kol', '97', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(962, 'Anoop Shahar', '105', 3, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(963, 'Sikandrabad', '105', 3, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(965, 'Gulaothi', '105', 3, 1, '121231', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(968, 'Vikasnagar', '165', 10, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(971, 'Betul', '223', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(973, 'Sindhicamp', '87', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(975, 'Kelaras', '224', 6, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(977, 'Baikunthpur', '226', 23, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(978, 'Shrinagar', '66', 23, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(979, 'Binakra', '67', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(980, 'Bijori', '227', 23, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(984, 'Khanauri', '25', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(985, 'Rampura Phul', '21', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(987, 'Jhok Hari Har', '29', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(990, 'Dighal', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(992, 'Goriya', '17', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(997, 'Bhadra', '44', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1004, 'Najafgarh', '73', 8, 1, '123321', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1006, 'SultanPur Majra', '341', 8, 1, '564565', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1012, 'Kangra', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1030, 'Baran', '243', 1, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1066, 'Hisar', '10', 1, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1067, 'Mandawar', '209', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1069, 'Kathiyan', '182', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1072, 'Hambran', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1074, 'UK', '251', 77, 8, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1075, 'Lebanon', '252', 78, 17, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1076, 'Canberra', '253', 79, 2, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1077, 'Badhra', '2', 1, 1, '123308', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1078, 'Kathiyala', '180', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1081, 'Morna', '125', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1082, 'badli', '11', 1, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1088, 'NurMahal', '38', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1093, 'Banaras', '255', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1096, 'majheen', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1097, 'Sindhi camp', '87', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1099, 'Mandidip', '87', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1100, 'Kelhari', '226', 23, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1102, 'Mullanpur', '27', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1103, 'Nawan Shahar', '40', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1213, 'Chopata', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1284, 'Shikohabad', '200', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1322, 'Pathankot', '312', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1334, 'Sundar Nagar', '317', 4, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1348, 'Batala', '321', 2, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1354, 'Mandi deep', '322', 6, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1355, 'Dera Bassi    ', '24', 2, 1, '234661', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1365, 'Nangloi', '73', 8, 1, '123122', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1369, 'Palam', '326', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1377, 'Subhash Nagar', '73', 8, 1, '123212', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1380, 'Uttam Nagar', '325', 3, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1390, 'Matiyala', '325', 3, 1, '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1393, 'Jaspur', '166', 10, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1394, 'Khajni', '111', 3, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1396, 'Jawalamukhi', '214', 5, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1397, 'Govindgarh', '49', 4, 1, '303712', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1398, 'Khagriya', '330', 11, 1, '851205', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1399, 'supaol', '329', 11, 1, '852131', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1401, 'Nagri', '214', 5, 1, '176059', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1402, 'Jaisinghpur', '214', 5, 1, '176095', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1404, 'Canada-BC', '332', 80, 3, '000001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1405, 'Nandgram', '110', 3, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1406, 'Budhana', '125', 3, 1, '251309', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1407, 'Bahrain', '333', 82, 18, '0000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1408, 'Dhaliara', '214', 5, 1, '0000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1409, 'Nehran pukhar', '214', 5, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1410, 'Dadasiba', '214', 5, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1411, 'Nagrota suriyan', '214', 5, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1412, 'Kanjhawla', '73', 8, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1415, 'Singapore', '334', 61, 7, '222222', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1416, 'Rajwada(Son Varsha)', '138', 11, 1, '843330', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1417, 'Ghorha Sahan', '147', 11, 1, '845303', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1418, 'Malaysia', '335', 83, 19, '111111', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1419, 'Jwali', '214', 5, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1420, 'Darbhanga', '336', 11, 1, '846004', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1421, 'Sadakpur Jonmana', '101', 3, 1, '250611', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1422, 'Adelaide', '337', 84, 2, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1423, 'Kashipur', '166', 10, 1, '244713', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1425, 'Roorkee', '164', 10, 1, '247667 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1426, 'Pragpur', '214', 5, 1, '177107', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1427, 'Gadarpur', '166', 10, 1, '263152', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1428, 'Rudarpur', '166', 10, 1, '263153', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1429, 'Sittarganj', '166', 10, 1, '262405', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1430, 'Jaspur', '166', 10, 1, '244712', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1431, 'Nainital', '167', 10, 1, '263139', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1432, 'Haridwar', '221', 10, 1, '249401 ', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1433, 'RamnagarNainital', '167', 10, 1, '244715', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1434, 'Narkanda', '218', 5, 1, '123456', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1435, 'Amb', '217', 5, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1436, 'Solan', '180', 5, 1, '123123', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1438, 'Hyderabad', '338', 55, 1, '500003', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1439, 'Hyderabad', '338', 55, 1, '500001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1440, 'Jhansi', '339', 3, 1, '284001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1441, 'Khanpur ', '164', 10, 1, '247663', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1442, 'Bangran', '190', 5, 1, '173025', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1443, 'Nahan', '190', 5, 1, '173001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1444, 'Firozabad Paschim	', '200', 3, 1, '283203', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1445, 'Firozabad Purvi	', '200', 3, 1, '283203', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1446, 'Saudi Arabia', '342', 85, 20, '123890', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1447, 'NIT Faridabad	', '343', 1, 1, '121001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1448, 'Madanhedi', '24', 2, 1, '678976', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1449, 'Ajrour', '26', 2, 1, '456546', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1450, 'Nand Nagari', '187', 8, 1, '234235', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1451, 'Darjeeling ', '344', 22, 1, '734101', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1452, 'Philippine', '360', 88, 21, '1107', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1453, 'Chennai', '346', 28, 1, '600001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1455, 'Puri', '348', 86, 1, '752001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1456, 'Chhatarpur', '349', 6, 1, '440035', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1457, 'Haridwar', '164', 10, 1, '249401 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1458, 'Rahmatpur ', '164', 10, 1, '247667 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1459, 'Bahadarabad ', '164', 10, 1, '249402 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1460, 'Laksar', '164', 10, 1, '247663 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1461, 'Bhagwanpur', '164', 10, 1, '247661', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1462, 'Mohanpur', '164', 10, 1, '247667', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1463, 'Jhabrera', '164', 10, 1, '247665', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1464, 'Gurukul Narsan', '164', 10, 1, '247670', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1465, 'Kolkata', '351', 22, 1, '700001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1466, 'Danapur ', '352', 11, 1, '800012', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1467, 'Kochi', '353', 13, 1, '682001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1468, 'Visakhapatnam ', '354', 12, 1, '530002', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1470, 'Mangalore', '356', 36, 1, '575001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1471, 'Kadwa', '357', 11, 1, '854105', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1472, 'Bengaluru', '194', 36, 1, '562157', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1473, 'Jammu', '358', 19, 1, '180001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1474, 'Rishikesh', '165', 10, 1, '249201 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1475, 'Siliguri ', '344', 22, 1, '734001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1476, 'Surat', '359', 16, 1, '394101', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1477, 'Bayana', '16', 1, 1, '132054', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1478, 'Rajendhra gram jarhi', '227', 23, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1479, 'Sangli', '361', 9, 1, '416416', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1480, 'Atpadi', '361', 9, 1, '415301', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1481, 'Pathankot', '362', 5, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1482, 'Budaun', '363', 3, 1, '243601', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1483, 'Bisauli ', '363', 3, 1, '243720', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1484, 'Bilsi', '363', 3, 1, '243633', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1485, 'Jang Bahadurganj', '364', 3, 1, '261505', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1486, 'Lakhimpur Kheri', '364', 3, 1, '262701', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1487, 'Dhanora ', '365', 9, 1, '442606', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1488, 'Gadchiroli ', '365', 9, 1, '442605', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1489, 'Kisan Nagar', '366', 9, 1, '441225', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1490, 'Bhabua ', '150', 11, 1, '821101', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1491, 'Baheri', '367', 3, 1, '243201', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1492, 'Bareilly ', '367', 3, 1, '243002', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1493, 'New Tehri', '170', 10, 1, '249001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1494, 'Auraiya', '369', 3, 1, '206122', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1495, 'Gunga ', '368', 6, 1, '462101', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1496, 'Aamapur', '340', 3, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1497, 'Kanpur', '370', 3, 1, '208001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1498, 'Mahoba', '371', 3, 1, '210427', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1499, 'Shankargarh ', '372', 3, 1, '212108', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1500, 'Kaushambi', '373', 3, 1, '212214', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1501, 'Deoria ', '374', 3, 1, '274001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1502, 'Gandhidham ', '375', 16, 1, '370201 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1503, 'Basti', '376', 3, 1, '272001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1504, 'Khurahat ', '122', 3, 1, '276403', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1505, 'Pratapgarh', '377', 3, 1, '0000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1506, 'Kunda', '377', 3, 1, '230204', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1507, 'Jainpur', '123', 3, 1, '250502 ', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1508, 'Rajgarh', '378', 6, 1, '465661', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1509, 'Nasik', '379', 9, 1, '422001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1510, 'Meyau', '363', 3, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1511, 'Satara', '203', 9, 1, '415001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1512, 'Pune', '191', 9, 1, '411002', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1513, 'Phaltan', '203', 9, 1, '415523', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(1514, 'Sheopur', '225', 6, 1, '000000', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1515, 'Manpur', '225', 6, 1, '476337', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1516, 'Dhodar', '225', 6, 1, '476337', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1517, 'Nagda', '381', 6, 1, '454001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1518, 'Maharajganj ', '136', 3, 1, '273303', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1519, 'Sitarganj', '166', 10, 1, '262405', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1520, 'Lodh', '169', 10, 1, '263620 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1521, 'Vrindavan ', '121', 3, 1, '281121', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1523, 'Mathura ', '121', 3, 1, '281001 ', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1524, 'Ratlam', '382', 6, 1, '457001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1525, 'Unnao', '383', 3, 1, '209801', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1527, 'Hoshangabad', '384', 6, 1, '461001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1528, 'Ujjain', '386', 6, 1, '456006', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1529, 'Bhopal', '368', 6, 1, '462004', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1530, 'Pink Roses (Budni)', '90', 6, 1, '466445', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1531, 'Ex Students- Little Roses', '15', 1, 1, '125055', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1532, 'Jorhat', '387', 27, 1, '785001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1533, 'Gonda', '389', 3, 1, '271001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1534, 'Ghanghata', '390', 3, 1, '272162', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1535, 'Pathardeva', '374', 3, 1, '274404', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1536, 'Nizamabad', '96', 3, 1, '276206', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1537, 'Chitrakoot', '391', 3, 1, '210202', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1538, 'Nanaura ', '371', 3, 1, '284124', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1539, 'Kanpur Dehat', '370', 3, 1, '208001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1540, 'Almora', '169', 10, 1, '263601', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1541, 'Palamu', '392', 17, 1, '829107', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1543, 'Butter Lion', '15', 1, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1544, 'Adba', '396', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1545, 'Ersaman', '395', 21, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1546, 'Sawai Madhopur', '394', 4, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1549, 'Kalyan Pur', '393', 11, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1550, 'Mysore', '194', 36, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1551, 'Coimbatore', '346', 28, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1552, 'Rowriah', '387', 16, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1553, 'Daskroi', '178', 16, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1554, 'Nepal', '202', 75, 14, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1555, 'Bajda', '397', 1, 1, '', NULL, '2022-05-14 16:30:51', NULL, '2022-05-14 16:30:51', 1, '', '', '', ''),
(1556, 'Adilabad', '398', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1557, 'Bhadradri Kothagudem', '399', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1558, 'Hanumakonda', '400', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1559, 'Hyderabad', '338', 55, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1560, 'Jagtial', '401', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1561, 'Jangoan', '402', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1562, 'Jayashankar Bhoopalpally', '403', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1563, 'Jogulamba Gadwal', '404', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1564, 'Kamareddy', '405', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1565, 'Karimnagar', '406', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1566, 'Khammam', '407', 55, 1, '', NULL, '2022-07-04 10:46:28', NULL, '2022-07-04 10:46:28', 1, '', '', '', ''),
(1567, 'Komaram Bheem Asifabad', '408', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1568, 'Mahabubabad', '409', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1569, 'Mahabubnagar', '410', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1570, 'Mancherial', '411', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1571, 'Medak', '412', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1572, 'Medchal-Malkajgiri', '413', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1573, 'Mulug', '414', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1574, 'Nagarkurnool', '415', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1575, 'Nalgonda', '416', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1576, 'Narayanpet', '417', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1577, 'Nirmal', '418', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1578, 'Nizamabad', '419', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1579, 'Peddapalli', '420', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1580, 'Rajanna Sircillia', '421', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1581, 'Rangareddy', '422', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1582, 'Sangareddy', '423', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1583, 'Siddipet', '424', 55, 1, '', NULL, '2022-07-04 10:49:40', NULL, '2022-07-04 10:49:40', 1, '', '', '', ''),
(1584, 'Suryapet', '425', 55, 1, '', NULL, '2022-07-04 10:57:55', NULL, '2022-07-04 10:57:55', 1, '', '', '', ''),
(1585, 'Vikarabad', '426', 55, 1, '', NULL, '2022-07-04 10:57:55', NULL, '2022-07-04 10:57:55', 1, '', '', '', ''),
(1586, 'Wanaparthy', '427', 55, 1, '', NULL, '2022-07-04 10:58:16', NULL, '2022-07-04 10:58:16', 1, '', '', '', ''),
(1587, 'Warangal', '428', 55, 1, '', NULL, '2022-07-04 10:58:16', NULL, '2022-07-04 10:58:16', 1, '', '', '', ''),
(1588, 'Yadari Bhuvanagiri', '429', 55, 1, '', NULL, '2022-07-04 10:59:23', NULL, '2022-07-04 10:59:23', 1, '', '', '', ''),
(1589, 'UAE', '156', 65, 5, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1595, 'Kutch', '375', 16, 1, '', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1596, 'Amreli', '435', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1597, 'Anand', '436', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1598, 'Aravalli', '437', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1599, 'Banaskantha', '438', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1600, 'Bharuch', '439', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1601, 'Bhavnagar', '440', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1602, 'Botad', '441', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1603, 'Chhota Udaipur', '442', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1604, 'Dahod', '443', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1605, 'Dang', '444', 16, 1, '', NULL, '2022-07-08 12:01:41', NULL, '2022-07-08 12:01:41', 1, '', '', '', ''),
(1606, 'Devbhoomi Dwarka', '445', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1607, 'Gandhinagar', '446', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1608, 'Gir Somnath', '447', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1609, 'Jamnagar', '448', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1610, 'Junagadh', '449', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1611, 'Kheda', '450', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1612, 'Mahisagar', '451', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1613, 'Mehsana', '452', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1614, 'Morbi', '453', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1615, 'Narmada', '454', 16, 1, '', NULL, '2022-07-08 12:06:56', NULL, '2022-07-08 12:06:56', 1, '', '', '', ''),
(1616, 'Navsari', '455', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1617, 'Panchmahal', '456', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1618, 'Patan', '457', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1619, 'Porbandar', '458', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1620, 'Rajkot', '459', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1621, 'Sabarkantha', '460', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1622, 'Surendranagar', '461', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1623, 'Tapi', '462', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1624, 'Vadodara', '463', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1625, 'Valsad', '464', 16, 1, '', NULL, '2022-07-08 12:10:00', NULL, '2022-07-08 12:10:00', 1, '', '', '', ''),
(1626, 'Fatehgarh Sahib', '28', 2, 1, '', NULL, '2022-07-10 13:45:55', NULL, '2022-07-10 13:45:55', 1, '', '', '', ''),
(1627, 'Bhind', '470', 0, 0, '0000', '1', '2022-07-10 14:51:41', '1', '2022-07-10 14:51:41', 1, '', '', '', ''),
(1628, 'Prayagraj', '372', 0, 0, '0000', '1', '2022-07-10 14:54:51', '1', '2022-07-10 14:54:51', 1, '', '', '', ''),
(1629, 'Mandi', '186', 0, 0, '0000', '1', '2022-07-10 14:58:23', '1', '2022-07-10 14:58:23', 1, '', '', '', ''),
(1630, 'Birmingham', '482', 101, 12, '', NULL, '2022-07-25 17:11:07', NULL, '2022-07-25 17:11:07', 1, '', '', '', ''),
(1631, 'Manchester', '483', 102, 12, '', NULL, '2022-07-25 17:13:44', NULL, '2022-07-25 17:13:44', 1, '', '', '', ''),
(1632, 'Leeds', '484', 103, 12, '', NULL, '2022-07-25 17:15:51', NULL, '2022-07-25 17:15:51', 1, '', '', '', ''),
(1633, 'Scotland', '485', 104, 12, '', NULL, '2022-07-25 17:25:52', NULL, '2022-07-25 17:25:52', 1, '', '', '', ''),
(1634, 'Kalanwali', '15', 1, 1, '', NULL, '2022-07-27 11:47:43', NULL, '2022-07-27 11:47:43', 1, '', '', '', ''),
(1635, 'Jaisalmer', '486', 4, 1, '', NULL, '2022-08-11 07:53:47', NULL, '2022-08-11 07:53:47', 1, '', '', '', ''),
(1636, 'Jalour', '487', 4, 1, '', NULL, '2022-08-11 07:55:29', NULL, '2022-08-11 07:55:29', 1, '', '', '', ''),
(1637, 'Patna', '352', 11, 1, '', NULL, '2022-08-11 07:56:56', NULL, '2022-08-11 07:56:56', 1, '', '', '', ''),
(1638, 'Garhi', '3', 1, 1, '', NULL, '2022-08-12 10:24:35', NULL, '2022-08-12 10:24:35', 1, '', '', '', ''),
(1639, 'Tarab Ganj', '389', 3, 1, '271001', NULL, NULL, NULL, NULL, 1, '', '', '', ''),
(1640, 'khadri', '20', 1, 1, '', NULL, '2023-01-01 16:25:49', NULL, '2023-01-01 16:25:49', 1, '', '', '', ''),
(1641, 'saharnpur', '488', 3, 1, '', NULL, '2023-03-09 02:44:34', NULL, '2023-03-09 02:44:34', 1, '', '', '', ''),
(1642, 'Nagaur', '489', 4, 1, '', NULL, '2023-03-12 04:04:13', NULL, '2023-03-12 04:04:13', 1, '', '', '', ''),
(1643, 'Balbera', '26', 2, 1, '', NULL, '2023-03-12 06:17:22', NULL, '2023-03-12 06:17:22', 1, '', '', '', ''),
(1644, 'Dhanori', '18', 1, 1, '', NULL, '2023-03-22 03:49:37', NULL, '2023-03-22 03:49:37', 1, '', '', '', ''),
(1645, 'Nuh', '490', 1, 1, '', NULL, '2023-03-26 04:19:35', NULL, '2023-03-26 04:19:35', 1, '', '', '', ''),
(1646, 'Thiruvananthapuram', '491', 13, 1, '695011', NULL, '2023-04-02 08:00:50', NULL, '2023-04-02 08:00:50', 1, '', '', '', ''),
(1647, 'Toronto', '492', 81, 3, '', NULL, '2023-06-07 12:47:01', NULL, '2023-06-07 12:47:01', 1, '', '', '', ''),
(1648, 'Madhubani', '493', 11, 1, '', NULL, '2023-06-18 11:54:21', NULL, '2023-06-18 11:54:21', 1, '', '', '', ''),
(1649, 'Darwin', '494', 105, 2, '', NULL, '2023-06-19 02:42:26', NULL, '2023-06-19 02:42:26', 1, '', '', '', ''),
(1650, 'Hobart', '495', 106, 2, '', NULL, '2023-06-19 02:43:04', NULL, '2023-06-19 02:43:04', 1, '', '', '', ''),
(1651, 'Perth', '496', 107, 2, '', NULL, '2023-06-19 02:43:32', NULL, '2023-06-19 02:43:32', 1, '', '', '', ''),
(1652, 'Mandhata', '377', 3, 1, '', NULL, '2023-06-19 02:52:46', NULL, '2023-06-19 02:52:46', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbstate`
--

CREATE TABLE `tbstate` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(45) DEFAULT NULL,
  `stateshortname` varchar(10) NOT NULL,
  `statecountryid` int(11) DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `modifiedby` varchar(45) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `staactsts` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbstate`
--

INSERT INTO `tbstate` (`stateid`, `statename`, `stateshortname`, `statecountryid`, `createdby`, `createdon`, `modifiedby`, `modifiedon`, `staactsts`) VALUES
(1, 'Haryana', 'HR', 1, 'Admin', '2013-05-03 14:21:34', 'Admin', '2013-05-03 14:21:34', 1),
(2, 'Punjab', 'PB', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(3, 'Uttar Pradesh', 'UP', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(4, 'Rajasthan', 'RJ', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(5, 'Himachal Pradesh', 'HP', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(6, 'Madhya Pradesh', 'MP', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(7, 'Chandigarh', 'CHD', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(8, 'Delhi', 'DLH', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(9, 'Maharashtra', 'MH', 1, 'Admin', '2013-05-03 14:21:35', 'Pankaj Garg', '2015-11-28 00:03:47', 1),
(10, 'UttaraKhand', 'UK', 1, 'Admin', '2013-05-03 14:21:35', 'Pankaj Garg', '2015-11-28 00:04:00', 1),
(11, 'Bihar', 'BR', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(12, 'Andhra Pradesh', 'AP', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(13, 'Kerala', 'KL', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(16, 'Gujarat', 'GJ', 1, 'Admin', '2013-05-03 14:21:35', 'Pankaj Garg', '2015-11-28 00:05:53', 1),
(17, 'Jharkhand', 'JK', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(18, 'Nepal', 'NP', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(19, 'Jammu & Kashmir', 'JK', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(21, 'Odisha', 'OR', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(22, 'West Bengal', 'WB', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(23, 'Chattisgarh', 'CG', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(27, 'Assam', 'AS', 1, 'Admin', '2013-05-03 14:21:35', 'Admin', '2013-05-03 14:21:35', 1),
(28, 'Tamil Nadu', 'TN', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(36, 'Karnataka', 'KA', 1, 'Admin', '2013-05-03 14:21:36', 'Pankaj Garg', '2015-11-28 01:04:12', 1),
(38, 'Nagaland', 'NL', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(39, 'Manipur', 'MN', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(40, 'Sikkim', 'SK', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(41, 'Meghalaya', 'ML', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(42, 'Tripura', 'TR', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(43, 'Mizoram', 'MZ', 1, 'Admin', '2013-05-03 14:21:36', 'Admin', '2013-05-03 14:21:36', 1),
(55, 'Telangana', 'TS', 1, 'Pankaj Garg', '2015-11-28 00:06:39', 'Pankaj Garg', '2015-11-28 00:06:39', 1),
(56, 'Qatar', 'QTR', 1, 'Arun Dabas', '2015-11-30 04:26:26', 'Arun Dabas', '2015-11-30 04:26:26', 1),
(59, 'Brampton', 'CA', 3, 'Arun Dabas', '2015-12-03 10:18:00', 'Arun Dabas', '2015-12-03 10:18:00', 1),
(61, 'Singapore', 'SGP', 7, '', '2017-05-03 08:14:09', '', '2017-05-03 08:14:09', 1),
(62, 'Melbourne', '', 2, NULL, NULL, NULL, NULL, 1),
(63, 'Brisbane', '', 2, NULL, NULL, NULL, NULL, 1),
(64, 'Sydney', '', 2, NULL, NULL, NULL, NULL, 1),
(65, 'UAE', '', 5, NULL, NULL, NULL, NULL, 1),
(66, 'New Zealand', '', 4, NULL, NULL, NULL, NULL, 1),
(68, 'Doha', '', 6, NULL, NULL, NULL, NULL, 1),
(70, 'Kuwait', '', 9, NULL, NULL, NULL, NULL, 1),
(71, 'Rome', '', 10, NULL, NULL, NULL, NULL, 1),
(72, 'Cyprus', '', 11, NULL, NULL, NULL, NULL, 1),
(73, 'London', '', 12, NULL, NULL, NULL, NULL, 1),
(74, 'China', '', 13, NULL, NULL, NULL, NULL, 1),
(75, 'Nepal', '', 14, NULL, NULL, NULL, NULL, 1),
(76, 'USA', '', 15, NULL, NULL, NULL, NULL, 1),
(77, 'UK', '', 8, NULL, NULL, NULL, NULL, 1),
(78, 'Lebanon', '', 17, NULL, NULL, NULL, NULL, 1),
(79, 'Canberra', '', 2, NULL, NULL, NULL, NULL, 1),
(80, 'BC-Canada', '', 3, NULL, NULL, NULL, NULL, 1),
(81, 'Canada', '', 3, NULL, NULL, NULL, NULL, 1),
(82, 'Bahrain', '', 18, NULL, NULL, NULL, NULL, 1),
(83, 'Malaysia', '', 19, NULL, NULL, NULL, NULL, 1),
(84, 'Adelaide', '', 2, NULL, NULL, NULL, NULL, 1),
(85, 'Saudi Arabia', '', 20, NULL, NULL, NULL, NULL, 1),
(88, 'Philippine', '', 21, NULL, NULL, NULL, NULL, 1),
(89, 'Andaman and Nicobar', '', 1, NULL, NULL, NULL, NULL, 1),
(90, 'Arunachal Pradesh', '', 1, NULL, NULL, NULL, NULL, 1),
(91, 'Dadra and Nagar Haveli', '', 1, NULL, NULL, NULL, NULL, 1),
(92, 'Daman and Diu', '', 1, NULL, NULL, NULL, NULL, 1),
(93, 'Goa', '', 1, NULL, NULL, NULL, NULL, 1),
(94, 'Lakshadweep', '', 1, NULL, NULL, NULL, NULL, 1),
(95, 'Puducherry', '', 1, NULL, NULL, NULL, NULL, 1),
(101, 'Birmingham', '', 12, NULL, '2022-07-25 17:10:22', NULL, '2022-07-25 17:10:22', 1),
(102, 'Manchester', '', 12, NULL, '2022-07-25 17:13:08', NULL, '2022-07-25 17:13:08', 1),
(103, 'Leeds', '', 12, NULL, '2022-07-25 17:14:53', NULL, '2022-07-25 17:14:53', 1),
(104, 'Scotland', '', 12, NULL, '2022-07-25 17:25:21', NULL, '2022-07-25 17:25:21', 1),
(105, 'Darwin', '', 2, NULL, '2023-06-19 02:37:48', NULL, '2023-06-19 02:37:48', 1),
(106, 'Hobart', '', 2, NULL, '2023-06-19 02:38:04', NULL, '2023-06-19 02:38:04', 1),
(107, 'Perth', '', 2, NULL, '2023-06-19 02:38:21', NULL, '2023-06-19 02:38:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bills`
--

CREATE TABLE `tb_bills` (
  `billId` int(11) NOT NULL,
  `billPoId` int(11) NOT NULL,
  `billDepartmentId` int(11) NOT NULL,
  `billIsPaymentDone` int(11) NOT NULL,
  `billNameAt` varchar(100) NOT NULL,
  `billVendorId` int(11) NOT NULL,
  `billVendorName` varchar(200) NOT NULL,
  `billVendorAccountNo` varchar(100) DEFAULT NULL,
  `billVendorIFSCcode` varchar(20) DEFAULT NULL,
  `billVendorBank` varchar(200) DEFAULT NULL,
  `billPaymentType` varchar(20) DEFAULT NULL,
  `billAmount` decimal(10,2) NOT NULL,
  `billPaidAmount` decimal(10,2) NOT NULL,
  `billPurpose` varchar(500) NOT NULL,
  `billReference` varchar(200) NOT NULL,
  `billCheque` varchar(20) NOT NULL,
  `billRemarks` varchar(500) NOT NULL,
  `billCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `billCreatedBy` int(11) NOT NULL,
  `billImageUrl` varchar(500) NOT NULL,
  `billPaymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bills`
--

INSERT INTO `tb_bills` (`billId`, `billPoId`, `billDepartmentId`, `billIsPaymentDone`, `billNameAt`, `billVendorId`, `billVendorName`, `billVendorAccountNo`, `billVendorIFSCcode`, `billVendorBank`, `billPaymentType`, `billAmount`, `billPaidAmount`, `billPurpose`, `billReference`, `billCheque`, `billRemarks`, `billCreatedAt`, `billCreatedBy`, `billImageUrl`, `billPaymentMethod`) VALUES
(1, 3, 2, 1, 'Hello', 2, '', '', '', '', '', 0.00, 0.00, '', '', '', '', '2023-12-25 16:04:06', 1, 'datafiles/c4ca4238a0b923820dcc509a6f75849b.pdf', ''),
(2, 3, 2, 0, 'Test', 2, '1', NULL, NULL, NULL, 'Advance Payment', 345234.00, 2345.00, '234523', 'sdfgsdfg', '', 'sdfgtyertertyety', '2023-12-25 16:21:55', 34, '', ''),
(3, 3, 3, 1, '', 1, '1', NULL, NULL, NULL, 'Partial Payment', 2345.00, 2354.00, 'ertfxcvbxvb', 'fgtwert', '', 'wertwertwert', '2023-12-25 16:26:10', 1, '', ''),
(4, 1, 3, 1, 'Hi', 2, '1', NULL, NULL, NULL, 'Advance Payment', 23452.00, 23452.00, 'ghdfghdfgh', '345rghdfghd', '', 'hdghdfghdfghdh', '2023-12-25 16:27:27', 1, '', ''),
(5, 1, 2, 1, '', 1, 'veerpal', NULL, NULL, NULL, 'Advance Payment', 23452.00, 23452.00, 'ghdfghdfgh', '345rghdfghd', '', 'hdghdfghdfghdh', '2023-12-25 16:28:02', 1, 'datafiles/e4da3b7fbbce2345d7772b0674a318d5.jpg', ''),
(6, 1, 2, 0, '', 1, 'veerpal', NULL, NULL, NULL, 'Advance Payment', 23452.00, 23452.00, 'ghdfghdfgh', '345rghdfghd', '', 'hdghdfghdfghdh', '2023-12-25 16:28:02', 1, '', ''),
(7, 1, 3, 0, '', 1, '1', NULL, NULL, NULL, 'Partial Payment', 2345.00, 2354.00, 'ertfxcvbxvb', 'fgtwert', '', 'wertwertwert', '2023-12-25 16:26:10', 1, '', ''),
(8, 1, 2, 0, 'Hello', 2, '', '', '', '', '', 0.00, 0.00, '', '', '', '', '2023-12-25 16:04:06', 1, '', ''),
(9, 1, 2, 0, '', 1, 'veerpal', NULL, NULL, NULL, 'Advance Payment', 23452.00, 23452.00, 'ghdfghdfgh', '345rghdfghd', '', 'hdghdfghdfghdh', '2023-12-25 16:28:02', 1, '', ''),
(10, 1, 2, 0, 'Hello', 2, '', '', '', '', '', 0.00, 0.00, '', '', '', '', '2023-12-25 16:04:06', 1, '', ''),
(11, 1, 2, 0, 'Test', 2, '1', NULL, NULL, NULL, 'Total Payment', 345234.00, 2345.00, '234523', 'sdfgsdfg', '', 'sdfgtyertertyety', '2023-12-25 16:21:55', 1, '', ''),
(12, 1, 3, 0, '', 1, '1', NULL, NULL, NULL, 'Partial Payment', 2345.00, 2354.00, 'ertfxcvbxvb', 'fgtwert', '', 'wertwertwert', '2023-12-25 16:26:10', 1, '', ''),
(13, 4, 2, 1, '.sdkjfkasf', 1, '', NULL, NULL, NULL, 'Total Payment', 1250.00, 125.00, 'lsdfj lasdjf', 'kljdfkl', '', 'lksjdf', '2023-12-26 21:59:48', 34, '', ''),
(14, 5, 2, 0, 'Veerpal singh', 2, '', NULL, NULL, NULL, 'Total Payment', 10000.00, 5000.00, 'ac', 'sdlkj l lksdj flj sldkjfkl  klsdjf', '', ' kl sdjlfjkj lj lj kljlkfgj lsk dfg', '2023-12-27 15:09:56', 34, 'datafiles/aab3238922bcc25a6f606eb525ffdc56.pdf', ''),
(15, 7, 4, 1, 'mask automation', 3, '', NULL, NULL, NULL, 'Total Payment', 1000.00, 100.00, 'fdsdfas', 'asdf', '', 'asdfa', '2023-12-28 17:08:23', 34, 'datafiles/9bf31c7ff062936a96d3c8bd1f8f2ff3.pdf', ''),
(17, 9, 2, 0, 'sfasdfas', 3, '', NULL, NULL, NULL, 'Partial Payment', 0.00, 99999999.99, 'sdfgsdf', 'vbxcvb', '', 'xcvbxcbv', '2023-12-30 10:46:46', 34, '', 'P.O. For Cheque'),
(18, 10, 2, 0, 'vsdfasdf', 3, '', NULL, NULL, NULL, 'Partial Payment', 0.00, 345234.00, 'gsdfgsd', 'fgsdfg', '', 'sdfgsdfg', '2023-12-30 11:34:50', 34, '', 'P.O. For Net Banking');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departmentaccess`
--

CREATE TABLE `tb_departmentaccess` (
  `accessId` int(11) NOT NULL,
  `accessUserId` int(11) NOT NULL,
  `accessDepartmentId` int(11) NOT NULL,
  `accessIsPermitted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_departmentaccess`
--

INSERT INTO `tb_departmentaccess` (`accessId`, `accessUserId`, `accessDepartmentId`, `accessIsPermitted`) VALUES
(1, 1, 3, 0),
(2, 1, 2, 1),
(3, 13, 3, 1),
(4, 13, 2, 1),
(5, 34, 2, 1),
(6, 34, 3, 1),
(7, 34, 4, 1),
(8, 35, 2, 1),
(9, 35, 3, 1),
(10, 35, 4, 1),
(11, 35, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `historyId` int(11) NOT NULL,
  `historyPoId` int(11) DEFAULT NULL,
  `historyBillId` int(11) DEFAULT NULL,
  `historyUserId` int(11) DEFAULT NULL,
  `historyCreatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `historyContent` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`historyId`, `historyPoId`, `historyBillId`, `historyUserId`, `historyCreatedAt`, `historyContent`) VALUES
(1, 0, 16, 41, '2023-12-29 12:43:20', 'Create Bill'),
(2, 8, 0, 41, '2023-12-29 12:54:27', 'Create PO'),
(3, 6, 2, 41, '2023-12-29 14:08:01', 'Remove Bill from PO 6 due to fgsdfgsdgsdg'),
(4, 0, 13, 41, '2023-12-29 14:53:55', 'No'),
(5, 0, 13, 41, '2023-12-29 14:53:57', 'No'),
(6, 0, 14, 41, '2023-12-29 15:08:25', 'Upload Attachment'),
(7, 0, 5, 41, '2023-12-29 15:37:09', 'Upload Attachment'),
(8, 3, 0, 41, '2023-12-29 16:05:53', 'Update Po Status to centralStore'),
(9, 8, 0, 41, '2023-12-29 16:07:00', 'Update Po Status to centralStore'),
(10, 3, 0, 42, '2023-12-29 16:52:20', 'Update Po Status to approval1'),
(11, 3, 0, 35, '2023-12-29 16:56:43', 'Update Po Status to approval2'),
(12, 3, 0, 13, '2023-12-29 16:58:44', 'Update Po Status to approval3'),
(13, 3, 0, 36, '2023-12-29 16:59:39', 'Update Po Status to payer'),
(14, 0, 13, 34, '2023-12-29 17:07:40', 'No'),
(15, 4, 0, 34, '2023-12-29 17:07:47', 'Update Po Status to approval1'),
(16, 5, 0, 34, '2023-12-29 17:09:08', 'Update Po Status to approval1'),
(17, 3, 0, 34, '2023-12-29 17:22:02', 'Update Po Status to done'),
(18, 6, 0, 34, '2023-12-29 17:24:38', 'Update Po Status to approval1'),
(19, 4, 0, 35, '2023-12-29 17:25:22', 'Update Po Status to accountant'),
(20, 5, 0, 35, '2023-12-29 17:27:36', 'Update Po Status to approval2'),
(21, 5, 0, 13, '2023-12-29 17:28:23', 'Update Po Status to approval3'),
(22, 5, 0, 36, '2023-12-29 17:29:02', 'Update Po Status to payer'),
(23, 5, 0, 34, '2023-12-29 17:29:49', 'Update Po Status to done'),
(24, 5, 0, 34, '2023-12-29 17:34:23', 'Update Po Status to done'),
(25, 0, 17, 34, '2023-12-30 10:46:46', 'Create Bill'),
(26, 0, 18, 34, '2023-12-30 11:34:50', 'Create Bill'),
(27, 9, 0, 34, '2023-12-30 11:36:36', 'Create PO'),
(28, 10, 0, 34, '2023-12-30 11:37:32', 'Create PO'),
(29, 0, 0, 1, '2023-12-30 13:07:42', 'update password of user id 32'),
(30, 0, 0, 1, '2023-12-30 13:08:40', 'update password of user id 32'),
(31, 0, 0, 1, '2023-12-30 13:10:54', 'update password of user id 32'),
(32, 0, 0, 1, '2023-12-30 13:11:01', 'update password of user id 33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paymentorder`
--

CREATE TABLE `tb_paymentorder` (
  `poId` int(11) NOT NULL,
  `poFirmId` int(11) NOT NULL,
  `poAmount` decimal(10,2) NOT NULL,
  `poDate` date NOT NULL,
  `poNo` varchar(20) NOT NULL,
  `poBank` varchar(100) NOT NULL,
  `poBalance` decimal(10,2) NOT NULL,
  `poTitle` varchar(200) NOT NULL,
  `poCurrentStatus` varchar(50) NOT NULL,
  `poCreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paymentorder`
--

INSERT INTO `tb_paymentorder` (`poId`, `poFirmId`, `poAmount`, `poDate`, `poNo`, `poBank`, `poBalance`, `poTitle`, `poCurrentStatus`, `poCreatedBy`) VALUES
(1, 2, 0.00, '2023-12-26', '', 'fgdfgh', 0.00, 'P.O. For Cheque', '6', 34),
(2, 2, 0.00, '2023-12-26', '', 'sbi', 1200.00, 'P.O. For Cheque', '4', 34),
(3, 2, 0.00, '2023-12-26', '', '', 0.00, 'P.O. For Cheque', 'done', 34),
(4, 2, 0.00, '2023-12-27', '', '', 0.00, 'P.O. For Net Banking', 'accountant', 34),
(5, 2, 0.00, '2023-12-27', '', 'SBI', 12000.00, 'P.O. For Net Banking', 'done', 34),
(6, 2, 0.00, '2023-12-28', '', '', 0.00, 'P.O. For Cheque', 'approval1', 34),
(7, 4, 0.00, '2023-12-28', '', '', 0.00, 'P.O. For Cheque', '4', 34),
(8, 2, 0.00, '2023-12-29', '', '', 0.00, 'P.O. For Cheque', 'centralStore', 41),
(9, 2, 0.00, '2023-12-30', '', '', 0.00, 'P.O. For Cheque', 'accountant', 34),
(10, 2, 0.00, '2023-12-30', '', '', 0.00, 'P.O. For Net Banking', 'accountant', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tb_po_status`
--

CREATE TABLE `tb_po_status` (
  `statusId` int(11) NOT NULL,
  `statusUserid` int(11) NOT NULL,
  `statusPoId` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `statusDate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_po_status`
--

INSERT INTO `tb_po_status` (`statusId`, `statusUserid`, `statusPoId`, `status`, `statusDate`) VALUES
(1, 34, 5, 'accountant', '2023-12-29 17:09:08'),
(2, 34, 3, 'accountant', '2023-12-29 17:22:02'),
(3, 34, 6, 'accountant', '2023-12-29 17:24:38'),
(4, 35, 4, 'approval1', '2023-12-29 17:25:22'),
(5, 35, 5, 'approval1', '2023-12-29 17:27:36'),
(6, 13, 5, 'approval2', '2023-12-29 17:28:23'),
(7, 36, 5, 'approval3', '2023-12-29 17:29:02'),
(8, 34, 5, 'accountant', '2023-12-29 17:29:49'),
(9, 34, 5, 'payer', '2023-12-29 17:34:23'),
(10, 34, 9, 'accountant', '2023-12-30 11:36:36'),
(11, 34, 10, 'accountant', '2023-12-30 11:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_remarks`
--

CREATE TABLE `tb_remarks` (
  `remarksId` int(11) NOT NULL,
  `remarksPOId` int(11) NOT NULL,
  `remarksContent` varchar(1000) NOT NULL,
  `remarksBy` int(11) NOT NULL,
  `remarksCreatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_remarks`
--

INSERT INTO `tb_remarks` (`remarksId`, `remarksPOId`, `remarksContent`, `remarksBy`, `remarksCreatedAt`) VALUES
(1, 8, 'slk fjlsj flajks dklfj askldj flkj askldj fkljaskld jfkl jaskl jlkf jkl jkldfj klasj dklfjlksaj dlkf jlk asjkl djfkl jasdf', 41, '2023-12-29 16:26:01'),
(2, 8, 'ghdfghdfgh', 41, '2023-12-29 16:25:12'),
(3, 3, 'check hai ji', 42, '2023-12-29 16:52:20'),
(4, 3, 'checked hai', 35, '2023-12-29 16:56:43'),
(5, 3, 'ok hai ji ', 13, '2023-12-29 16:58:44'),
(6, 3, 'done hai krdo payment', 36, '2023-12-29 16:59:39'),
(7, 4, 'sdfasdfasdfsdf', 34, '2023-12-29 17:07:47'),
(8, 5, 'sdfasdfsf', 34, '2023-12-29 17:09:08'),
(9, 3, 'done', 34, '2023-12-29 17:22:02'),
(10, 6, 'sfdfsdfsdf', 34, '2023-12-29 17:24:38'),
(11, 4, 'send', 35, '2023-12-29 17:25:22'),
(12, 5, 'dfasfasdf', 35, '2023-12-29 17:27:36'),
(13, 5, 'sfdsfsdf', 13, '2023-12-29 17:28:23'),
(14, 5, 'dasdad', 36, '2023-12-29 17:29:02'),
(15, 5, 'asdasdasd', 34, '2023-12-29 17:29:49'),
(16, 5, 'adadad', 34, '2023-12-29 17:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `roleId` int(11) NOT NULL,
  `roleKey` varchar(100) NOT NULL,
  `roleTitle` varchar(100) NOT NULL,
  `roleOrder` int(11) NOT NULL,
  `roleIsAccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`roleId`, `roleKey`, `roleTitle`, `roleOrder`, `roleIsAccount`) VALUES
(1, 'admin', 'Admin', 6, 1),
(2, 'accountant', 'Accountant', 1, 1),
(3, 'approval1', 'Approval 1', 3, 1),
(4, 'approval2', 'Approval 2', 4, 1),
(5, 'approval3', 'Approval 3', 5, 1),
(6, 'centralStore', 'Central Store', 2, 1),
(7, 'done', 'Done', 8, 0),
(8, 'payer', 'Payer', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_vendors`
--

CREATE TABLE `tb_vendors` (
  `vendorId` int(11) NOT NULL,
  `vendorName` varchar(100) DEFAULT NULL,
  `vendorAccountNo` varchar(100) DEFAULT NULL,
  `vendorIFSCCode` varchar(50) DEFAULT NULL,
  `vendorBank` varchar(500) DEFAULT NULL,
  `vendorCreatedAt` date DEFAULT NULL,
  `vendorMobile` varchar(15) DEFAULT NULL,
  `vendorAddress` varchar(500) DEFAULT NULL,
  `vendorCreatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `loginaccess` varchar(50) DEFAULT NULL,
  `isCentralStore` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `department` int(11) NOT NULL,
  `contact1` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `email1` varchar(20) NOT NULL,
  `email2` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `profilePicAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `password`, `loginaccess`, `isCentralStore`, `isActive`, `department`, `contact1`, `contact2`, `email1`, `email2`, `created_at`, `createdBy`, `profilePicAt`) VALUES
(1, 'Veerpal Singh', '', 'er.veerpal@gmail.com', 'veerpal123', 'superadmin', 0, 0, 0, '', '', '', '', '2023-08-03 17:02:29', 0, '2023-08-26 08:45:00'),
(13, 'Karam Singh', '', 'approval2@gmail.com', '123456', 'approval2', 0, 1, 2, '87987', '', '', '', '2023-08-13 18:00:04', 1, '2023-08-24 09:47:00'),
(32, 'Veeru', 'male', 'testmail@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 0, 0, 0, '9914243526', '', '', '', '2023-11-09 05:23:15', 1, NULL),
(33, 'Veeru', 'male', 'testmqail@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 0, 0, 0, '9914243526', '', '', '', '2023-11-09 05:23:38', 1, NULL),
(34, 'Demo1', 'female', 'account1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'accountant', 0, 1, 4, '123456789', '', '', '', '2023-12-25 16:46:07', 1, '2023-12-26 12:18:00'),
(35, 'approve1', 'male', 'approve1@gmail.com', '123456', 'approval1', 0, 1, 3, '', '', '', '', '2023-12-28 09:44:48', 1, NULL),
(36, 'approve3 account', 'male', 'approve3@gmail.com', '123456', 'approval3', 0, 1, 2, '', '', '', '', '2023-12-28 11:53:55', 1, NULL),
(41, 'Central Accountant', 'male', 'centralstore@gmail.com', '123456', 'accountant', 1, 1, 2, '32165412354', '', '', '', '2023-12-29 05:53:57', 1, NULL),
(42, 'Central Store', 'male', 'cstore@gmail.com', '123456', 'centralStore', 0, 1, 2, '5465615654', '', '', '', '2023-12-29 11:15:33', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesspermission`
--
ALTER TABLE `accesspermission`
  ADD PRIMARY KEY (`permissionId`);

--
-- Indexes for table `access_list`
--
ALTER TABLE `access_list`
  ADD PRIMARY KEY (`listId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`);

--
-- Indexes for table `tbblock`
--
ALTER TABLE `tbblock`
  ADD PRIMARY KEY (`blockid`),
  ADD KEY `blockid` (`blockid`),
  ADD KEY `blockstateid` (`blockstateid`);

--
-- Indexes for table `tbstate`
--
ALTER TABLE `tbstate`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `tb_bills`
--
ALTER TABLE `tb_bills`
  ADD PRIMARY KEY (`billId`);

--
-- Indexes for table `tb_departmentaccess`
--
ALTER TABLE `tb_departmentaccess`
  ADD PRIMARY KEY (`accessId`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`historyId`);

--
-- Indexes for table `tb_paymentorder`
--
ALTER TABLE `tb_paymentorder`
  ADD PRIMARY KEY (`poId`);

--
-- Indexes for table `tb_po_status`
--
ALTER TABLE `tb_po_status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `tb_remarks`
--
ALTER TABLE `tb_remarks`
  ADD PRIMARY KEY (`remarksId`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tb_vendors`
--
ALTER TABLE `tb_vendors`
  ADD PRIMARY KEY (`vendorId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesspermission`
--
ALTER TABLE `accesspermission`
  MODIFY `permissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `access_list`
--
ALTER TABLE `access_list`
  MODIFY `listId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbblock`
--
ALTER TABLE `tbblock`
  MODIFY `blockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1653;

--
-- AUTO_INCREMENT for table `tbstate`
--
ALTER TABLE `tbstate`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_bills`
--
ALTER TABLE `tb_bills`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_departmentaccess`
--
ALTER TABLE `tb_departmentaccess`
  MODIFY `accessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_paymentorder`
--
ALTER TABLE `tb_paymentorder`
  MODIFY `poId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_po_status`
--
ALTER TABLE `tb_po_status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_remarks`
--
ALTER TABLE `tb_remarks`
  MODIFY `remarksId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_vendors`
--
ALTER TABLE `tb_vendors`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
