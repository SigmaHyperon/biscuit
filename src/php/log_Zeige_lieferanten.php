<?php
//sql modul und library einbinden
require_once "sql_main.php";
require_once "../lib/manager.php";
//tabellen und formular modul laden
\utility\loadTables();
\utility\loadForms();
//Lieferantendaten aus der Datenbank abfragen
$aLieferanten = func_a_Lesen_von_tabelle("tbl_lieferanten");
//definieren der Namen der Tabellenspalten
$aLieferanten_attribute = ["lieferant_id", "lieferant_name"];

/**
 * Formular beginnen
 * Methode:	get
 * Ziel:	TODO
 */
$oLieferanten_formular = new \utility\forms\form();
$oLieferanten_formular->start("", "get");

//Tabelle beginnen
$oLieferanten_tabelle = new \utility\tables\table();
$oLieferanten_tabelle->start(true);

/**
 * Zeile mit Spaltennamen in die Tabelle eintragen
 */
$oLieferanten_tabelle->startRow();
//leere Zelle für die Spalte der Radio-buttons eintragen
$oLieferanten_tabelle->addCell("");
//Spaltennamen der Reihe nach eintragen
foreach ($aLieferanten_attribute as $mLieferanten_attribut) 
{
    $oLieferanten_tabelle->addCell($mLieferanten_attribut);
}
//Zeile beenden
$oLieferanten_tabelle->endRow();

/**
 * Lieferanten anzeigen
 */
foreach ($aLieferanten as $aLieferant)
{
//    Zeile beginnen
    $oLieferanten_tabelle->startRow();
//    Zelle mit Radio-button eintragen
    $oLieferanten_tabelle->startCell();
    $oLieferanten_formular->addInput("radio", "selektiert", $aLieferant[$aLieferanten_attribute[0]]);
    $oLieferanten_tabelle->endCell();
    
//    einzelnen Lieferant anzeigen
    foreach ($aLieferant as $sIndex => $mLieferant_Data)
    {
	$oLieferanten_tabelle->startCell();
	echo $mLieferant_Data;
	$oLieferanten_tabelle->endCell();
    }
//    Zeile beenden
    $oLieferanten_tabelle->endRow();
}
//Tabelle beenden
$oLieferanten_tabelle->end();
//Buttons einbinden TODO
require_once './fro_Auswahl_buttons.php';
$oLieferanten_formular->addInput("hidden", "table", "lieferanten");
//Formular beenden
$oLieferanten_formular->finish();
?>