-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 03:22 AM
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
-- Database: `blog_database`
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
(5, 'abcde', '$2y$10$vPztpZn1eyWcsjL.QLg9peDjeJV7urTkMHVUOnWCMLM.T.odEahiy');

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
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(20) NOT NULL AUTO_INCREMENT;

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
