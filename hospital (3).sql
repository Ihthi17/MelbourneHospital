-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `time_schedule_id` int(11) DEFAULT NULL,
  `symtoms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `doctor_id`, `time_schedule_id`, `symtoms`) VALUES
(73, 18, 62, 24, 'fever'),
(76, 23, 62, 24, 'fever');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `blood` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `symtom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `account_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `nic` text NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `payment_type`, `account_no`, `amount`, `nic`, `address`) VALUES
(8, 23, 'Channeling', 25786, 1400, '254783520v', 'puttalam'),
(11, 23, 'Final Bill', 25786, 15000, '254783520v', 'puttalam');

-- --------------------------------------------------------

--
-- Table structure for table `pcr`
--

CREATE TABLE `pcr` (
  `id` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcr`
--

INSERT INTO `pcr` (`id`, `First_name`, `Last_name`, `Mail`, `Phone`, `date_d`, `Age`) VALUES
(1, 'Mohamed', 'Ihthisham', 'mohamedihthisham17@gmail.com', 755665748, '2022-10-26', 22),
(2, 'Peter', 'Jhon', 'peterj23@gmail.com', 774526358, '2022-11-04', 30),
(3, 'Mark', 'Henry', 'maer32@gmail.com', 785412356, '2022-10-29', 20),
(4, 'Mark', 'Henry', 'maer32@gmail.com', 785412356, '2022-10-29', 20),
(5, 'Ajai', 'Kumar', 'kumar43@gmail.com', 785412356, '2022-11-03', 35),
(6, 'Mohamed', 'Imadullah', 'imadullah12@gmail.com', 774526358, '2022-11-09', 22),
(7, 'Jayam', 'ravi', 'jayamr32@gmail.com', 779669774, '2022-11-11', 32),
(8, 'Jayam', 'ravi', 'jayamr32@gmail.com', 779669774, '2022-11-11', 32),
(9, 'Mark', 'Jhon', 'hhen3@gmail.com', 785412356, '2022-11-24', 25),
(10, 'Saman', 'Danushka', 'samand5@gmail.com', 773625987, '2022-11-25', 23),
(24, 'Ravi', 'Kanth', 'ihthi2000@gmail.com', 772563241, '2022-11-24', 10),
(29, 'Ravi', 'Karunarathna', 'rathna4@gmail.com', 742365896, '2022-12-07', 50),
(34, 'mohamed', 'Imadullah', 'imadhimras23.3@gmail.com', 741236952, '2022-12-02', 22),
(48, 'suhait', 'suhait', 'suhaitsuhait58@gmail.com', 772563241, '2022-12-10', 22);

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`id`, `user_id`, `date`, `start_time`, `end_time`) VALUES
(24, 62, '2022-12-16', '09:00:00', '12:00:00'),
(25, 66, '2022-12-09', '20:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(200) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Specelist` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `p_name`, `phone`, `email`, `password`, `type`, `First_Name`, `Last_Name`, `Specelist`, `photo`) VALUES
(5, '', 774569842, 'admin1@gmail.com', 'admin1', 'admin', '', '', '', ''),
(6, 'Bandara', 774569842, 'bandaa32@gmail.com', '54100', 'patient', '', '', '', ''),
(8, 'Henry', 725896541, 'henry2@gmail.com', '78951', 'patient', '', '', '', ''),
(18, 'imadullah', 755216796, 'imadhimras23.3@gmail.com', 'imda23', 'patient', '', '', '', ''),
(19, 'Perera', 789654785, 'pererap2@gmail.com', 'p4525', 'patient', '', '', '', ''),
(23, 'Ihthisham', 755665748, 'mohamedihthisham17@gmail.com', '16418', 'patient', '', '', '', ''),
(25, 'anu', 2147483647, 'ammmmm@anu', '12345', 'patient', '', '', '', ''),
(39, 'henry', 778569245, 'henry6@gmail.com', '10456', 'patient', '', '', '', ''),
(40, 'anu', 711822375, 'anu@gmail.com', '12302', 'patient', '', '', '', ''),
(41, 'Ravindar', 789669774, 'ravid76@gmail.com', 'r5841', 'patient', '', '', '', ''),
(44, 'Peter', 769841563, 'peter4@gmail.com', 'peter1', 'patient', '', '', '', ''),
(46, 'Gunathilaka', 779425863, 'guna65@gmail.com', 'gunathilaka', 'patient', '', '', '', ''),
(49, 'Tharaka', 703230832, 'tharaka01@gmail.com', '12345', 'patient', '', '', '', ''),
(53, 'safna', 751230205, 'safna30@gmail.com', 'safna', 'patient', '', '', '', ''),
(54, 'test1', 2147483647, 'test1@gmail.com', '12345', 'patient', '', '', '', ''),
(55, 'p', 785502952, 'mohamedihthisham2@gmail.com', '123650', 'patient', '', '', '', ''),
(56, 'test4', 776950058, 'test4@gmail.com', '78596', 'patient', '', '', '', ''),
(57, 'sasna', 757327231, 'sasnafawmy@gmail.com', '19995', 'patient', '', '', '', ''),
(62, '', 785412356, 'maneesha12@gmail.com', '10205', 'doctor', 'Maneesha', 'Rathnayaka', 'Pediatrics', 'Upload/download.jpg'),
(63, 'suhait', 772563241, 'suhaitsuhait58@gmail.com', 'suhait', 'patient', '', '', '', ''),
(64, '', 771234585, 'gunathilaka1@gmail.com', 'gunathilaka', 'doctor', 'Shaun ', 'Gunathilaka', 'Nephrology', 'Upload/istockphoto-177373093-612x612.jpg'),
(66, '', 771203652, 'ilham20@gmail.com', 'ilham', 'doctor', 'Mohamed', 'Ilham', 'MBBS', 'Upload/sub-buzz-8753-1525882834-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcr`
--
ALTER TABLE `pcr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pcr`
--
ALTER TABLE `pcr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD CONSTRAINT `time_schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
