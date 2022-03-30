-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 09:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `picture`) VALUES
(1, 'protik', 'chakroborty', 'protik', '013087', 'protikchakroborty87@gmail.com', '01555-013087', 'p.jpg'),
(2, 'pritom', 'chakroborty', 'pritom', '12345', 'Protikchakroborty2@gmail.com', '01555-013087', 'p.jpg'),
(3, 'Ashfakur', 'Salehin', 'lemon', '1706014', 'ashfaqursalehin99@gmail.com', '01555-013087', 'p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'principals of electronics', 'V.K. Mehta,Rohit Mehta', '3rd', 'available', 12, 'EEE'),
(2, 'The complete reference C++', 'Herbert Schildt', '4th', 'available', 13, 'CSE'),
(3, 'Data structure', 'Seymour Lipchutz ', '4th', 'not-available', 0, 'CSE'),
(4, 'Probability & Statistics', 'waypole Myers', '9th', 'available', 3, 'CSE'),
(6, 'Microprocessor and assembly language', 'charles maruth', '9th', 'available', 20, 'CSE'),
(5, 'Fuels,Furnaces & refractories', 'O.P.Gupta', '5th', 'available', 20, 'GCE'),
(7, 'Differential calculus', 'H.K.das', '6th', 'available', 15, 'HUM');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`) VALUES
(1, 'hi'),
(2, 'good'),
(3, 'hello'),
(7, 'can you tell me when the book electrical circuits available in library?'),
(8, 'can you tell me about your library??');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `roll` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`roll`, `bid`, `status`, `issue`, `return_date`) VALUES
('1703087', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703086', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703086', 4, 'returned', '2020-01-01', '2021-10-25'),
('1703087', 2, 'returned', '2021-08-29', '2021-10-25'),
('1703086', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703087', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703087', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703086', 2, 'returned', '2021-01-15', '2021-12-07'),
('1703087', 1, 'yes', '2021-07-09', '2022-04-01'),
('1703087', 4, 'yes', '2021-08-29', '2022-04-23'),
('1703087', 3, 'yes', '2020-01-01', '2022-04-23'),
('1703081', 5, 'yes', '2021-08-29', '2022-04-23'),
('1703061', 6, '', '', ''),
('1703087', 3, 'yes', '2020-01-01', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `roll`, `dept`, `email`, `contact`, `password`, `picture`) VALUES
('pritom', 'chakroborty', 'pritom', 110087, 'CE', 'Protikchakroborty2@gmail.com', '01555-013087', '123', 'p.jpg'),
('Al hadith', 'Moon', 'Moon', 598523, 'CSE', 'Protikchakroborty2@gmail.com', '01555-013087', '1233', 'p.jpg'),
('protik', 'chakroborty', 'protik', 1703087, 'CSE', 'Protikchakroborty2@gmail.com', '01555-013087', '013087', 'p.jpg'),
('Noshin', 'Tabassum', 'noshin', 1703086, 'CSE', 'Noshin35@gmail.com', '01932456789', '1703086', 'p.jpg'),
('Mujhahidul', 'Islam', 'Muzahid', 1706016, 'GCE', 'mujahid2@gmail.com', '01521-324153', '1706016', 'p.jpg'),
('kamrul', 'hasan', 'konok', 1703081, 'CSE', 'kamrulhasan2@gmail.com', '01521-999999', '13579', 'p.jpg'),
('Fahim', 'Faisal', 'Fahim', 1703061, 'CSE', 'fahimfaisal9@gmail.com', '01521-999999', '24680', 'p.jpg'),
('Anirban', 'baroi', 'plabon', 1703082, 'CSE', 'anibaroi82@gmail.com', '01555-013087', '1703082', 'p.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
