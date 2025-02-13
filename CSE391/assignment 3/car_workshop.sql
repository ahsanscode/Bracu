-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `car_license` varchar(255) DEFAULT NULL,
  `car_engine` varchar(255) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `mechanic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_name`, `address`, `phone`, `car_license`, `car_engine`, `appointment_date`, `mechanic_id`) VALUES
(39, 'client 1', 'ahkdgb kabg ', '01915766416', '54154521', '546584', '2025-01-01', 5),
(40, 'client 1', 'ahkdgb kabg ', '01915766416', '54154521', '546584', '2025-01-01', 5),
(41, 'client 1', 'ahkdgb kabg ', '01915766411', '54154521', '546584', '2025-01-30', 1),
(42, 'client 1', 'ahkdgb kabg ', '01915766414', '54154521', '546584', '2025-01-01', 1),
(43, 'client 1', 'ahkdgb kabg ', '01915766417', '54154521', '546584', '2025-01-01', 2),
(44, 'client 1', 'ahkdgb kabg ', '01915766411', '54154521', '546584', '2025-01-01', 1),
(45, 'client 1', 'ahkdgb kabg ', '01915766422', '54154521', '546584', '2025-01-01', 1),
(46, 'client 1', 'ahkdgb kabg ', '01915766423', '54154521', '546584', '2025-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`id`, `name`) VALUES
(1, 'Rakib Hasan'),
(2, 'Asif Iqbal'),
(3, 'Shakib Al Hasan'),
(4, 'Tamim Iqbal'),
(5, 'Mushfiqur Rahim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
