-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Jul 2015 um 11:33
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `b3_projekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_geraete`
--

CREATE TABLE IF NOT EXISTS `tbl_geraete` (
`geraete_id` int(11) NOT NULL,
  `raum_fk` int(11) DEFAULT NULL,
  `lieferant_fk` int(11) DEFAULT NULL,
  `geraet_ek_datum` date DEFAULT NULL,
  `geraet_notiz` text,
  `geraet_hersteller` text,
  `geraet_gewaehr_beginn` date DEFAULT NULL,
  `geraet_gewaehr_ende` date DEFAULT NULL,
  `geraete_seriennummer` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten` (
`komponenten_id` int(11) NOT NULL,
  `komponente_name` text,
  `komponente_bestand` int(11) DEFAULT NULL,
  `komponenten_art_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_komponenten_arten`
--

CREATE TABLE IF NOT EXISTS `tbl_komponenten_arten` (
`komponenten_art_id` int(11) NOT NULL,
  `komponenten_art_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `lieferant_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_raeume`
--

CREATE TABLE IF NOT EXISTS `tbl_raeume` (
`raum_id` int(11) NOT NULL,
  `raum_notiz` text,
  `raum_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indizes für die Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
 ADD PRIMARY KEY (`geraete_id`), ADD KEY `foreignkey_tbl_geraete_lieferant_fk` (`lieferant_fk`), ADD KEY `foreignkey_tbl_geraete_raum_fk` (`raum_fk`);

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
-- AUTO_INCREMENT für Tabelle `tbl_geraete`
--
ALTER TABLE `tbl_geraete`
MODIFY `geraete_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten`
--
ALTER TABLE `tbl_komponenten`
MODIFY `komponenten_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_arten`
--
ALTER TABLE `tbl_komponenten_arten`
MODIFY `komponenten_art_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_komponenten_attribute`
--
ALTER TABLE `tbl_komponenten_attribute`
MODIFY `komponenten_attribut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_lieferanten`
--
ALTER TABLE `tbl_lieferanten`
MODIFY `lieferant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_raeume`
--
ALTER TABLE `tbl_raeume`
MODIFY `raum_id` int(11) NOT NULL AUTO_INCREMENT;
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
