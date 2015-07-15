<?php
//sql modul und library einbinden
require_once "sql_main.php";
require_once "../lib/manager.php";
//tabellen und formular modul laden
\utility\loadTables();
\utility\loadForms();
//Lieferantendaten aus der Datenbank abfragen
//$aErgebnisse = func_a_Lesen_von_tabelle("tbl_lieferanten");
//definieren der Namen der Tabellenspalten
//$aErgebnis_attribute = [""];

/**
 * Formular beginnen
 * Methode:	get
 * Ziel:	TODO
 */
echo "<h2 align='center'>".$sTitel."</h2>";

$oFormular = new \utility\forms\form();
$oFormular->start("", "get");

//Tabelle beginnen
$oTabelle = new \utility\tables\table();
$oTabelle->start(false, "liste");

/**
 * Zeile mit Spaltennamen in die Tabelle eintragen
 */
$oTabelle->startRow();
//leere Zelle für die Spalte der Radio-buttons eintragen
if(func_b_isAdmin())$oTabelle->addCell("");
//Spaltennamen der Reihe nach eintragen
foreach ($aErgebnis_attribute as $mAttribut) 
{
    $oTabelle->addCell($mAttribut);
}
//Zeile beenden
$oTabelle->endRow();

/**
 * Lieferanten anzeigen
 */
foreach ($aErgebnisse as $aErgebnis)
{
//    Zeile beginnen
    $oTabelle->startRow();
//    Zelle mit Radio-button eintragen
    if(func_b_isAdmin())
    {
	 $oTabelle->startCell();
	reset($aErgebnis);
	$oFormular->addInput("radio", "selektiert", $aErgebnis[key($aErgebnis)]);
	$oTabelle->endCell();
    }
//    einzelnen Lieferant anzeigen
    foreach ($aErgebnis as $sIndex => $mData)
    {
	$oTabelle->startCell();
	echo $mData;
	$oTabelle->endCell();
    }
//    Zeile beenden
    $oTabelle->endRow();
}
//Tabelle beenden
$oTabelle->end();
//Buttons einbinden TODO
require_once './fro_Auswahl_buttons.php';
$oFormular->addInput("hidden", "table", $s_table);
//Formular beenden
$oFormular->finish();

