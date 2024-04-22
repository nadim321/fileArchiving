-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_archiving`
--

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `abstract` varchar(5000) NOT NULL,
  `file_path` varchar(5000) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `abstract`, `file_path`, `status`, `username`, `deleted`) VALUES
(1, 'Catelent-Template', 'sd', 'thesis_doc/1711301480.pdf', 1, 'nadim', 0),
(3, 'afds', 'sdaa', 'thesis_doc/1711301697.pdf', 1, 'nadim', 1),
(4, 'werewr', 'werw', 'thesis_doc/1711301769.pdf', 1, 'naddim', 0),
(5, 'development-analytical-services-Template_New', 'Testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 'thesis_doc/1711378677.pdf', 1, 'nadim', 1),
(6, 'Catelent_template_update', 'As with Bootstrap 3, DataTables can also be integrated seamlessly with Bootstrap 4. This integration is done simply by including the DataTables Bootstrap 4 files (CSS and JS) which sets the defaults needed for DataTables to be initialised as normal, as shown in this example.', 'thesis_doc/1711378704.pdf', 1, 'nadim', 0),
(7, 'Heart disease Management System', 'Heart disease describes a range of conditions that affect the heart. Heart diseases include: Blood vessel disease, such as coronary artery disease. Irregular heartbeats (arrhythmias) Heart problems you&#39;re born with (congenital heart defects)', 'thesis_doc/1711379021.pdf', 1, 'nadim', 0),
(8, 'Papaya leaf diseases', 'Brown spot is a serious foliar disease found in most papaya producing countries. Symptoms of brown spot include light brown circular spots on leaves (Figure 1), ...', 'thesis_doc/1711379274.pdf', 1, 'naddim', 1),
(9, 'How to embed PDF viewer in HTML', 'Unfortunately, it is not possible to completely prevent a user from downloading a PDF file that is embedded in an HTML page. Even if you disable the right-click context menu, a user can still access the PDF file through the browser&#39;s developer tools or by inspecting the page source.\r\n\r\nHowever, you can make it more difficult for a user to download the PDF file by u', 'thesis_doc/1711385718.pdf', 1, 'nadim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(512) NOT NULL,
  `role` varchar(32) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `firstName`, `lastName`, `email`, `phone`, `username`, `password`, `profile_pic`, `role`, `deleted`) VALUES
(1, 'sad', 'sad', 'nahidul.haque.31@gmail.com', '4545554', 'nadim', '$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq', 'profile_pic/1575647224.webp', 'user', 0),
(3, 'super', 'admin', 'super@gmail.com', '01827090222', 'super_admin', '$2y$10$ZpKdHZPUVHSJFk9zJFTppOefzEOb.DpagL4pMHSsjKNbSqFaVcj1K', 'profile_pic/1713803054.png', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
