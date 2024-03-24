-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 06:58 PM
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
-- Database: `gotravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `story_id`, `comment`, `username`) VALUES
(1, 1, 'Our new Mind Mapping tool maintains a good balance of simplicity and function and helps you bring you', 'nadim'),
(2, 2, 'Test', 'nadim'),
(3, 2, 'sdad', 'nadim'),
(4, 1, 'asdaqwewqeq', 'nadim'),
(5, 1, 'Hello Hi', 'nadim');

-- --------------------------------------------------------

--
-- Table structure for table `likecount`
--

CREATE TABLE `likecount` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `story_id` int(11) NOT NULL,
  `like_dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likecount`
--

INSERT INTO `likecount` (`id`, `username`, `story_id`, `like_dislike`) VALUES
(1, 'nadim', 2, 1),
(3, 'nadim', 1, 1),
(4, 'nadim', 3, 1),
(5, 'nadim', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `photo_url` varchar(512) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `description`, `photo_url`, `username`) VALUES
(1, 'Our new Mind Mapping tool maintains a good balance of simplicity and function and helps you bring your ideas to life. Give it a try and don\'t hesitate to share your feedback with us!', 'story_image/1575482243.png', 'nadim'),
(2, 'HP laptop price varies from model to model depending on the specifications and designs of the laptops. We bring you a sea full of different options of laptops ', 'story_image/1575570102.png', 'nadim'),
(5, 'You can use the CSS3 resize property to remove or turn-off the default horizontal and vertical resizable property of the HTML ', 'story_image/1575637873.png', 'nadim');

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
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `abstract`, `file_path`, `status`, `username`) VALUES
(1, 'Catelent-Template', 'sd', 'thesis_doc/1711301480.pdf', 1, 'nadim'),
(2, 'ddsf', 'sdf', 'thesis_doc/1711301488.pdf', 1, 'nadim'),
(3, 'afds', 'sdaa', 'thesis_doc/1711301697.pdf', 1, 'nadim'),
(4, 'werewr', 'werw', 'thesis_doc/1711301769.pdf', 0, 'naddim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(512) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `email`, `phone`, `username`, `password`, `profile_pic`, `role`) VALUES
('sad', 'sad', 'nahidul.haque.31@gmail.com', '4545554', 'naddim', '$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq', 'profile_pic/1575647224.webp', 'user'),
('Nadimul', 'Haque', 'nadim.hq321@gmail.com', '5544122', 'nadim', '$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq', 'profile_pic/1575645967.png', 'admin'),
('Nahidul', 'Haque', 'nahid@gmail.com', '4545554', 'nahid', '$2y$10$XnSxGAS7QBLTaTSkz8sk1uTDbQMsJgE3O//nBWAPAf53ZYBslw8b2', 'profile_pic/1575644158.png', 'user'),
('nadim', 'ff', 'wew@gmail.com', '01827090222', 'nnnn', '$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq', 'profile_pic/1710947652.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likecount`
--
ALTER TABLE `likecount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
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
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likecount`
--
ALTER TABLE `likecount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
