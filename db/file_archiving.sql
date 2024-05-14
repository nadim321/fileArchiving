-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:48 PM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `user`, `deleted`) VALUES
(1, 'rr rr', 'rr@gmail.coom', '021545451', 'rrr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `phone`, `designation`, `user`, `deleted`) VALUES
(1, 'Piash1111', 'aaa@gmail.com', '2133122312312', 'Professor', 'c', 0),
(2, 'Abc', 'wew@gmail.com', '0554521454', 'Professor', 'b', 0),
(4, 'Raa Raa', 'raa@gmail.com', '2155545', 'Prof', 'a', 0),
(5, 'Teacher 1', 'teacher1@gmail.com', '018270902222', 'Professorsdfsd', 'raa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_mapping`
--

CREATE TABLE `teacher_student_mapping` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_student_mapping`
--

INSERT INTO `teacher_student_mapping` (`id`, `student_id`, `teacher_id`, `deleted`) VALUES
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `abstract` varchar(5000) NOT NULL,
  `file_path` varchar(5000) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `abstract`, `file_path`, `teacher_id`, `status`, `username`, `deleted`) VALUES
(1, 'Catelent-Template', 'sd', 'thesis_doc/1711301480.pdf', 1, 1, 'nadim', 0),
(3, 'afds', 'sdaa', 'thesis_doc/1711301697.pdf', 1, 1, 'nadim', 1),
(4, 'werewr', 'werw', 'thesis_doc/1711301769.pdf', 1, 1, 'naddim', 0),
(5, 'development-analytical-services-Template_New', 'Testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 'thesis_doc/1711378677.pdf', 2, 1, 'nadim', 1),
(6, 'Catelent_template_update', 'As with Bootstrap 3, DataTables can also be integrated seamlessly with Bootstrap 4. This integration is done simply by including the DataTables Bootstrap 4 files (CSS and JS) which sets the defaults needed for DataTables to be initialised as normal, as shown in this example.', 'thesis_doc/1711378704.pdf', 2, 1, 'nadim', 0),
(7, 'Heart disease Management System', 'Heart disease describes a range of conditions that affect the heart. Heart diseases include: Blood vessel disease, such as coronary artery disease. Irregular heartbeats (arrhythmias) Heart problems you&#39;re born with (congenital heart defects)', 'thesis_doc/1711379021.pdf', 2, 1, 'nadim', 0),
(8, 'Papaya leaf diseases', 'Brown spot is a serious foliar disease found in most papaya producing countries. Symptoms of brown spot include light brown circular spots on leaves (Figure 1), ...', 'thesis_doc/1711379274.pdf', 2, 1, 'naddim', 1),
(9, 'How to embed PDF viewer in HTML', 'Unfortunately, it is not possible to completely prevent a user from downloading a PDF file that is embedded in an HTML page. Even if you disable the right-click context menu, a user can still access the PDF file through the browser&#39;s developer tools or by inspecting the page source.\r\n\r\nHowever, you can make it more difficult for a user to download the PDF file by u', 'thesis_doc/1711385718.pdf', 2, 1, 'nadim', 0),
(10, 'rr', 'rr', 'thesis_doc/1713893967.jpg', 2, 1, 'super_admin', 0),
(11, 'A system for managing cardiovascular disease', 'wefferwe4534', 'thesis_doc/1713936350.png', 0, 1, 'super_admin', 0),
(12, 'A platform designed to oversee the management of heart conditions.', 'wefferwe4534', 'thesis_doc/1713936390.png', 0, 1, 'super_admin', 0),
(13, 'Usdufssfs', 'fdgertererw', 'thesis_doc/1714368748.PNG', 4, 1, 'nadim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `phone`, `username`, `password`, `profile_pic`, `role`, `deleted`) VALUES
(1, 'sad', 'sad', 'nahidul.haque.31@gmail.com', '4545554', 'nadim', '$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq', 'profile_pic/1575647224.webp', 'student', 0),
(3, 'super', 'admin', 'super@gmail.com', '01827090222', 'super_admin', '$2y$10$ZpKdHZPUVHSJFk9zJFTppOefzEOb.DpagL4pMHSsjKNbSqFaVcj1K', 'profile_pic/1713803054.png', 'admin', 0),
(4, 'Raa', 'Raa', 'raa@gmail.com', '0215002115', 'raa', '$2y$10$MU9ZGRg5P/aGottqYvFEOeZJBz.8UwnNWvgb1m1SG79IDTM8qe8uO', 'profile_pic/1714367556.PNG', 'teacher', 0),
(5, 'rr', 'rr', 'rr@gmail.coom', '021545451', 'rrr', '$2y$10$szCLF/TjeoDKlPMBGWZLSOGSt7UohKONEU5Lzu.KIs4XslSI9Gmee', 'profile_pic/1715705930.jpg', 'student', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `teacher_student_mapping`
--
ALTER TABLE `teacher_student_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_student_mapping`
--
ALTER TABLE `teacher_student_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
