<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:             Komponentenarten ändern
------------------------------------------------------------------->

<?php
//library laden
    require_once '../lib/manager.php';
//    sql library laden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen, ob das formualr abgeschickt wurde
    if($s_Komponentenart_name = \utility\forms\post("txt_Komponenten_art_name", false))
    {
	/**
	 * formualrdaten laden
	 */
	$iKomponentenart_id = \utility\forms\post("int_id", false);
//	komponenten art updaten
	if(func_form_updateKomponentenArt($iKomponentenart_id, $s_Komponentenart_name))
	{
	    
//	    wenn erfolgreich , weiterleitung auf komponenten art liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponentenarten");
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
//	prüfen, ob ein eintrag selektiert wurde
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    art daten laden
	    $aKomponentenarten_daten = func_a_getKomponentenArt($int_selektiert);
	    /**
	     * daten werden dann als default werte im formular unten eingetragen
	     */
?>

<h2 align="center">Komponentenart ändern</h2>
<form action="fro_Komponentenarten_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aKomponentenarten_daten["komponenten_art_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Komponentenarten:</td><td><input type="text" name="txt_Komponenten_art_name" value="<?php echo $aKomponentenarten_daten["komponenten_art_name"];?>"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Ändern" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
	}
    }
?>