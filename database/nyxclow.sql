-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 09:56 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyxclow`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficier`
--

CREATE TABLE `beneficier` (
  `id_Beneficier` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beneficier`
--

INSERT INTO `beneficier` (`id_Beneficier`, `nom`, `prenom`, `cin`, `telephone`) VALUES
(1, 'Beneficier 2', 'benef 1 prenom', 'benef 1 cin', 'benef 1 tele'),
(2, 'benef 2 nom', 'benef 2 prenom', 'benefe 2 cin', 'benef 2 tele'),
(3, 'test', 'test', 'w44444', '06393021224'),
(5, 'nyx', 'clow', 'bw17558', '0617416169'),
(6, 'd', 'd', 'd', 'd'),
(7, 's', 's', 's', 's'),
(8, 'eltodo', 'decodo', 'xr20201', '06xxxxx'),
(9, 'aaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_Reservation` int(10) NOT NULL,
  `date_Reservation` date NOT NULL,
  `heur_Match` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `est_paye` tinyint(1) NOT NULL,
  `date_Payement` date NOT NULL,
  `id_Terrain` int(10) NOT NULL,
  `id_Beneficiere` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_Reservation`, `date_Reservation`, `heur_Match`, `est_paye`, `date_Payement`, `id_Terrain`, `id_Beneficiere`) VALUES
(2, '2020-08-21', '2020-08-21 04:31:49', 1, '2020-08-13', 2, 1),
(3, '2020-08-21', '2020-08-21 09:32:22', 1, '2020-08-13', 3, 2),
(4, '2020-08-03', '0000-00-00 00:00:00', 0, '2020-08-03', 3, 3),
(5, '2020-08-14', '0000-00-00 00:00:00', 1, '2020-08-14', 2, 1),
(6, '2020-08-14', '0000-00-00 00:00:00', 1, '2020-08-14', 2, 1),
(7, '2020-08-11', '0000-00-00 00:00:00', 0, '2020-08-11', 2, 1),
(8, '2020-08-11', '0000-00-00 00:00:00', 0, '0000-00-00', 2, 1),
(9, '2020-08-03', '0000-00-00 00:00:00', 1, '2020-01-01', 3, 3),
(10, '2020-08-03', '0000-00-00 00:00:00', 1, '2020-01-01', 3, 3),
(11, '2020-08-17', '0000-00-00 00:00:00', 0, '0000-00-00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `terrain`
--

CREATE TABLE `terrain` (
  `id_Terrain` int(11) NOT NULL,
  `Libelle_Terrain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terrain`
--

INSERT INTO `terrain` (`id_Terrain`, `Libelle_Terrain`) VALUES
(2, 'Terrain CYMB'),
(3, 'Terrain Mohamed 5'),
(4, 'terrain 3'),
(5, 'terrain 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficier`
--
ALTER TABLE `beneficier`
  ADD PRIMARY KEY (`id_Beneficier`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_Reservation`),
  ADD KEY `id_Terrain` (`id_Terrain`),
  ADD KEY `id_Beneficiere` (`id_Beneficiere`);

--
-- Indexes for table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id_Terrain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficier`
--
ALTER TABLE `beneficier`
  MODIFY `id_Beneficier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_Reservation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id_Terrain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_Terrain`) REFERENCES `terrain` (`id_Terrain`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_Beneficiere`) REFERENCES `beneficier` (`id_Beneficier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
