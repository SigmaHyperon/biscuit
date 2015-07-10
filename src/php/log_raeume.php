<?php

include "sql_main.php";
include "../lib/manager.php";
\utility\loadTables();

$aRaeume = getRaeume_Data();
$aRaeume_Attribute = ["raum_id", "raum_notiz", "raum_name"];

$oRaeume_Tabelle = new \utility\tables\table();
$oRaeume_Tabelle->start();
$oRaeume_Tabelle->addRow($aRaeume_Attribute);
foreach ($aRaeume as $aRaum)
{
    $oRaeume_Tabelle->addRow($aRaum);
}
$oRaeume_Tabelle->end();