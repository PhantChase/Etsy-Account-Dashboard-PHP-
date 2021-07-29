-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 07:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etsydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fullname`, `dob`, `ssn`, `mail`, `phone`, `address`, `city`, `state`, `zipcode`) VALUES
(6, 'LeTina Hatch', '1976-08-15', '490781906', 'haroldhtch@yahoo.com', '(678) 574-2741', '530  Boulder Park Drive  ST', 'Lithia Springs', 'GA', '30122'),
(7, 'Shamam Ahmed', '1972-05-18', '308114533', 'shamam_a@msn.com', '(812) 320-2168', '919  S Basswood  CI', 'Bloomington ', 'IN', '47403'),
(8, 'Karen Boggs', '1971-11-21', '402195000', 'beanbag@insightbb.com', '(502) 762-1720', '7317  Apple Mill   DR', 'Louisville ', 'KY', '40228'),
(9, 'LESTER RATLEFF', '1950-11-29', '56961513', 'LLGR29@YAHOO.COM', '(702) 254-66', '1931  FOX CANYON   CI', 'LAS VEGAS', 'NV', '89117'),
(10, 'NICHOLAS STEELE', '1980-02-16', '496922768', 'NSTEELE@YAHOO.COM', '(816) 258-2348', '4025   CAMPBELL  ST', 'KANSAS CITY', 'MO', '64110'),
(11, 'Geneva Woods', '1971-08-08', '439138573', 'genevawood2@yahoo.com', '(281) 862-0217', '15110   Grassington   Dr', 'Channelview', 'TX', '77530'),
(12, 'Allison Gist', '1975-10-25', '593233106', 'akbkaye@yahoo.com', '(386) 258-2164', '640   8th  St', 'Holly Hill', 'FL', '32117'),
(13, 'John Timar', '1975-10-13', '549698888', 'jack8man@yahoo.com', '(760) 217-9777', '53700  Avenida Navarro  St', 'La Quinta', 'CA', '92253'),
(14, 'Jason Warren', '1972-12-13', '491946274', 'jdubbco91@yahoo.com', '(816) 763-1171', '7304  Harry S Truman   Dr', 'Grandview', 'MT', '64030'),
(15, 'Dennis Beckwith', '1960-01-03', '105548231', 'banned76@yahoo.com', '(607) 330-1087', '24  South Street  St', 'Edmeston', 'NY', '13335'),
(16, 'Jorge Escobar', '1988-10-11', '530916596', 'alegrez702@hotmail.com', '(702) 203-0350', '2609  Carroll   St', 'North Las Vegas', 'NV', '89030'),
(17, 'Stefani Migliorini', '1966-09-18', '557715776', 'stefani@onemain.com', '(714) 839-2868', '16516  Oak  Ci', 'Fountain Valley', 'CA', '92708'),
(18, 'Greg Willford', '1968-01-04', '374927570', 'deltaelite1999@yahoo.com', '(989) 386-2167', '9932  East  Mannsiding  Rd', 'Gladwin', 'MI', '48624');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
