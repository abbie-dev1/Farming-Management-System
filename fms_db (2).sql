-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 09:48 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', '0610217222'),
(2, 'Abbie', 'abbie@gmail.com', 'Abbie@1996', '0670157007'),
(4, 'mazibuko', 'zibu@gmail.com', '12345', '0781118604');

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`id`, `name`, `farmer_id`, `location`) VALUES
(1, 'Good guy', 2, '258 visagie street, Pta');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `firstName`, `lastName`, `gender`, `email`, `password`, `address`, `mobile`) VALUES
(2, 'zuma', 'jacob', 'other', 'zuma.jacob@gmail.com', '12345', 'block p', '0715554367'),
(3, 'fana', 'badjie', 'male', 'gd@gmail.com', '1234', '123 sisulu pta', '0611122222'),
(4, 'farmer', 'guy', 'male', 'farm@gmail.com', '1234', '123 sisulu pta', '0611111111'),
(5, 'fana', 'ff', 'male', 'test@gmail.com', '1234', '490 Andries street', '0611111112'),
(6, 'gun', 'show', 'male', 'gdaaa@gmail.com', '1234@Abc', '123 sisulu pta', '0781118604');

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `serial_no` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `animal_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `breed_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(30) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `livestock`
--

INSERT INTO `livestock` (`serial_no`, `animal_type`, `breed_type`, `description`, `weight`, `image`, `farmer_id`, `latitude`, `longitude`, `status`) VALUES
('1ed9b48e2c', 'pony', 'horse', '', 0, 'horse/pony.jpg', 3, NULL, NULL, 'offline'),
('70a303c847', 'Goat', '', NULL, 0, '0', 5, '-25.753869599999998', '28.1963926', 'online'),
('79c5221aab', 'horse', 'draft', '', 0, 'horse/draft.jpeg', 3, NULL, NULL, 'offline'),
('7ba67830ba', 'Horse', '', '', 0, '0', 2, '-25.746', '28.1871', 'online'),
('8561b4e991', 'goat', '', '', 0, 'goat/saanen.jpeg', 3, NULL, NULL, 'offline'),
('b2acc930d2', 'Goat', '', '4 Liters', 0, '0', 2, '-26.270759299999998', '28.1122679', 'online'),
('b4911fc2fe', 'Chicken', '', NULL, 0, '0', 2, '-25.746', '28.1871', 'offline'),
('bff9c19364', 'pig', '', '', 0, 'pigs/duroc.jpg', 3, NULL, NULL, 'offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
