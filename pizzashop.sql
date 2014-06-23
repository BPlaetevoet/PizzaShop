-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 23 jun 2014 om 22:54
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `pizzashop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelitems`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klant_id` int(11) DEFAULT NULL,
  `bedrag` double DEFAULT NULL,
  `b_datum` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35E67EBB3C427B2F` (`klant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `i_naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B60114F4584665A` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Gegevens worden geëxporteerd voor tabel `ingredients`
--

INSERT INTO `ingredients` (`id`, `product_id`, `i_naam`) VALUES
(1, 2, 'Pepperoni'),
(2, 3, 'pepperoni'),
(3, 3, 'ham'),
(4, 3, 'gegrilde kip'),
(5, 3, 'gehakt'),
(6, 3, 'barbecue-saus'),
(7, 4, 'ham'),
(8, 4, 'salami'),
(9, 5, 'ham'),
(10, 5, 'salami'),
(11, 5, 'paprika'),
(12, 5, 'ajuin'),
(13, 5, 'champignons'),
(14, 6, 'tomaat'),
(15, 6, 'mozzarella'),
(16, 6, 'kip'),
(17, 6, 'pomodoro'),
(18, 6, 'paprika'),
(19, 7, 'zeevruchten'),
(20, 7, 'ajuin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plaats_id` int(11) DEFAULT NULL,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `straat` varchar(52) COLLATE utf8_unicode_ci NOT NULL,
  `nr` int(11) NOT NULL,
  `telefoonnr` int(11) NOT NULL,
  `bus` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F538C5BC935FAC7E` (`plaats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `straat` varchar(52) COLLATE utf8_unicode_ci NOT NULL,
  `nr` int(11) NOT NULL,
  `telefoonnr` int(11) NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `specialprice` tinyint(1) DEFAULT NULL,
  `bus` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plaats_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_unique` (`email`),
  KEY `IDX_45A0D2FF935FAC7E` (`plaats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`id`, `naam`, `voornaam`, `straat`, `nr`, `telefoonnr`, `email`, `password`, `specialprice`, `bus`, `plaats_id`) VALUES
(1, 'Plaetevoet', 'Bart', 'Dekemelelaan', 29, 494231456, 'Bart.Plaetevoet@Telenet.be', '701f33b8d1366cde9cb3822256a62c01', NULL, NULL, 2),
(3, 'Plaetevoet', 'Jason', 'Dekemelelaan', 29, 494231456, 'Jason.Plaetevoet@Telenet.be', '701f33b8d1366cde9cb3822256a62c01', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plaats`
--

CREATE TABLE IF NOT EXISTS `plaats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(11) NOT NULL,
  `gemeente` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gemeente_unique` (`gemeente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `plaats`
--

INSERT INTO `plaats` (`id`, `postcode`, `gemeente`) VALUES
(1, 8900, 'Ieper'),
(2, 8904, 'Boezinge');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prijs_small` double NOT NULL,
  `promoprijs` double DEFAULT NULL,
  `prijs_large` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B3BA5A5AFC4DB938` (`naam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `naam`, `prijs_small`, `promoprijs`, `prijs_large`) VALUES
(2, 'Pepperoni', 8.9, NULL, 14.5),
(3, 'Meat Lover', 11.9, NULL, 17.9),
(4, 'Super Salami', 9.5, NULL, 14.5),
(5, 'Quattro Stagione', 8.9, NULL, 15.5),
(6, 'Rio Grande', 9.5, NULL, 17.5),
(7, 'Frutti di Mare', 9.5, NULL, 16.5);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelitems`
--
ALTER TABLE `bestelitems`
  ADD CONSTRAINT `FK_344183684584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_344183688D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `bestellingen` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `FK_35E67EBB3C427B2F` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`id`);

--
-- Beperkingen voor tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_4B60114F4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `FK_F538C5BC935FAC7E` FOREIGN KEY (`plaats_id`) REFERENCES `plaats` (`id`);

--
-- Beperkingen voor tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `FK_45A0D2FF935FAC7E` FOREIGN KEY (`plaats_id`) REFERENCES `plaats` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
