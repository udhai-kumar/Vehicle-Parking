-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 11:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vno` varchar(25) NOT NULL,
  `Vmodel` varchar(25) NOT NULL,
  `Vtype` varchar(25) NOT NULL,
  `Customer` varchar(25) NOT NULL,
  `Phno` varchar(15) NOT NULL,
  `Intime` datetime NOT NULL DEFAULT current_timestamp(),
  `Outime` datetime DEFAULT NULL,
  `Time` int(255) DEFAULT NULL,
  `Charges` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vno`, `Vmodel`, `Vtype`, `Customer`, `Phno`, `Intime`, `Outime`, `Time`, `Charges`) VALUES
('1234', 'HONDA ACTIVA', 'car', 'UDHAYAKUMAR S', '8969896965', '2022-11-15 09:10:59', '2022-11-15 09:11:06', 7, '10'),
('1245', 'car', 'BIKE', 'MOHANKUMAR S', '6381114701', '2022-11-15 16:58:43', '2022-11-15 16:58:49', 6, '10'),
('TN23AR2345', 'HONDA ACTIVA', 'bike', 'UDHAYAKUMAR S', '8056191717', '2022-11-15 18:35:59', '2022-11-16 18:35:50', 86391, '86400'),
('TN15T9133', 'CB SHINE', 'BIKE', 'dhanalakshmi', '8969896965', '2022-11-15 18:36:19', '2022-11-16 18:41:29', 86710, '86710'),
('TN32L3456', 'APACHE', 'BIKE', 'MOHAN', '987654321', '2022-11-16 17:27:17', NULL, NULL, NULL),
('1234', 'HONDA ACTIVA', 'BIKE', 'MOHANKUMAR S', '6381114701', '2022-11-16 18:17:57', '2022-11-17 09:54:21', 56184, '56190'),
('tn246789', 'honda', 'bike', 'xa', '6381114701', '2022-11-17 09:42:07', '2022-11-17 09:42:48', 41, '50'),
('tn12a4567', 'CB SHINE', 'BIKE', 'vijay', '8969896965', '2022-11-17 14:18:55', '2022-11-17 14:23:45', 290, '290');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
