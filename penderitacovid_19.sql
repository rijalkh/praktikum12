-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 02:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `penderitacovid_19`
--

CREATE TABLE `penderitacovid_19` (
  `id` int(11) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `New_cases` int(11) NOT NULL,
  `Total_death` int(11) NOT NULL,
  `New_death` int(11) NOT NULL,
  `Total_Recovered` int(11) NOT NULL,
  `New_recovered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penderitacovid_19`
--

INSERT INTO `penderitacovid_19` (`id`, `Country`, `New_cases`, `Total_death`, `New_death`, `Total_Recovered`, `New_recovered`) VALUES
(1, 'India', 3714, 524708, 7, 42633365, 2513),
(2, 'S.korea', 5022, 24279, 21, 17865591, 28085),
(3, 'Turkey', 0, 98965, 0, 14971256, 0),
(4, 'Vietnam', 806, 43081, 1, 9513981, 9026),
(5, 'Japan', 16130, 30752, 17, 8711289, 24361),
(6, 'Iran', 59, 141332, 1, 7056206, 713),
(7, 'Indonesia', 342, 156622, 7, 5897022, 217),
(8, 'Malaysia', 1330, 35690, 2, 4458999, 1881),
(9, 'Thailand', 2162, 30201, 27, 4409248, 4879),
(10, 'Israel', 2580, 10864, 0, 4124933, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penderitacovid_19`
--
ALTER TABLE `penderitacovid_19`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penderitacovid_19`
--
ALTER TABLE `penderitacovid_19`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
