<?php
require_once "sql_main.php";
require_once "../lib/manager.php";
\utility\loadTables();

$aLieferanten = func_a_getLieferanten();
$aLieferanten_Attribute = ["lieferant_id", "lieferant_name"];

$oLieferanten_Tabelle = new \utility\tables\table();
$oLieferanten_Tabelle->start();
$oLieferanten_Tabelle->addRow($aLieferanten_Attribute);
foreach ($aLieferanten as $aLieferant)
{
    $oLieferanten_Tabelle->addRow($aLieferant);
}
$oLieferanten_Tabelle->end();
?>