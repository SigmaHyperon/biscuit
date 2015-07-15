<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:             Komponentenarten hinzufügen
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Komponentenart_name = \utility\forms\post("txt_Komponenten_art_name", false))
    {
	if(func_form_instertKomponentenArt($s_Komponentenart_name))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=komponentenarten");
		die();
	    } catch (Exception $ex) {}
	}
	else
	{
	    echo "An error occured!";
	}
    }
    else
    {
?>

<h2 align="center">Komponentenart hinzufügen</h2>
<form action="fro_Komponentenarten_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Komponentenarten:</td><td><input type="text" name="txt_Komponenten_art_name"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
    }
?>