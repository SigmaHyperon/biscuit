<!-----------------------------------------------------------------
Ersteller:          FFleischmann
Erstell-Datum:      14.07.2015
Änderungsdatum: 
Inhalt:            Zulässige Werte ändern
------------------------------------------------------------------->
<?php
    require_once '../lib/manager.php';
    require_once './sql_main.php';
    \utility\loadForms();
    
    if($sZWert_name = \utility\forms\post("txt_zulaessiger_wert_name", false))
    {
	$sZWert_id = \utility\forms\post("int_id", false);
	$sZWert_wert = \utility\forms\post("num_zulaessiger_wert", false);
	if(func_form_updateZulaessigeWerte($sZWert_id, $sZWert_name, $sZWert_wert))
	{
	    die();
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
	if($int_selektiert = \utility\forms\get("selektiert", false))
	{
	    $aZWert_daten = func_a_getZulaessigenWert($int_selektiert);
?>
<form action="fro_Zulaessige_werte_aendern.php" method="post">
    <input type="hidden" name="int_id" value="<?php echo $aZWert_daten["zulaessiger_wert_id"];?>"/>
        <table  class="formular">
            <tr>
                <td>Zulässiger Wert Name</td><td><input type="text" name="txt_zulaessiger_wert_name" value="<?php echo $aZWert_daten["zulaessiger_wert_name"];?>"/></td>
            </tr>
             <tr>
                <td>Zulässiger Wert</td><td><input type="number" name="num_zulaessiger_wert" value="<?php echo $aZWert_daten["zulaessiger_wert"];?>"/></td>
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