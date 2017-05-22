-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 05:27 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 7.0.17-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--
CREATE DATABASE IF NOT EXISTS `my_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--
-- Creation: Mar 17, 2017 at 11:22 AM
--

DROP TABLE IF EXISTS `Category`;
CREATE TABLE `Category` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`, `parent_id`) VALUES
(10, 'Pain', 0),
(11, 'Viennoiserie', 0),
(12, 'Patisserie', 0),
(13, 'Pain blanc', 10),
(14, 'Pain noir', 10),
(15, 'Pain special', 10),
(16, 'Baguette', 13),
(17, 'Tradition', 13),
(18, 'Sale', 11),
(19, 'Sucre', 11),
(20, 'Chocolatine', 19),
(21, 'Croissant', 19),
(22, 'Viennoise', 19),
(23, 'Regionale', 12),
(24, 'Orientale', 12),
(25, 'Millefeuille', 23),
(26, 'Tarte aux pommes', 23),
(27, 'Tarte aux fraises', 26),
(28, 'polo', 17);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--
-- Creation: Mar 20, 2017 at 11:06 AM
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `name`, `price`, `category_id`) VALUES
(4, 'Parisienne', 1, 16),
(5, 'Ficelle', 0.9, 16),
(6, 'Tradi', 1.2, 17),
(7, 'Gourmande', 1.3, 17),
(8, 'Pain Allemand', 1.1, 14),
(9, 'Pain aux noix', 1.2, 15),
(10, 'Pain aux olives', 1, 15),
(11, 'Pain aux anchois', 1, 15),
(12, 'Croissant au fromage', 2, 18),
(13, 'Pain au chocolat', 1.5, 20),
(14, 'Croissant ordinaire', 0.9, 21),
(15, 'Croissant au beurre', 1.1, 21),
(16, 'Viennoise au chocolat', 1.5, 22),
(17, 'Viennoise nature', 1, 22),
(18, 'Millefeuille a la pistache', 2.5, 25),
(19, 'Millefeuille a la creme', 2, 25),
(20, 'Tarte aux pommes de mami', 3, 26),
(21, 'Tarte aux pommes de papi', 1.7, 26),
(22, 'Corne de gazelle', 2, 24),
(23, 'Makrout', 2.5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
-- Creation: Mar 17, 2017 at 11:17 AM
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(8, 'qesrdfhg', 'yuh@tyuio.kmo', '$2y$10$.gvZaCS7lDBOCGNGWq64gegxVcaAOFvhADRMMGCT1I7cerX0jdPQa', 0),
(9, 'polo', 'pol@lol.fr', '$2y$10$pc.uUVoG3iyJZtrNdjQvVeMeJqK2kdvgAJPAKzUAUXqh3TXMJbpXi', 0),
(10, 'yoyo', 'yoyo@gmail.fr', '$2y$10$wIx.I.CLhWYpwAYllVe49.93E/bftYMK8m.HkXazoaSl.aAIH/UJG', 1),
(13, 'tat', 'polo@gdghd.fr', '$2y$10$E.PH2TPOBq8KKOOQBuZXU.l4ZWWHg.d64YX6SFsmuhZFrTJeJywte', 0),
(14, 'admin', 'admin@admin.fr', '$2y$10$wJAbzgPOPBUxGhQ6SwgJZujHYGYLvrskbd9TR9tEG8O5hshq7VNxG', 1),
(15, 'toto', 'toto@toto.fr', '$2y$10$5r1qIi4JFFR.7Wi.Evy.muXKxlCVq81eqvDQCbqen/q5kMNYQy/w.', 0),
(20, 'zaza', 'zaza@hotmail.fr', '$2y$10$FoHvSvIqlSjnHgAXresyr.ozZgqA0EcSU5ZIblcgniPD/JXprBy.y', 0),
(26, 'admin3', 'admin3@admin3.fr', '$2y$10$BBxdqaimzBJlVTBLybXs..VZDsVgomRXmFmORoBhVgZluAvoTiFBC', 1),
(28, 'mamannoel', 'papa@hotmail.fr', '$2y$10$GpeW3AGEefPF5t2rBKpvCuQsjJWxiIvJNqIRJc8yFrq.ajCFeu3gy', 0),
(29, 'mamannoel', 'papa@hotmail.fr', '$2y$10$NSKIi2OUfNrVfBu5O8oQIuLufrBZ20wvQeJi90VhDCZafNzzZbk/O', 0),
(30, 'papannoel', 'papa@hotmail.fr', '$2y$10$y7NdH1wnbn2U5GZzBxtY2e1wlSu/JuLcNEzlePRpkU/vIN8huhmgi', 0),
(31, 'mamannnoel', 'maman@hotmail.fr', '$2y$10$HNBJuTTf6HA5zWtLhK4vROx7ujw5BPRPM8BQKYl8Gw8HAv9WQmVwu', 0),
(33, 'momo', 'momo@momo.fr', '$2y$10$/kYVfJ9qeMYRxUWaE472SOlL3yYdDbBONUazs.UrpFqabAsWFLshi', 1),
(35, 'pol', 'pol@pol.com', '$2y$10$WxtAA.97jO1lVn2B9tkvKOgheN5NJqIHNAwnIqgVD2PPPerokSetC', 0),
(36, 'paulo', 'pol@pol.com', '$2y$10$Feg3ASaifpG8Cj4GfCuGK.W1eO6QQ0Ob/YJ.0mq/4vbPFmRvQjRwC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
