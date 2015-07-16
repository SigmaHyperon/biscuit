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
    
//    prüfen, ob formular abgeschickt wurde
    if($s_Komponentenattribut_name = \utility\forms\post("txt_Komponenten_attribut_name", false))
    {
	/**
	 * formualr daten laden
	 */
	$s_Komponentenattribut_id = \utility\forms\post("int_id", false);
//	komponentenattribut laden
	if(func_form_updateAttribute($s_Komponentenattribut_id, $s_Komponentenattribut_name))
	{
//	    wenn erfolgreich, weiterleitung auf attribut list
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponentenattribute");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
//	    wenn nicht erfolgreich , fehler meldung anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
//	prüfen, ob ein eintrag selektiert wurde
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    attribut daten laden
	    $aKomponentenattribut_daten = func_a_getAttribut($int_selektiert);
	    /**
	     * die daten werden dann als default werte im formular unten eingetargen
	     */
?>

<h2 align="center">Komponentenattribut ändern</h2>
<form action="fro_Komponentenattribute_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aKomponentenattribut_daten["komponenten_attribut_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Komponentenattribut:</td><td><input type="text" name="txt_Komponenten_attribut_name" value="<?php echo $aKomponentenattribut_daten["komponenten_attribut_name"];?>"/></td>
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