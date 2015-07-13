<?php
require_once "sql_main.php";
require_once "../lib/manager.php";
\utility\loadTables();
\utility\loadForms();

$aRaeume = func_a_Lesen_von_tabelle("tbl_raeume");

$aRaeume_Attribute = ["raum_id", "raum_notiz", "raum_name"];

$oRaeume_formular = new \utility\forms\form();
$oRaeume_formular->start("", "get");

$oRaeume_Tabelle = new \utility\tables\table();
$oRaeume_Tabelle->start(true);

$oRaeume_Tabelle->startRow();
$oRaeume_Tabelle->addCell("");
foreach ($aRaeume_Attribute as $mRaum_attribut)
{
    $oRaeume_Tabelle->addCell($mRaum_attribut);
}
$oRaeume_Tabelle->endRow();

foreach ($aRaeume as $aRaum)
{
    $oRaeume_Tabelle->startRow();
    $oRaeume_Tabelle->startCell();
    $oRaeume_formular->addInput("radio", "selektiert", $aRaum[$aRaeume_Attribute[0]]);
    $oRaeume_Tabelle->endCell();
    foreach ($aRaum as $mRaum_data)
    {
	$oRaeume_Tabelle->startCell();
	echo $mRaum_data;
	$oRaeume_Tabelle->endCell();
    }
    $oRaeume_Tabelle->endRow();
}
$oRaeume_Tabelle->end();
require_once './fro_Auswahl_buttons.php';
$oRaeume_formular->addInput("hidden", "table", "raeume");
$oRaeume_formular->finish();
?>