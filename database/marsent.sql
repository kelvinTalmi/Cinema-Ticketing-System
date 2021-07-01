-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2021 at 04:07 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marsent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Stano', 'test@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `seat_type` varchar(255) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `snacks_drinks` varchar(255) NOT NULL,
  `shows` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `seat_type`, `no_of_seats`, `snacks_drinks`, `shows`, `name`, `email`, `phone_number`, `total_paid`, `status`) VALUES
(26, 'vvip1000', 1, 'Soda,Water and popcorns:180', 'Jack Ryan', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1180, 4),
(27, 'vvip1000', 10, 'choose', 'Jack Ryan', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 10000, 1),
(41, 'vvip:ksh 1000', 1, 'choose', 'Power', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1000, 1),
(42, 'vvip:ksh 1000', 1, 'choose', 'Power', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1000, 1),
(45, 'vvip:ksh 1000', 1, 'Water and popcorns:ksh 80', 'Power', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1080, 1),
(46, 'regular:ksh 300', 1, '', 'Power', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 300, 1),
(47, 'vip:ksh 500', 1, 'none', 'Power', 'Marvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 500, 2),
(48, 'vip:ksh 500', 1, 'Water:ksh 30', 'Power', 'Kelvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 530, 1),
(49, 'vvip:ksh 1000', 1, 'none', 'Power', 'Kelvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1000, 1),
(50, 'vvip:ksh 1000', 1, 'PopCorns:ksh 100', 'Jack Ryan', 'kelvin', 'kelvinkariuki141@gmail.com', 'John Doe', 1100, 2),
(51, 'vip:ksh 500', 1, 'none', 'Power', 'kelvin', 'kelvinkariuki141@gmail.com', 'John Doe', 500, 1),
(52, 'vvip:ksh 1000', 1, 'chipo:ksh 5', 'The Last Ship', 'Kelvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 1005, 2),
(53, 'vip:ksh 500', 1, 'chips:ksh 10', 'Jack Ryan', 'Wangeci Nyaga', 'wangecinyaga@gmail.com', '0712345678', 510, 4),
(54, 'regular:ksh 300', 2, 'Water and popcorns:ksh 80', 'Jack Ryan', 'Kelvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 680, 4),
(55, 'regular:ksh 300', 1, 'Water and popcorns:ksh 80', 'alex', 'Kelvin Kinyua', 'talmibooks18@gmail.com', '0701710218', 380, 2),
(56, 'vip:ksh 500', 1, 'Soda,Water and popcorns:ksh 180', 'The Last Ship', 'sam kamau', 'samkamau@gmail.com', '0787828374', 680, 4),
(57, 'vip:ksh 500', 1, 'Water:ksh 30', 'The Last Ship', 'sam kamau', 'samkamau@gmail.com', '0787828374', 530, 2),
(58, 'vip:ksh 500', 1, 'Water:ksh 30', 'The Last Ship', 'sam Kiptoo', 'samkiptoo@gmail.com', '0700282305', 530, 4),
(59, 'regular:ksh 300', 1, 'none', 'Jack Ryan', 'sam Kiptoo', 'samkiptoo@gmail.com', '0700282305', 300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_shows`
--

CREATE TABLE `cancelled_shows` (
  `id` int(11) NOT NULL,
  `show_title` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `penalty_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancelled_shows`
--

INSERT INTO `cancelled_shows` (`id`, `show_title`, `user_email`, `penalty_fee`) VALUES
(1, 'Power', 'talmibooks18@gmail.com', 67),
(2, 'Jack Ryan', 'kelvinkariuki141@gmail.com', 110),
(3, 'alex', 'talmibooks18@gmail.com', 38),
(4, 'The Last Ship', 'samkamau@gmail.com', 53),
(5, 'Jack Ryan', 'samkiptoo@gmail.com', 30);

-- --------------------------------------------------------

--
-- Table structure for table `movies_series`
--

CREATE TABLE `movies_series` (
  `id` int(11) NOT NULL,
  `series` varchar(255) NOT NULL,
  `movies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_series`
--

INSERT INTO `movies_series` (`id`, `series`, `movies`) VALUES
(1, 'Prison Break', 'The Future ');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpesa`
--

INSERT INTO `mpesa` (`id`, `code`, `amount`, `status`, `date_created`) VALUES
(1, 'PBC4L5R2BL', 300, 0, '2021-03-26 11:16:57'),
(2, 'PBC4L5R2BL1', 600, 1, '2021-03-26 11:16:57'),
(3, 'PBC4L5R2BL', 1000, 0, '2021-06-03 06:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `reset_hash` varchar(64) NOT NULL,
  `reset_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `reset_hash`, `reset_time`) VALUES
(1, 'e9eb6b364536829e790e3d3ff27987ab', '2021-02-10 20:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat`, `price`, `total_seats`) VALUES
(1, 'vvip', 1000, 30),
(2, 'vip', 500, 50),
(3, 'regular', 300, 100);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `regular` int(11) NOT NULL,
  `main_character` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `vvip` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `category` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `PostingDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `description`, `date`, `time`, `regular`, `main_character`, `rating`, `vip`, `vvip`, `image`, `status`, `category`, `release_date`, `PostingDate`) VALUES
(1, 'Three Days of the Condor', 'The film is about a bookish CIA researcher who comes back from lunch one day to discover his co-workers murdered, and tries to outwit those responsible.', '2021-03-25', '17:27', 345, 'James Stewart', 5, 800, 1000, '1616839575cowh.jpg', 1, 'Horror', '2021-02-17', '2021-02-17 10:02:37'),
(2, 'Power', 'The film is about a bookish CIA researcher who comes back from lunch one day to discover his co-workers murdered, and tries to outwit those responsible.', '6/3/2020', '23434', 435, 'James bond', 4, 43, 3, 'power.jpg', 1, 'Drama', '2021-03-20 ', NULL),
(3, 'Jack Ryan', 'The film is about a bookish CIA researcher who comes back from lunch one day to discover his co-workers murdered, and tries to outwit those responsible.', '9/3/2020', '3427', 342, 'Jack Ryan', 4, 0, 0, 'jackryan.jpg', 1, 'Investigative', '2021-03-19', NULL),
(4, 'The Last Ship', 'The film is about a bookish CIA researcher who comes back from lunch one day to discover his co-workers murdered, and tries to outwit those responsible.', '2021-03-27', '13:07', 0, 'Captain', 5, 0, 0, '1616839550lastship.jpg', 1, 'Action', '2021-02-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `snacks_drinks`
--

CREATE TABLE `snacks_drinks` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `snacks_drinks`
--

INSERT INTO `snacks_drinks` (`id`, `item`, `price`) VALUES
(11, 'chips', 10),
(12, 'Soda,Water and popcorns', 180),
(13, 'Water and popcorns', 80),
(14, 'Water', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wallet` int(11) NOT NULL,
  `date_created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `wallet`, `date_created`) VALUES
(1, 'Test', 'test@gmail.com', '0712345678', '827ccb0eea8a706c4c34a16891f84e7b', 1000, '2021-02-12 15:52:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelled_shows`
--
ALTER TABLE `cancelled_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_series`
--
ALTER TABLE `movies_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snacks_drinks`
--
ALTER TABLE `snacks_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `cancelled_shows`
--
ALTER TABLE `cancelled_shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies_series`
--
ALTER TABLE `movies_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `snacks_drinks`
--
ALTER TABLE `snacks_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
