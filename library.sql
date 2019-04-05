-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 02:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_ISBN` varchar(13) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_date_added` date NOT NULL,
  `book_date_published` date NOT NULL,
  `book_publisher` varchar(50) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_type` varchar(20) NOT NULL,
  `book_borrow_status` char(1) NOT NULL DEFAULT 'R',
  `book_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_ISBN`, `book_name`, `book_author`, `book_date_added`, `book_date_published`, `book_publisher`, `book_edition`, `book_type`, `book_borrow_status`, `book_status`) VALUES
('9781402894626', 'Guillivers Travel', 'Franklyn Ong', '2019-04-03', '1945-08-02', 'Fantagio Publishing', '1st Edition', 'Science Fiction', 'B', 'U'),
('9781523480500', 'Harry Potter and the Deathly Hallows', 'J.K Rowling', '2019-03-12', '2007-07-21', 'Skrillz Publishing', 'Special Edition', 'Romance', 'R', 'S'),
('9783598215001', 'Criminal Law', 'Mariel Pantaleon, LLB', '2019-04-03', '1991-03-04', 'Smartbooks Publishing', '3rd Edition', 'Law', 'B', 'S'),
('9783598215063', 'Obligations and Contracts', 'Gabriel Pantaleon, LLB', '2019-04-03', '1994-12-09', 'Smartbooks Publishing', 'Special Edition', 'Law', 'R', 'S'),
('9783598215087', 'English for Dummies', 'Anney Gokongwei', '2019-04-03', '2010-05-04', 'Smartbooks Publishing', '1st Edition', 'Language', 'R', 'U'),
('9783598215094', 'Journey to the Center of the Earth', 'James Gullivan', '2019-04-03', '1988-09-08', 'Skrillz Publishing', 'Full Volume', 'Science Fiction', 'R', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `book_ISBN` varchar(13) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `borrow_start_date` date NOT NULL,
  `borrow_due_date` date NOT NULL,
  `borrow_return_date` date DEFAULT NULL,
  `borrow_approval_date` date DEFAULT NULL,
  `borrow_remarks` text,
  `borrow_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `borrower_id`, `book_ISBN`, `admin_id`, `borrow_start_date`, `borrow_due_date`, `borrow_return_date`, `borrow_approval_date`, `borrow_remarks`, `borrow_status`) VALUES
(1, 1, '9783598215094', NULL, '2019-04-10', '2019-04-23', '2019-04-04', '2019-04-10', NULL, 'R'),
(2, 1, '9783598215001', NULL, '2019-04-04', '2019-05-01', NULL, NULL, NULL, 'P'),
(3, 1, '9781402894626', NULL, '2019-04-04', '2019-04-26', '2019-04-04', '2019-04-10', NULL, 'R'),
(4, 1, '9781402894626', NULL, '2019-04-04', '2019-04-04', NULL, NULL, NULL, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(11) NOT NULL,
  `borrower_name` varchar(50) NOT NULL,
  `borrower_address` text NOT NULL,
  `borrower_dob` date NOT NULL,
  `borrower_uname` varchar(50) NOT NULL,
  `borrower_password` varchar(100) NOT NULL,
  `borrower_penalty_count` int(100) NOT NULL DEFAULT '0',
  `borrower_date_added` date NOT NULL,
  `borrower_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrower_id`, `borrower_name`, `borrower_address`, `borrower_dob`, `borrower_uname`, `borrower_password`, `borrower_penalty_count`, `borrower_date_added`, `borrower_status`) VALUES
(1, 'Christian C. Barral', 'Sitio Tahna Tisa Cebu City', '1994-07-02', 'smileeypin', 'B@rral$7294', 0, '2019-04-03', 'R'),
(2, 'Yuya Hashimoto', 'åå¤å±‹ã€ã«ç•°æœ¬', '1998-02-21', 'SLTBP003', 'k18qRYHLMdeinESt', 0, '2019-04-03', 'R'),
(3, 'Yumi Morii', 'Tokyo, Japan', '1994-07-02', 'ym.morii', '2diL0F3Uk7O3BpBg', 3, '2019-04-04', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_ISBN`),
  ADD UNIQUE KEY `book_ISBN` (`book_ISBN`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
