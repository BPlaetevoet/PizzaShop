-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2014 at 11:54 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestelitems`
--

CREATE TABLE IF NOT EXISTS `bestelitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `b_prijs` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_344183684584665A` (`product_id`),
  KEY `IDX_344183688D9F6D38` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `bestelitems`
--

INSERT INTO `bestelitems` (`id`, `product_id`, `order_id`, `aantal`, `b_prijs`) VALUES
(1, 3, 1, 1, 12.5),
(2, 2, 1, 1, 9.5),
(3, 4, 1, 2, 14.5),
(4, 2, 2, 1, 8),
(5, 4, 3, 1, 14.5),
(6, 10, 3, 2, 16.5),
(7, 7, 4, 1, 14.5),
(8, 10, 4, 1, 12),
(9, 12, 5, 1, 12.5),
(10, 4, 6, 1, 14.5),
(11, 6, 6, 1, 10),
(12, 3, 7, 1, 7.5),
(13, 3, 8, 1, 7.5),
(14, 4, 9, 1, 14.5),
(15, 12, 10, 1, 12.5),
(16, 10, 10, 1, 12),
(17, 3, 11, 1, 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klant_id` int(11) DEFAULT NULL,
  `bedrag` double DEFAULT NULL,
  `b_datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_35E67EBB3C427B2F` (`klant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `klant_id`, `bedrag`, `b_datum`) VALUES
(1, 1, 51, '2014-06-25 19:20:12'),
(2, 2, 8, '2014-06-28 21:41:10'),
(3, 3, 47.5, '2014-06-30 08:52:07'),
(4, 4, 26.5, '2014-06-30 11:53:21'),
(5, 4, 12.5, '2014-06-30 12:20:19'),
(6, 2, 24.5, '2014-06-30 14:27:34'),
(7, 7, 7.5, '2014-07-01 09:13:27'),
(8, 7, 7.5, '2014-07-01 09:19:58'),
(9, 9, 14.5, '2014-07-01 09:36:18'),
(10, 7, 24.5, '2014-07-01 09:38:47'),
(11, 7, 7.5, '2014-07-01 09:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `gastenboek`
--

CREATE TABLE IF NOT EXISTS `gastenboek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `boodschap` longtext COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gastenboek`
--

INSERT INTO `gastenboek` (`id`, `naam`, `mail`, `boodschap`, `datum`) VALUES
(1, 'Bart', 'Bart.Plaetevoet@Telenet.be', 'Lekker gegeten, een aanrader !!', '2014-06-28 23:12:55'),
(2, 'Jan', 'Jan.Janssens@Telenet.be', 'Prima service, netjes op tijd en heel lekker.', '2014-06-30 08:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `i_naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `i_naam`) VALUES
(2, 'pepperoni'),
(3, 'ham'),
(4, 'gegrilde kip'),
(5, 'gehakt'),
(6, 'barbecue-saus'),
(8, 'salami'),
(11, 'paprika'),
(12, 'ajuin'),
(13, 'champignons'),
(14, 'tomaat'),
(15, 'mozzarella'),
(16, 'kip'),
(17, 'pomodoro'),
(19, 'zeevruchten'),
(21, 'ananas'),
(22, 'groene paprika'),
(23, 'ui'),
(24, 'tomatenblokjes'),
(25, 'tomatensaus');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_product`
--

CREATE TABLE IF NOT EXISTS `ingredient_product` (
  `ingredient_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`ingredient_id`,`product_id`),
  KEY `IDX_D27D0F6B933FE08C` (`ingredient_id`),
  KEY `IDX_D27D0F6B4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredient_product`
--

INSERT INTO `ingredient_product` (`ingredient_id`, `product_id`) VALUES
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(3, 5),
(3, 10),
(4, 3),
(4, 10),
(5, 3),
(6, 3),
(8, 4),
(8, 5),
(11, 5),
(11, 6),
(12, 5),
(12, 7),
(13, 5),
(13, 12),
(14, 6),
(15, 6),
(15, 12),
(16, 6),
(17, 6),
(19, 7),
(21, 10),
(22, 12),
(23, 12),
(24, 12),
(25, 12);

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plaats_id` int(11) DEFAULT NULL,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `straat` varchar(52) COLLATE utf8_unicode_ci NOT NULL,
  `nr` int(11) NOT NULL,
  `telefoonnr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bus` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F538C5BC935FAC7E` (`plaats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `plaats_id`, `naam`, `voornaam`, `straat`, `nr`, `telefoonnr`, `bus`) VALUES
(1, 1, 'Luikaku', 'Romelo', 'straat', 12, '051231456', '3B'),
(2, 2, 'Plaetevoet', 'Bart', 'Dekemelelaan', 29, '0494231456', NULL),
(3, 1, 'Degenkolb', 'John', 'straat', 2, '051235689', NULL),
(4, 6, 'Janssens', 'Jan', 'kwakkelstraat', 12, '015231456', NULL),
(5, 3, 'Janssens', 'Jan', 'Keibergstrasse', 20, '0473124578', NULL),
(6, 4, 'Janssens', 'Jan', 'Keibergstrasse', 120, '015231456', NULL),
(7, 2, 'Plaetevoet', 'Jason', 'Dekemelelaan', 29, '0494231456', NULL),
(8, 5, 'Suffies', 'Marrie', 'suffiesstraat', 24, '057897563', NULL),
(9, 5, 'Kicker', 'Kurt', 'keistraat', 24, '057123456', '2B');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `specialprice` tinyint(1) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_unique` (`email`),
  UNIQUE KEY `UNIQ_45A0D2FF3C427B2F` (`klant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `specialprice`, `klant_id`) VALUES
(1, 'Bart.Plaetevoet@Telenet.be', '701f33b8d1366cde9cb3822256a62c01', NULL, 2),
(2, 'John.Degenkolb@hotmail.com', '701f33b8d1366cde9cb3822256a62c01', NULL, 3),
(3, 'Jason.Plaetevoet@Telenet.be', '701f33b8d1366cde9cb3822256a62c01', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `plaats`
--

CREATE TABLE IF NOT EXISTS `plaats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(11) NOT NULL,
  `gemeente` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gemeente_unique` (`gemeente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `plaats`
--

INSERT INTO `plaats` (`id`, `postcode`, `gemeente`) VALUES
(1, 8900, 'Ieper'),
(2, 8904, 'Boezinge'),
(3, 8908, 'Vlamertinge'),
(4, 8900, 'Dikkebus'),
(5, 8902, 'Zillebeke'),
(6, 8980, 'zonnebeke');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prijs` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B3BA5A5AFC4DB938` (`naam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `naam`, `prijs`) VALUES
(2, 'Pepperoni', 9.5),
(3, 'Meat Lover', 12.5),
(4, 'Super Salami', 14.5),
(5, 'Quattro Stagione', 11.9),
(6, 'Rio Grande', 10),
(7, 'Frutti di Mare', 14.5),
(10, 'Hawai', 16.5),
(12, 'Garden Lovers', 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE IF NOT EXISTS `promos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `promoprijs` double NOT NULL,
  `b_datum` date NOT NULL,
  `e_datum` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31D1F7054584665A` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `product_id`, `promoprijs`, `b_datum`, `e_datum`) VALUES
(1, 2, 8, '2014-06-24', '2014-06-29'),
(2, 4, 8.5, '2014-06-24', '2014-06-29'),
(3, 3, 7.5, '2014-07-01', '2014-07-06'),
(4, 7, 8, '2014-07-08', '2014-07-13'),
(5, 10, 12, '2014-06-29', '2014-07-06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelitems`
--
ALTER TABLE `bestelitems`
  ADD CONSTRAINT `FK_344183684584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_344183688D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `bestellingen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `FK_35E67EBB3C427B2F` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`id`);

--
-- Constraints for table `ingredient_product`
--
ALTER TABLE `ingredient_product`
  ADD CONSTRAINT `FK_D27D0F6B4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D27D0F6B933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `FK_F538C5BC935FAC7E` FOREIGN KEY (`plaats_id`) REFERENCES `plaats` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `FK_45A0D2FF3C427B2F` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`id`);

--
-- Constraints for table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `FK_31D1F7054584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
