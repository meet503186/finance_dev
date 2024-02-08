-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 02:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendahistory`
--

CREATE TABLE `agendahistory` (
  `aghistoryId` int(11) NOT NULL,
  `historyContent` varchar(300) NOT NULL,
  `historyUserId` int(11) NOT NULL,
  `historyAgendaId` int(11) NOT NULL,
  `historyCreatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agendahistory`
--

INSERT INTO `agendahistory` (`aghistoryId`, `historyContent`, `historyUserId`, `historyAgendaId`, `historyCreatedAt`) VALUES
(1, 'Agenda created', 13, 1, '2023-08-25 00:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `agendaremarks`
--

CREATE TABLE `agendaremarks` (
  `remarksId` int(11) NOT NULL,
  `remarksContent` varchar(500) NOT NULL,
  `remarksAgendaId` int(11) NOT NULL,
  `remarksUserId` int(11) NOT NULL,
  `remarksCreatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigneddistrict`
--

CREATE TABLE `assigneddistrict` (
  `assignedId` int(11) NOT NULL,
  `assignedUserId` int(11) NOT NULL,
  `assignedDistrictId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigneddistrict`
--

INSERT INTO `assigneddistrict` (`assignedId`, `assignedUserId`, `assignedDistrictId`) VALUES
(1, 13, 1),
(2, 13, 2),
(3, 14, 3),
(4, 31, 4);

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
(1, 'All'),
(2, 'Test 2'),
(3, 'test department');

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
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingId` int(11) NOT NULL,
  `meetingTitle` varchar(100) NOT NULL,
  `meetingDetail` varchar(500) NOT NULL,
  `meetingDate` date NOT NULL,
  `meetingCreadtedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meetingCreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meetingId`, `meetingTitle`, `meetingDetail`, `meetingDate`, `meetingCreadtedAt`, `meetingCreatedBy`) VALUES
(3, 'Abc', 'aa', '2023-08-25', '2023-08-24 14:59:25', 1),
(4, 'Hello sir', 'Meeting', '2023-08-26', '2023-08-24 14:59:28', 13);

-- --------------------------------------------------------

--
-- Table structure for table `meetingdistrict`
--

CREATE TABLE `meetingdistrict` (
  `autoId` int(11) NOT NULL,
  `meetingDistrictId` int(11) NOT NULL,
  `meetId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meetingdistrict`
--

INSERT INTO `meetingdistrict` (`autoId`, `meetingDistrictId`, `meetId`) VALUES
(1, 2, 2),
(2, 1, 2),
(3, 2, 3),
(4, 1, 3),
(5, 2, 4),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskId` int(11) NOT NULL,
  `taskCode` varchar(200) NOT NULL,
  `taskStatus` varchar(20) NOT NULL,
  `taskEndDate` date DEFAULT NULL,
  `taskMeetingId` int(11) NOT NULL,
  `taskDate` datetime NOT NULL,
  `meetingName` varchar(200) NOT NULL,
  `agendaTitle` varchar(100) NOT NULL,
  `agendaDetail` varchar(500) NOT NULL,
  `taskByID` int(11) NOT NULL,
  `taskDepartment` int(11) NOT NULL,
  `taskCreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskId`, `taskCode`, `taskStatus`, `taskEndDate`, `taskMeetingId`, `taskDate`, `meetingName`, `agendaTitle`, `agendaDetail`, `taskByID`, `taskDepartment`, `taskCreatedDate`) VALUES
(1, 'a41df3d3ae41a4db6edefb60b892c04f', 'Queue', NULL, 3, '2023-08-18 00:00:00', 'Flood vich Help', 'Flood vich Help', 'All goods', 13, 3, '2023-08-24 09:17:45');

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
  `duty` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `password`, `loginaccess`, `duty`, `department`, `contact1`, `contact2`, `email1`, `email2`, `created_at`, `createdBy`, `profilePicAt`) VALUES
(1, 'Veerpal Singh', '', 'er.veerpal@gmail.com', 'veerpal123', 'superadmin', '0', '', '', '', '', '', '2023-08-03 17:02:29', 0, NULL),
(13, 'Karam Singh', '', 'dssadmin@gmail.com', '12345', 'Minister', '', 'All', '87987', '', '', '', '2023-08-13 18:00:04', 0, '2023-08-24 09:47:00'),
(14, 'veer', '', 'er.ballavraj@gmail.com', '1234', 'Minister', '', 'All', '23123', '', '', '', '2023-08-13 18:01:47', 0, NULL),
(15, 'veerpal', '', 'msg@gmail.com', '12345', 'Minister', '', 'All', '8979', '', '', '', '2023-08-13 18:03:24', 0, NULL),
(16, '', '', 'dssad1min@gmail.com', '', 'Minister', '', 'All', '', '', '', '', '2023-08-13 18:04:27', 0, NULL),
(17, '', '', 'sdfasdf@gmail.com', '', 'Minister', '', 'All', '', '', '', '', '2023-08-13 18:10:52', 0, NULL),
(18, '', '', 'er.veerpal@gmail.con', '', 'Minister', '', 'All', '', '', '', '', '2023-08-13 18:13:08', 0, NULL),
(19, '', '', 'Dharamkot.bb@gmail.com', '', 'Minister', '', 'All', '', '', '', '', '2023-08-13 18:15:36', 0, NULL),
(20, '', '', 'dssadm3in@gmail.com', '', 'Minister', '', 'All', '', '', '', '', '2023-08-13 18:16:57', 0, NULL),
(21, 'veerpal', '', 'admin@gmail.com', 'veerpal123', 'mla', 'amb', 'abc', '', '', '', '', '2023-08-20 16:26:18', 0, NULL),
(22, '', '', 'dssa23dmin@gmail.com', '', 'minister', '', 'abc', '', '', '', '', '2023-08-20 17:19:17', 0, NULL),
(23, '', '', 'dssa223dmin@gmail.com', '', 'minister', '', 'abc', '', '', '', '', '2023-08-20 17:19:36', 0, NULL),
(24, '', '', 'ms12g@gmail.com', '', 'minister', '', 'abc', '', '', '', '', '2023-08-20 17:20:30', 0, NULL),
(25, 'Naveen kumar', '', 'admin123@gmail.com', 'veerpal123', 'minister', 'ss', '1', '9876543210', '', '', '', '2023-08-22 15:39:52', 0, NULL),
(26, 'veerpal', '', 'er.veerpal12@gmail.com', '', 'minister', '', '1', '', '', '', '', '2023-08-22 15:40:46', 0, NULL),
(27, 'index.html', '', 'msg12@gmail.com', '', 'minister', '', '1', '', '', '', '', '2023-08-22 15:42:49', 0, NULL),
(28, 'cm@gmai', '', 'cm@gmail.com', 'demo', 'minister', 'CM', '1', '321654', '4525', '', '', '2023-08-24 05:18:42', 0, NULL),
(29, 'sdfgsdf', '', 'dssadm1in@gmail.com', '', 'minister', '', '1', '', '', '', '', '2023-08-24 05:45:47', 0, NULL),
(30, '', '', 'admfgin@gmail.com', '', 'minister', '', '1', '', '', '', '', '2023-08-24 05:51:19', 0, NULL),
(31, '', '', 'Dhar1amkot.bb@gmail.com', 'gfsdfgd', 'minister', '', '1', '', '', '', '', '2023-08-24 05:52:17', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendahistory`
--
ALTER TABLE `agendahistory`
  ADD PRIMARY KEY (`aghistoryId`);

--
-- Indexes for table `agendaremarks`
--
ALTER TABLE `agendaremarks`
  ADD PRIMARY KEY (`remarksId`);

--
-- Indexes for table `assigneddistrict`
--
ALTER TABLE `assigneddistrict`
  ADD PRIMARY KEY (`assignedId`);

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
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetingId`);

--
-- Indexes for table `meetingdistrict`
--
ALTER TABLE `meetingdistrict`
  ADD PRIMARY KEY (`autoId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskId`);

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
-- AUTO_INCREMENT for table `agendahistory`
--
ALTER TABLE `agendahistory`
  MODIFY `aghistoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agendaremarks`
--
ALTER TABLE `agendaremarks`
  MODIFY `remarksId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigneddistrict`
--
ALTER TABLE `assigneddistrict`
  MODIFY `assignedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meetingdistrict`
--
ALTER TABLE `meetingdistrict`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
