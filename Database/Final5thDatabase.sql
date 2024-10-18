-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `fromPlace` varchar(255) NOT NULL,
  `toPlace` varchar(255) NOT NULL,
  `bookingDate` date NOT NULL DEFAULT current_timestamp(),
  `departureDate` date NOT NULL,
  `numberOfPerson` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'Confirm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `customerId`, `packageId`, `customerName`, `fromPlace`, `toPlace`, `bookingDate`, `departureDate`, `numberOfPerson`, `totalPrice`, `status`) VALUES
(55, 16, 5, 'Vikram Singh', 'surat', 'Somnath Temple ', '0000-00-00', '2023-12-22', 1, 2000, 'Confirm'),
(56, 16, 4, 'Vikram Singh', 'Bardoli', 'The Adalaj Stepwell ', '2023-12-07', '2023-12-28', 3, 6900, 'Confirm'),
(57, 16, 3, 'Vikram Singh', 'Valsad', 'Sabarmati Ashram ', '2023-12-07', '2023-12-22', 1, 1750, 'Confirm'),
(58, 16, 2, 'Vikram Singh', 'Valsad', 'Dwarka ', '2023-12-07', '2023-12-29', 2, 3000, 'Confirm'),
(59, 16, 1, 'Vikram Singh', 'Valsad', 'White desert, kutch  ', '2023-12-07', '2023-12-21', 1, 3000, 'Confirm'),
(60, 16, 1, 'Vikram Singh', 'Bardoli', 'White desert, kutch  ', '2023-12-07', '2023-12-22', 1, 3000, 'Confirm'),
(61, 17, 1, 'Darshan', 'surat', 'White desert, kutch  ', '2023-12-07', '2023-12-29', 3, 9000, 'Confirm'),
(62, 17, 1, 'Darshan', 'Valsad', 'White desert, kutch  ', '2023-12-07', '2023-12-29', 1, 3000, 'Confirm'),
(63, 17, 3, 'Darshan', 'Valsad', 'Sabarmati Ashram ', '2023-12-07', '2023-12-30', 3, 5250, 'Confirm'),
(64, 17, 1, 'Darshan', 'surat', 'White desert, kutch  ', '2023-12-08', '2023-12-18', 1, 3000, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` char(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `fullName`, `email`, `phoneNo`, `password`, `RegDate`, `status`) VALUES
(1, 'Prexa Gajeralll', 'prexagajera11@gmail.com', '7863031656', '045c43565a0db6ac3e94eeebbae4bb06', '2023-07-10', 0),
(2, 'Khushi Patel', 'kpkhushii13@gmail.com', '9756845354', '1889e39229724789921b838c68cb0ad9', '2023-07-15', 0),
(4, 'Saumil Hirpara', 'saumilhirpara03@gmail.com', '8726368152', '5a53b3bb03da93cdcf517e8a1576fda0', '2023-07-22', 0),
(5, 'Om Gadhiya', 'omgadhiya019@gmail.com', '9865709674', 'eac38cabaefe0377e3d2a31f45f9ad66', '2023-08-30', 0),
(6, 'Shubham Lathiya', 'shubhamlathiya2004@gmail.com', '8469563652', '5559e198d7a24841cae9cf5bf1f1d89e', '2023-08-03', 0),
(7, 'Srushti Malani', 'srushtimalani4@gmail.com', '9967548297', 'b9c2117a8d8a6b17ca37b36a6359f54b', '2023-08-03', 0),
(8, 'Pruthil Italiya', 'pruthilitaliya29@gmail.com', '9763846927', 'a97f2f4227ceedb99e4f0552f3e0c2aa', '2023-08-03', 0),
(9, 'Suhani Pradhan', 'suhanipradhan1003@gmail.com', '8653797536', 'bcb00bc9021516c65826b6df5184d334', '2023-08-14', 0),
(10, 'Brij Mavani', 'brijmavani1310@gmail.com', '6307864787', '598168c21783408102952dd1ab7cba7b', '2023-08-17', 0),
(11, 'Riddhi Patel', 'rpriddhi07@gmail.com', '6539864307', 'b6cadda732671ebf62d14cac43be0994', '2023-08-17', 0),
(12, 'Abhishek Hingu', 'abhishekhingu2013@gmail.com', '8816108565', '8371f69bdcc49cb926f09c9f4a061082', '2023-08-20', 0),
(16, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2023-11-29', 0),
(17, 'Darshan', 'darshannolkha123@gmail.com', '9328653040', '8d4a6cd0929268474782f2dfd6be44e3', '2023-12-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageId` int(11) NOT NULL,
  `packageName` varchar(255) NOT NULL,
  `packageLocation` varchar(255) NOT NULL,
  `packageDetail` mediumtext NOT NULL,
  `numberOfDays` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp(),
  `SubDistict` varchar(255) DEFAULT NULL,
  `Season` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageId`, `packageName`, `packageLocation`, `packageDetail`, `numberOfDays`, `image`, `price`, `creationDate`, `SubDistict`, `Season`) VALUES
(1, 'White desert, kutch ', 'Gujarat ', 'This is a good place for tour in winter.', 2, 'package_image/White desert,kutch.jpg', 3000, '2020-08-23', 'Surat', NULL),
(2, 'Dwarka', 'Gujarat ', 'Dwarka is well known for its temples and as a pilgrimage centre for Hindus.', 2, 'package_image/Dwarka.jpg', 1500, '2020-08-23', 'Rajkot', 'autumn'),
(3, 'Sabarmati Ashram', 'Gujarat ', 'Site of Hindu spirituality with museum.', 1, 'package_image/Sabarmati Ashram.webp', 1750, '2020-08-23', 'Ahmedabad', 'Summner'),
(4, 'The Adalaj Stepwell', 'Gujarat ', 'This is a Historical place.', 3, 'package_image/The Adalaj Stepwell.jpg', 2300, '2020-08-23', 'Rajkot', NULL),
(5, 'Somnath Temple', 'Gujarat ', 'Renowned pilgrimage destination', 1, 'package_image/Somnath Temple.jpg', 2000, '2020-08-23', 'Surat', 'autumn'),
(6, 'Saputara', 'Gujarat ', 'Saputara is a hill station located in Sahyadris or Western Ghats.', 3, 'package_image/Saputara.jpg', 3750, '2020-08-23', 'Surat', 'autumn'),
(7, 'Rani ki vav', 'Gujarat ', 'Historic stepwell with elaborate carvings.', 1, 'package_image/Rani ki vav.jpeg', 1500, '2020-08-23', 'Porbandar', 'spring'),
(8, 'BAPS Akshardham', 'Gujarat ', 'A spiritual and cultural campus.', 3, 'package_image/BAPS Akshardham.jpg', 2500, '2020-08-23', 'ahmedabad', 'winter'),
(9, 'Lothal', 'Gujarat ', 'The discovery of several ruins of Indus Valley Civilization.', 3, 'package_image/Lothal.jpg', 2999, '2020-08-23', 'jamnagar', 'winter');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` varchar(100) NOT NULL,
  `customerId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `customerId`, `bookingId`, `amount`, `paymentDate`) VALUES
('pay_N9kfexPg2KScQv', 17, 61, 3000, '2023-12-08'),
('pay_N9PBoaMMqPWTGd', 16, 55, 3000, '2023-12-07'),
('pay_N9QVjWkLHMy15W', 17, 61, 9000, '2023-12-07'),
('pay_N9RO8CF5p1K5ZR', 17, 61, 3000, '2023-12-07'),
('pay_N9RW2hpWM1IX93', 17, 61, 5250, '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `email` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `customerId`, `Subject`, `Message`, `email`) VALUES
(1, 1, 'Tour places', 'More Tour places required.', 'prexagajera11@gmail.com'),
(2, 13, 'Tour', 'tour is good', 'vikramsinghparmar1004@gmail.com'),
(3, 13, 'Tour', 'the tour are good', 'vikramsinghparmar1004@gmail.com'),
(5, 17, 'Bad Package Price are To High', 'Not woth package please change the package', 'darshannolkha123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sId` varchar(2) DEFAULT NULL,
  `stateName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sId`, `stateName`) VALUES
('1', 'Andhra Pradesh'),
('2', 'Arunachal Pradesh'),
('3', 'Assam'),
('4', 'Bihar'),
('5', 'Chhattisgarh'),
('6', 'Goa'),
('7', 'Gujarat'),
('8', 'Haryana'),
('9', 'Himachal Pradesh'),
('10', 'Jammu and Kashmir'),
('11', 'Jharkhand'),
('12', 'Karnataka'),
('13', 'Kerala'),
('14', 'Madhya Pradesh'),
('15', 'Maharashtra'),
('16', 'Manipur'),
('17', 'Meghalaya'),
('18', 'Mizoram'),
('19', 'Nagaland'),
('20', 'Odisha'),
('21', 'Punjab'),
('22', 'Rajasthan'),
('23', 'Sikkim'),
('24', 'Tamil Nadu'),
('25', 'Telangana'),
('26', 'Tripura'),
('27', 'Uttar Pradesh'),
('28', 'Uttarakhand'),
('29', 'West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `bookingId` (`bookingId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
