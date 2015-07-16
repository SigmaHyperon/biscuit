
<?php
//library laden
    require_once '../lib/manager.php';
//    sql library laden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen, ob das formular abgeschickt wurde
    if($s_Geraeteart_name = \utility\forms\post("txt_geraete_art_name", false))
    {
//	geräte art id auslesen
	$s_Geraeteart_id = \utility\forms\post("int_id", false);
//	art updaten
	if(func_form_updateGeraeteArt($s_Geraeteart_id, $s_Geraeteart_name))
	{
//	    wenn update erfolgreich weiterleitung auf geräte arten liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=geraetearten");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
//	    wenn update nicht erfolgreich fehler anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
//	prüfen, ob ein eintrag ausgewählt wurde
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    daten zur art laden
	    $aGeraetearten_daten = func_a_getGeraeteArt($int_selektiert);
	    /**
	     * die daten werden dann als vorgefertigte werte ins formular eingetragen
	     */
?>
<h2 align="center">Geräteart ändern</h2>
<form action="fro_Geraetearten_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aGeraetearten_daten["geraete_art_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Gerätearten Name</td><td><input type="text" name="txt_geraete_art_name" value="<?php echo $aGeraetearten_daten["geraete_art_name"];?>"/></td>
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

