-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 04:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_cost_details`
--

CREATE TABLE `borrow_cost_details` (
  `borrow_id` varchar(10) NOT NULL,
  `category_cost` varchar(10) NOT NULL,
  `destination_cost` varchar(10) NOT NULL,
  `driving_cost` varchar(10) NOT NULL,
  `total_day` varchar(5) NOT NULL,
  `duration_cost` varchar(10) NOT NULL,
  `total_cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_cost_details`
--

INSERT INTO `borrow_cost_details` (`borrow_id`, `category_cost`, `destination_cost`, `driving_cost`, `total_day`, `duration_cost`, `total_cost`) VALUES
('30000', '1000', '1000', '500', '3', '4500', '7000'),
('30001', '1000', '1000', '500', '1', '1500', '4000'),
('30003', '1000', '1000', '500', '1', '1500', '4000'),
('30004', '1000', '1000', '500', '1', '1500', '4000'),
('30005', '1000', '1000', '500', '1', '1500', '4000'),
('30006', '1000', '1000', '500', '2', '3000', '5500'),
('30007', '1000', '1000', '500', '1', '1500', '4000'),
('30008', '1000', '1000', '500', '1', '1500', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_information`
--

CREATE TABLE `borrow_information` (
  `borrow_id` int(5) NOT NULL,
  `vehicle_id` varchar(5) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `vehicle_category` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `driving_option` varchar(20) NOT NULL,
  `user_license_number` varchar(15) DEFAULT NULL,
  `travel_start_date` varchar(30) NOT NULL,
  `travel_end_date` varchar(30) NOT NULL,
  `total_cost` varchar(10) NOT NULL,
  `borrow_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_information`
--

INSERT INTO `borrow_information` (`borrow_id`, `vehicle_id`, `user_id`, `vehicle_category`, `destination`, `driving_option`, `user_license_number`, `travel_start_date`, `travel_end_date`, `total_cost`, `borrow_status`) VALUES
(30000, '20002', '10002', 'standard', 'insideDhaka', 'selfDriving', 'AA4587985Q45872', '22-Nov-2019', '24-Nov-2019', '7000', 'complete'),
(30001, '20000', '10003', 'standard', 'insideDhaka', 'selfDriving', 'AA4587985Q14771', '20/Nov/2019', '21/Nov/2019', '4000', 'pending'),
(30003, '20001', '10004', 'standard', 'insideDhaka', 'selfDriving', 'AA4703201Q45872', '26/Nov/2019', '27/Nov/2019', '4000', 'complete'),
(30004, '20006', '10013', 'standard', 'insideDhaka', 'selfDriving', 'WE4587985S77702', '29/Nov/2019', '30/Nov/2019', '4000', 'complete'),
(30005, '20005', '10014', 'standard', 'insideDhaka', 'selfDriving', 'KK4220985Q45872', '29/Nov/2019', '30/Nov/2019', '4000', 'complete'),
(30006, '20006', '10014', 'standard', 'insideDhaka', 'selfDriving', 'DS1258001Z02585', '01/Dec/2019', '03/Dec/2019', '5500', 'complete'),
(30007, '20004', '10014', 'standard', 'insideDhaka', 'selfDriving', 'DS1258001Z02585', '02/Dec/2019', '03/Dec/2019', '4000', 'complete'),
(30008, '20001', '10004', 'standard', 'insideDhaka', 'selfDriving', 'DS1258001Z78770', '29/Nov/2019', '30/Nov/2019', '4000', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `image_URL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `email`, `name`, `type`, `password`, `phone_number`, `birthdate`, `gender`, `image_URL`) VALUES
(10000, 'admin@gmail.com', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '01758975011', '08/Nov/1995', 'male', 'uploadImage/uploadImageOfUser/admin.jpg'),
(10001, 'client@gmail.com', 'Client', 'client', '62608e08adc29a8d6dbc9754e659f125', '01758224300', '15/Nov/1995', 'male', 'uploadImage/uploadImageOfUser/client.jpg'),
(10002, 'customer@gmail.com', 'Customer', 'customer', '91ec1f9324753048c0096d036a694f86', '01928221176', '25/Nov/1995', 'male', 'uploadImage/uploadImageOfUser/customer.jpg'),
(10003, 'estiak@gmail.com', 'Md Estiak Ahmed', 'customer', 'fa4b245d9b55c2d9bfbe1383ae3f1a19', '01766461990', NULL, 'male', 'uploadImage/uploadImageOfUser/estiak.png'),
(10004, 'adnan@gmail.com', 'adnan harun', 'customer', 'd1a0a9e9391af09e978c4c3d11711e75', '01758975000', '13/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/adnan.png'),
(10005, 'samira@gmail.com', 'Samira Sobhan', 'customer', '415f7c96da3e79cf3588156e93522caa', '01701250220', '12/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/samira.jpg'),
(10006, 'emad@gmail.com', 'Emad Harun', 'customer', 'cd4b0182cd619826607118a247cd7b9f', '01987589330', '20/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/emad.png'),
(10007, 'niloy@gmail.com', 'mahtab niloy', 'customer', '4bc66266b4b908b8657fad3e889e54ff', '01987589330', '07/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/niloy.png'),
(10008, 'tanjin@gmail.com', 'tanjin', 'customer', 'caac14b720ec622c1d5b7a51a29e09e0', '01523597110', '18/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/tanjin.png'),
(10010, 'farhan@gmail.com', 'Farhan Islam', 'client', 'd1bbb2af69fd350b6d6bd88655757b47', '01687525880', '08/Feb/1994', 'Male', 'uploadImage/uploadImageOfUser/FB_IMG_1428218027780'),
(10011, 'fahmida@gmail.com', 'fahmida Hauque', 'client', '7937d96549a7d1d9dcc3cd2c32012359', '01758896742', '12/Nov/2019', 'Male', 'uploadImage/uploadImageOfUser/fahmida.png'),
(10012, 'chaity@gmail.com', 'Chaity Sayma Kamal', 'customer', 'a55841fa94be4edd2aeee235c080a285', '01799852330', '03/Jun/1997', 'Female', 'uploadImage/uploadImageOfUser/chaity.jpg'),
(10014, 'faruk@gmail.com', 'Faruk Ahmed', 'customer', '9ff41dc4b232afef1d884bc1b9231c24', '01987500005', '02/Jan/1984', 'Male', 'uploadImage/uploadImageOfUser/user_man-512.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_information`
--

CREATE TABLE `vehicle_information` (
  `id` int(5) NOT NULL,
  `owner_email` varchar(30) NOT NULL,
  `vehicle_type` varchar(15) NOT NULL,
  `company` varchar(15) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `license_expiry_date` varchar(20) NOT NULL,
  `seat_number` varchar(2) NOT NULL,
  `color` varchar(10) NOT NULL,
  `hoursepower` varchar(20) NOT NULL,
  `image_URL` varchar(70) NOT NULL,
  `status` varchar(15) NOT NULL,
  `borrow_count` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_information`
--

INSERT INTO `vehicle_information` (`id`, `owner_email`, `vehicle_type`, `company`, `license_number`, `license_expiry_date`, `seat_number`, `color`, `hoursepower`, `image_URL`, `status`, `borrow_count`) VALUES
(20001, 'admin@gmail.com', 'standard', 'toyota', 'dhaka metro ka 45-4596', '11-Dec-2025', '5', 'black', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/toyota_black_2.png', 'available', 2),
(20002, 'client@gmail.com', 'suv', 'toyota', 'dhaka MERTRO kha 45/1254', '4-Apr-2023', '6', 'silver', '1501 to 2000', 'uploadImage/uploadImageOfVehicle/toyota_suv.png', 'unavailable', 1),
(20003, 'client@gmail.com', 'suv', 'honda', 'dhaka metro ka 12/4258', '1-Mar-2021', '6', 'black', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/honda1.webp', 'available', 0),
(20004, 'admin@gmail.com', 'standard', 'mitsubishi', 'dhaka metro ka 45-7530', '20-Nov-2025', '5', 'silver', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/mitshubishi1.png', 'available', 1),
(20005, 'admin@gmail.com', 'standard', 'mitsubishi', 'dhaka metro ga 01-7410', '13-Nov-2023', '5', 'black', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/mitshubishi5.png', 'available', 1),
(20006, 'admin@gmail.com', 'standard', 'honda', 'dhaka metro ka 88-7788', '17-Nov-2025', '5', 'white', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/honda2.png', 'available', 2),
(20007, 'admin@gmail.com', 'suv', 'nissan', 'dhaka metro ka 33-0781', '10-Jun-2025', '6', 'silver', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/nisaan5.png', 'available', 0),
(20011, 'admin@gmail.com', 'suv', 'toyota', 'chittagong metro ka 11-9999', '23-Dec-2025', '6', 'black', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/toyota_black_1.png', 'available', 0),
(20013, 'admin@gmail.com', 'standard', 'toyota', 'dhaka metro ka 44-7800', '23-Dec-2025', '5', 'black', '1000 to 1500', 'uploadImage/uploadImageOfVehicle/honda3.png', 'available', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_cost_details`
--
ALTER TABLE `borrow_cost_details`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `borrow_information`
--
ALTER TABLE `borrow_information`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `not_be_same` (`phone_number`,`email`);

--
-- Indexes for table `vehicle_information`
--
ALTER TABLE `vehicle_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `license_number` (`license_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_information`
--
ALTER TABLE `borrow_information`
  MODIFY `borrow_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30009;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;

--
-- AUTO_INCREMENT for table `vehicle_information`
--
ALTER TABLE `vehicle_information`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20014;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
