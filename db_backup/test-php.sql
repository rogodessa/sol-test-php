-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2024 at 04:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Liqueur', 'liqueur'),
(2, 'Tequila', 'tequila'),
(3, 'Whiskey', 'whiskey'),
(4, 'Scotch', 'scotch'),
(5, 'Wine', 'wine'),
(6, 'Champagne', 'champagne'),
(7, 'Rum', 'rum'),
(8, 'Vodka', 'vodka'),
(9, 'Gin', 'gin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `date`) VALUES
(1, 'Godiva Chocolate Liqueur', '29.00', '2024-09-01 11:06:28'),
(2, 'Grand Marnier Cuvee Du Centenaire 100Yr Liqueur', '33.00', '2024-09-02 11:06:28'),
(3, 'Casa Noble Anejo Tequila', '22.50', '2024-09-03 11:06:28'),
(4, 'Rowans Creek American Whiskey', '48.00', '2024-09-04 11:06:28'),
(5, 'Bushmills Original Irish Whisky', '52.00', '2024-09-05 11:06:28'),
(6, 'Clontarf Irish Whisky', '105.00', '2024-09-06 11:06:28'),
(7, 'Compass Box Peat Monster Blended Malt Scotch', '70.00', '2024-09-07 11:06:28'),
(8, 'Isenhower Road Less Traveled 2007 Cabernet Franc Wine', '21.00', '2024-09-08 11:06:28'),
(9, 'Altovinum Evodia 2016 Garnacha Wine', '34.00', '2024-09-09 11:06:28'),
(10, 'J Lohr Los Osos Paso Robles 2019 Merlot Wine', '45.00', '2024-09-10 11:06:28'),
(11, 'Perrier Jouet Blason Rose Champagne', '42.00', '2024-09-17 11:06:28'),
(12, 'Louis Roederer Brut Premier Champagne', '48.00', '2024-09-17 11:06:28'),
(13, 'Buchanans 18yr Blended Scotch Whisky', '65.00', '2024-09-17 11:06:28'),
(14, 'Bacardi Reserva Limitada Rum', '62.00', '2024-09-17 11:06:28'),
(15, 'Godiva Dark Chocolate Liqueur', '36.00', '2024-09-17 11:06:28'),
(16, 'Tanduay Gold Asian Rum', '54.00', '2024-09-17 11:06:28'),
(17, 'Old Overholt Straight Rye American Whiskey', '68.00', '2024-09-17 11:06:28'),
(18, 'Christopher Michael 2013 Red Blend Wine', '42.00', '2024-09-17 11:06:28'),
(19, 'Old St Pete Tropical Gin', '88.00', '2024-09-17 11:06:28'),
(20, 'Western Son South Texas Prickly Pear Vodka', '40.00', '2024-09-17 11:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `product_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 3),
(6, 3),
(7, 4),
(8, 5),
(9, 5),
(10, 5),
(11, 6),
(11, 5),
(12, 6),
(12, 5),
(13, 3),
(14, 7),
(15, 1),
(16, 7),
(17, 3),
(18, 5),
(19, 9),
(20, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
