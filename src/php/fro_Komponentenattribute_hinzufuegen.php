<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:             Komponentenarten hinzufügen
------------------------------------------------------------------->
<?php
//library laden
    require_once '../lib/manager.php';
//    sql library laden
    require_once './sql_main.php';
//    formular komponente laden
    \utility\loadForms();
    
//    prüfen, ob das formualr abgeschickt wurde
    if($s_Komponentenattribut_name = \utility\forms\post("txt_Komponenten_attribut_name", false))
    {
//	attribut einfügen
	if(func_form_instertAttribut($s_Komponentenattribut_name))
	{
//	    wenn erfolgreich weiterleitung auf attribut liste
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponentenattribute");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
//	    wenn nicht erfolgreich, fehler meldung anzeigen
	    echo "An error occured!";
	}
    }
    else
    {
?>

<h2 align="center">Komponentenattribut hinzufügen</h2>
<form action="fro_Komponentenattribute_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Komponentenattribut:</td><td><input type="text" name="txt_Komponenten_attribut_name"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
    }
?>