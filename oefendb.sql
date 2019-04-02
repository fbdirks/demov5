-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 28 mrt 2019 om 14:37
-- Serverversie: 5.6.29
-- PHP-versie: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oefendb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bbc`
--

CREATE TABLE IF NOT EXISTS `bbc` (
  `name` varchar(50) NOT NULL,
  `region` varchar(60) DEFAULT NULL,
  `area` decimal(10,0) DEFAULT NULL,
  `population` decimal(11,0) DEFAULT NULL,
  `gdp` decimal(14,0) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bbc`
--

INSERT INTO `bbc` (`name`, `region`, `area`, `population`, `gdp`) VALUES
('Afghanistan', 'South Asia', '652225', '26000000', NULL),
('Albania', 'Europe', '28728', '3200000', '6656000000'),
('Algeria', 'Middle East', '2400000', '32900000', '75012000000'),
('Andorra', 'Europe', '468', '64000', NULL),
('Angola', 'Africa', '1250000', '14500000', '14935000000'),
('Antigua and Barbuda', 'Americas', '442', '77000', '770000000'),
('Argentina', 'South America', '2800000', '39300000', '146196000000'),
('Armenia', 'Europe', '29743', '3000000', '3360000000'),
('Australia', 'Asia-Pacific', '7700000', '20300000', '546070000000'),
('Austria', 'Europe', '83871', '8100000', '261630000000'),
('Azerbaijan', 'Europe', '86600', '8500000', NULL),
('Bahamas', 'Americas', '13939', '321000', '4789320000'),
('Bahrain', 'Middle East', '717', '754000', '9357140000'),
('Bangladesh', 'South Asia', '143998', '152600000', '67144000000'),
('Barbados', 'Americas', '430', '272000', '2518720000'),
('Belarus', 'Europe', '207595', '9800000', '20776000000'),
('Belgium', 'Europe', '30528', '10300000', '319609000000'),
('Belize', 'Americas', '22965', '266000', NULL),
('Benin', 'Africa', '112622', '7100000', '3763000000'),
('Bhutan', 'South Asia', '38364', '2400000', '1824000000'),
('Bolivia', 'South America', '1100000', '9100000', NULL),
('Bosnia-Hercegovina', 'Europe', '51129', '4200000', '8568000000'),
('Botswana', 'Africa', '581730', '1800000', '7812000000'),
('Brazil', 'South America', '8550000', '182800000', '564852000000'),
('Brunei', 'Asia-Pacific', '5765', '374000', NULL),
('Bulgaria', 'Europe', '110994', '7800000', '21372000000'),
('Burkina Faso', 'Africa', '274200', '13800000', '4968000000'),
('Burma', 'Asia-Pacific', '676552', '50700000', NULL),
('Burundi', 'Africa', '27816', '7300000', NULL),
('Cambodia', 'Asia-Pacific', '181035', '14800000', '4736000000'),
('Cameroon', 'Africa', '465458', '16600000', '13280000000'),
('Canada', 'North America', '9900000', '32000000', '908480000000'),
('Cape Verde', 'Africa', '4033', '482000', '853140000'),
('Central African Republic', 'Africa', '622984', '3900000', NULL),
('Chad', 'Africa', '1280000', '9100000', '2366000000'),
('Chile', 'South America', '756096', '16200000', '79542000000'),
('China', 'Asia-Pacific', '9600000', '1300000000', '1677000000000'),
('Colombia', 'South America', '1140000', '45600000', NULL),
('Comoros', 'Africa', '1862', '812000', NULL),
('Costa Rica', 'Americas', '51100', '4300000', NULL),
('Croatia', 'Europe', '56594', '4400000', '28996000000'),
('Cuba', 'Americas', '110860', '11300000', NULL),
('Cyprus', 'Europe', '9250', '807000', '14187060000'),
('Czech Republic', 'Europe', '78866', '10200000', '93330000000'),
('Democratic Republic of Congo', 'Africa', '2340000', '56000000', '6720000000'),
('Denmark', 'Europe', '43098', '5400000', '219510000000'),
('Djibouti', 'Africa', '23200', '721000', NULL),
('Dominica', 'Americas', '751', '71000', '259150000'),
('Dominican Republic', 'Americas', '48072', '9000000', NULL),
('East Timor', 'Asia-Pacific', '14609', '857000', NULL),
('Ecuador', 'South America', '272045', '13400000', NULL),
('Egypt', 'Middle East', '1000000', '74900000', '98119000000'),
('El Salvador', 'Americas', '21041', '6700000', '15745000000'),
('Equatorial Guinea', 'Africa', '28051', '521000', '484530000'),
('Eritrea', 'Africa', '117400', '4561599', NULL),
('Estonia', 'Europe', '45227', '1300000', '9113000000'),
('Ethiopia', 'Africa', '1130000', '74200000', '8162000000'),
('Fiji', 'Asia-Pacific', '18376', '854000', NULL),
('Finland', 'Europe', '338145', '5200000', '170508000000'),
('Former Yugoslav Republic of Macedonia', 'Europe', '25713', '2000000', '4700000000'),
('France', 'Europe', '543965', '60700000', '1826463000000'),
('Gabon', 'Africa', '267667', '1400000', NULL),
('Georgia', 'Europe', '69700', '5000000', '5200000000'),
('Germany', 'Europe', '357027', '82500000', '2484900000000'),
('Ghana', 'Africa', '238533', '21800000', '8284000000'),
('Greece', 'Europe', '131957', '11000000', '182710000000'),
('Grenada', 'Americas', '344', '103000', NULL),
('Guatemala', 'Americas', '108890', '13000000', NULL),
('Guinea', 'Africa', '245857', '8800000', '4048000000'),
('Guinea-Bissau', 'Africa', '36125', '1600000', '256000000'),
('Guyana', 'South America', '214969', '768000', NULL),
('Haiti', 'Americas', '27750', '8500000', NULL),
('Honduras', 'Americas', '112492', '7200000', '7416000000'),
('Hungary', 'Europe', '93030', '9800000', '81046000000'),
('Iceland', 'Europe', '103000', '294000', '11354280000'),
('India', 'South Asia', '3100000', '1100000000', '682000000000'),
('Indonesia', 'Asia-Pacific', '1900000', '225300000', '256842000000'),
('Iran', 'Middle East', '1650000', '70700000', '162610000000'),
('Iraq', 'Middle East', '438317', '26500000', NULL),
('Ireland', 'Europe', '70182', '4000000', '137120000000'),
('Israel and Palestinian territories', 'Middle East', '20770', '3800000', '4256000000'),
('Italy', 'Europe', '301338', '57200000', '1494064000000'),
('Ivory Coast', 'Africa', '322462', '17100000', '13167000000'),
('Jamaica', 'Americas', '10991', '2700000', '7830000000'),
('Japan', 'Asia-Pacific', '377864', '127900000', '4755322000000'),
('Jordan', 'Middle East', '89342', '5700000', '12198000000'),
('Kazakhstan', 'Asia-Pacific', '2700000', '15400000', NULL),
('Kenya', 'Africa', '582646', '32800000', '15088000000'),
('Kiribati', 'Asia-Pacific', '810', '85000', '82450000'),
('Kuwait', 'Middle East', '17818', '2700000', '48519000000'),
('Kyrgyzstan', 'Asia-Pacific', '199900', '5300000', NULL),
('Laos', 'Asia-Pacific', '236800', '5900000', '2301000000'),
('Latvia', 'Europe', '64589', '2300000', NULL),
('Lebanon', 'Middle East', '10452', '3800000', '18924000000'),
('Lesotho', 'Africa', '30355', '1800000', '1332000000'),
('Liberia', 'Africa', '99067', '3600000', '396000000'),
('Libya', 'Africa', '1770000', '5800000', '25810000000'),
('Liechtenstein', 'Europe', '160', '34000', NULL),
('Lithuania', 'Europe', '65300', '3400000', '19516000000'),
('Luxembourg', 'Europe', '2586', '465000', '26146950000'),
('Madagascar', 'Africa', '587041', '18400000', '5520000000'),
('Malawi', 'Africa', '118484', '12600000', '2142000000'),
('Malaysia', 'Asia-Pacific', '329847', '25300000', NULL),
('Mali', 'Africa', '1250000', '13800000', '4968000000'),
('Malta', 'Europe', '316', '397000', '4863250000'),
('Marshall Islands', 'Asia-Pacific', '181', '57000', '135090000'),
('Mauritania', 'Middle East', '1040000', '3100000', '1302000000'),
('Mauritius', 'Africa', '2040', '1200000', '5568000000'),
('Mexico', 'North America', '1960000', '106400000', '720328000000'),
('Micronesia', 'Asia-Pacific', '700', '111000', NULL),
('Moldova', 'Europe', '33800', '4300000', '3053000000'),
('Monaco', 'Europe', '2', '32000', NULL),
('Mongolia', 'Asia-Pacific', '1560000', '2700000', NULL),
('Morocco', 'Middle East', '710850', '31600000', '48032000000'),
('Mozambique', 'Africa', '812379', '19500000', '4875000000'),
('Namibia', 'Africa', '824292', '2000000', '4740000000'),
('Nauru', 'Asia-Pacific', '21', '9900', NULL),
('Nepal', 'South Asia', '147181', '26300000', '6838000000'),
('New Zealand', 'Asia-Pacific', '270534', '4000000', '81240000000'),
('Nicaragua', 'Americas', '120254', '5700000', '4503000000'),
('Niger', 'Africa', '1270000', '12900000', '2967000000'),
('Nigeria', 'Africa', '923768', '130200000', '50778000000'),
('North Korea', 'Asia-Pacific', '122762', '22900000', NULL),
('Norway', 'Europe', '323759', '4600000', '239338000000'),
('Oman', 'Middle East', '309500', '3000000', '23670000000'),
('Pakistan', 'South Asia', '796095', '161100000', '96660000000'),
('Palau', 'Asia-Pacific', '508', '20000', NULL),
('Panama', 'Americas', '75517', '3200000', NULL),
('Papua New Guinea', 'Asia-Pacific', '462840', '5900000', '3422000000'),
('Paraguay', 'South America', '406752', '6200000', NULL),
('Peru', 'South America', '1280000', '28000000', NULL),
('Poland', 'Europe', '312685', '38500000', '234465000000'),
('Portugal', 'Europe', '92345', '10500000', '150675000000'),
('Qatar', 'Middle East', '11437', '628000', NULL),
('Republic of Congo', 'Africa', '342000', '3039126', NULL),
('Romania', 'Europe', '238391', '22200000', '64824000000'),
('Russia', 'Europe', '17000000', '141500000', '482515000000'),
('Rwanda', 'Africa', '26338', '8600000', '1892000000'),
('Samoa', 'Asia-Pacific', '2831', '182000', NULL),
('San Marino', 'Europe', '61', '27000', NULL),
('Sao Tome and Principe', 'Africa', '1001', '169000', '62530000'),
('Saudi Arabia', 'Middle East', '2240000', '25600000', '267008000000'),
('Senegal', 'Africa', '196722', '10600000', '7102000000'),
('Serbia and Montenegro', 'Europe', '102173', '10500000', '27510000000'),
('Seychelles', 'Africa', '455', '76000', NULL),
('Sierra Leone', 'Africa', '71740', '5300000', '1060000000'),
('Singapore', 'Asia-Pacific', '660', '4400000', '106568000000'),
('Slovakia', 'Europe', '49033', '5400000', '34992000000'),
('Slovenia', 'Europe', '20273', '2000000', '29620000000'),
('Solomon Islands', 'Asia-Pacific', '27556', '504000', '277200000'),
('Somalia', 'Africa', '637657', '10700000', NULL),
('South Africa', 'Africa', '1220000', '45300000', '164439000000'),
('South Korea', 'Asia-Pacific', '99313', '48200000', '673836000000'),
('Spain', 'Europe', '505988', '44100000', '935361000000'),
('Sri Lanka', 'South Asia', '65610', '19400000', '19594000000'),
('St Kitts and Nevis', 'Americas', '269', '46000', NULL),
('St Lucia', 'Americas', '616', '152000', '655120000'),
('St Vincent and the Grenadines', 'Americas', '389', '121000', '441650000'),
('Sudan', 'Middle East', '2500000', '35000000', '18550000000'),
('Surinam', 'South America', '163265', '442000', NULL),
('Swaziland', 'Africa', '17364', '1100000', '1826000000'),
('Sweden', 'Europe', '449964', '8900000', '318353000000'),
('Switzerland', 'Europe', '41284', '7100000', '342433000000'),
('Syria', 'Middle East', '185180', '18600000', '22134000000'),
('Taiwan', 'Asia-Pacific', '36188', '22700000', '302364000000'),
('Tajikistan', 'Asia-Pacific', '143100', '6300000', NULL),
('Tanzania', 'Africa', '945087', '38400000', NULL),
('Thailand', 'Asia-Pacific', '513115', '64100000', '162814000000'),
('The Gambia', 'Africa', '11295', '1500000', NULL),
('The Maldives', 'South Asia', '298', '338000', '848380000'),
('The Netherlands', 'Europe', '41864', '16300000', '516710000000'),
('The Philippines', 'Asia-Pacific', '300000', '82800000', '96876000000'),
('Togo', 'Africa', '56785', '5100000', '1938000000'),
('Tonga', 'Asia-Pacific', '748', '106000', NULL),
('Trinidad and Tobago', 'Americas', '5128', '1300000', NULL),
('Tunisia', 'Middle East', '164150', '10000000', '26300000000'),
('Turkey', 'Europe', '779452', '73300000', '274875000000'),
('Turkmenistan', 'Asia-Pacific', '488100', '5000000', NULL),
('Tuvalu', 'Asia-Pacific', '26', '10000', NULL),
('Uganda', 'Africa', '241038', '27600000', '7452000000'),
('Ukraine', 'Europe', '603700', '47800000', '60228000000'),
('United Arab Emirates', 'Middle East', '77700', '3100000', NULL),
('United Kingdom', 'Europe', '242514', '59600000', '2022824000000'),
('United States of America', 'North America', '9800000', '295000000', '12213000000000'),
('Uruguay', 'South America', '176215', '3500000', NULL),
('Uzbekistan', 'Asia-Pacific', '447400', '26900000', NULL),
('Vanuatu', 'Asia-Pacific', '12190', '222000', '297480000'),
('Vatican', 'Europe', '0', NULL, NULL),
('Venezuela', 'South America', '881050', '26600000', NULL),
('Vietnam', 'Asia-Pacific', '329247', '83600000', '45980000000'),
('Yemen', 'Middle East', '536869', '21500000', '12255000000'),
('Zambia', 'Africa', '752614', '11000000', '4950000000'),
('Zimbabwe', 'Africa', '390759', '12900000', '6192000000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Docent_vriendern`
--

CREATE TABLE IF NOT EXISTS `Docent_vriendern` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(100) NOT NULL,
  `Achternaam` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `Docent_vriendern`
--

INSERT INTO `Docent_vriendern` (`Id`, `Voornaam`, `Achternaam`, `Telefoon`) VALUES
(1, 'Sint', 'Nicolaas', '5122016'),
(3, 'Zwarte', 'Piet', '02152016');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `nummer` int(11) NOT NULL DEFAULT '0',
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `achternaam` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `wachtwoord` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `straat` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `huisnummer` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `postcode` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plaats` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `telefoon` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  PRIMARY KEY (`voornaam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`nummer`, `username`, `voornaam`, `achternaam`, `wachtwoord`, `straat`, `huisnummer`, `postcode`, `plaats`, `telefoon`, `type`, `id`) VALUES
(1, '', 'dsf', 'dirks', '098f6bcd4621d373cade4e832627b4f6', 'beatrixweg', '47', '8181 ld', 'heerde', '0578-12345', 'B', 1),
(4, '', 'root', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'beheerplein', '1', '1000 AA', 'OnzeStad', '0123456789', 'B', 0),
(5, '', 'Wilmer', 'van den Berg', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 'us', 0),
(6, '', 'Mike', 'Mijnheer', '701f33b8d1366cde9cb3822256a62c01', 'Pr. Bernhardlaan', '18', '7711JS', 'Nieuwleusen', '0529485426', 'us', 0),
(3, '', 'Koning', 'Klant', '098f6bcd4621d373cade4e832627b4f6', 'kassastraat', '14', '1000 FL', 'Hilversum', '034', 'us', 0),
(2, '', 'Sint', 'Nicolaas', '098f6bcd4621d373cade4e832627b4f6', 'Kadokade', '5', '1205 SK', 'Madrid', '012345', 'us', 0),
(7, 'admin', 'Admin', 'Admin', '098f6bcd4621d373cade4e832627b4f6', '', '', '', '', '', 'us', 7),
(8, '', '1', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'asdf', 'asdf', 'adsf', 'adsf', 'adsf', 'us', 0),
(9, '', 'feike', 'dirks', '098f6bcd4621d373cade4e832627b4f6', 'beatrixweg', '47', '8181 LD', 'heerde', 'ergens', 'us', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instellingen`
--

CREATE TABLE IF NOT EXISTS `instellingen` (
  `instelling` varchar(255) NOT NULL,
  `waarde` tinyint(1) NOT NULL,
  PRIMARY KEY (`instelling`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `instellingen`
--

INSERT INTO `instellingen` (`instelling`, `waarde`) VALUES
('debug', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemnr` int(11) NOT NULL DEFAULT '0',
  `lijstnummer` int(11) NOT NULL DEFAULT '0',
  `kolom1` varchar(80) NOT NULL DEFAULT '',
  `kolom2` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemnr`,`lijstnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`itemnr`, `lijstnummer`, `kolom1`, `kolom2`) VALUES
(15, 1, '1234134', '14314'),
(2, 3, 'Wim', 'Jannie'),
(1, 3, 'Harry', 'Henk'),
(1, 9, 'Inlogsysteem', 'Ewout'),
(14, 1, 'vrijdag', 'erik'),
(13, 1, 'vrijdag', 'bert'),
(12, 1, 'vrijdag', 'harry'),
(11, 1, 'vrijdag', 'henk'),
(10, 1, 'donderdag', 'jantina'),
(9, 1, 'donderdag', 'kees'),
(8, 1, 'donderdag', 'wim'),
(3, 7, 'fiscus', 'Gerrit Zalm'),
(2, 7, 'ab-actis', 'Jannie Ooms'),
(1, 7, 'prases', 'Wim Wammes'),
(2, 8, 'Willem Wammes', ''),
(1, 8, 'Kees Kapoen', 'aanvoerder'),
(4, 7, 'assessor', 'Heleen Mateman'),
(5, 7, 'vice-praeses', 'Karin van Dijk'),
(3, 8, 'Arjen Pool', 'scheids'),
(4, 8, 'Henk Helman', ''),
(5, 8, 'Casimir ten Hove', ''),
(6, 8, 'Jasper Zomer', ''),
(7, 8, 'Engelbert La Haye', ''),
(8, 8, 'Martin Monster', ''),
(9, 8, 'Bedo Millthorpe', ''),
(3, 3, 'Hetty', 'Wilma'),
(4, 3, 'Wim', 'Henk'),
(1, 4, 'Maandag 1', 'HJA'),
(2, 4, 'Maandag 2', 'LLK'),
(3, 4, 'Dinsdag 1', 'KKL'),
(4, 4, 'Dinsdag 2', 'OPO'),
(5, 4, 'Woensdag 1', 'PPO'),
(6, 4, 'Woensdag 2', 'QER'),
(7, 4, 'Donderdag 1', 'ASS'),
(8, 4, 'Donderdag 2', 'IKL'),
(9, 4, 'Vrijdag 1', 'MNH'),
(10, 4, 'Vrijdag 2', 'MMN'),
(7, 1, 'donderdag', 'elbert'),
(6, 1, 'woensdag', 'johan'),
(5, 1, 'woensdag', 'egbert'),
(4, 1, 'dinsdag', 'maarten'),
(3, 1, 'dinsdag', 'francien'),
(2, 1, 'maandag', 'piet'),
(1, 1, 'maandag', 'jan'),
(2, 9, 'Database', 'ewout');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items2`
--

CREATE TABLE IF NOT EXISTS `items2` (
  `itemnr` int(11) NOT NULL AUTO_INCREMENT,
  `lijstnummer` int(11) NOT NULL DEFAULT '0',
  `kolom1` varchar(80) NOT NULL DEFAULT '',
  `kolom2` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemnr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Gegevens worden geëxporteerd voor tabel `items2`
--

INSERT INTO `items2` (`itemnr`, `lijstnummer`, `kolom1`, `kolom2`) VALUES
(80, 1, 'Henka', 'Kees'),
(79, 1, 'Henk', 'Kees'),
(78, 1, 'Henk', 'Kees'),
(77, 1, 'Henk', 'Kees'),
(8, 3, 's', 's'),
(9, 3, 'a', 'd'),
(10, 3, 'd', 'dd'),
(11, 3, 'd', 's'),
(76, 1, 'hrnk', 'kees'),
(75, 1, 'hrnk', 'kees'),
(74, 1, 'hrnk zxx', 'kees');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lijsten`
--

CREATE TABLE IF NOT EXISTS `lijsten` (
  `lijstnummer` int(11) NOT NULL AUTO_INCREMENT,
  `lijstnaam` varchar(80) NOT NULL DEFAULT '',
  `omschrijving` varchar(255) DEFAULT NULL,
  `kolomlinks` varchar(80) NOT NULL DEFAULT '',
  `kolomrechts` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`lijstnummer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `lijsten`
--

INSERT INTO `lijsten` (`lijstnummer`, `lijstnaam`, `omschrijving`, `kolomlinks`, `kolomrechts`) VALUES
(1, 'schoonmaken', 'lijst schoonmakers', 'avond', 'naam'),
(3, 'keetavond dinsdag', 'de dinsdagavond ploeg', 'verantwoordelijke', 'secundant'),
(4, 'Surveillance', 'Surveillance rooster', 'Dagdeel', 'Surveillant'),
(7, 'Bestuur 2012', 'Bestuursleden bestuur 2012', 'functie', 'naam'),
(8, 'PVT team 2012', 'Spelers (en indien van toepassing functies) PVT team 2012', 'naam', 'functie'),
(9, 'Project', 'PO ofzo', 'Taken', 'Wie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tabellen`
--

CREATE TABLE IF NOT EXISTS `tabellen` (
  `instelling` varchar(255) NOT NULL,
  `waarde` tinyint(1) NOT NULL,
  PRIMARY KEY (`instelling`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
