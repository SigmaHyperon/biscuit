<?php
require_once "sql_main.php";
require_once "../lib/manager.php";
\utility\loadTables();
/*echo "<script>
	$(function(){
	    $('tr:not(.header)').click( function() {
		    window.location = $(this).find('a').attr('href');
		}).hover( function() {
		    $(this).toggleClass('hover');
		});
	});
    </script>";
*/
$aLieferanten = func_a_getLieferanten();
$aLieferanten_Attribute = ["lieferant_id", "lieferant_name"];

$oLieferanten_Tabelle = new \utility\tables\table();
$oLieferanten_Tabelle->start();
$oLieferanten_Tabelle->addRow($aLieferanten_Attribute);
foreach ($aLieferanten as $aLieferant)
{
    $oLieferanten_Tabelle->startRow();
    foreach ($aLieferant as $sIndex => $mLieferant_Data)
    {
	
	$oLieferanten_Tabelle->startCell();
	if($sIndex == $aLieferanten_Attribute[0])
	{
	    \utility\html\openTag("a", "", "href='?action=edit&table=lieferanten&pkey=".$aLieferanten_Attribute[0]."&entry=".$mLieferant_Data."'");
	    echo $mLieferant_Data;
	    \utility\html\closeTag("a");
	}
	else
	{
	    echo $mLieferant_Data;
	}
	$oLieferanten_Tabelle->endCell();
    }
    $oLieferanten_Tabelle->endRow();
}
$oLieferanten_Tabelle->end();
?>