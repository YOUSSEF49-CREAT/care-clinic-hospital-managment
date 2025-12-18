-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2025 at 01:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`) VALUES
(3, 'A3SAB'),
(4, 'L9ALB'),
(5, 'MA3IDA'),
(6, 'ASNAN'),
(7, 'TAHALIL');

-- --------------------------------------------------------

--
-- Table structure for table `medecins`
--

CREATE TABLE `medecins` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `departement_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medecins`
--

INSERT INTO `medecins` (`id`, `name`, `phone`, `email`, `address`, `age`, `departement_id`) VALUES
(4, 'HAMZA HJAJI', '+1 (931) 172-1786', 'mama@mailinator.com', 'Dignissimos labore n', 96, 7),
(5, 'MOHAMMED KADIRI', '+1 (868) 696-7361', 'hucenozif@mailinator.com', 'Sequi nobis autem sa', 39, 7),
(6, 'ILYAS MOKARASO', '+1 (937) 831-3157', 'vudyn@mailinator.com', 'Qui eu excepteur ist', 25, 6),
(7, 'ALI KARA', '+1 (781) 911-1002', 'peguvave@mailinator.com', 'Incididunt tenetur d', 6, 4),
(8, 'AZIZ', '+1 (815) 601-2582', 'qiro@mailinator.com', 'Nisi ut sed aut nost', 10, 3),
(9, 'OUSSAMA', '+1 (578) 917-6163', 'dokiwor@mailinator.com', 'Impedit corporis qu', 60, 5),
(10, 'YOUSSEF FAOUZI', '+1 (352) 528-4064', 'kecadul@mailinator.com', 'Et corporis fugiat ', 77, 4),
(11, 'ABDERRAHMAN OIRGARI', '+1 (355) 513-7597', 'rabupageka@mailinator.com', 'Eligendi quos ut por', 21, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `medecin_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `address`, `age`, `medecin_id`) VALUES
(15, 'Elvis Stuart', '+1 (509) 334-9922', 'Qui expedita in dist', 11111111, 10),
(16, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(17, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(18, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(19, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(20, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(21, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(22, 'Rana Newton', '+1 (394) 147-3695', 'Totam inventore magn', 18, 6),
(23, 'Leandra Branch', '+1 (575) 932-3229', 'Dolore mollitia accu', 42, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medecins`
--
ALTER TABLE `medecins`
  ADD CONSTRAINT `medecins_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
