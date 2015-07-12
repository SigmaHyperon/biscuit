<?php
require_once "sql_main.php";
require_once "../lib/manager.php";
\utility\loadTables();

$aRaeume = func_a_getRaeume();
$aRaeume_Attribute = ["raum_id", "raum_notiz", "raum_name"];

$oRaeume_Tabelle = new \utility\tables\table();
$oRaeume_Tabelle->start();
$oRaeume_Tabelle->addRow($aRaeume_Attribute);
foreach ($aRaeume as $aRaum)
{
    $oRaeume_Tabelle->addRow($aRaum);
}
$oRaeume_Tabelle->end();
?>