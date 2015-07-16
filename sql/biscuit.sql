-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jul 2015 um 10:18
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `biscuit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_benutzer`
--

CREATE TABLE IF NOT EXISTS `tbl_benutzer` (
  `benutzer_name` text,
  `benutzer_kennwort` text,
  `benutzer_mail` text,
  `benutzer_rechte` int(11) DEFAULT NULL,
`benutzer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_benutzer`
--

INSERT INTO `tbl_benutzer` (`benutzer_name`, `benutzer_kennwort`, `benutzer_mail`, `benutzer_rechte`, `benutzer_id`) VALUES
('test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geraete`
--

CREATE TABLE IF NOT EXISTS `tbl_geraete` (
`geraete_id` int(11) NOT NULL,
  `raum_fk` int(11) DEFAULT NULL,
  `lieferant_fk` int(11) DEFAULT NULL,
  `geraet_name` text,
  `geraet_ek_datum` date DEFAULT NULL,
  `geraet_notiz` text,
  `geraet_hersteller` text,
  `geraet_gewaehr_beginn` date DEFAULT NULL,
  `geraet_gewaehr_ende` date DEFAULT NULL,
  `geraete_seriennummer` text,
  `geraete_art_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_geraete`
--

INSERT INTO `tbl_geraete` (`geraete_id`, `raum_fk`, `lieferant_fk`, `geraet_name`, `geraet_ek_datum`, `geraet_notiz`, `geraet_hersteller`, `geraet_gewaehr_beginn`, `geraet_gewaehr_ende`, `geraete_seriennummer`, `geraete_art_fk`) VALUES
(10, 2, 7, 'Acer X113', '2015-07-02', '', 'Acer', '2015-07-02', '2017-07-02', '3465462357', 1),
(11, 4, 7, 'Acer X113', '2015-07-02', '', 'Acer', '2015-07-02', '2017-07-02', '567435547', 1),
(12, 5, 7, 'Acer X113', '2015-07-02', '', 'Acer', '2015-07-02', '2017-07-02', '546576432546', 1),
(13, 7, 7, 'Acer X113', '2015-07-02', '', 'Acer', '2015-07-02', '2017-07-02', '4364537658', 1),
(14, 8, 7, 'Acer X113', '2015-07-02', '', 'Acer', '2015-07-02', '2017-07-02', '65745634', 1),
(15, 9, 10, 'BenQ TW526E', '2014-04-07', '', 'BenQ', '2014-04-07', '2016-04-07', '678679', 1),
(16, 10, 10, 'BenQ TW526E', '2014-04-07', '', 'BenQ', '2014-04-07', '2016-04-07', '3453535', 1),
(17, 11, 10, 'BenQ TW526E', '2014-04-07', '', 'BenQ', '2014-04-07', '2016-04-07', '6873489', 1),
(18, 12, 10, 'BenQ TW526E', '2014-04-07', '', 'BenQ', '2014-04-07', '2016-04-07', '567654337', 1),
(19, 13, 10, 'BenQ TW526E', '2014-04-07', '', 'BenQ', '2014-04-07', '2016-04-07', '4325678', 1),
(20, 2, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '456765', 4),
(21, 4, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '436543567', 4),
(22, 5, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '3465643', 4),
(23, 7, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '23442389', 4),
(24, 12, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '2348989', 4),
(25, 8, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '68734267', 4),
(26, 9, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '976532', 4),
(27, 10, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '67867434', 4),
(28, 11, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '3454367', 4),
(29, 12, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '34587343', 4),
(30, 13, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '234356', 4),
(31, 1, 11, 'LG 29UM55-P 29&quot;', '2010-09-15', '', 'LG', '2010-09-15', '2012-09-15', '36575732', 4),
(32, 1, 7, 'Acer K242HLbd 24&quot;', '2013-08-12', '', 'Acer', '2013-08-12', '2015-08-12', '254367', 4),
(33, 2, 8, 'DELL Inspiron', '2008-08-12', '', 'DELL', '2008-08-12', '2010-08-12', '3454768', 3),
(34, 9, 7, 'DELL Inspiron', '2008-08-12', '', 'DELL', '2008-08-12', '2010-08-12', '454356', 3),
(35, 5, 8, 'DELL Inspiron', '2008-08-12', '', 'DELL', '2008-08-12', '2010-08-12', '3465487', 3),
(36, 7, 8, 'DELL Inspiron', '2008-08-12', '', 'DELL', '2008-08-12', '2010-08-12', '5463234', 3),
(37, 8, 8, 'DELL Inspiron', '2008-08-12', '', 'DELL', '2008-08-12', '2010-08-12', '234768', 3),
(38, 9, 10, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '235467', 3),
(39, 10, 7, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '', 3),
(40, 10, 10, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '23468723', 3),
(41, 11, 10, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '657876453', 3),
(42, 12, 10, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '2546345', 3),
(43, 13, 10, 'LENOVO IdeaCentre', '2015-07-16', '', 'Lenovo', '2015-07-16', '2017-07-16', '234562', 3),
(44, 1, 7, 'test', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geraete_art`
--

CREATE TABLE IF NOT EXISTS `tbl_geraete_art` (
`geraete_art_id` int(11) NOT NULL,
  `geraete_art_name` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_geraete_art`
--

INSERT INTO `tbl_geraete_art` (`geraete_art_id`, `geraete_art_name`) VALUES
(1, 'Beamer'),
(2, 'Projektor'),
(3, 'Rechner'),
(4, 'Monitore'),
(5, 'Drucker'),
(6, 'Handheld'),
(7, 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten` (
`komponenten_id` int(11) NOT NULL,
  `komponente_name` text,
  `komponente_bestand` int(11) DEFAULT NULL,
  `komponenten_art_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_komponenten`
--

INSERT INTO `tbl_komponenten` (`komponenten_id`, `komponente_name`, `komponente_bestand`, `komponenten_art_fk`) VALUES
(5, 'GTX 780Ti', 10, 7),
(6, 'i5 4690k', 2, 2),
(7, 'Radeon HD 6990', 6, 7),
(8, 'Geforce GTX Titan Z', 1, 7),
(9, 'Radeon HD 7950 Boost', 7, 7),
(10, 'Core i7 2600K', 2, 2),
(11, 'FX 9590', 2, 2),
(12, 'Pentium G3258', 6, 2),
(13, 'Core i7 860', 8, 2),
(14, 'X99-DELUXE', 2, 3),
(15, 'Samsung Basic MZ-7KE512BW 850 Pro', 3, 9),
(16, 'ASRock Z97 Pro4', 10, 3),
(17, 'MSI X99S SLI PLUS', 4, 3),
(18, 'GIGABYTE GA-970A-UD3P', 5, 3),
(19, 'Corsair DIMM 8 GB DDR3-1333 Kit', 5, 11),
(20, 'Patriot DIMM 4 GB DDR3-1333', 12, 11),
(21, 'G.Skill DIMM 8 GB DDR3-1333 Kit', 2, 11),
(22, 'Seagate ST1000DM003 1 TB', 40, 8),
(23, 'Western Digital WD10EZEX 1 TB', 20, 8),
(24, 'Samsung HN-M201RAD 2 TB', 11, 8),
(25, 'Kingston HyperX SHSS37A/240G 240 GB', 13, 9),
(26, 'Crucial CT250MX200SSD1 250 GB', 16, 9),
(27, 'be quiet! Pure Power CM L8 530W', 10, 1),
(28, 'Corsair RM850 850W', 12, 1),
(29, 'test', 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten_arten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten_arten` (
`komponenten_art_id` int(11) NOT NULL,
  `komponenten_art_name` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_komponenten_arten`
--

INSERT INTO `tbl_komponenten_arten` (`komponenten_art_id`, `komponenten_art_name`) VALUES
(1, 'Netzteil'),
(2, 'Prozessor'),
(3, 'Mainboard'),
(7, 'Grafikkarte'),
(8, 'Festplatte (HDD)'),
(9, 'Festplatte (SSD)'),
(10, 'Laufwerk (DVD)'),
(11, 'Ram'),
(12, 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten_attribute` (
`komponenten_attribut_id` int(11) NOT NULL,
  `komponenten_attribut_name` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_komponenten_attribute`
--

INSERT INTO `tbl_komponenten_attribute` (`komponenten_attribut_id`, `komponenten_attribut_name`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_lieferanten`
--

CREATE TABLE IF NOT EXISTS `tbl_lieferanten` (
`lieferant_id` int(11) NOT NULL,
  `lieferant_firmenname` text,
  `lieferant_vorname` text,
  `lieferant_nachname` text,
  `lieferant_plz` int(11) DEFAULT NULL,
  `lieferant_ort` text,
  `lieferant_strasse` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_lieferanten`
--

INSERT INTO `tbl_lieferanten` (`lieferant_id`, `lieferant_firmenname`, `lieferant_vorname`, `lieferant_nachname`, `lieferant_plz`, `lieferant_ort`, `lieferant_strasse`) VALUES
(7, 'ALTERNATE GmbH', 'Carsten', 'Kellmann', 35440, 'Linden', 'Philipp-Reis-Str. 2-3'),
(8, 'CSL-Computer GmbH &amp; Co. KG', '', '', 30165, 'Hannover', 'SokelantstraÃŸe 35'),
(9, 'MIFcom GmbH', 'Dimitri', 'Mistetski', 81673, 'MÃ¼nchen', 'Neumarkter StraÃŸe 34'),
(10, 'Cyberport GmbH', '', '', 1099, 'Dresden', 'Am Brauhaus 5'),
(11, 'ATELCO Computer AG', 'Ralf', 'Schwalbe', 59519, 'MÃ¶hnesee', 'Dieselweg 6'),
(12, 'test', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_raeume`
--

CREATE TABLE IF NOT EXISTS `tbl_raeume` (
`raum_id` int(11) NOT NULL,
  `raum_notiz` text,
  `raum_name` text,
  `raum_stockwerk` text
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_raeume`
--

INSERT INTO `tbl_raeume` (`raum_id`, `raum_notiz`, `raum_name`, `raum_stockwerk`) VALUES
(1, '', 'Lager', '0'),
(2, '', '001', '1'),
(4, '', '002', '1'),
(5, '', '003', '1'),
(7, '', '004', '1'),
(8, '', '005', '1'),
(9, '', '101', '2'),
(10, '', '102', '2'),
(11, '', '103', '2'),
(12, '', '104', '2'),
(13, '', '105', '2'),
(14, '', 'test', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_z_enthaelt`
--

CREATE TABLE IF NOT EXISTS `tbl_z_enthaelt` (
  `geraet_fk` int(11) DEFAULT NULL,
  `komponente_fk` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_z_komponente_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_z_komponente_attribute` (
  `komponenten_fk` int(11) DEFAULT NULL,
  `komponenten_attribut_fk` int(11) DEFAULT NULL,
  `komponenten_attribut_wert` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_z_komponente_attribute`
--

INSERT INTO `tbl_z_komponente_attribute` (`komponenten_fk`, `komponenten_attribut_fk`, `komponenten_attribut_wert`) VALUES
(10, 1, NULL),
(8, 1, 'sbgdg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
 ADD PRIMARY KEY (`benutzer_id`);

--
-- Indizes für die Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
 ADD PRIMARY KEY (`geraete_id`), ADD KEY `foreignkey_tbl_geraete_lieferant_fk` (`lieferant_fk`), ADD KEY `foreignkey_tbl_geraete_raum_fk` (`raum_fk`), ADD KEY `geraete_art_fk` (`geraete_art_fk`);

--
-- Indizes für die Tabelle `tbl_geraete_art`
--
ALTER TABLE `tbl_geraete_art`
 ADD PRIMARY KEY (`geraete_art_id`);

--
-- Indizes für die Tabelle `tbl_komponenten`
--
ALTER TABLE `tbl_komponenten`
 ADD PRIMARY KEY (`komponenten_id`), ADD KEY `foreignkey_tbl_komponenten` (`komponenten_art_fk`);

--
-- Indizes für die Tabelle `tbl_komponenten_arten`
--
ALTER TABLE `tbl_komponenten_arten`
 ADD PRIMARY KEY (`komponenten_art_id`);

--
-- Indizes für die Tabelle `tbl_komponenten_attribute`
--
ALTER TABLE `tbl_komponenten_attribute`
 ADD PRIMARY KEY (`komponenten_attribut_id`);

--
-- Indizes für die Tabelle `tbl_lieferanten`
--
ALTER TABLE `tbl_lieferanten`
 ADD PRIMARY KEY (`lieferant_id`);

--
-- Indizes für die Tabelle `tbl_raeume`
--
ALTER TABLE `tbl_raeume`
 ADD PRIMARY KEY (`raum_id`);

--
-- Indizes für die Tabelle `tbl_z_enthaelt`
--
ALTER TABLE `tbl_z_enthaelt`
 ADD KEY `foreignkey_tbl_z_enthaelt_geraet_fk` (`geraet_fk`), ADD KEY `foreignkey_tbl_z_enthaelt_komponente_fk` (`komponente_fk`);

--
-- Indizes für die Tabelle `tbl_z_komponente_attribute`
--
ALTER TABLE `tbl_z_komponente_attribute`
 ADD KEY `foreignkey_tbl_z_komponente_attribute_komponenten_fk` (`komponenten_fk`), ADD KEY `foreignkey_tbl_z_komponente_attribute_komponenten_attribut_fk` (`komponenten_attribut_fk`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
MODIFY `benutzer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
MODIFY `geraete_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT für Tabelle `tbl_geraete_art`
--
ALTER TABLE `tbl_geraete_art`
MODIFY `geraete_art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten`
--
ALTER TABLE `tbl_komponenten`
MODIFY `komponenten_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_arten`
--
ALTER TABLE `tbl_komponenten_arten`
MODIFY `komponenten_art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_attribute`
--
ALTER TABLE `tbl_komponenten_attribute`
MODIFY `komponenten_attribut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_lieferanten`
--
ALTER TABLE `tbl_lieferanten`
MODIFY `lieferant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `tbl_raeume`
--
ALTER TABLE `tbl_raeume`
MODIFY `raum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
ADD CONSTRAINT `geraete_art_fk` FOREIGN KEY (`geraete_art_fk`) REFERENCES `tbl_geraete_art` (`geraete_art_id`),
ADD CONSTRAINT `tbl_geraete_ibfk_1` FOREIGN KEY (`lieferant_fk`) REFERENCES `tbl_lieferanten` (`lieferant_id`),
ADD CONSTRAINT `tbl_geraete_ibfk_2` FOREIGN KEY (`raum_fk`) REFERENCES `tbl_raeume` (`raum_id`);

--
-- Constraints der Tabelle `tbl_komponenten`
--
ALTER TABLE `tbl_komponenten`
ADD CONSTRAINT `tbl_komponenten_ibfk_1` FOREIGN KEY (`komponenten_art_fk`) REFERENCES `tbl_komponenten_arten` (`komponenten_art_id`);

--
-- Constraints der Tabelle `tbl_z_enthaelt`
--
ALTER TABLE `tbl_z_enthaelt`
ADD CONSTRAINT `tbl_z_enthaelt_ibfk_1` FOREIGN KEY (`geraet_fk`) REFERENCES `tbl_geraete` (`geraete_id`),
ADD CONSTRAINT `tbl_z_enthaelt_ibfk_2` FOREIGN KEY (`komponente_fk`) REFERENCES `tbl_komponenten` (`komponenten_id`);

--
-- Constraints der Tabelle `tbl_z_komponente_attribute`
--
ALTER TABLE `tbl_z_komponente_attribute`
ADD CONSTRAINT `tbl_z_komponente_attribute_ibfk_1` FOREIGN KEY (`komponenten_fk`) REFERENCES `tbl_komponenten` (`komponenten_id`),
ADD CONSTRAINT `tbl_z_komponente_attribute_ibfk_2` FOREIGN KEY (`komponenten_attribut_fk`) REFERENCES `tbl_komponenten_attribute` (`komponenten_attribut_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
