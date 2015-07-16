<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      13.07.2015
Änderungsdatum: 
Inhalt:             Räume hinzufügen
-------------------------------------------------------------------> 
<?php
//library laden
    require_once '../lib/manager.php';
//    sql library laden
    require_once './sql_main.php';
//    fotmular komponente laden
    \utility\loadForms();
    
//    prüfen, ob fomrular abgeschickt wurde
    if($sRaum_name = \utility\forms\post("txt_Raumname", false))
    {
	/**
	 * formular daten laden
	 */
	$sRaum_notiz = \utility\forms\post("txt_Raumnotiz", false);
	$sRaum_stockwerk = \utility\forms\post("txt_Stockwerk", false);
//	raum einfügen
	if(func_form_insertRaum($sRaum_name, $sRaum_notiz, $sRaum_stockwerk))
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
?>
<h2 align="center">Raum hinzufügen</h2>
<form action="fro_Raeume_hinzufuegen.php" method="post">
        <table class="formular">
            <tr>
                <td>Name:</td><td><input type="text" name="txt_Raumname"/></td>
            </tr>
            <tr>
                <td>Stockwerk</td><td><input type="text" name="txt_Stockwerk"/></td>
            </tr>
            <tr>
                <td >Raumnotiz:</td><td><input type="text" name="txt_Raumnotiz"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
</form>
<?php
    }
?>