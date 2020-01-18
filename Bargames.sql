-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2019 at 04:15 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bargames`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_page`
--

CREATE TABLE `business_page` (
  `id` int(11) NOT NULL,
  `business_name` varchar(60) NOT NULL,
  `business_desc` longtext NOT NULL,
  `business_img_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_page`
--

INSERT INTO `business_page` (`id`, `business_name`, `business_desc`, `business_img_name`) VALUES
(1, 'Walk On', 'Over the next 9 years, hard work and dedication helped expand the Walk-On’s footprint to locations across south Louisiana. As Walk-On’s success grew, so too did its reputation in the industry and across the country. \r\n\r\nIn 2012, ESPN took notice and named Walk-On’s the #1 Sports Bar in America.', 'walkon.jpg'),
(2, 'Buffalo Wild Wings', 'IT ALL STARTED 35 YEARS AGO WITH TWO GUYS DRIVEN BY HUNGER!!\r\n\r\nThe year was 1982. Jim Disbrow and Scott Lowery had recently moved to Ohio from Buffalo, New York. All was fine until one day when the two were craving wings. Not just ordinary wings, but authentic Buffalo, New York-style chicken wings. With none to be found nearby, Jim and Scott had two choices: road trip to New York, or open a wing joint close to home. Lucky for us, they chose the latter. Hence, the beginning of Buffalo Wild Wings & Weck, now Buffalo Wild Wings®, the welcoming neighborhood atmosphere with a front-row seat for every sports fan that offers 21 mouth-watering signature sauces and seasonings.', 'buffalo.jpg'),
(3, 'Titos Pub', 'The Titos Pub offers an authentic and memorable experience for those sitting down to dine, or others enjoying the bar and nightlife. Our first location in Conshohocken was opened in 1991, back in 2000 we opened our second location in Wayne and then in 2014 we introduced our third location in the historical town of Phoenixville. At our Conshohocken, Wayne, and Phoenixville Pubs, you will find yourself in just the right atmosphere with the perfect location. We offer great live entertainment whether you’re in the mood to dance the night away with a DJ spinning or relax at dinner while listening to an acoustic set. The Titos Pub is a true American pub that offers many versatile settings so whatever mood you’re in, you can find comfort at either location.  We have televisions propped at all angles at the pub and many craft beer selections. Located in the heart of downtown Conshohocken so you’ll never feel like you’re missing a thing.', 'titos.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `b_users`
--

CREATE TABLE `b_users` (
  `id` int(11) NOT NULL,
  `bussname` text NOT NULL,
  `bussemail` varchar(100) NOT NULL,
  `bussusername` varchar(100) NOT NULL,
  `busslocation` text NOT NULL,
  `bussregnum` int(20) NOT NULL,
  `busspassword` varchar(100) NOT NULL,
  `bussimage` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Contactus`
--

CREATE TABLE `Contactus` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Contactus`
--

INSERT INTO `Contactus` (`id`, `email`, `question`) VALUES
(1, '$hello@gmail.com', '$dasd>'),
(2, 'hello@gmail.com', 'dasd>');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `Time` time NOT NULL,
  `Location` varchar(200) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `date`, `title`, `Time`, `Location`, `img`) VALUES
(1, '2019-11-30', 'LSU vs Texas A&M', '18:30:00', 'Bubba\'s Kitchen\r\n1230 Meridian Rd, Fort Collins, CO', 'lsu.jpg'),
(2, '2019-12-07', 'Alabama vs Auburn', '22:12:11', 'Georgia Bar\r\n3850 Georgian Rd, Atlanta, GA', 'auburn.jpg'),
(3, '2019-12-08', 'SAINTS vs DALLAS COWBOYS', '19:30:00', 'Walk On\'s Bar\r\n1478 Freak Street, New Orleans, LA', 'saints.jpg'),
(4, '2019-12-19', 'CHICAGO BEARS vs NEW ENGLAND PATRIOTS', '15:00:00', 'TITOS PUB \r\n3850 Soldier Lane, Lake Charles, LA', 'chicago.jpg'),
(5, '2019-12-27', 'HOUSTON ROCKETS vs GS WARRIORS', '19:30:00', 'Buffalo Wild Wings\r\n4850 Texas Drive, Houston, TX', 'houston.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resetPasswords`
--

CREATE TABLE `resetPasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resetPasswords`
--

INSERT INTO `resetPasswords` (`id`, `code`, `email`) VALUES
(47, '15de54c915b2bc', 'ram0onaru@gmail.com'),
(48, '15de54cc01ba80', 'ram0onaru@gmail.com'),
(49, '15de54cdbe5e8e', 'ram0onaru@gmail.com'),
(50, '15de54cee92101', 'ram0onaru@gmail.com'),
(51, '15de54d2163a18', 'ram0onaru@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'Arjan', 'Poudel', 'arjanpdl11', 'arjanpoudel1231@gmail.com', '7bcc5847ea8fdef3bb264d35824844c0'),
(2, 'Arjan', 'Poudel', 'arjanpdl111', 'arjanpoudel12311@gmail.com', '7bcc5847ea8fdef3bb264d35824844c0'),
(3, 'Arjan', 'Poudel', 'arjanpdl123', 'arjanpoudel1234@gmail.com', '995255a47969e2a2d3183f69bebe0757'),
(4, 'admin', 'admin', 'admin', 'admin@gmail.com', '7bcc5847ea8fdef3bb264d35824844c0'),
(5, 'Arjan', 'Poudel', 'ArjanPoudel', 'ram0onaru@gmail.com', 'db7c851717c0968f5905e306a63bd531'),
(7, 'Arjan', 'Poudel', 'ArjanPoudel', 'arjan.ramon@gmail.com', 'Poudel'),
(8, 'Dakr', 'Sun', 'DakrSun', 'darksun0008@gmail.com', 'fac07ace37f8716952fa6df5cca25add'),
(9, 'Isekai', 'Aaaa', 'IsekaiAaaa', 'isekaiaaaa52@gmail.com', '1014f245b6d72cfbcd2bd71816308e0d'),
(10, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(11, 'Fan', 'Finder', 'FanFinder', 'fansfindergames@gmail.com', '76a9e3931d790e841d9a29ab31c80746'),
(12, 'Jeff', 'Gray', 'JeffGray', 'jeffgray0101@gmail.com', 'f051dcf54c69026f4f10afe6d36dcff4'),
(13, 'walker', 'jeffery', 'walkerjeffery', 'walker.jeffery123@gmail.com', '05a03492df0a2aa7ef479ba82763558e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_page`
--
ALTER TABLE `business_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Contactus`
--
ALTER TABLE `Contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
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
-- AUTO_INCREMENT for table `business_page`
--
ALTER TABLE `business_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Contactus`
--
ALTER TABLE `Contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
