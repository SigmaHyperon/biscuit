<!-----------------------------------------------------------------
Ersteller:          K!l1an
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Räume hinzufügen
-------------------------------------------------------------------> 
<?php
//library laden
    require_once '../lib/manager.php';
//    sql lirary laden
    require_once './sql_main.php';
    \utility\loadForms();
    
//    prüfen, ob formular abgeschickt wurde
    if($sRaum_name = \utility\forms\post("txt_Raumname", false))
    {
	/**
	 * formular daten laden
	 */
	$iRaum_id = \utility\forms\post("int_id", false);
	$sRaum_notiz = \utility\forms\post("txt_Raumnotiz", false);
	$sRaum_stockwerk = \utility\forms\post("txt_Stockwerk", false);
//	raum updaten 
	if(func_b_updateRaum($iRaum_id, $sRaum_name, $sRaum_notiz, $sRaum_stockwerk))
	{
//	    wenn erfolgreich, weiterleitung auf raumliste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=raeume");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
//	    wenn nicht erfolgreich, fehlermeldung anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
//	prüfen, ob eintrag selektiert wurde
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    raumdaten laden
	    $aRaum_daten = func_a_getRaum($int_selektiert);
	    /**
	     * die daten werden dann ins formular als default werte eingetragen
	     */
?>
<h2 align="center">Raum ändern</h2>
<form action="fro_Raeume_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aRaum_daten["raum_id"];?>"/>
        <table border="1" class="formular">
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Raumname" value="<?php echo $aRaum_daten["raum_name"];?>"/></td>
            </tr>
            <tr>
                <td>Stockwerk</td><td><input type="text" name="txt_Stockwerk" /></td>
            </tr>
            <tr>
                <td >Raumnotiz:</td><td><input type="text" name="txt_Raumnotiz" value="<?php echo $aRaum_daten["raum_notiz"];?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
<?php
	}
    }
?>