-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 08:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `SRNO` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL DEFAULT '""',
  `Price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `UserID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE `mybooks` (
  `SRNO` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL DEFAULT '""',
  `Publisher` varchar(30) NOT NULL DEFAULT '""',
  `ISBN` bigint(13) UNSIGNED NOT NULL DEFAULT 0,
  `Price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `Stock` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mybooks`
--

INSERT INTO `mybooks` (`SRNO`, `Name`, `Publisher`, `ISBN`, `Price`, `Stock`) VALUES
(1, 'The Hound of Baskervilles', 'Oxford Children\'s Classics', 9781523800414, 499, 5),
(2, 'The Murder of Roger Ackroyd', 'Harper', 9780792754367, 299, 7),
(3, 'The Strange Case of Dr Jekyll and Mr Hyde', 'Dover publications', 9780460007672, 199, 4),
(4, 'Harry Potter : The Deathly Hallows', 'Bloomsbury', 9780605039070, 1100, 4),
(5, 'The Hobbit', 'HarperCollins Publishers Ltd', 9788845927553, 599, 9),
(6, 'The Trials of Apollo : The Tyrants Tomb', 'Puffin', 9788418038525, 395, 6),
(7, 'Tintin : Explorers on the Moon', ' Egmont', 9782203031401, 799, 5),
(8, 'Asterix : The Falling Sky', 'Orion Children\'s Books', 9789724144184, 699, 5),
(9, 'Bone omnibus', 'Scholastic', 9781888963144, 704, 5),
(10, 'Dive into Python', 'Apress', 9788184899115, 799, 7),
(11, 'The Algorithm Design Manual', 'Springer', 9781849967204, 5000, 4),
(12, 'Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-by-Step Guide to Creating Dynamic ', ' O′Reilly', 9781491978917, 2999, 6),
(13, 'Chapter-Topicwise Solved Papers (2019-1979) IIT-JEE (JEE Mains & Advanced)', 'Arihant', 9789350949085, 1340, 5),
(14, '31 Years Chapterwise Solutions CBSE AIPMT and NEET - Physics,Chemistry,Biology', 'Arihant', 9789313160403, 880, 6),
(15, 'How to Prepare for Quantitative Aptitude for the CAT', 'McGraw Hill Education', 9789353160180, 541, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL DEFAULT '""',
  `qty` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `Price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `UserID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Date` varchar(11) NOT NULL DEFAULT '""'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDID`, `Name`, `qty`, `Price`, `UserID`, `Date`) VALUES
(6, ' Asterix : The Falling Sky', 1, 699, 'skrishnan2001@gmail.com', '05/04/2020'),
(7, ' The Strange Case of Dr Jekyll and Mr Hyde', 2, 398, 'skrishnan2001@gmail.com', '05/04/2020'),
(8, ' Asterix : The Falling Sky', 1, 699, 'latha@gmail.com', '05/04/2020'),
(9, ' The Strange Case of Dr Jekyll and Mr Hyde', 1, 199, 'latha@gmail.com', '05/04/2020'),
(10, 'Bone omnibus', 1, 704, 'skrishnan2001@gmail.com', '05/04/2020'),
(11, 'Harry Potter : The Deathly Hallows', 2, 2200, 'skrishnan2001@gmail.com', '05/04/2020'),
(12, 'Bone omnibus', 1, 704, 'latha@gmail.com', '05/04/2020'),
(13, 'The Algorithm Design Manual', 1, 5000, 'latha@gmail.com', '05/04/2020'),
(14, ' The Strange Case of Dr Jekyll and Mr Hyde', 1, 199, 'skrishnan2001@gmail.com', '05/04/2020'),
(15, 'Chapter-Topicwise Solved Papers (2019-1979) IIT-JEE (JEE Mains & Advanced)', 2, 2680, 'skrishnan2001@gmail.com', '06/04/2020'),
(16, 'The Murder of Roger Ackroyd', 1, 299, 'skrishnan2001@gmail.com', '06/04/2020'),
(17, '31 Years Chapterwise Solutions CBSE AIPMT and NEET - Physics,Chemistry,Biology', 1, 880, 'ks72@gmail.com', '06/04/2020'),
(18, 'Dive into Python', 1, 799, 'latha@gmail.com', '06/04/2020'),
(19, 'Harry Potter : The Deathly Hallows', 2, 2200, 'latha@gmail.com', '06/04/2020'),
(20, 'The Trials of Apollo : The Tyrants Tomb', 1, 395, 'skrishnan2001@gmail.com', '06/04/2020'),
(21, 'The Trials of Apollo : The Tyrants Tomb', 2, 790, 'ks72@gmail.com', '06/04/2020'),
(22, 'Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-by-Step Guide to Creating Dynamic ', 1, 2999, 'skrishnan2001@gmail.com', '13/04/2020'),
(24, 'The Hound of Baskervilles', 2, 998, 'skrishnan2001@gmail.com', '19/04/2020'),
(25, 'Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-by-Step Guide to Creating Dynamic ', 1, 2999, 'latha@gmail.com', '19/04/2020'),
(26, 'The Hound of Baskervilles', 2, 998, 'latha@gmail.com', '19/04/2020'),
(27, 'Bone omnibus', 2, 1408, 'skrishnan2001@gmail.com', '19/04/2020'),
(28, 'Dive into Python', 1, 799, 'skrishnan2001@gmail.com', '19/04/2020'),
(31, ' The Strange Case of Dr Jekyll and Mr Hyde', 1, 199, 'latha@gmail.com', '19/04/2020'),
(32, '31 Years Chapterwise Solutions CBSE AIPMT and NEET - Physics,Chemistry,Biology', 1, 880, 'latha@gmail.com', '19/04/2020'),
(33, 'Chapter-Topicwise Solved Papers (2019-1979) IIT-JEE (JEE Mains & Advanced)', 2, 2680, 'latha@gmail.com', '19/04/2020'),
(34, 'How to Prepare for Quantitative Aptitude for the CAT', 1, 541, 'latha@gmail.com', '19/04/2020'),
(36, 'Chapter-Topicwise Solved Papers (2019-1979) IIT-JEE (JEE Mains & Advanced)', 1, 1340, 'robert@gmail.com', '20/04/2020'),
(37, 'Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-by-Step Guide to Creating Dynamic ', 4, 11996, 'robert@gmail.com', '20/04/2020'),
(39, 'The Algorithm Design Manual', 1, 5000, 'skrishnan2001@gmail.com', '27/04/2020'),
(41, 'The Algorithm Design Manual', 1, 5000, 'skrishnan2001@gmail.com', '01/05/2020'),
(42, 'Tintin : Explorers on the Moon', 2, 1598, 'skrishnan2001@gmail.com', '01/05/2020'),
(43, 'Harry Potter : The Deathly Hallows', 2, 2200, 'latha@gmail.com', '01/05/2020'),
(44, 'The Trials of Apollo : The Tyrants Tomb', 1, 395, 'latha@gmail.com', '01/05/2020'),
(45, 'Tintin : Explorers on the Moon', 2, 1598, 'latha@gmail.com', '01/05/2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First Name` varchar(20) NOT NULL DEFAULT '""',
  `Last Name` varchar(20) NOT NULL DEFAULT '""',
  `UserID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Phone` bigint(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First Name`, `Last Name`, `UserID`, `Password`, `Phone`) VALUES
('The', 'Administrator', 'admin', 'admin', 9833461356),
('Jack', 'D', 'jack@gmail.com', 'jack', 9920079259),
('John', 'Cena', 'john@xyz.com', 'cena', 9923456098),
('Srinivasan', 'K', 'ks72@gmail.com', 'ambi72', 9819291135),
('Latha ', 'R', 'latha@gmail.com', 'la1975', 9833461356),
('Robert', 'Brown', 'robert@gmail.com', 'brown123', 9855341265),
('Sriram', 'R', 'rsriram@gmail.com', 'sr1984', 9940174424),
('Krishnan', 'S', 'skrishnan2001@gmail.com', 'qwerty', 9082010775);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`SRNO`);

--
-- Indexes for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD PRIMARY KEY (`SRNO`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `SRNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

--
-- AUTO_INCREMENT for table `mybooks`
--
ALTER TABLE `mybooks`
  MODIFY `SRNO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
