-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jul 2015 um 13:46
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_geraete`
--

INSERT INTO `tbl_geraete` (`geraete_id`, `raum_fk`, `lieferant_fk`, `geraet_name`, `geraet_ek_datum`, `geraet_notiz`, `geraet_hersteller`, `geraet_gewaehr_beginn`, `geraet_gewaehr_ende`, `geraete_seriennummer`, `geraete_art_fk`) VALUES
(1, 1, 2, 'portal gun', '2015-07-13', 'in use', 'aperture labs', '2015-07-13', '2015-07-13', '0042', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geraete_art`
--

CREATE TABLE IF NOT EXISTS `tbl_geraete_art` (
`geraete_art_id` int(11) NOT NULL,
  `geraete_art_name` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_geraete_art`
--

INSERT INTO `tbl_geraete_art` (`geraete_art_id`, `geraete_art_name`) VALUES
(1, 'Beamer'),
(2, 'Projektor'),
(3, 'Rechner'),
(4, 'Monitore'),
(5, 'Drucker'),
(6, 'handheld');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten` (
`komponenten_id` int(11) NOT NULL,
  `komponente_name` text,
  `komponente_bestand` int(11) DEFAULT NULL,
  `komponenten_art_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_komponenten`
--

INSERT INTO `tbl_komponenten` (`komponenten_id`, `komponente_name`, `komponente_bestand`, `komponenten_art_fk`) VALUES
(1, 'miniature black hole', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten_arten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten_arten` (
`komponenten_art_id` int(11) NOT NULL,
  `komponenten_art_name` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_komponenten_arten`
--

INSERT INTO `tbl_komponenten_arten` (`komponenten_art_id`, `komponenten_art_name`) VALUES
(1, 'energy source');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten_attribute` (
`komponenten_attribut_id` int(11) NOT NULL,
  `komponenten_attribut_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_lieferanten`
--

INSERT INTO `tbl_lieferanten` (`lieferant_id`, `lieferant_firmenname`, `lieferant_vorname`, `lieferant_nachname`, `lieferant_plz`, `lieferant_ort`, `lieferant_strasse`) VALUES
(2, 'Aperture Laboratories', 'Cave', 'Johnson', 90556, 'michigan', 'salt mine 6');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_raeume`
--

CREATE TABLE IF NOT EXISTS `tbl_raeume` (
`raum_id` int(11) NOT NULL,
  `raum_notiz` text,
  `raum_name` text,
  `raum_stockwerk` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_raeume`
--

INSERT INTO `tbl_raeume` (`raum_id`, `raum_notiz`, `raum_name`, `raum_stockwerk`) VALUES
(1, '9 PCs', '104', NULL),
(2, 'sjghsd', 'test', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_zulaessige_werte`
--

CREATE TABLE IF NOT EXISTS `tbl_zulaessige_werte` (
`zulaessiger_wert_id` int(11) NOT NULL,
  `zulaessiger_wert_name` text,
  `zulaessiger_wert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_z_attribut_art`
--

CREATE TABLE IF NOT EXISTS `tbl_z_attribut_art` (
  `komponenten_art_fk` int(11) DEFAULT NULL,
  `komponenten_attribut_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_z_attribut_zulaessig`
--

CREATE TABLE IF NOT EXISTS `tbl_z_attribut_zulaessig` (
  `komponenten_attribut_fk` int(11) DEFAULT NULL,
  `zulaessiger_wert_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `komponenten_menge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indizes für die Tabelle `tbl_zulaessige_werte`
--
ALTER TABLE `tbl_zulaessige_werte`
 ADD PRIMARY KEY (`zulaessiger_wert_id`);

--
-- Indizes für die Tabelle `tbl_z_attribut_art`
--
ALTER TABLE `tbl_z_attribut_art`
 ADD KEY `foreignkey_tbl_z_attribut_art_komponenten_art_fk` (`komponenten_attribut_fk`), ADD KEY `foreignkey_tbl_z_attribut_art_komponenten_fk` (`komponenten_art_fk`);

--
-- Indizes für die Tabelle `tbl_z_attribut_zulaessig`
--
ALTER TABLE `tbl_z_attribut_zulaessig`
 ADD KEY `foreignkey_tbl_z_attribut_zulaessig_komponenten_attribut_fk` (`komponenten_attribut_fk`), ADD KEY `foreignkey_tbl_z_attribut_zulaessig__zulaessiger_wert_fk` (`zulaessiger_wert_fk`);

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
MODIFY `benutzer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
MODIFY `geraete_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_geraete_art`
--
ALTER TABLE `tbl_geraete_art`
MODIFY `geraete_art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten`
--
ALTER TABLE `tbl_komponenten`
MODIFY `komponenten_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_arten`
--
ALTER TABLE `tbl_komponenten_arten`
MODIFY `komponenten_art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_attribute`
--
ALTER TABLE `tbl_komponenten_attribute`
MODIFY `komponenten_attribut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_lieferanten`
--
ALTER TABLE `tbl_lieferanten`
MODIFY `lieferant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `tbl_raeume`
--
ALTER TABLE `tbl_raeume`
MODIFY `raum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `tbl_zulaessige_werte`
--
ALTER TABLE `tbl_zulaessige_werte`
MODIFY `zulaessiger_wert_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints der Tabelle `tbl_z_attribut_art`
--
ALTER TABLE `tbl_z_attribut_art`
ADD CONSTRAINT `tbl_z_attribut_art_ibfk_1` FOREIGN KEY (`komponenten_attribut_fk`) REFERENCES `tbl_komponenten_attribute` (`komponenten_attribut_id`),
ADD CONSTRAINT `tbl_z_attribut_art_ibfk_2` FOREIGN KEY (`komponenten_art_fk`) REFERENCES `tbl_komponenten_arten` (`komponenten_art_id`);

--
-- Constraints der Tabelle `tbl_z_attribut_zulaessig`
--
ALTER TABLE `tbl_z_attribut_zulaessig`
ADD CONSTRAINT `tbl_z_attribut_zulaessig_ibfk_1` FOREIGN KEY (`komponenten_attribut_fk`) REFERENCES `tbl_komponenten_attribute` (`komponenten_attribut_id`),
ADD CONSTRAINT `tbl_z_attribut_zulaessig_ibfk_2` FOREIGN KEY (`zulaessiger_wert_fk`) REFERENCES `tbl_zulaessige_werte` (`zulaessiger_wert_id`);

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
