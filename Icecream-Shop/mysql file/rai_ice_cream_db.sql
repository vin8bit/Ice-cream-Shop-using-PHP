-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 03:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rai_ice_cream_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('aryan', '123'),
('vin', '1234'),
('vin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `pname` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `pcode` varchar(8) COLLATE utf8_estonian_ci NOT NULL,
  `price` int(8) NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `pname`, `pcode`, `price`, `quantity`) VALUES
('vin', 'Vanilla Magic', 'g1', 150, 1),
('vin', 'Sea Salted Caramel,', 'g2', 400, 1),
('kiru', 'Malai Kulfi', 'g3', 150, 1),
('kiru', 'Sea Salted Caramel,', 'g2', 400, 1),
('kiru', 'Sundae Cup', 'g6', 30, 1),
('niku', 'Touch Tiramisu', 'g7', 300, 1),
('niku', 'Sundae Cup', 'g6', 30, 1),
('niku', 'Sea Salted Caramel,', 'g2', 400, 1),
('sonu', 'Sea Salted Caramel,', 'g2', 400, 1),
('aryan', 'Vanilla Magic', 'g1', 150, 1),
('aryan', 'Sea Salted Caramel,', 'g2', 400, 3),
('aryan', 'Sundae Cup', 'g6', 30, 1),
('aryan', 'Malai Kulfi', 'g3', 150, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date3` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `message`, `date3`) VALUES
('vin', 'I love this ice cream shop', '2020-11-23'),
('vin', 'Please add more  ice creams', '2020-11-23'),
('kiru', 'Sweet ice creaaaaaaaaaaaaaaaaaaammmmmmmmmmmmmmmmmsssssssss', '2020-11-23'),
('kiru', 'Always good ice.................', '2020-11-23'),
('sonu', 'Please tell me the best icecream you hava.', '2020-11-23'),
('sonu', 'I got it....thanks', '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `username` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` int(13) NOT NULL,
  `date2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`username`, `name`, `address`, `phone`, `date2`) VALUES
('vin', 'vk', 'Badarpur New Delhi 110044', 555555555, '2020-11-23'),
('kiru', 'Kiran Jha', 'Sarita Vihar New Delhi', 888888888, '2020-11-23'),
('niku', 'Nkhil Kumar', 'Badarpur New Delhi 110044', 555555555, '2020-11-23'),
('sonu', 'Sonu Ram Viswas', 'Madangiri New Delhi', 333333333, '2020-11-23'),
('aryan', 'Aryan Kumar Rai', 'lajpat nagar new delhi', 666666666, '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `code` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `category`, `price`, `description`, `code`) VALUES
(12, 'Vanilla Magic', 17, 'Amul Real Ice Cream', 150, 'Amul Real milk vanilla ice cream now in a tub that enough for all your friends. The classics never go out of the fashion. ', 'g1'),
(14, 'Malai Kulfi', 6, 'Cream Pot', 150, 'A slice of smooth milky malai kulfi from Cream Pot gives you the real taste of kulfi. ', 'g3'),
(15, 'Gold Ice Cream', 22, 'Amul Caramel Chocolate ', 225, 'Amul Real milk ice cream is now in a tub that enough for all your fri', 'g4'),
(16, 'Sundae Cup', 5, 'Spoon Me! Enjoy classic vanilla with ric', 30, 'Spoon Me! Enjoy classic vanilla with ric', 'g6'),
(17, 'Touch Tiramisu', 6, 'The Finishin', 300, 'Our delicious Italian inspired Tiramisu dessert is made of layers o', 'g7'),
(18, 'Mississippi Mud, 1', 12, 'Baskin Robbins ', 110, ' Mississippi Mud Sundae is a rich chocolate fudge ice cream', 'g8');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `codem` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`product_id`, `filename`, `codem`) VALUES
(12, 'uploads/Screenshot from 2020-11-23 14-40-17.png', 'g1'),
(14, 'uploads/Screenshot from 2020-11-23 15-06-09.png', 'g3'),
(15, 'uploads/Screenshot from 2020-11-23 15-14-50.png', 'g4'),
(16, 'uploads/Screenshot from 2020-11-23 15-17-57.png', 'g6'),
(17, 'uploads/Screenshot from 2020-11-23 15-25-32.png', 'g7'),
(18, 'uploads/Screenshot from 2020-11-23 18-03-28.png', 'g8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`, `name`) VALUES
(8, 'sonu', 'sk@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-11-23 11:30:00', 'Suno Ram Vishwas'),
(7, 'Kiru', 'kj@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-11-23 11:29:08', 'Kiran Jha'),
(6, 'vin', 'vk4534@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-11-23 11:28:36', 'Vineet Kumar'),
(9, 'niku', 'nk@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-11-23 11:30:42', 'Nikhil Kumar'),
(10, 'rahul', 'rk@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '2020-11-23 11:31:29', 'Rahul Kumar Jha'),
(11, 'aryan', 'ak@gmail.cpom', '202cb962ac59075b964b07152d234b70', '2020-11-23 12:41:04', 'Aryan Kumar Rai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
