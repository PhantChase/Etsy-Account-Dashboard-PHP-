-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 04:41 PM
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
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `id` int(11) NOT NULL,
  `ccnumber` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `ccv` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `etsyname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`id`, `ccnumber`, `month`, `year`, `ccv`, `zip`, `used`, `date`, `etsyname`) VALUES
(1, '4833160220513698', '11', '2025', '185', '54547', 1, '2021-07-03', 'MackoLane'),
(4, '4154910002706881', '06', '2023', '008', '94568', 1, '2021-07-03', 'HanykManBon'),
(5, '5297411101610392', '07', '2021', '598', '64402', 1, '2021-07-03', 'HashakyMotter'),
(6, '4900702010803009', '06', '2021', '900', '37617', 1, '2021-07-05', 'LohjKaly');

-- --------------------------------------------------------

--
-- Table structure for table `etsy`
--

CREATE TABLE `etsy` (
  `id` int(11) NOT NULL,
  `etsyname` varchar(255) DEFAULT NULL,
  `vps` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `po` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etsy`
--

INSERT INTO `etsy` (`id`, `etsyname`, `vps`, `info`, `po`, `cc`, `status`, `date`, `publisher`) VALUES
(20, 'MackoLane', '25', '45', '59', '1', 'die', '2021-07-03', 'admin'),
(21, 'HanykManBon', '27', '47', '61', '4', 'die', '2021-07-03', 'admin'),
(22, 'TacosMattheo', '26', '46', '60', '', 'die', '2021-07-03', 'admin'),
(23, 'HashakyMotter', '28', '48', '62', '5', 'live', '2021-07-03', 'admin'),
(24, 'LohjKaly', '29', '49', '63', '6', 'live', '2021-07-03', 'admin'),
(25, 'HanjDutrth', '30', '50', '64', '', 'live', '2021-07-03', 'admin'),
(26, 'KhanMerty', '31', '51', '65', '', 'live', '2021-07-03', 'admin'),
(28, 'PhantChase', '32', '', '', '', 'live', '2021-07-03', 'admin'),
(29, 'FastAntCo', '33', '', '', '', 'live', '2021-07-03', 'admin'),
(30, 'Manbrola', '34', '52', '66', '', 'die', '2021-07-04', 'anngocthien');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `etsyname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fullname`, `dob`, `ssn`, `mail`, `phone`, `address`, `city`, `state`, `zipcode`, `used`, `etsyname`) VALUES
(45, 'Sung Choe', '1952-05-02', '143804646', 'injamatty@hotmail.com', '(214) 501-3388', '126 S Barnes', 'Garland', 'TX', '75042', 1, 'MackoLane'),
(46, 'Gerald Tookes', '1959-03-23', '266455758', 'geraldtookes@embarqmail.com', '(850) 422-3076', '1149  Ronds Pointe W  Dr', 'Tallahassee', 'FL', '32312', 1, 'TacosMattheo'),
(47, 'Laurie Cornelison', '2020-04-24', '312804567', 'corneliso8@aol.com', '(812) 890-2759', '8768  East Cox Road  St', 'Bicknell', 'IN', '47512', 1, 'HanykManBon'),
(48, 'Trina Davis', '1970-02-07', '452332478', 'd_trina@excite.com', '(832) 445-8428', '21350  Claretfield  Ct', 'Humble', 'TX', '77338', 1, 'HashakyMotter'),
(49, 'Piotr Hartlieb', '2020-04-24', '442150554', 'hartlieb1983@yahoo.com', '(918) 829-9588', 'Hartlieb1983@yahoo.com', 'Tulsa', 'OK', '74114', 1, 'LohjKaly'),
(50, 'Leonardo Sigaran', '1973-04-01', '116780159', 'leonardoeldriver@hotmail.co', '(646) 623-0215', '700 Morris  St', 'Bronx', 'NY', '10451', 1, 'HanjDutrth'),
(51, 'Lisa Bach', '1968-09-09', '310921979', 'blondemoment1968@hotmail.com', '(219) 764-5057', '5944  Stone Avenue  St', 'Portage', 'IN', '46368', 1, 'KhanMerty'),
(52, 'Letina Hatch', '1976-08-15', '490781906', 'haroldhtch@yahoo.com', '(678) 574-2741', '530  Boulder Park Drive  St', 'Lithia Springs', 'GA', '30122', 1, 'Manbrola');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `emailkp` varchar(256) DEFAULT NULL,
  `passwordpo` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `cccd` varchar(256) DEFAULT NULL,
  `stk` varchar(255) DEFAULT NULL,
  `ch1` varchar(256) DEFAULT NULL,
  `ch2` varchar(256) DEFAULT NULL,
  `ch3` varchar(256) DEFAULT NULL,
  `tl1` varchar(256) DEFAULT NULL,
  `tl2` varchar(256) DEFAULT NULL,
  `tl3` varchar(256) DEFAULT NULL,
  `bankname` varchar(256) DEFAULT NULL,
  `bankaddress` varchar(256) DEFAULT NULL,
  `accounttype` varchar(256) DEFAULT NULL,
  `routing` varchar(256) DEFAULT NULL,
  `accountnumber` varchar(256) DEFAULT NULL,
  `beneficiaryname` varchar(256) DEFAULT NULL,
  `active` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `etsyname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `email`, `password`, `emailkp`, `passwordpo`, `phone`, `cccd`, `stk`, `ch1`, `ch2`, `ch3`, `tl1`, `tl2`, `tl3`, `bankname`, `bankaddress`, `accounttype`, `routing`, `accountnumber`, `beneficiaryname`, `active`, `img`, `used`, `etsyname`) VALUES
(59, 'landryingmar@gmail.com', 'lomkz7j9', 'landryingmarjsc64@yahoo.com', 'quangchung82', '0386340831', '8901903903989', '2145013388', 'Nghề nghiệp của ông bạn là gì?', 'Ngày sinh của bố bạn là ngày nào (MM\\DD)?', 'Mẹ bạn sinh ra ở thị trấn nào?', 'nong', '18/02', 'ha noi', 'First Century Bank', 'First Century Bank', 'Checking', '061120084', '4027094993527', 'Nguyen Quang Chung', '', '', 1, 'MackoLane'),
(60, 'hillaryhadleigh@gmail.com', 't3PZQZzPn', 'hillaryhadleigh74v50@yahoo.co', 'manhtuyen90', '0384347869', '3830381045608', NULL, 'Moldel xe ô tô đầu tiên? (ví dụ', 'Tên của bà ngoại bạn là gì (mẹ của mẹ)?', 'Bạn lớn lên ở thành phố nào?', 'maybach', 'manh', 'ha noi', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4022974986796', 'Nguyen Manh Tuyen', '', '', 1, 'TacosMattheo'),
(61, 'leslyemlynnnickolas@gmail.com', 'b7qap822g', 'leslyemlynnnickolasd0i91@yahoo.com', 'hoangduong98', '0387014720', '8390383048603', NULL, 'Tên của bà ngoại bạn là gì (mẹ của mẹ)?', 'Ông nội của bạn được sinh ra tại thành phố nào?', 'Tên của bà nội (mẹ của bố) của bạn là gì?', 'hoang', 'ha noi', 'nguyen', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4029034986607', 'Nguyen Hoang Duong', '', '', 1, 'HanykManBon'),
(62, 'moraleshezekiahofeliaangelis@gmail.com', '9a3t1jkx', 'ofeliaangelismoraleshezekiahnwx43@yahoo.com', 'ducquyen97', '0388483949', '8490390293039', NULL, 'Nghề nghiệp của ông bạn là gì?', 'Tên của ông nội bạn là gì (bố của bố bạn)?', 'Tên người con lớn tuổi nhất?', 'nong', 'duc', 'nguyen', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4023424986347', 'Nguyen Duc Quyen', '', '', 1, 'HashakyMotter'),
(63, 'tyreseelaina@gmail.com', 'dP2gdmhp', 'tyreseelaina6mq64@yahoo.com', 'congthong02', '0387212094', '6203490240433', NULL, 'Nghề nghiệp của ông bạn là gì?', 'Ngày sinh của bố bạn là ngày nào (MM\\DD)?', 'Tên của bà ngoại bạn là gì (mẹ của mẹ)?', 'nong', '18/02', 'cong', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4029274986174', 'Nguyen Cong Thong', '', '', 1, 'LohjKaly'),
(64, 'kenethcamilla@gmail.com', 'CQHe7qyqg', 'kenethcamillatcv98@yahoo.com', 'duytien82', '0385001196', '9403820580892', NULL, 'Họ của xếp bạn là gì?', 'Tên của giáo viên đầu tiên của bạn là gì?', 'Tên của bà nội (mẹ của bố) của bạn là gì?', 'mac', 'duy', 'tien', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4021534986115', 'Mac Duy Tien', '', '', 1, 'HanjDutrth'),
(65, 'ishaansusan2356@gmail.com', 'norrisbruce45969', 'blacklittle713243@yahoo.com', 'conglai42', '0941537005', '5830863084930', NULL, 'Ngày sinh của bố bạn là ngày nào (MM\\DD)?', 'ông ngoại của bạn được sinh ra tại thành phố nào?', 'Nghề nghiệp của ông bạn là gì?', '18/05', 'hai duong', 'nong', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4025515013788', 'Hoang Cong Lai', '', '', 1, 'KhanMerty'),
(66, 'yadiramarlenera52@gmail.com', 'mendezwebster34150', 'burnssykes523353@yahoo.com', 'trongcuong71', '0941981695', '3670576802902', NULL, 'Nghề nghiệp của ông bạn là gì?', 'Ngày sinh của bố bạn là ngày nào (MM\\DD)?', 'Tên của ông nội bạn là gì (bố của bố bạn)?', 'nong', '19/04', 'trong', 'First Century Bank', '525 Federal Street Bluefield, WV–Bluefield, USA', 'Checking', '061120084', '4026135012918', 'Dinh Trong Cuong', '', '', 1, 'Manbrola');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `fullname` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `role` varchar(256) DEFAULT NULL,
  `decription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `fullname`, `image`, `phone`, `email`, `role`, `decription`) VALUES
(1, 'admin', 'e5932cab2aa25b0e1f59cfecc1e2d2a2', 'Phan Trí Dũng', 'admin.jpg', NULL, NULL, 'admin', 'Phan Trí Dũng đẹp trai'),
(2, 'anngocthien', '7c79dd68b400e6b0c9f99f8f221dae26', NULL, NULL, NULL, NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vps`
--

CREATE TABLE `vps` (
  `id` int(11) NOT NULL,
  `vpsname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `etsyname` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vps`
--

INSERT INTO `vps` (`id`, `vpsname`, `password`, `etsyname`, `type`, `date`, `used`) VALUES
(25, 'ec2-3-138-101-125.us-east-2.compute.amazonaws.com', 'qi;xsUiCo&*', 'MackoLane', '0', '2021-07-04', 1),
(26, 'ec2-18-221-244-47.us-east-2.compute.amazonaws.com', '2ooUkDQJHMP', 'TacosMattheo', '0', '2021-07-03', 1),
(27, 'ec2-3-143-9-215.us-east-2.compute.amazonaws.com', 'RPUNu5fZp(', 'HanykManBon', '0', '2021-07-03', 1),
(28, 'ec2-18-191-158-96.us-east-2.compute.amazonaws.com', '8hzLJdNP;5*', 'HashakyMotter', '0', '2021-07-03', 1),
(29, 'ec2-52-14-103-15.us-east-2.compute.amazonaws.com', '.7wC.pd%p=', 'LohjKaly', '0', '2021-07-03', 1),
(30, 'ec2-18-118-155-179.us-east-2.compute.amazonaws.com', 'S$bUxrm!u@K', 'HanjDutrth', '0', '2021-07-03', 1),
(31, 'ec2-18-118-111-150.us-east-2.compute.amazonaws.com', 'Kt!5Ls$gye9', 'KhanMerty', '0', '2021-07-03', 1),
(32, '51.79.197.202:35335', 'Vo6m&DK~JG', 'PhantChase', '1', '2021-07-03', 1),
(33, '216.176.190.215:22242', '9uw9n5ZZK!', 'FastAntCo', '1', '2021-07-03', 1),
(34, 'ec2-18-117-100-179.us-east-2.compute.amazonaws.com', '%7Mt3yPApc', 'Manbrola', '0', '2021-07-04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etsy`
--
ALTER TABLE `etsy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vps`
--
ALTER TABLE `vps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc`
--
ALTER TABLE `cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etsy`
--
ALTER TABLE `etsy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vps`
--
ALTER TABLE `vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
