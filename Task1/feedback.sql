-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 03:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE `recepies` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `ingredient` text NOT NULL,
  `method` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `name`, `ingredient`, `method`, `file`, `duration`) VALUES
(6, 'tomato basil pasta', '200g pasta,1 cup cherry tomatoe,Fresh basil leaves,Olive oil,Salt and pepper to taste', 'Cook pasta al dente drain , Toss with olive oil and tomatoes and basil, Season with salt and pepper', '1702464773_tomato_pasta.jpg', 60),
(9, 'barrie Smoothie shake', '1 cup mixed berries,1 ripe banana,1/2 cup Greek yogurt,1/2 cup milk,1 tbsp honey (optional),1/2 tsp vanilla extract', 'Blend all ingredients until smooth,Adjust sweetness if needed,Optional: Add ice cubes and blend.', '1702466111_berry.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recepies`
--
ALTER TABLE `recepies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recepies`
--
ALTER TABLE `recepies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
