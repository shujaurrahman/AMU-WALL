-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 09:57 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artlounge`
--

-- --------------------------------------------------------

--
-- Table structure for table `alluser`
--

CREATE TABLE `alluser` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facultyno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alluser`
--

INSERT INTO `alluser` (`id`, `name`, `email`, `username`, `facultyno`, `password`, `date`) VALUES
(3, 'Shuja Ur Rahman', 'Shujaurrehman210@myamu.ac.in', 'inshuja', '282934', '$2y$10$Tg15ErdkSPA9laFq2NDITOeqSlOYGluZ9ecrJRTa7bBRO.zE.pJaK', NULL),
(4, 'Shuja Ur Rahman', 'rahman210@myamu.ac.in', 'rahman', '282934', '$2y$10$kC/rpkqifflg2geGATCwuu3wqEL.K5D2RnEhZV6OYFwwVaQ7ia8g6', NULL),
(5, 'victoria', 'shazra@myamu.ac.in', 'shazra', '282934', '$2y$10$e9bda.gHCJi8fZVCk5GY8uE7y.jndnuEaZ9IB5o0McGSoF/bKCCyu', NULL),
(6, 'Shazra', 'shazra@myamu.ac.in', 'shazraxyz', '282934', '$2y$10$YIuVoe18Mma9INk6hfPW6.WBQ5kyPAnTi.j1YRkXCaoXtdmJlDd6y', NULL),
(7, 'Shuja Ur Rahman', 'Shujaurrehman210@myamu.ac.in', 'rahman23', '2019CAB009', '$2y$10$R0Momohdn28G2eSkT8uHouEEkIPGPECnSMjcPPZvgSoPO85A85vi2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersfile`
--

CREATE TABLE `usersfile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messgae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersfile`
--

INSERT INTO `usersfile` (`id`, `name`, `email`, `messgae`, `image`) VALUES
(6, 'Shuja Ur Rahman', 'rahman210@myamu.ac.in', 'Hello,I am a student of Compute Science at Cs Dept AMU', 's.jpg'),
(7, 'Kamran', 'rahman210@myamu.ac.in', 'Hye, I am Kamran I did undergate at Aligarh Muslim University', 'IMG_1145.jpg'),
(8, 'Nomaan', 'rahman210@myamu.ac.in', 'Hye Buddies this is Nomaan from Geology Dept..', 'IMG_2940.jpg'),
(9, 'Asad Ahmaad', 'rahman210@myamu.ac.in', 'Hello People I am asad pursueing Geology from AMU', 'Screenshot (188).png'),
(10, 'Shuja Ur Rahman', 'rahman210@myamu.ac.in', 'this is last image', '5.JPG'),
(11, 'Shuja Ur Rahman', 'rahman210@myamu.ac.in', 'Hye, I am Kamran I did undergate at Aligarh Muslim University', 'IMG_1145.jpg'),
(12, 'SHUJA UR RAHMAN', 'rahman210@myamu.ac.in', 'YE WALA BILKUL LAST HAI', '3.jpg'),
(13, 'Shuja Ur Rahman', 'rahman210@myamu.ac.in', 'Github turtorial', '1.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alluser`
--
ALTER TABLE `alluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `usersfile`
--
ALTER TABLE `usersfile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alluser`
--
ALTER TABLE `alluser`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usersfile`
--
ALTER TABLE `usersfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
