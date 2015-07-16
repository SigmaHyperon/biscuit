<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:            Gerätearten ändern
------------------------------------------------------------------->
<?php
//library einbinden
    require_once '../lib/manager.php';
//    slq library einbinden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen, ob das formular abgeschickt wurde
    if($s_Geraeteart_name = \utility\forms\post("txt_geraete_art_name", false))
    {
//	geräteart eintragen
	if(func_form_insertGeraeteArt($s_Geraeteart_name))
	{
//	    wenn eintrag erfolgreich weiterleitung auf geräte art liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=geraetearten");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
//	    wenn eintrag nicht erfolgreich fehler anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
?>
<!-- ------------------ Beginn des Gerätearten-Hinzufügenformulars ------------------- -->
<h2 align="center">Geräteart hinzufügen</h2>
<form action="fro_Geraetearten_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Gerätearten Name</td><td><input type="text" name="txt_geraete_art_name"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
    }
?>

