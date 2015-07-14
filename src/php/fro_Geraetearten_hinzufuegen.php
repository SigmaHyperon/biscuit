<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:            Gerätearten ändern
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($s_Geraeteart_name = \utility\forms\post("txt_geraete_art_name", false))
    {
	if(func_form_insertGeraeteArt($s_Geraeteart_name))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=geraetearten");
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

