-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 03:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `username`, `password_hash`) VALUES
(6, 'phgthanhng', '$2y$10$ZnlZ6hO26GbC0ujkSi867eWqgx791W4UfImDk133p1OMhY6ZLCVGy'),
(7, 'abc', '$2y$10$TZG0.TfFJC4DKUrlgS/Kd.0AmzyNH503rJyY8SE2nvD/HI22b91e.'),
(9, 'a', '$2y$10$BAo4wwgEffSGN1mQ8cnVPONoIj0YhDTCXmiKhM9ZYTWTklynXe/9q'),
(10, '1934520@edu.vaniercollege.qc.c', '$2y$10$23SJ1U5uqvlbYZdNpgipneRnhVDY3dsITUJgjLvWSTUDuzOEl2YrC'),
(11, 'b', '$2y$10$lLGTZMQWw43uiWxQRRMA8uZBblr6D0L3K8CZ8SalqfIdw3KeswNqS'),
(12, 'abcd', '$2y$10$E.p7hByILKKAFeaado6kTeMFEiCv4KXg/3WtzmdQHa.YDQXv7TlRO'),
(13, 'qwe', '$2y$10$XGafspPdjXvrJj1VcTS1bu7CNiP/ww/plc7DYVLl221KvPPj4lsem'),
(14, 'test', '$2y$10$TBAucffpjHUej1sDRZW6zeLw7.eKyD/DQBHdr7eSj4aV8fqCWnP.6');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(20) NOT NULL,
  `author_id` int(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `author_id`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 6, 'Phuong Thanh', '', 'Nguyen'),
(2, 7, 'Phuong Thanh', '', 'Nguyen'),
(3, 12, 'Phuong Thanh', '', 'Nguyen'),
(4, 13, 'Phuong Thanh', '', 'Nguyen'),
(5, 14, 'Test', 'test', 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(20) NOT NULL,
  `profile_id` int(20) NOT NULL,
  `publication_title` varchar(50) NOT NULL,
  `publication_text` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `publication_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(5, 3, 'This is my first post', 'abc', '2022-03-16 23:11:35.000000', 'private'),
(6, 1, 'This is another post', 'abc', '2022-03-16 23:12:03.000000', 'public'),
(7, 5, 'Test publication title', 'Testing publication content', '2022-03-17 02:43:47.000000', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(20) NOT NULL,
  `profile_id` int(20) NOT NULL,
  `publication_id` int(20) NOT NULL,
  `publication_comment_text` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `FK_profile_author` (`author_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `FK_publication_profile` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `FK_publication_comment_profile` (`profile_id`),
  ADD KEY `FK_publication_comment_publication` (`publication_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK_publication_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `FK_publication_comment_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `FK_publication_comment_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
