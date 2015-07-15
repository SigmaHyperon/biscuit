<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:            Zulässige Werte hinzufügen
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();

    if($sZWert_name = \utility\forms\post("txt_zulaessiger_wert_name", false))
    {
	$sZWert_wert = \utility\forms\post("num_zulaessiger_wert", false);
	if(func_form_instertZulaessigenWert($sZWert_name, $sZWert_wert))
	{
	    try {
		header("Location: fro_Auswahl.php?action=list&table=zulaessigewerte");
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

<h2 align="center">Zulässige Werte hinzufügen</h2>
<form action="fro_Zulaessige_werte_hinzufuegen.php" method="post">
        <table  class="formular">
            <tr>
                <td>Zulässiger Wert Name</td><td><input type="text" name="txt_zulaessiger_wert_name"/></td>
            </tr>
             <tr>
                <td>Zulässiger Wert</td><td><input type="number" name="num_zulaessiger_wert"/></td>
            </tr>
             <tr>
                <td colspan="2" align="center"> <input type="submit" value="Eintragen" /><input type="reset" value="Verwerfen" /></td>
            </tr> 
        </table>        
</form>
<?php
    }
?>
