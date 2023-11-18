-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 06:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'ssvps', 'ssvps@gmail.com', 'pass@123');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `symbol` varchar(50) NOT NULL,
  `symphoto` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `tvotes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `cname`, `symbol`, `symphoto`, `position`, `tvotes`) VALUES
(20, 'Mohan Sharma', 'Mobile', 'symbol/e3.png', 'Secretary', 3),
(21, 'Rohit Misra', 'Football', 'symbol/s2.png', 'Chairman', 6),
(22, 'Aniket Sharma', 'Camera', 'symbol/e4.png', 'Secretary', 6),
(23, 'Vivek Joshi', 'Helmet', 'symbol/a6.png', 'Chairman', 4),
(24, 'Vivek Varma', 'Wheel', 'symbol/a5.png', 'Chairman', 10),
(25, 'Kamalesh Pawar', 'Tree', 'symbol/tree.jfif', 'Secretary', 8),
(26, 'Ajinkya Patil', 'Computer', 'symbol/cmptr.jfif', 'Chairman', 7),
(27, 'Vaibhav Sonar', 'Helicopter', 'symbol/helicptr.jfif', 'Secretary', 10);

-- --------------------------------------------------------

--
-- Table structure for table `can_position`
--

CREATE TABLE `can_position` (
  `id` int(255) NOT NULL,
  `position_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `can_position`
--

INSERT INTO `can_position` (`id`, `position_name`) VALUES
(1, 'Chairman'),
(2, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `phno_change`
--

CREATE TABLE `phno_change` (
  `id` int(255) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `idname` varchar(20) NOT NULL,
  `idcard` varchar(300) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `old_phno` varchar(15) NOT NULL,
  `new_phno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phno_change`
--

INSERT INTO `phno_change` (`id`, `vname`, `idname`, `idcard`, `dob`, `old_phno`, `new_phno`) VALUES
(5, 'Rohan Khairnar', 'Aadhar', 'phnochange/Aadhar-Card-UIDAI-.jpg', '2003-03-11', '7420087741', '9576564324'),
(6, 'Prashant Patil', 'other Id Proof', 'phnochange/4.jpeg', '2003-01-09', '9562663773', '8377266277');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `idname` varchar(50) NOT NULL,
  `idnum` varchar(50) NOT NULL,
  `idcard` varchar(300) NOT NULL,
  `inst_id` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `verify` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `idname`, `idnum`, `idcard`, `inst_id`, `dob`, `gender`, `phone`, `address`, `verify`, `status`) VALUES
(46, 'Krishna', 'Agrawal', 'Other ID Card', 'P01CO20197498', 'img/3R (1).jpg', '22617', '2003-05-14', 'male', '9307107790', 'Dhule', 'yes', 'voted'),
(47, 'Shantanu', 'Ahirrao', 'Other ID Card', 'P01CO20197301', 'img/4R (1).jpg', '22618', '2003-03-18', 'male', '9423100666', 'Dhule', 'yes', 'voted'),
(48, 'Vishal', 'Bagal', 'Other ID Card', 'P01CO20197173', 'img/5R (1).jpg', '22619', '2003-02-24', 'male', '8600929366', 'Dhule', 'yes', 'voted'),
(49, 'Shruti', 'Bhavsar', 'Other ID Card', 'P01CO20197428', 'img/6R (1).jpg', '22620', '2003-02-24', 'female', '9421532533', 'Dhule', 'yes', 'voted'),
(50, 'Sayali', 'Borse', 'Other ID Card', 'P01CO20197450', 'img/7R (1).jpg', '22621', '2003-04-02', 'female', '9145800416', 'Dhule', 'yes', 'voted'),
(52, 'Dhanashri', 'Chaudhari', 'Other ID Card', 'P01CO20197340', 'img/8OIP.jpg', '22622', '2003-04-02', 'female', '9309559668', 'Dhule', 'yes', 'voted'),
(53, 'Hitesh', 'Chaudhari', 'Passport', 'P01CO20197491', 'img/963221_0.jpg', '22623', '2003-07-15', 'male', '9921288245', 'Dhule', 'yes', 'voted'),
(54, 'Prerana', 'Chaudhari', 'Other ID Card', 'P01CO20197338', 'img/10OIP.jpg', '22624', '2003-04-05', 'female', '9657546077', 'Dhule', 'yes', 'voted'),
(55, 'Deepak', 'Chavan', 'Other ID Card', 'P01CO20197388', 'img/11R (1).jpg', '22625', '2003-06-06', 'male', '8669831973', 'Dhule', 'yes', 'voted'),
(56, 'Harshada', 'Chavan', 'Other ID Card', 'P01CO20197364', 'img/12OIP.jpg', '22626', '2003-06-06', 'female', '9527154274', 'Dhule', 'yes', 'voted'),
(57, 'Tanuja', 'Deo', 'Other ID Card', 'P01CO20197409', 'img/13OIP.jpg', '22627', '2003-07-05', 'female', '9423744921', 'Dhule', 'yes', 'voted'),
(58, 'Krishna', 'Gawali', 'Other ID Card', 'P01CO20197359', 'img/14R (1).jpg', '22628', '2003-04-07', 'male', '9922097726', 'Dhule', 'yes', 'voted'),
(59, 'Vidya', 'Gawali', 'Other ID Card', 'P01CO20197506', 'img/15OIP.jpg', '22629', '2003-05-19', 'female', '9922554582', 'Dhule', 'yes', 'voted'),
(60, 'Sojal', 'Gudhe', 'Aadhar', '874535327362', 'img/16Aadhar-Card-UIDAI-.jpg', '22630', '2003-06-04', 'male', '9921220486', 'Dhule', 'yes', 'voted'),
(61, 'Gujar', 'Rakshanda', 'Other ID Card', '3423645536', 'img/17OIP.jpg', '22631', '2003-04-02', 'female', '9823863244', 'Dhule', 'yes', 'voted'),
(62, 'Simaran', 'Kalda', 'Other ID Card', '89546637732', 'img/18OIP.jpg', '22632', '2003-07-05', 'female', '9579617110', 'Dhule', 'yes', 'voted'),
(63, 'Mihir', 'Lund', 'Aadhar', '324435564988', 'img/19Aadhar-Card-UIDAI-.jpg', '22633', '2003-03-08', 'male', '8669228898', 'Dhule', 'yes', 'voted'),
(65, 'Nilesh', 'Parakhe', 'Other ID Card', 'P01CO20197285', 'img/20R (1).jpg', '22634', '2003-06-03', 'male', '7972680750', 'Dhule', 'yes', 'voted'),
(66, 'Ashwini', 'Patil', 'Other ID Card', 'P01CO20197463', 'img/21OIP.jpg', '22635', '2003-03-06', 'female', '9595289977', 'Dhule', 'yes', 'voted'),
(68, 'Dhanashri', 'Patil', 'Other ID Card', 'P01CO20197539', 'img/22OIP.jpg', '22636', '2003-05-06', 'female', '9923800188', 'Dhule', 'yes', 'voted'),
(69, 'Khushal', 'Patil', 'Other ID Card', 'P01CO20197352', 'img/23R (1).jpg', '22637', '2003-07-03', 'male', '9689020129', 'Dhule', 'yes', 'voted'),
(70, 'Khushi', 'Patil', 'Other ID Card', 'P01CO20197464', 'img/24R (1).jpg', '22638', '2003-06-09', 'female', '8390472454', 'Dhule', 'yes', 'voted'),
(71, 'Madhuri', 'Patil', 'Other ID Card', 'P01CO20197310', 'img/25OIP.jpg', '22639', '2003-08-12', 'female', '7875110922', 'Dhule', 'yes', 'voted'),
(72, 'Priyanka', 'Patil', 'Other ID Card', 'P01CO20197185', 'img/26OIP.jpg', '22640', '2003-05-06', 'female', '8208578027', 'Dhule', 'yes', 'voted'),
(73, 'Roshani', 'Patil', 'Other ID Card', 'P01CO20197296', 'img/27OIP.jpg', '22641', '2003-09-28', 'female', '9960347233', 'Dhule', 'yes', 'voted'),
(74, 'Rupali', 'Patil', 'Other ID Card', 'P01CO20197442', 'img/25OIP.jpg', '22642', '2003-04-02', 'female', '8805407698', 'Dhule', 'yes', 'voted'),
(75, 'Anjali', 'Pawar', 'Other ID Card', 'P01CO20197214', 'img/26OIP.jpg', '22643', '2003-02-03', 'female', '8788871264', 'Dhule', 'yes', 'voted'),
(87, 'Prashant', 'Patil', 'Aadhar', '234556366453', 'img/27Aadhar-Card-UIDAI-.jpg', '22644', '2003-04-15', 'male', '9766031610', 'Dhule', 'yes', 'not voted'),
(88, 'Sahil', 'Mahajan', 'Aadhar', '345543222121', 'img/28Aadhar-Card-UIDAI-.jpg', '22645', '2003-02-18', 'male', '9834750758', 'Dhule', '', 'not voted'),
(89, 'Rohan', 'Khairnar', 'Aadhar', '345543222322', 'img/29Aadhar-Card-UIDAI-.jpg', '22646', '2003-02-07', 'male', '7420087741', 'Dhule', '', 'not voted'),
(90, 'Jayesh', 'Bhandarkar', 'Aadhar', '645535526623', 'img/30Aadhar-Card-UIDAI-.jpg', '22647', '2003-04-07', 'male', '9545040940', 'Dhule', '', 'not voted');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(50) NOT NULL,
  `voting_title` varchar(50) NOT NULL,
  `vot_start_date` datetime NOT NULL,
  `vot_end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `voting_title`, `vot_start_date`, `vot_end_date`) VALUES
(1, 'Voting 2022', '2022-06-01 17:01:00', '2022-06-01 17:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `symbol` (`symbol`);

--
-- Indexes for table `can_position`
--
ALTER TABLE `can_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phno_change`
--
ALTER TABLE `phno_change`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `idnum` (`idnum`),
  ADD UNIQUE KEY `inst_id` (`inst_id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `can_position`
--
ALTER TABLE `can_position`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phno_change`
--
ALTER TABLE `phno_change`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
