-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 16 apr 2019 om 13:25
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `oefendb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `nummer` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tussenvoegsel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `wachtwoord` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `straat` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `huisnummer` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `postcode` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plaats` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `telefoon` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`nummer`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`nummer`, `username`, `voornaam`, `tussenvoegsel`, `achternaam`, `wachtwoord`, `straat`, `huisnummer`, `postcode`, `plaats`, `telefoon`, `type`) VALUES
(1, 'dsf', 'f', '', 'dirks', '098f6bcd4621d373cade4e832627b4f6', 'julianalaan', '47', '8181 ld', 'heerde', '0578-12345', 'B'),
(3, 'king', 'Koning', '', 'Klant', '098f6bcd4621d373cade4e832627b4f6', 'kassastraat', '14', '1000 FL', 'Hilversum', '034', 'us'),
(7, 'admin', 'Admin', 'de', 'Admin', '098f6bcd4621d373cade4e832627b4f6', 'ergens', '0', '0000 NN', 'OmDeHoek', '000', 'B'),
(2, 'test', 'test', '', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test ', '1', '1000 TS', 'Test', '1234567890', 'us');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
