<?php

//include "sql_main.php";
include "../lib/manager.php";
\utility\loadTables();
/*
$aLieferanten = getLieferanten_Data();
$aLieferanten_Attribute = ["lieferant_id", "lieferant_name"];

$oLieferanten_Tabelle = new \utility\tables\table();
$oLieferanten_Tabelle->start();
$oLieferanten_Tabelle->addRow($aLieferanten_Attribute);
foreach ($aLieferanten as $aLieferant)
{
    $oLieferanten_Tabelle->addRow($aLieferant);
}
$oLieferanten_Tabelle->end();
 * */


echo "log test";