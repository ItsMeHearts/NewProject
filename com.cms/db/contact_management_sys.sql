-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 06:55 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_management_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `chennai_hosp`
--

CREATE TABLE `chennai_hosp` (
  `h_id` int(11) NOT NULL,
  `helpline` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chennai_hosp`
--

INSERT INTO `chennai_hosp` (`h_id`, `helpline`, `number`) VALUES
(1, 'Lions Blood Bank ', 28415959),
(2, 'Apollo Ambulance ', 1066),
(3, 'St. Johns Ambulance Association ', 28194630),
(4, 'Trauma Care Consortium ', 28150700),
(5, 'Government General Hospital ', 25305000),
(6, 'Government Kilpauk Hospital ', 28364951),
(7, ' Government Royapettah Hospital ', 28483051),
(8, 'Government Stanley Hospital ', 25281347),
(9, 'Govt. Hospital for Women & Children ', 28191982),
(10, ' Kasturba Hospital for Women', 28545449),
(11, ' nstitute of Child Health & Hospital', 28191135),
(12, '  Voluntary Health Service', 22541972);

-- --------------------------------------------------------

--
-- Table structure for table `contacts_cms`
--

CREATE TABLE `contacts_cms` (
  `cnt_id` int(11) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `mobile_num` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` blob NOT NULL,
  `_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts_cms`
--

INSERT INTO `contacts_cms` (`cnt_id`, `contact_name`, `mobile_num`, `address`, `image`, `_id`) VALUES
(1, 'Ajith', 9876543210, 'Madurai', '', 8),
(2, 'Vijay', 7896543211, 'Chennai', '', 8),
(3, 'kowsik', 9008877665, 'Madurai', '', 8),
(4, 'pugazh', 8220881818, 'Madurai', '', 8),
(5, 'abc', 8484132256, 'Madurai', '', 8),
(6, 'hari', 9789218999, 'vilangudi', '', 8),
(7, 'vicky', 7339494152, 'mdu', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_chennai`
--

CREATE TABLE `emergency_chennai` (
  `c_id` int(11) NOT NULL,
  `helpline` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_chennai`
--

INSERT INTO `emergency_chennai` (`c_id`, `helpline`, `number`) VALUES
(1, 'Police', 100),
(2, 'Fire', 101),
(3, 'Ambulance', 108),
(4, 'Coastal Security Helpline', 1093),
(5, 'Traffic Police', 103),
(6, 'Women Helpline', 1091),
(7, 'Child Line', 1098),
(8, 'RAILWAY POLICE HELPLINE', 9962500500),
(9, 'Anti Ragging complaints', 18001805522),
(10, 'Railway Protection Force', 1322),
(11, '  Chennai Corporation Complaints', 1913),
(12, '  Railways Reservation Enquiry', 132),
(13, 'Tourist Enquiry ', 1913),
(14, 'Tourism Office of Govt. of Tamil Nadu ', 25368538),
(15, 'Tourism Office of Govt. of India', 28460285);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_cms`
--

CREATE TABLE `emergency_cms` (
  `e_id` int(11) NOT NULL,
  `helpline` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_cms`
--

INSERT INTO `emergency_cms` (`e_id`, `helpline`, `number`) VALUES
(1, 'NATIONAL EMERGENCY NUMBER', 112),
(2, 'POLICE', 100),
(3, 'FIRE', 101),
(4, 'AMBULANCE', 102),
(5, 'DISASTER MANAGEMENT SERVICE', 108),
(6, 'WOMEN HELPLINE', 1091),
(7, 'WOMEN HELPLINE - DOMESTIC ABUSE', 181),
(8, 'AIR AMBULANCE', 9540161344),
(9, 'AIDS HELPLINE', 1097),
(10, 'ANTI POISON NEW DELHI', 111066),
(11, 'DISASTER MANAGEMENT N.D.M.A', 1126701728),
(12, 'EARTHQUAKE / FLOOD / DISASTER N.D.R.F', 1124363260),
(13, 'Deputy Commissioner Of Police - Missing Child And Women', 1094),
(14, 'Railway Enquiry', 139),
(15, 'Senior Citizen Helpline', 1291),
(16, 'Medical Helpline in Andhra Pradesh, Gujarat, Uttarakhand, Goa, Tamil Nadu, Rajasthan, Karnataka, Assam, Meghalaya, MP and UP', 108),
(17, 'Railway Accident Emergency Service', 1072),
(18, 'Road Accident Emergency Service', 1073),
(19, 'Road Accident Emergency Service On National Highway For Private Operators', 1033),
(20, 'ORBO Centre, AIIMS (For Donation Of Organ) Delhi', 1060),
(21, 'Call Centre', 1551),
(22, 'Relief Commissioner For Natural Calamities', 1070),
(23, 'Children In Difficult Situation', 1098),
(24, 'Central Vigilance Commission', 1964),
(25, 'Tourist Helpline', 1800111363),
(26, 'LPG Leak Helpline', 1906);

-- --------------------------------------------------------

--
-- Table structure for table `user_cms`
--

CREATE TABLE `user_cms` (
  `_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `_password` varchar(100) NOT NULL,
  `_cnf_password` varchar(100) NOT NULL,
  `_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cms`
--

INSERT INTO `user_cms` (`_id`, `username`, `email`, `phone`, `gender`, `_password`, `_cnf_password`, `_image`) VALUES
(1, 'gowtham_sidd', 'gowthamlaxmanan54@gmail.com', 8838198301, 'Male', '1967f8c642d301df9e8f36b28909c429', '1967f8c642d301df9e8f36b28909c429', 0x76656572616d2e6a7067),
(2, 'vijay', 'heartshunter63@gmail.com', 7418661557, 'Male', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', 0x393834335f3237383534383438323239343834385f3633333135393936365f6e2e6a7067),
(3, 'gowtham_sidd', 'ajith@gmail.com', 1234567890, 'Male', '6ebe76c9fb411be97b3b0d48b791a7c9', '6ebe76c9fb411be97b3b0d48b791a7c9', ''),
(4, 'ajith_kumar', 'ajithracer@gmail.com', 9790839348, 'Male', '1967f8c642d301df9e8f36b28909c429', '1967f8c642d301df9e8f36b28909c429', 0x76656572616d2e6a7067),
(5, 'siddhu', 'siddhu@gmail.com', 9876543211, 'Male', '1967f8c642d301df9e8f36b28909c429', '1967f8c642d301df9e8f36b28909c429', 0x3135202d20312e6a7067),
(6, 'kamalhassan', 'kamal@gmail.com', 7225666333, 'Male', '1967f8c642d301df9e8f36b28909c429', '1967f8c642d301df9e8f36b28909c429', ''),
(7, 'iamGowtham', 'iamGowtham@gmail.com', 9876543212, 'Male', '1967f8c642d301df9e8f36b28909c429', '1967f8c642d301df9e8f36b28909c429', ''),
(8, 'kowsik', 'kowsik@gmail.com', 7395884902, 'Male', '980afa7765bfaa2538f088f5baee38ef', '980afa7765bfaa2538f088f5baee38ef', 0x66616c6c2d313037323832315f5f3334302e6a7067),
(9, 'hari', 'hari@gmail.com', 9595952323, 'Male', 'e2fe8628dad368cdd2aac64d218cc97e', 'e2fe8628dad368cdd2aac64d218cc97e', ''),
(10, 'vicky', 'vicky@gmail.com', 9876543209, 'Male', '57171497b1455ab5064e24699905d165', '57171497b1455ab5064e24699905d165', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chennai_hosp`
--
ALTER TABLE `chennai_hosp`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `contacts_cms`
--
ALTER TABLE `contacts_cms`
  ADD PRIMARY KEY (`cnt_id`),
  ADD KEY `fk_uid` (`_id`);

--
-- Indexes for table `emergency_chennai`
--
ALTER TABLE `emergency_chennai`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `emergency_cms`
--
ALTER TABLE `emergency_cms`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `user_cms`
--
ALTER TABLE `user_cms`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts_cms`
--
ALTER TABLE `contacts_cms`
  MODIFY `cnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_cms`
--
ALTER TABLE `user_cms`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts_cms`
--
ALTER TABLE `contacts_cms`
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`_id`) REFERENCES `user_cms` (`_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
